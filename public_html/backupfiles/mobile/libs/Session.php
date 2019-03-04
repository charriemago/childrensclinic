<?php
class Session{
	static function init(){
		// session_save_path('session');
		// ini_set('session.gc_maxlifetime', 60); // 3 hours
		// ini_set('session.gc_probability', 1);
		// ini_set('session.gc_divisor', 100);
		// ini_set('session.cookie_secure', FALSE);
		// ini_set('session.use_only_cookies', TRUE);
		// session_start();
		// session_set_cookie_params(1);
		
		 
		@session_start();
		
		// $sessionTime = 60 * 60 * 12 * 100;
		$sessionTime = 60 * 60 * 12 * 100;
		
		if (isset($_SESSION["time"])) {
			// calculate the session's "time to live"
			$sessionTTL = time() - $_SESSION["time"];
			if ($sessionTTL > $sessionTime) {
				self::destroy();
				// Configure::write('Session.timeout', $sessionTime);
			}
		}
		 // CakeSession::$requestCountdown = 25;
		$_SESSION["time"] = time();
	}
	
	static function getSession($key){
		$key = $key;//.'_current';
		if(isset($_SESSION[$key])){
			return ($_SESSION[$key]);
		} else {
			return false;
		}
	}
	
	static function setSession($key, $value){
		self::init();
		$time = time();
		$key = $key;//.'_current';
		$_SESSION['time'] = $time;
		unset($_SESSION[$key]);
		$_SESSION[$key] = $value;
		ini_set('session.gc_maxlifetime',1);
	}
	
	static function destroy(){
		
		//unset($_SESSION);
		session_destroy();
		
	}
}