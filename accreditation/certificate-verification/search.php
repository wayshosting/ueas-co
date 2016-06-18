<?php
/************************************************
	The Search PHP File
************************************************/


/************************************************
	MySQL Connect
************************************************/

// Credentials
$dbhost = "localhost";
$dbname = "ftpuea_ueas";
$dbuser = "ftpuea_wordpress";
$dbpass = "i.MyStoneEye3742A";

//	Connection
global $tutorial_db;

$tutorial_db = new mysqli();
$tutorial_db->connect($dbhost, $dbuser, $dbpass, $dbname);
$tutorial_db->set_charset("utf8");

//	Check Connection
if ($tutorial_db->connect_errno) {
    printf("Connect failed: %s\n", $tutorial_db->connect_error);
    exit();
}

/************************************************
	Search Functionality
************************************************/

// Define Output HTML Formating
$html = '';
$html .= '<li class="result">';
$html .= '<a>';
$html .= '<h1>nameString</h1>';
$html .= '<h3>numberString</h3>';
$html .= '<h4>certificateScope</h4>';
$html .= '<h2>isoStandard</h2>';
$html .= '<h3>cCountry</h3>';
$html .= '<h2 style="color:green;">certificateStatus</h2>';
$html .= '</a>';
$html .= '</li>';

// Define Output HTML Formating
/* $modal = '';
$modal .= '<div class="remodal" data-remodal-id="modal" style="display:none;">';
$modal .= '';
$modal .= '<h2>Certificate of Accreditation</h2>';
$modal .= '<h3>United Europe Accreditia Services Ltd</h3>';
$modal .= '<p>hereby confirms that</p>';
$modal .= '<h1>companyName</h1>';
$modal .= '<p>having been found to comply with the accreditation criteria of laboratories as declared in <b>isoStandard</b>, has been accredited.</p>';
$modal .= '<p>The accreditation status is <b>certificateStatus</b></p>';
$modal .= '<br><a class="remodal-confirm" href="#">OK</a>';
$modal .= '</div>'; */

// Get Search
//$search_string = preg_replace("/[^-A-Za-z0-9]/", " ", $_POST['query']);
$search_string = $_POST['query'];
$search_string = $tutorial_db->real_escape_string($search_string);

// Set minimum length check
if (strlen($search_string) >= 7 && $search_string !== ' ') {
	// Build Query
	$query = 'SELECT * FROM dbt_certificate_manager WHERE certificate_number LIKE "'.$search_string.'%"';

	// Do Search
	$result = $tutorial_db->query($query); 
	while($results = $result->fetch_array()) {
		$result_array[] = $results;
	}
	
	// Check If We Have Results
	if (isset($result_array)) {
		foreach ($result_array as $result) {
			
			$cNumber = $result['certificate_number'];
			$cName = $result['company_name'];
			$cStatus = trim($result['certificate_status']);
			$cScope = $result['scope'];
			$cStandard = $result['cert_standard'];
			$cIssueDate = $result['issue_date'];
			$cExpiryDate = $result['expiry_date'];
			$cAddress = $result['address'];
			$cCity = $result['city'];
			$cCountry = $result['country'];
			$cOtherLocation = $result['secondary_location'];			
			$cNotes = $result['notes'];
			
			// Format Output Strings And Hightlight Matches
			//$display_number = preg_replace("/".$search_string."/i", "<b class='highlight'>".$search_string."</b>", $cNumber);
			//$display_name = preg_replace("/".$search_string."/i", "<b class='highlight'>".$search_string."</b>", $cName);
			$display_number = "<b class='highlight'>".$cNumber."</b>";
			$display_name = "<b class='highlight'>".$cName."</b>";
			
			
			// Insert Name
			$output = str_replace('nameString', $display_name, $html);

			// Insert Function
			$output = str_replace('numberString', $display_number, $output);

			// Insert URL
			//$output = str_replace('urlString', $display_url, $output);
			
			// Update Modal Certificate View
			$output .= str_replace('companyName', $cName, $modal);
			$output = str_replace('isoStandard', $cStandard, $output);
			$output = str_replace('certificateScope', $cScope, $output);
			$output = str_replace('cCountry', $cCountry, $output);
			
			if ($cStatus == 'active' OR $cStatus == 'Active') {
				$output = str_replace('certificateStatus', $cStatus, $output);
			} else {
				$output = str_replace('certificateStatus', $cStatus, $output);
				$output = str_replace('color:green', 'color:red', $output);
			}
			
			// Output
			echo($output);
		}
	}else{

		// Format No Results Output
		$output = str_replace('urlString', 'javascript:void(0);', $html);
		$output = str_replace('nameString', '<b>No Result Found.</b>', $output);
		$output = str_replace('numberString', 'Please check the search format e.g. A1-1001', $output);
		$output = str_replace('certificateStatus', '', $output);
		$output = str_replace('isoStandard', '', $output);
		$output = str_replace('certificateScope', '', $output);
		$output = str_replace('cCountry', '', $output);

		// Output
		echo($output);
	}
} else {
	// Format No Results Output
		$output = str_replace('urlString', 'javascript:void(0);', $html);
		$output = str_replace('nameString', '<b>No Result Found.</b>', $output);
		$output = str_replace('numberString', 'Please check the search format e.g. A1-1001', $output);
		$output = str_replace('certificateStatus', '', $output);
		$output = str_replace('isoStandard', '', $output);
		$output = str_replace('certificateScope', '', $output);
		$output = str_replace('cCountry', '', $output);

		// Output
		echo($output);
}


/*
// Build Function List (Insert All Functions Into DB - From PHP)

// Compile Functions Array
$functions = get_defined_functions();
$functions = $functions['internal'];

// Loop, Format and Insert
foreach ($functions as $function) {
	$function_name = str_replace("_", " ", $function);
	$function_name = ucwords($function_name);

	$query = '';
	$query = 'INSERT INTO search SET id = "", function = "'.$function.'", name = "'.$function_name.'"';

	$tutorial_db->query($query);
}
*/
?>