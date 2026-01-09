let products = [];

function addProduct() {
    const codigo = document.getElementById('codigo').value;
    const cantidad = parseInt(document.getElementById('cantidad').value);

    if (isNaN(cantidad) || cantidad <= 0) {
        alert('Por favor ingrese una cantidad válida');
        return;
    }
    
    fetch(`getProduct.php?codigo=${codigo}`)
        .then(response => response.json())
        .then(data => {
            if (data) {
                const producto = {
                    codigo: data.clvProd,
                    nombre: data.nombreProd,
                    cantidad: cantidad,
                    precio: data.precioAct,
                    total: data.precioAct * cantidad
                };
                
                products.push(producto);
                updateTable();
                updateTotal();
                clearFormFields();
            } else {
                alert('Producto no encontrado');
            }
        });
}

function updateTable() {
    const tableBody = document.querySelector('#productTable tbody');
    tableBody.innerHTML = '';
    
    products.forEach(producto => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${producto.codigo}</td>
            <td>${producto.nombre}</td>
            <td><input type="number" value="${producto.cantidad}" onchange="updateQuantity('${producto.codigo}', this.value)"></td>
            <td>${producto.precio}</td>
            <td>${producto.total}</td>
            <td><button onclick="removeProduct('${producto.codigo}')">Eliminar</button></td>
        `;
        tableBody.appendChild(row);
    });
}

function updateTotal() {
    const total = products.reduce((sum, producto) => sum + producto.total, 0);
    document.getElementById('total').innerText = total.toFixed(2);
}

function removeProduct(codigo) {
    products = products.filter(producto => producto.codigo !== codigo);
    updateTable();
    updateTotal();
}

function updateQuantity(codigo, cantidad) {
    products = products.map(producto => {
        if (producto.codigo === codigo) {
            producto.cantidad = parseInt(cantidad);
            producto.total = producto.precio * producto.cantidad;
        }
        return producto;
    });
    updateTotal();
}

function finalizeSale() {
    if (products.length === 0) {
        alert('No hay productos en la venta');
        return;
    }
    
    fetch('finalizeSale.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ products })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Venta realizada con éxito');
            products = [];
            updateTable();
            updateTotal();
        } else {
            alert('Error al finalizar la venta consulte el stock');
        }
    });
}

function clearFormFields() {
    document.getElementById('codigo').value = '';
    document.getElementById('cantidad').value = '';
}
