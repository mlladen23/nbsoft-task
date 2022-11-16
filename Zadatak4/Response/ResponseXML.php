<?php

namespace Response;

class ResponseXML extends Response
{
    protected array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function serve(): string
    {
        try {
            $root = new \SimpleXMLElement('<root/>');
            $this->arrayToXML($root, $this->data);
            return $root->asXML();
        } catch (\Throwable) {
            $root = new \SimpleXMLElement('<root/>');
            return $root->asXML();
        }
    }

    private function arrayToXML(\SimpleXMLElement &$object, array $data): void
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $child = $object->addChild($key);
                $this->arrayToXML($child, $value);
                continue;
            }

            $object->addChild(is_integer($key) ? "key_{$key}" : $key, $value);
        }
    }
}
