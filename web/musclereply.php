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
	|| strpos($message_text,'おごって') !== false 
	|| strpos($message_text,'店') !== false 
	|| strpos($message_text,'お腹') !== false 
	|| strpos($message_text,'おなか') !== false 
	|| strpos($message_text,'魚') !== false 
	|| strpos($message_text,'野菜') !== false 
	) 
{
	$return_message_text = "肉が良いですかね？肉が良いですよね！！じゃあーー、肉でも食いに行きますか！！！";
}
else if(strpos($message_text,'金') !== false
	|| strpos($message_text,'カネ') !== false 
	|| strpos($message_text,'給与') !== false 
	|| strpos($message_text,'給料') !== false 
	|| strpos($message_text,'収入') !== false 
	|| strpos($message_text,'所得') !== false 
	|| strpos($message_text,'価値') !== false 
	|| strpos($message_text,'評価') !== false 
	|| strpos($message_text,'昇格') !== false 
	|| strpos($message_text,'売上') !== false 
	|| strpos($message_text,'プロモーション') !== false 
	)
{
	$radnum = rand(1,2);
	switch ($radnum){
		case 1:
			$return_message_text = "お金ほしいですよね！じゃあ、バリバリ働いてもらって、早くプロモーションして、いっぱい稼ぎましょう！！1000万円までなら私が何とかできますので！！";
			break;
		default:
			$return_message_text = "「" . $message_text . "」といえば、売り上げが異常に低いチームがあり、その援助を私たちがしていると思うと腹が立ちますね！！(服バリバリー)";
			break;
	}
}
else if(strpos($message_text,'休') !== false
	|| strpos($message_text,'有給') !== false 
	|| strpos($message_text,'残業') !== false 
	)
{
	$radnum = rand(1,3);
	
	switch ($radnum){
		case 1:
			$return_message_text = "でも、お金ほしいですよね！じゃあ、稼働率250%にして、いっぱい稼ぎましょう！！1000万円までなら私が何とかできますので！！";
			break;
		case 2:
			$return_message_text = "私のようにタイムカード上は有給にして、出勤するという技もあります！ハッハッハ！！";
			break;
		default:
			$return_message_text = "じゃあ、私が巻き取りますんで！！５２ページだけ作っといてください！！";
			break;
	}
}
else if(strpos($message_text,'仕事') !== false
	|| strpos($message_text,'アベ') !== false 
	|| strpos($message_text,'案件') !== false 
	|| strpos($message_text,'稼働率') !== false 
	)
{
	$return_message_text = "じゃあー、300万円の楽だけどクソみたいな他チーム案件と、2000万円のハードだけど身になる案件、どっちがいいっすかね？！";
}
else if(strpos($message_text,'知らん') !== false
	|| strpos($message_text,'しらん') !== false 
	|| strpos($message_text,'知らない') !== false 
	|| strpos($message_text,'知りません') !== false 
	|| strpos($message_text,'わかりません') !== false 
	)
{
	$radnum = rand(1,2);
	switch ($radnum){
		case 1:
			$return_message_text = "知らないですか。すぎやまさんみたいに常にアンテナ張っててほしいっすねー！じゃっ、私は打ち合わせがあるので。";
			break;
		default:
			$return_message_text = "ところで、今週末、提案書書くの手伝ってもらえますかね？";
			break;
	}
}
else if(strpos($message_text,'資料') !== false
	|| strpos($message_text,'レビュー') !== false 
	|| strpos($message_text,'バンクシー') !== false 
	)
{
	$radnum = rand(1,4);
	switch ($radnum){
		case 1:
			$return_message_text = "前から言おうと思っていたけど、あんたの資料はExcelみたいなんだよ！！";
			break;
		case 2:
			$return_message_text = "そうじゃないんすよ！バンクシーなんです！！";
			break;
		case 3:
			$return_message_text = "100点満点中、17点ですね！";
			break;
		default:
			$return_message_text = "もう私が巻き取りますんで！！２ページ目だけ作っといてください！！";
			break;
	}
}
else if(
	 strpos($message_text,'300万') !== false 
	)
{
	$return_message_text = "わがままだなぁ。。わがまますぎる！！";
}
else if(strpos($message_text,'終わらない') !== false
	|| strpos($message_text,'終わりません') !== false 
	|| strpos($message_text,'できません') !== false 
	|| strpos($message_text,'できない') !== false 
	|| strpos($message_text,'無理') !== false 
	|| strpos($message_text,'やれない') !== false 
	|| strpos($message_text,'嫌') !== false
	|| strpos($message_text,'イヤ') !== false 
	|| strpos($message_text,'いや') !== false
 	|| strpos($message_text,'やだ') !== false
	|| strpos($message_text,'ヤダ') !== false
	|| strpos($message_text,'ムリ') !== false
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
else if(strpos($message_text,'失注') !== false
	|| ( strpos($message_text,'コンペ') !== false &&  strpos($message_text,'負') !== false )
	)
{
			$return_message_text = "デロイトと提案内容、金額は一緒でした。PMの差で負けました。ズバリ、あなたには重みがありません！！";
}
else if( ( strpos($message_text,'ロジカル') !== false &&  strpos($message_text,'ない') !== false )
	|| ( strpos($message_text,'論理') !== false &&  strpos($message_text,'ない') !== false )
	|| ( strpos($message_text,'論理') !== false &&  strpos($message_text,'崩壊') !== false )
	|| ( strpos($message_text,'話') !== false &&  strpos($message_text,'変') !== false )
	)
{
	$return_message_text = "理屈じゃないんですよ！！バンクシーなんです！！";
}
else if( ( strpos($message_text,'やめ') !== false &&  strpos($message_text,'たい') !== false )
	|| ( strpos($message_text,'辞め') !== false  )
	|| ( strpos($message_text,'退職') !== false  )
	|| ( strpos($message_text,'転職') !== false )
	)
{
	$radnum = rand(1,3);
	
	switch ($radnum){
		case 1:
			$return_message_text = "体・技・心の順番で鍛えればそうは思わないはずです！一緒に鍛えましょう！！";
			break;
		case 2:
			$return_message_text = "でも、お金ほしいですよね！じゃあ、稼働率250%にして、いっぱい稼ぎましょう！！1000万円までなら私が何とかできますので！！";
			break;
		default:
			$return_message_text = "そうですか！しかし、うちでは関係が悪くなってやめていった人は一人もいませんよ！！";
			break;
	}
}
else if(strpos($message_text,'ミーティング') !== false
	|| strpos($message_text,'会議') !== false 
	|| strpos($message_text,'打合') !== false 
	|| strpos($message_text,'打ち合') !== false 
	)
{
	$return_message_text = "じゃあーー、会議は22:30からSkypeでいいっすかね？";
}
else if(strpos($message_text,'忙') !== false
	|| strpos($message_text,'逃げた') !== false 
	|| strpos($message_text,'逃げるな') !== false 
	|| strpos($message_text,'逃げんな') !== false 
	|| strpos($message_text,'間に合') !== false 
	)
{
	$return_message_text = "まあーーー、マグロのように常に全力で動いていないと死んでしまいますので！！";
}
else if(strpos($message_text,'マグロ') !== false
	)
{
	$return_message_text = "「" . $message_text . "」もいいんですけど、「トヨタの生産がなぜい平準化できているか」ッ、、って知ってますかね？";
}
else if(strpos($message_text,'遅い') !== false
	|| strpos($message_text,'遅すぎ') !== false 
	|| strpos($message_text,'だめです') !== false 
	)
{
	$return_message_text = "じゃあーーー、23:30からSkype会議いれておきますね！";
}
else if(strpos($message_text,'マッチョ') !== false
	|| strpos($message_text,'筋') !== false 
	|| strpos($message_text,'鍛') !== false 
	)
{
	$radnum = rand(1,3);

	switch ($radnum){
		case 1:
			$return_message_text = "やはり、体感を鍛えるにはプラックが一番です！";
			break;
		case 2:
			$return_message_text = "ジムは渋谷がおすすめです！地方行くとコナミですかね！！";
			break;
		default:
			$return_message_text = "効率よく鍛えるにはバンピージャンプが一番ですね！！";
			break;
	}
}
else {
	$radnum = rand(1,10);
	$radsbm = rand(0,2);
	$submes = array(
		"「サービスエンジニアリング」ッ、、って知ってますかね？",
		"今週末、提案書書くの手伝ってもらえますかね？",
		"明後日の提案に向けて、22:30からSkype打ち合わせでいいっすかね？"
		);
	
	switch ($radnum){
		case 1:
			$return_message_text = "仕事の報酬は仕事です！";
			break;
		case 2:
			$return_message_text = "効率よく鍛えるにはバンピージャンプが一番ですね！！";
			break;
//		case 3:
//			$return_message_text = "「" . $message_text . "」もいいんですけど、「サービスエンジニアリング」ッ、、って知ってますかね？";
//			break;
//		case 4:
//			$return_message_text = "「" . $message_text . "」もいいんですけど、今週末、提案書書くの手伝ってもらえますかね？";
//			break;
		case 3:
			$return_message_text = "みなさん、たぶん知らないと思うんですけど、「データレイク」ッ、、って知ってますかね？";
			break;
		case 4:
			$return_message_text = "じゃあー、うまくいったら、ウルフギャングおごりますんで！";
			break;
		case 5:
//			$return_message_text = "「" . $message_text . "」もいいんすけど、明後日の提案に向けて、22:30からSkype打ち合わせでいいっすかね？";
			$return_message_text = "「" . $message_text . "」もいいんすけど、" . $submes[$radsbm] ;
			break;
		case 6:
			$return_message_text = "まあー、目指しているのはイーロン・マスクですねー！";
			break;
		case 7:
			$return_message_text = "昔は「泣かぬなら殺してしまえ」の信長タイプでしたが、今は家康です！！";
			break;
		case 8:
			$return_message_text = "今の仕事、飽きましたかね？飽きましたよね！じゃあーー、面白い仕事しますか！！！";
			break;
		case 9:
			$return_message_text = "これを言うとパワハラになるんですが、今度の土日出勤してもらっていいっすかね！！";
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
