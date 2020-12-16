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
		 	for ($i=$firstIndex; $i < $numberstringShort; $i++) {
		 		echo "<tr>
		 		<td>".$row2[$i]['idusers']."</td>
		 		<td>".$row2[$i]['hash']."</td>
				<td>".$row2[$i]['name']."</td>
				<td>".$row2[$i]['family']."</td>
				<td>".$row2[$i]['key']."</td>
				<td>".$row2[$i]['url']."</td>
				<td>".$row2[$i]['img_name']."</td>
				</tr>";
		 	}
		 ?>
</div>
</table>
		<div class="pagination">
			<?php for ($i=0; $i < $numPage; $i++) {
			echo "<a href='users.php?page=$i'>".($i+1)."</a>";
			} ?>

		</div>

</body>
</html>