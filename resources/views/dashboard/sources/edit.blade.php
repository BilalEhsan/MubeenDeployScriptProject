@extends('dashboard.layouts.app')

@section('content')
    <div>
        <form class="max-w-sm mx-auto" method="POST" action="{{ route('source.update', $source->id) }}">
            {{ csrf_field() }}
            <h1>Edit source</h1>
            <br>

            <div class="mb-8 py-4">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Source Path *</label>
                <input type="text" name="path" value="{{ $source->path }}" required
                    class="shadow-sm bg-gray-50 border text-black border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " />
            </div>
            <div class="mb-8 py-4">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Country name</label>
                {{-- <input type="text" name="country_name" value="{{ $source->country_name }}"
                    class="shadow-sm bg-gray-50 border text-black border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " /> --}}
                <select name="country_code"
                    class="shadow-sm bg-gray-50 border text-black border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option value=""></option>
                    @foreach ($countries as $key => $country)
                        <option value="{{ $key }}" {{ $key == $source->country_code ? 'selected' : '' }}>
                            {{ $country }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-8 py-4">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Project name *</label>
                <input type="text" name="project_name" value="{{ $source->project_name }}" required
                    class="shadow-sm bg-gray-50 border text-black border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " />
            </div>
            <div class="mb-8 py-4">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Domain name</label>
                <input type="text" name="domain_name" value="{{ $source->domain_name }}"
                    class="shadow-sm bg-gray-50 border text-black border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " />
            </div>

            <br>
            <button
                class="py-1 px-3 btn bnt-sm bg-primary border border-primary rounded-md text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85]">
                Save
            </button>
        </form>

    </div>
@endsection

@section('extrajs')
    <!-- ApexCharts js -->
    <!-- <script src="{{ asset('assets/js/apexcharts.js') }}"></script>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <script src="{{ asset('assets/js/apex-ecom.js') }}"></script> -->
@endsection
