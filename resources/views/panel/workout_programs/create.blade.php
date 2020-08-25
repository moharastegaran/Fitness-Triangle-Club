@extends('panel.includes.master')

@section('title','برنامه تمرینی جدید')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('panel.admin.workout-programs.index') }}">برنامه‌های تمرینی</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>برنامه تمرینی جدید</span></li>
@endsection


@section('style')
    <link type="text/css" rel="stylesheet" href="{{ asset('style/persianDatepicker.css') }}">
    <link href="{{ asset('cork/plugins/select2/select2-custom.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('cork/plugins/select2/select2-bs-custom.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('cork/assets/css/components/tabs-accordian/custom-tabs.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/assets/css/forms/switches.css') }}">
@endsection

@section('content')
    <form role="form" class="col-12" action="{{ route('panel.admin.workout-programs.store',['request_id'=>request('request_id')]) }}" method="post">

        @include('panel.includes.errors')

        @csrf
        <div class="row mb-4">
            <div class="col-md-4 col-sm-6 col-12">
                <label for="requester_name">نام ورزشکار</label>
                <select name="requester_name" class="form-control form-control-sm" id="requester_name">
                    <option value="" disabled selected>-- انتخاب کنید --</option>
                    @foreach($members as $member)
                        <option value="{{ $member->id.'%%'.$member->name.' '.$member->family }}"
                                @if(request('requester_name')==$member->name.' '.$member->family) selected
                                @elseif(old('requester_name')==$member->id.'%%'.$member->name.' '.$member->family) selected @endif>
                            {{ $member->name.' '.$member->family.' __ '.$member->mobile }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 col-sm-6 col-12">
                <label for="from">تاریخ آغاز برنامه</label>
                <input type="text" name="from" class="form-control form-control-sm" id="from" autocomplete="off"
                       placeholder="تاریخ آغاز برنامه" value="{{ old('from') }}" required>
            </div>
            <div class="col-md-4 col-sm-6 col-12">
                <label for="duration">مدت زمان اجرای برنامه (روز)</label>
                <input type="number" min="1" name="duration" class="form-control form-control-sm" id="from"
                       autocomplete="off" placeholder="30" value="{{ old('duration') }}" required>
            </div>
            <div class="col-md-4 col-sm-6 col-12">
                <label for="comment">توضیحات</label>
                <textarea name="comment" id="comment" class="form-control form-control-sm" rows="3"
                          placeholder="توضیحات">{{ old('comment') }}</textarea>
            </div>
        </div>
        <div>
            <div class="d-flex justify-content-between align-items-center">
                <h4>آیتم‌های تمرینی</h4>
                <div class="d-flex">
                    <label class="switch s-icons s-outline s-outline-warning mr-1">
                        <input name="day_type" type="hidden" value="true">
                        <input id="day_type_switch" type="checkbox" value="1" checked>
                        <span class="slider round"></span>
                    </label>
                    روزهای هفته
                </div>
            </div>
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
                <li class="nav-item"><a class="nav-link" id="justify-contact-tab" data-toggle="tab" href="#tab_6"
                                        role="tab"
                                        aria-controls="justify-contact" aria-selected="false">پنج‌شنبه</a></li>
                <li class="nav-item"><a class="nav-link" id="justify-contact-tab" data-toggle="tab" href="#tab_7"
                                        role="tab"
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                             viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </button>
                                </th>
                                <th style="width: 250px">نوع تمرین</th>
                                <th style="width: 120px">ست</th>
                                <th style="width: 175px">تکرار</th>
                                <th style="width: 200px">ریتم</th>
                                <th style="width: 200px">استراحت<span style="font-size: 10px">(ثانیه)</span></th>
                                <th style="width: 300px">توضیحات</th>
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                             viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </button>
                                </th>
                                <th style="width: 250px">نوع تمرین</th>
                                <th style="width: 120px">ست</th>
                                <th style="width: 175px">تکرار</th>
                                <th style="width: 200px">ریتم</th>
                                <th style="width: 200px">استراحت<span style="font-size: 10px">(ثانیه)</span></th>
                                <th style="width: 300px">توضیحات</th>
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                             viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </button>
                                </th>
                                <th style="width: 250px">نوع تمرین</th>
                                <th style="width: 120px">ست</th>
                                <th style="width: 175px">تکرار</th>
                                <th style="width: 200px">ریتم</th>
                                <th style="width: 200px">استراحت<span style="font-size: 10px">(ثانیه)</span></th>
                                <th style="width: 300px">توضیحات</th>
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                             viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </button>
                                </th>
                                <th style="width: 250px">نوع تمرین</th>
                                <th style="width: 120px">ست</th>
                                <th style="width: 175px">تکرار</th>
                                <th style="width: 200px">ریتم</th>
                                <th style="width: 200px">استراحت<span style="font-size: 10px">(ثانیه)</span></th>
                                <th style="width: 300px">توضیحات</th>
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                             viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </button>
                                </th>
                                <th style="width: 250px">نوع تمرین</th>
                                <th style="width: 120px">ست</th>
                                <th style="width: 175px">تکرار</th>
                                <th style="width: 200px">ریتم</th>
                                <th style="width: 200px">استراحت<span style="font-size: 10px">(ثانیه)</span></th>
                                <th style="width: 300px">توضیحات</th>
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                             viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </button>
                                </th>
                                <th style="width: 250px">نوع تمرین</th>
                                <th style="width: 120px">ست</th>
                                <th style="width: 175px">تکرار</th>
                                <th style="width: 200px">ریتم</th>
                                <th style="width: 200px">استراحت<span style="font-size: 10px">(ثانیه)</span></th>
                                <th style="width: 300px">توضیحات</th>
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
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                             viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" class="feather feather-plus">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </button>
                                </th>
                                <th style="width: 250px">نوع تمرین</th>
                                <th style="width: 120px">ست</th>
                                <th style="width: 175px">تکرار</th>
                                <th style="width: 200px">ریتم</th>
                                <th style="width: 200px">استراحت<span style="font-size: 10px">(ثانیه)</span></th>
                                <th style="width: 300px">توضیحات</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
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
    <script src="{{ asset('cork/plugins/select2/select2-custom.min.js') }}"></script>
    <script src="{{ asset('cork/plugins/input-mask/jquery.inputmask.bundle.min.js') }}"></script>
    <script src="{{ asset('cork/plugins/input-mask/input-mask.js') }}"></script>
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
        </td>                                <td>
                                    <select name="items[${num}][%%INDEX%%][workout_ids][]" id="" class="form-control form-control-sm tagging workout_ids" multiple>
@foreach($categories as $category)
                    @if(count($category->workouts))
                <optgroup class="select2-result-selectable" label="{{ $category->title }}">
                @foreach($category->workouts as $workout)
                <option value="{{ $workout->id }}">{{ $workout->title }}</option>
@endforeach
                </optgroup>
                    @endif
                    @endforeach
                </select>
            </td>
            <td>
                <input type="number" class="form-control form-control-sm" min="1" name="items[${num}][%%INDEX%%][set]" autocomplete="off">
        </td>
        <td>
            <input class="form-control form-control-sm repeat" name="items[${num}][%%INDEX%%][repeat]" autocomplete="off">
        </td>
        <td>
            <input type="text" class="form-control form-control-sm" name="items[${num}][%%INDEX%%][rhythm]" autocomplete="off">
        </td>
        <td>
            <input type="text" class="form-control form-control-sm" name="items[${num}][%%INDEX%%][gap]" autocomplete="off">
        </td>
        <td>
            <textarea class="form-control form-control-sm" name="items[${num}][%%INDEX%%][comment]" cols="40" rows="1" style="resize : none"></textarea>
        </td>
    </tr>
`);
            tbody.find('tr').last().find('.tagging.workout_ids').select2({
                placeholder: '-- انتخاب کنید --',
                tags: true,
                dir: "rtl",
//                language: "fa",
//                width: '100%',
                theme: "bootstrap"
            });

            tbody.find('tr').last().find(".select2-selection").css({
                'min-height': '42.6px',
                'background-color': '#1b2e4b'
            });
            tbody.find('tr').last().find('input.repeat').inputmask("9{1,2}")
        }

        function removeRow(button) {
            $(button).closest('tr').remove();
        }

        $(document).ready(function () {

            $(document).on("change", ".tagging.workout_ids", function () {
                var repeat_mask = $(this).closest("tr").find("input.repeat");
                var len = $(this).find("option:selected").length;
                var pattern = "";
                for (var i = 0; i < len; i++) {
                    pattern += "9{1,2}";
                    if (i < len - 1) {
                        pattern += "-";
                    }
                }
                repeat_mask.inputmask(pattern);
            });

            $("input[name='from']").persianDatepicker({
                formatDate: "YYYY-0M-0D",
                cellWidth: 25,
                cellHeight: 20,
                calendarPosition: {
                    x: 20,
                    y: 0,
                }
            });

            $("select.requester_name").select2({
                placeholder: '-انتخاب کنید-',
                dir: "rtl",
                language: "fa",
                width: '100%',
                theme: "bootstrap"
            });

            var switched = true;
            $("#day_type_switch").on("change", function () {
                var links = $(".nav-tabs .nav-link");
                if (switched) {
                    links.eq(0).text("روز اول");
                    links.eq(1).text("روز دوم");
                    links.eq(2).text("روز سوم");
                    links.eq(3).text("روز چهارم");
                    links.eq(4).text("روز پنجم");
                    links.eq(5).text("روز ششم");
                    links.eq(6).text("روز هفتم");
                } else {
                    links.eq(0).text("شنبه");
                    links.eq(1).text("یک‌شنبه");
                    links.eq(2).text("دوشنبه");
                    links.eq(3).text("سه‌شنبه");
                    links.eq(4).text("چهارشنبه");
                    links.eq(5).text("پنج‌شنبه");
                    links.eq(6).text("جمعه");
                }

                switched = !switched;
                $(this).siblings("input[name='day_type']").val(switched);
            });

            $("form").submit(function () {
                reindex(this);
//                return false;
            });

            function reindex(form) {
                $(form).find("table").each(function (table_index, table) {
                    $(table).find("tbody").find("tr").each(function (index, row) {
                        $(row).find(".form-control").each(function (elem_index, elem) {
                            elem.name = elem.name.replace("%%INDEX%%", index);
                            console.log(elem.name);
                        });
                    });
                });
                return false;
            }

        });

    </script>
@endsection
