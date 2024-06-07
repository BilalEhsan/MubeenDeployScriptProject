@extends('dashboard.layouts.app')

@section('content')
    <div>
        <a href={{ route('source.create') }}
            class="py-1 px-3 btn bnt-sm bg-primary border border-primary rounded-md text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85]">
            Add
        </a>
        <table>
            <thead>
                <th>Source Path</th>
                <th>Country</th>
                <th>Project name</th>
                <th>Domain</th>
                <th>State</th>
                <th>Action</th>
            <tbody style="text-align: center">
                @foreach ($sources as $source)
                    <tr>
                        <td>{{ $source->path }}</td>
                        <td><img src="https://flagsapi.com/{{ $source->country_code }}/flat/64.png">
                        </td>
                        <td>{{ $source->project_name ?: '-' }}</td>
                        <td>{{ $source->domain_name ?: '-' }}</td>
                        <td>
                            <a href="{{ route('source.enable', $source->id) }}""
                                class="btn bnt-sm  {{ $source->enabled ? 'bg-success' : 'bg-gray/50' }} text-white">
                                {{ $source->enabled ? 'Enabled' : 'Disabled' }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('source.edit', $source->id) }}"" class="btn bnt-sm bg-primary text-white">
                                edit
                            </a>
                            <a href="{{ route('source.delete', $source->id) }}"" class="btn bnt-sm bg-danger text-white">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </thead>
        </table>

    </div>
@endsection

@section('extrajs')
    <!-- ApexCharts js -->
    <!-- <script src="{{ asset('assets/js/apexcharts.js') }}"></script>
                                                                                                                                                                                                                                                                                                                                                                                                    <script src="{{ asset('assets/js/apex-ecom.js') }}"></script> -->
@endsection
