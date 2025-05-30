import org.junit.jupiter.api.Assertions
import org.junit.jupiter.api.DynamicTest
import org.junit.jupiter.api.Test
import org.junit.jupiter.api.TestFactory

class CutWordsTest {

    @Test
    fun split_words_with_single_syllable() {
        val cutWords = CutWords()
        Assertions.assertEquals("sol", cutWords.split("sol"))
    }

    @TestFactory
    fun dynamicTestExample() = listOf(
        1 to 1,
        2 to 2,
        3 to 3
    ).map { (input, expected) ->
        DynamicTest.dynamicTest("given $input expected $expected") {
            Assertions.assertEquals(expected, input)
        }
    }

}
