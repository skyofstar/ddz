<?php
	//使用Pest Library
	//require_once '../lib/PestJSON.php' 使用PEST JSON模組，Request & Response皆為JSON傳輸
	//產生PestJSON物件，建構子為WebService的URL
	require_once '../lib/PestJSON.php';
	$pest = new PestJSON('http://sso.cloud.edu.tw/ORG/service/EduCloud');
	
	$tokenId="ken@mail.edu.tw";
	$appCode="COMM";	
	$userIP="10.10.7.62";
	
	//對RESTful Web Service呼叫GET方法，並回傳結果
	//傳入參數為原本物件裡的URL的結尾再加上的URL&Query String
	$response = $pest->get('/auth/tokenAuth/'.$tokenId.'?appCode='.$appCode.'&userIp='.$userIP);
	//輸出所有的回傳的結果
	echo "<br/>";
	echo "StatusCode:".$response['actXML']['statusCode']."<br/>";
	echo "Message:".$response['actXML']['message']."<br/>";
	echo "Active:".$response['actXML']['rsInfo']['active']."<br/>";
	echo "CharacterName:".$response['actXML']['rsInfo']['characterName']."<br/>";
		
?>