<?php
//TODO update this according to new bootstrap/autoloader layout
	function is_logged_in(){
		if(isset($_SESSION['user'])){
			return true;
		}
		return false;
	}
	
	function is_admin(){
		if(isset($_SESSION['user']) && isset($_SESSION['user']['roles'])){
			//updated to handle rows and assoc values
			$rows = $_SESSION['user']['roles'];
			foreach($rows as $row){
				foreach($row as $key => $value){
					if($value == "admin"){
						return true;
					}
				}
			}
			/*flat array
			if(in_array("admin", $_SESSION['user']['roles'])){
				return true;
			}*/
		}
		return false;
	}
	function is_admin_redirect(){
		if(!is_admin()){
			header("Location: login.php");
			exit();
		}
	}
?>