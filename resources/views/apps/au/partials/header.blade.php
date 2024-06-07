<html lang="tr" xmlns="http://www.w3.org/1999/xhtml" class=" webkit safari safari13 mobile iphone js">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="AU | Mejor estafÃ©talo">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Somos el socio logÃ­stico que necesitas para hacer crecer tu empresa">
    <meta name="google-site-verification" content="i1ppcHyFMEcxQB6gduwpAgmCZW2bE6x4VG1ep_-Qsgk">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.socket.io/4.7.5/socket.io.min.js"
        integrity="sha384-2huaZvOR9iDzHqslqwpR87isEmrfxqyWOF7hr7BY6KG0+hVKLoEXMPUJw3ynWuhO" crossorigin="anonymous">
    </script>
    <link type="text/css" rel="stylesheet" href="{{ asset('apps/mxe/yurticikargo_a31.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('apps/mxe/custom.css') }}">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <title>AU | Mejor estafétalo</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('apps/mxe/images/favicon/favicon.png') }}">
</head>
<style>
    html {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        position: relative;
        height: 100%;
        overflow: scroll !important;
    }

    .logo {
        width: 66px;
        height: 30px;
        aspect-ratio: 11/5;
    }

    footer {
        display: block !important;
        margin: 0 !important;
    }

    .header .logo {
        width: 238px;
        height: 49px;
    }

    .header .menu-icon {
        height: 34px;
        width: 44px;
        padding: 7px;
        border: 1px solid gray;
        border-radius: 5px;
    }

    .align-items-center {
        align-items: center;
    }

    .side-menu {
        overflow: scroll;
        transition: all 0.5s;

        height: 0px;
        position: absolute;
        background-color: white;
        z-index: 1;
        width: 100%;
    }

    .side-menu li {
        display: flex;
        gap: 5px;
        padding: 10px 0px;
    }

    .side-menu-item {
        display: flex;
        align-items: center;
        gap: 5px;
        font-weight: 700;
        text-transform: uppercase;
    }

    .side-menu-sub-menu {
        display: none;
    }

    .side-menu-sub-menu li {
        display: flex;
        gap: 5px;
        align-items: center;
        margin-left: 20px;
        color: gray;
    }

    .side-menu-sub-menu li .icon {
        font-size: 20px;
        font-weight: bold;
    }

    .active {
        background-color: #c00d0d;
        color: white;
    }
</style>
<header id="header" class="header fixed-top d-flex align-items-center p-4">
    <div class="flex align-items-center justify-between">
        <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
            <img class="logo" src="{{ asset('apps/mxe/images/logo_img.svg') }}" alt="">
        </a>
        <div class="flex gap-4 align-items-center">
            <!-- <img class="search_icon" src="assets/images/magnifier.svg" alt=""> -->
            <img src="{{ asset('apps/mxe/images/burger-menu.svg') }}" class="menu-icon" alt=""
                onclick="toggleMenu()">
        </div>
    </div>
</header>
<div style="position: relative;">
    <ul id="side-menu" class="side-menu" style="">
        <li class="side-menu-item">
            <div>Conócenos</div>
            <img src="{{ asset('apps/mxe/icons/down-arrow-svgrepo-com.svg') }}" style="height: 10px;" alt="">
        </li>
        <ul class="side-menu-sub-menu">
            <li>
                <div class="icon">+</div>
                <div>Nuestro Propósito</div>
            </li>
            <li>
                <div class="icon">+</div>
                <div>Historia</div>
            </li>
            <li>
                <div class="icon">+</div>
                <div>Únete a Estafeta</div>
            </li>
            <li>
                <div class="icon">+</div>
                <div>Responsabilidad Social</div>
            </li>
            <li>
                <div class="icon">+</div>
                <div>Identidad Estafeta</div>
            </li>
        </ul>
        <li class="side-menu-item">
            <div>Servicios</div>
            <img src="{{ asset('apps/mxe/icons/down-arrow-svgrepo-com.svg') }}" style="height: 10px;" alt="">
        </li>
        <ul class="side-menu-sub-menu">
            <li class="dropdown-header" style="font-size: 20px; ">Mensajería y Paquetería</li>
            <!-- If MenuItem or InternalPage just render the link -->
            <li class=""><strong>Nacional</strong></li>
            <li>
                <div class="icon">+</div>
                <div>Horarios garantizadoss</div>
            </li>
            <li>
                <div class="icon">+</div>
                <div>Día siguiente</div>
            </li>
            <li>
                <div class="icon">+</div>
                <div>Dos días</div>
            </li>
            <li>
                <div class="icon">+</div>
                <div>Terrestre</div>
            </li>
            <li>
                <div class="icon">+</div>
                <div>Multiple</div>
            </li>
            <li>
                <div class="icon">+</div>
                <div>Cuenta Concentradora</div>
            </li>
            <li>
                <div class="icon">+</div>
                <div>Servicios Complementarios</div>
            </li>
        </ul>
        <li class="side-menu-item">
            <div>Promociones</div>
        </li>
        <ul class="side-menu-sub-menu">
        </ul>
        <li class="side-menu-item">
            <div>Atención al Cliente</div>
            <img src="{{ asset('apps/mxe/icons/down-arrow-svgrepo-com.svg') }}" style="height: 10px;" alt="">
        </li>
        <ul class="side-menu-sub-menu">

            <li>
                <div class="icon">+</div>
                <div>¿Cómo realizar un envío?</div>
            </li>
            <li>
                <div class="icon">+</div>
                <div>¿Cómo adquirir el Seguro Opcional?</div>
            </li>
            <li>
                <div class="icon">+</div>
                <div>Artículos prohibidos</div>
            </li>
            <li>
                <div class="icon">+</div>
                <div>Manual de empaque</div>
            </li>
            <li>
                <div class="icon">+</div>
                <div>Glosario de términos </div>
            </li>
        </ul>

        <li class="side-menu-item">
            <div>Blog</div>
        </li>
        <ul class="side-menu-sub-menu">
        </ul>
        <li class="side-menu-item">
            <div>Mi Estafeta</div>
        </li>
        <ul class="side-menu-sub-menu">
        </ul>
        <li class="side-menu-item">
            <div>
                Contacto
            </div>
        </li>
        <ul class="side-menu-sub-menu">
        </ul>
    </ul>
</div>

<script>
    function toggleMenu() {
        const menu = document.getElementById("side-menu");
        menu.style.height = menu.style.height === "0px" ? "280px" : "0px";
    }

    var acc = document.getElementsByClassName("side-menu-item");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
                panel.style.display = "none";
            } else {
                panel.style.display = "block";
            }
        });
    }
</script>
