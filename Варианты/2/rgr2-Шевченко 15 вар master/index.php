<html>
<?php
echo "<h1 style='text-align:center;'>Расчет площади стен в прямоугольной комнате</h1>";
$Photo = htmlspecialchars('room.png');
if (isset($_GET['height'])) {
	$height = str_replace(",",".",$_GET['height']);
} else {
	$height = '';
}
if (isset($_GET['width'])) {
	$width = str_replace(",",".",$_GET['width']);
} else {
	$width = '';
}
if (isset($_GET['length'])) {
	$length =str_replace(",",".",$_GET['length']);
} else {
	$length = '';
}


$count = "";

if (isset($_GET['button'])) {
	if ((!is_numeric($height))||(!is_numeric($length))||(!(float)($width)))  {
		echo "<p><font color= 'red' size ='6' >Данные введены не корректно!</font></p>";
	}else{
		$count= $height*$length*2 + $width*$height*2;
	}
}
$width = str_replace(".",",",$width);
$height = str_replace(".",",",$height);
$length = str_replace(".",",",$length);
$count=str_replace(".",",",$count);
?>
	<body>
		<table>
			<tr>
				<td>
					<form method="GET" action="index.php">
						<br> Высота (H): <input type="text" name="height" value="<?= htmlspecialchars($height) ?>"/> м
						<br><br> Ширина(A): <input type="text" name="width" value="<?= htmlspecialchars($width) ?>"/> м
						<br><br> Длина   (B):   <input type="text" name="length" value="<?= htmlspecialchars($length) ?>"/> м
						<br><br> <input type="submit"  name="button" value="Подсчитать" />
					</form>
				</td>
				<td>
					<img width= "250"  src="<?php echo $Photo ?>"/>
				</td>
			</tr>
				<tr>
					<td>
						<br><br>Площадь стен =   <input type="text" disabled name="square" value="<?php echo $count;?>"/> м<sup>2</sup>
					</td>
				</tr>
		</table>
	</body>
</html>
