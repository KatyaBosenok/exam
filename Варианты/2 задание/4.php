
<?php
//.gitignore
$dbParams=require(
	'db.php'
);
$db= new PDO(
	"mysql:host=localhost;dbname=". 
	$dbParams['database'].
	";charset=utf8", 
	$dbParams['username'],
	$dbParams['password']
);

$groupsSQL=('
	SELECT `group`.`number`, `student`.`lastName`,
`student`.`firstName`,`student`.`patronymicName` FROM `student` 
inner join `group`  on `group`.`id`=`student`.`groupId`
ORDER BY `number`,`lastName`
	');
$values=[];	
if(isset($_GET['name'])){
		$groupsSQL .= 'WHERE `lastName` LIKE '$znach' or `firstName` LIKE %$znach% or `patronymicName` LIKE %$znach%';
		$values['value']='%' . $_GET['name'] . '%';
}
$groupsQuery=$db
	->prepare($groupsSQL);
$groupsQuery
	->execute($values);
$groups=$groupsQuery
	->fetchAll(PDO::FETCH_ASSOC); //PDO гарантирует, что значение будет экранировано и не будет мешать! fetchAll чтобы вывести всех студентов

?>	
<html>
<body>
	<form>
		<label>
			<input type="text" name="name" value="<?php 
				if (isset($_GET['name'])){
					echo htmlspecialchars($_GET['name']);
					$znach=htmlspecialchars($_GET['name']);
				}
			?>">
		</label>	
		<input type="submit"  value="Поиск">
		<a href="v3.php">Все записи</a> 
	</form>
	<table>
		<tr>
			<th>Студент</th>
			<th>Группа</th>
		<tr>
		<?php foreach ($groups as $group){ ?>
		<tr>
			<? $name1=($group['lastName'].' '.$group['firstName'].' '.$group['patronymicName'])?>
			<td><?=htmlspecialchars($name1)?></td>
			<td><?=htmlspecialchars($group['number'])?></td>
		<tr>
		<?php } ?>
	</table>
</body>	
</html>	
