@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">

    <table class="content-table">
                  <thead>
                        <tr>
                              <th>Name</th>
                              <th>Email</th>
                              <th>Role</th>
                              <th>Actions</th>
                        </tr>
                  </thead>

                  <tbody>

                              <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>

                                    @foreach($roles as $role)
                                          @if($user->role_id == $role->id)
                                                <td>{{$role->role}}</td>
                                          @endif
                                    @endforeach

                                    <td>
                                          @if(Auth::user()->role_id == 1)
                                                <form id="delete-user" action="{{route('user.user.destroy', $user->id)}}" method="POST">
                                                      @csrf 
                                                      {{method_field('DELETE')}}

                                                      <a href="{{route('user.user.show', $user->id)}}"><i class='bx bxs-show'></i></a>
                                                      <a href="{{route('user.user.edit', $user->id)}}"><i class='bx bx-edit'></i></a>
                                                      <button type="submit">
                                                                  <i class='bx bxs-trash' ></i>
                                                      </button>
                                                </form>
                                          @else
                                                <a href="{{route('user.user.show', $user->id)}}"><i class='bx bxs-show'></i></a>
                                          @endif
                                    
                                    </td>
                              </tr>   
                  </tbody>
            </table>

            <button><a href="{{route('home')}}"><i class='bx bxs-left-arrow'></i> Back</a></button>
    </div>
</div>
@endsection
