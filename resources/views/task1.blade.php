<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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
                margin-bottom: 100px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="top-right links">
                    <a href="#">Rafly Lesmana Putra</a>
            </div>

            <div class="content">
                <div class="title m-b-md">
                    Task 1
                </div>
                <div class="m-b-md">
                    @if(isset($secondlargest))
                        <span style="font-size:60px;color:green;">{{$secondlargest}}</span><br>
                        <span style="font-size:20px">{{$number}} </span>
                    @else
                        masukkan deretan angka secara acak
                    @endif
                </div>
                <div class="links">
                    <form action="{{url('/number')}}" method="get">
                        <input type="text" name="numbers" id="numbers" placeholder="eg: 5,5,1,6,4,3">
                        <button type="submit">ok</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
