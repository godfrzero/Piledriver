<?php

header('Content-Type:text/html');

$JS_Dir = './resources/js/';		// Directory where the JS files are placed
$CSS_Dir = './resources/css/';	// Directory where the CSS files are placed
$JSToInclude = array('jquery.js', 'datepicker.js', 'h2o.animate.js', 'h2o.js');
$CSSToInclude = array('reset.css', 'datepicker.css', 'main.css');


echo '<style>
';
foreach($CSSToInclude as $CSSFile) {
	if(file_exists($CSS_Dir . $CSSFile)) {
		echo '/* Reading from source file at ' . $CSS_Dir . $CSSFile . ' */
';
		readfile($CSS_Dir . $CSSFile);
	}
}
echo '</style>';


echo '<script>
';
foreach($JSToInclude as $JSFile) {
	if(file_exists($JS_Dir . $JSFile)) {
		echo '/* Reading from source file at ' . $JS_Dir . $JSFile . ' */
';
		readfile($JS_Dir . $JSFile);
	}
}
echo '</script>';

?>