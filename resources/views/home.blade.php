@extends('layouts.app')

@section('content')



@if(session('UserCreated'))
	<script>
        alert('User has been created successfully');
    	</script>
@endif

@if(session('UserUpdated'))
	<script>
        alert('User has been updated successfully');
    	</script>
@endif

@if(session('DeleteUser'))
	<script>
        alert('User has been removed successfully');
    	</script>
@endif


<div class="container">
    <div class="row justify-content-center">
      @if(Auth::user()->role_id == 1)
            <button><a href="{{route('user.user.create')}}"><i class='bx bx-user-plus'></i> Create User</a></button>
      @endif
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

                        @forelse($users as $user)
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
                                    @empty
                                    <h2>No users registered!</h2>
                        @endforelse

                        
                        
                  </tbody>

                 
                        
            </table>
    </div>
</div>
@endsection
