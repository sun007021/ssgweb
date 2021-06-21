<?php 
    $conn=mysql_connect("localhost","root","kk5144","webproject",3306);

   $sql="INSERT INTO member (memberid,'name',nickname,'password')
   VALUES('{$_POST['joinid']}','{$_POST['username']}','{$_POST['nickname']}','{$_POST['joinpw']}')";
   
    $result=mysqli_query($conn, $sql);
    

    if($result === false){
        echo "오류 발생";
        error_log(mysqli_error($conn));
    }
    else{
        echo "성공";    
    }
    ?>