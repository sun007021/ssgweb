<!DOCTYPE html>
<html>
    <head>
    <style>
    ul{
        list-style:none;
    }
    label {
    
    display: inline-block;
    width: 90px;
    text-align: right;
    }

    input{  
        font: 1em sans-serif;
        width: 300px;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        border: 1px solid #999;
    }
    </style>
    </head>
    <body>
       <form action="signup.php" method="POST">
           <fieldset>
               <legend>회원가입</legend>
               <ul id="sign up">
                   <li>
                    <label for="joinid">ID</label>
                    <input type="text" name="joinid" autofocus required>
                   </li>
                   <li>
                    <label for="username">이름</label>
                    <input type="text" name="username" required>
                    </li>
                    <li>
                        <label for="joinpw">PW</label>
                       <input type="password" name="joinpw" required>
                    </li>
                    <li>
                    <label for="nickname">닉네임</label>
                    <input type="text" name="nickname" required>
                    </li>


               </ul>
           </fieldset>
           <div>
               <input type="submit" value="가입">
               <input type="reset" value="취소">
            </div>
       </form>
    </body>
</html>