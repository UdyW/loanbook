@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('admin.postedituser') }}">
    {{ csrf_field() }}
      <div class="row">
        <div class="six columns">
          <label for="name">User Name</label>
          <input class="u-full-width" type="text" value="{{$usertoedit->name}}" id="name"  name="name">
        </div>

        <div class="six columns">
          <label for="email">User email</label>
          <input class="u-full-width" type="email" value="{{$usertoedit->email}}" id="email" name="email">
        </div>
      </div>
      <div class="row">
		  <label>User Role</label>
          <label>
            <input type="checkbox" value="admin" name="admin" {{$usertoedit->hasRole('admin')? 'checked': ''}}>
            <span class="label-body">Admin</span>
          </label>
          <label>
            <input type="checkbox" value="user_role" name="user_role" {{$usertoedit->hasRole('user_role')? 'checked': ''}}>
            <span class="label-body">User</span>
          </label>
      </div>
      <input class="button-primary" type="submit" value="Submit"><a  class="button" href="{{URL::previous()}}">Back</a>
    </form>
</div>
@endsection