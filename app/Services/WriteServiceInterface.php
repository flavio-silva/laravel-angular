<?php

namespace CodeProject\Services;

interface WriteServiceInterface
{
    function create(array $data);

    function update(array $data, $id);

    function delete($id);
}