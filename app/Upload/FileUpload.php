<?php

namespace CodeProject\Upload;

use Illuminate\Contracts\Filesystem\Factory as Storage;

class FileUpload implements UploadInterface
{
    protected $storage;

    public function __construct(Storage $storage)
    {
        $this->storage = $storage;
    }

    public function upload($name, $extension, $file)
    {
        $filename = $name . '.' . $extension;
        $this->storage->put($filename, $file);
    }

    public function getStorage()
    {
        return $this->storage;
    }
}