<?php
/**
 * Created by PhpStorm.
 * User: flavio
 * Date: 11/05/16
 * Time: 20:45
 */

namespace CodeProject\Http\Controllers;

use CodeProject\Exceptions\ResponseException;
use CodeProject\Services\AbstractService;
use Illuminate\Http\Request;

abstract class AbstractCompositeRoute
{
    protected $service;
    protected $request;

    public function __construct(ServiceInterface $service, Request $request)
    {
        $this->service = $service;
        $this->request = $request;
    }

    public function index()
    {

    }

    public function show()
    {
        try {
            return $this->service->find($this->request->$this->getRelatedId(), $this->request->id);
        } catch (ResponseException $e) {
            return response()->json($e->getMessage(), $e->getCode());
        }
    }

    public function destroy()
    {
        try {
            return $this->service->delete($this->getRelatedId(), $this->request->id);
        } catch (ResponseException $e) {
            return response()->json($e->getMessage(), $e->getCode());
        }
    }


}