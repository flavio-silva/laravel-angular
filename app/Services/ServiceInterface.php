<?php

namespace CodeProject\Services;

interface ServiceInterface
{
    function find(array $params);

    function findAll(array $params = []);

    function create(array $data);

    function update(array $data);

    function delete(array $params);
}