@extends('panel.includes.tables.template1',['total' => count($workouts)])

@section('title','حرکت‌های تمرینی ثبت شده')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('panel.admin.workouts.index') }}">تمرینات</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>تمرینات {{ $category->title }}</span></li>
@endsection

@section('content-header')
    <div class="w-100 d-flex justify-content-md-end justify-content-center">
        <a type="button" href="{{ route('panel.admin.workouts.create') }}" class="btn btn-lg text-white mb-1 border-0"
           style="background:none;background-image: linear-gradient(to left, #5c1ac3 0%, transparent 100%);margin-left: 7px">
            تمرین جدید
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-plus">
                <line x1="12" y1="5" x2="12" y2="19"></line>
                <line x1="5" y1="12" x2="19" y2="12"></line>
            </svg>
        </a>
    </div>
@endsection

@section('table-header')
    <tr>
        <th style="width: 20px; !important;text-align:right">#</th>
        <th>عنوان</th>
        <th>دسته بندی</th>
        <th>فیلم - عکس</th>
        <th>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-settings">
                <circle cx="12" cy="12" r="3"></circle>
                <path
                    d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
            </svg>
        </th>
    </tr>
@endsection

@section('table-body')
    @php $index=1; @endphp
    @foreach($workouts as $workout)
        <tr>
            <td style="width: 25px">{{ $index }}</td>
            <td>{{ $workout->title }}</td>
            <td>{{ $workout->category->title }}</td>
            <td class="text-left">
                @if(count($workout->attachments))
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-check text-success font-weight-bold ml-1">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                    {{--<svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle text-success"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>--}}
                    {{--<span class="shadow-none badge badge-primary px-2">دارد</span>--}}
                    {{--<span class="shadow-none border rounded border-primary text-primary px-2">دارد</span>--}}
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-x-circle text-danger font-weight-bold">
                        {{--<circle cx="12" cy="12" r="10"></circle>--}}
                        <line x1="15" y1="9" x2="9" y2="15">
                        </line>
                        <line x1="9" y1="9" x2="15" y2="15"></line>
                    </svg>
                    {{--<span class="shadow-none badge badge-warning">ندارد</span>--}}
                    {{--<span class="shadow-none border border-warning text-warning rounded px-2 ">ندارد</span>--}}
                @endif
            </td>
            <td>
                <ul class="table-controls">
                    <li><a href="{{ route('panel.admin.workouts.show',$workout) }}" class="bs-tooltip"
                           data-toggle="tooltip" data-placement="top" title=""
                           data-original-title="مشاهده">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75"
                                 stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-eye px-1 text-primary">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </a></li>
                    <li>
                        <a href="{{ route('panel.admin.workouts.edit',$workout) }}" class="bs-tooltip"
                           data-toggle="tooltip" data-placement="top" title=""
                           data-original-title="ویرایش">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-edit-2 px-1 text-warning">
                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <form class="form-delete d-none" method="post"
                              action="{{ route('panel.admin.workouts.destroy', $workout) }}">
                            @csrf
                            @method('DELETE')
                        </form>
                        <a href="#delete-modal" data-toggle="modal" onclick="$(this).addClass('deletable');">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-trash text-dark p-1 br-6 mb-1">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path
                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            </svg>
                        </a>
                    </li>
                </ul>
            </td>
        </tr>
        @php $index++; @endphp
    @endforeach
@endsection
