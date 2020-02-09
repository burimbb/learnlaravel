<?php

/**
 * Create new public function
 */
function create($model, $params = [])
{
    return factory($model)->create($params);
}

/**
 * Create new public function
 */
function make($model, $params = [])
{
    return factory($model)->make($params);
}