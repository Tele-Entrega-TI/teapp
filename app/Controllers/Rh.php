<?php 

namespace App\Controllers;

class Rh {

    public function index() {
        
        $view = new \Core\View("home/rh");
        $view->load();
    }
}
