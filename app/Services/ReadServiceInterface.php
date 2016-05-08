<?php

namespace CodeProject\Services;

interface ReadServiceInterface
{
    function find($id);
    function findAll($foreignFieldId = null);
}