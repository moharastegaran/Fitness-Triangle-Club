@extends('panel.includes.master')

@section('title','مبالغ واریز شده')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('panel.dashboard') }}">داشبورد</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>مبالغ واریز شده</span></li>
@endsection

@section('style')
    <link href="{{ asset('cork/assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    <div class="container mx-auto">
        @if(count($transactions))
            <div class="widget-content widget-content-area widget-table-one">
                <h3>تراکنش‌ها</h3>
                <div class="row">
                    @php $is_odd=true; @endphp
                    @foreach($transactions as $t)
                        @php $request =$t->request; @endphp
                        <div class="col-md-6 col-12 my-2">
                            <div class="transactions-list">
                                <div class="t-item">
                                    <div class="t-company-name">
                                        <div class="t-icon">
                                            @if($request->is_workout_program && !$request->is_nutrition_program)
                                                @php $abbr = 'WP'; @endphp
                                            @elseif(!$request->is_workout_program && $request->is_nutrition_program)
                                                @php $abbr = 'NP'; @endphp
                                            @else
                                                @php $abbr = 'W N'; @endphp
                                            @endif
                                            <div class="t-icon">
                                                <div class="avatar avatar-xl">
                                                    <span class="avatar-title rounded-circle @if($is_odd) bg-danger @else bg-warning @endif">{{ $abbr }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="t-name">
                                            <h4>
                                                @if($request->is_workout_program && !$request->is_nutrition_program)
                                                    برنامه تمرینی
                                                @elseif(!$request->is_workout_program && $request->is_nutrition_program)
                                                    برنامه غذایی
                                                @else
                                                    برنامه تمرینی و غذایی
                                                @endif
                                                {{ "(".$request->user->name." ".$request->user->family.")" }}
                                            </h4>
                                            <p class="meta-date">{{ toFaDigits(\Morilog\Jalali\Jalalian::forge($t->created_at)->format('%d %B, H:i')) }}</p>
                                        </div>
                                    </div>
                                    <div class="t-rate @if($is_odd) rate-inc @else rate-dec @endif">
                                        <p><span>{{ normalize($t->price).' تومان' }}</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @php $is_odd = !$is_odd @endphp
                    @endforeach
                </div>
            </div>
        @else
            <div class="alert alert-info">
                تراکنشی به ثبت نرسیده است.
            </div>
        @endif
    </div>
@endsection