<?php
    include('conexion.php');
    
    if (isset($_POST['productName']) && isset($_POST['file'])
    && isset($_POST['descripcion']) && isset($_POST['categoria']) 
    && isset($_POST['precio']) && isset($_POST['stock'])) {
        function validar($data){
            $data=trim($data);
            $data=stripslashes($data);
            $data=htmlspecialchars($data);
            return $data;
        }

        $productName=validar($_POST['productName']);
        $descripcion=validar($_POST['descripcion']);
        $categoria=validar($_POST['categoria']);
        $precio=validar($_POST['precio']);
        $stock=validar($_POST['stock']);
        $file_name=$_FILES['file']['name'];
        $file_tmp=$_FILES['file']['tmp_name'];

        $foto="/Users/germanorozcozuniga/TEC/Casa Inteligente9/img/".$file_name;

        move_uploaded_file($file_tmp,$foto);
    
        if (empty($productName)) {
        header("Location: admin.php?error=El nombre es requerido");
        exit();
        }elseif(empty($descripcion)){
            header("Location: admin.php?error=La descripcion es requerida");
            exit();
        }elseif(empty($categoria)){
            header("Location: admin.php?error=La categoria es requerido");
            exit();
        }elseif(empty($precio)){
            header("Location: admin.php?error=El precio es requerido");
            exit();
        }elseif(empty($stock)){
            header("Location: admin.php?error=El stock es requerido");
            exit();
        }else{
        //Sentencia
        $SQL="INSERT INTO public.productos(nombre, foto, descripcion, precio, idcategoria)
            VALUES ('$productName','$file_name', '$descripcion', $precio, '$categoria')";
        $result=pg_query($conexion,$SQL);

        $query="INSERT INTO public.almacen(cantidadexistente, estado, idproducto)
            VALUES ($stock, 't', (select max(idproducto) from public.productos))";
        $result2=pg_query($conexion,$query);

        if ($result===1) {
            header("Location: admin.php?bien=Producto Registrado incorrectamente");
        }else{
            header("Location: admin.php?bien=Producto Registrado correctamente");
        }
        echo 'Hola';
    }
}

?>