<?php
session_start();
const Address = "http://localhost/mvc/";
const host = "localhost";
const database = "test";
const user = "root";
const password = "";
function saniTize(string $input): string
{
    return filter_var($input,FILTER_SANITIZE_STRING);
}