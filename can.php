<?php

define('TABLE_NAME','acd-statics');
define('ID','id');
define('NAME','name');
define('TIMES','times');
define('DB_USER','root');
define('DB_PWD','');
define('DB_NAME','name');

$serialnumber= $_POST['serialnumber'];
$pc_name = $_POST['pc-name'];

$conn = new mysqli('localhost',DB_USER,DB_PWD,DB_NAME);
if ($conn){
    $sql = "SELECT * FROM ".TABLE_NAME." WHERE ".ID."=$serialnumber AND ".NAME."='$pc_name';";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $row[TIMES] = $row[TIMES]+1;
        $sql = "UPDATE ".TABLE_NAME." SET ".TIMES."=".$row[TIMES]." WHERE ".ID."=$serialnumber AND ".NAME."='$pc_name'";
        if($conn->query($sql) === true){
            return json_encode([
                'status' => 200,
                'message' => 'update successful'
            ]);
        }else{
            return json_encode([
                'status' => 400,
                'message' => 'update failure'
            ]);
        }
    }else{
        $sql = "INSERT INTO ".TABLE_NAME." (".ID.",".NAME.",".TIMES.") VALUES (".$serialnumber.",'".$pc_name."',0)";
        if($conn->query($sql) === true){
            return json_encode([
               'status' => 200,
               'message' => 'insert successful'
            ]);
        }else{
            return json_encode([
                'status' => 400,
                'message' => 'insert failure'
            ]);
        }
    }
}else{
    return json_encode([
        'status' => 400 ,
        'message' => 'connect failure'
    ]);
}

?>