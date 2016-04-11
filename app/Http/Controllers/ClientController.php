<?php

namespace CodeProject\Http\Controllers;

use Illuminate\Http\Request;

use CodeProject\Http\Requests;
use CodeProject\Clients;

class ClientController extends Controller
{
    private $client;

    public function __construct(Clients $client)
    {
        $this->client = $client;
    }

    public function index()
    {
        return $this->client->all();
    }

    public function store(Request $request)
    {        
        return $this->client->create($request->all());
    }

    public function show($id)
    {
        return $this->client->find($id);
    }

    public function destroy($id)
    {
        $this->client->find($id)->delete();
    }

    public function update(Request $request, $id)
    {        
        $client = $this->client->find($id);
        $client->update($request->all());
        return $client;

    }
}
