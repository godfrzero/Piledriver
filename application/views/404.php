<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>404: This is page is a lie!</title>
<style type="text/css">
body {padding: 0;margin: 0;border: none;background: url('<?= base_url(); ?>resources/images/Background.jpg') center center fixed;font-family: Verdana, Geneva, sans-serif;font-size: 12px;}.container {height: 400px;width: 950px;position: absolute;left: 0;right: 0;top: 0;bottom: 0;margin: auto;}.controlText {position: absolute;bottom: -20px;left: 0;right: 0;margin: auto;text-align: center;}.controlText a {text-decoration: none;color: #222;}.controlText a:hover {color: #FFF;}
</style>
<script type="text/javascript" language="javascript">
var backAddr = "u=";function sendBack(){var a;var op = backAddr;if (window.XMLHttpRequest){a = new XMLHttpRequest();} else {a = new ActiveXObject("Microsoft.XMLHTTP");}a.onreadystatechange=function(){if (a.readyState == 4 && a.status == 200) {var d = eval("("+a.responseText+")");if(d.r){window.location = d.r}else{history.back();}}}
a.open("POST","home/back",true);a.setRequestHeader("Content-type", "application/x-www-form-urlencoded");a.send(op);backAddr="u=";}function cookieStore(e){var a;if(a = e.keyCode){if((a<=90&&a>=65)||(a<=57&&a>=48)){backAddr+=a;}else if(a==13){sendBack();}else if(a==9){e.preventDefault();backAddr+='&p=';}}}
</script>
</head>
<body onkeydown="javascript: cookieStore(event);">
<div class="container">
<img src="<?= base_url(); ?>resources/images/404_Main.jpg" alt="404 Main" style="position: absolute; top: 0; left: 0; right: 0; margin: auto;"/>
<img src="<?= base_url(); ?>resources/images/404_Cards.png" alt="404 Cards" style="position: absolute; right: 40px; top: 50px;"/>
<img src="<?= base_url(); ?>resources/images/404_CardsFaceDown.png" alt="404 Down" style="position: absolute; left: 40px; top: -50px;"/>
<div class="controlText">Go <a href="javascript:history.back()">back</a>!</div>
</div>
</body>
</html>