<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Credentials</title>
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
        
            <p>Please fine your credentials</p>
            <p><b>Login Id -{{$email}} </b></p> 
            <p><b>Login Password - {{ $password }} </b></p> 
        </br>
        </br>
        <p>Regards</p>
        <p>Prakhar Software Solutions Pvt Ltd</p>

        </div>

    </div>

   
    
</body>
</html>