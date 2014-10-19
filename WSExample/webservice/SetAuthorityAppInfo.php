<?php
	$userId="100";
	$appCode="COMM";
	$use="Y";
	//填入WSDL網址
	$client = new SoapClient("http://sso.cloud.edu.tw/ORG/service/AuthServiceX?wsdl");
	
	//從Web Service呼叫setAuthorityAppInfo
	//填入所需傳入參數
	$response = $client->__soapCall("setAuthorityAppInfo",array('UserId' => $userId, 'AppCode' =>$appCode, 'Use' => $use));

	//輸出所有的回傳的結果
	echo "<br/>";
	echo "StatusCode:".$response->return->ActXML->StatusCode."<br/>";
	echo "Message:".$response->return->ActXML->Message."<br/>";
	echo "RsInfo:".$response->return->ActXML->RsInfo."<br/>";

?>
