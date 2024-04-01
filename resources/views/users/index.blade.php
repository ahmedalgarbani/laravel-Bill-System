@extends('layouts.master')
@section('css')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h2>Users Management
                    <div class="float-end">
                        <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
                    </div>
                </h2>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success my-2">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Roles</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $key => $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>

                   @if($user->Status == 1)
                    <td>

                    <span class="label text-success d-flex">
                                                <div class="dot-label bg-success ml-1"></div>مفعل
                                            </span>
                    </td>

                @else
                    <td>

                    <span class="label text-danger d-flex">
                                                <div class="dot-label bg-danger ml-1"></div>غير مفعل
                                            </span>
                    </td>
                    @endif

                <td>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-success text-white">{{ $v }}</label>
                        @endforeach
                    @endif
                </td>
                <td>

                    <a class="btn btn-warning" href="{{ route('users.show',$user->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                    <form style="display: inline" action="{{route('users.destroy',$user->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input name="id" type="hidden" value="{{$user->id}}">
                        <button class="btn btn-danger" type="submit" > Delete</button>

                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
