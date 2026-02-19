let carrito = {};
document.addEventListener("DOMContentLoaded", () => {

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
                                            <a href="#" class="btn btn-outline-primary btn-lg mt-auto" onclick="addToCart(${service.id}); return false;">Buy now</a>
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

        document.getElementById("subtotal").innerText = "$" + data.subtotal.toFixed(2);
        document.getElementById("iva").innerText = "$" + data.iva.toFixed(2);
        document.getElementById("total").innerText = "$" + data.total.toFixed(2);

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
                <span>$${sub.toFixed(2)}</span>
            </div>
        `;
    });
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

        const sub = document.getElementById("subtotal");
        const iva = document.getElementById("iva");
        const total = document.getElementById("total");

        if (sub && iva && total) {
            sub.innerText = "$" + data.subtotal.toFixed(2);
            iva.innerText = "$" + data.iva.toFixed(2);
            total.innerText = "$" + data.total.toFixed(2);
        }
    });
}


