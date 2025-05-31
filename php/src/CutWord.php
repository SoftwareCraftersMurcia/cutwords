<?php

declare(strict_types=1);

namespace Kata;

final class CutWord
{
    private const VOWELS = ['a', 'e', 'i', 'o', 'u'];
    private const CONSONANTS = ['b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'ñ', 'p', 'q', 'r', 's', 't', 'v', 'w', 'x', 'y', 'z'];
    private const DIGRAPHS = ['ch', 'll', 'rr', 'qu', 'gu'];
    private const CONSONANT_PAIRS = ['bl', 'br', 'cl', 'cr', 'dr', 'fl', 'fr', 'gl', 'kl', 'gr', 'pl', 'pr', 'tr'];

    public function handle(string $word): string
    {
        $syllables = [];
        $syllable = '';

        $phonems = $this->transformWordIntoPhonems($word);
        foreach ($phonems as $i => $currentPhonem) {
            $syllable .= $currentPhonem;

            if ($this->isLastPhonemSingleConsonant($phonems, $i)) {
                continue;
            }

             if ($this->vv($phonems, $i)) {
                 $syllables[] = $syllable;
                 $syllable = '';
             }

             if ($this->vcCcv($phonems, $i)) {
                 $syllables[] = $syllable;
                 $syllable = '';
             }

            if ($this->vCcv($phonems, $i)) {
                $syllables[] = $syllable;
                $syllable = '';
            }

            if ($this->vCcv($phonems, $i + 1) === false // ca=m-po
                && $this->vcCcv($phonems, $i + 2) === false // su-pe=rs-ti-cion
                && $this->cVc($phonems, $i)
            ) {
                $syllables[] = $syllable;
                $syllable = '';
            }
        }

        $syllables[] = $syllable;

        return implode('-', $syllables);
    }

    private function transformWordIntoPhonems(string $word): array
    {
        $phonems = [];
        for ($i = 0, $iMax = strlen($word); $i < $iMax; $i++) {
            if ($this->isDigraph($word, $i)) {
                $phonems[] = $word[$i] . $word[++$i];
                continue;
            }

            $phonems[] = $word[$i];
        }

        return $phonems;
    }

    private function isDigraph(string $phonem, int $currentPosition): bool
    {
        $currentLetter = $phonem[$currentPosition];
        $nextLetter = $phonem[$currentPosition + 1] ?? '';

        return in_array($currentLetter . $nextLetter, [...self::DIGRAPHS, ...self::CONSONANT_PAIRS], true);
    }

    private function isLastPhonemSingleConsonant(array $phonem, int $currentPosition): bool
    {
        return $currentPosition + 2 === count($phonem)
            && in_array($phonem[$currentPosition + 1], self::CONSONANTS, true);
    }

    private function vv(array $phonems, int $currentPosition): bool
    {
        $currentLetter = $phonems[$currentPosition];
        $nextLetter = $this->getNextLetter($phonems, $currentPosition);

        return $this->isVowel($currentLetter)
            && in_array($currentLetter, ['a', 'e', 'o'], true)
            && $this->isVowel($nextLetter);
    }

    private function getNextLetter(array $phonem, int $currentPosition): ?string
    {
        $nextLetter = null;
        if ($currentPosition + 1 <= count($phonem)) {
            $nextLetter = $phonem[$currentPosition + 1];
        }

        return $nextLetter;
    }

    private function isVowel(?string $char): bool
    {
        return in_array($char, self::VOWELS, true);
    }

    private function vcCcv(array $phonem, int $currentPosition): bool
    {
        $previousPreviousLetter = $this->getPreviousPreviousLetter($phonem, $currentPosition);
        $previousLetter = $this->getPreviousLetter($phonem, $currentPosition);
        $currentLetter = $phonem[$currentPosition];
        $nextLetter = $this->getNextLetter($phonem, $currentPosition);
        $nextNextLetter = $this->getNextNextLetter($phonem, $currentPosition);

        return $this->isVowel($previousPreviousLetter)
            && $this->isConsonant($previousLetter)
            && $this->isConsonant($currentLetter)
            && $this->isConsonant($nextLetter)
            && $this->isVowel($nextNextLetter);
    }

    private function getPreviousPreviousLetter(array $phonem, int $currentPosition): ?string
    {
        $previousLetter = null;
        if ($currentPosition - 2 >= 0) {
            $previousLetter = $phonem[$currentPosition - 2];
        }

        return $previousLetter;
    }

    private function getPreviousLetter(array $phonem, int $currentPosition): ?string
    {
        $previousLetter = null;
        if ($currentPosition - 1 >= 0) {
            $previousLetter = $phonem[$currentPosition - 1];
        }

        return $previousLetter;
    }

    private function getNextNextLetter(array $phonem, int $currentPosition): ?string
    {
        $nextNextLetter = null;
        if ($currentPosition + 2 <= count($phonem)) {
            $nextNextLetter = $phonem[$currentPosition + 2];
        }

        return $nextNextLetter;
    }

    private function isConsonant(?string $char): bool
    {
        return in_array($char, [...self::CONSONANTS, ...self::DIGRAPHS, ...self::CONSONANT_PAIRS], true);
    }

    private function vCcv(array $phonem, int $currentPosition): bool
    {
        $previousLetter = $this->getPreviousLetter($phonem, $currentPosition);
        $currentLetter = $phonem[$currentPosition];
        $nextLetter = $this->getNextLetter($phonem, $currentPosition);
        $nextNextLetter = $this->getNextNextLetter($phonem, $currentPosition);

        return $this->isVowel($previousLetter)
            && $this->isConsonant($currentLetter)
            && $this->isConsonant($nextLetter)
            && $this->isVowel($nextNextLetter);
    }

    private function cVc(array $phonem, int $currentPosition): bool
    {
        $previousLetter = $this->getPreviousLetter($phonem, $currentPosition);
        $currentLetter = $phonem[$currentPosition];
        $nextLetter = $this->getNextLetter($phonem, $currentPosition);

        return $this->isConsonant($previousLetter)
            && $this->isVowel($currentLetter)
            && $this->isConsonant($nextLetter);
    }
}
