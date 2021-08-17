<?php

namespace IBill\Models;

use IBill\Exceptions\ApiException;

class Model
{
    public function toArray(): array
    {
        return [];
    }

    public function validateExists(array $attributes, array $keys)
    {
        foreach ($keys as $key) {
            if (!isset($attributes[$key])) {
                throw new ApiException("Please provide the {$key} attribute.");
            }
        }
    }
}
