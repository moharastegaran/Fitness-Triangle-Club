@extends('panel.includes.tables.template1',['total' => count($requests) ])

@php $is_admin=auth()->user()->isAdmin(); @endphp

@section('title',$is_admin ? 'درخواست‌ها' : 'برنامه‌های من')

@section('sub-style')
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/assets/css/forms/theme-checkbox-radio.css') }}">
@endsection

@section('breadcrumb')
    @if($is_admin)
        <li class="breadcrumb-item active"><a href="#">درخواست‌ها</a></li>
    @else
        <li class="breadcrumb-item active"><a href="#">برنامه‌های من</a></li>
    @endif
@endsection

@section('content-header')
    @if(!$is_admin)
        <div class="w-100 d-flex justify-content-md-end justify-content-center">
            <a type="button" href="#user_register" data-toggle="modal" class="btn btn-lg text-white border-0 mb-1"
               style="background:none;background-image: linear-gradient(to left, #5c1ac3 0%, transparent 100%);margin-left: 7px">
                درخواست جدید
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="feather feather-plus">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
            </a>
        </div>
        <div class="modal fade register-modal " id="user_register" tabindex="-1" role="dialog"
             aria-labelledby="registerModalLabel" aria-modal="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header" id="registerModalLabel">
                        <h4 class="modal-title">درخواست جدید</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                <line x1="6" y1="6" x2="18" y2="18"></line>
                            </svg>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="mt-0" method="post" action="{{ route('panel.order.add',auth()->user()->id) }}">
                            @csrf
                            @include('panel.includes.errors')
                            <div class="m-2 d-flex justify-content-between">
                                <div class="n-chk">
                                    <label class="new-control new-checkbox new-checkbox-text checkbox-outline-warning">
                                        <input type="checkbox" class="new-control-input" name="expense_id[]" value="1">
                                        <span class="new-control-indicator"></span>
                                        <span class="new-chk-content">برنامه تمرینی</span>
                                    </label>
                                </div>
                                <div id="expense_workout">{{ normalize(\App\Expense::where('type','برنامه تمرینی')->first()->price ?: 0).' تومان' }}</div>
                            </div>
                            <div class="m-2 d-flex justify-content-between">
                                <div class="n-chk">
                                    <label class="new-control new-checkbox new-checkbox-text checkbox-outline-warning">
                                        <input type="checkbox" class="new-control-input" name="expense_id[]" value="2">
                                        <span class="new-control-indicator"></span>
                                        <span class="new-chk-content">برنامه غذایی</span>
                                    </label>
                                </div>
                                <div id="expense_nutrition">{{ normalize(\App\Expense::where('type','برنامه غذایی')->first()->price ?: 0).' تومان' }}</div>
                            </div>
                            <hr>
                            <div class="m-2 d-flex justify-content-between">
                                <div>هزینه کل</div>
                                <div><span id="expense_total">۰</span> تومان</div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-5 mb-2">ثبت و پرداخت</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('table-header')
    <tr>
        <th class="text-left" style="width: 20px">#</th>
        @if($is_admin)
            <th>درخواست دهنده</th>@endif
        <th>برنامه تمرینی</th>
        <th>برنامه غذایی</th>
        @if(!$is_admin)
            <th>تایید شده</th>@endif
        <th>تاریخ ثبت</th>
        <th>توضیحات</th>
        <th>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-settings">
                <circle cx="12" cy="12" r="3"></circle>
                <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
            </svg>
        </th>
    </tr>
@endsection

@section('table-body')
    @php $index=1; @endphp
    @foreach($requests as $request)
        <tr>
            <td>{{ $index }}</td>
            @if($is_admin)
                <td>{{ $request->user->name.' '.$request->user->family }}</td>@endif
            <td>
                @if($request->is_workout_program)
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-check text-success font-weight-bold ml-1">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-x-circle text-danger font-weight-bold">
                        <line x1="15" y1="9" x2="9" y2="15"></line>
                        <line x1="9" y1="9" x2="15" y2="15"></line>
                    </svg>
                @endif
            </td>
            <td>
                @if($request->is_nutrition_program)
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-check text-success font-weight-bold ml-1">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-x-circle text-danger font-weight-bold">
                        <line x1="15" y1="9" x2="9" y2="15"></line>
                        <line x1="9" y1="9" x2="15" y2="15"></line>
                    </svg>
                @endif
            </td>
            @if(!$is_admin)
                <td>
                    @if($request->is_approved)
                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-check text-success font-weight-bold ml-1">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-x-circle text-danger font-weight-bold">
                            <line x1="15" y1="9" x2="9" y2="15"></line>
                            <line x1="9" y1="9" x2="15" y2="15"></line>
                        </svg>
                    @endif
                </td>
            @endif
            <td>{{ \Morilog\Jalali\Jalalian::forge($request->created_at)->format('%y-%m-%d')}}</td>
            <td @if($request->comment) title="{{ $request->comment }}" @endif>{{ $request->comment ? ellipsize($request->comment) : '-' }}</td>
            <td>
                <div class="dropdown custom-dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink6" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-more-horizontal">
                            <circle cx="12" cy="12" r="1"></circle>
                            <circle cx="19" cy="12" r="1"></circle>
                            <circle cx="5" cy="12" r="1"></circle>
                        </svg>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink6"
                         style="will-change: transform; position: absolute; transform: translate3d(29px, 20px, 0px); top: 0px; left: 0px;"
                         x-placement="bottom-start">
                        @if(auth()->user()->isAdmin())
                            @if($request->is_workout_program && !$request->workout_program)
                                <a class="dropdown-item"
                                   href="{{ route('panel.admin.workout-programs.create',['requester_name' => $request->user->name.' '.$request->user->family,'request_id' => $request->id]) }}">برنامه
                                    تمرینی</a>
                            @endif
                            @if($request->is_nutrition_program &&  !$request->nutrition_program)<a class="dropdown-item"
                                                                                                   href="{{ route('panel.admin.nutrition-programs.create',['requester_name' => $request->user->name.' '.$request->user->family,'request_id' => $request->id]) }}">برنامه
                                غذایی</a>@endif
                        @else
                            @if($request->is_workout_program && $request->workout_program)
                                <a class="dropdown-item"
                                   href="{{ route('panel.workout-programs.export-pdf',$request->workout_program->id) }}">دانلود
                                    برنامه تمرینی</a>
                                <a class="dropdown-item"
                                   href="{{ route('panel.workout-programs.show',$request->workout_program->id) }}">مشاهده
                                    برنامه تمرینی</a>
                            @endif
                            @if($request->is_nutrition_program && $request->nutrition_program)
                                <a class="dropdown-item"
                                   href="{{ route('panel.nutrition-programs.export-pdf',$request->nutrition_program->id) }}">دانلود
                                    برنامه غذایی</a>
                                <a class="dropdown-item"
                                   href="{{ route('panel.nutrition-programs.show',$request->nutrition_program->id) }}">مشاهده
                                    برنامه غذایی</a>
                            @endif
                        @endif
                        <a class="dropdown-item" href="#delete-modal" data-toggle="modal">حذف</a>
                    </div>
                </div>
                {{--<ul class="table-controls">--}}
                {{--<li>--}}
                {{--<form class="d-none" method="post"--}}
                {{--action="{{ route('panel.requests.destroy', $request) }}">--}}
                {{--@csrf--}}
                {{--@method('DELETE')--}}
                {{--</form>--}}
                {{--<a href="#delete-modal" data-toggle="modal" onclick="$(this).addClass('deletable');">--}}
                {{--<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"--}}
                {{--stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"--}}
                {{--class="feather feather-trash text-dark p-1 br-6 mb-1">--}}
                {{--<polyline points="3 6 5 6 21 6"></polyline>--}}
                {{--<path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>--}}
                {{--</svg>--}}
                {{--</a>--}}
                {{--</li>--}}
                {{--</ul>--}}
            </td>
        </tr>
        @php $index++; @endphp
    @endforeach
@endsection

@section('sub-script')
@endsection