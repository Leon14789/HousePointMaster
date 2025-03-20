<!DOCTYPE html>
<html lang="en">

<head>
    <title>LOGIN</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>

<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <img class="img-login" src="/assets/images/Cabecalho.png" alt="logo CPS" srcset="">
        <label for="email">Email</label>
        <input id="email" type="text" name="email" value="{{ old('email') }}" placeholder="Insira seu melhor Email" required autofocus>

        <label for="password">Senha</label>
        <input type="password" name="password" placeholder="Insira sua Senha" id="password">

           <button>Entrar</button>
    </form>
</body>

</html>