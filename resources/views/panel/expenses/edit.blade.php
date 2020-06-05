@extends('panel.includes.master')

@section('title','ویرایش هزینه‌ها')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page"><span>ویرایش هزینه‌ها</span></li>
@endsection

@section('content')
    <div class="col-md-5 col-sm-6 col-12 mx-auto rounded p-3">
        <div class="widget widget-content-area">
            <form method="post" action="{{ route('panel.admin.expenses.update') }}">
                @csrf
                @method('PUT')

                <h4>ویرایش هزینه‌ها</h4>

                <div class="w-100 p-1 border-top mt-4"></div>
                <div class="mt-1 mb-4">هزینه برنامه‌ها به تومان وارد شود.</div>

                @include('panel.includes.errors')

                <div class="form-group">
                    <label for="wp_expense">برنامه تمرینی</label>
                    <input type="text" id="wp_expense" name="wp_expense" class="form-control" value="{{ $wp_expense }}">
                </div>

                <div class="form-group">
                    <label for="np_expense">برنامه غذایی</label>
                    <input type="text" id="np_expense" name="np_expense" class="form-control" value="{{ $np_expense }}">
                </div>

                <div class="form-group text-right mt-4">
                    <input type="submit" value="ویرایش" class="btn btn-primary">
                </div>

            </form>
        </div>
    </div>
@endsection