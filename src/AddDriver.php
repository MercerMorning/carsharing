<?php

namespace App;
trait AddDriver
{
    protected $onDriver = false;
    public function setDriver(){
        $this->onDriver = true;
    }
    public function deleteDriver(){
        if ($this->onDriver == true) {
            $this->price -= 100;
        }
        $this->onDriver = false;
    }
}