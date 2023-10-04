<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Almacén de Productos Tecnológicos</title>
  <link rel="stylesheet" href="../css/styles_Admin.css">
  <link rel="stylesheet" href="../css/nav-enca-pie.css">
  <link rel="stylesheet" href="../css/footer.css">

  <!-- Enlace a los archivos CSS de Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <!--Para pie de pagina-->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
  <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
  
  <script type="text/javascript" 
      src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>

</head>
<body>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <!-- Encabezado-->
    <header class="header">
        <div class="container">
          <ul class="detalles ">
            <li><a href="#">Contactos</a></li>
            <?php
              session_start();
              
                if (isset($_SESSION['nombre'])==null || isset($_SESSION['nombre'])=='') {
              ?>
              
                  <li><a href="clientes.php">Login</a><i class="bi bi-person gap-3"></i></li>
                
              <?php    
                }else{
                  $nombre=$_SESSION['nombre'];
                  ?>
                  <li style="width: 150px;"><a href="#" onclick="cortador()">
                  <?php
                  echo $nombre;
                  ?>
                  </a><i class="bi bi-person gap-3"> </i>
                  <div class="perfil">
                        <ul id="extend">
                        <li><a href="#">Perfil</a></li>
                        <li><a href="cerrarSesion2.php">Cerrar sesion</a></li>
                        
                        </ul>
                  </div>
                  </li>
                  <?php 
                } 
              ?>
          </ul>
        </div>
      </header>
      <!-- Fin Encabezado-->  
      <div class="spacer"></div> <!-- Agrega un div separador -->
     
     <!-- Navegador-->
     <nav>
       <ul>
         <li><a href="admin.php">Productos</a></li>
         <li><a href="categorias.php">Categorias</a></li>
       </ul>
     </nav>
     <!-- Fin Navegador--> 


   <div class="container">
    <!-- Buscador de productos por nombre o categoría -->
    <form action="clientes.php">
    <div class="search-box col-lg-12">
      <h2>Buscar</h2>
      <input type="text" class="form-control" id="searchProduct"
        placeholder="Nombre o Categoría">
    </div>
    </form>
  </div>

  <!-- Formulario para agregar o actualizar productos -->
  <div class="row flex-lg-row-reverse">
    
    <div class="col-lg-5">
      <h2>Administrar Productos</h2>
      
      <div class="seleccion">
      <ul>
        <li><a href="#" onclick="mostrarA()">Agregar</a></li>
        <li><a href="#" onclick="mostrarM()">Modificar</a></li>
        <li><a href="#" onclick="mostrarE()">Eliminar</a></li>
      </ul>
      </div>
      <!--Inicia formulario para agregar productos-->
      <form id="productForm3" action="registrarProducto.php" method="post">
        <div class="row">

          <div class="mb-3 col-lg-5">
              <label for="productId" class="form-label">ID del Producto</label>
              <input type="text" class="form-control" name="id" id="productId">
            </div>
          
          <div class="mb-3 col-lg-5">
            <label for="productName" class="form-label">Nombre del Producto</label>
            <input type="text" class="form-control" name="productName" id="productName">
          </div>
        </div>

        <div class="row">
          <div class="mb-3 col-lg-5">
            <label for="productImage">Imagen del Producto:</label>
            <input type="file" id="productImage" name="file">
          </div>
          <div class="mb-3 col-lg-5">
            <label for="productDescription" class="form-label">Descripción</label>
            <textarea class="form-control" id="productDescription" name="descripcion"></textarea>
          </div>
        </div>

        <div class="row">
          <div class="mb-3 col-lg-5">
            <label for="productCategory" class="form-label">Categoría</label>
            <input type="text" class="form-control" name="categoria" id="productCategory">
          </div>
          <div class="mb-3 col-lg-2">
            <label for="productPrice" class="form-label">Precio</label>
            <input type="number" class="form-control" name="precio" id="productPrice" step="0.01" >
          </div>
          <div class="mb-3 col-lg-2">
            <label for="productStock" class="form-label">Existencias</label>
            <input type="number" class="form-control" name="stock" id="productStock" >
          </div>

        </div>

        <div class="row">
          <div class="mb-3">
          <hr>
                    <?php
                    if (isset($_GET['error'])) {
                        ?>
                        <p class="error">
                            <?php
                            echo $_GET['error']
                            ?>
                        </p>
                    <?php    
                    } 
                    ?>
                    <?php
                    if (isset($_GET['bien'])) {
                        ?>
                        <p class="bien">
                            <?php
                            echo $_GET['bien']
                            ?>
                        </p>
                    <?php    
                    } 
                    ?>
                    <hr>
            <button type="submit" class="btn btn-primary" id="addUpdateButton">Agregar Producto</button>
  
              <br><br>

          </div>
        </div>
      </form>
      <!--Termina formulario para agregar productos-->
      <?php
      $id=$_GET['id']??null;
      $producto=$_GET['producto']??null;
      $foto=$_GET['foto']??null;
      $descripcion=$_GET['descripcion']??null;
      $precios=$_GET['precio']??null;
      $nombres=$_GET['nombre']??null;
      $cantidadexistente=$_GET['cantidadexistente']??null;
      ?>

      <!--Inicia formulario para modificar productos-->
      <form id="productForm2" action="modificarProducto.php" method="post" style="display: none;">

      <div class="row">

          <div class="mb-3 col-lg-5">
              <label for="productId" class="form-label">ID del Producto</label>
              <input type="text" class="form-control" name="id" id="productId" value="<?=$id?>">
            </div>
          
          <div class="mb-3 col-lg-5">
            <label for="productName" class="form-label">Nombre del Producto</label>
            <input type="text" class="form-control" name="productName" id="productName" value="<?=$producto?>">
          </div>
        </div>

        <div class="row">
          <div class="mb-3 col-lg-5">
            <label for="productImage">Imagen del Producto:</label>
            <input type="file" id="productImage" name="file" value="<?=$foto?>">
          </div>
          <div class="mb-3 col-lg-5">
            <label for="productDescription" class="form-label">Descripción</label>
            <textarea class="form-control" id="productDescription" name="descripcion" placeholder="<?=$descripcion?>"><?=$descripcion?></textarea>
          </div>
        </div>

        <div class="row">
          <div class="mb-3 col-lg-5">
            <label for="productCategory" class="form-label">Categoría</label>
            <input type="text" class="form-control" name="categoria" id="productCategory" value="<?=$nombres?>">
          </div>
          <div class="mb-3 col-lg-2">
            <label for="productPrice" class="form-label">Precio</label>
            <input type="text" class="form-control" name="precio" id="productPrice" value="<?=$precios?>">
          </div>
          <div class="mb-3 col-lg-2">
            <label for="productStock" class="form-label">Existencias</label> 
            <input type="number" class="form-control" name="stock" id="productStock" value="<?=$cantidadexistente?>">
          </div>

        </div>
        <div class="row">
          <div class="mb-3">
        <hr>
                    <?php
                    if (isset($_GET['error'])) {
                        ?>
                        <p class="error">
                            <?php
                            echo $_GET['error']
                            ?>
                        </p>
                    <?php    
                    } 
                    ?>
                    <?php
                    if (isset($_GET['bien'])) {
                        ?>
                        <p class="bien">
                            <?php
                            echo $_GET['bien']
                            ?>
                        </p>
                    <?php    
                    } 
                    ?>
                    <hr>
              <button type="submit" class="btn btn-primary" id="addUpdateButton">Modificar
              Producto</button>
              <br><br>

              </div>
        </div>
      </form>
      <!--Termina formulario para modificar productos-->
      
      <!--Inicia formulario para Eliminar productos-->
      <form id="productForm" action="eliminarProducto.php" method="post" style="display: none;">
      <div class="row">

          <div class="mb-3 col-lg-5">
              <label for="productId" class="form-label">ID del Producto</label>
              <input type="text" class="form-control" name="id" id="productId">
            </div>
          
        </div>

        
        <hr>
                    <?php
                    if (isset($_GET['error'])) {
                        ?>
                        <p class="error">
                            <?php
                            echo $_GET['error']
                            ?>
                        </p>
                    <?php    
                    } 
                    ?>
                    <?php
                    if (isset($_GET['bien'])) {
                        ?>
                        <p class="bien">
                            <?php
                            echo $_GET['bien']
                            ?>
                        </p>
                    <?php    
                    } 
                    ?>
                    <hr>      
      <button type="submit" class="btn btn-primary" id="addUpdateButton">Eliminar
              Producto</button>
             
      </form>
      <!--Termina formulario para eliminar productos-->
    </div>

    <div class="col-lg-7">
      <!-- Lista de productos disponibles -->
      <div class="product-list">
        <h2>Productos Disponibles</h2>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre Producto</th>
              <th>Imagen</th>
              <th>Descripción</th>
              <th>Precio</th>
              <th>Categoría</th>
              <th>Existencias</th>
              <th>Acciones</th>
            </tr>
            <?php
            include('conexion.php');
            $query="SELECT productos.idproducto, productos.nombre as producto, foto, productos.descripcion, precio, categoria.nombre,cantidadexistente FROM public.productos 
            inner join public.almacen on public.almacen.idproducto=public.productos.idproducto
            inner join public.categoria on public.productos.idcategoria=public.categoria.idcategoria";
            $result=pg_query($conexion,$query);
            while ($m =pg_fetch_array($result)) {            
            ?>
            <tr>
              <th><?php echo $m['idproducto'] ?></th>
              <th><?php echo $m['producto'] ?></th>
              <th><?php echo $m['foto'] ?></th>
              <th><?php echo $m['descripcion'] ?></th>
              <th><?php echo $m['precio'] ?></th>
              <th><?php echo $m['nombre'] ?></th>
              <th><?php echo $m['cantidadexistente'] ?></th>
              <th>
                <ul style="list-style-type: none; height: 20px; display: flex; margin-right:20px; justify-content: space-between;">
                <li><a href="admin.php?
                  id=<?php echo $m['idproducto'] ?> & 
                  producto=<?php echo $m['producto'] ?> & 
                  foto=<?php echo $m['foto'] ?> &
                  descripcion=<?php echo $m['descripcion'] ?> &
                  precio=<?php echo $m['precio'] ?> &
                  nombre=<?php echo $m['nombre'] ?> &
                  cantidadexistente=<?php echo $m['cantidadexistente'] ?>" onclick="mostrarM()">
                  
                  <button type="submit" class="btn btn-primary" id="addUpdateButton">Modificar</button></a></li>
                  <li><a href="#"><button type="submit" class="btn btn-primary" id="addUpdateButton">Eliminar</button></a></li>
                </ul>
                </th>
              
            </tr>
            <?php
            }
            ?>
          </thead>
        </table>
      </div>
    </div>
  </div>
  

<!--Pie de pagina-->
  <footer class="footer-distributed">

    <div class="footer-left">
        <h3>Bienvenido a <span>HomeTech</span></h3>

        <p class="footer-links">
            <a href="#">Home</a>
            |
            <a href="#">About</a>
            |
            <a href="#">Contact</a>
            |
            <a href="#">Blog</a>
        </p>

        <p class="footer-company-name">Copyright © 2021 <strong>SagarDeveloper</strong> All rights reserved</p>
    </div>

    <div class="footer-center">
        <div>
            <i class="fa fa-map-marker"></i>
            <p><span>Ghaziabad</span>
                Delhi</p>
        </div>

        <div>
            <i class="fa fa-phone"></i>
            <p>+91 74**9**258</p>
        </div>
        <div>
            <i class="fa fa-envelope"></i>
            <p><a href="mailto:sagar00001.co@gmail.com">xyz@gmail.com</a></p>
        </div>
    </div>
    <div class="footer-right">
        <p class="footer-company-about">
            <span>About the company</span>
            <strong>Sagar Developer</strong> is a Youtube channel where you can find more creative CSS Animations
            and
            Effects along with
            HTML, JavaScript and Projects using C/C++.
        </p>
        <div class="footer-icons">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-youtube"></i></a>
        </div>
    </div>
</footer>
<!-- Fin Pie de pagina-->

  <!--<script src="/Casa Inteligente9/js/script_Admin.js"></script>-->
  <script src="/Casa Inteligente9/js/inicio.js"></script>
  <script src="/Casa Inteligente9/js/script_Admin.js"></script>
  <script>
        //Mostrar Agregar Productos
        let form1=document.getElementById('productForm3');
        let form2=document.getElementById('productForm2');
        let form3=document.getElementById('productForm');


        function mostrarA(){
        form1.style.display='block';
        form2.style.display='none';
        form3.style.display='none';
        }
        //Mostrar Modificar producto
        function mostrarM(){
          console.log("Presion")
          form1.style.display='none';
          form2.style.display='block';
          form3.style.display='none';
        }
        //Mostrar Eliminar producto
        function mostrarE(){
          form1.style.display='none';
          form2.style.display='none';
          form3.style.display='block';
        }
      </script>
</body>
</html>
