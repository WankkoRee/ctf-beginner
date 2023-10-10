<?php
if (isset($_GET["hello"]) && $_GET["hello"] === "world") {
    echo "<p>###flag###</p>";
} else {
    echo "<p>试试用GET方法向我传入一个名为hello，值为world的参数吧</p>";
}
