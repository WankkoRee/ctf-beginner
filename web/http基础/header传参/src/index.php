<?php
if (isset($_SERVER["HTTP_HELLO"]) && $_SERVER["HTTP_HELLO"] === "world") {
    echo "<p>###flag###</p>";
} else {
    echo "<p>试试在Header中向我传入一个名为Hello，值为world的参数吧</p>";
}
