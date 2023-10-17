<?php
highlight_file(__FILE__);
require('flag.php'); // $flag = 'xxx';


$exp = isset($_POST['exp']) ? trim($_POST['exp']) : '';
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
