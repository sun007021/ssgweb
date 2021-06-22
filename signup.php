<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
    <?php 
    $conn=mysqli_connect("localhost","root","kk5144","webproject",3306);

    $hashedpassword=password_hash($_POST['joinpw'], PASSWORD_DEFAULT);
   
   $sql="INSERT INTO member (memberid,name,nickname,password)
   VALUES('{$_POST['joinid']}','{$_POST['username']}','{$_POST['nickname']}','{$hashedpassword}')";
   
  
    $result=mysqli_query($conn, $sql);
    echo $sql;
    echo $result;

    if($result === false){
        echo "오류 발생";
        error_log(mysqli_error($conn));
    }
    else{
        echo "성공";    
    }
    ?>
    </body>

</html>