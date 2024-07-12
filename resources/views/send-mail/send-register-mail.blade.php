<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send Mail</title>
    <style>
        .button_interested button{
            padding: 9px;
            background-color: blue;
            color:white;
            font-weight: 600;
            border: none;
            margin-top:50px;
        }
        .textcenter{
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="content">
            <h3 > Welcome </h3>
            <p>Dear {{$name}},</p>
        
            <p>Thanks you registering with us, We have exited for you to join with us, Please confirm your interest.</p> 
        </div>
        <div class="button_interested">
            
            <a href="{{ url('create-credentials/'.$id) }}"><button> Please confirm your interested </button></a>
        </div>
    </div>

   
    
</body>
</html>