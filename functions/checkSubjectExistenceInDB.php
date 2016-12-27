<?php
function checkSubjectExistenceInDB($query, $subjectToQuery){
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
?>