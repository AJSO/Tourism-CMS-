<?php

class Sendmail extends CI_Model{

	public function active_member_template()
	{
		return file_get_contents('assets/email/active-member-template.html');
	}

	public function action_template()
	{
		return file_get_contents('assets/email/action-template.html');
	}
	
	public function alert_template(){
		return file_get_contents('assets/email/alert-template.html');
	
	}
	
	public function send($to, $from, $subject, $message)
	{
	
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";	
		$headers .= 'From: '.$from."\r\n";
		$headers .= 'To: '.$to."\r\n";
		
		$email_message = $this->action_template();
		$email_message = str_replace(':base_url:', base_url(), $email_message);
		$email_message = str_replace(':subject:', $subject, $email_message);
		$email_message = str_replace(':message:', $message, $email_message);
				
		@mail('', $subject, $email_message, $headers);
	
	}
	
	function password($to, $from, $subject, $message)
	{
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";	
		$headers .= 'From: '.$from."\r\n";
		$headers .= 'To: '.$to."\r\n";
		
		$email_message = $this->alert_template();
		$email_message = str_replace(':base_url:', base_url(), $email_message);
		$email_message = str_replace(':subject:', $subject, $email_message);
		$email_message = str_replace(':message:', $message, $email_message);
				
		@mail('', $subject, $email_message, $headers);
	}
	
	
	function activate_member($property, $member)
	{
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";	
		$headers .= 'From: no-replay@easybranches.com'."\r\n";
		$headers .= 'To: '.$member[0]->email."\r\n";
		
		$email_message = $this->active_member_template();
		$email_message = str_replace(':base_url:', base_url(), $email_message);
		$email_message = str_replace(':firstname:', $member[0]->firstname, $email_message);
		$email_message = str_replace(':lastname:', $member[0]->lastname, $email_message);
		$email_message = str_replace(':code:', md5($member[0]->email), $email_message);
		$email_message = str_replace(':id:', md5($member[0]->member_id), $email_message);

		$subject = $member[0]->firstname.' Please verify your email';
		mail('', $subject, $email_message, $headers);
	
	}
	
}