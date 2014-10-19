<?php
	//使用Pest Library
	//require_once '../lib/PestJSON.php' 使用PEST JSON模組，Request & Response皆為JSON傳輸
	//產生PestJSON物件，建構子為WebService的URL
	require_once '../lib/PestJSON.php';
	$pest = new PestJSON('http://sso.cloud.edu.tw/ORG/service/EduCloud');
	
	$appCode="COMM";	
	
	//對RESTful Web Service呼叫GET方法，並回傳結果
	//傳入參數為原本物件裡的URL的結尾再加上的URL&Query String
	$response = $pest->get('/ap/char/'.$appCode);
	//輸出所有的回傳的結果
	echo "<br/>";
	echo "StatusCode:".$response['actXML']['statusCode']."<br/>";
	echo "Message:".$response['actXML']['message']."<br/>";

	$characters = $response['actXML']['rsInfo']['characters'];
	foreach($characters as $character){
		echo "charId:".$character['charId']."<br/>";
		echo "charName:".$character['charName']."<br/>";
		echo "charDescription:".$character['charDescription']."<br/>";
		echo "entryId:".$character['entryId']."<br/>";
		echo "modifyId:".$character['modifyId']."<br/>";
	}
	
?>