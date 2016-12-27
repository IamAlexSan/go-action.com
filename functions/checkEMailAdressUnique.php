<?php
function queryToDB($query, $subjectToQuery){
		global $Link;
		
			$stmt = mysqli_prepare($Link,$query);
			mysqli_stmt_bind_param($stmt,'s',$subjectToQuery); 
			mysqli_stmt_execute($stmt); 
			mysqli_stmt_bind_result($stmt,$result); 
			mysqli_stmt_fetch($stmt); 
			mysqli_stmt_close($stmt); 
			if($result >= 1){
			
				die($subjectToQuery." занято");
			}
				return;//свободно
	}
	
function uniqueCheck($what, $subjectToCheck){
	
	global $Link;
	
	if($what == "nickName"){
		$query = "SELECT count(*) FROM `user_data` WHERE `nick_name` =? LIMIT 1";
		queryToDB($query, $subjectToCheck);
		
	}elseif($what == "userMailAdress"){
		$query = "SELECT count(*) FROM `user_data` WHERE `e_mail` =? LIMIT 1";
		queryToDB($query, $subjectToCheck);
		
	}else return;
}


?>