<?php
	$tokenId="ken@mail.edu.tw";
	$apCpde="ken12345678";
	$userIP="10.10.7.62";
	//填入WSDL網址	
	$client = new SoapClient("http://sso.cloud.edu.tw/ORG/service/SSOServiceX?wsdl");
	
	//從Web Service呼叫validToken1Authority
	//填入所需傳入參數	
	$response = $client->__soapCall("validToken1Authority",array('TokenId' => $tokenId, 'apCode' =>$apCode, 'UserIP' => $userIP));

	//輸出所有的回傳的結果
	echo "<br/>";
	echo "StatusCode:".$response->return->ActXML->StatusCode."<br/>";
	echo "Message:".$response->return->ActXML->Message."<br/>";
	echo "Active:".$response->return->ActXML->RsInfo->Active."<br/>";
	echo "CharacterName:".$response->return->ActXML->RsInfo->CharacterName."<br/>";

?>
