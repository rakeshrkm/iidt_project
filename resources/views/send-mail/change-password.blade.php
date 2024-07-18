<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Change Password</title>
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
            <p>Dear {{$name}},</p>
            <p>Your password has been changed successfully</p>
            <p>Below is given your new password</p>
            <p>Password - {{ $password}}</p>
            <br>
            <br>
            <p>Regards,</p>
            <p>Indian Institute of Drone Technology</p>
        </div>
    </div>
</body>
</html>