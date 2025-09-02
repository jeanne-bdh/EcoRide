<?php
return [
    "/" => ["controller" => "App\Controller\PageController", "action" => "home"],
    "/cgu/" => ["controller" => "App\Controller\PageController", "action" => "cgu"],
    "/cookieManagement/" => ["controller" => "App\Controller\PageController", "action" => "cookieManagement"],
    "/legalInfos/" => ["controller" => "App\Controller\PageController", "action" => "legalInfos"],
    "/privacyPolicy/" => ["controller" => "App\Controller\PageController", "action" => "privacyPolicy"],

    "/logout/" => ["controller" => "App\Controller\LogoutController", "action" => "logout"],

    "/login/" => ["controller" => "App\Controller\LoginController", "action" => "login"],
    "/login/show/" => ["controller" => "App\Controller\LoginController", "action" => "show"],

    "/session/" => ["controller" => "App\Controller\SessionController", "action" => "session"],

    "/personal/" => ["controller" => "App\Controller\PersonalController", "action" => "personal"],

    "/newCarpool/" => ["controller" => "App\Controller\NewCarpoolController", "action" => "newCarpool"],

    "/admin/" => ["controller" => "App\Controller\AdminController", "action" => "admin"],

    "/register/" => ["controller" => "App\Controller\RegisterController", "action" => "register"],
    "/register/form/" => ["controller" => "App\Controller\RegisterController", "action" => "form"],

    "/carpools/search/" => ["controller" => "App\Controller\CarpoolController", "action" => "search"],
    "/carpools/results/" => ["controller" => "App\Controller\CarpoolController", "action" => "results"],
    "/carpools/details/" => ["controller" => "App\Controller\CarpoolController", "action" => "details"],
    "/carpools/history/" => ["controller" => "App\Controller\CarpoolController", "action" => "history"],
    "/carpools/future/" => ["controller" => "App\Controller\CarpoolController", "action" => "future"],

    "/contact/" => ["controller" => "App\Controller\ContactController", "action" => "contact"],
    "/contact/show/" => ["controller" => "App\Controller\ContactController", "action" => "show"],
];