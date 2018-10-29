@extends('layouts.app')

@section('content')
<div class="container">
    <table class="u-full-width">
        <thead>
        <th>Name</th>
        <th>E-Mail</th>
        <th>User</th>
        <th>Admin</th>
        <th></th>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>  
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></td>
                    <td><input type="checkbox" {{ $user->hasRole('user_role') ? 'checked' : '' }} name="user_role" disabled></td>
                    <td><input type="checkbox" {{ $user->hasRole('admin') ? 'checked' : '' }} name="admin" disabled></td>
                    {{ csrf_field() }}
                    <td><form action="{{ route('admin.edituser',$user->id)}}" method="get" id="{{$user->id}}"><button type="submit">...</button> </form></td>               
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
@endsection