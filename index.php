<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head>
<title>FleXpress</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div> 

<div id="menuBar">

<div class="logobox">
	<span class="logotext">FLE</span><span class="logoX">X</span><span class="logotext">PRESS</span>
</div>

<div class="linkbox">
 <ul>
		<li><a href="">lklk</a></li>
		<li><a href="">kljfkldsj</a></li>
		<li><a href="">löakdlöaklö</a></li>
	</ul>
</div>

</div>

<div class="destinationBox">

<div class="selectDest">
	
	<table class="search">
	
	<tr>
		<td><span class="destTitle">Från</span></td>
		<td><span class="destTitle">Till</span></td>
		<td></td>
	</tr>
	<tr>
		<td><div id="selectFrom">
		
<select class="destBox" name='plats'>
<?php 

$pdo = new PDO('mysql:dbname=testDB;host=localhost', 'sqllab', 'Tomten2009');

foreach($pdo->query("SELECT * FROM destinations ORDER BY LOCATION;") as $row){
echo '<option value="'.$row['ID'].'">';
echo $row['LOCATION'];
echo '</option>';
}       
?>
</select>
	</div>
		</td>
		<td>
		 <div id="selectTo">
<select class="destBox" name='plats'>
<?php 

$pdo = new PDO('mysql:dbname=testDB;host=localhost', 'sqllab', 'Tomten2009');

foreach($pdo->query("SELECT * FROM destinations ORDER BY LOCATION;") as $row){
echo '<option value="'.$row['ID'].'">';
echo $row['LOCATION'];
echo '</option>';
}       
?>
</select> 
	</div>
		</td>
		<td><button class="searchbutton">SÖK</button></td>
	</tr>
		 </table>
	
<div class="guaranteebox">
		
	<div class="calendarcontainer">

	<div class="calendar1">
		
		<span class="calendartitles">Utresa</span>
		
		
	<div class="month">      
	  <ul>
		<li class="prev">&#10094;</li>
		<li class="next">&#10095;</li>
		<li class="monthtitle">
		  Augusti<br>
		  <span style="font-size:18px">2017</span>
		</li>
	  </ul>
	</div>

	<ul class="weekdays">
	  <li>Må</li>
	  <li>Ti</li>
	  <li>On</li>
	  <li>To</li>
	  <li>Fr</li>
	  <li>Lö</li>
	  <li>Sö</li>
	</ul>

	<ul class="days">  
	  <li>1</li>
	  <li>2</li>
	  <li>3</li>
	  <li>4</li>
	  <li>5</li>
	  <li>6</li>
	  <li>7</li>
	  <li>8</li>
	  <li>9</li>
	  <li><span class="active">10</span></li>
	  <li>11</li>
	  <li>12</li>
	  <li>13</li>
	  <li>14</li>
	  <li>15</li>
	  <li>16</li>
	  <li>17</li>
	  <li>18</li>
	  <li>19</li>
	  <li>20</li>
	  <li>21</li>
	  <li>22</li>
	  <li>23</li>
	  <li>24</li>
	  <li>25</li>
	  <li>26</li>
	  <li>27</li>
	  <li>28</li>
	  <li>29</li>
	  <li>30</li>
	  <li>31</li>
	</ul>
						</div>
						
	<div class="calendar2">
		
		
		<span class="calendartitles">Hemresa</span>
		
		 <div class="oneway"><span class="calendartitles">Enkelresa</span> <input id="checkBox" type="checkbox"></div>
		
	<div class="month">      
	  <ul>
		<li class="prev">&#10094;</li>
		<li class="next">&#10095;</li>
		<li class="monthtitle">
		  Augusti<br>
		  <span style="font-size:18px">2017</span>
		</li>
	  </ul>
	</div>

	<ul class="weekdays">
	   <li>Må</li>
	  <li>Ti</li>
	  <li>On</li>
	  <li>To</li>
	  <li>Fr</li>
	  <li>Lö</li>
	  <li>Sö</li>
	</ul>

	<ul class="days">  
	  <li>1</li>
	  <li>2</li>
	  <li>3</li>
	  <li>4</li>
	  <li>5</li>
	  <li>6</li>
	  <li>7</li>
	  <li>8</li>
	  <li>9</li>
	  <li><span class="active">10</span></li>
	  <li>11</li>
	  <li>12</li>
	  <li>13</li>
	  <li>14</li>
	  <li>15</li>
	  <li>16</li>
	  <li>17</li>
	  <li>18</li>
	  <li>19</li>
	  <li>20</li>
	  <li>21</li>
	  <li>22</li>
	  <li>23</li>
	  <li>24</li>
	  <li>25</li>
	  <li>26</li>
	  <li>27</li>
	  <li>28</li>
	  <li>29</li>
	  <li>30</li>
	  <li>31</li>
	</ul>

	</div>
			
	</div>
	
</div>
	
</div>

</div>

<div class="flightTable">

<div class="flightContainer">


<?php
$pdo = new PDO('mysql:dbname=testDB;host=localhost', 'sqllab', 'Tomten2009');
$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

echo "<table class='flightresults'>";

echo "<tr>
	<td>Flygkod</td>
	<td>Datum</td>
	<td>Avgång</td>
	<td>Ankomst</td>
	<td>Pris</td>
  </tr>";

foreach($pdo->query( 'SELECT * FROM flights ORDER BY DATEFLIGHT asc;' ) as $row){
echo "<tr>";
echo "<td>".$row['FLIGHTNO']."</td>";      
echo "<td>".$row['DATEFLIGHT']."</td>";      
echo "<td>".$row['DEPARTURE']."</td>";
echo "<td>".$row['ARRIVAL']."</td>";
echo "<td>".$row['PRICE']."</td>";
echo "</tr>";

}
echo " </table>";

function debug($o){
echo '<pre>';
print_r($o);
echo '</pre>';
}

?>

</div>

</div>

</div>



</body>
</html>