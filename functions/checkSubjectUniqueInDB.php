<?php
require_once ($_SERVER['DOCUMENT_ROOT'] .'/functions/checkSubjectExistenceInDB.php');
	
function uniqueCheck($what, $subjectToCheck){
	
	global $Link;
	
	if($what == "nickName"){
		$query = "SELECT count(*) FROM `user_data` WHERE `nick_name` =? LIMIT 1";
		checkSubjectExistenceInDB($query, $subjectToCheck);
		
	}elseif($what == "userMailAdress"){
		$query = "SELECT count(*) FROM `user_data` WHERE `e_mail` =? LIMIT 1";
		checkSubjectExistenceInDB($query, $subjectToCheck);
		
	}else return;
}


?>