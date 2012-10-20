<?php
$email = $_REQUEST["email"];
$pwd  = $_POST["pwd"];
$con=mysql_connect("172.16.135.62", "root") or die("Could not connect to database. Please check your internet connection");
$db = mysql_select_db("madapp",$con);

$query = "SELECT u.password, u.name, g.name
FROM user u,  `group` g, usergroup ug
WHERE u.id = ug.user_id
AND g.id = ug.group_id
AND u.email='$email' ";

$res = mysql_query($query, $con);
$r=mysql_fetch_row($res);

if($r[0]==$pwd && $pwd!="")
{
	echo "<script type=text/javascript>
	window.location = 'home.html';
	</script> ";	
}

if($r[0]!=$pwd && $pwd=="")
{
	echo "<span style='background-color:blue;'>Invalid username or/and password. Try again.</span>";
}


mysql_close($con);


?>
