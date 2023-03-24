<?php

if (!function_exists('logged_in')) {
    function logged_in($value = null)
    {
        if(!$this->session->userdata('logged_in')) {
            die(1);
        }
    }
}
