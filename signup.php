<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
    <?php 
    $conn=mysqli_connect("localhost","sun","kk514400","webproject",3306);

    $hashedpassword=password_hash($_POST['joinpw'], PASSWORD_DEFAULT);
    $disable_id="/[`~!@#$%^&*|\\\'\";:\/?^=^+_()<>]/";
   if(preg_match($disable_id, $_POST['joinid'])){
       echo("<script> alert('아이디에 특수문자는 사용 불가능합니다');
       history.go(-1);
       </script>");
       exit;
   }
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
        echo "<script>location.href='login.php'</script>";
    }
    ?>
    </body>

</html>
