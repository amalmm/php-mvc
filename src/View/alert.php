<?php

if (isset($_SESSION['error'])) {
    echo isset($_SESSION['error']['message']) ? $_SESSION['error']['message'] : '';
}

unset($_SESSION['error']);