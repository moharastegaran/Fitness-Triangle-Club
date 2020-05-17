@extends('panel.includes.tables.template1',['total' => count($users)])

@section('title','کاربران')

@section('breadcrumb')
    <li class="breadcrumb-item active"><span>کاربران</span></li>
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
