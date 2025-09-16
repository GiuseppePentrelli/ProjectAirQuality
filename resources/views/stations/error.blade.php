<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Error Page</title>
    <link rel="stylesheet" href="./error_page.css" />
    <script src="https://kit.fontawesome.com/66aa7c98b3.js" crossorigin="anonymous"></script>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Poppins", sans-serif;
        }

        .container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .gif {
            display: flex;
            justify-content: center;
        }

        .content {
            text-align: center;
            margin: 3rem 0;
        }

        .content .main-heading {
            font-size: 2.5rem;
            font-weight: 700;
        }

        p {
            font-size: 1.3rem;
            padding: 0.7rem 0;
        }

        button {
            padding: 1rem;
            border-radius: 15px;
            outline: none;
            border: none;
            background: #0046d4;
            color: #fff;
            font-size: 1.3rem;
            cursor: pointer;
        }

        h1 {

            margin-top: 100px;
            text-align: center;
            font-size: 100px;
            margin-bottom: 30px;

        }
    </style>
</head>

<body>
<div class="container">
    <h1>404</h1>
    <div class="gif">
        <img src="https://i.postimg.cc/2yrFyxKv/giphy.gif" alt="{{ __('ui.gif_alt') }}" />
    </div>
    <div class="content">
        <h1 class="main-heading">{{ __('ui.page_gone') }}</h1>
        <p>
            {{ __('ui.page_not_found') }}
        </p>
        <a href="{{ route('welcome') }}" target="_blank">
            <button>{{ __('ui.back_to_home') }} <i class="far fa-hand-point-right"></i></button>
        </a>
    </div>
</div>
</body>

</html>
