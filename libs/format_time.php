<?php

function formatTime($time, $format = 'G\hi') {
    try {
        if (empty($time)) {
            return '-';
        }
        return (new DateTime($time))->format($format);
    } catch (Exception $e) {
        return '-';
    }
}

