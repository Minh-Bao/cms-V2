<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail de contact Blog naturel coquin</title>

    <style>
        h1{
            border-bottom: 1px solid pink;
        }

    </style>
</head>
<body>
    <div>
        <H1>
            Mail de contact du blog Naturel Coquin:
        </H1>
        <hr>
        <h2 >Contact: {{$name}} </h2>
        <h2>Email du contact : {{$email}}</h2>
        <h3>Sujet: {{$subject}}</h3>    
        <hr>
        <div>
            <h3>Message :</h3> <br>
            <p>
                {{ $msg }}
    
            </p>       
        </div>    
    </div>    
</body>
</html>