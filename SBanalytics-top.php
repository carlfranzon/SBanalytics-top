<?php

define('ga_email','YOURUSERNAME');
define('ga_password','YOURPASSWORD');
define('ga_profile_id',$_GET['profile']);


require 'class_gapi.php';

$ga = new gapi(ga_email,ga_password);

$ga->requestReportData(ga_profile_id,array('pageTitle'),array('pageviews'),array('-pageviews'),null,date("Y-m-d", mktime(0,0,0,date("m"),date("d")-6,date("Y"))),date("Y-m-d"),1,10);

?>

<table id="Top Pages">
  <tr>
		<th style="width:20%;color:mediumGray;text-align:center">Views</th>
		<th style="width:80%;color:mediumGray;padding-left:20">Pagetitle</th>
	</tr>	
<?php foreach($ga->getResults() as $result): ?>
	<tr>
		<td style="color:yellow;text-align:right" class="projectViews"><?php echo $result->getPageviews() ?></td>
		<td class="projectPage"><?php echo str_replace(array('carlfranzon.com ','» '),'',$result) ?></td> <!-- Replace the array in here with how your title prefix is set up! -->
	</tr>
<?php endforeach ?>
</table>
	
