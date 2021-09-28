<?php
session_start();
const Address = "http://localhost/mvc/";
function saniTize(string $input): string
{
    return filter_var($input,FILTER_SANITIZE_STRING);
}