
@section('title', 'Information')


@extends('layouts.app')

@section('cardTitle', 'Information')


@section('content')

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

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
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

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>

<div class="flex-center position-ref full-height" style="padding: 15px;">

    <div style="text-align: center; list-style-position: inside;">
        <h2>Contact info</h2>
        <ul>
            <li>Location: 852 MapleBerry Drive</li>
            <li>Phone number: (435) 777-4568 </li>
            <li>Email: toolCoopLuvs@gmail.com</li>
        </ul>
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

    </div>

    <div class="content" style="margin-top: 25px;">
        <div style="text-align: center;">
            <h1>Common Questions</h1>
        </div>
        <h2>How to create an account on our website</h2>
        <ol>
            <li>visit www.tool-coop.com</li>
            <li>click register in the upper right hand corner of the page</li>
            <li>fill out the required information and click create account</li>
        </ol>
        <h2>If I damage a tool when in use do I have to pay?</h2>
        <p class="containerClass">     item number two of <a href="/terms">terms and agreements</a></p>
        <h2>If I don't use computers can I still access tools from your warehouse?</h2>
        <p style="text-indent: 30px">Yes, our company exists to allow ease of access to all members of our community and we
            will do our best to give this service to all who wants it. Just come to our location and upon
            checkout of desired tools our friendly assistant will set up your account for you! He will show
            you what the app can do and you can use it in the future or always just walk in to make your desired
            checkouts!</p>
    </div>
</div>

@endsection

