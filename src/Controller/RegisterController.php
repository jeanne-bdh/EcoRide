<?php

namespace App\Controller;

class RegisterController extends Controller
{
    public function register(): void
    {
        $this->render("pages/auth/register_form");
    }
}