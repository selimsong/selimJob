<?php
 /**
 * Home Page

 * @selim
 */


include_once './bootstrap.inc.php';

$db = new db($host, $user, $pwd, $dbName);
$query= $db->query("select * from company_account");
while($row = $db->fetch_array($query)){
    echo $row['id'],'.....',$row['name'],'...',$row['password'];
	echo "<br>";
}
$db->close();
?>
