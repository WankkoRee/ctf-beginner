<?php
highlight_file(__FILE__.'.bak');

ob_start();
require("flag.php");
ob_get_clean();

$code = isset($_POST['code']) ? trim($_POST['code']) : '';
echo "
<form method='post'>
<input type='text' name='code' placeholder='执行一段代码' value='$code'>
<input type='submit' value='提交'>
</form>
";
if ($code !== '') {
    eval($code);
}
