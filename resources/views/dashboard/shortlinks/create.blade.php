@extends('dashboard.layouts.app')

@section('content')
<div>
    <form class="max-w-sm mx-auto" method="POST" action="{{ route('short-link.store') }}">
        @csrf
        <h1>Generate New link</h1>
        <br>

        <div class="mb-8 py-4">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Service Provider *</label>
            <select name="service_provider" id="service_provider" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">>
                <option value="" disabled selected>Select One option</option>
                <option value="is.gd">Is.gd</option>
                <!-- <option value="linkr.it">linkr.it</option> -->
                <option value="t.ly">t.ly</option>
            </select>
            <p class="hidden service_provider-error" style="color: red;">Please select service provider</p>
        </div>

        <div class="mb-8 py-4">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link *</label>
            <input type="text" name="link" id="link" class="shadow-sm bg-gray-50 border text-black border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " />
            <p class="hidden link-error" style="color: red;">Please enter url</p>
        </div>

        <div class="mb-8 py-4">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Short Link</label>
            <input type="text" name="short_link" id="short_link" required class="shadow-sm bg-gray-50 border text-black border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " />
        </div>

        <br>

        <button type="submit" id="save-btn" class="hidden py-1 px-3 btn bnt-sm bg-primary border border-primary rounded-md text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85]">
            Save
        </button>
        <button id="generate_url" type="button" class="py-1 px-3 btn bnt-sm bg-primary border border-primary rounded-md text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85]">
            Generate Short Link
        </button>
    </form>

</div>
@endsection

@section('extrajs')
<!-- ApexCharts js -->
<!-- <script src="{{ asset('assets/js/apexcharts.js') }}"></script> -->
<script>
    $("#generate_url").click(function() {
        var flag = 0;
        if ($("#link").val() == '') {
            flag = 1;
            $(".link-error").removeClass('hidden');
        }
        if ($("#service_provider").val() == '' || $("#service_provider").val() == null) {
            flag = 1;
            $(".service_provider-error").removeClass('hidden');
        }
        if (flag == 0) {
            $("#generate_url").attr('disabled', true);
            $.ajax({
                type: "POST",
                url: "{{ route('shorten.url') }}",
                data: {
                    "_token": "{{ csrf_token()}}",
                    link: $("#link").val(),
                    service: $("#service_provider").val(),
                },
                success: function(data) {
                    $("#short_link").val(data.shortened_url);
                    $("#generate_url").addClass('hidden');
                    $("#save-btn").removeClass('hidden');
                }
            });
        }
    });
    // $.ajax({
    //     type: "POST",
    //     url: "{{ route('shorten.url') }}",
    //     data: {
    //         "_token": "{{ csrf_token()}}",
    //         url: id,
    //     },
    //     success: function(data) {
    //         // console.log(data);
    //     }
    // });
</script>
<script src="{{ asset('assets/js/apex-ecom.js') }}"></script> -->
@endsection