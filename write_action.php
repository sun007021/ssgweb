<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <?php 
            $conn=mysqli_connect("localhost","sun","kk514400","webproject");
            $id=$_POST['name'];
            $title=$_POST['title'];
            $content=$_POST['content'];

            $tmpfile=$_FILES['b_file']['tmp_name'];
            $o_name=$_FILES['b_file']['name'];
            $filename=iconv("UTF-8", "EUC_KR",$_FILES['b_file']['name']);
            $folder="../upload/{$o_name}";
            move_uploaded_file($tmpfile,$folder);

            $sql="INSERT into board (title, content, id, file)
                VALUES('{$title}','{$content}','{$id}','{$o_name}')";
            $result=mysqli_query($conn, $sql);
            
            

            
            if($result === false){
                echo "오류 발생";
                error_log(mysqli_error($conn));
            }
            else{
                ?>
                <script>
                   alert("글이 등록되었습니다.")
                    location.href="board.php";
                </script>
                   
           <?php 
           }
        ?>
    </body>
</html>