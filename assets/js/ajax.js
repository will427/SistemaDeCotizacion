let carrito = {};
document.addEventListener("DOMContentLoaded", () => {
cargarCarritoInicial();
function cargarServicios(cat) {
    fetch(`services-catalog.php?ajax=1&cat=${encodeURIComponent(cat)}`)
        .then(res => res.json())
        .then(data => renderServicios(data))
        .catch(err => console.error("ERROR AJAX:", err));
}

function renderServicios(servicios) {
    const contenedor = document.getElementById("contenedorServicios");
    contenedor.innerHTML = "";
    console.log("SERVICIOS RECIBIDOS:", servicios);

    servicios.forEach(service => {
        contenedor.innerHTML += `
       <div class="col-md-4 col-lg-6 col-xl-4 col-5 my-2 d-flex">
                                    <div class="card border-1 rounded-3 shadow-sm h-100 w-100">
                                        <div class="card-body text-center py-3 align-items-center d-flex flex-column">
                                            <h4 class="card-title">${service.title}</h4>
                                            <p class="lead card-subtitle">${service.subtitle}</p>
                                            <p class="display-5 my-4 text-primary fw-bold">$${service.price}</p>
                                            <p class="card-text mx-5 text-muted d-none d-lg-block">
                                                ${service.description}
                                            </p>
                                            <a href="#" class="btn btn-outline-primary btn-lg mt-auto" onclick="addToCart(${service.id}); return false;">agregar</a>
                                        </div>
                                    </div>
                                </div>`;
    });
}

// filtros
document.querySelectorAll(".filtro").forEach(btn => {
    btn.addEventListener("click", () => {
        cargarServicios(btn.dataset.cat);
    });
});

// carga inicial
cargarServicios("Informática");

});
function addToCart(id){
    fetch('../api/add-to-cart.php', {
        method: 'POST',
        headers: {'Content-Type':'application/x-www-form-urlencoded'},
        body: `id=${id}`
    })    
    .then(res => res.json())
    .then(data => {
        carrito = data.cart;
        renderCarrito();
        renderSeleccionados();
        actualizarContadorCarrito();
        document.getElementById("subtotal").innerText = "$" + data.subtotal.toFixed(2);
        document.getElementById("iva").innerText = "$" + data.iva.toFixed(2);
        document.getElementById("total").innerText = "$" + data.total.toFixed(2);
        document.getElementById("descuento").innerText ="$" + data.descuento.toFixed(2);

        abrirModal();
    })
    .catch(err => console.error("ERROR:", err));

    
}


function renderCarrito() {
    const contenedor = document.getElementById("listaCarrito");
    contenedor.innerHTML = "";

    Object.values(carrito).forEach(item => {
        const sub = item.precio * item.cantidad;

        contenedor.innerHTML += `
    <div class="d-flex justify-content-between align-items-center border-bottom py-2">
        <div>
            <strong>${item.nombre}</strong><br>
            $${item.precio} x 
            <input type="number" min="1" max="10" value="${item.cantidad}"
                onchange="updateQty(${item.id}, this.value)"
                class="form-control d-inline-block w-25">
        </div>

        <div class="text-end">
            <span>$${sub.toFixed(2)}</span><br>
            <button class="btn btn-sm btn-danger mt-1"
                onclick="removeFromCart(${item.id})">
                Eliminar
            </button>
        </div>
    </div>
`;
    });
}
function renderSeleccionados() {

    const contenedor = document.getElementById("contenedorItems");
    const btn = document.getElementById("btnVerCarrito");

    contenedor.innerHTML = "";

    const items = Object.values(carrito);

    if (items.length === 0) {
        btn.classList.add("d-none");
        return;
    }

    items.forEach(item => {
        contenedor.innerHTML += `
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">
                        ${item.nombre}
                        <span class="badge bg-primary rounded-pill">
                            x${item.cantidad}
                        </span>
                    </div>
                    $${item.precio}
                </div>
            </li>
        `;
    });

    btn.classList.remove("d-none");
}
function actualizarContadorCarrito(){

    let totalItems = 0;

    Object.values(carrito).forEach(item => {
        totalItems += parseInt(item.cantidad);
    });

    const badge = document.getElementById("contadorCarrito");

    if(badge){
        badge.innerText = totalItems;

        // ocultar si está vacío
        if(totalItems === 0){
            badge.classList.add("d-none");
        } else {
            badge.classList.remove("d-none");
        }
    }
}

function abrirModal(){
    document.getElementById("modalCarrito").classList.add("show");
}

document.getElementById("cerrarModal").addEventListener("click", () => {
    document.getElementById("modalCarrito").classList.remove("show");
});

function updateQty(id, qty){

    fetch('../api/update-cart.php', {
        method: 'POST',
        headers: {'Content-Type':'application/x-www-form-urlencoded'},
        body: `id=${id}&qty=${qty}`
    })
    .then(res => res.json())
    .then(data => {

        carrito = data.cart;
        renderCarrito();

        renderSeleccionados();
        actualizarContadorCarrito();

        const sub = document.getElementById("subtotal");
        const iva = document.getElementById("iva");
        const total = document.getElementById("total");
        const descuento = document.getElementById("descuento");

        if (sub) sub.innerText = "$" + data.subtotal.toFixed(2);
        if (iva) iva.innerText = "$" + data.iva.toFixed(2);
        if (total) total.innerText = "$" + data.total.toFixed(2);
        if (descuento) descuento.innerText = "$" + data.descuento.toFixed(2);

    })
    .catch(err => console.error("ERROR UPDATE:", err));
}

function removeFromCart(id){
    fetch('../api/remove-from-cart.php', {
        method: 'POST',
        headers: {'Content-Type':'application/x-www-form-urlencoded'},
        body: `id=${id}`
    })
    .then(res => res.json())
    .then(data => {
        carrito = data.cart;

        renderCarrito();
        renderSeleccionados();
        actualizarContadorCarrito();

        document.getElementById("subtotal").innerText = "$" + data.subtotal.toFixed(2);
        document.getElementById("iva").innerText = "$" + data.iva.toFixed(2);
        document.getElementById("total").innerText = "$" + data.total.toFixed(2);
    })
    .catch(err => console.error("ERROR:", err));
}
function cargarCarritoInicial() {
    fetch('../api/get-list-items.php')
        .then(res => res.json())
        .then(data => {
            carrito = data.cart;

            renderSeleccionados();
            renderCarrito();
            actualizarContadorCarrito();

            document.getElementById("subtotal").innerText = "$" + data.subtotal.toFixed(2);
            document.getElementById("iva").innerText = "$" + data.iva.toFixed(2);
            document.getElementById("total").innerText = "$" + data.total.toFixed(2);
        })
        .catch(err => console.error("Error cargando carrito:", err));
}

document.getElementById("formCotizacion").addEventListener("submit", function(e){
    e.preventDefault();

    const formData = new FormData(this);

    fetch('../api/process-quote.php', {
        method: 'POST',
        body: formData
    })
    .then(res => res.json())
    .then(data => {

        if(data.error){
            alert(data.error);
            return;
        }

        let itemsHTML = "";

        Object.values(data.items).forEach(item => {
            itemsHTML += `
                <div class="d-flex justify-content-between border-bottom py-1">
                    <span>${item.nombre} (x${item.cantidad})</span>
                    <span>$${(item.precio * item.cantidad).toFixed(2)}</span>
                </div>
            `;
        });

        document.getElementById("detalleConfirmacion").innerHTML = `
            <p><strong>Código:</strong> ${data.codigo}</p>
            <p><strong>Cliente:</strong> ${data.nombre}</p>
            <p><strong>Empresa:</strong> ${data.empresa}</p>
            <p><strong>Email:</strong> ${data.email}</p>
            <p><strong>Teléfono:</strong> ${data.telefono}</p>
            <p><strong>Fecha generación:</strong> ${data.fecha_generacion}</p>
            <p><strong>Válida hasta:</strong> ${data.fecha_validez}</p>
            <hr>
            ${itemsHTML}
            <hr>
            <p><strong>Subtotal:</strong> $${data.subtotal}</p>
            <p><strong>Descuento:</strong> $${data.descuento}</p>
            <p><strong>IVA:</strong> $${data.iva}</p>
            <p class="fs-4"><strong>Total:</strong> $${data.total}</p>
        `;

        document.getElementById("modalCotizacion").classList.remove("modal-show");
        document.getElementById("modalConfirmacion").classList.add("modal-show");

    })
    .catch(err => console.error("ERROR COTIZACION:", err));
});
document.getElementById("cerrarModalConfirmacion")?.addEventListener("click", function (e) {

    e.preventDefault();

    fetch('../api/clear-cart.php')
        .then(res => res.json())
        .then(() => {
            
            carrito = {};
            document.getElementById("listaCarrito").innerHTML = "";
            document.getElementById("contenedorItems").innerHTML = "";

            document.getElementById("subtotal").innerText = "$0.00";
            document.getElementById("descuento").innerText = "$0.00";
            document.getElementById("iva").innerText = "$0.00";
            document.getElementById("total").innerText = "$0.00";
            actualizarContadorCarrito();

            document.getElementById("modalConfirmacion").classList.remove("modal-show");
            document.getElementById("modalCotizacion").classList.remove("modal-show");
            document.getElementById("modalCarrito").classList.remove("modal-show");
        });

});

