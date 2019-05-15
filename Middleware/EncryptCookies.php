<?php

namespace SddBrandCare\Cookie\Middleware;

use SddBrandCare\Cookie\Cookie as CustomCookie;
use Symfony\Component\HttpFoundation\Cookie;
use Illuminate\Cookie\Middleware\EncryptCookies as EncryptCookiesSymfony;

class EncryptCookies extends EncryptCookiesSymfony
{
    /**
     * Duplicate a cookie with a new value.
     *
     * @param  \Symfony\Component\HttpFoundation\Cookie  $cookie
     * @param  mixed  $value
     * @return CustomCookie
     */
    protected function duplicate(Cookie $cookie, $value)
    {
        return new CustomCookie(
            $cookie->getName(), $value, $cookie->getExpiresTime(),
            $cookie->getPath(), $cookie->getDomain(), $cookie->isSecure(),
            $cookie->isHttpOnly(), $cookie->isRaw(), $cookie->getSameSite()
        );
    }
}
