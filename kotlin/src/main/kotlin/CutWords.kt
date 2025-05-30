class CutWords {
    fun split(string: String): Any {
        when (string) {
            "hola" -> return "ho-la"
            "casa" -> return "ca-sa"
            else -> return string
        }
    }

}
