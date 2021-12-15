<?php
require_once '../include/config.php';
if(ISSET($_POST['res'])){

	$month = $_POST['month'];
	$newMonth = substr($month, 5);
	$newYear = substr($month, 0, -3);

	

	
		$query = $link->query("SELECT 
			(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-$newMonth-01' AND '$newYear-$newMonth-08') as Week1,
			(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-$newMonth-09' AND '$newYear-$newMonth-15') as Week2,
			(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-$newMonth-16' AND '$newYear-$newMonth-22') as Week3,
			(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-$newMonth-23' AND '$newYear-$newMonth-31') as Week4");

		while($fetch = $query->fetch_array()){
			$week1 = $fetch["Week1"];
			$week2 = $fetch["Week2"];
			$week3 = $fetch["Week3"];
			$week4 = $fetch["Week4"];
		}
	
		$queryDaily = $link->query("SELECT 
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-01') as Day01,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-02') as Day02,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-03') as Day03,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-04') as Day04,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-05') as Day05,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-06') as Day06,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-07') as Day07,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-08') as Day08,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-09') as Day09,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-10') as Day10,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-11') as Day11,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-12') as Day12,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-13') as Day13,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-14') as Day14,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-15') as Day15,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-16') as Day16,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-17') as Day17,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-18') as Day18,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-19') as Day19,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-20') as Day20,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-21') as Day21,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-22') as Day22,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-23') as Day23,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-24') as Day24,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-25') as Day25,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-26') as Day26,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-27') as Day27,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-28') as Day28,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-29') as Day29,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-30') as Day30,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added = '$newYear-$newMonth-31') as Day31
		");
	
		while($fetchDaily = $queryDaily->fetch_array()){
			$Day01 = $fetchDaily['Day01'];
			$Day02 = $fetchDaily['Day02'];
			$Day03 = $fetchDaily['Day03'];
			$Day04 = $fetchDaily['Day04'];
			$Day05 = $fetchDaily['Day05'];
			$Day06 = $fetchDaily['Day06'];
			$Day07 = $fetchDaily['Day07'];
			$Day08 = $fetchDaily['Day08'];
			$Day09 = $fetchDaily['Day09'];
			$Day10 = $fetchDaily['Day10'];
			$Day11 = $fetchDaily['Day11'];
			$Day12 = $fetchDaily['Day12'];
			$Day13 = $fetchDaily['Day13'];
			$Day14 = $fetchDaily['Day14'];
			$Day15 = $fetchDaily['Day15'];
			$Day16 = $fetchDaily['Day16'];
			$Day17 = $fetchDaily['Day17'];
			$Day18 = $fetchDaily['Day18'];
			$Day19 = $fetchDaily['Day19'];
			$Day20 = $fetchDaily['Day20'];
			$Day21 = $fetchDaily['Day21'];
			$Day22 = $fetchDaily['Day22'];
			$Day23 = $fetchDaily['Day23'];
			$Day24 = $fetchDaily['Day24'];
			$Day25 = $fetchDaily['Day25'];
			$Day26 = $fetchDaily['Day26'];
			$Day27 = $fetchDaily['Day27'];
			$Day28 = $fetchDaily['Day28'];
			$Day29 = $fetchDaily['Day29'];
			$Day30 = $fetchDaily['Day30'];
			$Day31 = $fetchDaily['Day31'];
		}

		$previousMonth = $newMonth - 1;
		$previousYear = $newYear - 1;

		if ($newMonth == "1") {
			$queryPieChart = $link->query("SELECT 
			(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-$newMonth-01' AND '$newYear-$newMonth-31') as CurrentMonth,
			(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$previousYear-12-01' AND '$previousYear-12-31') as PreviousMonth");

				while($fetchPieChart = $queryPieChart->fetch_array()){
					$CurrentMonth = $fetchPieChart["CurrentMonth"];
					$PreviousMonth = $fetchPieChart["PreviousMonth"];
				}

				$newDate = $newYear."-".$newMonth;
				$previousDate = $previousYear."-12";
		}

		else {

			$queryPieChart = $link->query("SELECT 
			(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-$newMonth-01' AND '$newYear-$newMonth-31') as CurrentMonth,
			(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-$previousMonth-01' AND '$newYear-$previousMonth-31') as PreviousMonth");

				while($fetchPieChart = $queryPieChart->fetch_array()){
					$CurrentMonth = $fetchPieChart["CurrentMonth"];
					$PreviousMonth = $fetchPieChart["PreviousMonth"];
				}

				$newDate = $newYear."-".$newMonth;
				$previousDate = $newYear."-".$previousMonth;
		}


		$queryMonthySales = $link->query("SELECT 
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-01-01' AND '$newYear-01-31') as January,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-02-01' AND '$newYear-02-31') as February,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-03-01' AND '$newYear-03-31') as March,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-04-01' AND '$newYear-04-31') as April,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-05-01' AND '$newYear-05-31') as May,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-06-01' AND '$newYear-06-31') as June,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-07-01' AND '$newYear-07-31') as July,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-08-01' AND '$newYear-08-31') as August,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-09-01' AND '$newYear-09-31') as September,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-10-01' AND '$newYear-10-31') as October,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-11-01' AND '$newYear-11-31') as November,
		(SELECT IFNULL(SUM(Total), 0) FROM `tbl_pending_orders` WHERE Order_Status = 'Cancelled' AND Date_Added BETWEEN '$newYear-12-01' AND '$newYear-12-31') as December");


		while($fetchMonthlySales = $queryMonthySales->fetch_array()){
				$January	= $fetchMonthlySales["January"];
				$February	= $fetchMonthlySales["February"];
				$March		= $fetchMonthlySales["March"];
				$April		= $fetchMonthlySales["April"];
				$May		= $fetchMonthlySales["May"];
				$June		= $fetchMonthlySales["June"];
				$July		= $fetchMonthlySales["July"];
				$August		= $fetchMonthlySales["August"];
				$September	= $fetchMonthlySales["September"];
				$October	= $fetchMonthlySales["October"];
				$November	= $fetchMonthlySales["November"];
				$December	= $fetchMonthlySales["December"];
		}
}
?>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});


google.charts.setOnLoadCallback(drawPieChart);

      function drawPieChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Cancelled Transactions'],
          ['<?php echo "$newDate"; ?>',     <?php echo "$CurrentMonth"; ?>],
          ['<?php echo "$previousDate"; ?>',      <?php echo "$PreviousMonth"; ?>]
        ]);

        var options = {
          title: 'Cancelled Transactions Comparison <?php echo "$previousDate"; ?> and <?php echo "$newDate"; ?>',
          pieHole: 0.4,
          colors: ['#EA2027', '#3498db']
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }



      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([

          ['Week', 'Cancelled Transactions'],
          ['Week 1 \n Day 1 to Day 8',  <?php echo "$week1";?>],
          ['Week 2 \n Day 9 to Day 15',  <?php echo "$week2";?>],
          ['Week 3 \n Day 16 to Day 22',  <?php echo "$week3";?>],
          ['Week 4 \n Day 23 to Day 31',  <?php echo "$week4";?>]

        ]);

        var options = {
          title: 'PPM Cancelled Transactions Graph <?php echo "$month"; ?>',
          colors: ['#EA2027'],
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
          ['Day', 'Cancelled Transactions'],
          ['01', <?php echo "$Day01"; ?>],
          ['02', <?php echo "$Day02"; ?>],
          ['03', <?php echo "$Day03"; ?>],
          ['04', <?php echo "$Day04"; ?>],
          ['05', <?php echo "$Day05"; ?>],
          ['06', <?php echo "$Day06"; ?>],
          ['07', <?php echo "$Day07"; ?>],
          ['08', <?php echo "$Day08"; ?>],
          ['09', <?php echo "$Day09"; ?>],
          ['10', <?php echo "$Day10"; ?>],
          ['11', <?php echo "$Day11"; ?>],
          ['12', <?php echo "$Day12"; ?>],
          ['13', <?php echo "$Day13"; ?>],
          ['14', <?php echo "$Day14"; ?>],
          ['15', <?php echo "$Day15"; ?>],
          ['16', <?php echo "$Day16"; ?>],
          ['17', <?php echo "$Day17"; ?>],
          ['18', <?php echo "$Day18"; ?>],
          ['19', <?php echo "$Day19"; ?>],
          ['20', <?php echo "$Day20"; ?>],
          ['21', <?php echo "$Day21"; ?>],
          ['22', <?php echo "$Day22"; ?>],
          ['23', <?php echo "$Day23"; ?>],
          ['24', <?php echo "$Day24"; ?>],
          ['25', <?php echo "$Day25"; ?>],
          ['26', <?php echo "$Day26"; ?>],
          ['27', <?php echo "$Day27"; ?>],
          ['28', <?php echo "$Day28"; ?>],
          ['29', <?php echo "$Day29"; ?>],
          ['30', <?php echo "$Day30"; ?>],
          ['31', <?php echo "$Day31"; ?>]
        ]);

        var options = {
          colors: ['#EA2027'],
          chart: {
            title: 'PPM Daily <?php echo "$month"; ?>',
            subtitle: 'Cancelled Transactions',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }


      google.charts.setOnLoadCallback(drawMonthlyChart);

      function drawMonthlyChart() {
        var data = google.visualization.arrayToDataTable([

          ['Months', 'Cancelled Transactions'],
          ['January',  <?php echo "$January"; ?>],
          ['February',  <?php echo "$February"; ?>],
          ['March',  <?php echo "$March"; ?>],
          ['April',  <?php echo "$April"; ?>],
          ['May',  <?php echo "$May"; ?>],
          ['June',  <?php echo "$June"; ?>],
          ['July',  <?php echo "$July"; ?>],
          ['August',  <?php echo "$August"; ?>],
          ['September',  <?php echo "$September"; ?>],
          ['October',  <?php echo "$October"; ?>],
          ['November',  <?php echo "$November"; ?>],
          ['December', <?php echo "$December"; ?>]
        ]);

        var options = {
          title: 'PPM Cancelled Transactions Graph <?php echo "$newYear"; ?>',
          colors: ['#EA2027'],
          pointSize: 8,
          curveType: 'function',
          animation: {'startup': true,  duration: 1000,
          easing: 'out'},
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('monthly_sales'));

        chart.draw(data, options);
      }


</script>