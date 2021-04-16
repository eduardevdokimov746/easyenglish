<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
        }

        #mail{
            max-width: 600px;
            font-family: sans-serif;
            margin: 0 auto;
            border: 1px solid silver;
            border-radius: 5px;
        }

        #header{
            background: #3369e7;
            border-radius: 5px 5px 0 0;
        }

        #head-content{
            padding: 0 20px;
        }

        #head-content > h1{
            padding-top: 15px;
            padding-bottom: 9px;
        }

        #header-logo{
            max-width: 250px;
            text-decoration: none;
            color: white;
        }

        #header-logo > img{
            width: 45px;
            border-radius: 50%
        }

        #header-logo > span{
            text-decoration: none;
        }

        #body{
            padding: 20px;
        }

        #body h3{
            margin: 10px 0;
            font-size: 20px;
        }

        #body > p{
            line-height: 22px;
            font-size: 16px;
        }

        #body > a{
            display: block;
            width: 200px;
            background: #0280e1;
            padding: 20px;
            font-size: 1.3em;
            text-decoration: none;
            text-align: center;
            margin: 0 auto;
            border-radius: 5px;
            margin-top: 40px;
            color: white;
        }

        #body > p > a{
            color: #0280e1;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div id='mail'>
    <div id='header'>
        <div id="head-content">
            <h1>
                <table>
                    <tr>
                        <td>
                            <a href="{{ route('index') }}" id="header-logo">
                                <img src="{{ $message->embed($logo) }}" alt="logo">
                            </a>
                        </td>
                        <td style="padding-left: 10px ">
                            <a href="{{ route('index') }}" id="header-logo">
                                <span>Easy English</span>
                            </a>
                        </td>
                    </tr>
                </table>
            </h1>
        </div>
    </div>
    <div id='body'>
        <h3>Подтвердите адрес электронной почты</h3>
        <p>Для вашего email <b>{{ $email }}</b> был осуществлен запрос на подтверждение адреса электронной почты.
            Для того чтобы подтвердить адрес электронной почты необходимо перейти по <a href='{{ $link }}'>ссылке</a> или нажмите по кнопке "Подтвердить email".</p>
        <a href='{{ $link }}'>Подтвердить email</a>
    </div>
</div>
</body>
</html>

