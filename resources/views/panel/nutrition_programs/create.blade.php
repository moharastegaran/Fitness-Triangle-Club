@extends('panel.includes.master')

@section('title','برنامه غذایی جدید')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('panel.admin.nutrition-programs.index') }}">برنامه‌های غذایی</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>برنامه غذایی جدید</span></li>
@endsection

@section('style')
    <link type="text/css" rel="stylesheet" href="{{ asset('style/persianDatepicker.css') }}">
    <link href="{{ asset('cork/assets/css/components/tabs-accordian/custom-tabs.css') }}" rel="stylesheet"/>
@endsection

@section('content')
        <form role="form" class="col-12" action="{{ route('panel.admin.nutrition-programs.store') }}" method="post">

            @include('panel.includes.errors')

            @csrf
            <div class="row mb-4">
                <div class="col-md-4 col-sm-6 col-12">
                    <label for="requester_name">نام ورزشکار</label>
                    <input type="text" name="requester_name" class="form-control form-control-sm" id="requester_name"
                           placeholder="علی علوی" value="{{ old('requester_name') }}">
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <label for="from">تاریخ آغاز برنامه</label>
                    <input type="text" name="from" class="form-control form-control-sm" id="from" autocomplete="off"
                           placeholder="تاریخ آغاز برنامه" value="{{ old('from') }}">
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <label for="duration">مدت زمان اجرای برنامه (روز)</label>
                    <input type="number" min="1" name="duration" class="form-control form-control-sm" id="from"
                           placeholder="30" value="{{ old('duration') }}">
                </div>
                <div class="col-md-4 col-sm-6 col-12">
                    <label for="comment">توضیحات</label>
                    <textarea name="comment" id="comment" class="form-control form-control-sm" rows="3"
                              placeholder="توضیحات">{{ old('comment') }}</textarea>
                </div>
            </div>
            <h4>آیتم‌های غذایی</h4>
            <ul class="nav nav-tabs mb-0 mt-4 nav-fill" id="iconTab" role="tablist">
                <li class="nav-item"><a class="nav-link active" id="justify-home-tab" data-toggle="tab" href="#tab_1"
                                        role="tab" aria-controls="justify-home" aria-selected="true">شنبه</a></li>
                <li class="nav-item"><a class="nav-link" id="justify-profile-tab" data-toggle="tab" href="#tab_2"
                                        role="tab" aria-controls="justify-profile" aria-selected="false">یک‌شنبه</a>
                </li>
                <li class="nav-item"><a class="nav-link" id="justify-contact-tab" data-toggle="tab" href="#tab_3"
                                        role="tab" aria-controls="justify-contact" aria-selected="false">دوشنبه</a>
                </li>
                <li class="nav-item"><a class="nav-link" id="justify-contact-tab" data-toggle="tab" href="#tab_4"
                                        role="tab" aria-controls="justify-contact" aria-selected="false">سه‌شنبه</a>
                </li>
                <li class="nav-item"><a class="nav-link" id="justify-contact-tab" data-toggle="tab" href="#tab_5"
                                        role="tab" aria-controls="justify-contact" aria-selected="false">چهارشنبه</a>
                </li>
                <li class="nav-item"><a class="nav-link" id="justify-contact-tab" data-toggle="tab" href="#tab_6" role="tab"
                                        aria-controls="justify-contact" aria-selected="false">پنج‌شنبه</a></li>
                <li class="nav-item"><a class="nav-link" id="justify-contact-tab" data-toggle="tab" href="#tab_7" role="tab"
                                        aria-controls="justify-contact" aria-selected="false">جمعه</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab_1" role="tabpanel" aria-labelledby="justify-tab-1">
                    <div class="box-body pad table-responsive">
                        <table class="table table-bordered" style="table-layout: fixed">
                            <thead>
                            <tr>
                                <th style="width: 90px">
                                    <button onclick="addRow(1,event)" class="btn btn-sm btn-outline-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </button>
                                </th>
                                <th style="width: 250px">وعده</th>
                                <th style="width: 250px">نوع غذا</th>
                                <th style="width: 200px">مقدار(گرم)</th>
                                <th style="width: 200px">کالری</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab_2" role="tabpanel" aria-labelledby="justify-profile-tab">
                    <div class="box-body pad table-responsive">
                        <table class="table table-bordered" style="table-layout: fixed">
                            <thead>
                            <tr>
                                <th style="width: 90px">
                                    <button onclick="addRow(2,event)" class="btn btn-sm btn-outline-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </button>
                                </th>
                                <th style="width: 250px">وعده</th>
                                <th style="width: 250px">نوع غذا</th>
                                <th style="width: 200px">مقدار(گرم)</th>
                                <th style="width: 200px">کالری</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab_3" role="tabpanel" aria-labelledby="justify-contact-tab">
                    <div class="box-body pad table-responsive">
                        <table class="table table-bordered" style="table-layout: fixed">
                            <thead>
                            <tr>
                                <th style="width: 90px">
                                    <button onclick="addRow(3,event)" class="btn btn-sm btn-outline-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </button>
                                </th>
                                <th style="width: 250px">وعده</th>
                                <th style="width: 250px">نوع غذا</th>
                                <th style="width: 200px">مقدار(گرم)</th>
                                <th style="width: 200px">کالری</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab_4" role="tabpanel" aria-labelledby="justify-contact-tab">
                    <div class="box-body pad table-responsive">
                        <table class="table table-bordered" style="table-layout: fixed">
                            <thead>
                            <tr>
                                <th style="width: 90px">
                                    <button onclick="addRow(4,event)" class="btn btn-sm btn-outline-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </button>
                                </th>
                                <th style="width: 250px">وعده</th>
                                <th style="width: 250px">نوع غذا</th>
                                <th style="width: 200px">مقدار(گرم)</th>
                                <th style="width: 200px">کالری</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab_5" role="tabpanel" aria-labelledby="justify-contact-tab">
                    <div class="box-body pad table-responsive">
                        <table class="table table-bordered" style="table-layout: fixed">
                            <thead>
                            <tr>
                                <th style="width: 90px">
                                    <button onclick="addRow(5,event)" class="btn btn-sm btn-outline-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </button>
                                </th>
                                <th style="width: 250px">وعده</th>
                                <th style="width: 250px">نوع غذا</th>
                                <th style="width: 200px">مقدار(گرم)</th>
                                <th style="width: 200px">کالری</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab_6" role="tabpanel" aria-labelledby="justify-contact-tab">
                    <div class="box-body pad table-responsive">
                        <table class="table table-bordered" style="table-layout: fixed">
                            <thead>
                            <tr>
                                <th style="width: 90px">
                                    <button onclick="addRow(6,event)" class="btn btn-sm btn-outline-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </button>
                                </th>
                                <th style="width: 250px">وعده</th>
                                <th style="width: 250px">نوع غذا</th>
                                <th style="width: 200px">مقدار(گرم)</th>
                                <th style="width: 200px">کالری</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab_7" role="tabpanel" aria-labelledby="justify-contact-tab">
                    <div class="box-body pad table-responsive">
                        <table class="table table-bordered" style="table-layout: fixed">
                            <thead>
                            <tr>
                                <th style="width: 90px">
                                    <button onclick="addRow(7,event)" class="btn btn-sm btn-outline-success">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </button>
                                </th>
                                <th style="width: 250px">وعده</th>
                                <th style="width: 250px">نوع غذا</th>
                                <th style="width: 200px">مقدار(گرم)</th>
                                <th style="width: 200px">کالری</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
            <div class="statbox box-shadow d-flex justify-content-between">
                <a href="{{ URL::previous() }}" class="btn btn-warning">بازگشت</a>
                <button type="submit" class="btn btn-primary">ثبت اطلاعات</button>
            </div>
        </form>
@endsection

@section('script')
    <script src="{{ asset('js/persianDatepicker.min.js') }}"></script>
    <script>
        function addRow(num, e) {
            e.preventDefault();
            let tbody = $('#tab_' + num).find('tbody');
            tbody.append(`
            <tr>
                <td>
            <button type="button" class="btn btn-outline-danger btn-sm"  onclick="removeRow(this)">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            </button>
        </td>
               <td>
                                    <select name="items[${num}][%%INDEX%%][meal_id]" id="" class="form-control form-control-sm select2" style="width:100%">
                                        <option value="" disabled selected>-انتخاب کنید-</option>
                                        @foreach($meals as $meal)
                <option value="{{ $meal->id }}">{{ $meal->name }}</option>
                                        @endforeach
                </select>
            </td>
                                <td>
                                    <select name="items[${num}][%%INDEX%%][nutrition_id]" id="" class="form-control form-control-sm nutrition select2">
                                        <option value="" disabled selected>-انتخاب کنید-</option>
                                        @foreach($nutritions as $nutrition)
                <option value="{{ $nutrition->id }}">{{ $nutrition->name }}</option>
                                        @endforeach
                </select>
            </td>
        <td>
            <input type="number" class="form-control form-control-sm gram" name="items[${num}][%%INDEX%%][gram]" autocomplete="off">
        </td>
       <td>
            <input type="text" class="form-control form-control-sm calorie" name="items[${num}][%%INDEX%%][calorie]" readonly>
        </td>
    </tr>
`);
            tbody.find('tr').last().find('.select2').css({'min-height': '42.6px', 'background-color': '#1b2e4b'}).select2({dir: 'rtl'})
        }

        function removeRow(button) {
            $(button).closest('tr').remove();
        }

        $(document).ready(function () {

            $("input[name='from']").persianDatepicker({
                formatDate: "YYYY-0M-0D",
                cellWidth: 25,
                cellHeight: 20,
                calendarPosition: {
                    x: 20,
                    y: 0,
                }
            });

            $(document).on("keyup click change", "input.gram , select.nutrition", function () {
                var $this = $(this);
                var selected = $this.closest("tr").find("select.nutrition option:selected").val();
                if ($this.closest("tr").find("input.gram").val()) {
                    $.get('{{ route('panel.admin.nutrition-programs.ratio') }}', {id: selected}, function (response) {
                        $this.closest("tr").find("input.calorie").val((response * $this.val()).toFixed(1))
                        console.log((response * $this.val()).toFixed(1))
                    });
                }
            });

            $("form").submit(function () {
                reindex(this);
            });


            function reindex(form) {
                $(form).find("table").each(function (table_index, table) {
                    $(table).find("tbody").find("tr").each(function (index, row) {
                        $(row).find(".form-control").each(function (elem_index, elem) {
                            elem.name = elem.name.replace("%%INDEX%%", index);
                        });
                    })
                });

                return false;
            }
        });
    </script>
@endsection
