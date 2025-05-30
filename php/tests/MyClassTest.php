<?php declare(strict_types=1);

namespace KataTests;

use Kata\CutWords;
use PHPUnit\Framework\TestCase;

class MyClassTest extends TestCase
{
    /** @test */
    public function give_me_a_good_name_please(): void
    {
        $cutter = new CutWords();

        $result = $cutter->word("maraca");

        self::assertSame("ma-ra-ca", $result);
    }
}
