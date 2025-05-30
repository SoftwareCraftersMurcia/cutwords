import org.junit.jupiter.api.Assertions
import org.junit.jupiter.api.DynamicTest
import org.junit.jupiter.api.Test
import org.junit.jupiter.api.TestFactory

class CutWordsTest {

    @Test
    fun returns_all_word_when_is_a_single_syllable() {
        val cutWords = CutWords()
        Assertions.assertEquals("lo", cutWords.split("lo"))
    }

    @TestFactory
    fun split_words_with_two_syllables() = listOf(
        "hola" to "ho-la",
        "casa" to "ca-sa",
        "maraca" to "ma-ra-ca",
        "meson" to "me-son",
        "chilla" to "chi-lla",
        "sol" to "sol",
        "chorro" to "cho-rro"
    ).map { (input, expected) ->
        DynamicTest.dynamicTest("given $input expected $expected") {
            val cutWords = CutWords()
            Assertions.assertEquals(expected, cutWords.split(input))
        }
    }



}
