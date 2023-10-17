<?php

$code = isset($_POST['code']) ? trim($_POST['code']) : '';
echo "
<form method='post'>
<textarea name='code' placeholder='执行一段sql'>$code</textarea>
<input type='submit' value='提交'>
</form>
";
if ($code !== '') {
    $conn = new mysqli("localhost", "root", "", "flag", 0, '/var/run/mysqld/mysqld.sock');
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    }
    $result = $conn->query($code);
    if ($result->num_rows > 0) {
        echo '<table border="1">';
        echo '<tr>';
        while ($fieldinfo = $result->fetch_field()) {
            echo '<th>' . $fieldinfo->name . '</th>';
        }
        echo '</tr>';
        while($row = $result->fetch_assoc()) {
            echo '<tr>';
            foreach ($row as $value) {
                echo '<td>' . $value . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo "无执行结果";
    }
    $conn->close();
}
