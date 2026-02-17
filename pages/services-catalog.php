<?php
    include_once '../classes/Service.class.php';
  $servicesInformatica = [
    new Service(1, "Mantenimiento PC", "Limpieza completa", 35, "Limpieza interna y optimización del sistema.", "Informática"),
    new Service(2, "Instalación Windows", "Sistema original", 50, "Instalación de Windows con drivers.", "Informática"),
    new Service(3, "Formateo", "Reinstalación", 45, "Borrado total y sistema nuevo.", "Informática"),
    new Service(4, "Optimización", "Rendimiento", 30, "Mejora de velocidad del equipo.", "Informática"),
    new Service(5, "Instalación Office", "Paquete Office", 25, "Instalación de Word, Excel y PowerPoint.", "Informática"),
    new Service(6, "Actualización BIOS", "Firmware", 40, "Actualización segura del BIOS.", "Informática"),
    new Service(7, "Clonación de disco", "Migración", 60, "Clonación de información a SSD o HDD.", "Informática"),
    new Service(8, "Configuración impresora", "Drivers", 20, "Instalación y pruebas de impresora.", "Informática"),
    new Service(9, "Recuperación de datos", "Básica", 50, "Recuperación de archivos eliminados.", "Informática"),
    new Service(10, "Instalación software", "Programas", 15, "Instalación de programas solicitados.", "Informática"),
    new Service(11, "Configuración usuario", "Perfil", 10, "Creación de usuarios y ajustes.", "Informática"),
    new Service(12, "Diagnóstico PC", "Revisión", 20, "Evaluación completa del equipo.", "Informática"),
];
$servicesRedes = [
    new Service(13, "Red doméstica", "WiFi", 60, "Configuración de red inalámbrica.", "Redes"),
    new Service(14, "Configuración router", "Conectividad", 40, "Ajuste de parámetros del router.", "Redes"),
    new Service(15, "Extensor WiFi", "Cobertura", 35, "Instalación de repetidor.", "Redes"),
    new Service(16, "Cableado estructurado", "UTP", 80, "Instalación de cableado de red.", "Redes"),
    new Service(17, "Servidor local", "LAN", 120, "Configuración básica de servidor.", "Redes"),
    new Service(18, "Configuración switch", "Red interna", 50, "Configuración de switch.", "Redes"),
    new Service(19, "Firewall de red", "Seguridad", 90, "Protección perimetral de red.", "Redes"),
    new Service(20, "VPN", "Acceso remoto", 100, "Acceso remoto seguro.", "Redes"),
    new Service(21, "Diagnóstico de red", "Problemas", 30, "Detección de fallas.", "Redes"),
    new Service(22, "IP fija", "Configuración", 25, "Asignación de IP manual.", "Redes"),
    new Service(23, "Configuración DNS", "Dominio", 45, "Configuración de DNS.", "Redes"),
    new Service(24, "Monitoreo de red", "Tráfico", 70, "Supervisión de actividad.", "Redes"),
];
$servicesSeguridad = [
    new Service(25, "Antivirus", "Protección", 20, "Instalación de antivirus.", "Seguridad"),
    new Service(26, "Backup de datos", "Respaldo", 30, "Copias de seguridad.", "Seguridad"),
    new Service(27, "Cifrado de archivos", "Privacidad", 60, "Protección de información sensible.", "Seguridad"),
    new Service(28, "Control parental", "Familia", 25, "Restricciones de contenido.", "Seguridad"),
    new Service(29, "Recuperación sistema", "Restauración", 50, "Restauración del sistema.", "Seguridad"),
    new Service(30, "Firewall PC", "Protección", 40, "Configuración de firewall.", "Seguridad"),
    new Service(31, "Eliminación de virus", "Malware", 35, "Limpieza de amenazas.", "Seguridad"),
    new Service(32, "Gestión contraseñas", "Seguridad", 20, "Organización de contraseñas.", "Seguridad"),
    new Service(33, "Auditoría seguridad", "Evaluación", 80, "Revisión completa de seguridad.", "Seguridad"),
    new Service(34, "Actualizaciones", "Parches", 15, "Actualización de software.", "Seguridad"),
    new Service(35, "Bloqueo USB", "Puertos", 25, "Bloqueo de dispositivos externos.", "Seguridad"),
    new Service(36, "Monitoreo actividad", "Control", 60, "Seguimiento de acciones.", "Seguridad"),
];
$servicesWeb = [
    new Service(37, "Página web básica", "Landing Page", 150, "Página informativa para negocios.", "Servicios"),
    new Service(38, "Tienda online", "Ecommerce", 300, "Venta de productos en línea.", "Servicios"),
    new Service(39, "Registro dominio", "Identidad digital", 25, "Compra de dominio web.", "Servicios"),
    new Service(40, "Hosting", "Alojamiento", 60, "Hospedaje web anual.", "Servicios"),
    new Service(41, "Correo empresarial", "Email", 80, "Configuración de correos corporativos.", "Servicios"),
    new Service(42, "SEO", "Posicionamiento", 100, "Optimización en buscadores.", "Servicios"),
    new Service(43, "Formulario web", "Contacto", 40, "Formulario de contacto.", "Servicios"),
    new Service(44, "Mantenimiento web", "Soporte", 70, "Actualizaciones y soporte.", "Servicios"),
    new Service(45, "Diseño UI", "Interfaz", 120, "Diseño visual del sitio.", "Servicios"),
    new Service(46, "Certificado SSL", "Seguridad", 30, "HTTPS para el sitio.", "Servicios"),
    new Service(47, "Integración pagos", "Pasarela", 90, "Pagos en línea.", "Servicios"),
    new Service(48, "Chat web", "Atención", 50, "Chat en vivo para clientes.", "Servicios"),
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/styles.css">
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!-- Font Awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>

    <header class="m-2 ">
        <div class="container-lg  justify-content-between d-flex align-items-center">
            <h1 class="">Titulo</h1>
            <div class=""><button type="button" class="btn btn-warning btn-lg px-60"><i class="bi bi-cart-fill"></i></button></div>
        </div>
    </header>
   
<!-- Modal -->
     <section class="modalc3">
        <div class="calculo">
           <h2>Calculos</h2>
           <button type="button" class="btn btn-warning">Cerrar</button>
        </div>
     </section>

         <section class="modalc2">
        <div class="calculo">
           <h2>Calculos</h2>
           <button type="button" class="btn btn-primary">Cerrar</button>
        </div>
     </section>

    <section class="modalc">
        <div class="calculo">
           <h2>Calculos</h2>
           <button type="button" class="btn btn-success">Cerrar</button>
        </div>
     </section>

 <section class="modal">
    <div class="carrito">
        <h2>Carrito de Compras</h2>
        <div class="close"><i class="bi bi-x-circle-fill"></i></div>      
    </div>
 </section>
<!--fin del modal -->    

    <div class="container-lg">
        <div class="">
            <ul class="navbar-nav d-flex flex-row justify-content-around text-center">
                <li class="nav-item mx-2">
                    <a class="nav-link gap" href="#">Catalogo</a>
                </li><li class="nav-item mx-2">
                    <a class="nav-link" href="#">Catalogo</a>
                </li><li class="nav-item mx-2">
                    <a class="nav-link" href="#">Catalogo</a>
                </li><li class="nav-item mx-2">
                    <a class="nav-link" href="#">Catalogo</a>
                </li>
            </ul>
        </div>
        <!--aqui iran las cartas-->
        <div class="row align-items-start">
            <div class="col-md-12 col-lg-8 my-2">
                <div class="row justify-content-center">
                    
                   
                    <?php
                    
                        foreach($servicesInformatica as $service)
                            {
                                echo '
                                <div class="col-md-4 col-lg-6 col-xl-4 col-5 my-2 d-flex">
                                    <div class="card border-1 rounded-3 shadow-sm h-100 w-100">
                                        <div class="card-body text-center py-3 align-items-center d-flex flex-column">
                                            <h4 class="card-title">'.$service->getTitle().'</h4>
                                            <p class="lead card-subtitle">'.$service->getSubtitle().'</p>
                                            <p class="display-5 my-4 text-primary fw-bold">'.$service->getPrice().'</p>
                                            <p class="card-text mx-5 text-muted d-none d-lg-block">
                                                '.$service->getDescription().'
                                            </p>
                                            <a href="#" class="btn btn-outline-primary btn-lg mt-auto">Buy now</a>
                                        </div>
                                    </div>
                                </div>
                                ';
                            }
                    ?>            
                    
                </div>
            </div>
           <div class="stickySection col-4 d-none d-lg-block my-3">
                
                <ol class="list-group h-100 overflow-auto">
                    <li class="bg-success list-group-item d-flex justify-content-between align-items-center">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Servicios seleccionados</div>
                    </div>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">primer item</div>
                        Cras justo odio
                    </div>
                    <button class="btn btn-sm bg-primary rounded c">ver calculos</button>    
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">segundo item</div>
                        Cras justo odio
                    </div>
                    <button class="btn btn-sm bg-primary rounded c2">ver calculos</button>    
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">tercer item</div>
                        Cras justo odio
                    </div>
                    <button class="btn btn-sm bg-primary rounded c3">ver calculos</button>    
                    </li>
                    <li class="border-0 my-3 d-flex justify-content-end align-items-center">
                    <button class="btn btn-sm  bg-success rounded text-center py-2 px-2">ver items en carrito</button>    
                    </li>
                </ol>

            </div>
        </div>
            
        

    </div>
    

<script src="../assets/service.js"></script>
</body>
</html>