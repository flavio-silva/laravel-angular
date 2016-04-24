<?php

namespace CodeProject\Services;

interface ServiceInterface
{
    function create(array $data);

    function update(array $data, $id);

    function delete($id);

    function find($id);

    function findAll();
}