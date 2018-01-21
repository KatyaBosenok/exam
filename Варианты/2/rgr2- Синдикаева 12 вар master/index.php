<html>
	<head>
		<title>Депозит</title>
		<div class="data">
		<h1>Расчет суммы депозита (вклада)</h1>
		</div>
		<link rel="stylesheet" href="calc.css"/>
	</head>
	<body>

		<?php
			if (isset($_GET['refundableamount'])) {
				$refundableamount = $_GET['refundableamount'];
			} else {
				$refundableamount = '';
			}
			if (isset($_GET['rate'])) {
				$rate = $_GET['rate'];
			} else {
				$rate = '';
			}
			if (isset($_GET['days'])) {
				$days = $_GET['days'];
			} else {
				$days = '';
			}
		?>

		<div class= "calcul">
		<form method="GET" action="index.php">
			<input type="text" name="refundableamount"  placeholder="Сумма денежных средств, причитающихся к возврату вкладчику по окончании срока депозита" size="100" value="<?= htmlspecialchars($refundableamount) ?>">
			 <p><input type="text" name="rate" placeholder="Годовая процентная ставка" size="100" value="<?= htmlspecialchars($rate) ?>"></p>
			 <p><input type="text" name="days" placeholder="Количество дней начисления процентов по привлеченному вкладу" size="100" value="<?= htmlspecialchars($days) ?>"></p>
			<input type="submit" value="Вычислить">
		</form>
		
		<?php	
			$refundableamount=str_replace(",",".", $refundableamount);
			$rate=str_replace(",",".", $rate);
			$days=str_replace(",",".", $days);
			if ( $refundableamount != '' && $rate !== ''&& $days != '') {

				if (!is_numeric($refundableamount) || !is_numeric($rate) || !(INT)($days)){
					echo '<div class="error">';
					$result='Допустимо вводить только числовые значения!';
					echo "Ошибка: $result";
					echo '</div>';
				}elseif ($refundableamount <=0 || $rate <=0 || $days <=0){
					echo '<div class="error">';
					$result='Допустимо вводить только положительные значения!';
					echo  "Ошибка: $result";
					echo '</div>';
				}elseif((INT)($refundableamount) && is_numeric($rate) && (INT)($days) >0){
					$result = $refundableamount/ (($rate/100)*(($days- $days%365)/365)+1);
					echo  'Первоначальная сумма привлеченных в депозит денежных средств '. number_format($result,2,',',' ').' руб.';
				}	

			}
		?>

			<p><img width="500" height="300" src="pic1.png"/> </p>

	
	</body>
</html>