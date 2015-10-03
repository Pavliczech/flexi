<?php

class core {

	public function __construct($config){
		$this->config = $config;
	}

	public static function debug($message){
		if(CORE_DEBUG)
			echo '<div class="sys_message" style="font-size:11px;background:#f2f2f2;padding:3px 5px;border:1px solid #f2f2f2;color:black;border-radius:2px;margin:2px;font-family:arial;">'.$message.'</div>';
	}

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
	

}

?>