// Array para almacenar los productos
let products = [];

// Función para agregar o actualizar un producto en el almacén
function addOrUpdateProduct() {
  const productId = document.getElementById('productId').value;
  const productName = document.getElementById('productName').value;
  const productImage = document.getElementById('productImage').value;
  const productDescription = document.getElementById('productDescription').value;
  const productCategory = document.getElementById('productCategory').value;
  const productPrice = parseFloat(document.getElementById('productPrice').value);
  const productStock = parseInt(document.getElementById('productStock').value);

  const existingProduct = products.find(product => product.id === productId);

  if (existingProduct) {
    // Si el ID ya existe, mostramos mensaje de alerta
    alert(`El ID '${productId}' ya está asociado a otro producto.`);
  } else {
    // Si el ID no existe, buscamos si hay un producto para actualizar
    const productToUpdate = products.find(product => product.id === productId);
    if (productToUpdate) {
      // Actualizamos el producto existente
      productToUpdate.name = productName;
      productToUpdate.image = productImage;
      productToUpdate.description = productDescription;
      productToUpdate.category = productCategory;
      productToUpdate.price = productPrice;
      productToUpdate.stock = productStock;
    } else {
      // Agregar el producto si el ID no existe y no hay otro para actualizar
      const product = {
        id: productId,
        name: productName,
        image: productImage,
        description: productDescription,
        category: productCategory,
        price: productPrice,
        stock: productStock
      };
      products.push(product);
    }

    // Limpiamos el formulario y mostramos la lista actualizada de productos
    document.getElementById('productForm').reset();
    showProductsByCategory();
  }
}

    // Función para mostrar los productos agrupados por categorías en la tabla
    function showProductsByCategory(filteredProducts) {
      const productList = document.getElementById('products');
      productList.innerHTML = '';

      // Creamos un objeto que almacenará los productos por categoría
      const productsByCategory = {};

      // Agrupamos los productos por categoría
      const productsToDisplay = filteredProducts || products;
      productsToDisplay.forEach(product => {
        if (!productsByCategory[product.category]) {
          productsByCategory[product.category] = [product];
        } else {
          productsByCategory[product.category].push(product);
        }
      });

      // Mostramos los productos agrupados por categoría
      for (const category in productsByCategory) {
        const categoryHeader = document.createElement('tr');
        categoryHeader.innerHTML = `<th colspan="8">${category}</th>`;
        productList.appendChild(categoryHeader);

        productsByCategory[category].forEach((product, index) => {
          const row = document.createElement('tr');
          row.innerHTML = `
            <td><img src="${product.image}" alt="${product.name}" class="product-image"></td>
            <td>${product.id}</td>
            <td>${product.name}</td>
            <td>${product.description}</td>
            <td>${product.category}</td>
            <td>$${product.price.toFixed(2)}</td>
            <td>${product.stock}</td>
            <td>
              <button type="button" class="btn btn-danger btn-sm" onclick="removeProduct(${index})">Eliminar</button>
              <button type="button" class="btn btn-secondary btn-sm" onclick="editProduct(${index})">Actualizar</button>
              <input type="number" min="1" max="${product.stock}" value="1" id="quantity_${index}" class="form-control mt-2" style="width: 80px;" placeholder="Cantidad">
              <button type="button" class="btn btn-secondary btn-sm mt-2" onclick="removeQuantity(${index})">Eliminar Cantidad</button>
            </td>
          `;
          productList.appendChild(row);
        });
      }
    }

    // Función para eliminar un producto del almacén
    function removeProduct(index) {
      products.splice(index, 1);
      showProductsByCategory();
    }

    // Función para eliminar una cantidad específica de productos
    function removeQuantity(index) {
      const quantityInput = document.getElementById(`quantity_${index}`);
      const quantityToRemove = parseInt(quantityInput.value);
      if (!isNaN(quantityToRemove) && quantityToRemove > 0) {
        products[index].stock -= quantityToRemove;
        showProductsByCategory();
      }
    }

    // Función para editar un producto
    function editProduct(index) {
      const productToUpdate = products[index];
      document.getElementById('productId').value = productToUpdate.id;
      document.getElementById('productName').value = productToUpdate.name;
      document.getElementById('productImage').value = productToUpdate.image;
      document.getElementById('productDescription').value = productToUpdate.description;
      document.getElementById('productCategory').value = productToUpdate.category;
      document.getElementById('productPrice').value = productToUpdate.price;
      document.getElementById('productStock').value = productToUpdate.stock;
      document.getElementById('addUpdateButton').textContent = 'Actualizar Producto';
      document.getElementById('cancelUpdateButton').style.display = 'block';
    }

    // Función para cancelar la edición del producto
    function cancelUpdate() {
      document.getElementById('productForm').reset();
      document.getElementById('addUpdateButton').textContent = 'Agregar Producto';
      document.getElementById('cancelUpdateButton').style.display = 'none';
    }

    // Función para buscar productos por nombre o categoría
    function searchProduct(searchTerm) {
      const searchTermLower = searchTerm.toLowerCase().trim();
      if (searchTermLower === '') {
        // Si el campo de búsqueda está vacío, mostramos todos los productos
        showProductsByCategory();
      } else {
        const filteredProducts = products.filter(product =>
          product.name.toLowerCase().includes(searchTermLower) || product.category.toLowerCase().includes(searchTermLower)
        );
        showProductsByCategory(filteredProducts);
      }
    }

// Evento para agregar productos desde el formulario
document.getElementById('productForm').addEventListener('submit', function (event) {
    event.preventDefault();
    addOrUpdateProduct();
  });
  

    // Mostrar todos los productos al cargar la página (puedes agregar productos de ejemplo aquí)
    showProductsByCategory();
















