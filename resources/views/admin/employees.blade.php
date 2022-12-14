@extends('layouts.admin')

@section('content')
    <div class="container">
        <table class="table table-striped projects" id="employees">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Full name</th>
                <th scope="col">Email</th>
                <th scope="col">Employment date</th>
                <th scope="col">Phone</th>
                <th scope="col">Photo</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <th scope="row">{{$employee->id}}</th>
                    <td>{{$employee->full_name}}</td>
                    <td>{{$employee->author_email}}</td>
                    <td>{{$employee->employment_date}}</td>
                    <td>{{$employee->phone}}</td>
                    <td>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <img alt="Avatar" class="table-avatar" src="../../dist/img/{{$employee->photo}}">
                            </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
