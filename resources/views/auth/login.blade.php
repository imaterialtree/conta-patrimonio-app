<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Conta Patrimônio</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="col-lg-4 col-10">
            @include('partials.errors')
            <div class="text-center mb-4">
                <h3 class="text-muted">Fazer login</h3>
                <hr>
            </div>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="password" name="senha" placeholder="Senha" required>
                </div>
                <div class="d-flex justify-content-center mb-3">
                    <a href="#" class="text-decoration-none">Esqueceu a senha?</a>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100">Log in</button>
                </div>
            </form>
            <div class="text-center mt-5">
                <h1><i class="fa-solid fa-boxes-stacked"></i></h1>
                <i class="bi bi-boxes fs-1"></i>
                <p class="mb-0">Conta Patrimônio</p>
                <small class="text-muted">&copy;2024 All Rights Reserved. Conta Patrimônio<br>Privacy and Terms</small>
            </div>
        </div>
    </div>
</body>
</html>
