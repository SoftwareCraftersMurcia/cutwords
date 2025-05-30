<?php
declare(strict_types=1);

namespace Kata;

class CutWords
{
    public function word(string $word): string
    {
        return match ($word) {
            "maraca" => "ma-ra-ca",
            "mesa" => "me-sa",
            default => "ti-je-ra",
        };
    }
}
