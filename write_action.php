<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <?php 
            $conn=mysqli_connect("localhost","sun","kk514400","webproject");
            $id=$_POST['name'];
            $title=$_POST['title'];
            $content=$_POST['content'];

	    $o_name=$_FILES['b_file']['name'];

            if($o_name !="" && isset($_FILES['b_file'])) {
            $ext_str = "hwp,xls,doc,xlsx,docx,pdf,jpg,gif,png,txt,ppt,pptx";
            $allowed_extensions = explode(',', $ext_str);
           // $max_file_size = 5242880;
           // $ext = substr($file['name'], strrpos($file['name'], '.') + 1);

           $tmpfile=$_FILES['b_file']['tmp_name'];
           
           $filename=iconv("UTF-8", "EUC_KR",$_FILES['b_file']['name']);
           
           $namearr=explode(".", $o_name);
           $ext=$namearr[sizeof($namearr)-1];

           if( !in_array($ext,$allowed_extensions)){
                echo ("
                <script> alert('업로드 가능한 확장자 파일이 아닙니다.');
                history.go(-1);
                </script>");
                exit;
           }

           $tmp_filename = time() . '_' . mt_rand(0,99999) . '.' . strtolower($ext);
           $thumbnail_file = $o_name . '@@@' . $tmp_filename;
           $folder="upload/".$thumbnail_file;
           move_uploaded_file($tmpfile,$folder);

            $sql="INSERT into board (title, content, id, file, savefile)
                VALUES('{$title}','{$content}','{$id}','{$o_name}','{$thumbnail_file}')";  
            }
            else {
                $sql="INSERT into board (title, content, id)
                VALUES('{$title}','{$content}','{$id}')";
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
