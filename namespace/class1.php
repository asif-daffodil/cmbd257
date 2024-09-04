<?php

namespace myNamespace1;

class myClass
{
    public $name = "Asif";

    public function myInfo(): string
    {
        return "My name is " . $this->name;
    }
}
