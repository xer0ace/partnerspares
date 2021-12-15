<?php
require_once '../include/config.php';
if(ISSET($_POST['res'])){

	$month = $_POST['month'];
	$newMonth = substr($month, 5);
	$newYear = substr($month, 0, -3);

	$previousMonth = $newMonth - 1;
	$previousYear = $newYear - 1;

	if ($newMonth == "1") {

		$queryPieChart = $link->query("SELECT 
			(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added BETWEEN '$newYear-$newMonth-01' AND '$newYear-$newMonth-31') as CurrentMonth,
			(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added BETWEEN '$previousYear-12-01' AND '$previousYear-12-31') as PreviousMonth");

		while($fetchPieChart = $queryPieChart->fetch_array()){
					$CurrentMonth = $fetchPieChart["CurrentMonth"];
					$PreviousMonth = $fetchPieChart["PreviousMonth"];
				}

				$saleschanges = $CurrentMonth - $PreviousMonth;

				if ($CurrentMonth > $PreviousMonth) {
					echo "
						<h1>₱ ".$CurrentMonth."</h1> 
                        <p>Compared to last month ₱ +".$saleschanges."  <i class='fas fa-long-arrow-alt-up' style='color: #2ecc71; margin-top: 15px;'></i></p>
					";
				}

				elseif ($CurrentMonth < $PreviousMonth) {
					echo "	
						<h1>₱ ".$CurrentMonth."</h1> 
                        <p>Compared to last month ₱ ".$saleschanges."  <i class='fas fa-long-arrow-alt-down' style='color: #f53b57; margin-top: 15px;'></i></p>
					" ;
				}

				else {
					echo "
					<h1>₱ ".$CurrentMonth."</h1> 
                        <p>Compared to last month ₱ ".$saleschanges."  <i class='fas fa-minus' style='color: #1e272e; margin-top: 15px;'></i></p>

					" ;
				}
	}
	else {

		$queryPieChart = $link->query("SELECT 
			(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added BETWEEN '$newYear-$newMonth-01' AND '$newYear-$newMonth-31') as CurrentMonth,
			(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added BETWEEN '$newYear-$previousMonth-01' AND '$newYear-$previousMonth-31') as PreviousMonth");

				while($fetchPieChart = $queryPieChart->fetch_array()){
					$CurrentMonth = $fetchPieChart["CurrentMonth"];
					$PreviousMonth = $fetchPieChart["PreviousMonth"];
				}

				$saleschanges = $CurrentMonth - $PreviousMonth;

				if ($CurrentMonth > $PreviousMonth) {
					echo "
						<h1>₱ ".$CurrentMonth."</h1> 
                        <p>Compared to last month ₱ +".$saleschanges."  <i class='fas fa-long-arrow-alt-up' style='color: #2ecc71; margin-top: 15px;'></i></p>
					";
				}

				elseif ($CurrentMonth < $PreviousMonth) {
					echo "	
						<h1>₱ ".$CurrentMonth."</h1> 
                        <p>Compared to last month ₱ ".$saleschanges."  <i class='fas fa-long-arrow-alt-down' style='color: #f53b57; margin-top: 15px;'></i></p>
					" ;
				}

				else {
					echo "
					<h1>₱ ".$CurrentMonth."</h1> 
                        <p>Compared to last month ₱ ".$saleschanges."  <i class='fas fa-minus' style='color: #1e272e; margin-top: 15px;'></i></p>

					" ;
				}

	}
}
?>