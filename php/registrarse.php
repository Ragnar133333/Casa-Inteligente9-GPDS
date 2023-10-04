<?php
    include('conexion.php');

    if (isset($_POST['usuario'])&& isset($_POST['contraseña']) && isset($_POST['nombre'])
    && isset($_POST['apellidos']) && isset($_POST['pais']) && isset($_POST['provincia']) && isset($_POST['direccion']) && isset($_POST['cp'])
    && isset($_POST['telefono']) && isset($_POST['correo'])) {
        function validar($data){
            $data=trim($data);
            $data=stripslashes($data);
            $data=htmlspecialchars($data);
            return $data;
        }

        $usuario=validar($_POST['usuario']);
        $contraseña=validar($_POST['contraseña']);
        $nombre=validar($_POST['nombre']);
        $apellidos=validar($_POST['apellidos']);
        $pais=validar($_POST['pais']);
        $provicia=validar($_POST['provincia']);
        $direccion=validar($_POST['direccion']);
        $cp=validar($_POST['cp']);
        $telefono=validar($_POST['telefono']);
        $correo=validar($_POST['correo']);
        
    
        if (empty($usuario)) {
        header("Location: registrarCliente.php?error=El usuario es requerido");
        exit();
        }elseif(empty($contraseña)){
            header("Location: registrarCliente.php?error=La contraseña es requerida");
            exit();
        }elseif(empty($nombre)){
            header("Location: registrarCliente.php?error=El nombre es requerido");
            exit();
        }elseif(empty($apellidos)){
            header("Location: registrarCliente.php?error=El apellido es requerido");
            exit();
        }elseif(empty($pais)){
            header("Location: registrarCliente.php?error=El pais es requerido");
            exit();
        }elseif(empty($direccion)){
            header("Location: registrarCliente.php?error=La direccion es requerida");
            exit();
        }elseif(empty($cp)){
            header("Location: registrarCliente.php?error=El codigo postal es requerido");
            exit();
        }elseif(empty($telefono)){
            header("Location: registrarCliente.php?error=El telefono es requerido");
            exit();
        }elseif(empty($correo)){
            header("Location: registrarCliente.php?error=El correo es requerido");
            exit();
        }else{
        //Sentencia
        $SQL="INSERT INTO public.cliente(usuario, contraseña,nombre, apellidos, pais, provicia, direccion, codp, telefono, correo)
        VALUES ( '$usuario', '$contraseña', '$nombre', '$apellidos', '$pais', '$provicia', '$direccion', '$cp', '$telefono','$correo')";
        $result=pg_query($conexion,$SQL);

        if ($result===1) {
            header("Location: registrarCliente.php?bien=Usuario Registrado incorrectamente");
        }else{
            header("Location: registrarCliente.php?bien=Usuario Registrado correctamente");
        }

    }
}

?>