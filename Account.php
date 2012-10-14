<?php
 /**
 * Home Page

 * @selim
 */
include_once './bootstrap.inc.php';


$smarty = new Smarty;
$tpl = 'account.tpl';

switch($_GET['act']){
	case "add":
       $tpl = 'account_add.tpl';
        break;
		
}

$smarty->display($tpl);


?>
