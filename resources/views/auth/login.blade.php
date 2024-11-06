<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Conta Patrimônio</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<div class="login">
    <div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <h1>Login Form</h1>
                        <div>
                            {{ old('email') }}
                            <input type="text" class="form-control" placeholder="Email" name="email" required value="{{ old('email') }}"  />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Senha" name="senha" required />
                        </div>
                        <div>
                            <button class="btn btn-default submit" type="submit">Log in</button>
                            <a class="reset_pass" href="#">Esqueceu a senha?</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa-solid fa-boxes-stacked"></i> Conta Patrimônio</h1>
                                <p>©2016 All Rights Reserved. Conta Patrimônio Privacy and Terms</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>

            {{-- <div id="register" class="animate form registration_form">
                <section class="login_content">
                    <form>
                        @csrf
                        <h1>Create Account</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="Nome" required="" />
                        </div>
                        <div>
                            <input type="email" class="form-control" placeholder="Email" required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Senha" required="" />
                        </div>
                        <div>
                            <button class="btn btn-link submit" type="submit">Submit</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Already a member ?
                                <a href="#signin" class="to_register"> Log in </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa-solid fa-boxes-stacked"></i> Conta Patrimônio</h1>
                                <p>©2024 Todos os direitos reservados. Conta Patrimônio</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div> --}}
        </div>
    </div>
</div>

</html>
