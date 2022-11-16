<?php

namespace Request;

use Response\Response;
use Response\ResponseJSON;

class ScanDirectoryRequest extends Request
{
    public function handle(): Response
    {
        $directory = $this->input['directory'];

        if (!file_exists($directory)) {
            return new ResponseJSON([]);
        }

        $result = [];
        $files = scandir($directory);

        foreach ($files as $file) {
            if (in_array($file, ['.', '..'])) {
                continue;
            }

            $path = $directory . DIRECTORY_SEPARATOR . $file;

            array_push($result, [
                'type' => is_dir($path) ? 'directory' : 'file',
                'name' => $file,
                'extension' => is_dir($path) ? null : pathinfo($path, PATHINFO_EXTENSION),
                'path' => $path,
            ]);
        }

        return new ResponseJSON($result);
    }
}
