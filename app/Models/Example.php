<?php

namespace App\Models;




class Example
{

    //protected $foo;

    // public function __construct($foo)
    // {
    //     $this->foo = $foo;
    // }

    // public function __contruct()
    // {
    //     $this->foo = "Empty Contructor";
    // }

    protected $collaborator;

    protected $foo;

    public function __construct(Collaborator $collaborator, $foo)
    {
        $this->collaborator = $collaborator;
        $this->foo = $foo;
    }


    public function go(){
        dump("It Works!");
    }
}
