<?php

namespace App\Transformers;

abstract class Transformer
{
    public function transformCollection(array $items)
    {
        return array_map(function($item){
            return $this->transform($item->toArray());
        }, $items);
    }

    abstract public function transform(array $item);
}
