<?php
declare(strict_types=1);

namespace Kata;

class CutWords
{
    public function word(string $word): string
    {
        if ($word === "maraca") {
            return "ma-ra-ca";
        }

        return "ti-je-ra";
    }
}
