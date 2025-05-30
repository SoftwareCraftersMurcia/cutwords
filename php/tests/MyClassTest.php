<?php declare(strict_types=1);

namespace KataTests;

use Kata\CutWords;
use PHPUnit\Framework\TestCase;

class MyClassTest extends TestCase
{
    private CutWords $cutter;

    protected function setUp(): void
    {
        $this->cutter = new CutWords();
    }

    public function test_maraca(): void
    {
        $result = $this->cutter->word("maraca");

        self::assertSame("ma-ra-ca", $result);
    }

    public function test_tijera(): void
    {
        $result = $this->cutter->word("tijera");

        self::assertSame("ti-je-ra", $result);
    }

    public function test_mesa(): void
    {
        $result = $this->cutter->word("mesa");

        self::assertSame("me-sa", $result);
    }

    public function test_chilla(): void
    {
        $result = $this->cutter->word("chilla");

        self::assertSame("chi-lla", $result);
    }

    public function test_chorro(): void
    {
        $result = $this->cutter->word("chorro");

        self::assertSame("cho-rro", $result);
    }

    public function test_campo(): void
    {
        $result = $this->cutter->word("campo");

        self::assertSame("cam-po", $result);
    }
}
