<?php



class login extends module {


	public function createhash($input,$timestamp){
		$salt = sha1($timestamp);
		$hash = sha1($input . $salt);
		return $hash;
	}
	
	public function checklogin(){
		$session = session_id();
		$ip = $_SERVER["REMOTE_ADDR"];

		$check = dibi::query('SELECT * FROM admins_logged WHERE logged_sessionid=%s',$session,' AND logged_ip=%s',$ip,' LIMIT 1');
		$status = $check->fetchPairs('loggedID','logged_adminID');
		if($status)
			return true;
		else 
			return false;
	}
	
	public function admin_login(){
		$session = session_id();
		$admin_email = core::post("admin_email");
		$admin_password = core::post("admin_password");
		
		// NEED TIMESTAMP FROM USER TO HASH PASSWORD FROM FORM
		$check_user = dibi::query('SELECT * FROM admins WHERE admin_email=%s',$admin_email,' LIMIT 1');
		$user = $check_user->fetch("admin_created");
		
		//echo $this->createhash("admin","2015-10-04 00:28:30");
		/*echo "<pre>";
		var_dump($user["admin_created"]);
		echo "</pre>";*/
		
		$admin_password = $this->createhash($admin_password,$user["admin_created"]);
		echo $admin_password;
		
		// USER EXISTS - LETS CHECK PASSWORD
		if($user){
			$check_pass = dibi::query('SELECT * FROM admins WHERE admin_email=%s',$admin_email,' AND admin_password=%s',$admin_password,'');
			$admin = $check_pass->fetch("adminID");
			if($admin){
				$browser = core::get_browser();
				$browser = $browser["name"] ." ". $browser["version"];
				$data = array(
					"logged_sessionid" => $session,
					"logged_ip" => $_SERVER["REMOTE_ADDR"], // DEV ONLY
					"logged_adminID" =>	$admin["adminID"],
					"logged_info" => "ololololo!!",
					"logged_browser" => $browser, // NEED BETTER SCRIPT
					"logged_location" => "TODO"
				);
				
				$create = dibi::query("INSERT INTO admins_logged",$data);
				if($create){
					header("location: /admin/login_complete=1");
				}
				else {
					header("location: /admin/login_failed=1");
				}
			}
			else {
				header("location: /admin/login_failed=1");
			}
		}
		else {
			header("location: /admin/login_failed=1");
		}
	}

	public function admin_logout(){
		$session = session_id();
		$logout = dibi::query('DELETE FROM admins_logged WHERE logged_sessionid=%s',$session,'');
		if($logout){
			header("location: /admin/logout_complete=1");
		}
		else {
			header("location: /admin/logout_failed=1");
		}
		
	}

/*
	public function checklogin(){
		
		if($this->core->getget("admin")=="1"){
			if($this->core->getpost('action')=="login"){
				$this->core->d_mess("PŘIHLAŠUJI - vkládám funkci na kontrolu z DB a vložení session");
				$this->login();
				header("location: /admin/");
			}
			elseif($this->core->Getget('action')=="logout"){
				$this->core->d_mess("ODHLAŠUJI - mažu session");
			 	$this->logout();
				header("location: /admin/");
			}
		}
		
		$user = htmlspecialchars($this->core->getsession('admin_user'));
		$pass = $this->core->getsession('admin_password');

		if($user AND $pass){
			$user_check = dibi::query('SELECT * FROM users_admin WHERE admin_public=1 AND %and', array(
				array('admin_name		= %s', $user),
				array('admin_password	= %s', $pass),
			),' LIMIT 1');
			$check = $user_check->fetchPairs('admin_name', 'admin_password');

			if($check){
				return true;
			}
			else
				return false;
		}
		else
			return false;
		
	}

	public function login(){
		$user = htmlspecialchars($this->core->GetPOST('username'));
		$pass = $this->core->GetPOST('password');
		$pass =  sha1($pass . $this->config['db_pswsalt']);

		if($user AND $pass){
			$user_check = dibi::query('SELECT * FROM users_admin WHERE %and', array(
				array('admin_name		= %s', $user),
				array('admin_password	= %s', $pass),
			),' LIMIT 1');
			$check = $user_check->fetchPairs('admin_name', 'admin_password');
			if($check){
				foreach($user_check as $user){
					$_SESSION['adminID']		= $user["adminID"];
					$_SESSION['admin_user']		= $user["admin_name"];
					$_SESSION['admin_password'] = $user["admin_password"];
					$_SESSION['admin_real_name']= $user["admin_real_name"];
					$_SESSION['admin_avatar']	= $user["admin_avatar"];
					return true;
				}
			}
			else
				return false;
		}
		else
			return false;
	}

	public function logout(){
		$_SESSION['admin_user']		= null;
		$_SESSION['admin_password'] = null;
		$_SESSION['admin_real_name']= null;
		session_destroy();
	}
*/
/*
	public function router(){
 		switch($this->core->Getget('action')){
 			case "login":
 				return $this->login();
 			break;
 			case "logout":
 				return $this->logout($_SESSION);
 			break;
 			default:
 				return $this->checklogin();
 		}
	}*/
}

?>