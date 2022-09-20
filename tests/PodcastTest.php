<?php

declare(strict_types=1);

namespace Tests;

use DiegoBrocanelli\Reader;
use DiegoBrocanelli\Podcast;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class PodcastTest extends TestCase
{
    /** @test */
    public function invalidReaderEmpty(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->expectExceptionMessage("Invalid reader structure");

        (new Podcast([]));
    }

    private function getReaderMock()
    {
        $stub = $this->createStub(Reader::class);

        $stub->method('read')
             ->willReturn([
                "channel" => [
                    "title"          => "Podcast title",
                    "link"           => "https://podcast.com/feed",
                    "description"    => "Technology podcast",
                    "lastBuildDate"  => "Tue, 13 Sep 2022 12:56:04 +0000",
                    "language"       => "pt-BR",
                    "managingEditor" => "jose.couves@couvescopr.com",
                    "copyright"      => "Copyright",
                    "image"          => [
                        "title" => "Podcast title",
                        "url"   => "https://podcast.com/logo.png",
                        "link"  => "https://podcast.com"
                    ],
                    "item" => [
                        [
                            "title"       => "Episode 04",
                            "link"        => "https://podcast.com/episode04",
                            "pubDate"     => "Tue, 13 Sep 2022 12:23:14 +0000",
                            "guid"        => "https://www.hipsters.tech/?p=4",
                            "description" => "episode description...",
                            "enclosure"   => [
                                '@attributes' => [
                                    "url"    => "https://www.hipsters.tech/episode04.mp3",
                                    "length" => "31911392",
                                    "type"   => "audio/mpeg",
                                ]
                            ]
                        ],
                        [
                            "title"       => "Episode 03",
                            "link"        => "https://podcast.com/episode02",
                            "pubDate"     => "Tue, 08 Sep 2022 13:42:22 +0000",
                            "guid"        => "https://www.hipsters.tech/?p=3",
                            "description" => "episode description...",
                            "enclosure"   => [
                                '@attributes' => [
                                    "url"    => "https://www.hipsters.tech/episode03.mp3",
                                    "length" => "31911392",
                                    "type"   => "audio/mpeg",
                                ]
                            ]
                        ],
                        [
                            "title"       => "Episode 02",
                            "link"        => "https://podcast.com/episode02",
                            "pubDate"     => "Tue, 01 Sep 2022 19:35:14 +0000",
                            "guid"        => "https://www.hipsters.tech/?p=2",
                            "description" => "episode description...",
                            "enclosure"   => [
                                '@attributes' => [
                                    "url"    => "https://www.hipsters.tech/episode02.mp3",
                                    "length" => "31911392",
                                    "type"   => "audio/mpeg",
                                ]
                            ]
                        ],
                        [
                            "title"       => "Episode 01",
                            "link"        => "https://podcast.com/episode01",
                            "pubDate"     => "Tue, 25 Out 2022 09:22:42 +0000",
                            "guid"        => "https://www.hipsters.tech/?p=1",
                            "description" => "episode description...",
                            "enclosure"   => [
                                '@attributes' => [
                                    "url"    => "https://www.hipsters.tech/episode01.mp3",
                                    "length" => "31911392",
                                    "type"   => "audio/mpeg",
                                ]
                            ]
                        ]
                    ],
                ]
            ]);

        return $stub;
    }
}
