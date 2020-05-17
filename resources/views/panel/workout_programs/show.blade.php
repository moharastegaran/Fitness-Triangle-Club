@extends('panel.includes.master-spy')

@section('title','مشاهده برنامه تمرینی')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('panel.admin.workout-programs.index') }}">برنامه‌های تمرینی</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>مشاهده برنامه تمرینی</span></li>
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

@section('spy-contents')
    <div id="spy_tab_info" class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>مشخصات</h4>
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
                        <strong>{{ $program->comment ?? '-' }}</strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @for($j=1; $j <= count($days); $j++)

        <div id="spy_tab_{{ $j }}" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">

                {{--<div >--}}
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
                                <th>تمرین</th>
                                <th>ست</th>
                                <th>تکرار</th>
                                <th>ریتم</th>
                                <th>استراحت<span style="font-size: 10px">(ثانیه)</span></th>
                                <th>توضیحات</th>
                                {{--<th></th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($program->items()->where('day',$days[$j-1])->get() as $item)
                                <tr>
                                    <input type="hidden" name="{{ $item->id }}">
                                    <td class="editable text-success">{{ $item->workouts() }}</td>
                                    <td class="editable d-none">
                                        <select class="form-control form-control-sm" name="workout_ids">
                                            @foreach($workouts as $workout)
                                                <option value="{{ $workout->id }}"
                                                        @if(in_array($workout->id,json_decode($item->workout_ids))) selected @endif>{{ $workout->title }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="editable text-warning">{{ $item->set }}</td>
                                    <td class="editable d-none">
                                        <input type="text" class="form-control form-control-sm" name="set"
                                               value="{{ $item->set }}">
                                    </td>
                                    <td class="editable">{{ $item->repeats() }}</td>
                                    <td class="editable d-none">
                                        <select class="form-control form-control-sm" name="repeat">
                                            @foreach(json_decode($item->repeat) as $repeat)
                                                <option value="{{ $repeat }}" selected>{{ $repeat }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="editable">{{ $item->rhythm }}</td>
                                    <td class="editable d-none">
                                        <input type="text" class="form-control form-control-sm" name="rhythm"
                                               value="{{ $item->rhythm }}" autocomplete="off">
                                    </td>
                                    <td class="editable">{{ toFaDigits($item->gap) }}</td>
                                    <td class="editable d-none">
                                        <input type="text" class="form-control form-control-sm" name="gap"
                                               value="{{ $item->gap }}" autocomplete="off">
                                    </td>
                                    <td class="editable">{{ $item->comment ?? '-' }}</td>
                                    <td class="editable d-none">
                                        <textarea class="form-control form-control-sm"
                                                  name="comment">{{ $item->comment }}</textarea>
                                    </td>
                                    {{--<td class="text-center">--}}
                                        {{--<ul class="table-controls d-flex p-0">--}}
                                            {{--<li class="d-block mx-1"><a class="btn-edit" href="javascript:void(0);">--}}
                                                    {{--<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"--}}
                                                         {{--viewBox="0 0 24 24" fill="none" stroke="currentColor"--}}
                                                         {{--stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
                                                         {{--class="feather feather-edit-2">--}}
                                                        {{--<path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>--}}
                                                    {{--</svg>--}}
                                                {{--</a></li>--}}
                                            {{--<li class="d-block mx-1"><a class="btn-delete" href="javascript:void(0);">--}}
                                                    {{--<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"--}}
                                                         {{--viewBox="0 0 24 24" fill="none" stroke="currentColor"--}}
                                                         {{--stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
                                                         {{--class="feather feather-trash-2">--}}
                                                        {{--<polyline points="3 6 5 6 21 6"></polyline>--}}
                                                        {{--<path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>--}}
                                                        {{--<line x1="10" y1="11" x2="10" y2="17"></line>--}}
                                                        {{--<line x1="14" y1="11" x2="14" y2="17"></line>--}}
                                                    {{--</svg>--}}
                                                {{--</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</td>--}}
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
            $(document).on("click",'.btn-edit',function (e) {
                e.preventDefault();
                if ($(this).hasClass("editing")) {
                    var parent = $(this).closest("tr");
                    var url = '{{ route("panel.admin.workout-programs.update.item", ":id") }}';
                    url = url.replace(':id', parent.find("input[type='hidden']").val());
                    $.ajax({
                        method: "PUT",
                        url: url,
                        headers: {
                            'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr("content")
                        },
                        data: {
                            workout_ids : parent.find("select[name='workout_ids']").find("option:selected").val(),
                            set : parent.find("input[name='set']").val(),
                            repeat : parent.find("select[name='repeat']").find("option:selected").val(),
                            rhythm : parent.find("input[name='rhythm']").val(),
                            gap : parent.find("input[name='gap']").val(),
                            comment : parent.find("textarea[name='comment']").val()
                        },
                        success: function (response) {
                            console.log(response);
//                            console.log(response.id);
                            parent.html('<input type="hidden" value="' + response.id + '">'+
                                '<td class="editable text-warning">' + response.workouts + '</td>' +
                                '<td class="editable d-none">' +
                                '<select class="form-control form-control-sm basic" name="workout_id">' +
                                //                                '<option value="" disabled selected>-انتخاب کنید-</option>'+
                                    @foreach($workouts as $workout)
                                        '<option value="{{ $workout->id }}">{{ $workout->title }}</option>' +
                                    @endforeach
                                        '</select>' +
                                '</td>' +
                                '<td class="editable text-warning">'+response.set+'</td>'+
                            '<td class="editable d-none">'+
                            '<input type="text" class="form-control form-control-sm" name="set"'+
                            'value="'+response.set+'">'+
                            '</td>'+
                            '<td class="editable">'+response.repeat+'</td>'+
                            '<td class="editable d-none">'+
                            '<input type="text" class="form-control form-control-sm" name="repeat"'+
                            'value="'+response.repeat+'">'+
                            '</td>'+
                            '<td>'+response.rhythm+'</td>'+
                            '<td class="editable d-none">'+
                            '<input type="text" class="form-control form-control-sm" name="rhythm"'+
                            'value="'+response.rhythm+'">'+
                            '</td>'+
                            '<td>'+response.gap+'</td>'+
                            '<td class="editable d-none">'+
                            '<input type="text" class="form-control form-control-sm" name="gap"'+
                            'value="'+response.gap+'">'+
                            '</td>'+
                            '<td>'+response.comment+'</td>'+
                            '<td class="editable d-none">'+
                            '<textarea class="form-control form-control-sm"'+
                            'name="comment">'+response.comment+'</textarea>'+
                            '</td>'+
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
                        },
                        error: function (xhr) {
                            console.log(xhr)
                        }
                    })
                }
                $(this).toggleClass("editing").closest("tr").find(".editable").toggleClass("d-none");
            });

            $(document).on("click",".btn-delete",function (e) {
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
