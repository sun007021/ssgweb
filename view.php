<!DOCTYPE html>
<html>
    <head>
        <style>
            .table {
            border: 1px solid #444444;
            margin-top: 30px;
            }
            .title {
            height: 30px;
            text-align: center;
            background-color: #cccccc;
            color: white;
            width: 1000px;
            }
            .id {
            text-align: center;
            background-color: #EEEEEE;
            width: 30px;
            }
            .id1 {
            background-color: white;
            width: 60px;
            }
            .content {
            padding-top: 20px;
            border-top: 1px solid #444444;
            height: 500px;
            }
            .bnta {
            width: 700px;
            height: 100px;
            text-align: center;
            margin: auto;
            margin-top: 50px;
            }
            .bnt {
            height: 50px;
            width: 100px;
            font-size: 20px;
            text-align: center;
            background-color: white;
            border: 1px solid black;
            border-radius: 15px;
            }
          
        </style>

    </head>
    <body>
        <?php 
            $conn=mysqli_connect("localhost","sun","kk514400","webproject");
            $no=$_GET['no'];
            session_start();
            $sql="SELECT title, content, id from board where no=$no";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
            if (!isset($_SESSION['memberid'])){
                echo '로그인 해주세요';
	            exit;
            } 
        ?>
        <table class="table" align=center>
        <tr>
            <td colspan="4" class="title"><?php echo $row['title']?></td>
        </tr>
        <tr>
            <td class="id">작성자</td>
            <td class="id1"><?php echo $row['id']?></td>
        </tr>
 
 
        <tr>
            <td colspan="4" class="content" valign="top">
            <?php echo $row['content']?></td>
        </tr>
        </table>
 
 
    
        <div class="bnta">
            <button class="bnt" onclick="location.href='board.php'">LIST</button>
            <button class="bnt" onclick="location.href='modify.php?no=<?=$no?>&id=<?=$_SESSION['memberid']?>'">MODIFY</button>

            <button class="bnt" onclick="location.href='delete_action.php?no=<?=$no?>&id=<?=$_SESSION['memberid']?>'">DELETE</button>
        </div>
        <div class="comment">
            
        </div>

    </body>
</html>