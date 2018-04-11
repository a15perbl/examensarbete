var http = require('http'); 
var mysql = require('mysql');

var con = mysql.createConnection({
      host    : "localhost",
      user    : "root",
      password: "password",
      database: "testDB",
      port    : 3306
});



var queryString2 = "SELECT * FROM destinations";
var id = ['','','','',''];
var location = ['','','','',''];

var queryString = "SELECT * FROM flights ORDER BY DEPARTURE asc";
var flightno = ['','','','','','','','',];
var town_from = ['','','','','','','','',];
var town_to = ['','','','','','','','',];
var dateflight = ['','','','','','','','',];
var departure = ['','','','','','','','',];
var arrival = ['','','','','','','','',];
var price = ['','','','','','','','',];

con.connect(function(err) {
  if (err) throw err;
});

var result_arr = [];
function setValue (value) {
  result_arr = value;
}

var result_arr2 = [];
function setValue (value) {
  result_arr2 = value;
}

con.query(queryString, function (err, rows, fields) {
  if (err) throw err;
  else {
    setValue(rows);
    //console.log(result_arr);
    for (let i = 0; i < rows.length; i++) {
      flightno[i] += rows[i].FLIGHTNO;
      town_from[i] += rows[i].TOWN_FROM;
      town_to[i] += rows[i].TOWN_TO;
      dateflight[i] += rows[i].DATEFLIGHT;
      departure[i] += rows[i].DEPARTURE;
      arrival[i] += rows[i].ARRIVAL;
      price[i] += rows[i].PRICE;
    }

  }
});

con.query(queryString2, function (err, rows2, fields) {
  if (err) throw err;
  else {
    setValue(rows2);
    //console.log(result_arr2);
    for (let i = 0; i < rows2.length; i++) {
      id[i] += rows2[i].ID;
      location[i] += rows2[i].LOCATION;
    }
    console.log(id);
    console.log(location);
  }
});



http.createServer(function(req, res) {
  res.writeHead(200, {
    'Content-Type': 'text/html'
  });
  res.write('<!DOCTYPE html><html><meta charset="UTF-8"><head><title>Far och Flyg</title>'+
  '<link rel="stylesheet" type="text/css" href="http://127.0.0.1/phpapp/style.css"></head><body><script src="http://127.0.0.1/phpapp/appscript.js"></script>'+
  '<div><form action="index.php" method="post"><div id="menublock"></div><div id="hiddenmenu"><table id="menu">' +
  '<tr><td class="active2"><a href="">Sök</a></td></tr><tr><td><a href="">Om hemsidan</a></td></tr><tr><td><a href="">Credits</a></td></tr>'+
  '</table></div><div id="menuBar"><div class="logobox"><span class="logotext">Far</span><span class="logoX">&</span><span class="logotext">Flyg</span>'+
  '</div><div class="linkbox" onclick="menuClick(this);showMenu();"><div class="burgermenu"><div class="bar1"></div><div class="bar2"></div>'+
  '<div class="bar3"></div></div><span class="menutext">meny</span></div></div><div class="hellomessage">'+
  '<span class="messagestyle">Vi flyger dig vart som helst!</span></div><div id="destinationBox"><div class="selectDest">'+
  '<table class="search"><tr><td><span class="destTitle">Från</span></td><td><span class="destTitle">Till</span></td>'+
  '<td></td></tr><tr> <td><div id="selectFrom"><select class="destBox" name="plats">');
  for ( i = 0; i < id.length; i++) {
    res.write('<option value="' + id[i] + '">' +
    location[i] + '</option>');
  ;}
  res.write('</select></div></td><td><div id="selectTo"><select class="destBox" name="plats">');
  for ( i = 0; i < id.length; i++) {
    res.write('<option value="' + id[i] + '">' +
    location[i] + '</option>');
  ;}
  res.write('</select> </div></td></tr></table><div class="guaranteebox"><div class="calendarcontainer">'+
  '<div class="calendar1"><span class="calendartitles">Utresa</span><div class="month"><ul><li class="prev">&#10094;</li>'+
  '<li class="next">&#10095;</li><li class="monthtitle">Augusti<br><span style="font-size:18px">2017</span>'+
   '</li></ul></div><ul class="weekdays"><li>Må</li><li>Ti</li><li>On</li><li>To</li><li>Fr</li><li>Lö</li><li>Sö</li></ul>'+
  '<ul class="days"><li>1</li><li>2</li><li>3</li><li>4</li><li>5</li><li>6</li><li>7</li><li>8</li><li>9</li><li><span class="active">10</span></li>'+
  '<li>11</li><li>12</li><li>13</li><li>14</li><li>15</li><li>16</li><li>17</li><li>18</li><li>19</li><li>20</li>'+
 '<li>21</li><li>22</li><li>23</li><li>24</li><li>25</li><li>26</li><li>27</li><li>28</li><li>29</li><li>30</li>'+
 '<li>31</li></ul></div><div class="calendar2"><span class="calendartitles">Hemresa</span><div class="oneway">'+
 '<span class="calendartitles">Enkelresa</span> <input class="checkBox" type="checkbox"></div><div class="month">'+
 '<ul><li class="prev">&#10094;</li><li class="next">&#10095;</li><li class="monthtitle">Augusti<br><span style="font-size:18px">2017</span>'+
 '</li></ul></div><ul class="weekdays"><li>Må</li><li>Ti</li><li>On</li><li>To</li><li>Fr</li><li>Lö</li>'+
 '<li>Sö</li></ul><ul class="days">  <li>1</li><li>2</li> <li>3</li><li>4</li><li>5</li><li>6</li><li>7</li>'+
 '<li>8</li><li>9</li><li><span class="active">10</span></li><li>11</li><li>12</li><li>13</li><li>14</li>'+
 '<li>15</li><li>16</li><li>17</li><li>18</li><li>19</li><li>20</li><li>21</li><li>22</li><li>23</li><li>24</li>'+
 '<li>25</li><li>26</li> <li>27</li><li>28</li><li>29</li><li>30</li><li>31</li></ul> </div> </div><div class="searchbox">'+
 '<input type="submit" value="SÖK" class="searchbutton"></div></div></div></div></div></form><div class="flightTable">'+
 '<div class="flightContainer"><div class="resultborder"></div>');
    for ( i = 0; i < dateflight.length; i++) {
      res.write('<table class="flightresults"><tr><td colspan="4"><div class="resultholder">'+
      '<div class="dateholder"><span class="flightdate">' + dateflight[i] + '</span></div>'+
      '<span class="timeshow">' + departure[i] + '</span>'+
      '<span class="pcode"> ' + town_from[i] + '</span><span class="arrowpoint"> &#8594; </span>'+
      '<span class="timeshow"> ' + arrival[i] + '</span><span class="timeshow"><span class="pcode"> ' + town_to[i] + '</span></span></td>'+
      '<td><div class="priceholder"><span class="price"> ' + price[i] + ' SEK</span></div></td>'+ '<td><div class="buttonholder"><button class="buybutton">Köp</button></div></td></tr></table>'  );
    ;}
    res.write('</div><br><br><br></div></body></html>');
  res.end();
}).listen(8888, '127.0.0.1');
console.log('Server running at http://127.0.0.1:8888');

