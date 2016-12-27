<?php
require_once ($_SERVER['DOCUMENT_ROOT'] .'/functions/checkSubjectUniqueInDB.php');

if(empty($_POST['nickName'])){
		echo 'введите ваш ник'; 
		die();
	} 
	elseif(empty($_POST['userMailAdress'])){
		echo 'введите ваш eMail';
		die();
	}
	elseif(empty($_POST['password'])){
		echo 'введите пароль';
		die();
	}
	else{
		
		$nickName = $_POST['nickName'];
		uniqueCheck('nickName', $nickName);
		
		$userMailAdress = $_POST['userMailAdress'];
		uniqueCheck('userMailAdress', $userMailAdress);
		
		$password = $_POST['password'];
		$eMailConfirm = 0;
		$password = password_hash($password, PASSWORD_BCRYPT);
		
		$query = "INSERT INTO `user_data` (`nick_name`, `e_mail`, `e_mail_confirm`, `password`) VALUES (?, ?, ?, ?)";
		$stmt = mysqli_prepare($Link, $query);
		mysqli_stmt_bind_param($stmt,'ssis', $nickName, $userMailAdress, $eMailConfirm, $password);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		
		$subject ='=?utf-8?b?'.base64_encode('Pегистрация').'?=';
		$message ='<html><head><title></title></head><body>
		'.$nickName.'</body>
		</html>';
		$headers ="Content-Type: text/html;charset=utf-8\r\n";
		$headers .="Content-Transfer-Encoding: 8bit\r\n";
		$headers .="Mime-Version: 1.0\r\n";
		$headers .="From: <saneev.otherside@yandex.ua>\r\n";
		$headers .="Reply-To: <saneev.otherside@yandex.ua>\r\n";
		mail($userMailAdress,$subject,$message,$headers);

		#$_SESSION['loginedUser'] = $nickName;
		#$_SESSION['userStatus'] = "logined";
		header('Location: /');
		#die("Your Accoun create");
	}
?>