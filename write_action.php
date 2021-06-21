<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <?php 
            $conn=mysqli_connect("localhost","root","kk5144","webproject");
            $id=$_GET['name'];
            $title=$_GET['title'];
            $content=$_GET['content'];

            $sql="INSERT into board (title, content, id)
                VALUES('{$title}','{$content}','{$id}')";

            $result=mysqli_query($conn, $sql);
            if($result === false){
                echo "오류 발생";
                error_log(mysqli_error($conn));
            }
            else{
                ?>
                <script>
                   alert("글이 등록되었습니다")
                    location.href="board.php";
                </script>
                   
           <?php 
           }
        ?>
    </body>
</html>