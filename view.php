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
            
          /* 댓글 */

            .comment_content {
                width:700px;
                height: 56px; 
            }
            .comment_write {
                margin-top:30px;
            }
            .com_bnt {
                position: absolute;
                width:100px;
                height:56px;
                font-size:16px;
                margin-left: 10px; 
                
            }
            #foot_box {
                height: 50px; 
                
            }
            .comment_view{
                width: 900px;
                margin-top: 100px;
                word-break: break-all;
            }
            .dat_view{
                font-size: 14px;
                padding: 10px 0 15px 0;
                border-bottom: solid 1px gray;
            }
            .dat_edit{
                width: 520px;
                height: 70px;
                position: absolute;
                top:40px;
            }
            .dap_lo{
                font-size: 14px;
                padding: 10px 0 15px 0;
                border-bottom: solid 1px gray;
            }
            .dap_to{
                margin-top: 5px;
            }
            
        </style>

    </head>
    <body>
        <?php 
            $conn=mysqli_connect("localhost","sun","kk514400","webproject");
            $no=$_GET['no'];
            session_start();
            $sql="SELECT title, content, id, file from board where no=$no";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);

            $sql2="SELECT userid, recontent from comment where board_no=$no";
            $result2=mysqli_query($conn,$sql2);
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
        <div>
            파일 : <a href="../upload/<?php echo $row['file'];?>" download><?php echo $row['file']; ?></a>
        </div>
 
    
        <div class="bnta">
            <button class="bnt" onclick="location.href='board.php'">LIST</button>
            <button class="bnt" onclick="location.href='modify.php?no=<?=$no?>&id=<?=$_SESSION['memberid']?>'">MODIFY</button>

            <button class="bnt" onclick="location.href='delete_action.php?no=<?=$no?>&id=<?=$_SESSION['memberid']?>'">DELETE</button>
        </div>
        <div align=center class="comment_write">
            <form action="comment_action.php" method="get">
                <div style="margin-top:10px;">
                    <input type="hidden" name="no" value="<?php echo $no;?>">
                    <textarea placeholder="댓글을 입력하세요." class="comment_content" name="comment_content"></textarea>
                    <input type="submit" class="com_bnt" value="등록">
                </div>
            </form>
        </div>
        <hr align="center" style="width:1000px;">
        <!--<div class="comment_view"> -->
            <!--댓글 목록-->
            <?php
                while($row2=mysqli_fetch_assoc($result2)){
            ?>
            <div class="dap_lo">
                <div><b><?php echo $row2['userid'];?></b></div>
                <div class="dap_to"><?php echo $row2['recontent'];?></div>
            </div>
            <?php }?>
        <!--</div> ef-->

    </body>
</html>