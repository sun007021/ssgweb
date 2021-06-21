<!DOCTYPE html>
<html>
    <head>
    
    </head>
    <body>
        <?php 
            $conn=mysqli_connect("localhost","root","kk5144","webproject");
            $id=$_GET['id'];
            $no=$_GET['no'];
            $sql="SELECT title, content, id from board where no=$no";
            $result=mysqli_query($conn,$sql);
            

            $title=$row['title'];
            $content = $row['content'];
            $memberid = $row['id'];

            session_start();
            if($_SESSION['memberid']==$memberid){
        ?>
        <form method = "get" action = "modify_action.php">
        <table  style="padding-top:50px" align = center width=700 border=0 cellpadding=2 >
            <tr>
                <td height=20 align= center bgcolor=#ccc><font color=white> 글수정</font></td>
            </tr>
            <tr>
                <td bgcolor=white>
            <table class = "table2">
            <tr>
                <td>작성자</td>
                <td><input type="hidden" name="id" value="<?=$_SESSION['memberid']?>"><?=$_SESSION['memberid']?></td>
                </tr>

                <tr>
                <td>제목</td>
                <td><input type = text name = title size=60 value="<?=$title?>"></td>
                </tr>

                <tr>
                <td>내용</td>
                <td><textarea name = content cols=85 rows=15><?=$content?></textarea></td>
                </tr>

                </table>

                <center>
                <input type="hidden" name="no" value="<?=$no?>">
                <input type = "submit" value="수정">
                </center>
                </td>
                </tr>
            </table>
            </form>
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