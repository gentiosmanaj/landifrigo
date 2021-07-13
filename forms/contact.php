<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'gentiosmanaj@outlook.com.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  
  // $contact->smtp = array(
  //   'host' => 'github.com',
  //   'username' => '',
  //   'password' => '',
  //   'port' => ''
  // );

  $config['protocol'] = 'smtp';
				$config['smtp_host'] = 'ssl://smtp.googlemail.com';
				$config['smtp_port']    = '465';
				$config['smtp_timeout'] = '60';
				$config['smtp_user']    = 'genti.osmanaj3@gmail.com';
				$config['smtp_pass']    = 'yllka28112017';
				$config['charset']    = 'utf-8';
				$config['newline']    = "\r\n";
				$config['mailtype'] = 'text'; // or html
				$config['validation'] = false; // bool whether to validate email or not      

				$this->email->initialize($config);

		    	$name=$_POST('name');
		    	$from=$_POST('email');
		    	$subject=$_POST('subject');
		    	$message=$_POST('message');
		    	$this->email->to('genti.osmanaj3@gmail.com');
				$this->email->from($from,'LandiFrigo');
				$this->email->subject($subject);
				$this->email->message($message.'from '.$name);

				if($this->email->send()){
					$this->session->set_flashdata('email_send','Your email was sent successfully');
		    		redirect('');
				}else{
				   $this->session->set_flashdata('email_dontsend','Your email hasent been sent');
		    		redirect('');
				}

				$this->session->set_flashdata('email_send','Your email was sent successfully');
		    	redirect('');
		    }
	}
}
  
  

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>
