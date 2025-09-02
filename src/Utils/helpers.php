<?php

function formatTime($time, string $format = 'H\hi'): string
{
    if ($time instanceof \DateTimeInterface) {
        return $time->format($format);
    }
    return '-';
}

function getDuration($startTime, $endTime)
{
    if ($startTime instanceof DateTime) {
        $startTime = $startTime->getTimestamp();
    } else {
        $startTime = strtotime($startTime);
    }

    if ($endTime instanceof DateTime) {
        $endTime = $endTime->getTimestamp();
    } else {
        $endTime = strtotime($endTime);
    }

    $diff = $endTime - $startTime;

    $hours = floor($diff / 3600);
    $minutes = floor(($diff % 3600) / 60);

    return sprintf("%dh%02d", $hours, $minutes);
}