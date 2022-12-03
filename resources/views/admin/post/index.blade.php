@extends('layouts.admin')

@section('content')
    <div class="container">
        <table class="table table-striped projects" id="employees">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Avatar</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Varified at</th>
                <th scope="col">Remember token</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <img alt="Avatar" class="table-avatar" src="../../dist/img/avatar.png">
                            </li>
                        </ul>
                    </td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->email_verified_at}}</td>
                    <td>{{$user->remember_token}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
