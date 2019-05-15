<?php

namespace SddBrandCare\Cookie;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Routing\ResponseFactory as ResponseFactorySymfony;
use JsonSerializable;

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

    /**
     * Return a new JSON response from the application.
     *
     * @param  string|array  $data
     * @param  int  $status
     * @param  array  $headers
     * @param  int  $options
     * @return JsonResponse
     */
    public function json($data = [], $status = 200, array $headers = [], $options = 0)
    {
        if ($data instanceof Arrayable && ! $data instanceof JsonSerializable) {
            $data = $data->toArray();
        }

        return new JsonResponse($data, $status, $headers, $options);
    }
}
