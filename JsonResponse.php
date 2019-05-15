<?php

namespace SddBrandCare\Cookie;

use Illuminate\Http\JsonResponse as JsonResponseSymfony;

class JsonResponse extends JsonResponseSymfony
{
    /**
     * Sends HTTP headers.
     *
     * @return JsonResponse
     */
    public function sendHeaders()
    {
        // headers have already been sent by the developer
        if (headers_sent()) {
            return $this;
        }

        if (!$this->headers->has('Date')) {
            $this->setDate(\DateTime::createFromFormat('U', time()));
        }

        // headers
        foreach ($this->headers->allPreserveCase() as $name => $values) {
            foreach ($values as $value) {
                header($name.': '.$value, false, $this->statusCode);
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
