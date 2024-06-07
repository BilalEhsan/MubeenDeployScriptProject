@extends('dashboard.layouts.app')

@section('content')
<div>
    <a href={{ route('short-links.create') }} class="py-1 px-3 btn bnt-sm bg-primary border border-primary rounded-md text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85]">
        Add
    </a>
    <table>
        <thead>
            <th>Actual Link</th>
            <th>short link</th>
            <th>Service</th>
            <th>created at</th>
            <th>Action</th>
        </thead>
        <tbody style="text-align: center">
            @foreach ($links as $link)
            <tr>
                <td>{{$link->link}}</td>
                <td><a href="{{$link->short_link}}" target="_blank">{{$link->short_link}}</a></td>
                <td>{{$link->service}}</td>
                <td>{{date('Y-m-d h:i A',strtotime($link->created_at))}}</td>
                <td><a href="javascript:;" class="btn bnt-sm bg-danger text-white" onclick="event.preventDefault();
                                document.getElementById('delete-form-{{ $link->id }}').submit();">

                        remove
                    </a>
                    <form id="delete-form-{{ $link->id }}" action="{{ route('short-link.destroy') }}" method="POST" style="display: none;">
                        <input type="hidden" name="link_id" value="{{ $link->id }}">
                        @csrf
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection

@section('extrajs')

@endsection