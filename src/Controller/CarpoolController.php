<?php

namespace App\Controller;

class CarpoolController extends Controller
{
    public function carpools(): void
    {
        $this->render("pages/carpools/carpools_access");
    }
}
