<?php

class Database 
{
    //development conncection
//private $host = "localhost";
//private $username ="root";
//private $password = "";
//private $db = "crescendo_db";


// remote database 
private $host = "us-cdbr-east-06.cleardb.net";
private $username ="b4032afa49e446";
private $password = "332f487c";
private $db = "crescendo_db";



function connect(){
$connection = mysqli_connect($this->host, $this->username, $this->password, $this->db); 
return $connection;
}

function read($query){
$conn = $this->connect();
$result = mysqli_query($conn, $query);


if(!$result){
    return false;
} else {
    $data = false;
    while($row = mysqli_fetch_assoc($result))
{

    $data[] = $row;
    
}

return $data;
}
}

function save($query){

    $conn = $this->connect();
    $result = mysqli_query($conn, $query);

    if(!$result){
        return false;
    }else {
        return true;
    }
}
}

//$DB = new Database();
//$query = "select * from users";
//$data = $DB->read($query);
//
//echo "<pre>";
//print_r($data);
//echo "</pre>";
//
//$DB->save();

?>
