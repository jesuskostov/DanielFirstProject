<?php
include '../../php/connect.php';

$id = $_GET['id'];
$mysqli->query("DELETE FROM `gallery` WHERE id = $id") or die($mysqli->error);

header('location:'.$_SERVER['HTTP_REFERER']);