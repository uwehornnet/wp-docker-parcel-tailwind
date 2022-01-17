<?php

function dd($data)
{
    echo '<pre>' . var_export($data, true) . '</pre>';
    die();
}