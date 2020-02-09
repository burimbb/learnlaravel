<?php

namespace App\Transformers;

class TagTransformer extends Transformer
{
    /**
     * Create new public function
     */
    public function transform(array $tag)
    {
        return [
            'body' => $tag['body']
        ];
    }
}
