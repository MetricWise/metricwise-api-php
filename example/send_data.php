<?php
require_once('../MetricWiseAPI.php');
require_once('config.php');

$interests = is_array($_POST['interests']) ? implode(", ", $_POST['interests']) : $_POST['interests'];

$description = array();
if ($_POST['num_windows']) $description[] = "Number of Windows: " . trim(strip_tags($_POST['num_windows']));
if ($_POST['hear_about']) $description[] = "Heard About: " . trim(strip_tags($_POST['hear_about']));
if ($interests) $description[] = "Interests: " . trim(strip_tags($interests));
if ($_POST['comment']) $description[] = "Comment: " . trim(strip_tags($_POST['comment']));

$lead = array(
	'leadsource' => 'Internet',
	'leadstatus' => 'Hot',
	'description' => implode(", ", $description),
	'lastname' => $_POST['user_name'],
	'address' => $_POST['address'],
	'city' => $_POST['city'],
	'zip' => $_POST['zip'],
	'email' => $_POST['email'],
	'phone' => $_POST['phone'],
);

$mwapi = new MetricWiseAPI();
$mwapi->setAccessKey($accessKey);
$mwapi->setHostname($hostname);
$mwapi->setUsername($username);
if (!$mwapi->submitLead($lead)) {
	echo $mwapi->getError();
} else {
	echo 'OK';
}
