<?php

namespace App\Controller;

class PageController extends Controller
{
    public function home():void
    {
        $this->render('page/home');
    }

    public function carpools()
    {
        $this->render('page/carpools');
    }

    public function contact()
    {
        $this->render('page/contact');
    }

    public function login()
    {
        $this->render('page/login');
    }
}
