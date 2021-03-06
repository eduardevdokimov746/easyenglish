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

        #body #code{
            color: #0280e1;
            font-size: 28px;
            margin-top: 10px;
            text-align: center;
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
        <h3>Восстановление пароля</h3>
        <p>Вы или кто-то другой запросили восстановление пароля к учетной записи <b>{{ $email }}</b><br><br>Код восстановления:</p>
        <p id='code'>{{ $code }}</p>
    </div>
</div>
</body>
</html>

