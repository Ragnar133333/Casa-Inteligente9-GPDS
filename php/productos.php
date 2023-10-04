<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <!--letra-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Tektur:wght@400;500;600;700;800;900&family=Work+Sans:ital,wght@1,500&display=swap" rel="stylesheet">
  <!--Fin letra-->    
<!--Para pie de pagina-->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../css/productos.css">
<!--FinPara pie de pagina-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"><!--Para el icono en bootstrap-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!--css only BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script type="text/javascript" 
      src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>
</head>
<body>
   <!-- Encabezado-->
   <header class="header">
    <div class="container">
      <ul class="detalles ">
        <li><a href="#">Contactos</a></li>
        <li>
          <!--<div class="dropdown show language-dropdown" id="google_translate_element">
            <a class="btn btn-secondary dropdown-toggle bg-transparent border-0 py-0" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Idiomas <i class="bi bi-globe"></i>
            </a>
          
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="#">Español</a>
              <a class="dropdown-item" href="#">Ingles</a>
              <a class="dropdown-item" href="#">Koreano</a>
            </div>
          </div>
          <script type="text/javascript">
            function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
            }
          </script>-->
        </li>
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
                    <ul style="display: none; width: 250px; list-style-type:none; " id="extend">
                    <li style="text-align:left; justify-content:left;">
                      <a href="cerrarSesion.php">Cerrar sesion</a>
                    </li>
                    </ul>
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
    <div class="logo" >HomeTech</div>
    <ul>
      <li><a href="inicio.php">inicio</a></li>
      <li><a href="productos.php">Producto</a></li>
      <li><a href="conocenos.php">Conocenos</a></li>

      <div>
      <div class="container-icon">
				<div class="container-cart-icon">
					<svg
						xmlns="http://www.w3.org/2000/svg"
						fill="none"
						viewBox="0 0 24 24"
						stroke-width="1.5"
						stroke="currentColor"
						class="icon-cart"
					>
						<path
							stroke-linecap="round"
							stroke-linejoin="round"
							d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"
						/>
					</svg>
					<div class="count-products">
						<span id="contador-productos">0</span>
					</div>
				</div>

				<div class="container-cart-products hidden-cart">
					<div class="row-product hidden">
						<div class="cart-product">
							<div class="info-cart-product">
								<span class="cantidad-producto-carrito">1</span>
								<p class="titulo-producto-carrito">Zapatos Nike</p>
								<span class="precio-producto-carrito">$80</span>
							</div>
							<svg
								xmlns="http://www.w3.org/2000/svg"
								fill="none"
								viewBox="0 0 24 24"
								stroke-width="1.5"
								stroke="currentColor"
								class="icon-close"
							>
								<path
									stroke-linecap="round"
									stroke-linejoin="round"
									d="M6 18L18 6M6 6l12 12"
								/>
							</svg>
						</div>
					</div>

					<div class="cart-total hidden">
						<h3>Total:</h3>
						<span class="total-pagar">$200</span>
            <a href="#"><button style="border-radius: 4px; font-size: 16px; background-color: #008CBA; border: 2px solid #008CBA;">Ir A Pagar</button></a>
					</div>
					<p class="cart-empty">El carrito está vacío</p>
				</div>
			</div>
    </div>

    </ul>
    
  </nav>
  <!-- Fin Navegador--> 
  <main class="fondo"> <!--Inicio main contendio principal que tiene-->

      <br>
      <nav class="nav_estatico">
        <img src="/Casa Inteligente9/img/fondo.png" alt="" width="400px" height="300px" style="position: absolute; left: 300px; opacity: 0.2;">
        <div class="fondo2">
            <br><br>
            <div class="descripcion">
            <h1 class="nav_h1">Productos</h1>
            <div class="descripcion_se">
            <img src="/Casa Inteligente9/img/Sinfondo.png" alt="" >
            </div>
            </div>
            <h2 class="nav_h2">grantizados de alta calidad</h2>
        </div>
      </nav>
    <div id="product"></div>
    <div class="container_productos" id="señal">
    <section class="section1" >
        <h3>Categorias</h3>
        <ul>
        <div id="categoryProductos">
        <li><a href="#product" id="categoryProductosAll" onclick="mostrarTodo()" >Todo</a></li>
        <li><a href="#product" id="categoryProductosCam" onclick="mostrarCamaras()" >Camaras</a></li>
        <li><a href="#product" id="categoryProductosCer" onclick="mostrarCerraduras()" >Cerraduras</a></li>
        <li><a href="#product" id="categoryProductosFoc" onclick="mostrarFocos()" >Focos</a></li>
        <li><a href="#product" id="categoryProductosFoc" onclick="mostrarLimpieza()" >Limpieza</a></li>
        <li><a href="#product" id="categoryProductosFoc" onclick="mostrarEntretenimiento()" >Entretenimiento</a></li>
        <div class="lista2" id="2">
        <ul>
          <li><a href="#product" id="categoryProductosFoc" onclick="mostrarAltavoces()" >Altavoces</a></li>
          <li><a href="#product" id="categoryProductosFoc" onclick="mostrarTelevisiones()" >Televisiones</a></li>
          <li><a href="#product" id="categoryProductosFoc" onclick="mostrarGafas()" >Gafas</a></li>
        </ul>
        </div>
        <li><a href="#product" id="categoryProductosFoc" onclick="mostrarDeporte()" >Deporte</a></li>
        <li><a href="#product" id="categoryProductosFoc" onclick="mostrarInterruptores()" >Interruptores</a></li>
        <li><a href="#product" id="categoryProductosFoc" onclick="mostrarCosina()" >Cosina</a></li>
        <li><a href="#product" id="categoryProductosFoc" onclick="mostrarSensores()" >Sensores</a></li>
      
      </div>
      </ul>
    </section>

    <!--Productos acomodo-->
    <section class="sectionP" >
    <div class="mostrar" id="mostrador">
    <div class="fila">
    
    
    <?php
            include('conexion.php');
            $query="SELECT productos.nombre, foto,precio,categoria.nombre as categoria FROM public.productos
            inner join public.categoria on public.categoria.idcategoria=public.productos.idcategoria";
            $result=pg_query($conexion,$query);
            while ($m =pg_fetch_array($result)) {            
            ?>

            <div class="producto" onclick="cargar(this)" id="<?php echo ($m['categoria'])?>">
            <img src="/casa inteligente9/img/cerradura1.png" alt="" class="produto__img">
            <div class="productDescription">
              <h3 class="produto__title"><?php echo ($m['nombre'])?></h3>
              <spam class="produto__price">$<?php echo $m['precio'] ?></spam>
            </div>
            </div>  
            <?php
            }
            ?>
            
        </div> 
      </div> 
      

     <!--Seleccion del producto-->
     <div class="seleccion" id="seleccion">
        <div class="cerrar" onclick="cerrar()">
            &#x2715
        </div>
        <div class="info">
             <img src="/Casa Inteligente9/img/Sinfondo.png" alt="" id="img">
             <h2 id="modelo">Producto1 </h2>
             <p id="descripcion" >Descripcion</p>

             <span class="precio" id="precio">$200</span>
             <div class="fila ">
                <div class="size">
                    <label for="">Cantidad</label>
                    <select name="" id="">
                        <option value="">1</option>
                        <option value="">2</option>
                        <option value="">3</option>
                        <option value="">4</option>
                    </select>
                </div>
                
             </div>
             <button class='btn-add-cart'>Agregar carrito</button>
             
         </div>
     </div>

    </section>
    <br><br><br><br><br><br>
    </main>
    <!--Inicia el footer-->
    <footer class="footer-distributed" id="footer">

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
    
<!--SCRIPT BOOTSTRAP-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="/Casa Inteligente9/js/producto.js"></script>
<script src="/Casa Inteligente9/js/inicio.js"></script>
</body>
</html>