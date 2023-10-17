<?php
highlight_file(__FILE__);
error_reporting(0);
mysqli_report(MYSQLI_REPORT_OFF);


$id = isset($_GET['id']) ? trim($_GET['id']) : '';
if ($id !== '') {
    $conn = new mysqli("localhost", "root", "", "web", 0, '/var/run/mysqld/mysqld.sock');
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    }
    $sql="SELECT * FROM users WHERE id='$id' LIMIT 0,1";
    $result = $conn->query($sql);
    if ($result) {
        $row = $result->fetch_array();
        if ($row) {
            echo '来啦老弟';
        } else {
            echo '没有数据';
        }
    } else {
        //echo '出错了: ' . $conn->error;
    }
    $conn->close();
}
