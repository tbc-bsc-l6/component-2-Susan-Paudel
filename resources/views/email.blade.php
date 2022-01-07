<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email send</title>
    <style>
        .container_email{
            margin:0px auto;
            text-align: center;
            border:1px solid black;
            border-radius: 20px;
            padding:20px;
            width:60%;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        .body_email{
            padding-top: 20px;
            padding-bottom:20px;
        }
        .header_email{
            font-weight: bolder;
            margin-bottom:10px;
        }
        </style>
</head>
<body>
    <div class="container_email">
        <h1>Hello Admin</h1>
        <div class="body_email">
            <span class="header_email">Email received from:</span><br>
            <span>{{ $fullname }}</span><br>
        
            <h3>User information:</h3><br>
            
            
                <span class="header_email">Name: </span><br>
                <span>{{ $fullname }}</span><br>
                    <span class="header_email">Email: </span><br>
                    <span>{{ $email }}</span><br>
                        <span class="header_email">Subject: </span><br>
                        <span>{{ $title }}</span><br>
                            <span class="header_email">Message:</span><br>
                            <span>{{ $form_message }}</span><br>
        </div>
       
        
       <h2> Thank you</h2>
    </div>
    
</body>
</html>






