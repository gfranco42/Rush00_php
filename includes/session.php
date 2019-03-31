<?php
function	is_logged() {
    if (isset($_SESSION['auth'])
        && isset($_SESSION['auth']['login'])
        && isset($_SESSION['auth']['passwd'])) {
        return TRUE;
    }
    else {
        return FALSE;
    }
}
