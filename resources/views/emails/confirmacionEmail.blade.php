<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Confirmación email</title>
</head>
<body>
  <p>¡Bienvenido, {{ $user->name }}!</p>
  <p>Gracias por registrarte en web shop online.</p>
  @if($pass!="")
  	Su contraseña para acceder al sistema es: {{$pass}} <br>
  @endif
  Por favor verifique su correo electrónico {{ $user->email }} haciendo clic en la siguiente liga: <br><br>
  <a href="{{ url('/lkadmvkladnkvldana')}}/{{$token}}">Confirmar mi cuenta</a>
  <br><br>
    Es importante verificar su correo electrónico para brindarle servicios a través de  nuestra página Web.
  <br><br>

    ¡Lo esperamos pronto! 
</body>
</html>