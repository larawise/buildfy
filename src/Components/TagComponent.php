<?php

namespace Larawise\Buildfy\Components;

use Illuminate\Support\HtmlString;

class TagComponent
{
    /**
     * Generate a generic HTML tag.
     *
     * @param string $name Tag name (e.g. div, span, input)
     * @param array $attributes HTML attributes
     * @param string $content Inner HTML content
     * @return HtmlString
     */
    public function tag(string $name, array $attributes = [], string $content = ''): HtmlString
    {
        $attr = (new AttributeBuilder())->build($attributes);
        return new HtmlString("<{$name}{$attr}>{$content}</{$name}>");
    }
}
