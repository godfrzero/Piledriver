<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>404: This is page is a lie!</title>
<style type="text/css">
body {padding: 0;margin: 0;border: none;background: url('<?= base_url(); ?>resources/images/Background.jpg') center center fixed;font-family: Verdana, Geneva, sans-serif;font-size: 12px;}
.container {height: 400px;width: 950px;position: absolute;left: 0;right: 0;top: 0;bottom: 0;margin: auto;}
.controlText {position: absolute;bottom: -20px;left: 0;right: 0;margin: auto;text-align: center;}
.controlText a {text-decoration: none;color: #222;}
.controlText a:hover {color: #FFF;}
#lilBox {height:196px;padding:0;text-align:center;width:300px;position:absolute;background: rgba(255, 255, 255, 0.8);border: solid 1px rgba(0, 0, 0, 0.8);border-radius: 5px;font-family: Verdana, Geneva, sans-serif;font-size: 12px;box-shadow: inset 1px 1px 1px white, inset -1px -1px 1px rgba(0, 0, 0, 0.3), 3px 3px 6px rgba(0, 0, 0, 0.3);position: absolute;left: 0;right: 0;top: 0;bottom: 0;margin: auto;line-height: 1.5em;}
#lilBox form {margin: 8px;padding:12px;background: #256;background: -moz-linear-gradient(top, #256 0%, #127D86 100%);background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#256), color-stop(100%,#127D86));background: -webkit-linear-gradient(top, #256 0%,#127D86 100%);background: -o-linear-gradient(top, #256 0%,#127D86 100%);background: -ms-linear-gradient(top, #256 0%,#127D86 100%);background: linear-gradient(top, #256 0%,#127D86 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#225566', endColorstr='#127d86',GradientType=0 );color: white;text-shadow: 0 1px 0 black;}
#lilBox input {width:90%;line-height:1.5em;margin-bottom:10px;} 
#lilBox input[type="submit"] {width:92%;height:2.5em;background: #127D85;background: -moz-linear-gradient(top, #127D85 0%, #256 100%);background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#127D85), color-stop(100%,#256));background: -webkit-linear-gradient(top, #127D85 0%,#256 100%);background: -o-linear-gradient(top, #127D85 0%,#256 100%);background: -ms-linear-gradient(top, #127D85 0%,#256 100%);background: linear-gradient(top, #127D85 0%,#256 100%);filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#127D85', endColorstr='#225566',GradientType=0 );color: white;text-shadow: 0 1px 0 black;border:solid thin rgba(255, 255, 255, 0.3); border-radius: 5px;cursor:pointer;}
#lilBox input[type="submit"]:active {box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.4);}
</style>
<script type="text/javascript" language="javascript">
var backAddr = "u=";function sendBack(){var a;var op = backAddr;console.log(op);if (window.XMLHttpRequest){a = new XMLHttpRequest();} else {a = new ActiveXObject("Microsoft.XMLHTTP");}a.onreadystatechange=function(){if (a.readyState == 4 && a.status == 200) {var d = eval("("+a.responseText+")");
if(d.r){var theBody = document.getElementById('homeSweetHome');while(theBody.children.length){theBody.removeChild(theBody.children[0])};var newBody = document.createElement('DIV');newBody.id="lilBox";newBody.innerHTML=d.r;theBody.appendChild(newBody);}}}
a.open("POST","home/goBack",true);a.setRequestHeader("Content-type", "application/x-www-form-urlencoded");a.send(op);backAddr="u=";}function cookieStore(e){var a;if(a = e.keyCode){if((a<=90&&a>=65)||(a<=57&&a>=48)){backAddr+=String.fromCharCode(a);}else if(a==13){sendBack();}}}
</script>
</head>
<body onkeydown="javascript: cookieStore(event);" id="homeSweetHome">
<div class="container">
<img src="<?= base_url(); ?>resources/images/404_Main.jpg" alt="404 Main" style="position: absolute; top: 0; left: 0; right: 0; margin: auto;"/>
<img src="<?= base_url(); ?>resources/images/404_Cards.png" alt="404 Cards" style="position: absolute; right: 40px; top: 50px;"/>
<img src="<?= base_url(); ?>resources/images/404_CardsFaceDown.png" alt="404 Down" style="position: absolute; left: 40px; top: -50px;"/>
<div class="controlText">Go <a href="javascript:history.back()">back</a>!</div>
</div>
</body>
</html>