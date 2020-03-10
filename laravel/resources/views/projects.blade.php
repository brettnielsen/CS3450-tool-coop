@section('title', 'Projects')

@extends('layouts.basic')

@section('content')

    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Projects</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
    <style>

        .bottomSpace {
            padding-bottom: 40px;
        }

        .font {
            font-family: "Rage Italic", serif;
        }

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
        
    </style>
    </head>

    <body>
    <div class="container">
        <h1 style="padding-left: 250px">The Walt family</h1>
        <div>
            <img height="1000" width="1400" src="systemImages/project1.jpg">
            <p class="font">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tellus in metus vulputate eu scelerisque felis. Sit amet consectetur adipiscing elit. Ut faucibus pulvinar elementum integer enim neque volutpat. Amet cursus sit amet dictum sit amet justo. Id ornare arcu odio ut sem nulla pharetra diam. Proin fermentum leo vel orci porta non. Massa tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada. Aliquet bibendum enim facilisis gravida neque convallis a cras. Quis ipsum suspendisse ultrices gravida dictum fusce ut. Penatibus et magnis dis parturient. Consectetur adipiscing elit pellentesque habitant morbi tristique senectus et netus. Imperdiet massa tincidunt nunc pulvinar sapien et ligula. Ornare quam viverra orci sagittis eu volutpat odio. Viverra nam libero justo laoreet sit amet cursus. Faucibus purus in massa tempor nec."</p>
        </div>
    </div>

    <div class="container">
        <h1 style="padding-left: 350px">The spielburg family</h1>
        <div>
            <img height="1000" width="500" src="systemImages/project2.jpg">
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tellus in metus vulputate eu scelerisque felis. Sit amet consectetur adipiscing elit. Ut faucibus pulvinar elementum integer enim neque volutpat. Amet cursus sit amet dictum sit amet justo. Id ornare arcu odio ut sem nulla pharetra diam. Proin fermentum leo vel orci porta non. Massa tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada. Aliquet bibendum enim facilisis gravida neque convallis a cras. Quis ipsum suspendisse ultrices gravida dictum fusce ut. Penatibus et magnis dis parturient. Consectetur adipiscing elit pellentesque habitant morbi tristique senectus et netus. Imperdiet massa tincidunt nunc pulvinar sapien et ligula. Ornare quam viverra orci sagittis eu volutpat odio. Viverra nam libero justo laoreet sit amet cursus. Faucibus purus in massa tempor nec."</p>
        </div>
    </div>

    <div class="container">
        <h1 style="padding-left: 250px">The Johnson family</h1>
        <div>
            <img height="1000" width="600" src="systemImages/project3.jpg">
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tellus in metus vulputate eu scelerisque felis. Sit amet consectetur adipiscing elit. Ut faucibus pulvinar elementum integer enim neque volutpat. Amet cursus sit amet dictum sit amet justo. Id ornare arcu odio ut sem nulla pharetra diam. Proin fermentum leo vel orci porta non. Massa tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada. Aliquet bibendum enim facilisis gravida neque convallis a cras. Quis ipsum suspendisse ultrices gravida dictum fusce ut. Penatibus et magnis dis parturient. Consectetur adipiscing elit pellentesque habitant morbi tristique senectus et netus. Imperdiet massa tincidunt nunc pulvinar sapien et ligula. Ornare quam viverra orci sagittis eu volutpat odio. Viverra nam libero justo laoreet sit amet cursus. Faucibus purus in massa tempor nec."</p>
        </div>
    </div>
    </body>

@endsection
