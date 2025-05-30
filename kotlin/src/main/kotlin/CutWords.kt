class CutWords {
    fun split(word: String): Any {
        if (word.length == 4) return word.substring(0,2)+"-"+word.substring(2,4)
        else return word
    }

}
