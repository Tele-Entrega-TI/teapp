<?php

namespace Core;

class URL
{
    private string $link;

    public function __construct($link)
    {
        $this->link = $link;
    }

    public function validarURL()
    {
        if(file_exists('app/controllers/'.$this->link.'.php'))
        {
            return true;
        } else {
            return false;
        }
    }
    
}