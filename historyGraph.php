<?php
  require "header.php";
  require "menu.php";
  require("config/connection.php");
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">History Graph</h1>
    </div>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <?php
            $sql = $sql = "SELECT *, SUM(`Foods`.`Calorie`) AS `Today`
                    FROM `Histories`, `Foods`
                    WHERE `Histories`.`FoodID` = `Foods`.`ID`
                    AND `Histories`.`UserID` = " . $_SESSION["ID"] .
                    " GROUP BY YEAR(`Histories`.`Date`), MONTH(`Histories`.`Date`), DAY(`Histories`.`Date`)
                    ORDER BY `Histories`.`Date` DESC";

              $result = $conn->query($sql);
              if($result->num_rows > 0) {
          ?>
                <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
          <?php
              }else{
          ?>
                <div align="center">
                    <h1>ยังไม่มีรายการที่คุณรับประทาน</h1>
                    <a href="index.php" class="btn btn-primary btn-sm">สุ่มเมนูอาหาร</a>
                </div>
          <?php
              }
          ?>
        </div>
      </div>
    </div>
  </div><!--/.row-->
</div>	<!--/.main-->
<script>
  Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Histories by <?=$_SESSION["FirstName"] . " " . $_SESSION["LastName"] ?>'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: 'Total calorie'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> Calorie<br/>'
    },

    series: [
      {
        name: 'Date',
        colorByPoint: true,
        data: [
          <?php
            while($row = $result->fetch_assoc()){
          ?>
              {
                name: '<?= date("d M Y", strtotime($row["Date"]))?>',
                y: <?=$row["Today"]?>,
                drilldown: '<?=$row["Date"]?>'
              },
          <?php
            }
          ?>
      ]
    },
  ]
  });
</script>
    <?php require "footer.php"; ?>
	</body>
</html>
