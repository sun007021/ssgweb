<!DOCTYPE html>
<html>
 <head>
     <style>
         h1{
             text-align:center;
         }
        form {
        
        margin: 0 auto;
        width: 450px;
        padding: 1em;
        border: 1px solid #CCC;
        border-radius: 1em;
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
        .button{
            padding-left: 90px; 
        }

        button {
            margin-left: .5em;
        }
     </style>
 </head>
 <body>
    <div id="login_box">
        <h1>LOGIN</h1>
        <form name=frm1 action="login_ok.php" method="POST" clsaa="form">
            <div>
                <label for="id">ID</label>
                <input type="text" name="id" maxlength="20" autofocus>
            </div>
            <div>
            <label for="pw">PW</label>
            <input type=password name="pw" maxlength="20">
            </div>
            <div class="button">
                <button type="submit">LOGIN</button>
            </div>
            <div class="button">
            <button type="button" onclick="location.href='join.php'">JOIN</button>
            </div>
        </form>
        
    </div>
 </body>
</html>