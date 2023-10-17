<?php
highlight_file(__FILE__);


$id = isset($_GET['id']) ? trim($_GET['id']) : '';
if ($id !== '') {
    $conn = new mysqli("localhost", "root", "", "web", 0, '/var/run/mysqld/mysqld.sock');
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    }
    $sql="SELECT * FROM users WHERE id='$id' LIMIT 0,1";
    $result = $conn->query($sql);
    $row = $result->fetch_array();
    if ($row) {
        echo 'Your Login name:'. $row['username'];
        echo "<br>";
        echo 'Your Password:' .$row['password'];
    } else {
        echo '出错了: ' . $conn->error;
    }
    $conn->close();
}
