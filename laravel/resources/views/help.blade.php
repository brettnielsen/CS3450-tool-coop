<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Contact Us</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .content {
            text-align: center;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

    </style>
</head>
<body>
<div class="flex-center position-ref full-height">

    <div class="content">
        <h1>
            Contact Us
        </h1>

        <h2>
            Email us
        </h2>
        <div class="content">
            Name:<br>
            <input type=”text” size=”24″ name=”VisitorName”><br><br>
            Message:<br> <textarea name=”VisitorComment” rows=”4″ cols=”20″> </textarea><br><br>
            <button type=”button” onclick="alert('message submitted')">Submit</button>
        </div>
        <h2>
            Find us
        </h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d95259.41880907136!2d-111.91084377426796!3d41.745180716422965!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87547de05542a865%3A0xa9b33d0bcbbebcd5!2sLogan%2C%20UT!5e0!3m2!1sen!2sus!4v1583446638749!5m2!1sen!2sus" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

        <div class="links">
            <a href="/item/index">Item Catelog</a>
            <a href="/terms">Terms and Agreements</a>
            <a href="/welcome">Welcome</a>
        </div>
    </div>
</div>
</body>
</html>
