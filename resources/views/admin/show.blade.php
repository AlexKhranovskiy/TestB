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
                            <label for=""></label>
                            <input type="email" class="form-control" id="" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <!-- Date -->
                            <div class="form-group">
                                <label>Date:</label>
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <!-- Date and time -->
                            <div class="form-group">
                                <label>Date and time:</label>
                                <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime"/>
                                    <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.form group -->
                            <!-- Date range -->
                            <div class="form-group">
                                <label>Date range:</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="reservation">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->

                            <!-- Date and time range -->
                            <div class="form-group">
                                <label>Date and time range:</label>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-clock"></i></span>
                                    </div>
                                    <input type="text" class="form-control float-right" id="reservationtime">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->

                            <!-- Date and time range -->
                            <div class="form-group">
                                <label>Date range button:</label>

                                <div class="input-group">
                                    <button type="button" class="btn btn-default float-right" id="daterange-btn">
                                        <i class="far fa-calendar-alt"></i> Date range picker
                                        <i class="fas fa-caret-down"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.form group -->
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
