<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head>
<title>Far och Flyg</title>
<link rel="stylesheet" type="text/css" href="http://127.0.0.1/phpapp/style.css">
</head>
<body>
<script src="appscript.js"></script>

<div> 
    <form action="index.php" method="post">
    <div id="menublock">
        
     
        
    </div>
    
    <div id="hiddenmenu">
        <table id="menu">
        <tr>
            <td class="active2"><a href="">Sök</a></td></tr>
            <tr><td><a href="">Om hemsidan</a></td></tr>
            <tr><td><a href="">Licens</a></td></tr>
        </table>
    </div>
    
    <div id="menuBar">
    
        <div class="logobox">
            <span class="logotext">Far</span><span class="logoX">&</span><span class="logotext">Flyg</span>
        </div>
    
        <div class="linkbox" onclick="menuClick(this);showMenu();">
            
        <div class="burgermenu">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
            <span class="menutext">meny</span>
        </div>
        
    </div>
    
    <div class="hellomessage">
        <span class="messagestyle">Vi flyger dig vart som helst!</span>
    </div>

   
       
    <div id="destinationBox">
        
	
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

$pdo = new PDO('mysql:dbname=testDB;host=localhost', 'root', 'password');

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

$pdo = new PDO('mysql:dbname=testDB;host=localhost', 'root', 'password');

foreach($pdo->query("SELECT * FROM destinations ORDER BY LOCATION;") as $row){
echo '<option value="'.$row['ID'].'">';
echo $row['LOCATION'];
echo '</option>';
}       
?>
</select> 
	 </div>
                </td>
                
                
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
    
     <div class="oneway"><span class="calendartitles">Enkelresa</span> <input class="checkBox" type="checkbox"></div>
    
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
                
                <div class="searchbox">
    <input type="submit" value="SÖK" class="searchbutton">
	
                </div>
    
    
                
</div>
                
            </div>
            
        </div>
 
    </div>
    </form>
   

<div class="flightTable">

<div class="flightContainer">

<div class="resultborder"></div>

<?php
$pdo = new PDO('mysql:dbname=testDB;host=localhost', 'root', 'password');
$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );

		foreach($pdo->query( 'SELECT * FROM flights ORDER BY DATEFLIGHT asc;' ) as $row){
		echo "<table class='flightresults'>";
		echo "<tr>
			<td colspan='4'>
			<div class='resultholder'>
			<div class='dateholder'>
			<span class='flightdate'>";      
		echo "<span class='flightdate'>".$row['DATEFLIGHT']."</span></div>";      
		echo "<span class='timeshow'>".$row['DEPARTURE']."</span>";
		echo "<span class='pcode'> ".$row['TOWN_FROM']."</span><span class='arrowpoint'> &#8594; </span>";
		echo "<span class='timeshow'> ".$row['ARRIVAL']."</span>";
		echo "<span class='timeshow'><span class='pcode'>  ".$row['TOWN_TO']."</span></span>";
		echo "<td><div class='priceholder'><span class='price'>".$row['PRICE']." SEK</span></div></td>";
		echo " <td><div class='buttonholder'><button class='buybutton'>Köp</button></div></td></tr>";
		echo " </table>";
		}
	
	


function debug($o){
echo '<pre>';
print_r($o);
echo '</pre>';
}

?>

 </div>
 
 <br><br><br>

    </div>
     

</body>
</html>