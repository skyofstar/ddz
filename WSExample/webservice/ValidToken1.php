<?php
	$tokenId="02f1ff575e347fc35c0ed2f892ab5f56";
	$userIP="10.10.7.62";
	//填入WSDL網址	
	$client = new SoapClient("http://sso.cloud.edu.tw/ORG/service/SSOServiceX?wsdl");
	
	//從Web Service呼叫validToken1
	//填入所需傳入參數	
	$response = $client->__soapCall("validToken1",array('TokenId' => $token, 'UserIP' => $userIP));

	//輸出所有的回傳的結果
	echo "<br/>";
	echo "StatusCode:".$response->return->ActXML->StatusCode."<br/>";
	echo "Message:".$response->return->ActXML->Message."<br/>";
	echo "RsInfo:".$response->return->ActXML->RsInfo."<br/>";
?>
