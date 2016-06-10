<?php
header('content-type:text/html;charset=utf-8');
date_default_timezone_set('PRC');
session_start();
include_once('include/fun/function.php');
include_once('include/fun/mysql_function.php');
$conn=connect_db('localhost','root','123','wd16000','utf8');