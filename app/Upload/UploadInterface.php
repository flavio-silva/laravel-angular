<?php

namespace CodeProject\Upload;

interface UploadInterface
{
    function upload($name, $extension, $file);
}