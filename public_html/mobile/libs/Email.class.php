<?php

class Email{
	static function getEmailCss(){
		$css = "
			<style>
				
			<style>
		";
	}
	
	static function getWelcomeEmail($user){
		// $myURL = 'http://corporate.taxpirin.com'.URL;
		$myURL = mainURL;
		$txt = '
			<style type="text/css">
	.emailHolder{
		margin: 0 auto;
		font-family: Arial;
		width: 650px;
	}
	.blueBackground{
		background-color: #548dd4;
	}
	.headerHolder{
		height: 70px;
	}
	.headerHolder img{
		height: 60px;
		margin-top: 15px;
	}
	.footerHolder{
		padding: 5px 0px 20px 0px;
		text-align: center;
	}
	.footerHolder nav a {
		color: #FFF;
		text-decoration: none;
		margin-left: 10px;
		margin-right: 10px;
		font-family: Arial;
		font-size: 13px;
		font-weight: bold;
	}
	.emailContentHolder{
		padding-top: 30px;
		padding-bottom: 100px;
	}
</style>
	<div class="emailHolder">
		<div class="blueBackground headerHolder">
			<a href="'.$myURL.'"><img alt="" src="'.$myURL.'public/images/icons/taxpirin_logo.png"></a>
		</div>
		<div class="emailContentHolder">
		
			Dear '.$user.', <br/>
		 	<br/>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Welcome to Taxpirin. You will now experience the benefits of using this headache-free tax solution. <br/><br/>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your account has been activated. Your login details was to sent to your email. Please keep your username and password secured at all times.  <br/>
			<br/>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;We highlight and emphasize that Taxpirin is easy. Just simply follow the 2-step process: Setup and Generate. If you want to avoid the differences, UPGRADE TO RECONCILE.
			Please use this 
			<a href="'.$myURL.'help">HELP link</a> for you to start and use this system. <br/>
			Thank you very much.  <br/>
			<br/>
			Very truly yours,<br/>
			Taxpirin Team
			
		</div>
		<div class="blueBackground footerHolder">
			<nav>
				<a href="#">About Us</a>
				<a href="#">FAQ</a>
				<a href="#">Contact Us</a>
			</nav>
		</div>
	</div>
		';
		$subject = 'Welcome to Taxpirin';
		$user = Session::getSession('taxUser');
		$email = $user['email'];
		$to = $user['fname'].'<'.$email.'>';
		$from = 'TAXPIRIN.COM<sales@taxpirin.com>';
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: '.$from."\r\n";
		$headers .= 'Bcc: '.$from."\r\n";
		//*
		if( mail($to,$subject,$txt,$headers) ){
			return true;
		} else {
			return false;
		}//*/
	}
	
	static function referAFriend($to,$name,$message){
		// $myURL = 'http://corporate.taxpirin.com'.URL;
		$myURL = mainURL;
		$user = Session::getSession('taxUser');
		// echo '<pre>'.$message.'</pre>';
		$txt = '
			<style type="text/css">
	.emailHolder{
		margin: 0 auto;
		font-family: Arial;
		width: 650px;
	}
 	.blueBackground{
		background-color: #548dd4;
	}
	.headerHolder{
		height: 70px;
	}
	.headerHolder img{
		height: 60px;
		margin-top: 15px;
	}
	.footerHolder{
		padding: 5px 0px 20px 0px;
		text-align: center;
	}
	.footerHolder nav a {
		color: #FFF;
		text-decoration: none;
		margin-left: 10px;
		margin-right: 10px;
		font-family: Arial;
		font-size: 13px;
		font-weight: bold;
	}
	.emailContentHolder{
		padding-top: 30px;
		padding-bottom: 100px;
	}
</style>
	<div class="emailHolder">
		<div class="blueBackground headerHolder">
			<a href="'.$myURL.'"><img alt="" src="'.$myURL.'public/images/icons/taxpirin_logo.png"></a>
		</div>
		<div class="emailContentHolder">
		
			Dear '.$name.', <br/>
		 	<br/>
			You have been referred by '.$user['fname'].' '.$user['lname'].'.  
			Their Company is using Taxpirin, a Headache-Free Tax Solution.  
			They believe that your company also needs this Tax Solution.  
			Please click here or visit www.taxpirin.com
			<br/>
			Thank you very much.  <br/>
			<br/>
			Very truly yours,<br/>
			Taxpirin Team
			
		</div>
		<div class="blueBackground footerHolder">
			
		</div>
	</div>
		';
		$subject = 'Taxpirin.com';
		$to = $name.'<'.$to.'>';
		$from = 'TAXPIRIN.COM<sales@taxpirin.com>';
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: '.$from."\r\n";
		$headers .= 'Cc:: marketing@taxpirin.com'."\r\n";
		//*
		if( mail($to,$subject,$txt,$headers) ){
			return true;
		} else {
			return false;
		}//*/
	}
	
	static function referConsultant($to,$name,$message){
		// $myURL = 'http://corporate.taxpirin.com'.URL;
		$myURL = mainURL;
		$user = Session::getSession('taxUser');
		// echo '<pre>'.$message.'</pre>';
		$txt = '
			<style type="text/css">
	.emailHolder{
		margin: 0 auto;
		font-family: Arial;
		width: 650px;
	}
	.blueBackground{
		background-color: #548dd4;
	}
	.headerHolder{
		height: 70px;
	}
	.headerHolder img{
		height: 60px;
		margin-top: 15px;
	}
	.footerHolder{
		padding: 5px 0px 20px 0px;
		text-align: center;
	}
	.footerHolder nav a {
		color: #FFF;
		text-decoration: none;
		margin-left: 10px;
		margin-right: 10px;
		font-family: Arial;
		font-size: 13px;
		font-weight: bold;
	}
	.emailContentHolder{
		padding-top: 30px;
		padding-bottom: 100px;
	}
</style>
	<div class="emailHolder">
		<div class="blueBackground headerHolder">
			<a href="'.$myURL.'"><img alt="" src="'.$myURL.'public/images/icons/taxpirin_logo.png"></a>
		</div>
		<div class="emailContentHolder">
		
			Dear Admin, <br/>
		 	<br/>
			<pre>'.$message.'</pre> <br/><br/>
			Thank you very much.  <br/>
			<br/>
			From, <br/>
			'.$name.'
			
		</div>
		<div class="blueBackground footerHolder">
			
		</div>
	</div>
		';
		$subject = 'User Tax Consult';
		$from = $name.'<'.$to.'>';
		$to = 'TAXPIRIN.COM<consultant@taxpirin.com>';
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: '.$from."\r\n";
		$headers .= 'Bcc: marketing@taxpirin.com'."\r\n";
		//*
		if( mail($to,$subject,$txt,$headers) ){
			return true;
		} else {
			return false;
		}//*/
	}
	
	static function referSupport($to,$name,$message){
		// $myURL = 'http://corporate.taxpirin.com'.URL;
		$myURL = mainURL;
		$user = Session::getSession('taxUser');
		// echo '<pre>'.$message.'</pre>';
		$txt = '
			<style type="text/css">
	.emailHolder{
		margin: 0 auto;
		font-family: Arial;
		width: 650px;
	}
	.blueBackground{
		background-color: #548dd4;
	}
	.headerHolder{
		height: 70px;
	}
	.headerHolder img{
		height: 60px;
		margin-top: 15px;
	}
	.footerHolder{
		padding: 5px 0px 20px 0px;
		text-align: center;
	}
	.footerHolder nav a {
		color: #FFF;
		text-decoration: none;
		margin-left: 10px;
		margin-right: 10px;
		font-family: Arial;
		font-size: 13px;
		font-weight: bold;
	}
	.emailContentHolder{
		padding-top: 30px;
		padding-bottom: 100px;
	}
</style>
	<div class="emailHolder">
		<div class="blueBackground headerHolder">
			<a href="'.$myURL.'"><img alt="" src="'.$myURL.'public/images/icons/taxpirin_logo.png"></a>
		</div>
		<div class="emailContentHolder">
		
			Dear Admin, <br/>
		 	<br/>
			<pre>'.$message.'</pre> <br/><br/>
			Thank you very much.  <br/>
			<br/>
			From, <br/>
			'.$name.'
			
		</div>
		<div class="blueBackground footerHolder">
			
		</div>
	</div>
		';
		$subject = 'User Tax Consult';
		$from = $name.'<'.$to.'>';
		$to = 'TAXPIRIN.COM<support@taxpirin.com>';
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: '.$from."\r\n";
		$headers .= 'Bcc: marketing@taxpirin.com'."\r\n";
		//*
		if( mail($to,$subject,$txt,$headers) ){
			return true;
		} else {
			return false;
		}//*/
	}
	
	static function sendUserName($code = ''){
		//return true;  
		$myURL = mainURL;
		// $myURL = 'http://taxpirin.com'.URL;
		$user = Session::getSession('taxUser');
		$user['fname'] = ucwords(strtolower($user['fname']));
		$codes = $code == '' ? '' : '<br/><b>Free Subscription Code : '.$code.'</b><br/><br/>';
		$txt = '
		<style type="text/css">
	.emailHolder{
		margin: 0 auto;
		font-family: Arial;
		width: 650px;
	}
	.blueBackground{
		background-color: #548dd4;
		min-height: 20px;
		margin-top: 10px;
		color: #fff;
		text-indent: 10px;
	}
	.headerHolder{
		height: 70px;
	}
	
	.headerHolder img{
		height: 60px;
		margin-top: 15px;
	}
	
	.emailContentHolder{
		padding-top: 30px;
		padding-bottom: 100px;
		padding-left: 10px;
	}
	
	#top{
		font-size: 11px;
		min-height: 24px;
	}
	
	#top div{
		background-color: rgb(216,216,216);
		width: 350px;
		min-height: 20px;
		float: right;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
		padding-top: 5px;
	}
	.mainmenu{ 
	    background-color: rgb(84,141,212);
	    padding: 7px;
		-webkit-box-shadow: 3px 3px 10px 0px rgb(128,128,128);
		-moz-box-shadow: 3px 3px 10px 0px rgb(128,128,128);
		box-shadow: 3px 3px 10px 0px rgb(128,128,128); 
		-webkit-border-radius: 10px;
		-moz-border-radius: 10px;
		border-radius: 10px;
	}
	.headerTitleContainer{
		color: #fff;
	}
	
	#top img{
		margin: 0;
	}
	
	#top a{
		color: rgb(89,89,89);
		text-decoration: none;
		margin: 0 5px;	
		padding: 5px ;
	}
	
	#top a:HOVER{
		text-decoration: none;
		background-color: rgb(168,168,168);
	}
	
</style>
</style>
	<div class="emailHolder">
		<div class="blueBackground headerHolder">
			<a href="'.$myURL.'"><img alt="" src="'.$myURL.'public/images/icons/taxpirin_logo.png"></a>
		</div>
		<div class="emailContentHolder">
		
			Dear '.ucwords(strtolower($user['fname'])).', <br/>
		 	<br/>
			
			This confirm your subscription to taxpirin.<br/>
			Your free current year subscription code is : <u><b>'.$code.'</b></u>.<br/>
			You may start using your account by logging in to '.$myURL.' .
			
			<br/>
			<b>Username : <u><i>'.$user['username'].'</i></u></b><br/>
			<b>Password : <u><i>'.$user['password'].'</i></u></b><br/>
			
			<br/>
			Thank you very much.  <br/>
			<br/>
			Very truly yours,<br/>
			Taxpirin Team
			
		</div>
		<div class="blueBackground footerHolder">
			<nav>
				
			</nav>
		</div>
	</div>
		';
		$subject = 'Taxpirin Login Details';
		$user = Session::getSession('taxUser');
		$email = $user['email'];
		$to = $user['fname'].'<'.$email.'>';
		$from = 'TAXPIRIN.COM<sales@taxpirin.com>';
		$bcc = 'SALES<sales@taxpirin.com>';
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: '.$from."\r\n";
		$headers .= 'Bcc: '.$bcc."\r\n";
		//*
		if( mail($to,$subject,$txt,$headers) ){
			return true;
		} else {
			return false;
		}//*/
	}
	
	static function sendUserName1($user){
		//return true;  
		$myURL = mainURL;
		// $user = Session::getSession('taxUser');
		$user2 = array();
		foreach($user as $i=>$each){
			$user2[$i] = $each;
		}
		
		$user= $user2;
		$user['fname'] = ucwords(strtolower($user['fname']));
		$txt = '
			<style type="text/css">
	.emailHolder{
		margin: 0 auto;
		font-family: Arial;
		width: 650px;
	}
	.blueBackground{
		background-color: #548dd4;
		min-height: 20px;
		margin-top: 10px;
		color: #fff;
		text-indent: 10px;
	}
	.headerHolder{
		height: 70px;
	}
	.headerHolder img{
		height: 60px;
		margin-top: 15px;
	}
	.emailContentHolder{
		padding-top: 30px;
		padding-bottom: 100px;
		padding-left: 10px;
	}
	
	#top{
		font-size: 11px;
		min-height: 24px;
	}
	
	#top div{
		background-color: rgb(216,216,216);
		width: 350px;
		min-height: 20px;
		float: right;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
		padding-top: 5px;
	}
	.mainmenu{ 
	    background-color: rgb(84,141,212);
	    padding: 7px;
		-webkit-box-shadow: 3px 3px 10px 0px rgb(128,128,128);
		-moz-box-shadow: 3px 3px 10px 0px rgb(128,128,128);
		box-shadow: 3px 3px 10px 0px rgb(128,128,128); 
		-webkit-border-radius: 10px;
		-moz-border-radius: 10px;
		border-radius: 10px;
	}
	.headerTitleContainer{
		color: #fff;
	}
	
	#top img{
		margin: 0;
	}
	
	#top a{
		color: rgb(89,89,89);
		text-decoration: none;
		margin: 0 5px;	
		padding: 5px ;
	}
	
	#top a:HOVER{
		text-decoration: none;
		background-color: rgb(168,168,168);
	}
	
</style>
</style>
	<div class="emailHolder">
		<div class="blueBackground headerHolder">
			<a href="'.$myURL.'"><img alt="" src="'.$myURL.'public/images/icons/taxpirin_logo.png"></a>
		</div>
		<div class="emailContentHolder">
		
			Dear '.ucwords(strtolower($user['fname'])).', <br/>
		 	<br/>
			<br/>
			Below is your login details for coporate.taxpirin.com
			<br/>
			<b>Username : <i>'.$user['username'].'</i></b><br/>
			<b>Password : <i>'.$user['password'].'</i></b><br/><br/><br/>
			
			Thank you very much.  <br/>
			<br/>
			Very truly yours,<br/>
			Taxpirin Team
			
		</div>
		<div class="blueBackground footerHolder">
			<nav>
				
			</nav>
		</div>
	</div>
		';
		$subject = 'Taxpirin Login Details';
		// $user = Session::getSession('taxUser');
		$email = $user['email'];
		$to = $user['fname'].'<'.$email.'>';
		$from = 'TAXPIRIN.COM<sales@taxpirin.com>';
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: '.$from."\r\n";
		// $headers .= 'Bcc: '.$from."\r\n";
		//*
		if( mail($to,$subject,$txt,$headers) ){
			return true;
		} else {
			return false;
		}//*/
	}
	
	static function sendUserName3($user){
		//return true;  
		$myURL = mainURL;
		// $user = Session::getSession('taxUser');
		$user2 = array();
		foreach($user as $i=>$each){
			$user2[$i] = $each;
		}
		
		$user= $user2;
		$user['fname'] = ucwords(strtolower($user['fname']));
		$txt = '
			<style type="text/css">
	.emailHolder{
		margin: 0 auto;
		font-family: Arial;
		width: 650px;
	}
	.blueBackground{
		background-color: #548dd4;
		min-height: 20px;
		margin-top: 10px;
		color: #fff;
		text-indent: 10px;
	}
	.headerHolder{
		height: 70px;
	}
	.headerHolder img{
		height: 60px;
		margin-top: 15px;
	}
	.emailContentHolder{
		padding-top: 30px;
		padding-bottom: 100px;
		padding-left: 10px;
	}
	
	#top{
		font-size: 11px;
		min-height: 24px;
	}
	
	#top div{
		background-color: rgb(216,216,216);
		width: 350px;
		min-height: 20px;
		float: right;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
		padding-top: 5px;
	}
	.mainmenu{ 
	    background-color: rgb(84,141,212);
	    padding: 7px;
		-webkit-box-shadow: 3px 3px 10px 0px rgb(128,128,128);
		-moz-box-shadow: 3px 3px 10px 0px rgb(128,128,128);
		box-shadow: 3px 3px 10px 0px rgb(128,128,128); 
		-webkit-border-radius: 10px;
		-moz-border-radius: 10px;
		border-radius: 10px;
	}
	.headerTitleContainer{
		color: #fff;
	}
	
	#top img{
		margin: 0;
	}
	
	#top a{
		color: rgb(89,89,89);
		text-decoration: none;
		margin: 0 5px;	
		padding: 5px ;
	}
	
	#top a:HOVER{
		text-decoration: none;
		background-color: rgb(168,168,168);
	}
	
</style>
</style>
	<div class="emailHolder">
		<div class="blueBackground headerHolder">
			<a href="'.$myURL.'"><img alt="" src="'.$myURL.'public/images/icons/taxpirin_logo.png"></a>
		</div>
		<div class="emailContentHolder">
		
			Dear '.$user['fname'].', <br/>
		 	<br/>
			<br/>
			Below is your login details for coporate.taxpirin.com
			<br/>
			<b>Username : <i>'.$user['username'].'</i></b><br/>
			<b>Password : <i>'.$user['password'].'</i></b><br/><br/><br/>
			
			Thank you very much.  <br/>
			<br/>
			Very truly yours,<br/>
			Taxpirin Team
			
		</div>
		<div class="blueBackground footerHolder">
			<nav>
				
			</nav>
		</div>
	</div>
		';
		$subject = 'Taxpirin Login Details';
		// $user = Session::getSession('taxUser');
		$email = $user['email'];
		$to = $user['fname'].'<'.$email.'>';
		$from = 'TAXPIRIN.COM<sales@taxpirin.com>';
		$bcc = 'SALES<sales@taxpirin.com>';
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: '.$from."\r\n";
		// $headers .= 'Bcc: '.$bcc."\r\n";
		//*
		if( mail($to,$subject,$txt,$headers) ){
			return true;
		} else {
			return false;
		}//*/
	}
	
	static function sendVerificationLink($user){
		//return true;  
		// $myURL = 'http://taxpirin.com'.URL;
		$myURL = mainURL;
		// $user = Session::getSession('taxUser');
		$user2 = array();
		foreach($user as $i=>$each){
			$user2[$i] = $each;
		}
		$user= $user2;
		$user['fname'] = ucwords(strtolower($user['fname']));
		$user['password'] = md5(md5($user['password']));
		$txt = '
			<style type="text/css">
	.emailHolder{
		margin: 0 auto;
		font-family: Arial;
		width: 650px;
	}
	.blueBackground{
		background-color: #548dd4;
		min-height: 20px;
		margin-top: 10px;
		color: #fff;
		text-indent: 10px;
	}
	.headerHolder{
		height: 70px;
	}
	.headerHolder img{
		height: 60px;
		margin-top: 15px;
	}
	.emailContentHolder{
		padding-top: 30px;
		padding-bottom: 100px;
		padding-left: 10px;
	}
	
	#top{
		font-size: 11px;
		min-height: 24px;
	}
	
	#top div{
		background-color: rgb(216,216,216);
		width: 350px;
		min-height: 20px;
		float: right;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		border-radius: 5px;
		padding-top: 5px;
	}
	.mainmenu{ 
	    background-color: rgb(84,141,212);
	    padding: 7px;
		-webkit-box-shadow: 3px 3px 10px 0px rgb(128,128,128);
		-moz-box-shadow: 3px 3px 10px 0px rgb(128,128,128);
		box-shadow: 3px 3px 10px 0px rgb(128,128,128); 
		-webkit-border-radius: 10px;
		-moz-border-radius: 10px;
		border-radius: 10px;
	}
	.headerTitleContainer{
		color: #fff;
	}
	
	#top img{
		margin: 0;
	}
	
	#top a{
		color: rgb(89,89,89);
		text-decoration: none;
		margin: 0 5px;	
		padding: 5px ;
	}
	
	#top a:HOVER{
		text-decoration: none;
		background-color: rgb(168,168,168);
	}
	
</style>
</style>
	<div class="emailHolder">
		<div class="blueBackground headerHolder">
			<a href="'.$myURL.'"><img alt="" src="'.$myURL.'public/images/icons/taxpirin_logo.png"></a>
		</div>
		<div class="emailContentHolder">
		
			Dear '.$user['fname'].', <br/>
		 	<br/>
			<br/>
			
			Thank you for signing up to <href="http://taxpirin.com">Taxpirin.com</a>.<br/><br/>
			
			Please confirm your account by <a href="'.$myURL.'user/verify?act='.$user['password'].'&user='.md5(md5($user['username'])).'">clicking here</a>.
			<br/>
			You will receive a welcome email together with your free subscription code to start using taxpirin.
			<br/>
			<br/>
			
			Best Regards,  <br/>
			<br/>
			Taxpirin Team
			
		</div>
		<div class="blueBackground footerHolder">
			<nav>
				
			</nav>
		</div>
	</div>
		';
		$subject = 'Taxpirin Login Details';
		// $user = Session::getSession('taxUser');
		$email = $user['email'];
		$to = $user['fname'].'<'.$email.'>';
		$from = 'NO REPLY<no-reply@taxpirin.com>';
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: '.$from."\r\n";
		//*
//		return true;
		if( mail($to,$subject,$txt,$headers) ){
			return true;
		} else {
			return false;
		}//*/
	}
	
	static function getSender(){
		return 'sales@taxpirin.com';
	}
	
}