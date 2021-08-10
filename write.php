<!DOCTYPE html>
<html>
<head></head>
<body>
<?php
    session_start();
    
?>
    <form method = "post" action = "write_action.php" enctype="multipart/form-data">
    <table  style="padding-top:50px" align = center width=700 border=0 cellpadding=2 >
    <tr>
    <td height=20 align= center bgcolor=#ccc><font color=white> 글쓰기</font></td>
    </tr>
    <tr>
    <td bgcolor=white>
    <table class = "table2">
        <tr>
        <td>작성자</td>
        <td><input type="hidden" name="name" value="<?=$_SESSION['memberid']?>"><?=$_SESSION['memberid']?></td>
        </tr>

        <tr>
        <td>제목</td>
        <td><input type = text name = title size=60></td>
        </tr>

        <tr>
        <td>내용</td>
        <td><textarea name = content cols=85 rows=15></textarea></td>
        </tr>

        </table>
        <div>
            <input type="file" value="1" id="b_file" name="b_file"/>
        </div>
            <center>
        <input type = "submit" value="작성">
        </center>
        </td>
        </tr>
        </table>
    </form>
</body>
</html>



