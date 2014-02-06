<?php
#namespace SSP\OTRS;
class SoapOTRS
{
	private $userName;
	private $userPass;
	private $namespace;
	private $url;
	private $soapclient;
	public function setUserData($userName, $userPass)
	{
		$this->userName = $userName;
		$this->userPass = $userPass;
	}
	public function setURL($url)
	{
		$this->url = $url;
	}
	public function setNamespace($namespace)
	{
		$this->namespace = $namespace;
	}
	public function create()
	{
		    $client = new SoapClient(null, array(
			    'location'  => $this->url,
			    'uri'       => $this->namespace,
			    'trace'     => 1,
			    'style'     => SOAP_RPC,
			    'use'       => SOAP_ENCODED));
		    $this->soapclient = $client;

	}
	public function callSoap($name, $param = array())
	{
		$p = array(
			    new SoapParam($this->userName, "UserLogin"),
       	 		new SoapParam($this->userPass, "Password")
			);
		foreach($param as $pa)
		{
			$p[] = $pa;
		}
		$ret = $this->soapclient->__soapCall($name, $p);
		return $ret;
	}
}