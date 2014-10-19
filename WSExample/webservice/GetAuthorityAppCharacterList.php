<?php
	$appCode="COMM";
	//填入WSDL網址
	$client = new SoapClient("http://sso.cloud.edu.tw/ORG/service/AuthServiceX?wsdl");
	
	//從Web Service呼叫getAuthorityAppCharacterList
	//填入所需傳入參數
	$response = $client->__soapCall("getAuthorityAppCharacterList",array('AppCode' =>$appCode));
	
	//輸出所有的回傳的結果	
	echo "<br/>";
	echo "StatusCode:".$response->return->ActXML->StatusCode."<br/>";
	echo "Message:".$response->return->ActXML->Message."<br/>";
	//回傳單筆Character，則Character為物件
	//回傳多筆Character，則Character為Array
	//判斷Character是否為Array，若是，則迴圈輸出；若不是，則單筆輸出
	$characters = $response->return->ActXML->RsInfo->Characters->Character;
	if(is_array($characters)){
		foreach($characters as $character){
			printCharacter($character);
		}
	}else{
		printCharacter($characters);
	}
	
	//輸出Character底下的結果
	function printCharacter($character){
		echo "CharId:".$character->CharId."<br/>";
		echo "CharName:".$character->CharName."<br/>";
		echo "CharDescription:".$character->CharDescription."<br/>";
		echo "EntryId:".$character->EntryId."<br/>";
		echo "ModifyId:".$character->ModifyId."<br/>";
	}

?>
