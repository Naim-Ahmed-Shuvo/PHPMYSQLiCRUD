<?php
include './config.php';
include './database.php';

$db = new Database();
$id = $_GET['id'];

$query = "DELETE FROM tbl_user WHERE id=$id";
$delete = $db->delete($query);


