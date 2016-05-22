<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Services\ServiceInterface;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use LucaDegasperi\OAuth2Server\Authorizer;

abstract class AbstractRestFullController extends Controller
{
    /**
     * @var ServiceInterface
     */
    protected $service;
    protected $request;
    protected $authorizer;

    public function __construct(ServiceInterface $service, Request $request, Authorizer $authorizer)
    {
        $this->service = $service;
        $this->request = $request;
        $this->authorizer = $authorizer;
    }

    protected function getParams()
    {
        return $this->request->route()->parameters();
    }

    protected function getRequestAllData()
    {
        $authenticatedUser = ['authenticatedUserId' => $this->authorizer->getResourceOwnerId()];
        return array_merge($authenticatedUser, $this->request->all(), $this->getParams());
    }

    public function index()
    {        
        return $this->service->findAll($this->getRequestAllData());
    }

    public function store()
    {

        try {

            return $this->service
                ->create($this->getRequestAllData());

        } catch (ValidatorException $e) {
            return response()->json($e->getMessageBag(), 400);

        } catch (\Exception $e) {

            $message = sprintf('Erro ao criar o %s', $this->resourceName);
            return response()->json($message, 500);
        }
    }

    public function show()
    {
        $params = $this->getParams();
         try {

            return $this->service
                ->find($this->getRequestAllData());

        } catch (ModelNotFoundException $e) {

            $message = sprintf("Não foi possível encontrar o %s de id %s", $this->resourceName, $params['id']);

            return response()
                ->json($message, 404);

        } catch(\Exception $e) {
            $message = sprintf("Erro ao buscar o %s de id %s", $this->resourceName, $params['id']);

            return response()
                ->json($message, 500);
        }
    }

    public function destroy()
    {
        $params = $this->getParams();

        try {
            $this->service
                ->delete($params);

            $message = sprintf('O %s de id %d foi excluído com sucesso', $this->resourceName, $params['id']);

            return response()
                ->json($message, 201);

        } catch (ModelNotFoundException $e) {

            $message = sprintf("Não foi possível remover o %s de id %s, pois o mesmo não foi encontrado", $this->resourceName, $params['id']);

            return response()
                ->json($message, 404);

        } catch (\PDOException $e) {
            $message = sprintf("O %s de id %s não pode ser removido, pois está atrelado à um outro recurso", $this->resourceName, $params['id']);

            return response()
                ->json($message, 400);

        } catch(\Exception $e) {
            $message = sprintf("Erro ao excluir o %s de id %s", $this->resourceName, $params['id']);

            return response()
                ->json($message, 500);
        }
    }

    public function update()
    {
        $params = $this->getParams();

        try {
            return $this->service->update($this->getRequestAllData());

        } catch (ValidatorException $e) {
            return response()->json($e->getMessageBag(), 400);

        } catch (ModelNotFoundException $e) {
            $message = sprintf("Não foi possível atualizar o %s de id %s, pois o mesmo não existe", $this->resourceName, $params['id']);

            return response()
                ->json($message, 404);

        } catch (\Exception $e) {

            $message = sprintf("Erro ao atualizar o %s de id %s", $this->resourceName, $params['id']);

            return response()
                ->json($message, 500);
        }
    }
}