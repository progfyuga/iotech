<?php

/*
 * SMTPメール送信サンプルファイル
 *
 * 配布元・解説：
 * https://0o.gs/6/0/55
 *
 * Copyright (C) 2019 総合サービス.com. All Rights Reserved.
*/

/* ライブラリ使用準備 */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require __DIR__.'/src/Exception.php';
require __DIR__.'/src/PHPMailer.php';
require __DIR__.'/src/SMTP.php';


/* オブジェクト生成 */
$mail = new PHPMailer(true);

/*内容*/
$request_param = $_POST;

$request_datetime = date("Y年m月d日 H時i分s秒");


$mailto = $request_param['email'];
$to = "yamaimotaruto@gmail.com";
$mailfrom = "yamaimotaruto@gmail.com";
$subject = "お問い合わせ、ありがとうございます。";

$content = "";
$content .= $request_param['name']. "様\r\n";
$content .= "お問い合わせ、ありがとうございます。\r\n";
$content .= "=================================\r\n";
$content .= "お名前　 　　　　　　" . htmlspecialchars($request_param['name'])."\r\n";
$content .= "メールアドレス　 　　" . htmlspecialchars($request_param['email'])."\r\n";
$content .= "お問い合わせ内容　 　" . htmlspecialchars($request_param['content'])."\r\n";
$content .= "お問い合わせ日時　 　" . $request_datetime."\r\n";
$content .= "=================================\r\n";

//管理者確認用メール
$subject2 = "お問い合わせがありました。";
$content2 = "";
$content2 .= "お問い合わせがありました。\r\n";
$content2 .= "=================================<br/>\r\n";
$content2 .= "お名前　 　　　　　" . htmlspecialchars($request_param['name'])."<br/>\r\n";
$content2 .= "メールアドレス　 　" . htmlspecialchars($request_param['email'])."<br/>\r\n";
$content2 .= "お問い合わせ内容　 " . htmlspecialchars($request_param['content'])."<br/>\r\n";
$content2 .= "お問い合わせ日時   " . $request_datetime."<br/>\r\n";
$content2 .= "================================="."\r\n";


try {
	/* サーバー設定 */
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->Host = "smtp.gmail.com";//【SMTPサーバ名】
	$mail->Username = "yamaimotaruto@gmail.com";//【SMTPユーザー名】
	$mail->Password = "yuga0729";//【SMTPパスワード】
	$mail->SMTPSecure = "tls";
	$mail->Port = "587";//【SMTPポート番号】

	/* 送受信者設定 */
	$mail->setFrom("yamaimotaruto@gmail.com", $mailto);/*"【送信元メールアドレス】", "【送信者名】*/
	$mail->addAddress("yamaimotaruto2@gmail.com");/*"【送信先メールアドレス】"*/
	$mail->addReplyTo("yamaimotaruto2@gmail.com", "【返信先名】");/*"【返信先メールアドレス】", "【返信先名】"*/

	/* コンテンツ設定 */
	$mail->CharSet = "UTF-8";
	$mail->Encoding = "base64";
	$mail->Subject = $subject2;/*【メール件名】*/
	$mail->isHTML("【HTMLメール：`true`or`flase`】");
	$mail->Body  = $content2;/*【メール本文】*/

	/* メール送信試行 */
	$mail->send();

} catch (Exception $e) {
	/* 例外処理 */
	die("Message could not be sent. Mailer Error: ".$mail->ErrorInfo);
}
echo "お問い合わせが送信されました。";
echo "<a href='page-full-q.html'>
            <button type='button'>ホームに戻る</button>
        </a>";
