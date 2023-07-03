<?php
include ('config.php');
function executeQuery($conn,$strSql,$msg){
    try{
        if($conn->query($strSql)){
            echo($msg);
        }else{
            echo("Error".$strSql."<br>".$conn->connect_error);
        }
    }
    catch(Exception $ex){
        echo 'Caught exception: ',  $ex->getMessage(), "\n";
    }
}
// $strSql="create table user(user_id int(6) UNSIGNED Auto_increment Primary Key,first_name varchar(30),last_name varchar(30),email varchar(50),created_at TIMESTAMP default CURRENT_TIMESTAMP)";
// executeQuery($conn,$strSql,"Table created sucessfully");

// for($i=1;$i<=5;$i++){
//     $strSql="Insert into user(first_name,last_name,email)values(\"testUser$i\",\"lastUser$i\",\"testUser$i@gmail.com\")";
//     executeQuery($conn,$strSql, ($i==5)?"Users created sucessfully\n":"");
//     $last_id = $conn->insert_id;
//     echo "User Inserted With Id:".$last_id ."\n";
// }
// $strSql="";
// for($i=1;$i<=5;$i++){
//     $strSql.="Insert into user(first_name,last_name,email)values(\"testUser$i\",\"lastUser$i\",\"testUser$i@gmail.com\");";
// }
// if($conn->multi_query($strSql)===true){
//     echo"New Records created sucessfully";
// }
$strsql="select * from user order by first_name,last_name";
$result=$conn->query($strsql);
if($result->num_rows>0){
    while($row=$result->fetch_assoc()){
        echo "id:  " . $row["user_id"]. " - Name:  " . $row["first_name"]. "  " . $row["last_name"]. "  ". $row["email"]."<br>";
    }
} else {
    echo "0 results";
}

// $strsql="delete from user where first_name='testUser\$i'";
// executeQuery($conn,$strsql,"Data Deleted sucessfully");

$strsql="update user set first_name='testUser11' where user_id=6";
executeQuery($conn,$strsql,"Data Updated sucessfully");

$conn->close();
?>
<html>
    <body>
        
    </body>
</html>
