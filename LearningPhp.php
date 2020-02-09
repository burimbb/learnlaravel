<?php

abstract class Objectt
{
    protected $name;

    /**
     * Constructor of this class LearningPhp
     */
    public function __construct($name)
    {
    }
}

class Square extends Objectt
{
    /**
     * Create new public function
     */
    public static function __callStatic($name, $arguments)
    {
        var_dump('Static: ' . $name);
    }

    /**
     * Create new public function
     */
    public function __call($name, $arguments)
    {
        var_dump('Jo static: ' . $name);
    }

    /**
     * Constructor of this class LearningPhp
     */
    public function __construct($name)
    {
        parent::__construct($name);
    }

    /**
     * Create new public function
     */
    public function getName()
    {
        return $this->name;
    }
}

/* $sq = new Square('Katror');
var_dump($sq::test(1, 2));
var_dump($sq); */

class Learning
{
    public static $age = 2;
}

Learning::$age++;
Learning::$age++;
Learning::$age++;

var_dump(Learning::$age);
