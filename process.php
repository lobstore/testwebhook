<?php
$hostname = "localhost";
$BDname = "webhooktest";
$login = "root";
$password = "root";
$link = mysqli_connect($hostname, $login,$password);
mysqli_select_db($link, "$BDname");
mysqli_set_charset($link,"utf8");
print_r($_POST);
print_r($_GET);
  $hash = $_POST['hash'];
  $name = $_POST['name'];
  $family = $_POST['family'];
  $key = $_POST['key'];
  $url = $_POST['url'];
  $img_name = $_POST['img_name'];
  if (isset($_POST['edit']) && $_POST['idusers']) {
	$query = "INSERT into $BDname.users (hash, name, family, key, url, img_name) values ('$hash', '$name', '$family', '$key' ,'$url', '$img_name')";
}elseif (isset($_POST['edit'])){
	$idusers = $_GET['edit'];
	$query = "UPDATE $BDname.users set `hash` ='$hash', `name`='$name',`family` ='$family',`key` ='$key',`url` = '$url',`img_name` ='$img_name' where `idusers` = $idusers";
}

@$result = mysqli_query($link, $query);
?>

