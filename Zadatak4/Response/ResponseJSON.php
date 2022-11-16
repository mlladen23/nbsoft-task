<?php

namespace Response;

class ResponseJSON extends Response
{
    protected array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function serve(): string
    {
        $json = json_encode($this->data);

        if (json_last_error() === JSON_ERROR_NONE) {
            return $json;
        }

        return json_encode((object) []);
    }
}
