<?php
//CONECTA AO MYSQL                                       
$conn = mysql_connect("localhost", "root", "") or die("Erro na conex�o com a base de dados"); 
$db = mysql_select_db("vestibular", $conn) or die("Erro na sele��o da base de dados"); 
//$conn = mysql_connect("neexsoft.com", "neexs895_vest", "kjl0093") or die("Erro na conex�o com a base de dados");
//$db = mysql_select_db("neexs895_vest", $conn) or die("Erro na sele��o da base de dados"); 
mysql_query("SET CHARACTER SET utf8");
	mysql_query("SET NAMES utf8");
	mysql_query("SET NAMES 'utf8' COLLATE 'utf8_general_ci");