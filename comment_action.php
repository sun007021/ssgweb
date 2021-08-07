<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <?php 
            session_start();
            $conn=mysqli_connect("localhost","sun","kk514400","webproject");
            $id=$_SESSION['memberid'];
            #$date=$_GET['date'];
            $content=$_GET['comment_content'];
            $no=$_GET['no'];
            #$sql="INSERT into comment (userid, content, date, board_no)
                #VALUES('{$id}','{$content}','{$date}','{$no}')";
            $sql="INSERT into comment (board_no, userid, content)
                VALUES('{$no}','{$id}','{$content}')";

            $result=mysqli_query($conn, $sql);
            if($result === false){
                echo "오류 발생";
                error_log(mysqli_error($conn));
            }
            else{
                ?>
                <script>
                   alert("댓글이 등록되었습니다")
                   histroy.go(-1);
                </script>
                   
           <?php 
           }
        ?>
    </body>
</html>