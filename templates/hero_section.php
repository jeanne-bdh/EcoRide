<?php

function heroSection($title)
{ ?>
    <section class="wave-top">
        <svg viewBox="0 0 1442 355" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M1441 1H1V199.998C1 199.998 244.436 327.657 415.075 349.247C662.108 380.501 810.624 248.255 1040.44 225.37C1270.26 202.486 1441 317.904 1441 317.904V1Z"
                fill="#0EE6B1" stroke="#0EE6B1" />
        </svg>
        <div class="return-link-container">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                <path d="M205 34.8c11.5 5.1 19 16.6 19 29.2l0 64 112 0c97.2 0 176 78.8 176 176c0 113.3-81.5 163.9-100.2 174.1c-2.5 1.4-5.3 1.9-8.1 1.9c-10.9 0-19.7-8.9-19.7-19.7c0-7.5 4.3-14.4 9.8-19.5c9.4-8.8 22.2-26.4 22.2-56.7c0-53-43-96-96-96l-96 0 0 64c0 12.6-7.4 24.1-19 29.2s-25 3-34.4-5.4l-160-144C3.9 225.7 0 217.1 0 208s3.9-17.7 10.6-23.8l160-144c9.4-8.5 22.9-10.6 34.4-5.4z" />
            </svg>
            <button href="javascript:void(0);" id="return-previous" onclick="window.history.back();">
                <p>Retour</p>
            </button>
        </div>
        <h1><?php echo $title; ?></h1>
    </section>

<?php } ?>