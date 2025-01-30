<?php

function heroSection($title)
{ ?>
    <div class="hero-section">
        <div class="wave-top">
            <svg viewBox="0 0 1442 355" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M1441 1H1V199.998C1 199.998 244.436 327.657 415.075 349.247C662.108 380.501 810.624 248.255 1040.44 225.37C1270.26 202.486 1441 317.904 1441 317.904V1Z"
                    fill="#0EE6B1" stroke="#0EE6B1" />
            </svg>
        </div>
        <h1><?php echo $title; ?></h1>

    <?php } ?>