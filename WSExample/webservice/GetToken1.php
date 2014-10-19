<?php
	$userId="ken@mail.edu.tw";
	$password="ken12345678";
	$userIP="10.10.7.62";
	//填入WSDL網址	
	$client = new SoapClient("http://sso.cloud.edu.tw/ORG/service/SSOServiceX?wsdl");
	
	//從Web Service呼叫getToken1
	//填入所需傳入參數	
	$response = $client->__soapCall("getToken1",array('UserId' => $userId, 'Password' =>$password, 'UserIP' => $userIP));
	
	//輸出所有的回傳的結果
	echo "<br/>";
	echo "StatusCode:".$response->return->ActXML->StatusCode."<br/>";
	echo "Message:".$response->return->ActXML->Message."<br/>";
	echo "TokenId:".$response->return->ActXML->RsInfo->TokenId."<br/>";

?>
