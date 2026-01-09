<?php

namespace Larawise\Buildfy\Components;

use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Support\HtmlString;

class AssetComponent
{
    public function __construct(protected UrlGenerator $url) {}

    /**
     * Generate a <script> tag.
     *
     * @param string $url Asset path or full URL
     * @param array $attributes Additional HTML attributes
     * @param bool|null $secure Force HTTPS if true
     * @return HtmlString
     */
    public function script(string $url, array $attributes = [], ?bool $secure = null): HtmlString
    {
        if (trim($url) === '') return new HtmlString('');

        $attributes['src'] = $this->resolve($url, $secure);
        $attr = (new AttributeBuilder())->build($attributes);

        return new HtmlString("<script{$attr}></script>");
    }

    /**
     * Generate a <link> tag for CSS.
     *
     * @param string $url Asset path or full URL
     * @param array $attributes Additional HTML attributes
     * @param bool|null $secure Force HTTPS if true
     * @return HtmlString
     */
    public function style(string $url, array $attributes = [], ?bool $secure = null): HtmlString
    {
        if (trim($url) === '') return new HtmlString('');

        $attributes += [
            'media' => 'all',
            'type' => 'text/css',
            'rel' => 'stylesheet',
        ];

        $attributes['href'] = $this->resolve($url, $secure);
        $attr = (new AttributeBuilder())->build($attributes);

        return new HtmlString("<link{$attr}>");
    }

    protected function resolve(string $url, ?bool $secure = null): string
    {
        return str_starts_with($url, 'http') ? $url : $this->url->asset($url, $secure);
    }
}
