<?php 

if(file_exists('../../../../wp-load.php')) {
	include '../../../../wp-load.php'; 
} else {
	include '../../../../../wp-load.php'; 
}

// get the email from field
$email = strtolower($_POST['email']);
$checking = trim($_POST['checking']) === '';
if($checking){

	//if the email is valid
	if (eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($email))) 
	{
		//get all the current emails
		$list = get_option('md_subscribed_emails');
		
		//if there are no emails in the database
		if(!$list)
		{
			//update the option with the first email as an array
			update_option('md_subscribed_emails', array($email));	
		}
		else
		{
			//if the email already exists
			if(in_array($email, $list))
			{
				_e("<span class='error'>Email address is already subscribed !</span>", "framework");
			}
			else
			{
				// If there is more than one email, add the new email to the array
				array_push($list, $email);
				
				//update new emails
				update_option('md_subscribed_emails', $list);
				
				//Open csv file
				$fp = fopen('subscribers-list.csv', 'w');
				
				//write in a format that CSV intepreters can understand
				foreach($list as $line)
				{
					$val = explode(",",$line);
					fputcsv($fp, $val);
				}
				fclose($fp);
							
				_e("<span>Thank you for Subscribing !</span>", "framework");
			}
		}
	}
	else
	{
		_e("<span class='error'>Please enter a valid email address</span>", "framework");
	}
}
else
{
	_e("<span class='error'>There was an error submitting the form. Refresh and try again.</span> ", "framework");
}
?>