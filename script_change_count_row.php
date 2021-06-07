<?php

$action = $_POST['action'];

include  "database.php";

switch ($action){
    case '-':
        (new CProducts)->len_table_reduce();
        break;

    case '+':
        $db = new CProducts;
        $db->len_table_add();

        $len = $_POST['len'];

        $data = $db->get_data($len);

        $json_data = array();

        for ($i=0;$i<count($data);$i+=1){
        if ($data[$i]["IS_HIDDEN"] == false){

            array_push($json_data, array());
            array_push($json_data[$i], $data[$i]["ID"]);
            array_push($json_data[$i], $data[$i]["PRODUCT_ID"]);
            array_push($json_data[$i], $data[$i]["PRODUCT_NAME"]);
            array_push($json_data[$i], $data[$i]["PRODUCT_PRICE"]);
            array_push($json_data[$i], $data[$i]["PRODUCT_ARTICLE"]);
            array_push($json_data[$i], $data[$i]["PRODUCT_QUANTITY"]);
            array_push($json_data[$i], $data[$i]["DATE_CREATE"]);
        }
    }

        echo json_encode($json_data);

}




