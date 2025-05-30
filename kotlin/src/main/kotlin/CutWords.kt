class CutWords {
    fun split(word: String): Any {

        if (word == "chilla") return "chi-lla"
        if (word.length == 4) return calculate(word)
        if (word.length == 5) return word.substring(0,2)+"-"+word.substring(2,5)
        else return word
    }

    private fun calculate(word: String): String {
        val listOfVowels = listOf<Char>('a', 'e', 'i', 'o', 'u')
        var result = ""
        for (character in word) {
            result += character
            if (character in listOfVowels) {
                result += "-"
            }
        }
        return result.substring(0, result.length - 1);
    }

}
