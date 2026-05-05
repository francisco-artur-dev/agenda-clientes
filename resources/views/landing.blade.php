<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title>Agenda de Aniversários</title>
     <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
   
        <style>
        body {
            font-family: sans-serif;
            background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
            text-align: center;
            padding-top: 100px;
            color: #111827;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        p {
            color: #4b5563;
            margin-bottom: 30px;
        }

        .btn {
            background-color: #4f46e5;
            color: white;
            padding: 12px 24px;
            margin: 10px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            transition: 0.2s;
            font-weight: 500;
        }

        .btn:hover {
            background-color: #3730a3;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div style="background:white; display:inline-block; padding:40px; border-radius:12px; box-shadow:0 10px 25px rgba(0,0,0,0.1);">
        <h1>Bem-vindo à Agenda de Aniversários</h1>
            <p>Organize e receba notificações de aniversários dos seus clientes!</p>

            <div>
                <a href="{{ route('login') }}" class="btn">Login</a>
                <a href="{{ route('register') }}" class="btn">Registrar</a>
            </div>
    </div>  
</body>
</html>
