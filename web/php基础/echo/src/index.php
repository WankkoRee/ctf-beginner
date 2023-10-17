<?php
$code = isset($_POST['code']) ? trim($_POST['code']) : '';

echo preg_replace(
    '/<span style="color: #FF8000">\/\*FORM\*\/(<br \/>)?<\/span>/',
    "<form method='post' style='display: inline-flex;margin-block-end: 0;'>".
    "<textarea name='code' placeholder='执行一段代码' rows='1'>$code</textarea>".
    "<input type='submit' value='提交' />".
    "</form>$1",
    highlight_file(__FILE__.'.bak', true));


ob_start();
require("flag.php");
ob_get_clean();

if ($code !== '') {
    eval("echo $code;");
}
