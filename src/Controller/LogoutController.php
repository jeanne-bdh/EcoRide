<?php

namespace App\Controller;

use App\Service\SessionManager;

class LogoutController extends Controller
{
    public function logout(): void
    {
        $session = new SessionManager();
        $session->logout();

        $this->render("pages/auth/login_form");
    }
}
