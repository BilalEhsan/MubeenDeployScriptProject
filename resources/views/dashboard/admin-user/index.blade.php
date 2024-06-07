@extends('dashboard.layouts.app')

@section('content')
    <div>
        <a href={{ route('admin-user.create') }}
            class="py-1 px-3 btn bnt-sm bg-primary border border-primary rounded-md text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85]">
            Add
        </a>
        <table>
            <thead>
                <th>Username</th>
                <th>Password</th>
                <th>User type</th>
                <th>Action</th>
            <tbody style="text-align: center">
                @foreach ($users as $user)
                    @if (Auth::user()->id != $user->id)
                        <tr>
                            <td>{{ $user->username ?: '-' }}</td>
                            <td>
                                <input name="password" type="password" value="{{ $user->password ?: '-' }}"
                                    class="shadow-sm bg-transparent border text-white  text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 "
                                    id="password{{ $user->id }}">
                                <button class="input-group-text" onclick="password_show_hide('{{ $user->id }}');">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M18 12C18 15.3137 15.3137 18 12 18C8.68629 18 6 15.3137 6 12C6 8.68629 8.68629 6 12 6C15.3137 6 18 8.68629 18 12Z"
                                            fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12 1.25C12.4142 1.25 12.75 1.58579 12.75 2V3C12.75 3.41421 12.4142 3.75 12 3.75C11.5858 3.75 11.25 3.41421 11.25 3V2C11.25 1.58579 11.5858 1.25 12 1.25ZM1.25 12C1.25 11.5858 1.58579 11.25 2 11.25H3C3.41421 11.25 3.75 11.5858 3.75 12C3.75 12.4142 3.41421 12.75 3 12.75H2C1.58579 12.75 1.25 12.4142 1.25 12ZM20.25 12C20.25 11.5858 20.5858 11.25 21 11.25H22C22.4142 11.25 22.75 11.5858 22.75 12C22.75 12.4142 22.4142 12.75 22 12.75H21C20.5858 12.75 20.25 12.4142 20.25 12ZM12 20.25C12.4142 20.25 12.75 20.5858 12.75 21V22C12.75 22.4142 12.4142 22.75 12 22.75C11.5858 22.75 11.25 22.4142 11.25 22V21C11.25 20.5858 11.5858 20.25 12 20.25Z"
                                            fill="currentColor"></path>
                                        <g opacity="0.3">
                                            <path
                                                d="M4.39838 4.39838C4.69127 4.10549 5.16615 4.10549 5.45904 4.39838L5.85188 4.79122C6.14477 5.08411 6.14477 5.55898 5.85188 5.85188C5.55898 6.14477 5.08411 6.14477 4.79122 5.85188L4.39838 5.45904C4.10549 5.16615 4.10549 4.69127 4.39838 4.39838Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M19.6009 4.39864C19.8938 4.69153 19.8938 5.16641 19.6009 5.4593L19.2081 5.85214C18.9152 6.14503 18.4403 6.14503 18.1474 5.85214C17.8545 5.55924 17.8545 5.08437 18.1474 4.79148L18.5402 4.39864C18.8331 4.10575 19.308 4.10575 19.6009 4.39864Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M18.1474 18.1474C18.4403 17.8545 18.9152 17.8545 19.2081 18.1474L19.6009 18.5402C19.8938 18.8331 19.8938 19.308 19.6009 19.6009C19.308 19.8938 18.8331 19.8938 18.5402 19.6009L18.1474 19.2081C17.8545 18.9152 17.8545 18.4403 18.1474 18.1474Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M5.85188 18.1477C6.14477 18.4406 6.14477 18.9154 5.85188 19.2083L5.45904 19.6012C5.16615 19.8941 4.69127 19.8941 4.39838 19.6012C4.10549 19.3083 4.10549 18.8334 4.39838 18.5405L4.79122 18.1477C5.08411 17.8548 5.55898 17.8548 5.85188 18.1477Z"
                                                fill="currentColor"></path>
                                        </g>
                                    </svg>
                                </button>
                            </td>
                            <td>{{ $user->type ? 'Administrator' : 'Sub-account' }}</td>
                            <td>
                                <a href="{{ route('admin-user.show', $user->id) }}""
                                    class="btn bnt-sm bg-primary text-white">
                                    edit
                                </a>
                                <a href="{{ route('admin-user.destroy', $user->id) }}"
                                    class="btn bnt-sm bg-danger text-white"
                                    onclick="event.preventDefault();
                                document.getElementById('delete-form-{{ $user->id }}').submit();">

                                    Delete
                                </a>
                                <form id="delete-form-{{ $user->id }}"
                                    action="{{ route('admin-user.destroy', $user->id) }}" method="POST"
                                    style="display: none;">
                                    @method('DELETE')
                                    @csrf
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
            </thead>
        </table>

    </div>
@endsection

@section('extrajs')
    <script>
        function password_show_hide(id) {
            var x = document.getElementById("password" + id);
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";

            }
        }
    </script>
@endsection
