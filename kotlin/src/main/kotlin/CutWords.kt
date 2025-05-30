class CutWords {
    fun split(word: String): Any {
        if (word.length == 5) return word.substring(0,2)+"-"+word.substring(2,5)
        else return calculate(word)
    }

    private fun calculate(word: String): String {
        val listOfVowels = listOf<Char>('a', 'e', 'i', 'o', 'u')


        var contadorVocales = 0
        for (letraConcreta in word){
            if (letraConcreta in listOfVowels){
                contadorVocales++
            }
        }
        if (contadorVocales == 1){
            return word
        }

        var result = ""
        for (character in word) {
            result += character
            if (character in listOfVowels) {
                result += "-"
            }
        }
        if (result[result.length - 1] == '-') {
            result = result.substring(0, result.length - 1);
        }
        return result
    }

}
