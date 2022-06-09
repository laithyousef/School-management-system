@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
  {{ trans('Accounts.Edit_Catch_Reciept') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
{{ trans('Accounts.Edit_Catch_Reciept') }}
: <label style="color: red">{{$students_receipt->student->name}}</label>
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                            <form action="{{route('students_receipt.update','test')}}" method="post" autocomplete="off">
                                @method('PUT')
                                @csrf
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{ trans('Accounts.The_Amount') }} : <span class="text-danger">*</span></label>
                                        <input  class="form-control" name="Debit" value="{{$students_receipt->debt}}" type="number" >
                                        <input  type="hidden" name="student_id" value="{{$students_receipt->student->id}}" class="form-control">
                                        <input  type="hidden" name="id"  value="{{$students_receipt->id}}" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{ trans('Accounts.Statement') }} : <span class="text-danger">*</span></label>
                                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$students_receipt->description}}</textarea>
                                    </div>
                                </div>

                            </div>

                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('Students_trans.submit')}}</button>
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

@endsection
