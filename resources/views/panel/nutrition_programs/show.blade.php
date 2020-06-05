{{--@extends('panel.includes.master-spy')--}}
@extends('panel.includes.master')

@section('title','مشاهده برنامه غذایی')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('panel.admin.nutrition-programs.index') }}">برنامه‌های غذایی</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>مشاهده برنامه غذایی</span></li>
@endsection

@section('style')
    {{--    <link href="{{ asset('cork/assets/css/tables/table-basic.css') }}" rel="stylesheet" type="text/css">--}}
    <style>
        .table-controls li svg {
            transition: .5s ease color
        }

        .table-controls li:hover svg {
            color: #ff342e;
        }
    </style>
@endsection

@section('spy-titles')
    @php
        $days = array_values(array_unique($program->items()->pluck('day')->toArray()));
    @endphp

    <a href="#spy_tab_info" class="nav-link active">مشخصات</a>
    @for($i=1; $i <= count($days); $i++)
        <a href="#spy_tab_{{ $i }}" class="nav-link">{{ $days[$i-1] }}</a>
    @endfor
@endsection

@section('content')
    {{--@section('spy-contents')--}}
    <div id="spy_tab_info" class="col-lg-10 col-12 mx-auto layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4>مشخصات</h4>
                    <div class="d-flex">
                        <a href="{{ route('panel.nutrition-programs.export-pdf',$program) }}" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-download text-secondary mb-1">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                <polyline points="7 10 12 15 17 10"></polyline>
                                <line x1="12" y1="15" x2="12" y2="3"></line>
                            </svg>
                        </a>
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('panel.admin.nutrition-programs.edit',$program) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round"
                                     class="feather feather-edit-2 br-6 mb-1 ml-2 text-warning">
                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <ul class="">
                    <li class="d-flex">
                        <h6 style="width: 120px">نام ورزشکار</h6>
                        <strong>{{ $program->getRequesterName() }}</strong>
                    </li>
                    <li class="d-flex">
                        <h6 style="width: 120px">تاریخ شروع</h6>
                        <strong>{{ toFaDigits(\Morilog\Jalali\Jalalian::forge($program->from)->format('%d %B %y')) }}</strong>
                    </li>
                    <li class="d-flex">
                        <h6 style="width: 120px">مدت زمان</h6>
                        <strong>{{ toFaDigits($program->duration).' روز' }}</strong>
                    </li>
                    <li class="d-flex">
                        <h6 style="width: 120px">توضیحات</h6>
                        <strong>{{ $program->comment ?: '-' }}</strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @for($j=1; $j <= count($days); $j++)

        <div id="spy_tab_{{ $j }}" class="col-lg-10 col-12 mx-auto layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>{{ $days[$j-1] }}</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-4">
                            <thead>
                            <tr>
                                <th style="width: 150px">وعده</th>
                                <th style="width: 150px">مغذی</th>
                                <th style="width: 125px">گرم</th>
                                <th style="width: 125px">کالری</th>
                                @if(auth()->user()->isAdmin())
                                    <th style="width: 50px"></th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($program->items()->where('day',$days[$j-1])->get() as $item)
                                <tr>
                                    <input type="hidden" value="{{ $item->id }}">
                                    <td class="editable text-success">{{ $item->meal->name }}</td>
                                    <td class="editable d-none">
                                        <select class="form-control form-control-sm basic" name="meal_id">
                                            {{--<option value="" disabled>-انتخاب کنید-</option>--}}
                                            @foreach($meals as $meal)
                                                <option value="{{ $meal->id }}"
                                                        @if($meal->id == $item->meal->id) selected @endif>{{ $meal->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="editable text-warning">{{ $item->nutrition->name }}</td>
                                    <td class="editable d-none">
                                        <select class="form-control form-control-sm basic" name="nutrition_id">
                                            {{--<option value="" disabled selected>-انتخاب کنید-</option>--}}
                                            @foreach($nutritions as $nutrition)
                                                <option value="{{ $nutrition->id }}"
                                                        @if($nutrition->id == $item->nutrition->id) selected @endif>{{ $nutrition->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="editable">{{ $item->gram }}</td>
                                    <td class="editable d-none">
                                        <input type="number" class="form-control form-control-sm gram" name="gram"
                                               value="{{ $item->gram }}">
                                    </td>
                                    <td class="editable">{{ $item->calorie }}</td>
                                    <td class="editable d-none">
                                        <input type="text" class="form-control form-control-sm calorie" name="calorie"
                                               value="{{ $item->calorie }}" readonly>
                                    </td>
                                    @if(auth()->user()->isAdmin())
                                        <td class="text-center">
                                            <ul class="table-controls d-flex p-0">
                                                <li class="d-block mx-1"><a href="javascript:void(0);" class="btn-edit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                             class="feather feather-edit-2">
                                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                                        </svg>
                                                    </a></li>
                                                <li class="d-block mx-1"><a href="javascript:void(0);" class="btn-delete">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                             class="feather feather-trash-2">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                                        </svg>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endfor
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $(document).on("click", '.btn-edit', function (e) {
                e.preventDefault();
                if ($(this).hasClass("editing")) {
                    var parent = $(this).closest("tr");
                    var url = '{{ route("panel.admin.nutrition-programs.update.item", ":id") }}';
                    url = url.replace(':id', parent.find("input[type='hidden']").val());
                    $.ajax({
                        method: "PUT",
                        url: url,
                        headers: {
                            'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr("content")
                        },
                        data: {
                            meal_id: parent.find("select[name='meal_id']").find("option:selected").val(),
                            nutrition_id: parent.find("select[name='nutrition_id']").find("option:selected").val(),
                            gram: parent.find("input[name='gram']").val(),
                            calorie: parent.find("input[name='calorie']").val()
                        },
                        success: function (response) {
                            console.log(response);
//                            console.log(response.id);
                            parent.html('<input type="hidden" value="' + response.id + '">'
                                + '<td class="editable text-success">' + response.meal + '</td>' +
                                '<td class="editable d-none">' +
                                '<select class="form-control form-control-sm basic" name="meal_id">' +
                                //                                '<option value="" disabled selected>-انتخاب کنید-</option>'+
                                    @foreach($meals as $meal)
                                        '<option value="{{ $meal->id }}">{{ $meal->name }}</option>' +
                                    @endforeach
                                        '</select>' +
                                '</td>' +
                                '<td class="editable text-warning">' + response.nutrition + '</td>' +
                                '<td class="editable d-none">' +
                                '<select class="form-control form-control-sm basic" name="nutrition_id">' +
                                //                                '<option value="" disabled selected>-انتخاب کنید-</option>'+
                                    @foreach($nutritions as $nutrition)
                                        '<option value="{{ $nutrition->id }}">{{ $nutrition->name }}</option>' +
                                    @endforeach
                                        '</select>' +
                                '</td>' +
                                '<td class="editable">' + response.gram + '</td>' +
                                '<td class="editable d-none">' +
                                '<input type="number" class="form-control form-control-sm gram" value="' + response.gram + '" name="gram"></td>' +
                                '<td class="editable">' + response.calorie + '</td>' +
                                '<td class="editable d-none">' +
                                '<input type="text" class="form-control form-control-sm calorie" name="calorie" value="' + response.calorie + '" readonly></td>' +
                                '<td class="text-center">' +
                                '<ul class="table-controls d-flex p-0">' +
                                '<li class="d-block mx-1"><a href="javascript:void(0);" class="btn-edit">' +
                                '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"' +
                                'viewBox="0 0 24 24" fill="none" stroke="currentColor"' +
                                'stroke-width="2" stroke-linecap="round" stroke-linejoin="round"' +
                                'class="feather feather-edit-2">' +
                                '<path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>' +
                                '</svg>' +
                                '</a></li>' +
                                '<li class="d-block mx-1"><a class="btn-delete" href="javascript:void(0);">' +
                                '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"' +
                                'viewBox="0 0 24 24" fill="none" stroke="currentColor"' +
                                'stroke-width="2" stroke-linecap="round" stroke-linejoin="round"' +
                                'class="feather feather-trash-2">' +
                                '<polyline points="3 6 5 6 21 6"></polyline>' +
                                '<path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>' +
                                '<line x1="10" y1="11" x2="10" y2="17"></line>' +
                                '<line x1="14" y1="11" x2="14" y2="17"></line>' +
                                '</svg>' +
                                '</a>' +
                                '</li>' +
                                '</ul>' +
                                '</td>');
                            parent.find("select[name='meal_id']").find("option[value=" + response.meal_id + "]").attr("selected", "selected");
                            parent.find("select[name='nutrition_id']").find("option[value=" + response.nutrition_id + "]").attr("selected", "selected");
                        },
                        error: function (xhr) {
                            console.log(xhr)
                        }
                    })
                }
                $(this).toggleClass("editing").closest("tr").find(".editable").toggleClass("d-none");
            });

            $(document).on("click", ".btn-delete", function (e) {
                e.preventDefault();
//                if ($(this).hasClass("btn-success")) {
                var parent = $(this).closest("tr");
                var url = '{{ route("panel.admin.nutrition-programs.destroy.item", ":id") }}';
                url = url.replace(':id', parent.find("input[type='hidden']").val());
                $.ajax({
                    method: "DELETE",
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr("content")
                    },
                    success: function (response) {
                        console.log(response);
                        if (response.status == 200) {
                            parent.remove();
                        }
                    },
                    error: function (xhr) {
                        console.log(xhr)
                    }
                });
            });
        });
    </script>
@endsection
