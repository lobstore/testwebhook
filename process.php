<?php
$hostname = "localhost";
$BDname = "webhooktest";
$login = "root";
$password = "root";
$link = mysqli_connect($hostname, $login,$password);
mysqli_select_db($link, "$BDname");
mysqli_set_charset($link,"utf8");
  $hash = $_POST['hash'];
  $name = $_POST['name'];
  $family = $_POST['family'];
  $key = $_POST['key'];
  $url = $_POST['url'];
  $img_name = $_POST['img_name'];
  if ($_POST['hash']!='') {
	$query = "INSERT into $BDname.users (hash, name, family, key, url, img_name) values ('$hash', '$name', '$family', '$key' ,'$url', '$img_name')";
}
@$result = mysqli_query($link, $query);
?>
