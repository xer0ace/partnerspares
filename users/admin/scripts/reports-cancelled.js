$(document).ready(function(){ 

  $("#month-picker").on('change', function(){
    var month = $('#month-picker').val();
    
        $.ajax({
        url: 'ajax-queries/reports-months-cancelled.php',
        type: 'POST',
        data: {
          month: month,
          res: 1
        },
        success: function(response){
            $('#curve_chart').html(response);

              $.ajax({
                url: 'ajax-queries/reports-recent-transactions-cancelled.php',
                type: 'POST',
                data: {
                   month: month,
                  res: 1
                },
                success: function(response){
                  $('#transactions-list').html(response);


                  



                }
              })
        }
      })

  });


});  


google.charts.load('current', {'packages':['corechart']});

google.charts.setOnLoadCallback(drawPieChart);

      function drawPieChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Cancelled Transactions'],
          ['Selected Month',     0],
          ['Previous',      0]
        ]);

        var options = {
          title: 'Cancelled Transactions 0000-00 and 0000-00',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }





google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([

          ['Week', 'Transactions'],
          ['Week 1 \n Day 1 to Day 8',  0],
          ['Week 2 \n Day 9 to Day 15',  0],
          ['Week 3 \n Day 16 to Day 22',  0],
          ['Week 4 \n Day 23 to Day 31',  0]

        ]);

        var options = {
          title: 'PPM Cancelled Transactions Graph 0000-00',
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
          ['01', 0],
          ['02', 0],
          ['03', 0],
          ['04', 0],
          ['05', 0],
          ['06', 0],
          ['07', 0],
          ['08', 0],
          ['09', 0],
          ['10', 0],
          ['11', 0],
          ['12', 0],
          ['13', 0],
          ['14', 0],
          ['15', 0],
          ['16', 0],
          ['17', 0],
          ['18', 0],
          ['19', 0],
          ['20', 0],
          ['21', 0],
          ['22', 0],
          ['23', 0],
          ['24', 0],
          ['25', 0],
          ['26', 0],
          ['27', 0],
          ['28', 0],
          ['29', 0],
          ['30', 0],
          ['31', 0]
        ]);

        var options = {
          colors: ['#EA2027'],
          chart: {
            title: 'PPM Daily 0000-00',
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
          ['January',  0],
          ['February',  0],
          ['March',  0],
          ['April',  0],
          ['May',  0],
          ['June',  0],
          ['July',  0],
          ['August',  0],
          ['September',  0],
          ['October',  0],
          ['November',  0],
          ['December',  0]
        ]);

        var options = {
          title: 'PPM Cancelled Transactions Graph 0000',
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
