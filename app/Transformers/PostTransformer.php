<?php

namespace App\Transformers;

class PostTransformer extends Transformer
{
    public function transform(array $post)
    {
        return [
            'title' => $post['title'],
            'body' => $post['body'],
            'active' => $post['active']
        ];
    }
}