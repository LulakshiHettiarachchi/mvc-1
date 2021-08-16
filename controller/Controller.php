

<?php

//public $visible_para;
require "../model/model.php";
$DB = new DB();

$results = $DB -> select(
    "SELECT * FROM `users1` WHERE `name` LIKE ?",
    ["%{$_POST['search']}%"]
);

//output
echo json_encode(count($results)==0 ? null: $results);
?>