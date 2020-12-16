<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
</head>
<body>

<?php
include 'process.php';

?>
<div id="back">
	<a href="/">back</a>
</div>
<div id="userdate">
<table border="1">
	<tr>
		<th>id</th>
		<th>hash</th>
		<th>name</th>
		<th>family</th>
		<th>key</th>
		<th>url</th>
		<th>img_name</th>
	</tr>
			<?php
			$query2 = "SELECT * from $BDname.users";
			$result2 = mysqli_query($link, $query2);
			@$numberstring = mysqli_num_rows($result2);
			for ($i=0; $i < $numberstring; $i++) {
				$row2[$i] = mysqli_fetch_assoc($result2);
				}
				if ($numberstring>5) {
					$numPage = $numberstring / 5;
					$currentPage = 0;
					$currentPage = $_GET['page'];
					$numberstringShort = ($currentPage+1) * 5;
					$firstIndex = $currentPage*5;
				}else{
					$numberstringShort = $numberstring;
				}
				print_r($row2[1]['idusers']);

		 	for ($i=$firstIndex; $i < $numberstringShort; $i++) {
		 		echo "<tr>
		 		<td>".$row2[$i]['idusers']."</td>".
		 		"<td>".$row2[$i]['hash']."</td>".
				"<td>".$row2[$i]['name']."</td>".
				"<td>".$row2[$i]['family']."</td>".
				"<td>".$row2[$i]['key']."</td>".
				"<td>".$row2[$i]['url']."</td>".
				"<td>".$row2[$i]['img_name']."</td>".
				"<td><a href='users.php?page=".$_GET['page']."&edit=".$row2[$i]["idusers"]."'>edit</a></td>".
				"</tr>";
		 	}
		 ?>
</div>
</table>
		<div class="pagination">
			<?php for ($i=0; $i < $numPage; $i++) {
			echo "<a href='users.php?page=$i'>".($i+1)."</a>";
			} ?>

		</div>
		<div id="inputy">
		<? if (isset($_GET['edit'])) {
			echo "<form action='users.php?page=".$_GET['page']."&edit=".$_GET['edit']."' method='POST'>
			<input type='text' value='".$row2[$_GET['edit']]['hash']."' name='hash' placeholder='hash'>
			<input type='text' value='".$row2[$_GET['edit']]['name']."' name='name' placeholder='name'>
			<input type='text' value='".$row2[$_GET['edit']]['family']."' name='family' placeholder='family'>
			<input type='text' value='".$row2[$_GET['edit']]['key']."' name='key' placeholder='key'>
			<input type='text' value='".$row2[$_GET['edit']]['url']."' name='url' placeholder='url'>
			<input type='text' value='".$row2[$_GET['edit']]['img_name']."' name='img_name'  placeholder='img_name'>
			<input type='submit' value = 'edit' name='edit'>
			</form>";
		} ?>
		</div>
</body>
</html>