<?php
return [
    "/jobs/" => ["controller" => "App\Controller\JobController", "action" => "list"],
    "/job/" => ["controller" => "App\Controller\JobController", "action" => "show"],
    "/contact/" => ["controller" => "App\Controller\ContactController", "action" => "contact"],
    "/contact/show/" => ["controller" => "App\Controller\ContactController", "action" => "show"],
    "/" => ["controller" => "App\Controller\PageController", "action" => "home"],
];