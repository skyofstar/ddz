<?php
	$tokenId="02f1ff575e347fc35c0ed2f892ab5f56";
	$userIP="10.10.7.62";
	//填入WSDL網址	
	$client = new SoapClient("http://sso.cloud.edu.tw/ORG/service/SSOServiceX?wsdl");
	
	//從Web Service呼叫getToken1Authority
	//填入所需傳入參數	
	$response = $client->__soapCall("getToken1Authority",array('TokenId' => $token,'UserIP'=>$userIP));

	//輸出所有的回傳的結果
	echo "<br/>";
	echo "StatusCode:".$response->return->ActXML->StatusCode."<br/>";
	echo "Message:".$response->return->ActXML->Message."<br/>";
	
	//回傳單筆App，則App為物件
	//回傳多筆App，則App為Array
	//判斷App是否為Array，若是，則迴圈輸出；若不是，則單筆輸出
	$apps = $response->return->ActXML->RsInfo->Apps->App;
	if(is_array($apps)){
		foreach($apps as $app){
			printApp($app);
		}
	}else{
		printApp($apps);
	}
	
	//輸出App底下的結果
	function printApp($app){
		echo "AppCode:".$app->AppCode."<br/>"; 
		echo "AppName:".$app->AppName."<br/>";
		echo "Use:".$app->Use."<br/>";
		echo "AppLogoutUrl:".$app->AppLogoutUrl."<br/>";
		echo "AppDomain:".$app->AppDomain."<br/>";
		echo "AppDescription:".$app->AppDescription."<br/>";
		echo "CharacterName:".$app->CharacterName."<br/>";
	}
?>