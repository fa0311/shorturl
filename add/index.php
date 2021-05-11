<?php
session_start();
$_SESSION["time"] = time();
$_SESSION["ip"] = $_SERVER["REMOTE_ADDR"];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="URL短縮">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="noindex,nofollow">
    <title>URL短縮</title>
    <link rel="stylesheet" href="assets/index.css">
    <script type="text/javascript" src="assets/lib/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="assets/index.js"></script>
</head>

<body>
    <h1>短縮URL</h1>
    <p>無料で使える短縮URLサービスです</p>
    <p>URLは早いもの勝ちです</p>
    <p>予期せずサービスを終了する可能性があります</p>
    <p>当サービスで生じた損害については一切責任を取りません</p>
    <form name="form">
        <div class="form">
            <p><label>希望のURL</label></p>
            <input type="text" name="domain" value=""><span>.短.net</span>
        </div>
        <div class="form">
            <p><label>リダイレクト先URL</label></p>
            <input type="text" name="url" value="">
        </div>
    </form>
    <button id="send">送信</button>
    <div id="output"></div>
</body>

</html>