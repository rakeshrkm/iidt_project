<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify Email</title>
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
            <p>He wants to contact you name is {{$name}},</p>
            <h4>Contact details - </h4> 
            <p>Name- {{$name}}</p>
            <p>Email- {{$email}}</p>
            <p>Mobile- {{$mobile}}</p>
            <p>Message- {{$remarks}}</p>

            <br>
            <br>

            <p>Regards,</p>
            <p>{{$name}}</p>
        </div>
    </div>
</body>
</html>