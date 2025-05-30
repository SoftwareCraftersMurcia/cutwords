<?php

declare(strict_types=1);

namespace Kata;

class CutWords
{
    public function word(string $word): string
    {
        $previousChars = "";
        $syllables = [];

        $list = str_split($word);
        for ($i = 0, $iMax = count($list); $i < $iMax; $i++) {
            $char = $list[$i];

            if ($this->rule2($word, $i)) {
                $syllables[] = $previousChars . $char.$list[$i+1];
                $previousChars = '';
                $i++;
                continue;
            }

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

    private function isConsonant(string $char): bool
    {
        return !$this->isVowel($char);
    }

    public function rule1(string $word, int $pos): bool
    {
        $previousChar = $word[$pos - 1];
        $char = $word[$pos];

        return $previousChar !== "" &&
            !$this->isVowel($previousChar) &&
            $this->isVowel($char);
    }

    public function rule2(string $word, int $pos): bool
    {
        if (strlen($word) < $pos + 4) {
            return false;
        }

        return $this->isVowel($word[$pos])
            && $this->isConsonant($word[$pos + 1])
            && $this->isConsonant($word[$pos + 2])
            && $this->isVowel($word[$pos + 3])
            && $word[$pos + 1] !== $word[$pos + 2];
    }
}
