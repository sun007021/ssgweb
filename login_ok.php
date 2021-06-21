<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <?php 
            $conn=mysqli_connect("localhost", "root", "kk5144", "webproject", 3306);

            $lid=$_POST['id'];
            $lpw=$_POST['pw'];

            $sql="SELECT*FROM member WHERE memberid='{$lid}'";
            $result=mysqli_query($conn, $sql);

            $row=mysqli_fetch_array($result);
            $hashedpassword=$row['password'];
            $row['memberid'];

            $passwordresult=password_verify($lpw,$hashedpassword);
            if($passwordresult === true){
                session_start();
                $_SESSION['memberid']=$row['memberid'];
                print_r($_SESSION);
                echo $_SESSION['memberid'];

            
        ?>
        <script>
            alert("로그인 성공")
            location.href="board.php";
        </script>
        <?php
            } else{ 
        ?>
        <script>
        alert("로그인에 실패하였습니다");
        </script>
        <?php
         }
        ?>
    </body>
</html>