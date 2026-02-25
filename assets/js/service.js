document.addEventListener("DOMContentLoaded", () => {

    /* ================================
       REFERENCIAS A ELEMENTOS
    ================================= */

    const modalCarrito = document.getElementById("modalCarrito");
    const modalCotizacion = document.getElementById("modalCotizacion");

    const openModal = document.querySelector('.btn.btn-warning.btn-lg.px-60');
    const openModal2 = document.getElementById("btnVerCarrito");

    const btnCotizar = document.getElementById("btnCotizar");

    const closeCarrito = document.getElementById("cerrarModal");
    const closeCotizacion = document.getElementById("cerrarModalCotizacion");


    /* ================================
       FUNCIONES AUXILIARES
    ================================= */

    function abrir(modal) {
        if (modal) modal.classList.add("modal-show");
    }

    function cerrar(modal) {
        if (modal) modal.classList.remove("modal-show");
    }


    /* ================================
       ABRIR MODAL CARRITO
    ================================= */

    // Desde ícono principal
    openModal?.addEventListener("click", () => {
        abrir(modalCarrito);
    });

    // Desde botón lateral
    openModal2?.addEventListener("click", () => {
        abrir(modalCarrito);
    });


    /* ================================
       CERRAR MODAL CARRITO
    ================================= */

    closeCarrito?.addEventListener("click", (e) => {
        e.preventDefault();
        cerrar(modalCarrito);
    });


    /* ================================
       BOTÓN COTIZAR
    ================================= */

    btnCotizar?.addEventListener("click", function (e) {

        e.preventDefault();

        let total = parseFloat(
            document.getElementById("total").innerText.replace("$", "")
        );

        let cantidadItems = Object.values(carrito).length;

        if (cantidadItems === 0) {
            alert("No puedes cotizar sin items en el carrito.");
            return;
        }

        if (total < 100) {
            alert("El total debe ser mayor o igual a $100 para cotizar.");
            return;
        }

        // Cerrar carrito
        cerrar(modalCarrito);

        // Abrir cotización
        abrir(modalCotizacion);

    });


    /* ================================
       CERRAR MODAL COTIZACIÓN
    ================================= */

    closeCotizacion?.addEventListener("click", (e) => {
        e.preventDefault();
        cerrar(modalCotizacion);
        abrir(modalCarrito); // vuelve al carrito
    });

});