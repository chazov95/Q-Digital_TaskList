<?php
$link = mysqli_connect("mysql", "db", "db", "db");
$query = mysqli_query($link, "show tables in db");
print_r($query);