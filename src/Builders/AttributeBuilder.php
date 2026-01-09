<?php

namespace Larawise\Buildfy\Builders;

class AttributeBuilder
{
    public function build(array $attributes): string
    {
        $html = [];

        foreach ($attributes as $key => $value) {
            $element = $this->element($key, $value);
            if ($element !== null) {
                $html[] = $element;
            }
        }

        return $html ? ' ' . implode(' ', $html) : '';
    }

    protected function element(string|int $key, mixed $value): ?string
    {
        if (is_numeric($key)) {
            return is_string($value) ? $value : null;
        }

        if (is_bool($value) && $key !== 'value') {
            return $value ? $key : null;
        }

        if (is_array($value) && $key === 'class') {
            return 'class="' . implode(' ', $value) . '"';
        }

        return !empty($value)
            ? $key . '="' . e($value, false) . '"'
            : null;
    }
}
