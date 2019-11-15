<?php
 
$accessToken = 'rO8tDQXbOolri2uUdAFMNo967NjjTrxgErySpQRgd3NegxoyFf8W/xuo8E4TqG4ZQUqVn8vjZ+uaqvCS/HOKRQsd6zl0fsZbmW4lWiAAJD2CQBOBAe0J9R9WI/mGGHJ9MQb3+0Xukm42Z4QdVuUrjAdB04t89/1O/w1cDnyilFU=';

//ユーザーからのメッセージ取得
$json_string = file_get_contents('php://input');
$json_object = json_decode($json_string);

//取得データ
$replyToken = $json_object->{"events"}[0]->{"replyToken"};        //返信用トークン
$message_type = $json_object->{"events"}[0]->{"message"}->{"type"};    //メッセージタイプ
$message_text = $json_object->{"events"}[0]->{"message"}->{"text"};    //メッセージ内容
 
//メッセージタイプが「text」以外のときは何も返さず終了
if($message_type != "text") exit;

// ---------------------------------------------------
//返信メッセージ
// ---------------------------------------------------

$return_message_text = "";


if(strpos($message_text,'食') !== false
	|| strpos($message_text,'飯') !== false 
	|| strpos($message_text,'ごはん') !== false 
	|| strpos($message_text,'めし') !== false 
	|| strpos($message_text,'おごり') !== false 
	|| strpos($message_text,'店') !== false 
	|| strpos($message_text,'お腹') !== false 
	|| strpos($message_text,'おなか') !== false 
	) 
{
	$return_message_text = "肉が良いですかね？肉が良いですよね！！じゃあーー、肉でも食いに行きますか！！！";
}
else if(strpos($message_text,'金') !== false
	|| strpos($message_text,'カネ') !== false 
	|| strpos($message_text,'かね') !== false 
	|| strpos($message_text,'給与') !== false 
	|| strpos($message_text,'給料') !== false 
	|| strpos($message_text,'収入') !== false 
	|| strpos($message_text,'所得') !== false 
	|| strpos($message_text,'価値') !== false 
	|| strpos($message_text,'評価') !== false 
	|| strpos($message_text,'昇格') !== false 
	|| strpos($message_text,'プロモーション') !== false 
	)
{
	$return_message_text = "お金ほしいですよね！じゃあ、バリバリ働いてもらって、早くプロモーションして、いっぱい稼ぎましょう！！1000万円までなら私が何とかできますので！！";

}
else if(strpos($message_text,'嫌') !== false
	|| strpos($message_text,'イヤ') !== false 
	|| strpos($message_text,'いや') !== false 
	)
{
	$return_message_text = "わがままだなぁ。。わがまますぎる！！";

}
else if(strpos($message_text,'資料') !== false
	|| strpos($message_text,'レビュー') !== false 
	|| strpos($message_text,'バンクシー') !== false 
	)
{
	$radnum = rand(1,3);
	
	switch ($radnum){
		case 1:
			$return_message_text = "前から言おうと思っていたけど、あんたの資料はExcelみたいなんだよ！！";
			break;
		case 2:
			$return_message_text = "そうじゃないんすよ！バンクシーなんです！！";
			break;
		default:
			$return_message_text = "じゃあ、私が巻き取りますんで！！２ページだけ作っといてください！！";
			break;
	}

}
else if(strpos($message_text,'終わらない') !== false
	|| strpos($message_text,'終わりません') !== false 
	|| strpos($message_text,'できません') !== false 
	|| strpos($message_text,'できない') !== false 
	)
{
	$radnum = rand(1,3);

	switch ($radnum){
		case 1:
			$return_message_text = "ふぅっ、マネージャーに昇格させるんじゃなかったな。";
			break;
		case 2:
			$return_message_text = "わがままだなぁ。。わがまますぎる！！";
			break;
		default:
			$return_message_text = "じゃあ、もう、私が巻き取りますんで！！４ページの一覧だけ作っといてください！！";
			break;
	}

}
else if(strpos($message_text,'ミーティング') !== false
	|| strpos($message_text,'会議') !== false 
	|| strpos($message_text,'打合せ') !== false 
	)
{
	$return_message_text = "じゃあーー、会議は22:30からSkypeでいいっすかね？";
}

else {
	$radnum = rand(1,4);
	
	switch ($radnum){
		case 1:
			$return_message_text = "仕事の報酬は仕事です！";
			break;
		case 2:
			$return_message_text = "効率よく鍛えるにはバンピージャンプが一番ですね！！";
			break;
		case 3:
			$return_message_text = "みなさん、たぶん知らないと思うんですけど、「データレイクッ」って知ってますかね？";
			break;
		default:
			$return_message_text = "（バチバチバチ！）ちょっと待ってくださいね！10分後の会議の資料を作っているので！！";
			break;
	}
}












// ---------------------------------------------------
//返信実行
sending_messages($accessToken, $replyToken, $message_type, $return_message_text);
// ---------------------------------------------------
?>
<?php
//メッセージの送信
function sending_messages($accessToken, $replyToken, $message_type, $return_message_text){
    //レスポンスフォーマット
    $response_format_text = [
        "type" => $message_type,
        "text" => $return_message_text
    ];
 
    //ポストデータ
    $post_data = [
        "replyToken" => $replyToken,
        "messages" => [$response_format_text]
    ];
 
    //curl実行
    $ch = curl_init("https://api.line.me/v2/bot/message/reply");
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json; charser=UTF-8',
        'Authorization: Bearer ' . $accessToken
    ));
    $result = curl_exec($ch);
    curl_close($ch);
}
?>