@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
   {{trans('online_classes_trans.Add_New_Lesson')}}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
   {{trans('online_classes_trans.Add_New_Lesson')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                <form method="post" action="{{ route('online_classes.store') }}" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="Grade_id">{{ trans('Students_trans.Grade') }} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="Grade_id">
                                    <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                    @foreach ($grades as $Grade)
                                        <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="Classroom_id">{{ trans('Students_trans.classrooms') }} : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="Classroom_id">

                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="section_id">{{ trans('Students_trans.section') }} : </label>
                                <select class="custom-select mr-sm-2" name="section_id">
                                    @foreach($sections as $section)
                                    <option  value="{{ $section->id }}">{{ $section->name }}</option>
                                @endforeach

                                </select>
                            </div>
                        </div>
                    </div><br>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{ trans('online_classes_trans.Class_Title') }} : <span class="text-danger">*</span></label>
                                <input class="form-control" name="topic" type="text">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{ trans('online_classes_trans.Class_Time') }} : <span class="text-danger">*</span></label>
                                <input class="form-control" type="datetime-local" name="start_time">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>{{ trans('online_classes_trans.Class_Duration_In_Minutes') }} : <span class="text-danger">*</span></label>
                                <input class="form-control" name="duration" type="text">
                            </div>
                        </div>

                    </div>
                    <button class="btn btn-success  nextBtn btn-lg pull-right"
                        type="submit">{{ trans('Students_trans.submit') }}</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render

<script>
    $(document).ready(function () {
        $('select[name="Grade_id"]').on('change', function () {
            var Grade_id = $(this).val();
            if (Grade_id) {
                $.ajax({
                    url: "{{ URL::to('classes') }}/" + Grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="Classroom_id"]').empty();
                        $('select[name="Classroom_id"]').append('<option selected disabled >{{trans('Parent_trans.Choose')}}...</option>');
                        $.each(data, function (key, value) {
                            $('select[name="Classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });

                    },
                });
            }

            else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>


@endsection
