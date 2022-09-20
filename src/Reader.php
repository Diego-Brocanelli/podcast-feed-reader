<?php

declare(strict_types=1);

namespace DiegoBrocanelli;

use Exception;
use RuntimeException;

class Reader
{
    private string $errorMsg = 'Invalid feed';

    public function __construct(private string $feed)
    {
    }

    /** @return array<string> */
    public function read(): array
    {
        try {
            $xmlContent = file_get_contents($this->feed);

            if ($xmlContent === false) {
                throw new RuntimeException($this->errorMsg);
            }

            $xmlObject = simplexml_load_string($xmlContent);
            if ($xmlObject === false) {
                throw new RuntimeException($this->errorMsg);
            }

            $json = json_encode($xmlObject);
            if ($json === false) {
                throw new RuntimeException($this->errorMsg);
            }

            return json_decode($json, true);
        } catch (Exception $exc) {
            throw new RuntimeException($this->errorMsg);
        }
    }
}
