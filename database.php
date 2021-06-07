<?php
/*
$connect = mysqli_connect("127.0.0.1", "root", "1234", "some_test_db", "3306");

if ($connect == false){
    echo 'Нет подключения к базе данных<br>';
}
else {
    echo 'Всё ок!<br>';
}

$query = mysqli_query($connect, 'CREATE TABLE IF NOT EXISTS 
                                             Products (ID INT AUTO_INCREMENT PRIMARY KEY,
                                                       PRODUCT_ID INT,
                                                       PRODUCT_NAME VARCHAR(128),
                                                       PRODUCT_PRICE INT,
                                                       PRODUCT_ARTICLE VARCHAR(128),
                                                       PRODUCT_QUANTITY INT,
                                                       DATE_CREATE DATETIME DEFAULT NOW())');
mysqli_commit($connect);


function get_data ($count){
    global $connect;
    $query = mysqli_query($connect, "SELECT * FROM Products ORDER BY DATE_CREATE DESC");
    $result = array();
    $i = 0;
    while ($row = mysqli_fetch_assoc($query)){
        if ($i>=$count) {
            break;
        }
        array_push($result, $row);
        $i+=1;
    }
    return $result;
}
*/

class CProducts {
    private $connect;

    public function __construct(){
        $this->connect = mysqli_connect("127.0.0.1", "root", "1234", "some_test_db", "3306");
        /*mysqli_query($this->connect,  'CREATE TABLE IF NOT EXISTS
                                             Products (ID INT AUTO_INCREMENT PRIMARY KEY,
                                                       PRODUCT_ID INT,
                                                       PRODUCT_NAME VARCHAR(128),
                                                       PRODUCT_PRICE INT,
                                                       PRODUCT_ARTICLE VARCHAR(128),
                                                       PRODUCT_QUANTITY INT,
                                                       DATE_CREATE DATETIME DEFAULT NOW(),
                                                       IS_HIDDEN BOOL DEFAULT FALSE)');
        mysqli_commit($this->connect);*/
    }

    public function get_data ($count) {
        $query = mysqli_query($this->connect, "SELECT * FROM Products ORDER BY DATE_CREATE DESC");
        $result = array();
        $i = 0;
        while ($row = mysqli_fetch_assoc($query)){
            if ($i>=$count) {
                break;
            }
            array_push($result, $row);
            $i+=1;
        }
        return $result;
    }

    public function set_hide($id) {
        $statement = $this->connect->prepare("UPDATE Products SET IS_HIDDEN=1 WHERE ID=?");
        $statement->bind_param("i", $id);
        $statement->execute();
        mysqli_commit($this->connect);

    }

    public function get_len_table() {
        $query = mysqli_query($this->connect, "SELECT len FROM table_info");
        return mysqli_fetch_all($query);
    }

    public function len_table_reduce() {
        mysqli_query($this->connect, "UPDATE table_info SET len=len-1");
        mysqli_commit($this->connect);
    }

    public function len_table_add() {
        mysqli_query($this->connect, "UPDATE table_info SET len=len+1");
        mysqli_commit($this->connect);
    }

}


