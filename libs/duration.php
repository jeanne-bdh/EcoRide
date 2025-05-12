<?php

function getDuration($startTime, $endTime)
{
    $start = strtotime($startTime);
    $end = strtotime($endTime);
    $diff = $end - $start;

    $hours = floor($diff / 3600);
    $minutes = floor(($diff % 3600) / 60);

    return sprintf("%dh%02d", $hours, $minutes);
}

function validateDuration()
{
    $errorsDuration = [];

    if (!empty($_POST['time_depart']) && !empty($_POST['time_arrival'])) {
        $timeDepart = strtotime($_POST['time_depart']);
        $timeArrival = strtotime($_POST['time_arrival']);

        if ($timeArrival <= $timeDepart) {
            $errorsDuration[] = "L'heure d'arrivée ne peut être antérieure ou égale à l'heure de départ";
        }
    }

    return $errorsDuration;
}
