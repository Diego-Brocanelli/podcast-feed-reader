<?php

declare(strict_types=1);

namespace DiegoBrocanelli;

use Exception;
use RuntimeException;

class Podcast
{
    public function __construct(private array $reader)
    {
    }
}
