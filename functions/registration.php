<?php
require_once ($_SERVER['DOCUMENT_ROOT'] .'/functions/checkEMailAdressUnique.php');

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
	elseif(empty($_POST['userAgreementCheck'])){
		echo 'подтвердите согласие с пользовательским соглашением';
		die();
	} 
	else{
		
		$nickName = $_POST['nickName'];
		uniqueCheck('nickName', $nickName);
		
		$userMailAdress = $_POST['userMailAdress'];
		uniqueCheck('userMailAdress', $userMailAdress);
		
		$password = $_POST['password'];
		$userAgreementCheck = $_POST['userAgreementCheck'];
		$eMailConfirm = 0;
		
		$query = "INSERT INTO `user_data` (`nick_name`, `e_mail`, `e_mail_confirm`, `password`, `user_agreement`) VALUES (?, ?, ?, ?, ?)";
		$stmt = mysqli_prepare($Link, $query);
		mysqli_stmt_bind_param($stmt,'ssiss', $nickName, $userMailAdress, $eMailConfirm, $password, $userAgreementCheck);
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

		$_SESSION['loginedUser'] = "";
		header('Location: /'.$_SESSION['loginedUser'].'');
		die();
	}
?>