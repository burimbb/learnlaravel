<?php

interface BookInterface
{
    public function open();

    public function turnPage();
}

class Book implements BookInterface
{
    public function open()
    {
        var_dump('book reading');
    }

    public function turnPage()
    {
        var_dump('flipin side the book');
    }
}

interface eReaderInterface
{
    public function turnOn();

    public function pressNextPage();
}

class Kindle implements eReaderInterface
{
    public function turnOn()
    {
        var_dump('kindle turnOn');
    }

    public function pressNextPage()
    {
        var_dump('kindle pressNextPage');
    }
}

class Note implements eReaderInterface
{
    public function turnOn()
    {
        var_dump('note turnOn');
    }

    public function pressNextPage()
    {
        var_dump('note pressNextPage');
    }
}

class eReaderAdapter implements BookInterface
{
    protected $reader;

    public function __construct(eReaderInterface $reader)
    {
        $this->reader = $reader;
    }

    public function open()
    {
        $this->reader->turnOn();
    }
    
    public function turnPage()
    {
        $this->reader->pressNextPage();
    }
}

class Person
{
    public function read(BookInterface $book)
    {
        $book->open();
        $book->turnPage();
    }
}

(new Person)->read(new Book);
(new Person)->read(new eReaderAdapter(new Kindle));
(new Person)->read(new eReaderAdapter(new Note));
