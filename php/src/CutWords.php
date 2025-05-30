<?php

declare(strict_types=1);

namespace Kata;

class CutWords
{
    public function word(string $word): string
    {
        $previousChars = "";
        $syllables = [];

        foreach (str_split($word) as $i => $char) {
            if ($this->rule1($word, $i)) {
                $syllables[] = $previousChars . $char;
                $previousChars = '';
                continue;
            }

            $previousChars .= $char;
        }
        return implode("-", $syllables);
    }

    private function isVowel(string $char): bool
    {
        $vowels = ['a', 'e', 'i', 'o', 'u'];

        return in_array($char, $vowels);
    }

    public function rule1(string $word, int $pos): bool
    {
        $previousChar = $word[$pos - 1];
        $char = $word[$pos];

        return $previousChar !== "" &&
            !$this->isVowel($previousChar) &&
            $this->isVowel($char);
    }
}
