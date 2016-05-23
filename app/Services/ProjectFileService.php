<?php

namespace CodeProject\Services;

use CodeProject\Upload\UploadInterface;
use CodeProject\Repositories\RepositoryInterface;
use CodeProject\Validators\ValidatorInterface;
use Illuminate\Filesystem\Filesystem as File;

class ProjectFileService extends AbstractRelatedService
{
    protected $relations = ['project'];
    protected $foreignFieldName = 'project_id';
    protected $upload;
    protected $file;

    public function __construct(RepositoryInterface $repository, ValidatorInterface $validator, UploadInterface $upload, File $file)
    {
        parent::__construct($repository, $validator);
        $this->upload = $upload;
        $this->file = $file;
    }

    public function create(array $data)
    {       
        $this->validator->with($data)->passesOrFail('create');
        $data['extension'] = $data['file']->getClientOriginalExtension();
        $data['file'] = $this->file->get($data['file']);

        $result = $this->repository->create($data);

        $this->upload->upload($result['data']['id'], $data['extension'], $data['file']);
        return $result;
    }

    public function delete(array $params)
    {
        $id = $params['id'];

        $result = $this->repository
            ->skipPresenter()
            ->find($id);

        $filename = $id . '.' . $result->extension;

        $this->repository->delete($id);
        $this->upload->getStorage()->delete($filename);
    }
}