<?php

namespace Request;

use Response\Response;

abstract class Request
{
    protected array $input;

    public function __construct()
    {
        $this->input = array_merge($_GET, $_POST);
    }

    abstract public function handle(): Response;
}
