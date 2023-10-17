<?php
highlight_file(__FILE__);
require('flag.php'); // $flag = 'xxx';


$exp = isset($_POST['exp']) ? trim($_POST['exp']) : '';

if (!preg_match("/[0-9]/", $exp)) { // 要有数字
    die("计算器得输入数字啊");
}
if (preg_match("/[;'\"]/", $exp)) { // 不能有;、'、"
    die("别注入了，求求了");
}

$result = '?';
if ($exp !== '')
    eval("\$result = $exp;");
echo "
<form method='post' style='display: inline-flex; margin-block-end: 0;'>
    <textarea name='exp' placeholder='数学表达式' rows='1' style='resize: horizontal;'>$exp</textarea>
    <input type='submit' value='=' />
    <pre style='margin: 0;'>$result</pre>
</form>
";
