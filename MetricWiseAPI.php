<?php
/**
 * @copyright 2012-2021 MetricWise, Inc.
 * @license https://opensource.org/licenses/MIT
 */
class MetricWiseAPI
{
	/**
	 * @var string
	 */
	private $accessKey;

	/**
	 * @var string
	 */
	private $apiKey;

	/**
	 * @var string
	 */
	private $error;
	
	/**
	 * @var string
	 */
	private $hostname;

	/**
	 * @var string
	 */
	private $username;

	/**
	 * @param string $accessKey
	 */
	public function setAccessKey($accessKey) {
		$this->accessKey = $accessKey;
	}

	/**
	 * @param string $apiKey
	 */
	public function setApiKey($apiKey) {
		$this->apiKey = $apiKey;
	}

	/**
	 * @param string $hostname
	 */
	public function setHostname($hostname) {
		$this->hostname = $hostname;
	}

	/**
	 * @param string $username
	 */
	public function setUsername($username) {
		$this->username = $username;
	}

	/**
	 * @return string
	 */
	public function getError() {
		return $this->error;
	}

	/**
	 * @param array $lead
	 */
	public function submitLead($lead) {
		return $this->submit('Leads', $lead);
	}

	/**
	 * @param string
	 */
	private function setError($error) {
		$this->error = $error;
	}

	/**
	 * @param string $module
	 * @param array $element
	 */
	private function submit($module, $element) {
		$this->error = "";

		$response = $this->webservice();
		if (!$response['success']) {
			$this->error = $response['error']['message']; // Web Service API
			if (!$this->error) {
				$this->error = $response['message']; // AWS API Gateway
			}
			return false;
		}
		$token = $response['result']['token'];
		
		$response = $this->webservice(array(
			'operation' => 'login',
			'username' => $this->username,
			'accessKey' => md5($token . $this->accessKey),
		));
		if (!$response['success']) {
			$this->error = $response['error']['message'];
			return false;
		}
		$sessionName = $response['result']['sessionName'];
		$userId = $response['result']['userId'];

		$element['assigned_user_id'] = $userId;
		
		$response = $this->webservice(array(
			'operation' => 'create',
			'sessionName' => $sessionName,
			'elementType' => $module,
			'element' => json_encode($element),
		));
		if (!$response['success']) {
			$this->error = $response['error']['message'];
			return false;
		}

		$this->webservice(array(
			'operation' => 'logout',
			'sessionName' => $sessionName,
		));

		return true;
	}

	private function webservice($postfields = null) {
		if ($postfields) {
			$curl = curl_init("$this->hostname/1.0/webservice.php");
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $postfields);
		} else {
			$curl = curl_init("$this->hostname/1.0/webservice.php?operation=getchallenge&username=$this->username");
		}
		curl_setopt($curl, CURLOPT_HTTPHEADER, array("X-Api-Key: $this->apiKey"));
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		$json = curl_exec($curl);
		curl_close($curl);
		return json_decode($json, true);
	}
}
