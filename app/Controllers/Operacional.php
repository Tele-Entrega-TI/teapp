<?php 

namespace App\Controllers;

class Operacional {

    public function index() {
        
        $view = new \Core\View("home/operacional");
        $view->load();
    }
}
