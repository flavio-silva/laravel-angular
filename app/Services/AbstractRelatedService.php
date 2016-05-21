<?php

namespace CodeProject\Services;

use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Eloquent\ModelNotFoundException;

abstract class AbstractRelatedService extends AbstractService
{

    public function findAll(array $params = [])
    {        
        return $this->getRepository()
            ->findWhere([$this->foreignFieldName => $params[$this->foreignFieldName]]);
    }

    public function find(array $params)
    {

        $result = $this->repository
            ->findWhere(
                [
                    $this->foreignFieldName => $params[$this->foreignFieldName],
                    'id' => $params['id']
                 ])
            ->first();

        if ($result === null) {
            throw new ModelNotFoundException();
        }
        return $result;
    }

    public function delete(array $params)
    {
        $result = $this->repository
            ->findWhere([
                $this->foreignFieldName => $params[$this->foreignFieldName],
                'id' => $params['id']
            ])
            ->first();

        if ($result === null) {
            throw new ModelNotFoundException();
        }

        $result->delete();
    }
}