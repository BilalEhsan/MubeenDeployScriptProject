@extends('dashboard.layouts.app')

@section('content')
<div>
    <table>
        <thead>
            <th>Username</th>
            <th>IP</th>
            <th>Login Time</th>
            <th>Last Activity</th>
            <th>Action</th>
        </thead>
        <tbody style="text-align: center">
            @foreach ($users as $activity)
            <tr>
                <td>{{$activity->user->username}}</td>
                <td>{{$activity->ip}}</td>
                <td>{{date('Y-m-d h:i A',strtotime($activity->login_time))}}</td>
                <td>{{date('Y-m-d h:i A',strtotime($activity->last_activity_time))}}</td>
                <td><a href="javascript:;" class="btn bnt-sm bg-danger text-white" onclick="event.preventDefault();
                                document.getElementById('delete-form-{{ $activity->user_id }}').submit();">

                        remove
                    </a>
                    <form id="delete-form-{{ $activity->user_id }}" action="{{ route('active-user.destroy') }}" method="POST" style="display: none;">
                        <input type="hidden" name="user_id" value="{{ $activity->user_id }}">
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