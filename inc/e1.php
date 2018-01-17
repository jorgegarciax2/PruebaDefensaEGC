<?php 
//index.php
$user = "votaciones-user";
$password = "votaciones-user-1928";
$server = "mysql:3306";
$dbname = "votaciones_splc";
$connect = mysqli_connect($server, $user, $password) or die("No se ha podido conectar con la base de datos");
$db = mysqli_select_db($connect, $dbname) or die("No se ha podido conectar con la base de datos");
/*$connect = mysqli_connect("localhost", "votaciones-user", "yRn7lQTHRRfCAHjB", "votaciones_splc");*/
$query = "select *from poll where startDate < now() && endDate > now();";
$result = mysqli_query($connect, $query);
  echo $row ['title'] ;
$suma=0;

?>
 
 
<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Language', 'Rating'],
      <?php

      if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
          	$suma=  ($row["participantes_admitidos"]) - ($row["votos_actuales"]); 
          	
            echo "['la gente que han votado:".$row['title']."', ".$row['votos_actuales']." ],";
            echo "['la gente no votadas :".$row['title']."', ".$suma." ],";
         


          }
      }
      ?>
    ]);

    var options = {
       //title: 'Resultado de los votantes',
         title:'Resultado de votos',
        width: 900,
        height: 500,
    };
    
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    
    chart.draw(data, options);
}

</script>
</head>
<body>
    <!-- Display the pie chart -->
    <div id="piechart"></div>
</body>
</html>
