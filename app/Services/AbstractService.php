<?php

namespace CodeProject\Services;

use CodeProject\Repositories\RepositoryInterface;
use CodeProject\Validators\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

abstract class AbstractService implements ServiceInterface
{
    protected $repository;
    protected $validator;
    protected $resourceName = 'recurso';
    protected $foreignFieldName;
    protected $relations = [];

    public function __construct(RepositoryInterface $repository, ValidatorInterface $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function getRepository()
    {
        if(empty($this->relations)) {
            return $this->repository;
        }

        return $this->repository->with($this->relations);
    }

    public function findAll($foreignFieldId = null)
    {

        if ($foreignFieldId) {
            return $this->getRepository()
                ->findWhere([$this->foreignFieldName => $foreignFieldId]);
        }

        return $this->getRepository()->all();
    }

    public function find($id)
    {
        try {
            return $this->getRepository()->find($id);

        } catch (ModelNotFoundException $e) {
            return [
                'error' =>  true,
                'message' => sprintf("Não foi possível encontrar o %s de id %s", $this->resourceName, $id)
            ];
        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => sprintf("Erro ao buscar o %s", $this->resourceName)
            ];
        }
    }

    public function create(array $data)
    {
        try {

            $this->validator->with($data)->passesOrFail();
            return $this->repository->create($data);

        } catch (ValidatorException $e) {

            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];

        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => sprintf('Erro ao criar o %s', $this->resourceName),

            ];
        }
    }

    public function update(array $data, $id)
    {

        try {
            $this->validator->with($data)->passesOrFail();
            return $this->repository->update($data, $id);

        } catch (ValidatorException $e) {

            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        } catch (ModelNotFoundException $e) {
            return [
                'error' => true,
                'message' => sprintf("Não foi possível atualizar o %s de id %s, pois o mesmo não existe", $this->resourceName, $id)
            ];
        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => sprintf("Erro ao atualizar o %s", $this->resourceName),
            ];
        }
    }

    public function delete($id)
    {

        try {
            $this->repository->delete($id);
            return [
                'success' => true,
                'message' => sprintf('O %s de id %s foi excluído com sucesso', $this->resourceName, $id)
            ];
        } catch (ModelNotFoundException $e) {
            return [
                'error' => true,
                'message' => sprintf("Não foi possível remover o %s de id %s, pois o mesmo não foi encontrado", $this->resourceName, $id)
            ];
        } catch (\PDOException $e) {
            return [
                'error' => true,
                'message' =>  sprintf("O %s de id %s não pode ser removido, pois está atrelado à um outro recurso", $this->resourceName, $id)
            ];
        } catch(\Exception $e) {
            return [
                'error' => true,
                'message' => sprintf("Erro ao excluir o %s", $this->resourceName)
            ];
        }
    }

}