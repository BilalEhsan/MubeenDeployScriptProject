@extends('dashboard.layouts.app')

@section('content')
    <div>
        <form class="max-w-sm mx-auto" method="POST" action="{{ route('admin-user.update', $user->id) }}">
            {{ csrf_field() }}
            @method('PATCH')
            <h1>Update admin</h1>
            <br>

            <div class="mb-8 py-4">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">username *</label>
                <input type="text" name="username" required value="{{ $user->username }}"
                    class="shadow-sm bg-gray-50 border text-black border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " />
            </div>

            <div class="mb-8 py-4">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">password *</label>
                <input type="text" name="password" required value="{{ $user->password }}"
                    class="shadow-sm bg-gray-50 border text-black border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " />
            </div>


            <div class="mb-8 py-4">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">type</label>
                <select name="type" required
                    class="shadow-sm bg-gray-50 border text-black border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <option value="1" {{ $user->type ? 'selected' : '' }}>administrator
                    </option>
                    <option value="0" {{ !$user->type ? 'selected' : '' }}>sub-account
                    </option>
                </select>
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
