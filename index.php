<?php

error_reporting(-1); ini_set('display_errors', true); mb_internal_encoding("UTF-8"); session_start();

	# БАЗА ДАННЫХ
	define ('DB_HOST', 		'localhost');						# Хостинг
	define ('DB_USER', 		'go_action_admin');					# Пользователь базы данных
	define ('DB_USR_PWD', 	'1111');							# Пароль пользователя базы данных
	define ('DB_NAME', 		'go_action');						# Имя базы данных
	
	$Link = mysqli_connect(DB_HOST, DB_USER, DB_USR_PWD, DB_NAME);

#__________________________________________________________________________
#	
#обработка урл
	if($_SERVER['REQUEST_URI'] == '/') $layout = 'index';
		else $partsOfURL = explode('/',  trim( urldecode( parse_url($_SERVER['REQUEST_URI'] , PHP_URL_PATH)), '/'));
#__________________________________________________________________________
#
#####__Контроллер__#####
#Авторизации
	if(isset($_POST['signIn'])) require_once ($_SERVER{'DOCUMENT_ROOT'} .'/functions/authorisation.php'); 
#Регистрации
	elseif(isset($_POST['registration'])) require_once ($_SERVER{'DOCUMENT_ROOT'} .'/functions/registration.php'); 
#__________________________________________________________________________
#
	
	
//Дичь
if(isset($_SESSION['loginedUser'])) {
	$layout = 'userAccountPrimaryPage';
	$user = $_SESSION['loginedUser'];
}
#__________________________________________________________________________
#
#####__Подключение шаблонов__#####
	require_once ($_SERVER['DOCUMENT_ROOT'] .'/Layouts/' .$layout .'.html');

unset ($_SESSION['loginedUser']);
/*
#var_dump(require_once ($_SERVER{'DOCUMENT_ROOT'} .'/functions/registration.php'));
#print_r (require_once ($_SERVER{'DOCUMENT_ROOT'} .'/functions/registration.php'));
#echo "y";


*/
exit();
?>