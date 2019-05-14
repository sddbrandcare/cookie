<?php

namespace SddBrandCare\Cookie;

use Illuminate\Routing\ResponseFactory as ResponseFactorySymfony;

class ResponseFactory extends ResponseFactorySymfony
{
    /**
     * Return a new response from the application.
     *
     * @param  string  $content
     * @param  int  $status
     * @param  array  $headers
     * @return Response
     */
    public function make($content = '', $status = 200, array $headers = [])
    {
        return new Response($content, $status, $headers);
    }
}
