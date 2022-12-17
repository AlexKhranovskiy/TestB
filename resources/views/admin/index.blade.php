@extends('layouts.admin')

@section('content')
    <div class="container">
        <table class="table table-striped projects" id="employees">
            <thead>
            <tr>
                <th scope="col">Full name</th>
                <th scope="col">Position</th>
                <th scope="col">Email</th>
                <th scope="col">Salary</th>
                <th scope="col">Employment date</th>
                <th scope="col">Phone</th>
                <th scope="col">Photo</th>
                <th scope="col">Director</th>
                <th scope="col">Edition</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{$employee->full_name}}</td>
                    <td>{{$employee->position->name}}</td>
                    <td>{{$employee->author_email}}</td>
                    <td>{{$employee->position->salary}}</td>
                    <td>{{$employee->employment_date}}</td>
                    <td>{{$employee->phone}}</td>
                    <td>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <img alt="Avatar" class="table-avatar" src="../../dist/img/{{$employee->photo}}">
                            </li>
                        </ul>
                    </td>
                    <td>{{$employee->full_name}}</td>
                    <td><a class="btn btn-outline-secondary btn-sm" href="{{route('employees.show',[$employee->id])}}">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('footer-js')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#employees').DataTable();
        });
    </script>
@endsection

