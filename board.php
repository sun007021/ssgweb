<?php 
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    <style>
        .loginedid{
            color: red;
            position:absolute;
            top:0;
            right: 10px;
        }
        table{
                border-top: 1px solid #444444;
                border-collapse: collapse;
        }
        tr{
                border-bottom: 1px solid #444444;
                padding: 10px;
        }
        td{
                border-bottom: 1px solid #efefef;
                padding: 10px;
                align: center;
        }
        table .even{
                background: #efefef;
        }
        .bnt{
                text-align:center;
                padding-top:30px;
                color:#000000
        }
        .bnt:hover{
                text-decoration: underline;
        }
        a:link {color : #57A0EE; text-decoration:none;}
        a:hover { text-decoration : underline;}
    </style>
    </head>
    <body>
    <?php 
        $conn=mysqli_connect("localhost","root","kk5144","webproject");
        $sql="SELECT*from board order by no desc";
        $result=mysqli_query($conn,$sql);
        $total=mysqli_num_rows($result);
        ?>
        <div class=loginedid>
            <?php 
            echo "접속 ID: {$_SESSION['memberid']}";
            ?>
            <button type="button" onclick="location.href='logout.php'">로그아웃</button>
        </div>
        <h1 align=center>게시판</h1>
        <table align=center>
        <thead align=center>
        <tr>
            <td width="100" >NO</td>
            <td width = "500">제목</td>
            <td width = "100">작성자</td>
        </tr>
        </thead>
        <tbody>
            <?php 
                while ($row=mysqli_fetch_assoc($result)){
                    if($total%2==0){
                        ?>
                        <tr class=even>
                        <?php
                     } else{ ?>
                        <tr>
                        <?php } ?>
                
                    
                
                <td width = "50"><?php echo $total?></td>
                <td width = "500">
                <a href = "view.php?no=<?php echo $row['no']?>">
                <?php echo $row['title']?></td>
                  <td width = "100" ><?php echo $row['id']?></td>
                  
                </tr>

            <?php
                $total--;
             }
            ?>
        </tbody>
        </table>
        
        <div class=bnt>
        <button type="button" onclick="location.href='write.php'">글쓰기</button>
        </div>
    </body>
</html>
