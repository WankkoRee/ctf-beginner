<?php
if (isset($_COOKIE["hello"]) && $_COOKIE["hello"] === "world") {
    echo "<p>###flag###</p>";
} else {
    echo "<p>试试在Cookie中向我传入一个名为hello，值为world的参数吧</p>";
}
