<?php
declare(strict_types=1);

namespace Kata;

class CutWords
{
    public function word(string $word): string
    {
        $previousChars = "";
        $syllables = [];

        foreach (str_split($word) as $char) {
            if ($previousChars !== "" &&
                !$this->isVowel($previousChars) &&
                $this->isVowel($char)
            ) {
                $syllables[] = $previousChars.$char;
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
}
