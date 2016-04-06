<?php
$base_url = '../../';

$css = file_get_contents('themes/' . $_POST['theme'] . '/css/style.css');

$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width"/>
      <meta name="format-detection" content="telephone=no">
        <style type="text/css">'. $css . $_POST['added_CSS'] . '</style>
  </head> 
' .
                $_POST['message'] . '
                ' .
' </body>
</html>';

echo htmlspecialchars($message);
?>