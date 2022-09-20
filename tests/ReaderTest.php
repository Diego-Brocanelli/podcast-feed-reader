<?php

declare(strict_types=1);

namespace Tests;

use DiegoBrocanelli\Reader;
use PHPUnit\Framework\TestCase;
use RuntimeException;

final class ReaderTest extends TestCase
{
    /** @test */
    public function exceptionReadingFeed(): void
    {
        $this->expectException(RuntimeException::class);

        $this->expectExceptionMessage("Invalid feed");

        (new Reader('invalid-feed.com'))->read();
    }
}
