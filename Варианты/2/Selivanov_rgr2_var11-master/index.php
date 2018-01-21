<html>
	<head>
		<title>Расчет суммы вклада</title>
		<link rel="stylesheet" href="index.css">
	</head>
	<body>
		<?php
			$deposit = "";
			$period = "";
			$rate = "";
			$rate1 = "";
			if (isset($_GET['deposit'])) {
				$deposit = $_GET['deposit'];
			}
			if (isset($_GET['period'])) {
				$period = $_GET['period'];
			}
			if (isset($_GET['rate'])) {
				$rate = $_GET['rate'];
			}
			$result = "";
		?>
		
		<form action="index.php" method="GET">
		
		<h1>Расчет суммы выплат по вкладу</h1>
		<img width="230px" align=right src="http://img-fotki.yandex.ru/get/5805/valenta-mog.cc/0_67eac_ced33641_L.jpg">
		
		<fieldset><legend>Ввод данных:</legend>
			<div class="half-width">
				<label for='deposit'>Сумма вклада в рублях:</label>
			</div>
			<div class="half-width">
				<input <?php if($deposit!='' && (!is_numeric($deposit) || $deposit<=0)) {
					$deposit = str_replace(",",".",$deposit);
				} ?> type='text' name="deposit" placeholder='1550000' value="<?= htmlspecialchars($deposit)?>">
			</div>
			<div class="half-width">
				<label for='period'>Срок хранения денежных средств в днях:</label>
			</div>
			<div class="half-width">
				<input type='text' name="period" placeholder='365' value="<?= htmlspecialchars($period)?>">
			</div>
			<div class="half-width">
				<label for='rate'>Годовая процентная ставка в процентах:</label>
			</div>
			<div class="half-width">
				<input <?php if($rate!='' && (!is_numeric($rate) || $rate<=0)) {
					$rate1 = str_replace(",",".",$rate);
				} ?> type='text' name="rate" placeholder='7,5' value="<?= htmlspecialchars($rate)?>">
			</div>
		</fieldset>
		<input type="submit" value="Рассчитать сумму">
		</form>
		
		<?php
			if ($deposit != '' && $period != '' && $rate1 != '') 
			{
					if (!is_numeric($deposit) || $deposit<=0) {
						$result = "Сумма депозита была введена неверно. Повторите ввод опираясь на подсказку в поле ввода.";
					}
					elseif (!is_numeric($period) || $period<=0){
						$result = "Срок хранения депозита был введен неверно. Повторите ввод опираясь на подсказку в поле ввода.";
					}
					elseif (!is_numeric($rate1) || $rate1<=0 || $rate1>=30){
						$result = "Процентная ставка депозита была введена неверно. Повторите ввод опираясь на подсказку в поле ввода.";
					}
					else
					{
						$result = $deposit + ($deposit * ($period / 365) * ($rate1 / 100));
						$result = number_format($result, 2, ',', ' ');
						$result = htmlspecialchars($result) . " руб.";
					}
			}
			elseif ($deposit != '')
			{
				$result = "Введите, пожалуйста, сумму депозита.";
			}
			elseif ($period != '')
			{
				$result = "Введите, пожалуйста, срок хранения депозита.";
			}
			elseif ($rate1 != '')
			{
				$result = "Введите, пожалуйста, процентную ставку по депозиту.";
			};
		?>
		
		<form action = "index.php" method = "post">
		<fieldset><legend>Результаты расчета:</legend>
			<div class="half-width">
				<label for='id'>Сумма к выплате:</label>
			</div>
			<div>
				<input type = "text" name = "result" value = "<?php print $result; ?>">
			</div>
		</fieldset>
		
		</form>
	</body>
</html>