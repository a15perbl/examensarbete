<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<body>

<h1>Vart vill du resa?</h1>
<br>

<form action="index.php" method="post">

Från: <br>
<select size='1' name='plats'>
<?php 
   
			$pdo = new PDO('mysql:dbname=testDB;host=localhost', 'sqllab', 'Tomten2009');
        
			foreach($pdo->query("SELECT * FROM destinations ORDER BY LOCATION;") as $row){
			echo '<option value="'.$row['ID'].'">';
			echo $row['LOCATION'];
			echo '</option>';
			}       
?>
   </select>
<br><br>
Till: <br>
<select size='1' name='plats'>
<?php 
   
			$pdo = new PDO('mysql:dbname=testDB;host=localhost', 'sqllab', 'Tomten2009');
        
			foreach($pdo->query("SELECT * FROM destinations ORDER BY LOCATION;") as $row){
			echo '<option value="'.$row['ID'].'">';
			echo $row['LOCATION'];
			echo '</option>';
			}       
?>
   </select> 
<br><br><input type="submit" />
</form>
<br><br>   


<table class='flighttable' border='1px'>

<?php
	$pdo = new PDO('mysql:dbname=testDB;host=localhost', 'sqllab', 'Tomten2009');
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
	
	echo " <tr><th>Flygkod</th><th>Datum</th><th>Avgång</th><th>Ankomst</th><th>Pris</th></tr>";
	
    foreach($pdo->query( 'SELECT * FROM flights ORDER BY DATEFLIGHT asc;' ) as $row){
      echo "<tr>";
      echo "<td>".$row['FLIGHTNO']."</td>";      
      echo "<td>".$row['DATEFLIGHT']."</td>";      
      echo "<td>".$row['DEPARTURE']."</td>";
	  echo "<td>".$row['ARRIVAL']."</td>";
	  echo "<td>".$row['PRICE']."</td>";
      echo "</tr>";
    }
	
	 function debug($o){
      echo '<pre>';
      print_r($o);
      echo '</pre>';
    }

?>

</table>

</body>
</html>