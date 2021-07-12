<style type="text/css">
input[readonly] {
	background-color: #CCC;
}

.gray_bg {
	background-color: #CCC;
}
</style>
<form action="submit.php" method="post" name="myform">
<table width="100%">
<tbody><tr>
	<td>お名前</td>
	<td><input type="text" name="name" readonly="readonly" value=""></td>
</tr>
<tr>
	<td>フリガナ</td>
	<td><input type="text" name="furigana" readonly="readonly" value=""></td>
</tr>
<tr>
	<td>メールアドレス</td>
	<td><input type="text" name="address" readonly="readonly" value=""></td>
</tr>
<tr>
	<td>電話番号</td>
	<td><input type="text" name="tel" readonly="readonly" value=""></td>
</tr>
<tr>
	<td>お問い合わせ内容</td>
	<td><textarea name="otoiawase" class="gray_bg" readonly=""></textarea></td>
</tr>
</tbody></table>
<input type="submit" value="送信する">
</form>