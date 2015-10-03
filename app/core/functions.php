<?php

class core {

	public function __construct($config){
		$this->config = $config;
	}

	public static function debug($message){
		if(CORE_DEBUG)
			echo '<div class="sys_message" style="font-size:11px;background:#f2f2f2;padding:3px 5px;border:1px solid #f2f2f2;color:black;border-radius:2px;margin:2px;font-family:arial;">'.$message.'</div>';
	}

	/*public function destroy_session(){
		$_SESSION = 0;
		if (ini_get("session.use_cookies")) {
		    $params = session_get_cookie_params();
		    setcookie(session_name(), '', time() - 42000,
		        $params["path"], $params["domain"],
		        $params["secure"], $params["httponly"]
		    );
		}
		session_destroy();
	}*/

	public static function get($i){
		if(isset($_GET[$i])){
			return htmlspecialchars($_GET[$i]);
		}
		else
			return false;
	}

	public static function session($i){
		// TODO ARRAYS
		if(isset($_SESSION[$i])){
			return htmlspecialchars($_SESSION[$i]);
		}
		else
			return false;
	}

	public static function post($i){
		// TODO ARRAYS
		if(isset($_POST[$i])){
			return htmlspecialchars($_POST[$i]);
		}
		else
			return false;
	}
/*

	REWRITE IT A BIT?

	public function generate_pagebar($count,$perpage){
		$pages = $count / $perpage;

		if($pages){
			if($pages==floor($pages)){
				$pagebar['pages_count'] = $pages;
			}
			else {
				$pagebar['pages_count'] = floor($pages+1);
			}

			if($this->getget("page")>$pagebar['pages_count']){
				header("HTTP/1.0 404 Not Found");
				die;
			}


			if($this->getget("page")>20){
				$pagebar_start = $this->getget("page") - 10;
				$pagebar['pages']['1']['number'] = 1;
			}
			else {
				$pagebar_start = 1;
			}

			$pagebar_end = $pagebar_start + 20;

			for ($i = $pagebar_start; $i <= $pagebar_end; $i++) {
				if($i<=$pagebar['pages_count']){
				    $pagebar['pages'][$i]['number']=$i;
				    
				    if($i==$this->getget("page") OR ($i=="1" AND !$this->getget("page"))) // CHECK FOR ACTIVE, IF FOR CLASS="ACTIVE" IN TPL
				    	$pagebar['pages'][$i]['active']=true;
		    	}
			}

			if($this->getget("page")!=$pagebar['pages_count'])
				$pagebar['pages'][$pagebar['pages_count']]['number'] = $pagebar['pages_count'];
			$last_page = end($pagebar['pages']);

			
			if($this->getget("page") AND $this->getget("page")!=="1") // CHECK IF CAN USE PREV PAGE
				$pagebar['prev'] = $this->getget("page")-1; // Return number of previous page for link
	
			if(!$this->getget("page"))
				$page=1;// FIX FOR EMPTY PAGE = 0. page 0-empty is SAME as page 1
			else
				$page=$this->getget("page");
			
			if($page!=$pagebar['pages_count']) // CHECK IF CAN USE NEXT PAGE
				if(!$this->getget("page"))
					$pagebar['next'] = 2;
				else
					$pagebar['next'] = $this->getget("page")+1; // Return number of next page for link
			return $pagebar; // return COMPLETED PAGEBAR IN ARRAY
		}
		else
			return false;
	}
*/

	public static function ram_usage($i){
		$ram = memory_get_usage();
		if($i==1){
			if ($ram < 1024) 
	            return $ram." B"; 
	        elseif ($ram < 1048576) 
	            return round($ram/1024,2)." KB"; 
	        else 
	            return round($ram/1048576,2)." MB";
         }
         else 
         	return $ram;
	}
	
	
	public static function get_browser() { 
		$u_agent = $_SERVER['HTTP_USER_AGENT']; 
		$bname = 'Unknown';
		$platform = 'Unknown';
		$version= "";
		
		//First get the platform?
		if (preg_match('/linux/i', $u_agent)) {
			$platform = 'linux';
		}
		elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
			$platform = 'mac';
		}
		elseif (preg_match('/windows|win32/i', $u_agent)) {
			$platform = 'windows';
		}
		
		// Next get the name of the useragent yes seperately and for good reason
		if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
		{ 
			$bname = 'Internet Explorer'; 
			$ub = "MSIE"; 
		} 
		elseif(preg_match('/Firefox/i',$u_agent)) 
		{ 
			$bname = 'Mozilla Firefox'; 
			$ub = "Firefox"; 
		} 
		elseif(preg_match('/Chrome/i',$u_agent)) 
		{ 
			$bname = 'Google Chrome'; 
			$ub = "Chrome"; 
		} 
		elseif(preg_match('/Safari/i',$u_agent)) 
		{ 
			$bname = 'Apple Safari'; 
			$ub = "Safari"; 
		} 
		elseif(preg_match('/Opera/i',$u_agent)) 
		{ 
			$bname = 'Opera'; 
			$ub = "Opera"; 
		} 
		elseif(preg_match('/Netscape/i',$u_agent)) 
		{ 
			$bname = 'Netscape'; 
			$ub = "Netscape"; 
		} 
		
		// finally get the correct version number
		$known = array('Version', $ub, 'other');
		$pattern = '#(?<browser>' . join('|', $known) .
		')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
		if (!preg_match_all($pattern, $u_agent, $matches)) {
			// we have no matching number just continue
		}
		
		// see how many we have
		$i = count($matches['browser']);
		if ($i != 1) {
			//we will have two since we are not using 'other' argument yet
			//see if version is before or after the name
			if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
				$version= $matches['version'][0];
			}
			else {
				$version= $matches['version'][1];
			}
		}
		else {
			$version= $matches['version'][0];
		}
		
		// check if we have a number
		if ($version==null || $version=="") {$version="?";}
		
		return array(
			'userAgent' => $u_agent,
			'name'      => $bname,
			'version'   => $version,
			'platform'  => $platform,
			'pattern'    => $pattern
		);
	} 

/*

	PROBABLY OBSOLETE

	public function count_files($path) {
	    $size = 0;
	    $ignore = array('.','..','cgi-bin','.DS_Store');
	    $files = scandir($path);
	    foreach($files as $t) {
	        if(in_array($t, $ignore)) continue;
	        if (is_dir(rtrim($path, '/') . '/' . $t)) {
	            $size += self::count_files(rtrim($path, '/') . '/' . $t);
	        } else {
	            $size++;
	        }   
	    }
	    return $size;
	}

*/

}

?>