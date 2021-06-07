<?php

$id= $_POST['id'];
//$id = 1;

include  "database.php";

(new CProducts)->set_hide($id);

echo "Скрыто!";

