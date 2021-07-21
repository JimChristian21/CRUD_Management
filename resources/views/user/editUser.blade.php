@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
    <div class="regform">
            <h2>Edit User Information</h2>                        
      </div>

      <div class="main">
            <form action="{{route('user.user.update', $user->id)}}" method="POST">
            @csrf
            
            {{method_field('PUT')}}

                        <h3 class="name">Name</h3>
                        <input class="address" type="text" name="name" value="{{$user->name}}"/>

                        @error('name')
                             <span class="error_message">
                                    {{$message}}
                              </span>
                        @enderror

                        <h3 class="name">Email</h3>
                        <input class="email" type="email" name="email" value="{{$user->email}}"/>

                        @error('email')
                              <span class="error_message">
                                    {{$message}}
                              </span>
                        @enderror

                        <h3 class="name">Password</h3>
                        <input class="password" type="password" name="password"/>

                        @error('password')
                              <span class="error_message">
                                    {{$message}}
                              </span>
                        @enderror
                        <h3 class="name">Role</h3>
                        <select class="option" name="role">
                              <option disabled="disabled" selected="selected">--Choose Option</option>
                              @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->role}}</option>
                              @endforeach
                        </select>

                        @error('role')
                              <span class="error_message">
                                    {{$message}}
                              </span>
                        @enderror

                        <input class="register" type="submit" value="Update"/>
            
                        <div class="cancel">
                              <a href="{{route('home')}}">Cancel</a>
                        </div>
            </form>

      </div>
    </div>
</div>
@endsection
