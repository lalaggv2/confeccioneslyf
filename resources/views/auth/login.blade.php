<!DOCTYPE html>
@routes
@guest
@else
    @php
        header('Location: /home');
        exit;
    @endphp
@endguest
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/packages/toast/jquery.toast.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/packages/smoke/css/smoke.min.css')}}">
    <link rel="stylesheet" href="{{ asset('asesents/login.css')}}">
</head>
<body>
<div class="container">
    <div class="auth">
        <div class="content">
            <div class="d-flex flex-column align-items-center">
                <h1>Confecciones L&F</h1>
                <h2>Inicia sessión</h2>
            </div>
            <div class="form">
                <form id="formAuth" method="POST">
                    @csrf
                    <div class="login">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="form-group position-relative">
                                    <label for="email" class="control-label">Usuario</label>
                                    <input type="email" class="form-control" id="email" name="email" autofocus
                                           placeholder="name@example.com"
                                           required data-smk-msg="El correo es requerido">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group position-relative">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" id="password" name="password" autofocus
                                           placeholder="Contraseña" required data-smk-msg="La contraseña es requerida">
                                </div>
                                <div class="recover-password">
                                    <a href="#">Recuperar contraseña</a>
                                </div>
                            </div>
                        </div>
                        <div class="button-access">
                            <button type="sumit" onclick="app.handleLogin()" value="ingresar"
                                    class="btn btn-primary w-50">INGRESAR
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/jquery-3.7.1.min.js')}}"></script>
<script src="{{ asset('assets/packages/smoke/js/smoke.min.js')}}"></script>
<script src="{{ asset('assets/packages/smoke/lang/es.js')}}"></script>
<script src="{{ asset('assets/packages/toast/jquery.toast.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    const app = {
        handleLogin: function () {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            if ($('#formAuth').smkValidate()) {
                const data = {
                    email: email,
                    password: password
                };
                axios({
                    method: 'post',
                    url: route('access.web'),
                    data: data,
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                    }
                }).then(response => {
                    if (response.status === 200) {
                        window.location.href = '/home';
                    } else {
                        $.toast({
                            text: 'Usuario o contraseña incorrectos',
                            position: 'top-right',
                            stack: false,
                            icon: 'error'
                        })
                    }
                }).catch(error => {
                    console.error(error);
                });
            } else {
                $.toast({
                    text: 'Ingrese el usuario y la contraseña',
                    position: 'top-right',
                    stack: false,
                    icon: 'warning'
                })
            }
        }
    }
</script>
</body>

</html>
