<?php
#require_once ($_SERVER{'DOCUMENT_ROOT'} .'/functions/checkSubjectExistenceInDB.php');

function userVerify($query){
	global $Link;
	
	$stmt = mysqli_prepare($Link,$query);
			mysqli_stmt_bind_param($stmt,'s',$fieldValue); 
			mysqli_stmt_execute($stmt); 
			mysqli_stmt_bind_result($stmt,$result); 
			mysqli_stmt_fetch($stmt); 
			mysqli_stmt_close($stmt);
			if($result == 1){
			return $result;
			}else return;
}

$fieldValue = $_POST['loginOrEMailAdress'];

$query = "SELECT count(*) FROM `user_data` WHERE `nick_name` =? LIMIT 1";
$stmt = mysqli_prepare($Link,$query);
			mysqli_stmt_bind_param($stmt,'s',$fieldValue); 
			mysqli_stmt_execute($stmt); 
			mysqli_stmt_bind_result($stmt,$result); 
			mysqli_stmt_fetch($stmt); 
			mysqli_stmt_close($stmt); 
		if($result >= 1){
			$query = "SELECT `password` FROM `user_data` WHERE `nick_name` =? LIMIT 1";
			userVerify($query);
			return;
		}else die("не верно ввденный логин или пароль. или такого пользователя не существует");

$query = "SELECT count(*) FROM `user_data` WHERE `e_mail` =? LIMIT 1";
$stmt = mysqli_prepare($Link,$query);
			mysqli_stmt_bind_param($stmt,'s',$fieldValue); 
			mysqli_stmt_execute($stmt); 
			mysqli_stmt_bind_result($stmt,$result); 
			mysqli_stmt_fetch($stmt); 
			mysqli_stmt_close($stmt); 
		if($result >= 1){
			return;
		}else die("не верно ввденный логин или пароль. или такого пользователя не существует");















#checkSubjectExistenceInDB($query, $subjectToQuery);

#password_verify($SetPassword, $UserPassword);
?>