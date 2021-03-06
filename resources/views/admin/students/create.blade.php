@extends('admin.layouts.master')
@section('title','ثبت دانش آموز جدید')

@section('style')
<script type="text/javascript" src="/js/jquery-1.10.1.min.js"></script>
<link rel="stylesheet" href="/css/bootstrap-datepicker.min.css">
<script src="/js/default-assets/select2.min.js"></script>
<link rel="stylesheet" href="/css/default-assets/select2.min.css">
<script>
    $(document).ready(function() {
        $('.my_select').select2();
        $("#pdpF2").persianDatepicker({
            formatDate: "YYYY/0M/0D",
    })
    })
</script>

<style>
    .pdp-default {
        left: 25% !important;
    }
</style>
@endsection

@section('content')
<div class="main-content">
    <!-- Basic Form area Start -->
    <div class="container-fluid">
        <!-- Form row -->
        <div class="row">
            <div class="col-12 box-margin height-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">ثبت دانش آموز</h6>
                        <hr>
                        <form action="{{ route('students.store') }}" method="POST">
                            @CSRF
                            @if($errors->any())
                            <ul class="alert alert-danger" role="alert">
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            @endif
                            <div class="row" style="height: 84px">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label">نام *</label>
                                        <input type="text" name="fname" value="{{ old('fname') }}" class="form-control">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label">نام خانوادگی*</label>
                                        <input type="text" name="lname" value="{{ old('lname') }}" class="form-control">
                                    </div>
                                </div><!-- Col -->

                                <div class="col-sm-3">
                                    <div class="form-group mb-50">
                                        <label>تاریخ تولد</label>
                                        <input type="text" value="{{ old('birthdate') }}" name="birthdate" id="pdpF2" class="form-control">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-3">
                                    <label class="control-label">جنسیت*</label>
                                    <div class="mt-3 form-group" style="margin-top: 0.3rem!important">
                                        <div class="custom-control custom-radio" style="float: right">
                                            <input type="radio" id="customRadio1" value="man" {{ old('gender') }} name="gender" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio1">پسر</label>
                                        </div>
                                        <div class="custom-control custom-radio" style="padding-right: 2.5rem;float: right">
                                            <input type="radio" id="customRadio2" value="woman" {{ old('gender') }} name="gender" class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio2">دختر</label>
                                        </div>
                                    </div>
                                </div>

                            </div><!-- Row -->
                            <div class="row" style="height: 84px">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label">کدملی*</label>
                                        <input type="number" class="form-control" value="{{ old('national_code') }}" name="national_code">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label">شماره موبایل</label>
                                        <input type="number" value="{{ old('mobile') }}" name="mobile" class="form-control">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-la"bel">تلفن ثابت</label>
                                        <input type="number" value="{{ old('phone') }}" class="form-control" name="phone">
                                    </div>
                                </div><!-- Col -->

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>انتخاب مشاور</label>
                                        <select name="user_id" class="form-control form-control-sm mb-3 my_select">
                                            @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- Col -->

                            </div><!-- Row -->
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>رشته تحصیلی</label>
                                        <select name="study_id" class="form-control form-control-sm mb-3">
                                            @foreach($studies as $study)
                                                <option value="{{ $study->id }}">{{ $study->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>پایه تحصیلی</label>
                                        <select name="grade_id" class="form-control form-control-sm mb-3">
                                        </select>
                                    </div>
                                </div><!-- Col -->

                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label">مدرسه محل تحصیل</label>
                                        <input type="text" name="school" value="{{ old('school') }}" class="form-control">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label">کد پستی</label>
                                        <input type="text" name="zipcode" value="{{ old('zipcode') }}" class="form-control">
                                    </div>
                                </div><!-- Col -->
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">آدرس منزل</label>
                                        <input type="text" name="address" value="{{ old('address') }}" class="form-control">
                                    </div>
                                </div><!-- Col -->
                            </div><!-- Row -->
                            <div class="form-group">
                                <label class="col-form-label">توضیحات</label>
                                <textarea id="maxlength-textarea" name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary submit">ثبت اطلاعات</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

number
@endsection
