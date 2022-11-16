<?php

namespace Request;

use Response\Response;
use Response\ResponseFile;

class FetchFileRequest extends Request
{
    public function handle(): Response
    {
        return new ResponseFile($this->input['path']);
    }
}
