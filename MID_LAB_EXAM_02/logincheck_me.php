

<?php

session_start();


if(isset($_POST['submit_l'])){ 

$username=trim($_POST['name_l']);
$password=trim($_POST['pass_l']);
$user_type=trim($_POST['user_type_r']);

if($username == null || empty($password)){
    echo "Null username/password";
}

else if($_SESSION['id_r']==$username && $_SESSION['pass_r']==$password){

  if(isset($_POST['user_type_r']) ){

    if($user_type=='admin'){
    header('location:admin_me.php');
    }
    else if($user_type=='user'){
        header('location:user_me.php');

    }

}else{
    echo 'Define User Type';
}
}


else{

    echo "Please submit correct information";
}


}

else{

    header('location:login.php');
}



?>