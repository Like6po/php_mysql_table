<?php
include  "database.php";
$table_obj = new CProducts();
$table_len = $table_obj->get_len_table()[0][0];
$data = $table_obj->get_data($table_len);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная</title>
    <!--
    <script>
        function hide_row(row_number) {
            document.getElementById("table_db").rows[row_number+1].style.display = "none";
        }
    </script>
    -->

    <script
            src="https://code.jquery.com/jquery-1.12.3.min.js"
            integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ="
            crossorigin="anonymous">

    </script>

    <script type="text/javascript">
           function hide_row(row_number, id){

               document.getElementById("table_db").rows[row_number].style.display = "none";

               $.ajax({
                   url:"script_hide_row.php", //the page containing php script
                   data: {'id': id},
                   type: "POST", //request type
                   success:function(result){alert(result);}
               });
           }

           function rem_row(){

               let len_table = document.getElementById("len_table");

               var table = document.getElementById("table_db");
               var rows_count = table.rows.length;
               if (rows_count <= 2){
                   alert("В таблице должна быть минимум 1 строка!");
                   return
               }

               if (rows_count >= Number(len_table.textContent)+1) {
                   table.deleteRow(rows_count - 1);
               }

               len_table.textContent = (Number(len_table.textContent) - 1).toString();

               $.ajax({
                   url:"script_change_count_row.php", //the page containing php script
                   data: {'action': '-'},
                   type: "POST", //request type
                   success:function(result){}
               });

           }

           function add_row(){

               let len_table = document.getElementById("len_table");

               len_table.textContent = (Number(len_table.textContent) + 1).toString();

               $.ajax({
                   url:"script_change_count_row.php", //the page containing php script
                   data: {'action': '+', 'len': Number(len_table.textContent)+1},
                   type: "POST", //request type
                   success:function(data){
                       let table = document.getElementById('table_db');

                       table.innerHTML = '';

                       let tr = document.createElement('tr');
                       tr.innerHTML = "<th>"+"ID"+"</th>";
                       tr.innerHTML += "<th>"+"PRODUCT_ID"+"</th>";
                       tr.innerHTML += "<th>"+"PRODUCT_NAME"+"</th>";
                       tr.innerHTML += "<th>"+"PRODUCT_PRICE"+"</th>";
                       tr.innerHTML += "<th>"+"PRODUCT_ARTICLE"+"</th>";
                       tr.innerHTML += "<th>"+"PRODUCT_QUANTITY"+"</th>";
                       tr.innerHTML += "<th>"+"DATE_CREATE"+"</th>";
                       tr.innerHTML += "<th>" + "</th";
                       table.append(tr);


                       for (let i = 0; i < Number(len_table.textContent); i+=1){
                           result = eval(data);




                           if (i<result.length) {
                               let tr = document.createElement('tr');
                               tr.innerHTML = "<th>"+result[i][0]+"</th>";
                               tr.innerHTML += "<th>"+result[i][1]+"</th>";
                               tr.innerHTML += "<th>"+result[i][2]+"</th>";
                               tr.innerHTML += "<th>"+result[i][3]+"</th>";
                               tr.innerHTML += "<th>"+result[i][4]+"</th>";
                               tr.innerHTML += "<th>"+result[i][5]+"</th>";
                               tr.innerHTML += "<th>"+result[i][6]+"</th>";
                               tr.innerHTML += "<th>" + "<button>" + "Скрыть" + "</button>"+ "</th";
                               table.append(tr);
                           }
                       }

                   }

               });


           }

    </script>


</head>
<body>
<table id="table_db" border="1">
    <tr>
        <th>ID</th>
        <th>PRODUCT_ID</th>
        <th>PRODUCT_NAME</th>
        <th>PRODUCT_PRICE</th>
        <th>PRODUCT_ARTICLE</th>
        <th>PRODUCT_QUANTITY</th>
        <th>DATE_CREATE</th>
        <th></th>
    </tr>
<?php
for ($i=0;$i<count($data);$i+=1){
    if ($data[$i]["IS_HIDDEN"] == false){
        echo "<tr>";
        echo "<th>" . $data[$i]["ID"] .  "</th>";
        echo "<th>" . $data[$i]["PRODUCT_ID"] . "</th>";
        echo "<th>" . $data[$i]["PRODUCT_NAME"] . "</th>";
        echo "<th>" . $data[$i]["PRODUCT_PRICE"] . "</th>";
        echo "<th>" . $data[$i]["PRODUCT_ARTICLE"] . "</th>";
        echo "<th>" . $data[$i]["PRODUCT_QUANTITY"] . "</th>";
        echo "<th>" . $data[$i]["DATE_CREATE"] . "</th>";
        $id = $data[$i]["ID"];
        echo "<th> <button name=\"btn_hide_row\" onclick=\"hide_row($i+1, $id)\">Скрыть</button> </th>";
        echo "</tr>";
    }
}
?>
</table>
<br>
<?php
echo "<p3>Изменить количество строк в таблице</p3> (";
echo "<p3 id='len_table'>$table_len</p3>";
echo "<p3>) : </p3>";
echo "<button name=\"btn_add_row\" onclick=\"add_row()\">+</button>";
echo "<button name=\"btn_rem_row\" onclick=\"rem_row()\">-</button>";
?>


</body>
</html>
