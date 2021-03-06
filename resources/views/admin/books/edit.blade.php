@extends('admin.layouts.master')
@section('title','ویرایش کتاب')
@section('style')
    <script src="/js/jquery.min.js"></script>
    <script src="/js/default-assets/select2.min.js"></script>
    <link rel="stylesheet" href="/css/default-assets/select2.min.css">

    <script>
        $(document).ready(function() {
            $('.my_select').select2();
        });
    </script>
@endsection

@section('content')

    <!-- Main Content Area -->
    <div class="main-content">
        <div class="data-table-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-4 box-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-2">ویرایش کتاب</h4>
                                <hr>
                                <form action="{{route('books.update',['book'=>$book->id])}}" method="POST">
                                    @CSRF
                                    @method('PATCH')
                                    <div class="form-group">
                                        <label class="control-label">رشته تحصیلی-پایه تحصیلی-گروه درسی*</label>
                                        <select class="form-control form-control-sm mb-3 my_select" name="group_id">
                                            @foreach($lessongroups as $lessongroup)
                                                <option value="{{ $lessongroup->id }}" {{ $lessongroup->id==$book->group_id ? 'selected' : '' }}>
                                                    <?php
                                                    echo
                                                        $lessongroup->grade->study->name." -> ".
                                                        $lessongroup->grade->name." -> ".
                                                        $lessongroup->name;
                                                    ?>
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label"> نام کتاب*</label>
                                        <input type="text" name="name" value="{{ $book->name }}" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label"> رنگ*</label>
                                        <input type="text" id="horizontal-colorpicker" name="color" value="{{ $book->color }}" class="form-control colorpicker-element" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary submit">ویرایش اطلاعات</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-8 box-margin">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-2">لیست کتاب ها</h4>
                                <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                                    <thead>
                                    <tr>
                                        <th>رشته تحصیلی</th>
                                        <th>پایه تحصیلی </th>
                                        <th>گروه درسی</th>
                                        <th> نام کتاب</th>
                                        <th>عملیات</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
                                        @foreach($books as $book)
                                            <td>{{ $book->lessongroup->grade->study->name }}</td>
                                            <td>{{$book->lessongroup->grade->name}}</td>
                                            <td>{{$book->lessongroup->name}}</td>
                                            <td>{{$book->name}}</td>

                                            <td style="text-align: center;padding-top: 2px" class="d-flex">
                                                <a href="{{route('books.edit', $book->id)}}" style="margin-top:2px;margin-left:6px">
                                                    <i class="fa fa-edit" style="font-size:17px;color:green"></i>
                                                </a>
                                                <form action="/admin/books/{{ $book->id }}" method="POST">
                                                    @CSRF
                                                    @method('delete')
                                                    <button type="submit" onclick="return confirm('آيا براي حذف این رکورد مطمئن هستيد؟')" class="fa fa-remove" style="font-size:20px;color:red;border: none">
                                                    </button>
                                                </form>
                                            </td>

                                    </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div>
                <!-- end row-->
            </div>
        </div>
    </div>


@endsection
