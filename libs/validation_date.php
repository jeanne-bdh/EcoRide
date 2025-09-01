<?php

function validateDate($date = 0)
{
    $errors = [];
    $today = date("Y-m-d");

    if ($date < $today) {
        $errors[] = "La date ne peut être antérieure";
    }

    return $errors;
}