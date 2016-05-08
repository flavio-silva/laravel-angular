<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Services\ServiceInterface;
use Illuminate\Http\Request;
use CodeProject\Http\Requests;

abstract class AbstractRestFullController extends Controller
{
    /**
     * @var ServiceInterface
     */
    protected $service;

    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
    }

    public function index($foreignFieldId = null)
    {
        return $this->service->findAll($foreignFieldId);
    }

    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    public function show($firstId, $secondId = null)
    {

        $id = $secondId ? $secondId : $firstId;

        return $this->service->find($id);
    }

    public function destroy($firstId, $secondId = null)
    {
        $id = $secondId ? $secondId : $firstId;
        return $this->service->delete($id);
    }

    public function update(Request $request, $firstId, $secondId)
    {
        $id = $secondId ? $secondId : $firstId;

        return $this->service->update($request->all(), $id);
    }
}