<?php

namespace Response;

abstract class Response
{
    private int $code = 200;
    private array $headers = [];

    abstract public function serve(): string;

    public function setCode(int $code): Response
    {
        $this->code = $code;

        return $this;
    }

    public function setHeader(string $key, string $value): Response
    {
        $this->headers[$key] = $value;

        return $this;
    }

    public function send(): string {
        $result = $this->serve();

        $this->beforeSend();

        return $result;
    }

    private function beforeSend(): Response {
        http_response_code($this->code);

        foreach ($this->headers as $key => $value) {
            header("{$key}: {$value}");
        }

        return $this;
    }
}
