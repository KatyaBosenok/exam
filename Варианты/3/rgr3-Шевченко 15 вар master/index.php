<html>
	<body>
		<?php	
			if (isset($_GET['value'])) {
				$myDate=DateTime::createFromFormat('Y-m-d', $_GET['value']);
			}
		?>
<form metod="GET" action="index.php" >
<input type="date" name="value" value="<?php 
	if (isset($myDate)){
		echo htmlspecialchars($myDate->format('Y-m-d'));
	}else{
		echo htmlspecialchars(date('Y-m-d'));
	}?>">
	
<input type="submit" value="Узнать дату ближайшего понедельника">
</form>

<?php
	if (isset($myDate)){
		list($day, $month, $year) = explode('-', $myDate->format("d-m-Y"));	
		for ($i=1; $i<=7; $i++) {
			$day =$day+1;
			$newDate = $myDate -> setDate($year, $month, $day);
			$newDate -> Format('d.m.Y');
			$dayOfTheWeek = $newDate -> Format('D');
			if($dayOfTheWeek=='Mon') {
				echo "Ближайший понедельник будет ".$newDate -> Format('d.m.Y');
				break;
			}
		}
	}
?>
	</body>
</html>
