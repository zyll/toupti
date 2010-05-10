<?php
/**
 * @package Toupti
 */
class TouptiResponse
{
    protected $headers = array();

    protected static $phrases = array(

        // 1xx: Informational - Request received, continuing process
        100 => 'Continue',
        101 => 'Switching Protocols',

        // 2xx: Success - The action was successfully received, understood and
        // accepted
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',

        // 3xx: Redirection - Further action must be taken in order to complete
        // the request
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',  // 1.1
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        307 => 'Temporary Redirect',

        // 4xx: Client Error - The request contains bad syntax or cannot be
        // fulfilled
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Requested Range Not Satisfiable',
        417 => 'Expectation Failed',

        // 5xx: Server Error - The server failed to fulfill an apparently
        // valid request
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported',
        509 => 'Bandwidth Limit Exceeded',

    );

    /**
     * Set HTTP Status code
     */
    public function set_status($code)
    {
        $this->headers['Status'] = 'HTTP/1.1 '. $code . ' '. self::$phrases[$code];
    }
    /**
     * Set HTTP Header
     * @param String $header header name (like Content-Type)
     * @param String $value header value (like text/xml)
     */
    public function set_header($header, $value)
    {
        $this->headers[$header] = $value;
    }
    /**
     * Return HTTP header
     * @param String $header header name
     * @return String header value or null
     */
    public function get_header($header)
    {
        if (array_key_exists($header, $this->headers))
            return $this->headers[$header];
        return null;
    }
    /**
     * Return all HTTP headers
     * @return Array http header value
     */
    public function get_headers()
    {
        return $this->headers;
    }
}
