<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="{{ asset('asesents/login.css')}}">

</head>
<header>
    <h1>Confecciones L&F</h1>
</header>
<body>
    <form action="" method="POST">
        @csrf
    <div class="login">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS3vKUlZrOOf_cgE9SWbM_J1Pg6X6sqHbsh9w&usqp=CAU" class="brand_logo" alt="Logo">
        
        <label class="Usuario" >Usuario</label>
        <input type="text" autofocus placeholder="Usuario" id="usuario " name="email" >
        <br>

        <label class="Contraseña">Contraseña</label>

        <input type="password" autofocus placeholder="Contraseña" id="contraseña" name="password">
        <br>
        <input type="radio" autofocus > <label class="olvido" class="olvido" >Olvido su contraseña</label>
        <br>
        <div class="buton1">
        <button type="buton" value="ingresar" class="btn float-ringht login_btn">INGRESAR</button>
        </div>
    </div>
    </form>
   
    
    
</body>

</html>