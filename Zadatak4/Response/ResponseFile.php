<?php

namespace Response;

class ResponseFile extends Response
{
    protected string $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function serve(): string
    {
        if (!file_exists($this->path)) {
            $this->setCode(404);
            return '';
        }

        $this->setHeader('Content-Type', mime_content_type($this->path))
            ->setHeader('Content-Disposition', 'filename=' . pathinfo($this->path, PATHINFO_BASENAME))
            ->setHeader('Content-Transfer-Encoding', 'binary')
            ->setHeader('Accept-Ranges', 'bytes');

        return file_get_contents($this->path);
    }
}
