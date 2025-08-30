<?php

namespace App\Controller;



class PageController extends Controller
{
    public function home(): void
    {
        $this->render("page/home", [
            "test" => 'test'
        ]);
    }
}
