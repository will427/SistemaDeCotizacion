document.addEventListener("DOMContentLoaded", () => {

    const modalCarrito = document.getElementById("modalCarrito");
    const modalCotizacion = document.getElementById("modalCotizacion");

    const openModal = document.querySelector('.btn.btn-warning.btn-lg.px-60');
    const openModal2 = document.getElementById("btnVerCarrito");
    const btnCotizar = document.getElementById("btnCotizar");
    
    const closeCarrito = document.getElementById("cerrarModal");
    const closeCotizacion = document.getElementById("cerrarModalCotizacion");

    function abrir(modal){
        if(modal) modal.classList.add("modal-show");
    }

    function cerrar(modal){
        if(modal) modal.classList.remove("modal-show");
    }

    // ===== ABRIR CARRITO DESDE ICONO =====
    openModal?.addEventListener("click", () => {
        abrir(modalCarrito);
    });

    // ===== ABRIR CARRITO DESDE BOTÓN LATERAL =====
    openModal2?.addEventListener("click", () => {
        abrir(modalCarrito);
    });

    // ===== CERRAR CARRITO =====
    closeCarrito?.addEventListener("click", (e) => {
        e.preventDefault();
        cerrar(modalCarrito);
    });

   document.getElementById("btnCotizar")?.addEventListener("click", function (e) {

    e.preventDefault();

    let total = parseFloat(document.getElementById("total").innerText.replace("$", ""));
    let cantidadItems = Object.values(carrito).length;

    if (cantidadItems === 0) {
        alert("No puedes cotizar sin items en el carrito.");
        return;
    }

    if (total < 100) {
        alert("El total debe ser mayor o igual a $100 para cotizar.");
        return;
    }

    // cerrar carrito
    document.getElementById("modalCarrito").classList.remove("modal-show");

    // abrir cotización
    document.getElementById("modalCotizacion").classList.add("modal-show");

});

    closeCotizacion?.addEventListener("click", (e) => {
        e.preventDefault();
        cerrar(modalCotizacion);
        abrir(modalCarrito); // vuelve al carrito
    });

});