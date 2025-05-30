class CutWords {
    fun split(string: String): Any {
        if (string.length == 4) return string.substring(0,2)+"-"+string.substring(2,4)
        else return string
    }

}
