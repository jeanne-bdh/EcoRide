<?php
return [
    "/jobs/" => ["controller" => "App\Controller\JobController", "action" => "list"],
    "/job/" => ["controller" => "App\Controller\JobController", "action" => "show"],
    "/contact/" => ["controller" => "App\Controller\ContactController", "action" => "contact"],
    "/" => ["controller" => "App\Controller\PageController", "action" => "home"],
];