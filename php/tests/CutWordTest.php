<?php

declare(strict_types=1);

namespace KataTests;

use Kata\CutWord;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class CutWordTest extends TestCase
{
    #[DataProvider('constantAndVowelCharsProvider')]
    #[DataProvider('digraphWordsProvider')]
    #[DataProvider('twoConsonantsBetweenTwoVowelsProvider')]
    #[DataProvider('threeConsonantsBetweenTwoVowelsProvider')]
    #[DataProvider('exceptionPairGroupConsonantsProvider')]
    #[DataProvider('fourConsonantsBetweenTwoVowelsProvider')]
    #[DataProvider('vowelIorUNextToAnotherVowelProvider')]
    #[DataProvider('twoVowelsTogetherProvider')]
    public function test_maraca_word(string $expected, string $word): void
    {
        $cutWord = new CutWord();

        $result = $cutWord->handle($word);

        self::assertEquals($expected, $result);
    }

    /**
     * A consonant and the following vowel are pronounced in the same syllable.
     */
    public static function constantAndVowelCharsProvider(): iterable
    {
        yield 'maraca' => ['ma-ra-ca', 'maraca'];
        yield 'tijera' => ['ti-je-ra', 'tijera'];
    }

     /**
     * Remember that the letter `h` is not pronounced except when combined with the
     * letter `c` to form `ch`. Keep in mind that `ch`, `ll`, and `rr`, although
     * written as two letters each (hence called "digraphs"), are pronounced as a
     * single sound each, and this is what counts when dividing syllables.
     */
    public static function digraphWordsProvider(): iterable
    {
        yield 'chillar' => ['chi-llar', 'chillar'];
        yield 'chorro' => ['cho-rro', 'chorro'];
    }

    /**
     * When two consonants are found between two vowels, the first generally forms a
     * syllable with the preceding vowel and the second forms a syllable with the
     * following vowel.
     */
    public static function twoConsonantsBetweenTwoVowelsProvider(): iterable
    {
        yield 'campo' => ['cam-po', 'campo'];
        yield 'salto' => ['sal-to', 'salto'];
        yield 'harto' => ['har-to', 'harto'];
        yield 'anda' => ['an-da', 'anda'];
    }

    /**
     * When three consonants are found between two vowels, the first two generally form
     * a syllable with the preceding vowel, and the third forms a syllable with the
     * following vowel.
     */
    public static function threeConsonantsBetweenTwoVowelsProvider(): iterable
    {
        yield 'insta' => ['ins-ta', 'insta'];
        yield 'obstinado' => ['obs-ti-na-do', 'obstinado'];
        yield 'superstición' => ['su-pers-ti-cion', 'supersticion'];
    }

    /**
     * The following consonant pairs (consonant groups) are normally pronounced as a
     * single syllable: `bl, br, cl, cr, dr, fl, fr, gl, kl, gr, pl, pr, tr`.
     */
    public static function exceptionPairGroupConsonantsProvider(): iterable
    {
        yield 'ha-blar' => ['ha-blar', 'hablar'];
        yield 'te-cla' => ['te-cla', 'tecla'];
        yield 'sa-cro' => ['sa-cro', 'sacro'];
        yield 'si-glo' => ['si-glo', 'si-glo'];
        yield 'ma-dre' => ['ma-dre', 'madre'];
        yield 'de-tras' => ['de-tras', 'detras'];
        yield 'can-gre-jo' => ['can-gre-jo', 'cangrejo'];
        yield 'hom-bre' => ['hom-bre', 'hombre'];
        yield 'in-flar' => ['in-flar', 'inflar'];
        yield 'san-gre' => ['san-gre', 'sangre'];
        yield 'du-pli-ca-do' => ['du-pli-ca-do', 'duplicado'];
        yield 'com-pren-der' => ['com-pren-der', 'comprender'];
        yield 'en-trar' => ['en-trar', 'entrar'];
    }

    /**
     * When four consonants are found between two vowels, the first two form a syllable
     * with the preceding vowel, and the last two form a syllable with the following
     * vowel.
     * ```
     */
    public static function fourConsonantsBetweenTwoVowelsProvider(): iterable
    {
        yield 'construir' => ['cons-truir', 'construir'];
        yield 'transplante' => ['trans-plan-te', 'transplante'];
        yield 'abstracto' => ['abs-trac-to', 'abstracto'];
        yield 'obstruir' => ['obs-truir', 'obstruir'];
    }

     /**
     * When an `i` or a `u` are next to another vowel, they are usually pronounced as a
     * single syllable.
     */
    public static function vowelIorUNextToAnotherVowelProvider(): iterable
    {
        yield 'hay' => ['hay', 'hay'];
         yield 'fui' => ['fui', 'fui'];
         yield 'pues' => ['pues', 'pues'];
         yield 'cual' => ['cual', 'cual'];
     }

     /**
     * When two vowels come together, but neither of them is `i` nor `u`, they are
     * usually pronounced in a different syllable.
     */
    public static function twoVowelsTogetherProvider(): iterable
    {
        yield 'oeste' => ['o-es-te', 'oeste'];
        yield 'boa' => ['bo-a', 'boa'];
        yield 'Bilbao' => ['bil-ba-o', 'bilbao'];
     }
}
