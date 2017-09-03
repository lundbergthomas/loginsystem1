<?php 

//forbindelse til mySQL serveren ved brug af mySQLi metode.

//1. Variabler (konstanter) til forbindelsen.


const HOSTNAME = 'localhost'; //Server
const MYSQLUSER = 'root'; //SuperBruger
const MYSQLPASS = 'root'; //password
const MYSQLDB = 'mul_a'; //Database navn

//2. Forbindelsen via mySQLi metode

$con = new MySQLi(HOSTNAME, MYSQLUSER, MYSQLPASS, MYSQLDB);

//for at sikre sig, at alle utf-8 tegn kan blive brugt i forbindelsen.
$con->set_charset ('utf-8');

//3. Tjek:
//hvis der er fejl i forbindelsen,
if($con->connect_error){
	die($con->connect_error);
//hvis der er hul igennem:
} else {
	echo '<p>Jeg er connected</p>';
}


//php slut tag kan undlades, hvis filen indenholder rent php.