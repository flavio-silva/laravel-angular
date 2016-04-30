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
    private $service;

    public function __construct(ServiceInterface $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->findAll();
    }

    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    public function show($id)
    {
        return $this->service->find($id);
    }

    public function destroy($id)
    {
        return $this->service->delete($id);
    }

    public function update(Request $request, $id)
    {
        return $this->service->update($request->all(), $id);
    }
}