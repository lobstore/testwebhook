<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
</head>
<body>
<script src="hook.js"></script>
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
			print_r($_POST);
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
			}echo "<a href='users.php?page=".$_GET['page']."&add=true'>ADD ROW</a>" ?>

		</div>
		<div id="inputy">
		<? if (@isset($_GET['edit'])&&@isset($row2[$_GET['edit']-1])) {
			echo "<form action='users.php?page=".$_GET['page']."&edit=".$_GET['edit']."' method='POST'>
						<input type='text' value='".$row2[$_GET['edit']-1]['hash']."' name='hash' placeholder='hash'>
						<input type='text' value='".$row2[$_GET['edit']-1]['name']."' name='name' placeholder='name'>
						<input type='text' value='".$row2[$_GET['edit']-1]['family']."' name='family' placeholder='family'>
						<input type='text' value='".$row2[$_GET['edit']-1]['key']."' name='key' placeholder='key'>
						<input type='text' value='".$row2[$_GET['edit']-1]['url']."' name='url' placeholder='url'>
						<input type='text' value='".$row2[$_GET['edit']-1]['img_name']."' name='img_name'  placeholder='img_name'>
						<input id='addbutton' type='submit' value = 'EDIT' name='edit'>
					</form>";
		}elseif (@isset($_GET['add'])) {
			echo "<form action='users.php?page=".$_GET['page']."' method='POST'>
						<input type='text' name='hash' placeholder='hash'>
						<input type='text' name='name' placeholder='name'>
						<input type='text' name='family' placeholder='family'>
						<input type='text' name='key' placeholder='key'>
						<input type='text' name='url' placeholder='url'>
						<input type='text' name='img_name'  placeholder='img_name'>
						<input id='addbutton' type='submit' value = 'ADD ROW' name='add'>
					</form>";
		}elseif(@!isset($row2[$_GET['edit']-1])&&@isset($_GET['edit'])){
			echo "<form action='users.php?page=".$_GET['page']."' method='POST'>
						<input type='text' name='hash' placeholder='hash'>
						<input type='text' name='name' placeholder='name'>
						<input type='text' name='family' placeholder='family'>
						<input type='text' name='key' placeholder='key'>
						<input type='text' name='url' placeholder='url'>
						<input type='text' name='img_name'  placeholder='img_name'>
						<input id='addbutton' type='submit' value = 'ADD ROW' name='add'>
					</form>";
		}
		 ?>

		</div>
</body>
</html>