<?php declare(strict_types=1);

namespace KataTests;

use Kata\CutWords;
use PHPUnit\Framework\TestCase;

class MyClassTest extends TestCase
{
    public function test_maraca(): void
    {
        $cutter = new CutWords();

        $result = $cutter->word("maraca");

        self::assertSame("ma-ra-ca", $result);
    }

    public function test_tijera(): void
    {
        $cutter = new CutWords();

        $result = $cutter->word("tijera");

        self::assertSame("ti-je-ra", $result);
    }
}
