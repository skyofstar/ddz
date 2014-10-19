<?php
	$tokenId="02f1ff575e347fc35c0ed2f892ab5f56";
	$userIP="10.10.7.62";
	//填入WSDL網址	
	$client = new SoapClient("http://sso.cloud.edu.tw/ORG/service/SSOServiceX?wsdl");
	
	//從Web Service呼叫getToken2
	//填入所需傳入參數	
	$response = $client->__soapCall("getToken2",array('TokenId' => $token, 'UserIP' => $userIP));
	//輸出所有的回傳的結果
	echo "<br/>";
	echo "StatusCode:".$response->return->ActXML->StatusCode."<br/>";
	echo "Message:".$response->return->ActXML->Message."<br/>";
	$user = $response->return->ActXML->RsInfo->User;
	echo "UserAccount:".$user->UserAccount."<br/>";
	echo "UserId:".$user->UserId."<br/>";
	echo "UserEmail:".$user->UserEmail."<br/>";
	echo "Gender:".$user->Gender."<br/>";
	echo "CName:".$user->CName."<br/>";
	echo "UserOpenIdent:".$user->UserOpenIdent."<br/>";
	echo "UserPic:".$user->UserPic."<br/>";
	
	//回傳單筆UserTitle，則UserTitle為物件
	//回傳多筆UserTitle，則UserTitle為Array
	//判斷UserTitle是否為Array，若是，則迴圈輸出；若不是，則單筆輸出
	$titlesArray = $user->UserTitles->UserTitle;
	if(is_array($titlesArray)){
		foreach($titlesArray as $title){
			printTitle($title);
		}	
	}else{
		printTitle($title);
	}
	
	//輸出UserTitle底下的結果
	function printTitle($title){
		echo "UserTitleSid:".$title->UserTitleSid."<br/>";
		echo "UserTitleName:".$title->UserTitleName."<br/>";
	}
?>

