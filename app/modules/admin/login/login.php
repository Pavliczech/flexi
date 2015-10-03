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

		// CHECK IF USER EXISTS - RETURNS TIMESTAMP TO HASH PASSWORD FOR COMPLETE USER CHECK
		$check_user = dibi::query('SELECT * FROM admins WHERE admin_email=%s',$admin_email,' LIMIT 1');
		$user = $check_user->fetch("admin_created");
		$admin_password = $this->createhash($admin_password,$user["admin_created"]);

		// USER EXISTS - LETS CHECK PASSWORD
		if($user){
			$check_pass = dibi::query('SELECT * FROM admins WHERE admin_email=%s',$admin_email,' AND admin_password=%s',$admin_password,'');
			$admin = $check_pass->fetch("adminID");
			if($admin){
				$browser = get_browser(null, true);
				$browser = $browser["parent"];
				$data = array(
					"logged_sessionid" => $session,
					"logged_ip" => $_SERVER["REMOTE_ADDR"], // DEV ONLY
					"logged_adminID" =>	$admin["adminID"],
					"logged_info" => "ololololo!!",
					"logged_browser" => $browser, // NEED BETTER SCRIPT
					"logged_location" => "TODO"
				);
				
				$create = dibi::query("INSERT INTO admins_logged",$data);
				if($create)
					header("location: /admin/login_complete=1");
				else 
					header("location: /admin/login_failed=1");
			}
			else 
				header("location: /admin/login_failed=1");
		}
		else 
			header("location: /admin/login_failed=1");
	}

	public function admin_logout(){
		$session = session_id();
		$logout = dibi::query('DELETE FROM admins_logged WHERE logged_sessionid=%s',$session,'');
		if($logout)
			header("location: /admin/logout_complete=1");
		else 
			header("location: /admin/logout_failed=1");
	}
}

?>