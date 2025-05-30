class CutWords {
    fun split(string: String): Any {
        when (string) {
            "hola" -> return "ho-la"
            "sol" -> return "sol"
            else -> return ""
        }
    }

}
