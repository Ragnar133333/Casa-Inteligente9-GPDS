<?php
    include('conexion.php');
    
    if (isset($_POST['nombre']) 
    && isset($_POST['descripcion'])) {
        function validar($data){
            $data=trim($data);
            $data=stripslashes($data);
            $data=htmlspecialchars($data);
            return $data;
        }

        $nombre=validar($_POST['nombre']);
        $descripcion=validar($_POST['descripcion']);
    
        if (empty($nombre)) {
        header("Location: categorias.php?error=El nombre es requerido");
        exit();
        }elseif(empty($descripcion)){
            header("Location: categorias.php?error=La descripcion es requerida");
            exit();
        }else{
        //Sentencia
        $SQL="INSERT INTO public.categoria(nombre, descripcion)
            VALUES ( '$nombre', '$descripcion')";
        $result=pg_query($conexion,$SQL);

        if ($result===1) {
            header("Location: categorias.php?bien=Producto Registrado incorrectamente");
        }else{
            header("Location: categorias.php?bien=Producto Registrado correctamente");
        }
    }
}

?>