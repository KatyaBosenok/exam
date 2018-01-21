
<?php	
$dbParams=require(
	'db.php'
);
$db=new PDO ( 
	"mysql:host=localhost;dbname=".$dbParams['database'].";charset=utf8", //подключение к базе данных
	$dbParams['username'],
	$dbParams['password']
);

$subjectQuery =$db
	->prepare('
		SELECT `name` FROM `subject` 
	');
$subjectQuery
	->execute();
$subjects=$subjectQuery
	->fetchAll(PDO::FETCH_ASSOC);
?>
<html>
	<body>
		<form>
			<label>Дисциплина: 
			<select>		
				<?php foreach ($subjects as $subject) { ?>
				<option value="spisok"><?= htmlspecialchars ($subject['name'])?>
				</option>	
				<?php }	?>
			</select >
			<input type="submit" value="Найти">
		</form>
		<?php foreach ($subjects as $subject) { ?>
			<tr>
				<td><?= htmlspecialchars($subject['number'])?></td>
			<tr>
			<?php } ?>

	</body>
</html>