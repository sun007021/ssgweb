<!DOCTYPE html>
<html>
<head></head>
<body>
    <?php 
        $conn=mysqli_connect("localhost","sun","kk514400","webproject");
        $no=$_GET['no'];
        $title=$_GET['title'];
        $content=$_GET['content'];
        $sql="SELECT title, content, id from board where no=$no";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        $memberid = $row['id'];

        session_start();
        if($_SESSION['memberid']==$memberid){
            
            $sql2 = "DELETE from board where no=$no";
            $result2=mysqli_query($conn,$sql);
    ?>
    <script>
        alert("삭제완료");
        location.href="board.php";
    </script>
    <?php }
    else{ ?>
        <script>
             alert("권한없음");
            location.href="board.php";
            </script>
    <?php }
    ?>
</body>
</html>