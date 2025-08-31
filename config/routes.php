<?php
return [
    "/" => ["controller" => "App\Controller\PageController", "action" => "home"],
    "/cgu/" => ["controller" => "App\Controller\PageController", "action" => "cgu"],
    "/cookieManagement/" => ["controller" => "App\Controller\PageController", "action" => "cookieManagement"],
    "/legalInfos/" => ["controller" => "App\Controller\PageController", "action" => "legalInfos"],
    "/privacyPolicy/" => ["controller" => "App\Controller\PageController", "action" => "privacyPolicy"],
    "/login/" => ["controller" => "App\Controller\LoginController", "action" => "login"],
    "/login/show" => ["controller" => "App\Controller\LoginController", "action" => "show"],
    "/register/" => ["controller" => "App\Controller\RegisterController", "action" => "register"],
    "/carpools/" => ["controller" => "App\Controller\CarpoolController", "action" => "carpools"],
    "/contact/" => ["controller" => "App\Controller\ContactController", "action" => "contact"],
    "/contact/show/" => ["controller" => "App\Controller\ContactController", "action" => "show"],
];