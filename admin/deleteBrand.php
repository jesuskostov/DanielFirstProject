<?php
    $id = $_GET['id'];
    $brand = $_GET['brand'];
    $mysqli->query("DELETE FROM `brand` WHERE id = '$id' ") or die($mysqli->error);
    $mysqli->query("DELETE FROM `product` WHERE brand = '$brand' ") or die($mysqli->error);
    header('location:'.$_SERVER['HTTP_REFERER']);
?>