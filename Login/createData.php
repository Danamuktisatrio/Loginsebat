<?php
require_once 'connection.php';

if ($con){
    $username = $_POST ['username'];
    $email = $_POST ['email'];
    $password = $_POST ['password'];

    $insert ="INSERT INTO user(username, email, password) VALUES('$username', '$email', '$password') ";

    if ($username != "" && $email != "" && $password != ""){
        $result = mysqli_query($con, $insert);
        $response = array();

        if ($result){
            array_push($response, array('status'=> 'OK'));
        }else {
            array_push($response, array('status'=> 'FAILED'));
        }
        
    }else{
        array_push($response, array('status'=> 'FAILED'));
    }  
}else {
    array_push($response, array('status'=> 'FAILED'));
}
echo json_encode(array("server_response" => $response));
mysqli_close($con);

?>