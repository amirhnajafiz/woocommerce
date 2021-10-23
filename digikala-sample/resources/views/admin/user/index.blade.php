@extends('layouts.admin')

@section('title', __('-users-panel'))

@section('content')
    <div class="row m-0 p-3">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Main</th>
                    <th scope="col">Role</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            <form action="{{ route('admin.update', $user->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <select name="role" class="bg-dark text-white">
                                    <option
                                        value="{{ \App\Enums\Role::USER() }}"
                                        @if($user->role == \App\Enums\Role::USER())
                                            selected
                                        @endif
                                    >
                                        Normal
                                    </option>
                                    <option
                                        value="{{ \App\Enums\Role::WRITER() }}"
                                        @if($user->role == \App\Enums\Role::WRITER())
                                            selected
                                        @endif
                                    >
                                        Editor
                                    </option>
                                    <option
                                        value="{{ \App\Enums\Role::ADMIN() }}"
                                        @if($user->role == \App\Enums\Role::ADMIN())
                                            selected
                                        @endif
                                    >
                                        Admin
                                    </option>
                                    <option
                                        value="{{ \App\Enums\Role::SUPER_ADMIN() }}"
                                        @if($user->role == \App\Enums\Role::SUPER_ADMIN())
                                        selected
                                        @endif
                                    >
                                        Super-Admin
                                    </option>
                                </select>
                                <input type="submit" class="btn btn-light" value="Update" />
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('admin.destroy', $user->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">
                                    Remove
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-5">
            {{ $users->links() }}
        </div>
    </div>
@stop
