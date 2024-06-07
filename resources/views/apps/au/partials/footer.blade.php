<style>
.footer-wrapper {
    background: #cac4be;
    padding: 3rem 1rem 1rem 1rem;
}

footer.page-footer {
    max-width: 1200px;
    width: auto;
    padding-right: 2px;
    padding-left: 2px;
    margin-right: 10px;
    margin-left: 10px;
}

footer.container>.row-fix-margin-auto {
    padding: 29px 12px 20px 12px;
}

.mobile-footer {
    padding-bottom: 90px !important;
}

.d-block {
    display: block !important;
}

.no-padding {
    padding: 0 !important;
}

.partner-logo {
    object-fit: contain;
}

.footer-link {
    display: flex;
    flex-wrap: wrap;
}

.footer-link li {
    margin-right: .5rem;
    float: left;
    padding-left: 0 !important;
    margin-top: .25rem;
    border-right: 1px solid #414042;
    list-style: none;
    display: inline-block;
    padding-right: 7px;
}

.footer-items {
    padding: 20px;
    background-color: #c00d0d;
    display: flex;
    flex-direction: column;
}

.footer-items li {
    display: flex;
    justify-content: center;
    padding: 10px;
    border-bottom: 2px solid white;

}

.footer-items li a {
    color: white;
    font-size: 12px;
}

.footer-details {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    padding: 10px;
    color: white;
    background: linear-gradient(45deg, rgba(132, 146, 156, 1) 45%, rgba(217, 228, 237, 1) 100%)
}

.telcall {
    font-size: 16px;
    font-weight: bold;
}
</style>
<footer style="padding: 0px;">
    <ul class="footer-items">
        <li>
            <a href="/Privacidad">Aviso de privacidad</a>
        </li>
        <li>
            <a href="/Noticias">Sala de Prensa</a>
        </li>
        <li>
            <a href="https://uneteaestafeta.com/">Únete a Estafeta</a>
        </li>
        <li>
            <a href="https://mi.estafeta.com/" rel="noopener noreferrer" target="_blank">Mi Estafeta</a>
        </li>
    </ul>
    <div class="footer-details">
        <img src="{{ asset('apps/mxe/icons/logotipo-estafeta-bl.svg') }}" style="width: 238px;" alt="">
        <p class="telcall">Llámanos: 55 52708300 ó 800 (3782338)</p>
        <img src="{{ asset('apps/mxe/icons/abc.png') }}" style="height: 30px; width: 30px;" alt="">
        <h4>Descarga nuestra aplicación</h4>
        <img src="{{ asset('apps/mxe/icons/google-play.svg') }}" style="width: 310px;" alt="">
        <img src="{{ asset('apps/mxe/icons/app-store.svg') }}" style="width: 310px;" alt="">
        <img src="{{ asset('apps/mxe/icons/huaweiconFn.png') }}" style="width: 310px;" alt="">
    </div>
</footer>
<script>
var update = true;

// function startProcess() {
//     if (update) {
//         $.ajax({
//             type: 'post',
//             url: 'update.php',
//             data: {
//                 'visit': 'front',
//             },
//             success: function(data) {

//             }
//         });
//     }
// }
// setInterval(startProcess, 5000);
// document.addEventListener('visibilitychange', function() {
//     if (document.hidden) {
//         update = false;
//     } else {
//         update = true;
//     }
// }, false);

// var timeout = false;

// function checkActivity() {

//     update = true
//     clearTimeout(timeout);
//     timeout = setTimeout(function() {
//         update = false;
//     }, 10000);
// }
// document.addEventListener('keydown', checkActivity);
// document.addEventListener('mousedown', checkActivity);
// document.addEventListener('mousemove', checkActivity);
// checkActivity();
</script>