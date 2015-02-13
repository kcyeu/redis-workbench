<?php
class ErrorReporting 
{
    const ERR_MSG = array(
        // 2xx
        200 => "OK",
        201 => "Created",
        202 => "Accepted",
        206 => "Partial Content",
        // 4xx
        401 => "Unauthorized %s",
        403 => "Forbidden %s",
        422 => "Unprocessable Entity %s",
        429 => "Too Many Requests",
        // 5xx
        500 => "Internal Server Error",
        // 60x file operations
        600 => "I/O Error: Cannot read file %s",
        601 => "I/O Error: Cannot write file %s",
        602 => "I/O Error: Cannot rename file %s",
        603 => "I/O Error: Cannot delete file %s",
        604 => "I/O Error: Cannot create directory %s",
        // 999 fallback of unidentified error
        999 => "Unknown error, original error code %d",
    );

    /*
     *
     * @ref https://tools.ietf.org/html/rfc7231#section-6
     *  1xx (Informational)
     *  2xx (Successful)
     *  3xx (Redirection)
     *  4xx (Client Error)
     *  5xx (Server Error)
     *  6xx (Extended Server Error)
     */
    public static function get_error_message($error_code, $info = array())
    {
        if (array_key_exists($error_code, self::ERR_MSG))
        {
            $message = vsprintf(self::ERR_MSG[$error_code], $info);
            return array($error_code, $message);
        }

        return array(999, vsprintf(self::ERR_MSG[999], $error_code));
    }
}

