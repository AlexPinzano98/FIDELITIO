<title>Registro Completado</title>
<head> <meta name="csrf-token" id="token" content="{{ csrf_token() }}"></head>
<p>Bienvenido {{ $UserController->name }}, su cuenta se ha creado exitosamente, le hemos asignado una contraseña aleatoria por si quiere hacer login directamente</p>
<form  method="POST" action="https://localhost/FIDELITIO/public/password_reset">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" value="{{ $UserController->id_user }}" id="id_user" name="id_user">
    <button type="submit" id="submit">
                Cambiar Contraseña            </button>
</form>

