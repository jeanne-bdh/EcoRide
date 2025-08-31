<?php

namespace App\Controller;

class PageController extends Controller
{
    public function home(): void
    {
        $this->render("pages/home");
    }

    public function cgu(): void
    {
        $this->render("pages/legal-infos/cgu");
    }

    public function cookieManagement(): void
    {
        $this->render("pages/legal-infos/cookie-management");
    }

    public function legalInfos(): void
    {
        $this->render("pages/legal-infos/legal_infos");
    }

    public function privacyPolicy(): void
    {
        $this->render("pages/legal-infos/privacy_policy");
    }
}
