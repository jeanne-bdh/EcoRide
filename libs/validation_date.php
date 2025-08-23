<?php

function validateDate($date = 0)
{
    $errorsDate = [];
    $today = date("Y-m-d");

    if ($date < $today) {
        $errorsDate[] = "La date ne peut être antérieure";
    }

    return $errorsDate;
}