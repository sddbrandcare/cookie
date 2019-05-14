<?php

namespace SddBrandCare\Cookie;

use Symfony\Component\HttpFoundation\Response as ResponseSymfony;

/**
 * Response represents an HTTP response.
 *
 */
class Response extends ResponseSymfony
{
    /**
     * Sends HTTP headers.
     *
     * @return Response
     */
    public function sendHeaders()
    {
        // headers have already been sent by the developer
        if (headers_sent()) {
            return $this;
        }
        // headers
        foreach ($this->headers->allPreserveCaseWithoutCookies() as $name => $values) {
            $replace = 0 === strcasecmp($name, 'Content-Type');
            foreach ($values as $value) {
                header($name.': '.$value, $replace, $this->statusCode);
            }
        }
        // cookies
        foreach ($this->headers->getCookies() as $cookie) {
            header('Set-Cookie: '.$cookie->getName().strstr($cookie, '='), false, $this->statusCode);
        }
        // status
        header(sprintf('HTTP/%s %s %s', $this->version, $this->statusCode, $this->statusText), true, $this->statusCode);
        return $this;
    }
}
