<?php
if (isset($_POST["hello"]) && $_POST["hello"] === "world") {
    echo "<p>###flag###</p>";
} else {
    echo "<p>试试用POST方法向我传入一个名为hello，值为world的参数吧</p>";
}
