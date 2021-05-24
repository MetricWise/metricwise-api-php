# Metricwise API (PHP)

## Example 
```php
require_once('MetricWiseAPI.php');

$mwapi = new MetricWiseAPI();
$mwapi->setHostname('https://api-XXX.metricwise.net');
$mwapi->setUsername('MarketingPartner');
$mwapi->setAccessKey('secretKey'); # Governs system access
$mwapi->setApiKey('secretApi'); # Governs rate limiting
$lead = array(
	'leadsource' => 'Internet',
	'leadstatus' => 'Hot',
	'description' => 'Lead is interested in...',
	'firstname' => 'Jon',
	'lastname' => 'Doe', # Required field
	'address' => '123 Main St',
	'city' => 'Small Town',
	'zip' => '12345',
	'email' => 'jon.doe@example.com',
	'phone' => '5558675309',
);
if (!$mwapi->submitLead()) {
	echo $mwapi->getError();
} else {
	echo 'OK';
}
```
