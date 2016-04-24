<?php

namespace CodeProject\Services;

use CodeProject\Repositories\RepositoryInterface;
use CodeProject\Validators\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectService implements ServiceInterface
{
    private $repository;
    private $validator;

    public function __construct(RepositoryInterface $repository, ValidatorInterface $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
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
        }
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }

    public function find($id)
    {
        return $this->repository->with(['owner', 'client'])->find($id);
    }

    public function findAll()
    {
        return $this->repository->with(['owner', 'client'])->all();
    }
}