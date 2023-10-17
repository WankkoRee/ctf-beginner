<?php
$flag = "###flag###";

echo substr($flag, 0, 8);

echo "<form method='post'>";

$code = array();
for ($i=9; $i <= 13;$i++) {
    $name = "code$i";
    $param = isset($_POST[$name]) ? $_POST[$name] : '';
    echo "<pre>true " .
        "<textarea name='$name' placeholder='shell表达式片段' rows='1'>$param</textarea>" .
        " echo \$flag[" . ($i - 1) . "]</pre>";
    if ($param === '') {
    } else {
        $code[] = $param;
        if (count(array_unique($code)) !== count($code)) {
            $code = array_unique($code);
            echo '<pre>在true语句期间不可重复使用相同方法</pre>';
        } else {
            $result = shell_exec("true $param echo '{$flag[$i-1]}'");
            if ($result !== null) {
                $success = trim($result) === $flag[$i - 1];
                echo ($success ? "<pre style='color: #40a02b'>" : "<pre>") . $result . "</pre>";
            }
        }
    }
}

$code = array();
for ($i=14; $i <= 18;$i++) {
    $name = "code$i";
    $param = isset($_POST[$name]) ? $_POST[$name] : '';
    echo "<pre>false " .
        "<textarea name='$name' placeholder='shell表达式片段' rows='1'>$param</textarea>" .
        " echo \$flag[" . ($i - 1) . "]</pre>";
    if ($param === '') {
    } else {
        $code[] = $param;
        if (count(array_unique($code)) !== count($code)) {
            $code = array_unique($code);
            echo '<pre>在true语句期间不可重复使用相同方法</pre>';
        } else {
            $result = shell_exec("false $param echo '{$flag[$i-1]}'");
            if ($result !== null) {
                $success = trim($result) === $flag[$i - 1];
                echo ($success ? "<pre style='color: #40a02b'>" : "<pre>") . $result . "</pre>";
            }
        }
    }
}

echo "<input type='submit' value='提交' />";
echo "</form>";

echo substr($flag, 18);
