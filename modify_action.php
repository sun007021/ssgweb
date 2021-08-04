<!DOCTYPE html>
<html>
<head></head>
<body>
    <?php 
        $conn=mysqli_connect("localhost","sun","kk514400","webproject");
        $no=$_GET['no'];
        $title=$_GET['title'];
        $content=$_GET['content'];
        $sql = "UPDATE board set title='$title', content='$content' where no=$no";
        $result=mysqli_query($conn,$sql);
        if($result){
    ?>
    <script>
        alert("수정완료");
        location.href="board.php";
    </script>
    <?php }
    else{
        echo "수정 실패";
    }
    ?>
</body>
</html>