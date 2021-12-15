<?php
require_once '../include/config.php';
if(ISSET($_POST['res'])){

	$month = $_POST['month'];
	$newMonth = substr($month, 5);
	$newYear = substr($month, 0, -3);

		$queryCompleted = $link->query("SELECT 
			(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added BETWEEN '$newYear-$newMonth-01' AND '$newYear-$newMonth-08') as Week1,
			(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added BETWEEN '$newYear-$newMonth-09' AND '$newYear-$newMonth-15') as Week2,
			(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added BETWEEN '$newYear-$newMonth-16' AND '$newYear-$newMonth-22') as Week3,
			(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added BETWEEN '$newYear-$newMonth-23' AND '$newYear-$newMonth-31') as Week4");

		while($fetchCompleted = $queryCompleted->fetch_array()){
			$Completedweek1 = $fetchCompleted["Week1"];
			$Completedweek2 = $fetchCompleted["Week2"];
			$Completedweek3 = $fetchCompleted["Week3"];
			$Completedweek4 = $fetchCompleted["Week4"];
		}


		$queryCancelled = $link->query("SELECT 
			(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-$newMonth-01' AND '$newYear-$newMonth-08') as Week1,
			(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-$newMonth-09' AND '$newYear-$newMonth-15') as Week2,
			(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-$newMonth-16' AND '$newYear-$newMonth-22') as Week3,
			(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-$newMonth-23' AND '$newYear-$newMonth-31') as Week4");

		while($fetchCancelled = $queryCancelled->fetch_array()){
			$Cancelledweek1 = $fetchCancelled["Week1"];
			$Cancelledweek2 = $fetchCancelled["Week2"];
			$Cancelledweek3 = $fetchCancelled["Week3"];
			$Cancelledweek4 = $fetchCancelled["Week4"];
		}




		$queryDailyCompleted = $link->query("SELECT 
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added = '$newYear-$newMonth-01') as Day01,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added = '$newYear-$newMonth-02') as Day02,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added = '$newYear-$newMonth-03') as Day03,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added = '$newYear-$newMonth-04') as Day04,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added = '$newYear-$newMonth-05') as Day05,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added = '$newYear-$newMonth-06') as Day06,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added = '$newYear-$newMonth-07') as Day07,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added = '$newYear-$newMonth-08') as Day08,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added = '$newYear-$newMonth-09') as Day09,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added = '$newYear-$newMonth-10') as Day10,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added = '$newYear-$newMonth-11') as Day11,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added = '$newYear-$newMonth-12') as Day12,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added = '$newYear-$newMonth-13') as Day13,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added = '$newYear-$newMonth-14') as Day14,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added = '$newYear-$newMonth-15') as Day15,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added = '$newYear-$newMonth-16') as Day16,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added = '$newYear-$newMonth-17') as Day17,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added = '$newYear-$newMonth-18') as Day18,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added = '$newYear-$newMonth-19') as Day19,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added = '$newYear-$newMonth-20') as Day20,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added = '$newYear-$newMonth-21') as Day21,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added = '$newYear-$newMonth-22') as Day22,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added = '$newYear-$newMonth-23') as Day23,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added = '$newYear-$newMonth-24') as Day24,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added = '$newYear-$newMonth-25') as Day25,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added = '$newYear-$newMonth-26') as Day26,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added = '$newYear-$newMonth-27') as Day27,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added = '$newYear-$newMonth-28') as Day28,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added = '$newYear-$newMonth-29') as Day29,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added = '$newYear-$newMonth-30') as Day30,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added = '$newYear-$newMonth-31') as Day31
		");
	
		while($fetchDailyCompleted = $queryDailyCompleted->fetch_array()){
			$CompletedDay01 = $fetchDailyCompleted['Day01'];
			$CompletedDay02 = $fetchDailyCompleted['Day02'];
			$CompletedDay03 = $fetchDailyCompleted['Day03'];
			$CompletedDay04 = $fetchDailyCompleted['Day04'];
			$CompletedDay05 = $fetchDailyCompleted['Day05'];
			$CompletedDay06 = $fetchDailyCompleted['Day06'];
			$CompletedDay07 = $fetchDailyCompleted['Day07'];
			$CompletedDay08 = $fetchDailyCompleted['Day08'];
			$CompletedDay09 = $fetchDailyCompleted['Day09'];
			$CompletedDay10 = $fetchDailyCompleted['Day10'];
			$CompletedDay11 = $fetchDailyCompleted['Day11'];
			$CompletedDay12 = $fetchDailyCompleted['Day12'];
			$CompletedDay13 = $fetchDailyCompleted['Day13'];
			$CompletedDay14 = $fetchDailyCompleted['Day14'];
			$CompletedDay15 = $fetchDailyCompleted['Day15'];
			$CompletedDay16 = $fetchDailyCompleted['Day16'];
			$CompletedDay17 = $fetchDailyCompleted['Day17'];
			$CompletedDay18 = $fetchDailyCompleted['Day18'];
			$CompletedDay19 = $fetchDailyCompleted['Day19'];
			$CompletedDay20 = $fetchDailyCompleted['Day20'];
			$CompletedDay21 = $fetchDailyCompleted['Day21'];
			$CompletedDay22 = $fetchDailyCompleted['Day22'];
			$CompletedDay23 = $fetchDailyCompleted['Day23'];
			$CompletedDay24 = $fetchDailyCompleted['Day24'];
			$CompletedDay25 = $fetchDailyCompleted['Day25'];
			$CompletedDay26 = $fetchDailyCompleted['Day26'];
			$CompletedDay27 = $fetchDailyCompleted['Day27'];
			$CompletedDay28 = $fetchDailyCompleted['Day28'];
			$CompletedDay29 = $fetchDailyCompleted['Day29'];
			$CompletedDay30 = $fetchDailyCompleted['Day30'];
			$CompletedDay31 = $fetchDailyCompleted['Day31'];
		}


		$queryDailyCancelled = $link->query("SELECT 
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-01') as Day01,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-02') as Day02,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-03') as Day03,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-04') as Day04,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-05') as Day05,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-06') as Day06,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-07') as Day07,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-08') as Day08,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-09') as Day09,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-10') as Day10,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-11') as Day11,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-12') as Day12,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-13') as Day13,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-14') as Day14,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-15') as Day15,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-16') as Day16,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-17') as Day17,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-18') as Day18,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-19') as Day19,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-20') as Day20,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-21') as Day21,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-22') as Day22,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-23') as Day23,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-24') as Day24,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-25') as Day25,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-26') as Day26,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-27') as Day27,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-28') as Day28,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-29') as Day29,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-30') as Day30,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-31') as Day31
		");
	
		while($fetchDailyCancelled = $queryDailyCancelled->fetch_array()){
			$CancelledDay01 = $fetchDailyCancelled['Day01'];
			$CancelledDay02 = $fetchDailyCancelled['Day02'];
			$CancelledDay03 = $fetchDailyCancelled['Day03'];
			$CancelledDay04 = $fetchDailyCancelled['Day04'];
			$CancelledDay05 = $fetchDailyCancelled['Day05'];
			$CancelledDay06 = $fetchDailyCancelled['Day06'];
			$CancelledDay07 = $fetchDailyCancelled['Day07'];
			$CancelledDay08 = $fetchDailyCancelled['Day08'];
			$CancelledDay09 = $fetchDailyCancelled['Day09'];
			$CancelledDay10 = $fetchDailyCancelled['Day10'];
			$CancelledDay11 = $fetchDailyCancelled['Day11'];
			$CancelledDay12 = $fetchDailyCancelled['Day12'];
			$CancelledDay13 = $fetchDailyCancelled['Day13'];
			$CancelledDay14 = $fetchDailyCancelled['Day14'];
			$CancelledDay15 = $fetchDailyCancelled['Day15'];
			$CancelledDay16 = $fetchDailyCancelled['Day16'];
			$CancelledDay17 = $fetchDailyCancelled['Day17'];
			$CancelledDay18 = $fetchDailyCancelled['Day18'];
			$CancelledDay19 = $fetchDailyCancelled['Day19'];
			$CancelledDay20 = $fetchDailyCancelled['Day20'];
			$CancelledDay21 = $fetchDailyCancelled['Day21'];
			$CancelledDay22 = $fetchDailyCancelled['Day22'];
			$CancelledDay23 = $fetchDailyCancelled['Day23'];
			$CancelledDay24 = $fetchDailyCancelled['Day24'];
			$CancelledDay25 = $fetchDailyCancelled['Day25'];
			$CancelledDay26 = $fetchDailyCancelled['Day26'];
			$CancelledDay27 = $fetchDailyCancelled['Day27'];
			$CancelledDay28 = $fetchDailyCancelled['Day28'];
			$CancelledDay29 = $fetchDailyCancelled['Day29'];
			$CancelledDay30 = $fetchDailyCancelled['Day30'];
			$CancelledDay31 = $fetchDailyCancelled['Day31'];
		}

			
		

		
			$queryPieChartSummary = $link->query("SELECT 
			(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added BETWEEN '$newYear-$newMonth-01' AND '$newYear-$newMonth-31') as CurrentMonth,
			(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-$newMonth-01' AND '$newYear-$newMonth-31') as PreviousMonth");

				while($fetchPieChartSummary = $queryPieChartSummary->fetch_array()){
					$CompletedCount = $fetchPieChartSummary["CurrentMonth"];
					$CancelledCount = $fetchPieChartSummary["PreviousMonth"];
				}



		$queryMonthySalesCompleted = $link->query("SELECT 
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added BETWEEN '$newYear-01-01' AND '$newYear-01-31') as January,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added BETWEEN '$newYear-02-01' AND '$newYear-02-31') as February,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added BETWEEN '$newYear-03-01' AND '$newYear-03-31') as March,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added BETWEEN '$newYear-04-01' AND '$newYear-04-31') as April,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added BETWEEN '$newYear-05-01' AND '$newYear-05-31') as May,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added BETWEEN '$newYear-06-01' AND '$newYear-06-31') as June,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added BETWEEN '$newYear-07-01' AND '$newYear-07-31') as July,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added BETWEEN '$newYear-08-01' AND '$newYear-08-31') as August,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added BETWEEN '$newYear-09-01' AND '$newYear-09-31') as September,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added BETWEEN '$newYear-10-01' AND '$newYear-10-31') as October,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added BETWEEN '$newYear-11-01' AND '$newYear-11-31') as November,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Completed' AND Date_Added BETWEEN '$newYear-12-01' AND '$newYear-12-31') as December");


		while($fetchMonthlySalesCompleted = $queryMonthySalesCompleted->fetch_array()){
				$CompletedJanuary	= $fetchMonthlySalesCompleted["January"];
				$CompletedFebruary	= $fetchMonthlySalesCompleted["February"];
				$CompletedMarch		= $fetchMonthlySalesCompleted["March"];
				$CompletedApril		= $fetchMonthlySalesCompleted["April"];
				$CompletedMay		= $fetchMonthlySalesCompleted["May"];
				$CompletedJune		= $fetchMonthlySalesCompleted["June"];
				$CompletedJuly		= $fetchMonthlySalesCompleted["July"];
				$CompletedAugust	= $fetchMonthlySalesCompleted["August"];
				$CompletedSeptember	= $fetchMonthlySalesCompleted["September"];
				$CompletedOctober	= $fetchMonthlySalesCompleted["October"];
				$CompletedNovember	= $fetchMonthlySalesCompleted["November"];
				$CompletedDecember	= $fetchMonthlySalesCompleted["December"];
		}


		$queryMonthySalesCancelled = $link->query("SELECT 
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-01-01' AND '$newYear-01-31') as January,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-02-01' AND '$newYear-02-31') as February,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-03-01' AND '$newYear-03-31') as March,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-04-01' AND '$newYear-04-31') as April,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-05-01' AND '$newYear-05-31') as May,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-06-01' AND '$newYear-06-31') as June,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-07-01' AND '$newYear-07-31') as July,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-08-01' AND '$newYear-08-31') as August,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-09-01' AND '$newYear-09-31') as September,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-10-01' AND '$newYear-10-31') as October,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-11-01' AND '$newYear-11-31') as November,
		(SELECT IFNULL(COUNT(*), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-12-01' AND '$newYear-12-31') as December");


		while($fetchMonthlySalesCancelled = $queryMonthySalesCancelled->fetch_array()){
				$CancelledJanuary	= $fetchMonthlySalesCancelled["January"];
				$CancelledFebruary	= $fetchMonthlySalesCancelled["February"];
				$CancelledMarch		= $fetchMonthlySalesCancelled["March"];
				$CancelledApril		= $fetchMonthlySalesCancelled["April"];
				$CancelledMay		= $fetchMonthlySalesCancelled["May"];
				$CancelledJune		= $fetchMonthlySalesCancelled["June"];
				$CancelledJuly		= $fetchMonthlySalesCancelled["July"];
				$CancelledAugust	= $fetchMonthlySalesCancelled["August"];
				$CancelledSeptember	= $fetchMonthlySalesCancelled["September"];
				$CancelledOctober	= $fetchMonthlySalesCancelled["October"];
				$CancelledNovember	= $fetchMonthlySalesCancelled["November"];
				$CancelledDecember	= $fetchMonthlySalesCancelled["December"];
		}
}
?>

<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([

          ['Week', 'Completed Orders', 'Cancelled Orders'],
          ['Week 1 \n Day 1 to Day 8',  <?php echo "$Completedweek1"; ?>, <?php echo "$Cancelledweek1"; ?>],
          ['Week 2 \n Day 9 to Day 15',  <?php echo "$Completedweek2"; ?>, <?php echo "$Cancelledweek2"; ?>],
          ['Week 3 \n Day 16 to Day 22',  <?php echo "$Completedweek3"; ?>, <?php echo "$Cancelledweek3"; ?>],
          ['Week 4 \n Day 23 to Day 31',  <?php echo "$Completedweek4"; ?>, <?php echo "$Cancelledweek4"; ?>]

        ]);

        var options = {
          title: 'PPM Transactions Graph <?php echo "$month" ?>',
          colors: ['#2ecc71', '#EA2027'],
          pointSize: 8,
          curveType: 'function',
          animation: {'startup': true,  duration: 1000,
          easing: 'out'},
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }

google.charts.load('current', {'packages':['bar']});
google.charts.setOnLoadCallback(drawChartDaily);

      function drawChartDaily() {
        var data = google.visualization.arrayToDataTable([
          ['Day', 'Completed', 'Cancelled'],
          ['01',  <?php echo "$CompletedDay01";?>, <?php echo "$CancelledDay01"; ?>],
          ['02',  <?php echo "$CompletedDay02";?>, <?php echo "$CancelledDay02"; ?>],
          ['03',  <?php echo "$CompletedDay03";?>, <?php echo "$CancelledDay03"; ?>],
          ['04',  <?php echo "$CompletedDay04";?>, <?php echo "$CancelledDay04"; ?>],
          ['05',  <?php echo "$CompletedDay05";?>, <?php echo "$CancelledDay05"; ?>],
          ['06',  <?php echo "$CompletedDay06";?>, <?php echo "$CancelledDay06"; ?>],
          ['07',  <?php echo "$CompletedDay07";?>, <?php echo "$CancelledDay07"; ?>],
          ['08',  <?php echo "$CompletedDay08";?>, <?php echo "$CancelledDay08"; ?>],
          ['09',  <?php echo "$CompletedDay09";?>, <?php echo "$CancelledDay09"; ?>],
          ['10',  <?php echo "$CompletedDay10";?>, <?php echo "$CancelledDay10"; ?>],
          ['11',  <?php echo "$CompletedDay11";?>, <?php echo "$CancelledDay11"; ?>],
          ['12',  <?php echo "$CompletedDay12";?>, <?php echo "$CancelledDay12"; ?>],
          ['13',  <?php echo "$CompletedDay13";?>, <?php echo "$CancelledDay13"; ?>],
          ['14',  <?php echo "$CompletedDay14";?>, <?php echo "$CancelledDay14"; ?>],
          ['15',  <?php echo "$CompletedDay15";?>, <?php echo "$CancelledDay15"; ?>],
          ['16',  <?php echo "$CompletedDay16";?>, <?php echo "$CancelledDay16"; ?>],
          ['17',  <?php echo "$CompletedDay17";?>, <?php echo "$CancelledDay17"; ?>],
          ['18',  <?php echo "$CompletedDay18";?>, <?php echo "$CancelledDay18"; ?>],
          ['19',  <?php echo "$CompletedDay19";?>, <?php echo "$CancelledDay19"; ?>],
          ['20',  <?php echo "$CompletedDay20";?>, <?php echo "$CancelledDay20"; ?>],
          ['21',  <?php echo "$CompletedDay21";?>, <?php echo "$CancelledDay21"; ?>],
          ['22',  <?php echo "$CompletedDay22";?>, <?php echo "$CancelledDay22"; ?>],
          ['23',  <?php echo "$CompletedDay23";?>, <?php echo "$CancelledDay23"; ?>],
          ['24',  <?php echo "$CompletedDay24";?>, <?php echo "$CancelledDay24"; ?>],
          ['25',  <?php echo "$CompletedDay25";?>, <?php echo "$CancelledDay25"; ?>],
          ['26',  <?php echo "$CompletedDay26";?>, <?php echo "$CancelledDay26"; ?>],
          ['27',  <?php echo "$CompletedDay27";?>, <?php echo "$CancelledDay27"; ?>],
          ['28',  <?php echo "$CompletedDay28";?>, <?php echo "$CancelledDay28"; ?>],
          ['29',  <?php echo "$CompletedDay29";?>, <?php echo "$CancelledDay29"; ?>],
          ['30',  <?php echo "$CompletedDay30";?>, <?php echo "$CancelledDay30"; ?>],
          ['31',  <?php echo "$CompletedDay31";?>, <?php echo "$CancelledDay31"; ?>]
        ]);

        var options = {
           colors: ['#2ecc71', '#EA2027'],
          chart: {
            title: 'PPM Daily <?php echo "$month" ?>',
            subtitle: 'Transactions',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }

     google.charts.setOnLoadCallback(drawMonthlyChart);

      function drawMonthlyChart() {
        var data = google.visualization.arrayToDataTable([

          ['Months', 'Completed', 'Cancelled'],
          ['January',  <?php echo "$CompletedJanuary"; ?>, <?php echo "$CancelledJanuary"; ?>],
          ['February',  <?php echo "$CompletedFebruary"; ?>, <?php echo "$CancelledFebruary"; ?>],
          ['March',  <?php echo "$CompletedMarch"; ?>, <?php echo "$CancelledMarch"; ?>],
          ['April',  <?php echo "$CompletedApril"; ?>, <?php echo "$CancelledApril"; ?>],
          ['May',  <?php echo "$CompletedMay"; ?>, <?php echo "$CancelledMay"; ?>],
          ['June',  <?php echo "$CompletedJune"; ?>, <?php echo "$CancelledJune"; ?>],
          ['July',  <?php echo "$CompletedJuly"; ?>, <?php echo "$CancelledJuly"; ?>],
          ['August',  <?php echo "$CompletedAugust"; ?>, <?php echo "$CancelledAugust"; ?>],
          ['September',  <?php echo "$CompletedSeptember"; ?>, <?php echo "$CancelledSeptember"; ?>],
          ['October',  <?php echo "$CompletedOctober"; ?>, <?php echo "$CancelledOctober"; ?>],
          ['November',  <?php echo "$CompletedNovember"; ?>, <?php echo "$CancelledNovember"; ?>],
          ['December',  <?php echo "$CompletedDecember"; ?>, <?php echo "$CancelledDecember"; ?>]
        ]);

        var options = {
          title: 'PPM Transactions Graph <?php echo "$month" ?>',
           colors: ['#2ecc71', '#EA2027'],
          pointSize: 8,
          curveType: 'function',
          animation: {'startup': true,  duration: 1000,
          easing: 'out'},
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('monthly_sales'));

        chart.draw(data, options);
      }


      google.charts.setOnLoadCallback(drawPieChart);

      function drawPieChart() {
        var data = google.visualization.arrayToDataTable([
          ['Transactions', 'Quantity'],
          ['Completed Orders',     <?php echo "$CompletedCount"; ?>],
          ['Cancelled Orders',      <?php echo "$CancelledCount"; ?>]
        ]);

        var options = {
          title: 'Transactions <?php echo "$month" ?>',
           colors: ['#2ecc71', '#EA2027'],
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }

</script>