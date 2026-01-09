<?php

namespace Larawise\Buildfy\Builders;

use Illuminate\Support\HtmlString;
use Larawise\Service\CacheService;
use Larawise\Support\Enums\TTL;

class SvgBuilder
{
    protected array $buffer = [];

    /**
     * Create a new svg builder instance.
     *
     * @param AttributeBuilder $attributes
     * @param CacheService $cache
     *
     * @return void
     */
    public function __construct(
        protected AttributeBuilder $attributes,
        protected CacheService $cache,
    ) {}

    /**
     * Generate an inline <svg> tag.
     *
     * @param array $attributes SVG attributes (e.g. width, height, viewBox)
     * @param string $content Inner SVG markup
     *
     * @return HtmlString
     */
    public function svg($attributes = [], $content = '')
    {
        return new HtmlString("<svg{$this->attributes->build($attributes)}>{$content}</svg>");
    }

    /**
     * Add a DSL call to the internal buffer.
     *
     * @param string $method DSL method name (e.g. circle, text)
     * @param array $args Arguments to pass to the method
     *
     * @return $this
     */
    public function buffer($method, $args = [])
    {
        $this->buffer[] = $this->{$method}(...$args);

        return $this;
    }

    /**
     * Render the buffered SVG content into a single <svg> tag.
     *
     * @param array $attributes SVG attributes (e.g. width, height, viewBox)
     * @param string|null $key Optional cache key to store/retrieve rendered output
     * @param int $ttl Cache lifetime in seconds (default: -1)
     *
     * @return HtmlString
     */
    public function render(array $attributes = [], $key = null, $ttl = TTL::FOREVER)
    {
        if ($key) {
            return $this->cache->remember("buildfy:svg:{$key}", $ttl, fn () => $this->renderRaw($attributes));
        }

        return $this->renderRaw($attributes);
    }

    /**
     * Render the buffered SVG content without caching.
     *
     * @param array $attributes
     *
     * @return HtmlString
     */
    protected function renderRaw($attributes)
    {
        $content = implode("\n", $this->buffer);

        $this->buffer = [];

        return new HtmlString("<svg{$this->attributes->build($attributes)}>{$content}</svg>");
    }

    /**
     * Reference a symbol via <use>.
     *
     * @param string $href Symbol reference (e.g. #icon-id)
     * @param array $attributes Additional attributes
     *
     * @return string
     */
    public function use($href, $attributes = [])
    {
        $attributes['xlink:href'] = $href;

        return $this->selfClosing('use', $attributes);
    }

    /**
     * Define a reusable <symbol>.
     *
     * @param string $id Symbol ID
     * @param array $attributes Additional attributes
     * @param string $content Inner SVG markup
     *
     * @return string
     */
    public function symbol($id, $attributes = [], $content = '')
    {
        $attributes['id'] = $id;

        return $this->wrap('symbol', $attributes, $content);
    }

    /**
     * Draw a <path> element.
     *
     * @param string $d Path definition
     * @param array $attributes Additional attributes
     *
     * @return string
     */
    public function path($d, $attributes = [])
    {
        $attributes['d'] = $d;

        return $this->selfClosing('path', $attributes);
    }

    /**
     * Draw a <circle>.
     *
     * @param float $cx X center
     * @param float $cy Y center
     * @param float $r Radius
     * @param array $attributes Additional attributes
     *
     * @return string
     */
    public function circle($cx, $cy, $r, $attributes = [])
    {
        $attributes += ['cx' => $cx, 'cy' => $cy, 'r' => $r];

        return $this->selfClosing('circle', $attributes);
    }

    /**
     * Draw a <rect>.
     *
     * @param float $x X position
     * @param float $y Y position
     * @param float $width Width
     * @param float $height Height
     * @param array $attributes Additional attributes
     *
     * @return string
     */
    public function rect($x, $y, $width, $height, $attributes = [])
    {
        $attributes += ['x' => $x, 'y' => $y, 'width' => $width, 'height' => $height];

        return $this->selfClosing('rect', $attributes);
    }

    /**
     * Draw a <line>.
     *
     * @param float $x1 Start X
     * @param float $y1 Start Y
     * @param float $x2 End X
     * @param float $y2 End Y
     * @param array $attributes Additional attributes
     *
     * @return string
     */
    public function line($x1, $y1, $x2, $y2, $attributes = [])
    {
        $attributes += ['x1' => $x1, 'y1' => $y1, 'x2' => $x2, 'y2' => $y2];

        return $this->selfClosing('line', $attributes);
    }

    /**
     * Draw a <polyline>.
     *
     * @param array $points Array of coordinate pairs
     * @param array $attributes Additional attributes
     *
     * @return string
     */
    public function polyline($points, $attributes = [])
    {
        $attributes['points'] = implode(' ', $points);

        return $this->selfClosing('polyline', $attributes);
    }

    /**
     * Draw a <polygon>.
     *
     * @param array $points Array of coordinate pairs
     * @param array $attributes Additional attributes
     *
     * @return string
     */
    public function polygon($points, $attributes = [])
    {
        $attributes['points'] = implode(' ', $points);

        return $this->selfClosing('polygon', $attributes);
    }

    /**
     * Render a <text> element.
     *
     * @param string $content Text content
     * @param float $x X position
     * @param float $y Y position
     * @param array $attributes Additional attributes
     *
     * @return string
     */
    public function text($content, $x = 0, $y = 0, $attributes = [])
    {
        $attributes += ['x' => $x, 'y' => $y];

        return $this->wrap('text', $attributes, $content);
    }

    /**
     * Group elements with <g>.
     *
     * @param array $attributes Group attributes
     * @param string $content Inner elements
     *
     * @return string
     */
    public function group($attributes = [], $content = '')
    {
        return $this->wrap('g', $attributes, $content);
    }

    /**
     * Wrap content in <defs>.
     *
     * @param string $content Inner definitions
     *
     * @return string
     */
    public function defs($content)
    {
        return "<defs>{$content}</defs>";
    }

    /**
     * Define a <mask>.
     *
     * @param string $id Mask ID
     * @param array $attributes Additional attributes
     * @param string $content Inner elements
     *
     * @return string
     */
    public function mask($id, $attributes = [], $content = '')
    {
        $attributes['id'] = $id;

        return $this->wrap('mask', $attributes, $content);
    }

    /**
     * Define a <clipPath>.
     *
     * @param string $id Clip path ID
     * @param array $attributes Additional attributes
     * @param string $content Inner elements
     *
     * @return string
     */
    public function clipPath($id, $attributes = [], $content = '')
    {
        $attributes['id'] = $id;

        return $this->wrap('clipPath', $attributes, $content);
    }

    /**
     * Define a <pattern>.
     *
     * @param string $id Pattern ID
     * @param array $attributes Additional attributes
     * @param string $content Inner pattern content
     *
     * @return string
     */
    public function pattern($id, $attributes = [], $content = '')
    {
        $attributes['id'] = $id;

        return $this->wrap('pattern', $attributes, $content);
    }

    /**
     * Define a <filter>.
     *
     * @param string $id Filter ID
     * @param array $attributes Additional attributes
     * @param string $content Inner filter content
     *
     * @return string
     */
    public function filter($id, $attributes = [], $content = '')
    {
        $attributes['id'] = $id;

        return $this->wrap('filter', $attributes, $content);
    }

    /**
     * Add a <title> element.
     *
     * @param string $content Title text
     *
     * @return string
     */
    public function title($content)
    {
        return "<title>{$content}</title>";
    }

    /**
     * Add a <desc> element.
     *
     * @param string $content Description text
     *
     * @return string
     */
    public function desc($content)
    {
        return "<desc>{$content}</desc>";
    }

    /**
     * Define a <view>.
     *
     * @param array $attributes View attributes
     * @param string $content Inner content
     *
     * @return string
     */
    public function view($attributes = [], $content = '')
    {
        return $this->wrap('view', $attributes, $content);
    }

    /**
     * Add inline <style>.
     *
     * @param string $css CSS rules
     *
     * @return string
     */
    public function style($css)
    {
        return "<style>{$css}</style>";
    }

    /**
     * Animate an attribute with <animate>.
     *
     * @param string $attributeName Target attribute name (e.g. fill, opacity)
     * @param array $attributes Additional animation attributes (e.g. from, to, dur)
     *
     * @return string
     */
    public function animate($attributeName, $attributes = [])
    {
        $attributes['attributeName'] = $attributeName;

        return $this->wrap('animate', $attributes);
    }

    /**
     * Animate a transform with <animateTransform>.
     *
     * @param string $type Transform type (e.g. rotate, scale, translate)
     * @param array $attributes Additional animation attributes
     *
     * @return string
     */
    public function animateTransform($type, $attributes = [])
    {
        $attributes['type'] = $type;

        return $this->wrap('animateTransform', $attributes);
    }

    /**
     * Define a <linearGradient>.
     *
     * @param string $id Gradient ID
     * @param array $attributes Gradient attributes (e.g. x1, y1, x2, y2)
     * @param string $content Inner <stop> tags
     *
     * @return string
     */
    public function linearGradient($id, $attributes = [], $content = '')
    {
        $attributes['id'] = $id;

        return $this->wrap('linearGradient', $attributes, $content);
    }

    /**
     * Define a <radialGradient>.
     *
     * @param string $id Gradient ID
     * @param array $attributes Gradient attributes (e.g. cx, cy, r)
     * @param string $content Inner <stop> tags
     *
     * @return string
     */
    public function radialGradient($id, $attributes = [], $content = '')
    {
        $attributes['id'] = $id;

        return $this->wrap('radialGradient', $attributes, $content);
    }

    /**
     * Internal: wrap content in a tag.
     *
     * @param string $tag Tag name
     * @param array $attributes HTML attributes
     * @param string $content Inner markup
     *
     * @return string
     */
    protected function wrap($tag, $attributes = [], $content = '')
    {
        return "<{$tag}{$this->attributes->build($attributes)}>{$content}</{$tag}>";
    }

    /**
     * Internal: generate a self-closing tag.
     *
     * @param string $tag Tag name
     * @param array $attributes HTML attributes
     *
     * @return string
     */
    protected function selfClosing($tag, $attributes = [])
    {
        return "<{$tag}{$this->attributes->build($attributes)} />";
    }
}
