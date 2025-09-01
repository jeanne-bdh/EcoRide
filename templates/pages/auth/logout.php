<?php

require_once APP_ROOT . '/../../libs/session.php';

session_regenerate_id(true);

session_destroy();

unset($_SESSION);

header('location:/login');