<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <link href="{{ asset('style/pdf.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
<div>
    <header class="clearfix" style="width: 100%;">
        <table style="border: none;">
            <tr>
                <td rowspan="2" style="border: none; width: 20%;">
                    <img src="{{ asset('cork/assets/img/logo2.png') }}" alt="" style="margin-top: 10px; margin-left: 5px;">
                </td>
                <td style="border: none; text-align: center; width: 60%;">
                    <div class="title">برنامه تمرینی</div>
                </td>
                <td style="border: none; width: 20%;">
                    <div class="code-label" style="text-align: left;">
                        برنامه برای : {{ $program->requester_name }}
                    </div>
                    <div class="code-label" style="text-align: left;">
                        شروع برنامه از
                        : {{ toFaDigits(\Morilog\Jalali\Jalalian::forge($program->from)->format('%d %B %y')) }}
                    </div>
                    <div class="code-label" style="text-align: left;">
                        به مدت : {{ toFaDigits($program->duration).' روز' }}
                    </div>
                    <div class="code-label" style="text-align: left;">
                        توضیحات : {{ toFaDigits($program->comment) ?: '-' }}
                    </div>
                </td>
            </tr>
        </table>
    </header>
    {{--<main>--}}
        {{--@php--}}
            {{--$days = array_values(array_unique($program->items()->pluck('day')->toArray()));--}}
        {{--@endphp--}}
        {{--@for($j=1; $j <= count($days); $j++)--}}
            {{--<div class="row">--}}
                {{--<div class="col-xl-12 col-md-12 col-sm-12 col-12">--}}
                    {{--<h4>{{ $days[$j-1] }}</h4>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<table class="table table-bordered mb-4 w-100">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                    {{--<th style="width: 30%" class="table-label">تمرین</th>--}}
                    {{--<th style="width: 10%" class="table-label">ست</th>--}}
                    {{--<th style="width: 15%" class="table-label">تکرار</th>--}}
                    {{--<th style="width: 10%" class="table-label">ریتم</th>--}}
                    {{--<th style="width: 10%" class="table-label">استراحت<span style="font-size: 10px">(ثانیه)</span></th>--}}
                    {{--<th style="width: 20%" class="table-label">توضیحات</th>--}}
                {{--</tr>--}}
                {{--</thead>--}}
                {{--<tbody>--}}
                {{--@foreach($program->items()->where('day',$days[$j-1])->get() as $item)--}}
                    {{--<tr>--}}
                        {{--<td class="text-success data">{{ $item->workouts() }}</td>--}}
                        {{--<td class="text-warning data">{{ $item->set }}</td>--}}
                        {{--<td>{{ $item->repeats() }}</td>--}}
                        {{--<td>{{ $item->rhythm }}</td>--}}
                        {{--<td>{{ $item->gap }}</td>--}}
                        {{--<td>{{ $item->comment ?: '-' }}</td>--}}
                    {{--</tr>--}}
                {{--@endforeach--}}
                {{--</tbody>--}}
            {{--</table>--}}
        {{--@endfor--}}
    {{--</main>--}}
</div>
</body>
</html>
