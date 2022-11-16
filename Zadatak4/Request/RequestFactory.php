<?php

namespace Request;

abstract class RequestFactory
{
    public static function make(string $type): Request
    {
        switch ($type) {
            case 'scan-directory':
                return new ScanDirectoryRequest();

            case 'fetch-file':
                return new FetchFileRequest();
        }

        throw new \TypeError(static::class . " Error: Failed to instantiate request of type \"{$type}\"");
    }
}
