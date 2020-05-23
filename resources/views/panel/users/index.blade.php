@extends('panel.includes.tables.template1',['total' => count($users)])

@section('title','کاربران')

@section('breadcrumb')
    <li class="breadcrumb-item active"><span>کاربران</span></li>
@endsection

{{--@section('sub-style')--}}
{{--<link href="{{ asset('cork/plugins/animate/animate.css') }}" rel="stylesheet" type="text/css">--}}
{{--<link href="{{ asset('cork/assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css">--}}
{{--@endsection--}}

@section('content-header')
    <div class="w-100 d-flex justify-content-md-end justify-content-center">
        <a data-target="#user_register" data-toggle="modal" class="btn btn-lg text-white mb-1 border-0"
           style="background:none;background-image: linear-gradient(to left, #5c1ac3 0%, transparent 100%);margin-left: 7px">
            کاربر جدید
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
                    <h4 class="modal-title">کاربر جدید</h4>
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
                    <form class="mt-0" method="post" action="{{ route('panel.admin.users.store') }}">
                        @csrf

                        @include('panel.includes.errors')
                        <div class="form-group">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-user">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <input type="text" class="form-control mb-2" name="name" placeholder="نام"
                                   autocomplete="off" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-user">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <input type="text" class="form-control mb-2" name="family" placeholder="نام خانوادگی"
                                   autocomplete="off" value="{{ old('family') }}">
                        </div>
                        <div class="form-group">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-phone">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                            <input type="text" class="form-control mb-4" name="mobile" placeholder="شماره تماس"
                                   autocomplete="off" value="{{ old('mobile') }}">
                        </div>
                        <button type="submit" class="btn btn-primary mt-2 mb-2 btn-block">ثبت اطلاعات</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
{{--    {{ dd(count($errors)) }}--}}
@endsection

@section('table-header')
    <tr>
        <th style="width: 25px;text-align: right">#</th>
        <th style="width: 100px">نام</th>
        <th style="width: 100px">نام خانوادگی</th>
        <th style="width: 100px">ایمیل</th>
        <th style="width: 100px">شماره موبایل</th>
        <th style="width: 100px">
            <i class="fas fa-cogs"></i>
        </th>
    </tr>
@endsection

@section('table-body')
    @php $index=1; @endphp
    @foreach($users as $user)
        <tr>
            <td>{{ $index++ }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->family }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ toFaDigits($user->mobile) }}</td>
            <td>
                <ul class="table-controls">
                    <li><a href="{{ route('panel.admin.users.show', $user) }}" class="bs-tooltip"
                           data-toggle="tooltip" data-placement="top" title=""
                           data-original-title="مشاهده">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-eye">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                        </a></li>
                    <li>
                        <form class="form-delete d-none" method="post"
                              action="{{ route('panel.admin.users.destroy', $user) }}">
                            @csrf
                            @method('DELETE')
                        </form>
                        <a href="#delete-modal" data-toggle="modal" onclick="$(this).addClass('deletable');">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                 stroke-linecap="round" stroke-linejoin="round"
                                 class="feather feather-trash p-1 br-6 mb-1">
                                <polyline points="3 6 5 6 21 6"></polyline>
                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                            </svg>
                        </a></li>
                </ul>
            </td>
            @php $index++; @endphp
        </tr>
    @endforeach
@endsection
