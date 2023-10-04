//-----------------Funciones para el acomodo de los productos------------------
let mostrador = document.getElementById("mostrador");
let seleccion = document.getElementById("seleccion");
let imgSeleccionada = document.getElementById("img");
let modeloSeleccionado = document.getElementById("modelo");
let descripSeleccionada = document.getElementById("descripcion");
let precioSeleccionado = document.getElementById("precio");

function cargar(producto){
    quitarBordes();
    mostrador.style.width  = "75%";
    seleccion.style.width = "25%";
    seleccion.style.opacity = "1";
    producto.style.border = "2px solid #0071b2";

    imgSeleccionada.src = producto.getElementsByTagName("img")[0].src;

    modeloSeleccionado.innerHTML =  producto.getElementsByTagName("h3")[0].innerHTML;

    descripSeleccionada.innerHTML = "Descripción del modelo ";

    precioSeleccionado.innerHTML =  producto.getElementsByTagName("spam")[0].innerHTML;


}
function cerrar(){
    mostrador.style.width = "100%";
    seleccion.style.width = "0%";
    seleccion.style.opacity = "0";
    quitarBordes();
}
function quitarBordes(){
    var producto = document.getElementsByClassName("producto");
    for(i=0;i <producto.length; i++){
        producto[i].style.border = "none";
    }
}
let cle=document.getElementById('2');
function extender(){
    cle.style.display='block';
    cle.style.height='100%';
}
function cortar() {
    cle.style.display='none';
    cle.style.height='0%';
}

window.addEventListener('scroll',function(){
    let muestra=document.getElementById('product');
    let mueve=document.getElementById('seleccion');
    let distancia=muestra.getBoundingClientRect().top;

    let footer=document.getElementById('footer');
    let fin=footer.getBoundingClientRect().top;
    
    distancia=distancia*-1;
    var mov=distancia+20;
    if (880<fin) {//le para 
    if (distancia>=-75) {
        mueve.style.transform='translateY('+mov+'px)';
    }
    }

});
 

//------------------------Funciones para las categorias----------------------
function pintar(nombre){
let parte=document.getElementById("categoryProductos");
let palabra=parte.getElementsByTagName("a")[nombre].style.color='#0071b2';

}

function despintar(){
    let parte=document.getElementById("categoryProductos");
    let palabra=parte.getElementsByTagName("a");
    for (let index = 0; index < palabra.length; index++) {
        palabra[index].style.color='#717171';
        
    }
}

function mostrar(cat){
    let num=document.querySelectorAll('#'+cat).length;
    for (var i = 0; i < num; i++) {
        let elemento=document.querySelectorAll('#'+cat)[i].style.display='block';
    }
}

function quitar(cat){
    let num=document.querySelectorAll('#'+cat).length;
    for (var i = 0; i < num; i++) {
        let elemento=document.querySelectorAll('#'+cat)[i].style.display='none';
    }
}

function mostrarTodo(){
despintar();
cortar();
mostrar('focos');
mostrar('cerraduras');
mostrar('entretenimiento');
mostrar('camaras');
pintar(0);
}

function mostrarCamaras(){
    despintar();
    cortar();
mostrar('camaras');
quitar('focos');
quitar('cerraduras');
quitar('entretenimiento')
pintar(1);
}
function mostrarCerraduras(){
    despintar();
    cortar();
    mostrar('cerraduras');
    quitar('focos');
    quitar('camaras');
    quitar('entretenimiento')
pintar(2);
}
function mostrarFocos(){
    despintar();
    mostrar('focos');
    quitar('camaras');
    quitar('cerraduras');
    quitar('entretenimiento')
pintar(3);
}

function mostrarLimpieza(){
    despintar();
    cortar();
    quitar('camaras');
    quitar('focos');
    quitar('cerraduras');
    quitar('entretenimiento')
pintar(4);
}
function mostrarEntretenimiento(){
    despintar();
    cortar();
    mostrar('entretenimiento');
    quitar('focos');
    quitar('cerraduras');
    quitar('camaras')
    extender();
pintar(5);
}
function mostrarDeporte(){
    despintar();
    cortar();
    quitar('entretenimiento');
    quitar('focos');
    quitar('cerraduras');
    quitar('camaras');/*
    quitar('interruptores')
    quitar('cosina')
    quitar('sensores')
    quitar('limpieza')*/
pintar(6);
}

function mostrarInterruptores(){
    despintar();
    cortar();
    quitar('entretenimiento');
    quitar('focos');
    quitar('cerraduras');
    quitar('camaras');/*
    quitar('deporte')
    quitar('cosina')
    quitar('cosina')
    quitar('limpieza')*/
pintar(7);
}
function mostrarCosina(){
    despintar();
    cortar();
    quitar('entretenimiento');
    quitar('focos');
    quitar('cerraduras');
    quitar('camaras');/*
    quitar('deporte')
    quitar('sensores')
    quitar('interruoptores')
    quitar('limpieza')*/
pintar(8);
}


//---------------------Funciones para el carrito----------------------------
const btnCart = document.querySelector('.container-cart-icon');
const containerCartProducts = document.querySelector(
	'.container-cart-products'
);

btnCart.addEventListener('click', () => {
	containerCartProducts.classList.toggle('hidden-cart');
});
const cartInfo = document.querySelector('.cart-product');
const rowProduct = document.querySelector('.row-product');

// Lista de todos los contenedores de productos
const productsList = document.querySelector('.seleccion');

// Variable de arreglos de Productos
let allProducts = [];

const valorTotal = document.querySelector('.total-pagar');

const countProducts = document.querySelector('#contador-productos');

const cartEmpty = document.querySelector('.cart-empty');
const cartTotal = document.querySelector('.cart-total');

productsList.addEventListener('click', e => {
	if (e.target.classList.contains('btn-add-cart')) {
        const product = e.target.parentElement;

		const infoProduct = {
			quantity: 1,
			title: product.querySelector('h2').textContent,
			price: product.querySelector('span').textContent,
		};
        const exits = allProducts.some(
			product => product.title === infoProduct.title
		);
        if (exits) {
			const products = allProducts.map(product => {
				if (product.title === infoProduct.title) {
					product.quantity++;
					return product;
				} else {
					return product;
				}
			});
			allProducts = [...products];
		} else {
			allProducts = [...allProducts, infoProduct];
		}

        showHTML(); 
    }
});
rowProduct.addEventListener('click', e => {
	if (e.target.classList.contains('icon-close')) {
		const product = e.target.parentElement;
		const title = product.querySelector('p').textContent;

		allProducts = allProducts.filter(
			product => product.title !== title
		);

		console.log(allProducts);

		showHTML();
	}
});

const showHTML = () => {
    if (!allProducts.length) {
		cartEmpty.classList.remove('hidden');
		rowProduct.classList.add('hidden');
		cartTotal.classList.add('hidden');
	} else {
		cartEmpty.classList.add('hidden');
		rowProduct.classList.remove('hidden');
		cartTotal.classList.remove('hidden');
	}

    // Limpiar HTML
	rowProduct.innerHTML = '';

    let total = 0;
	let totalOfProducts = 0;


	allProducts.forEach(product => {
		const containerProduct = document.createElement('div');
		containerProduct.classList.add('cart-product');

		containerProduct.innerHTML = `
            <div class="info-cart-product">
                <span class="cantidad-producto-carrito">${product.quantity}</span>
                <p class="titulo-producto-carrito">${product.title}</p>
                <span class="precio-producto-carrito">${product.price}</span>
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
        `;

		rowProduct.append(containerProduct);
        total =
			total + parseInt(product.quantity * product.price.slice(1));
		totalOfProducts = totalOfProducts + product.quantity;
	});
    valorTotal.innerText = `$${total}`;
	countProducts.innerText = totalOfProducts;
};

