<?php

namespace CodeProject\Services;

use CodeProject\Repositories\RepositoryInterface;
use CodeProject\Validators\ValidatorInterface;

abstract class AbstractService implements ServiceInterface
{
    protected $repository;
    protected $validator;
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

    public function findAll(array $params = [])
    {        
        return $this->getRepository()->all();
    }

    public function find(array $params)
    {
        return $this->repository->find($params['id']);
    }

    public function create(array $data)
    {        
        $this->validator->with($data)->passesOrFail();
        return $this->repository->create($data);
    }

    public function update(array $data)
    {
        $this->validator->with($data)->passesOrFail();
        return $this->repository->update($data, $data['id']);
    }

    public function delete(array $params)
    {
        $this->repository->delete($params['id']);
    }
}