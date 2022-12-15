@extends('layouts.admin')

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="{{$data['full_name']}}">Full name</label>
                            <input type="text" name="full_name" class="form-control" id="{{$data['full_name']}}"
                                   placeholder="{{$data['full_name']}}">
                        </div>
                        <div class="form-group">
                            <label for="{{$data['author_email']}}">Email</label>
                            <input type="email" class="form-control" id="{{$data['author_email']}}"
                                   placeholder="{{$data['author_email']}}">
                        </div>
                        <div class="form-group">

{{--                            <div class="input-group">--}}
{{--                                <div class="input-group-prepend">--}}
{{--                                    <span class="input-group-text"></span>--}}
{{--                                </div>--}}
{{--                                <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>--}}
{{--                            </div>--}}

                            <label>Employment date:</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" placeholder="{{$data['employment_date']}}" class="form-control datetimepicker-input"
                                       data-target="#reservationdate"/>
                                <div class="input-group-append" data-target="#reservationdate"
                                     data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for=""></label>
                            <input type="email" class="form-control" id="" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
@section('footer-js')
    <script>
        $(function () {
            $('#reservationdate').datetimepicker({
                format: 'MM-DD-YYYY'
            });
        })
    </script>
@endsection
