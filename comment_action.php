<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <?php 
            $conn=mysqli_connect("localhost","sun","kk514400","webproject");
            $id=$_GET['userid'];
            $date=$_GET['date'];
            $content=$_GET['content'];
            $no=$_GET['board_no'];
            $sql="INSERT into board (userid, content, date, board_no)
                VALUES('{$id}','{$content}','{$date}','{$no}')";

            $result=mysqli_query($conn, $sql);
            if($result === false){
                echo "오류 발생";
                error_log(mysqli_error($conn));
            }
            else{
                ?>
                <script>
                   alert("댓글이 등록되었습니다")
                    location.href="board.php";
                </script>
                   
           <?php 
           }
        ?>
    </body>
</html>