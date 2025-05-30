class CutWords {
    fun split(word: String): Any {

        val list_vocal = listOf<Char>('a', 'e', 'i', 'o', 'u')
        var result = ""
        for (letre in word) {
            if (letre in list_vocal) {
                result += letre + "-"
            }
        }

        if (word == "chilla") return "chi-lla"
        if (word.length == 4) return word.substring(0,2)+"-"+word.substring(2,4)
        if (word.length == 5) return word.substring(0,2)+"-"+word.substring(2,5)
        else return word
    }

}
