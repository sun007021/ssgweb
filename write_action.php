<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <?php 
            $conn=mysqli_connect("localhost","sun","kk514400","webproject");
            $id=$_POST['name'];
            $title=$_POST['title'];
            $content=$_POST['content'];

            if(!isset($_FILES['b_file'])){
                $sql="INSERT into board (title, content, id)
                VALUES('{$title}','{$content}','{$id}')";
            }
            //파일
            else {
            //$ext_str = "hwp,xls,doc,xlsx,docx,pdf,jpg,gif,png,txt,ppt,pptx";
            //$allowed_extensions = explode(',', $ext_str);
           // $max_file_size = 5242880;
           // $ext = substr($file['name'], strrpos($file['name'], '.') + 1);

            $tmpfile=$_FILES['b_file']['tmp_name'];
            $o_name=$_FILES['b_file']['name'];
            $filename=iconv("UTF-8", "EUC_KR",$_FILES['b_file']['name']);
            
            
            $namearr=explode(".", $o_name);
            $ext=$namearr[sizeof($namearr)-1];

            $tmp_filename = time() . '_' . mt_rand(0,99999) . '.' . strtolower($extension);
            $thumbnail_file = $real_filename . '@@@' . $tmp_filename;
            $folder="../upload/".$thumbnail_file;
            move_uploaded_file($tmpfile,$folder);

            $sql="INSERT into board (title, content, id, file, savefile)
                VALUES('{$title}','{$content}','{$id}','{$o_name}','{$thumbnail_file}')";  
            }
           
            
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