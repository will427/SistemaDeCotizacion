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
                                            <a href="#" class="btn btn-outline-primary btn-lg mt-auto">Buy now</a>
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
