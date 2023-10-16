<?php
highlight_file(__FILE__.'.bak');

ob_start();
require("flag.php");
ob_get_clean();

echo '
<form method="post">
<input type="text" name="code" placeholder="执行一段代码">
<input type="submit" value="提交">
</form>
';
if (isset($_POST['code'])) {
    $code = trim($_POST['code']);
    if ($code !== '') {
        eval($code);
    }
}
