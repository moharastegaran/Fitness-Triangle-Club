<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <style>
        @page {
            margin: 0.5cm;
        }

        .width-100{
            width: 100%;
        }

        .col-12 {
            width: 100%;
            padding: .5rem;
        }

        .mb-4 {
            margin-bottom: 2rem;
        }

        .d-flex {
            display: flex;
        }

        .justify-content-between {
            justify-content: space-between;
        }

        .align-items-center {
            align-items: center;
        }

        .text-success {
            color: #28a745;
        }

        .text-white {
            color: #efefef;
        }

        .text-warning {
            color: #ffc107;
        }

        body {
            direction: rtl;
            text-align: center;
            font-family: "bnazanin", "times_new_roman";
            font-size: 1em;
            margin: .5rem;
            background: #332f32;
        }

        @page{
            background: #aaa;
        }

        .layout-spacing {
            padding-bottom: 40px;
        }

        .widget {
            padding: 0;
            margin-top: 0;
            margin-bottom: 0;
            box-shadow: 2px 2px 4px rgba(27, 26, 30,1);
        }

        .widget-header {
            background: #0e1726;
            padding: 0px 8px 0px;
            border-top-left-radius: 6px;
            border-top-right-radius: 6px;
        }

        .widget-content-area {
            width: 100%;
            padding: 20px;
            position: relative;
            background-color: #0e1726;
            border-bottom-right-radius: 6px;
            border-bottom-left-radius: 6px;
        }

        .table {
            background-color: #060818;
        }

        .table-desc {
            text-align: right;
            font-size: 17px;
            padding: .75rem;
            color: #bfc9d4;
            border: 1px solid #191e3a;
        }

        .table-responsive {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .head-parent {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            text-align: right;
        }

        .head-key {
            width: 120px;
            color: #ebedf2;
            margin-bottom: .5rem;
            font-weight: bold;
            font-size: 17px;
        }

        .head-value {
            color: #bbb;
            font-size: 16px;
        }

        .table-head {
            padding: .75rem;
            color: #d3d3d3;
            font-weight: 700;
            font-size: 18px;
            border: 1px solid #191e3a;
            text-align: right;
        }

        .direct-h3 {
            color: #ebedf2;
            font-size: 23px !important;
            font-weight: 900;
            margin: 0;
            text-align: right;
            padding: 16px 15px;
        }


        /*!*table {*!*/
        /*!*display: table;*!*/
        /*!*table-layout: fixed;*!*/
        /*!*width: 100%;*!*/
        /*!*border: 1px solid #336;*!*/
        /*!*border-collapse: collapse;*!*/
        /*!*}*!*/

        /*!*table.border-less td {*!*/
        /*!*margin-top: 0;*!*/
        /*!*border: none;*!*/
        /*!*text-align: left;*!*/
        /*!*vertical-align: top;*!*/
        /*!*font-size: 0.9em;*!*/
        /*!*}*!*/

        /*!*td {*!*/
        /*!*margin-top: 0;*!*/
        /*!*border: 1px solid #336;*!*/
        /*!*text-align: left;*!*/
        /*!*vertical-align: top;*!*/
        /*!*font-size: 0.9em;*!*/
        /*!*}*!*/

        /*.normal-label {*/
        /*color: #336;*/
        /*font-size: 0.9em;*/
        /*margin-left: 5px !important;*/
        /*font-weight: bold;*/
        /*}*/

        /*.table-label {*/
        /*padding: 4px;*/
        /*vertical-align: top;*/
        /*text-align: center;*/
        /*color: #336;*/
        /*font-weight: bold;*/
        /*background-color: rgba(200, 200, 200, 0.5);*/
        /*}*/

        /*.data {*/
        /*padding-left: 10px;*/
        /*color: black;*/
        /*font-size: 0.9em;*/
        /*}*/

        /*.text {*/
        /*margin: 5px 10px 5px 10px;*/
        /*color: #336;*/
        /*font-size: 0.9em;*/
        /*text-align: justify;*/
        /*}*/

        /*table {*/
        /*display: table;*/
        /*width: 100%;*/
        /*border: 1px solid black;*/
        /*border-collapse: collapse;*/
        /*table-layout: fixed;*/
        /*}*/

        /*td {*/
        /*padding-top: 5px;*/
        /*padding-bottom: 5px;*/
        /*border: 1px solid #336;*/
        /*font-size: 0.9em;*/
        /*text-align: center;*/
        /*}*/

        /*.code-label {*/
        /*font-size: 1.5em;*/
        /*color: #336;*/
        /*vertical-align: bottom;*/
        /*text-align: center;*/
        /*}*/

        /*.code {*/
        /*border: solid #336 1px;*/
        /*padding: 5px;*/
        /*margin-left: 60px;*/
        /*width: 180px;*/
        /*font-size: 1.2em;*/
        /*float: left;*/
        /*vertical-align: middle;*/
        /*}*/

        /*.address {*/
        /*color: #336;*/
        /*font-size: 0.9em;*/
        /*margin: 0 25px 0 25px;*/
        /*text-align: justify;*/
        /*display: inline-block;*/
        /*letter-spacing: 0.03em;*/
        /*}*/

        /*.padding {*/
        /*padding: 5px 10px 5px 10px;*/
        /*}*/

        /*[type="checkbox"] {*/
        /*vertical-align: middle;*/
        /*}*/

        /*.vertical-td {*/
        /*vertical-align: middle;*/
        /*}*/

        /*.title {*/
        /*!* this shit should be fixed *!*/
        /*font-size: 3em;*/
        /*font-weight: bolder;*/
        /*color: #336;*/
        /*!*display:block !important;*!*/
        /*vertical-align: middle;*/
        /*!*text-align: center;*!*/
        /*}*/

        /*.title-right {*/
        /*!* this shit should be fixed *!*/
        /*font-size: 2.5em;*/
        /*font-weight: bolder;*/
        /*color: #336;*/
        /*!*display:block !important;*!*/
        /*vertical-align: middle;*/
        /*text-align: left;*/
        /*}*/

        /*.header td {*/
        /*border: none;*/
        /*width: 20%;*/
        /*!*height: 0px !important;*!*/
        /*line-height: 4px !important;*/
        /*}*/

        /*.header td:nth-child(1) {*/
        /*width: 80%;*/
        /*float: left;*/
        /*text-align: left;*/
        /*font-size: 0.8em !important;*/
        /*!*padding: 8px;*!*/
        /*}*/

        /*.header td:nth-child(2) {*/
        /*float: right;*/
        /*font-size: 0.8em !important;*/
        /*!*padding: 8px;*!*/
        /*}*/

        /*.first_page {*/
        /*padding: 20px !important;*/
        /*}*/

        /*.margin-page {*/
        /*padding: 0.5cm;*/
        /*}*/

        /*.clearfix {*/
        /*content: "";*/
        /*display: table;*/
        /*clear: both;*/
        /*}*/

        /*.middle {*/
        /*text-align: center;*/
        /*vertical-align: middle;*/
        /*}*/

        /*.no-border {*/
        /*border: none;*/
        /*}*/

        /*table.no-border td {*/
        /*border: none;*/
        /*}*/
    </style>
</head>
<body style="background: #1a1c2d !important;">
<div>

    @php
        $days = array_values(array_unique($program->items()->pluck('day')->toArray()));
    @endphp

    <div class="col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="col-12">
                    <h3 class="direct-h3">????????????</h3>
                </div>
            </div>
            <div class="widget-content-area">
                <div class="width-100">
                    <div class="head-parent">
                        <span class="head-key">?????? ?????????????? :</span>
                        <strong class="head-value">{{ $program->getRequesterName() }}</strong>
                    </div>
                    <div class="head-parent">
                        <span class="head-key">????????????? ???????? :</span>
                        <strong class="head-value">{{ \Morilog\Jalali\Jalalian::forge($program->from)->format('%d %B %y') }}</strong>
                    </div>
                    <div class="head-parent">
                        <span class="head-key">?????? ???????? :</span>
                        <strong class="head-value">{{ ($program->duration).' ??????' }}</strong>
                    </div>
                    <div class="head-parent">
                        <span class="head-key">?????????????? :</span>
                        <strong class="head-value">{{ $program->comment ?: '-' }}</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @for($j=1; $j <= count($days); $j++)
        <div class="col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                {{--<div >--}}
                <div class="widget-header">
                    <div class="col-12">
                        <h3 class="direct-h3">{{ $days[$j-1] }}</h3>
                    </div>
                </div>
                <div class="widget-content-area">
                    <div style="width: 100%" class="table-responsive">
                        <table style="width: 100%" class="table table-bordered mb-4">
                            <thead>
                            <tr style="margin: 0;padding: 0">
                                <th class="table-head">??????????</th>
                                <th class="table-head">????</th>
                                <th class="table-head">??????????</th>
                                <th class="table-head">????????</th>
                                <th class="table-head">??????????????<span style="font-size: 10px">(??????????)</span></th>
                                <th class="table-head">??????????????</th>
                                {{--<th></th>--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($program->items()->where('day',$days[$j-1])->get() as $item)
                                <tr style="margin: 0;padding: 0">
                                    <td class="table-desc text-success">{{ $item->workouts() }}</td>
                                    <td class="table-desc text-warning">{{ $item->set }}</td>
                                    <td class="table-desc">{{ $item->repeats() }}</td>
                                    <td class="table-desc">{{ $item->rhythm }}</td>
                                    <td class="table-desc">{{ $item->gap }}</td>
                                    <td class="table-desc">{{ $item->comment ?? '-' }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endfor
    <div style="width:100%;margin-top: 3rem;font-size: 24px;text-align: left;color: #000">
        ???????????? ???????? ??????????
    </div>


    {{--<header class="clearfix" style="width: 100%;">--}}
    {{--<table border="1">--}}
    {{--<tr style="display: flex;flex-wrap: nowrap;align-items: center;padding: .5rem">--}}
    {{--<td rowspan="2" style="border: none; width: 30%;">--}}
    {{--<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIwAAAB2CAYAAAAayXtBAAAACXBIWXMAAAsTAAALEwEAmpwYAAAIQWlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDggNzkuMTY0MDM2LCAyMDE5LzA4LzEzLTAxOjA2OjU3ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RFdnQ9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZUV2ZW50IyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIgeG1sbnM6cGhvdG9zaG9wPSJodHRwOi8vbnMuYWRvYmUuY29tL3Bob3Rvc2hvcC8xLjAvIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOkRvY3VtZW50SUQ9ImFkb2JlOmRvY2lkOnBob3Rvc2hvcDo0ZWM5NDYxYy1lYThhLWYzNDAtODNhMi0zMWRiM2Q1MTQ0ZTMiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MzEzNmVjYjUtMGRlOC04ZjRlLTk4NWYtM2VmYzk5ZDhkYjlkIiB4bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ9IjRCQkY2NUZGOTlEOEVBRTFGQkY2MDdEMTcyOEFDQjVFIiBkYzpmb3JtYXQ9ImltYWdlL3BuZyIgcGhvdG9zaG9wOkNvbG9yTW9kZT0iMyIgcGhvdG9zaG9wOklDQ1Byb2ZpbGU9InNSR0IgSUVDNjE5NjYtMi4xIiB4bXA6Q3JlYXRlRGF0ZT0iMjAyMC0wNC0xMVQxOToxNToxMiswNDozMCIgeG1wOk1vZGlmeURhdGU9IjIwMjAtMDQtMTFUMjI6MDg6MjMrMDQ6MzAiIHhtcDpNZXRhZGF0YURhdGU9IjIwMjAtMDQtMTFUMjI6MDg6MjMrMDQ6MzAiPiA8eG1wTU06SGlzdG9yeT4gPHJkZjpTZXE+IDxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJzYXZlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDozMWEwYjUzYi0wYTc0LWMxNDctODEwMC1iY2Y4Y2IxOWM0NjAiIHN0RXZ0OndoZW49IjIwMjAtMDQtMTFUMTk6NDk6MjkrMDQ6MzAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCAyMS4wIChXaW5kb3dzKSIgc3RFdnQ6Y2hhbmdlZD0iLyIvPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0iY29udmVydGVkIiBzdEV2dDpwYXJhbWV0ZXJzPSJmcm9tIGltYWdlL2pwZWcgdG8gaW1hZ2UvcG5nIi8+IDxyZGY6bGkgc3RFdnQ6YWN0aW9uPSJkZXJpdmVkIiBzdEV2dDpwYXJhbWV0ZXJzPSJjb252ZXJ0ZWQgZnJvbSBpbWFnZS9qcGVnIHRvIGltYWdlL3BuZyIvPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6NDMyODE4Y2QtYjUxYy1mZTQ4LWJjMmYtZGY0MzI2MmYxOWMzIiBzdEV2dDp3aGVuPSIyMDIwLTA0LTExVDE5OjQ5OjI5KzA0OjMwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgMjEuMCAoV2luZG93cykiIHN0RXZ0OmNoYW5nZWQ9Ii8iLz4gPHJkZjpsaSBzdEV2dDphY3Rpb249InNhdmVkIiBzdEV2dDppbnN0YW5jZUlEPSJ4bXAuaWlkOjMxMzZlY2I1LTBkZTgtOGY0ZS05ODVmLTNlZmM5OWQ4ZGI5ZCIgc3RFdnQ6d2hlbj0iMjAyMC0wNC0xMVQyMjowODoyMyswNDozMCIgc3RFdnQ6c29mdHdhcmVBZ2VudD0iQWRvYmUgUGhvdG9zaG9wIDIxLjAgKFdpbmRvd3MpIiBzdEV2dDpjaGFuZ2VkPSIvIi8+IDwvcmRmOlNlcT4gPC94bXBNTTpIaXN0b3J5PiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDozMWEwYjUzYi0wYTc0LWMxNDctODEwMC1iY2Y4Y2IxOWM0NjAiIHN0UmVmOmRvY3VtZW50SUQ9IjRCQkY2NUZGOTlEOEVBRTFGQkY2MDdEMTcyOEFDQjVFIiBzdFJlZjpvcmlnaW5hbERvY3VtZW50SUQ9IjRCQkY2NUZGOTlEOEVBRTFGQkY2MDdEMTcyOEFDQjVFIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+LQOR9gAAgLdJREFUeJzsvXeYZUXV9v2rqh1O6tOnc0/3TE/OiYEBhpxBogooIpIURKIBFQUVBQQUFFQQzKiAJEGSBIkSHBjiDJNz6J7O+cS9q+r7Y5/uGQMoD8/zvN91vW/NtadnTp+zz961V61aa933WkvoUon/iSGFi0ajrUYgohetBgwWUMJDCAUSrAQQyDBEGLDOyHvLnxMKgQQZ/X9wxXbcCo94XZJ8zghiYAPfGmsRwbBMxGKCipguArGdrikk9F549GknP1iY0taxdW6+d6g+6B/et6unJxbktB7o7acvOyDAoC02NJZ0Ik26Mm3dTNyrbajrypWKz6UbKvTsGfM2e8Te2Oug/ZxMXaJ353vXQBgGSGOFqxQWaY0FqaL7RIDVBqMN0pEIUb5P7Og9W2ujWxdidBp2HhaLMQZHOBih0ZRwiI3OtbEmOpcdmUNbPv8HG+L/rwIjiATGWgvCHZk4AcKWurKEgZbCCaWIO9qNSxsUFdKP4znlC+jqY8NTL3vrtm7abVVP395t7a0HbFu/ZrelL73qAbUaBRh8HBQuyvVwkwniMZ8QSYhAS0O2mGe4kCMsBAQ6xGCROGgMSnl9C3ad60ybNeuduvFjX5w1e8bTc3abvWTy5Al/J0BhYFGuxWKRVmExYCzGWIT6fwIDfACBsWCVwGoNQiCFACHL/wAQ1gDFtl5lXRzHVSUvU2kAihrWLl0+fd2jTx/w+D137b99/YaDenOdTQN4JOOVZNwU1dU14DlgBcq6gGtDFVqjtTDWWm210EYQWoEGa5UVWhohpbI4AiOl0FqhMATG0tM/QP/AILlCgKtcxkxsGJg4dfxb++2/79OHHnHAM83jJr1UXZscnZeSNrgSYbVFG2tdT2FtJABYRoXn/wkM/GcCA2gtCHIBwhX4cY+CLQorJXHpYcBaQI180WCeV5Ysrlvy5KNnLLn3yVNyG7vmGwoElZU0NtRjEgl8o4xjrB7WJSebzcNwYAv5AsXQIHCEWxGzqUylVZ5jXcfHWERgLBpsEAZCByV6BgfsQH6IQAgrHF/4fkL4vi8SKd/IWMxqgTDGOPmhAt3dPQzlh6nMVNA8fsJrhx97yEuHHLL3b/fcZ/c3Ry7bGEOoDZ7jYMt//p/A/Jc1jMQEAUIKsIEKStoNvGSQ8pQurN5IrGEcXWGOd378gwMef/zpT61asvyTvfQnGknRWNuC05jEDVwrCoZ8z6DpH84yCKKhuU6MGz+R6tlTqJnQZOOZtEiMqSaZqCAVi1mDEdHFWBsKQ6AEUguUFbYQ5BkIhunt6LK5jiH6+oZF+9YOVi5dybr1W0AI0ukKUtUZIV1HGLQoFg19vf20d3WTrqhk4e4L/vbRk47+8VEfOeCxuvq6gWhSDNYQaVAbPVGLtSPP9v8JzL8RGEKL8BWIEKwUti+n8kEhbhrqSykorrjnUd68+7EPr//ba5du3v7KHhVOHU1jpoJNMpw01hYGGerupZQNjEhXy+n7787kvXcT6ZYm68UVzTOmidaN2whzeeu7juho3UaufZiO7e1k8wVsydrQGLSyWGWR0kO6HtVj66muq7H1jfUk0j6hAxU1lQRWi21bt9ietgG78o3NvPTSK6JtU6v0XEVNYx1+MolUDvl8SNv2brKFQVqmNHd+8pQPX/Pxjx3z0/GTmqMHYLQwo6aMwJSfrpL/Qlr4fwJTtikMRoNQAiEtfUbjS5cE0Na2nb9dc9Mpr97/p/Np69yroaYexjXiuZ5Wgzk6N3eKrA5t84zpjDtyP9G8767WzVRIJYUYXL+VzmXLiTWN5ZALTmPDs6/xvSNOsxpBOlWJjScJYx7KVUIKaUNrhBVYgSAUkd2RHy5SKBUo6VBIJ4aJezbTUMPk2eOZMXe2SNYk7JhJDTjxBEO9Q+KdZat57vGX7bK311otNC1NTSQqY7aIld1dBbF5cydjxtZs+fCJh9578RdOvaRxTK0GCI3FkQJtLELAqK3Pzo87UkCRwKj/ewVGhFpaIaxypC0RaeK8gdev/cEJr9zwmwt6ulcfON4bR7xlLMZ1dCk3yODmDmINTXLaaR9mzP57WieeIjfYj9jeK7a+/BarF79K7/o2sZ2NnHPzbRxw3icB+O3F1/DyDbfTuNs8i7bCWoMRIjqwZS/JwUqLNmCstEZZoQU2DKUAx5ZKAYO5PtHbl2UomyXTWMUue+3JLnvNom58ynqx6AEufXOluf/OJ+yG9dtpbBkr0+m00FKJ7r5+1q1fz+TpMzZ86uTjbv3ihR+9KZVO5iHADAtkwsFIg9UGZDSLQoNwFJoAYyyu8P7vERiEQkiQ0mKRIixpN9BFEvFEKQTWP/n8vFe++K0fblvx10OaYlPwp06n6BStWt9huwb7pTd9HAvOPNU27revkD6sf/kVu/WBv4itry7HKQpkbYWNVVeKuIqzds1GPvnba6jefTI6nyeeqeP6eceTaW7CuB4WgxZgEWgsGoERkcCEFqyVGBnNvzESIyPXOpQag4MVgrAUMtCXp7dvmBx5O2nBBHHwkXuw5967Wjfu2JVLN4jbf/mIeHvpZiprktSPSRsrXLmtq4tN67vYZdb0jd/6zmfP/ehH9n8CwFqDAayxIASiECK1RaR8QnIYI/Bk/P8WgfERQmCEBBHiCAlCAjA4MCz/ctFXfrDpd/d8odqLkZ42F+25paCrVfZubZOZXfYUc776GTKzp4m+1lY23/YQW//yMsW+ATIT6hDpKgIiGzJUAmsl3Wu28bGbr6Brfpo1P/kd5/76F/zw+Itoe/ZNqieOpyA1FrBih8BY4WD+TmAsRgisiYTJCIEWEApB5OQIAgkai0DY4XzIpi3bkTHYY7/Z4qMnHm1bJlfQ1TksfnnrAzz1lzdNTV2DrRmTRBOqdRt76B0Y5sTjFz3wg2vPv7ilafxGgKCQg1ChQoH0gZhHSL4sMLH/CwTGgpIeSilRktpaA76MIm5rHnxq39fO/8otva1vzWmu3w1qMzYcHrSDW7bZxLxdxIwLzhA1++4qhletZ9nNf7BdT78ivIoYzph6RMwjtHaHlpCAAGMlneu38aGrvkj6nA/xw5ZduW3bRpa/toyfH/JZqmdPw0Q+0qjAGCswMhIYvZOGMUTnM1JhUGgkWhisiLSBFg7GWgwWQ6SJAq1p7+6x3d1dzFkw3X7qrGPEgt0msnL5Jn75y8fts88sY+z4etI1nhweDlm9qo2aBlm45qqLzj3rtI/eBqCHShBalCcg8X9OYOQHPsP7GBaJkB6e7yMdQCAcHSpfOoTAI1/5+hee+cjxLyS6u+ZMmn0QXk0V+dXrRKm1Vc655hvqwId+KZPVabHk9Ev46/FnM/zOClEzeyKJ8XVIR4KxCHZMjCjHMiwCJSW57Z2Mj9WxYqiLNVdfw+y9F9C023SGu/uQ4n1OxejcGxiJoZT/IARCiAjOsBYpJY2NNcyZN4O+TiEvvuAme/YZ37OFvORHN18obr71QlEsdIpVb28lHUvZPfaYiXTqY2efc/1vTvrsZTcPlvKOqvCiMIMjI+Pugz/7/9L4XxUYIQQ60FgryWtNUZeMVDHd2tox+fbdD3mp5/prb6ifNBF3xixjh6RtX7nE1hy+N0eufpGGDx3C4rO/yuMnnkl+82bq5sygorYKQ0hYPv8/zeHoVgFezKd/QytpwNtnH/5w5ZUAzDzzRPraWrGqLGSjn/2XZ/z7MSqQ//C1lIWnLDgyEh5hjRTpGsP8+dNFmKsQX7rwVj595nVMmtjMq6/ewVlnnWjfWLHObB/uN5PG15gFu87hnrtePm/27p9c8sqyVdWy0gNflL/2/4zE/A8LzN/HEISQWGsoFgM84eE7Pite+tusP+6676vitRf3rpi+L0mvwpRWLJddnevFnrf9Uux+3y9Zfecf+cueR5F9+U3GzpmLV1tJwYaEIrKHpFW817KTWERFgq2btyCAWQcfytMmgOeeY98zPkL12HqCgUGsAGHFvzwH/+rs5ajsP39C7PTmHRoHYcG4hCEiVemIOfMm0NetxVEf+Za49ocPcPm3P8FfHr5S2LziteXrrHUKepcFk2nblttln8PPf+vOBx4/GBRCUMa0xI7v+F8a/4MCY5FIHOXiug6u66IEWLT0fQ9HCV75xe1feGnf416r7Ouurpm9O24obc+q5ULvt5c9dPVfbfXM6byw14m8861rbP2EMSQmjMXoaLLezxRZIOb59Ld3QsGwy4IZvAos//I3qVaw9wWn0d3WEQn0e5z4n371L+VzJET7zy/vrHVAYo0UtbUVzF8wy/76Ny+yaL+LKZaUWPHKj8QpJxwu3nqzTeRL1ixYMMVmUplxp5x87dMXX/nTUwA8mURbXT65eR+z8cHG/6iGGcENi7kChWKeUGjiiZQRAp666vrLl3z21BvqUhXxyllzbT5bsPn1r9Pwla+Jw56+T3Tc+ah4eM9DKG7ZQP2c3YUVMYwOCSPsAPs+L10oRThcJNvRw+SaWorAi6+/CqvWcOCXTiWWSqFzeYz4oKr+vURZEqFgNjLGpcAicENPzJ89SQgvJY782PfEt679g7jtls/LX930ebF6fYfY3lOyLS2TbPOsWn74rZtvP/mz1/wMwHcSYAOELu2wn/6Hx/+KDRNqQ1gs4UgPDTx61Q++svGbX/n2uJoWnPET8TZvobBpNRPvvps9rvoSiw8+kTe+/jXqpkxENI0l0AUCWaYWGIEhmuj//NFGEJEphWS399A4dizEPF4QDm1f/z4ZYNFZn6BnSxvq/Ri/7/p8/tWVWaLpjrbOyDQXWCGxUmNMkerKOHsvnMWtP3+RXfY/m48eu4g3//wDhvoGxTvbBkVtpsVOWbgXd/3ivs8ee8oXbgFAulhCMAptTQQZ/A9qnP/RLalsE5JIxkUqXUkIvPqN73+l85tf/n5t80z8xrEUNq6it6jFQa//VUw6YHfxyLQ9aX/2Warn7IJ2PYzRowJiBGhpsWJkwkd9FODdn5/AYsuYzNY3lzG9aSLNLRN5fWwNr/3pT7BlKwd/7UyEHycolT7gOt3BaXmvIRj14iwIK0YE1YTstts02jpcO2PPr1J0Sqx75SeMrfTs2+s7SFbFzbhFi3jkzuc/d+ynLrkFQKo00goRGi0CUypvVf8zRrEc2VM/0CHLoIe1o9eprQFhEBiEjEL9L13+wy9v++4l328eO5nqinobrtpibaXHIStfIig6PDlpAW5PLzUzF0AYluMZjB569N8WWw4xjAjOiPC82zBA3PNZ88pbxIC9d9mFdcM5NvoOWy67noaExx6nHEnPxjasklhh39MA/mBjJDYiRv4jLMKCJJSCkgmY2lJPLJMSiz50rXj2bytY9uK1zJvVIN5e3Us6ETeTF+3JI3c897njzrrsZgCpHCsCibQCR7wf7fv+hizlC3zQozCcw4QhwnURrkK6CqkEmoAsggB44+bbz++54uLrqhvHk0o229z65di6hDhi43pbeH0Fr+69J6l0Nf74sZQoRrFSYBRoY4dQ6HJgzmAxIjpGJujdwlMC8OIxBlo7AZg0oYVwaJBXZzax4va7CFdu4NirP48rJDpfxCDf5UwfZPzj+Xa+2kg6ZaRvKBlETVWK2VMn84nTbxE//cUT4u3Hfsjeu84Uy1duFW4qZSfvtYCHf/Wn8075xjU3AbgSK5SDoKwJ/gdsGvX1L38Fa8wHOozWCKlwfA9hBcYC0qCxuMJh6/2PH7b5jI//IVU3jljNODu0cSO2toED1/xNdNz3GEtPPllUTJhILFFFaA2UH1Y0nWr0vg0RlGBGpldQ3q5kNO1yZGWJSNvs9DlpBVYpsv0D7Hfup9jc38HjDz2CO2k84zb3UtE6wIRTj6M7n2XZoy9S0TgGa82oFgOxk0Yr2x5CluGE8myK8uujoi6xYuRztvw7Gd2ZEOXflW+kfH7EiH0mkSaidtY2NnLHXa8CBX7/k/N47qW3eX1ZBw1j0oi68eKVPzy2R6nGiR2698KnxWgUSGLKnjw7zcUHHVJIyQc9pJQ7FouGMDQUsHjSZ3j52olrTjjl3ky6nlTdOCs3tQrrWLHb0udE9wN/ZdXpJ4qqcVMhXk1RhjgGlI1ERkYy8A/3arDC/sMWtWOrMmLH1rTz+hWA6yjyg0MU2no57OijmdIynnRtAxumtLDpz4/Tv72NYy77LPF0gtJgLpp4u9Ok/2+MUQktk+At4JSYvVsT3/n+n7j8x/fw3P1XiJlT68SqzUNUVgibmT2faz7/q6/d99SSAwVgbIHAgg0sOggwOuS/S1v+9xi9QmBMmfIjNdJaErj0DfQkXz70kBdrCCpjYyebfNcmhov9dtdlr5P/y0usP+0jJMfPRSbSxEshromkQyKQVkbqmR2+xchKhDJqzD8ftmzfmJ1iZ6NTJSWFoMTGVatoSVWhsWxet5b1TQk6S0UWX3glNZ7HMZecRe+GTThC7vSN/9tDY4XBopChRGCZuWA2V1z5iLjqpw/Zt5/4pm2q9dm8NU/1mFobnzaRj3/q8gffXL+pWok4Np8VyoCwEcQu/rs0DMbwgQ5tIlql1phinqwIkV6EDb19wpm3pdu3NlW1TLM6t82EXV3Mfv4ZzEAvG0/+JPExk/H8FEKHlGVlh2YBFOLvtc2IZTMKqBF5TDsJzwgebvl7ocGCUZJiGNK2Zj0Au8ybR32igu01Sd5qrmD4j8/SuvhNjvz8J/GbqskPDP2fkhZ2fLGNti4rcGTA9PkT+eZVf+K+P7/Fkke+jZAOPb0Fmic0Gyvc9BGfvPKhoaECnp+wgFBlHo3dySH5IEO6iTgf6EjFceMejhudUEuJFLDyqptPzj398Im19Qvo9oVl0yYx5ye34s2cxqrd9sGvrcGmGwjRGGFASER5JZTjoNFPKyLB4e+FaWfwNdIqtow279ieGPGmyi65FQZPSIa2dANw5NHHsmntBir9CtZVKBw/xl8uvhoHOPaKz7F9/RZc4WP+jwsNCCQajesYWqaOF58877eit7NXPPq7C8XA5l6yOUvjzJm269U1+3zmsluuQQmQ2gpHC5QRQUlj9E4I9n/xkCLm80EO6ccwQiIU4BVI47Jm8SsTBr55we3NlS3olANrX5P+SWfL9Kc/xao99xauF8erHYMKS0gbcUqijUiMbgE7axthI8H5O4EZ/TliYO7wokY0y4imGR3WkEyn2L5sDQD7HHwgbT0djIulKExu4u1qh+zL77Ds/ic47pTjaFo4lfbWdpRU/J8cO+5QobVLynepmJBm4cdvZv7YJr521UfZvrxVJMKQzILZ3PvzP33tt489f6RwHYx0UcrFVSN8ow8m/VJYywc6sIQ6QAdWSJWiH03biWc+UQHSb8hgNq6wuZZdbM1dP2f9qZ8jsX6tjU2ahA716EXsiH3uPEE7/j0qKFYg7Y4A+4gwCSv+KWayw7sph9JsdLZUdRUb3l5O+/ptTGlpYd68+WzYupGJU2fyV5GldlwTj3/1hwCcfdOlDPT2YEv/e1jNew4bacmQEs0VtRRLLkedexPXfO44sc8xu4oNW7tEZU0C2TKBT3/+F3f25fqVBFvUgGNRMnpm1hqM1REH6H0eUvLB/mAtsYQrwoS04LLpyisu9FtXTnPHz8b0Fxm2RWY/fT/B7+4TPff/Wuip84UslqLoKwJhLdJalDWM5FmMxEpHjlHXVURblsQw4qAqotjFzpo2mlwRGXyAKG9XAEhBaTDLmsVvAbD7rruybNky5o+fTKE5wzqnRGFrK3dfcxOzdpvDQZ88mo4N7Uj1j1pGACYi2Y7+f8d3l6Hvvz92/vTOL+9sXoiypW9V+WZ2/lx5m0VgQ8uMSZW8tmQTX77+Lh6/5XybqKqmqz9H87gmTHt/5pRv/vLW6JaNjWZLo3XIP0et/vNDGv6Lf4TFRA9ZBtoVCbeSTZveqch/6+qrq2rq0V7M9nWupuaKK4UfrxT9p59NVdM0lDWE/6AVo6iDGZ3TfxV8G+HTjmocW45l7LRHifKHhf0HGM5STmWJzhuLJ1jx5IsA7HPw/vR3dhOP+0zbe1ee6N/C9KlTeeMXf2Kws4+zfnwJIibID2T/hTaPotn/euwwWt8tDv2PHpj4h9/+09eVA8PSKowIKBlL09xmfnDdK7y9ZoP4+VXHkVs7SGgHic+eymM3v3jWg8+/upcrowmy0kUqiZLqv3yIIAze5YbfYx7KkTPpSiG1kUWBkVLZlQcfdpd+9qmTKmcstMHGjfTOmipann+OnkOOg7eWEEycgtXlFSLAWEVJgrIGLRWh1RQGB7DDIVobQiExuBGTXxq0ljjVGURtmjAIKXT1kg9CAqHQJgpUhQKskKMxmWi1Ohgh0ZjoZy5koJjju5ufIzWmijkTp3Dsccex7+GH8rWLv8JpajzOkIveYzKX/vFHPHjrvfzk3CupbW7GChHRN4WLERYtLdqqKP4jRHTNRkWGtrToMu83WmAuBgctDFgZcYKlpVSGBIyIrDhjJUY4qLhPVUUSPIEmBCQaF2OjxaOlBevQO1AEVWDNI1/ns5f/zv7pgTdF85QqWtd20jytYeWaJ6+alXDiGGQUNvwA3pLzvl2tssYkMBislQjjusque+jPR8pnnz4pPmUaIlc0Q8Ue0fKLxzCPPidKS55ETt8VEWjsiOFlBUZYPAGBDRhct5XQ8aiYN5PEpBZ838HqgFD4hEIgVEgYumxYuRy/c5C8lKTnz6RpfAMWDSWHkhIYR5YfjC1vZ3I0TlQISlgbEY9a27toXbWBuU17MG+3XXnq6Wc4+4JzWXjg3jx99/OcMnEBf33oKRY/8Bwf/tzH2LJyHbmeYWKpBNaGaOGipYzwLhF9z0iKihmJ1gqLFhGUAQ7goBGEwiLKfmCoNMZYjFVo6UQYvFTkA0P39m5eW72R4SGYNLYBWeFgdBRMNCMPzghqqhXr38ly/e0v86PLjhN/emQZQ8OKiqkNtC7ZOPOG3z955mVnfvQ3mICIGxs9RGuj63g/Q4Rh+O/f9Q9DCkmgS5hsUcQq0zYUsGKvPVcmFi+f4Uydr3vXvibiZ58jxl59BevHThZeVYYwURPRKYUqb0ASPElhWztD2RJjTzqWXS44Ffbe6z2/e+vyJTw47+M0H3kQRzx0Cwnpv+/rHxlFHeIrhz/ccSdnn302zz77LNuGOvn8pz7LaXV74OUV62yBW1+7k0RV5X/5ez7IWLytk3t/8xR33PsyQ9ph0vgawlATEmkkayVaCDAltqxt5fWnLue5xcu5+Et32rqZjXR3dIl0Xbq/9Znra5Ou0lGgQUbZuNYi3ieX2fn3b/n7YQUIY5FCiVC4IKD18b8caBa/OiPWNJOhXKf1EKLm69+i/arrhCn2otMTsaEe3cWNEDiOJL96I7m6Og666wckjzqU5Xn4ze3PsGZ9FwNZiaMg5hhcAa1b+zjxQ3O55KR9aJg1iUnTJ5OQPud8/bd09AekKyChEhS6VjDc8w6e50B51Q8ODjFxwgRu/ulP/+5efBXd/mGHHUa6ooJnnn2Oiy78HHssmstvVhWoGr8PQ22rOeazNzN19iSG81kSocExgCnhKosLuKFASY0QAXHjkk7EyGcH8EqghEUJjWcNjglxrMFqi4/A1QYlNK6wSBsgbYgMBTIISbqS2ORG9jjtoyz65ic5+fRDOfvcG3l71RZmTR6PFjsvdIt0JLKyiq9c+wB/+OGpfO/nj9M/WKK6uYae11Znrvn9oxde9emP3CgIrUEgtPkvxfmFMfrfv2vnS7MgrBVCKmFCa/pcwYbdDlk85o1n9szPmEVu1QpbdfkPcI46km17zhbJ8fOQwiEUmkCAEQ7C8SisX0928iQOf+lP9NfU85nL7uH+p96G/iIkYhGIZDQogZQS0zlArFrS9saN9F91I2uefo3Dnr2dBUdcxtLXttPQ4CD9JNmOZQxufxpfgLERGBmW1fefH3uMIz/0obIX9veo3HnnfI7nnnued5Yt5Z47buNTl16BO+1TpD2XbHc/puDhyyxJLEpbkp6DDAqIUgkP8GyIZzVxAzFXoII8XlAilxuiUrnEEy7ChPhhgKcUsdDg6QDHaBwHfGnxsbhK4RkLw0MUsp3U41H7ocPY+8GbKHqVHHX6DTz70mqmT2si0JEdqEXE8A2VYPvbK7n7t18gNCGnnHqjrZvbQvf2LhGrFP2bnrhubH1FddbATgLz/uIyzvvlfIhR7o+22lX0PfjcYek3ntmzOGk8oruPytgEnHPPFD0XXEQKB6RHKMIRKC2yYbo6GYxXcejf/khXVT3zj/0h25d3wpRaUvUKZUuUcWqc8qTK2ma2vbOFF1a2cdxpR/Di7x5GAoccugub1/cwvqEGJ+ajU7vQn2hFh0Noo5BSIoVg7aaNPPfMMxz5oQ/thEvtGCed9Al+/Ytf8NcXXmSPAw5lTvLbdG5/ETHhSMamLLEqD196CKNxraEiHoNCARkUcbA4NsQVmpg2SAOyFMN3NQtnLyK7rYNcRxeeq3BtSFw52GIO1xh8KfCExVeShJTEkjES6QRu0sdVLuGylQw+fjuP1z3DESte4cnffpFZR13G5rYhxo2pjOroIMsLIECMm8Q3b3qEx289jSl7zGBjWweJpmqyz76ZuenO506+4pzjfwkQSon7j4HN/2DI9xsatgaLscIKYQPAveHGCzzAeJlQdm+38ssXYTauQd93O07LNIzVYMtxXBsRD4Z6e9n911fgVo1hrzN+w/a1XTi7NJJ0faTRSCtRRiJMRAgSuCgdQkpw393PQctMKmeNh55OZs4dT6hzFG2R6VObmThpEiGKZDIWoeiANoa45/PKK6+860Tsf8D+TJ8xg1/9+ld4nsee+xxCtm0xyexmcNKg8ygrUFqgsBSGB9FBESksChtF4m3EonGsxncFXtxl0vQp1IypxRYKxIyOtEchT4XvE/ccHCxKa8jnKQ0NUmjvILthK8V1m6mwIY2nfoT6T32O9GA3z++5Pwq4/ccXUBgaoKh3CH2UQaoZU+2zZslWXljSylfO3lfo7UNChgZaGrn13qe/OGxMmQVQZuW9T+xQall2Df+TQ1mMsoSEVgpJ/7LlM4LnHz2Ohilk+nNo6Vvnk8eI/K/vIYVLwfOQZeKKtBYrFGFPHxXTZ1J74sf4zp/fYv0LK1DTGnBLGivz5ZuPKAzSWiRR/rURAWPqKnj8mTfoBWYftA96zUaaWxpRSuFZybbN2+jp6SadbkY4MuLpWIW1hgnjx/HKK4t5dfFr5Sn+h0Cakhz/8Y9z//3389orr7LogANJJBRBx+vErI/VCmMtylFIBK5wiHkxpJA4VuCU4z/KRtWz0qkUCeHz4j2P0LZ8HcmKCoQVOEKhRORdOUbgGIGykS3kCIGDxSsWCTt72PbUSwz85QUmHnkYVWecTax1I73nX8ruU8Zw+AFzaOvowQoXgUUIgzBxrNGocVX85N5l7LvrZFIzWsgPBDhNNXS9tWnWQ8+88hEAaQNACiEjxuR/esioHMB/dlgbYtDCOtIAyB//+hsQkohV0N++VqovfgnP8TC/+oXV48bhhCNUIEsoJQXHoPt6mfCZE9DANbf8BRprcI2JHE8jy0E5ysKiURiUNThI0n6Mrm09PPbqSiZ/7Ei6W7uY3lxDU2UFYQi5oTwmCPHdWnp68jiuwKKR0kEbQ6FY4qmnnn5XLXPe+efR0tLCAw88QDpVwZyZC+lpX4strMOTQJDFESHSGoQ1KGFQwiKNQWFxsAgb4juS3PAAucEBXGNwjEFajcDgu5KE7+F7Djooomz5HoXBleBJRd6ECCVJ11RTWvIWm//4AHULd6GuZT6bf/oTGOzhsxceTxAUI/7uDgYXoZDUZyp47cWVbGrL8Y2z9yZs6yHmCEusnh/d/sxl0TtjO4G2//khlbH8J4fUFkeDRCKEy1BuiPwj9x8Vc1NYo8wQ2MTHjxfFR/9M0eSFVRUgDGaE6WglMgyQTpzajxzJnzsHKW7tRySdaMspQwPSykj1W4uwmkTMxXUUmAhHSTppHvvDC9DUxJBjabIFpowbQy5XRGqNCUvEnBrifjXalEY1iQ41rpI88/TTo5P7j6Ouro4PHXkkjzz6CJs2b2XmjPk4ZBnuW4ovDMqECJ2PoAw0QSGHNAbPEdFWiom2JatR1pKK+3iug0RHr2EwxTxBIYfvKOKeAyZESXAFeMYgpKRx9jTS48YgYy4VU5oo/eVFTEcHiQ8dhGYY7n+I+QvG0lhbF9FJRxEEi7KWQLqQcrjt4dc5aLcZUK1sEAjE2GpefX3rwrVbOpsQIGxUl+196Iwowv7vj2hbsVIICtG2MfjC4gPy7ZuqRPVYwvZ2qhcdKgqVFQzf/DPi1ROwVjNCCo88f40qamR1GsbU8dc31gGSmkwq0lzCgI3YupSRaUdYCsUcOtRIIjXe1JTh6SffYF1bK5MPPwDfdRg7sZL8wDBSaQQBGAdHxQlKBnAZCcs31NXy2pK/8c5by95Vy3zi5JNBCN5683US6STjWiYz2L2JYm4bMVWBCUt4wuIh8BAoYxBhiLLgGHCtxLGRpnSlU6ZmlMHRUOMZkNoQDmcjl1wplFAI5SGUhy0FuFaTbKhiODdMsWSIxRMU2ztxaiqoAVizliRQnXQo6ZEAJRFxXYAhoKq+mvv+/BoFXeD4Ew8Uxe3DJOMW2tp4+IV3TgawoY1KiQA7qhe99yH/Hub7V0dEvxRSCCOFsNKzDuA+8syZKSDwfDsQbBOxc8+Uass2hte9bZ3KJFbaURBxdBiL9qPllB8sgQHP1QhySKuitAtTQBJGoKIRYGx5dYY4AuJxw8Cg4J57/4ZIpJHJSg7aawroLBiJtIYpUyZQVzup/KVhWegtiUScgewwd/3h7ncVmD333IPjjj2WVxe/QqFQoGnsBCSWnvY3CbLtuCaGtIaY55TxrxBpNMpG2kVZE20xGHLDQ6ADpDXEXYdkJknJlEi4CoIiulTEFRbHWhxX4ddW4CYcBlZvILtqI1WJOEob3MoExTVbCDa24gEUsjiA9SPe9MiWNALSOhY838F2Brz9VjvnHDEXCrkIEshk+O3jz34WLEIphCNBqSiM8R8cEZHlPQ8JQmGNiF7xPbIDeQbvvedAka5CFAOrSBDOmY5+4CGSVJCTJvKoRjRl+UZQAvIhlEKa65OQcOgbHMCxPkbnqK+tpDKZxIZFpInASIUqY4sGRRQ0bGz2ufOuVxkYygKw+6KZVFWl0YWo+m4i4ZOMNeJ5cUKTx1EOjuMQhprKVIqHH36IbDb7rkLzqVNPZXtHB2vXriWdTlORqkKRJeb1oLQmLBYIijkUGleAwiAJcWREIZBWI220VamyDUdYoiKdJJVJgQ5QEmIxF99TCGlRYYDqHyIGJF0Pz5VIBa60CKXxHYnIFigBxBJkgbCoRhH8kRHVAnYIbIgzrppf/XkZvhsjPqNOZIshqirN0iXrp63auK0ZJaKd4H2Mndjb73LYMgavpMVYEQL5t9/Zy3RsHm8rGvH724W3954MFLK29+6H8WvHCYxF/yNz2kq0r9D9g7B2K3vvMiWSWONircQRHr09/aQr07Q01FMKililIg/ASgQOVoM2UFUZZ/PWrdx9b2SPjG9pYPasCQz0Z7GmxPKly5GhT6XfgA4DhJJIqQBFXW0dS1cu44knnnzXSTnk0EPYZ/99efuttxBAprqGwAmJVQYIhnGNiGwXPJS25IIcWgf45WLRWItjLI7WOICrJMIasp29OFqAE1U2V8pBKgfXCjxAWR2F6mNeVOMuCFECHKVwYy5ObycuwC57MAD09+bxfQXW7nAajIOJgv9UpH3eXrKe9r4iH95nOvTkEJ6Cnn4eW7LmowDGRiVfRVT45t8e8t9uW7IMtBsjsNKEQPjgwycl0BSTSdNf6rXyk8eT6e0j6N1IX4UD2pTZbpHACQtWGhzh4YYh226/jwMycZon1JBtzxGXIY4Q6DCku7uHwYEhfMdBEpZXq97hTSAQoaSxOsPdf3wBbQIkHoccMo+Bvi4ULjHXwVeWTKIZz01QKOYplkqjcRklJbfd9pv3XEkXXXghw0NDdHZ0UFNVhQg8Xlv6N7YPvoXjWFRRoHSJQJdYuNdCxk8YR2FoAGkNjrB4ClwpcCW40uA6AqVDdDGPqyQxJaFYjhS7AuEQRbVFZFDHBLgyKvocS6awuohe9RZOvA5O/AjPP7GCrsFOUtLFyp10+U4cGmUlhIb23iFOWDQbhnORvpZxHnr6jWMBlPLgfWiZ/8joRViBtVgljQfkXn72WPDwwrwdAuPNW2SLDz0n8kB241IGtqwhv3ENuU3rGd68gd5N67Ct7biAaqil7fePA0Wu+eqxMDBAIAwizOFISRCE5AsFpIwM5Qim1IiyQexKyGeHmDtrGhs39fP7OyNNccABc2iorUIXDIoiVuepiNfjORUgAmK+jzER4DZuTDMPP/wwixe/eyDvyKOO4sijjmLFqpU4StJQ3YDVCTr6t9GXXYvvhIggR0I5DLd3UBoaiiK5Ajwp8ByFIwRKjuDU4CqB58jIPpMGx1M4jkAIjeMIfN8tY0+RyeA4EteRkIjjdnZATzcVV14JUnDbz/5IvKIa67h0dBbZurGbbZu62L55O52bOune1E73pu3Ql+X+F9fRMKYGMgmsyUNVJW+s277HYBD4AsAEUXz0PzB6nX+mKv2LYYUV5dUZ9nZOEqu2TCJeQ1Box588VeQHc7QuXWprL/4yyd0X4YU6qv2mPPxQU+zvpvfxl+l55G7SlWMoDnSy+bqfcupXvsjNB83ilRdXMW/3sTjWZ0vrdnw/2oqULqs4ykE8AcV8lnHj6vB8jRNq/nj3y5zxqSOZPGUC++w3j+cefZWWCRmkY4k5SapizWSz7VFmpo2ioa4bMdZ/8qMfsWjRne962+dedCFPP/MMw9ks8XSS1GCCfJhjS996GtxaKlSGMMyxccV6MvEYiVgcpSP7xQYGJQSOFSgkrogCc9IYXE/iCYewmMcxhrjjRriZtEilEIAy5YXSXIczkIeVywjHTCJ58Tnct2QZbyxtI1FVz7pl73DEsXtx2J5zqa2pIBYrUQgsIZaY57F8/VZuuvt52npmsf/+s/jrC+9AOsbgxu2Z515fcfxxi+b/QYvIl/xPYAJH7Gwx/asRAUBYEaFOvY8/PSfev4XhllmErStF5qRjyI+rFS1/uJXxE6eKLBESGxX/t2R7e2gYU0vj+efQde/H2Pa9HyNff4n1l/+c8eefxs1Xn8TCvb7JYE6TYBhXKKQtJ7NZEeUoGRu9BuTyBcbU1+NqQyqZ4O031/Lwg09z7IcP49Aj5vDkn55DmIbIsFSWulQ93flq8sU8nutHPBVrGVvfwP0P3M/mLVsY39LyL299//3245hjjuGJxx5j7ty5pNNJCr1FBnWerUOb2KVuF5JOkuq6Woa6OyNvSZS3JCuiYBzgmIjQ4QqBsIaY5yJKAVU1tcTjLsNbWkk6CqnBUQLHajwMYVAiUVtHsnc9Hflhmu75I0XgG9+5B7KK2XMr+MoV5/GxIxcBguHsEMr1iHs+QKGUHc6dctiu3rF7TU5s7+qSc6eN5a8Pv4pbVUkwNMxLryyddNyi+Th45p/YoO8y/i2WZHWU62MBbS25l17efxBwcClpy1CmiunzZlHZOJY/77GffTY9gScmzufF8bvyZKyCtTfeDECus5uxHzuGBYsfhdn7EORX8c7532K3ugpO+dx+bFq8geGBPDHXRZTjMEqIyFVlJPoLiViMzu0dDPQNEktYMplKbr7hz4Dm8KP3YWxLhlIhjysEpWKetFtJdawZbS22TKe0WJKpFIVikRtvuOE9J+hLF19MIhm9tyKTISZ9YlKxIbuZ1v5tpJSPDkq4UuB7ClcJlLQgNbFSAMLgxtxISKzG8yRhMY8oBXihgVKAoySekLhK4ACyzORzYi7mnZV0v/ICiSOOI3HM4dxwx7Os/ssK5s6t4aV7L+BjR+5Fd9cgADfe9ohJTPgss468igVHXeXW7vON1IKPXKJ2mzYxf/yhB+HqEIxGCA1enK2d2UYgqpds/7NUt3/PiDBggyg1NScEbuvW+hhgXWGKYOMTpgGw+MhPidKSF0UqkcINNMUta4gt2I2F3/sWg2s28dqY+fy5ej7acZn26C/xvRq23vZ7cm+8xg++fAJyTIyhgtkptcQgCBBohDBIEfFi455HX+8AHT1dxGJxGusrWbtyI7+46T5cL85xJx7EwEAfdfVV2LCEYwRj4k34XoJA76CjhlrTVFfPz396Cxs2bHjX258zby4fOfF41qxbRzyeoLq+BmkUQkreHlhFW/92gt5BlIBkPE5VJoPUhkQqDkkfM5QjIV2kcpAClCOIOS6u75Ab6qfQ3U3Cc5CORQqN63q4sSRefR3xpkb8zduIhUWafv59VhUDrvnOHdBYxYO/Og/X8Wje/TxaFl3E2nUbuey8kwZ3XzRtcOXK7bT3D6t0VaX31out8RMuvMkAfUctmgtxlxAJforlW7sPAMrBMitGpv69BebfGjogTGS0JcCNr1m9wAdk61YrwdSdebLdtHotw88/SLJxBjoRx4n5DBEw9rJLUQiWf+kbSJPD9G1g3QXfpm58C5VHHofHEK+fczENwNXfOIG+Ldtx0SgRRPGLcskGaWwUSS2DmAqBDQ3SSEygGd/cyC9veIyunh7OuuhEEnHJ1o3b8B0PKS2V8QpqYjWEeoc3YIFURQW5UpGrr776PdfMF77wBaoyVXT39FBdU00ylUIWoFcO8+bAanzXwRGSUr5IqVAkrjzCniHGffQgaqa2kN+4BQeN63kIAyI0CGPxXZe4648+IalktDiCAC/UqMEBSp0bqDj9XGiZzncu/T2DG7Mce+yeTBzXwGXfvZO2zUOUjOLL1zyAEDL57fMOklAiWeETcy3j503hkaeXJZatXi8P22+upa4B0x1YXJ+lazvmtg31TAEQf9+06d0FRoeafzxMqDG6nCmnBCom2dLXz6N/vF+1rtzQ1Itkc6FH5A49horajG2/6efCYLDpFFoIcsEwVbN3p+WEIyh2dJB/5nnc8TOpGjuZzrvuIg9UfvIEBBl6XnuV9rvv5ZIP783cuWPY2jGEsrIcfwGn7JaP3Iqw0VblSEFYzBH3HOrqqxjO9nP9N3+LH0ty/KcOZsuqVhzHRO68FTTHG4mrOAFhxJFBoLWmqb6e2377W1asWPGuk9Tc3Mx555/H5k2bwFpaWlpIV2VIhYLN2e0sGd5AUjkQhlAsgasICgX01m52ufhT5JOSUlcfriTCmNIp0hUVZTqExfd9PN8nSo0xOL7Ay+UJXn2HUKZJ/eJ6nlvXwT33LYbGGCcfOgOA3z60mOmTG5g+vplnF2+lo7vLPerQvdSMmRODwcESWEHMDcAodcPtz/pA4UPzx0G2U5CS0NPPE69tHsmf2UETeo9D/l06YfkwwqKNwYQGEYGseEYyZ/99CvOKxSemWs0uJmDe/XfJ7i3b6PjjkyZTN5WAkFBCqbMDb89dSAKt9z5CmB/C9wQyHqfU00/fc0sYd+wR6IYaMolqln35egC+990zyfYNQOhirQFhI/qiGLE/TLQCsVijiXmWutokmiITJjXyzL3P8drLb3DuJWdT15wh19tfRr0DGpw0zbFGQhMilUBJhQUqUhXoMOQbl172nlrm3PPPY69Fi9i2eQvJZJKGxnrcQOF7MV7pX8OmfAdp5eAKg1KW+poaNtz5CH4iyYfv/im2EGBzWXyhIpqIExnHEoPnKnzPKbvUAifmEGYHCQe3UXfj1Vg3wTWX/woTc6lrSnPMIQt4+c2V9PQUiSU8HFeRz+a4/7G3AeEumFIj+3qySGkpGUtVUz2PPP2as3nLRnnPdWfZ4dW/zoav/7g4vPRnzx+1y5TVpVIQLcf/wIqRSin+8ZAyWuFKCWxgKRYMjTVpWjI16bW/vWXe+p/cxMbv/1hUViRl14svi/z2pfjFkjXdfaieLsLCAFXz5gLQ9dbbCBw0ER/Gw6H193/AjTv4C+bhuTGCbWtY8Y1rOXL+eD5+3Fw2bGrFkxEoIIzEsTaKgppgFGMKCwGNtfVUVVQy0N1Hyo9RXZvmK6dF9Xcv+eH5tG3uw436OqCEZGK8ibRbQSkoImVU7DnUmvFjmnngwT/x0ssvv/tEScl3v/tdSqUSfb29pJJJKutrUIEBqXiiYxXddpiYtPgYXCmob6hmyVdupH7uTPa/41py2zqRQYjIh+hCCem5OK5LqZijlB/GdyW+KxHDOfLLlxGbNIPkhedz21+W8eSz71CXUiyYOpGKihR33vMc5Xgx1hqU5/LGO60Acv99xhfD3j66+vP0DhYwBrqWbXVeemOtX1GZDn99/2vBD+940fzu3r9mXBtKz3NhFJH6e+NXGBDajh7SltnjOx8AynMRjhQWjfIlQxhe2uOwZ1s/e97sjRddaNZ+7WICayn2DshcvEL01NcT1DfZfEMjzpi5jD/2SAJrGXp9KfHqKmQUMcdUJymsWYMGklNmUhgcJjN2HOuv/jn0budr3zoDYXKEhQjAizoHRXwR33MiFxuL5yqyg8MM9g8S92PoMKSqtpLSgOXSs7/DgUfvz4ID59G9vQOIathUOSnG+TWENiRUdjSb0Y9FdsTXL7nkPVfXnPnzOPGkj7Fh40aUdGgc24znOMTzmlaR5ZHWpRhrcY0gdC3pploKK1bx+ndvpmmvPZl6yblk123GKZaQUpDwfZQbkb/iwsEBhOfgdA7iFAep/sl19ALfu/yXjBlbT25YMG1yCoANmwapqHRHn1dVVYLXV2zGYsUxB++enzi7sdhU5ZbG1aeCifXxIDO+qbS9u5jDmuLF370989XP3hg/7zM/mb/bGdc/pm0AYIzBYowdST+O8s/+3qT5l2i1KOcOaR2AE7H3W3/0y3PsW8/tWj11DytRZtInz8EVQkw/99OckB0Uh619RXxo5cvisJWLOaJtKelJLXS99DKFlRsQ6WoiEba4ySRDm9sohJqm/feKKk4l0ihb4uXzLmVBbYrzPncs6zZsxZEaYwMQEU/GkQ7RthTiOZDL5ulo78J1VEQ78BXzF03n6Xuf595b7uGsS04lWyqgChpXCkJpmeDUkvEy5EcxJkkYhkxqGc8LL77IHbf97j2F5uJLvsqYcWPZ1tZGhR9n4qRJxCqS1IkY25wST/ZuwTcuUhtKYYnM1GbW/uL3tL36Nrt8/jO0XHYBurOTWHYYY0IgwFUKKV1MPI7NFimsfg1/n/1wjjqG6259jLWb+mmqSZMLQ/ZeNAtrimza3EMykSh7w5ZMhcfazT0sfmOlGFtfU73muavF8sevtMse/o558+Fvm753bjEXnXqYQkhOPnaPIWozVB80j01/XXP4DXc8cw6AwERoTrnUz78qKiNFmT0mrAFTBqGwwhqDMcYKR9mCIVb8+c++nXElRd8NS2gRTBwDYONKiUoBabBJIG40TilAAoWt7ZhiCesIwrIDL2M++c4eBtdtoWG/XaEiTRCWSE0eT9vdD5NfspgrLjmRpro4g7154q5fjsEIgnwx+reJPCdHKBwkUoMiKkBkdciUqVO5/bu/ZqCvnw+f81G627chjMBTkrRXwWS/ibgpe1wxH+FEbnJlMsWXv3wxXZ1d7yow1VXVXHXVVfT39TEw0M+YMWOYPnMGwVCOmB/jqZ71vBxspyaRGk3LzaRTrL7s+4ShYe6XzqLui58ht60dVSjg44KyhH7EKvTXriPAUvuHO1iVNfz8unuZNKWFQjEgUyHZa+FcNm7YRm/vAEnPi7YjpfD8GNYEDAwOAwhphRcifKzxrTG+DnXM9WM+4O0+vxkcg8KFsRP52QNvfMuYUAkpQcmIjvku97+joJCN2HElGWIpWYHAkTGEgKHHXz6yZ8UbjdlJLejcoFLEGfux4+1wqWAfmbMfTzXO5ok5e4lnpy/i4cpmXrjoKwCYviwSPVoRaoQgo4olShu3EDY2IKvS2FKAlJJ0rIZXzruCJPDNK86idVt3OUwuI1BOUE7Cj3ShKhOwpTW4jkMxW2Cwt59kQpGor+O2a39NTSbDjN3nMpzN4pRR3HFOhma/hkIY4ElFzPUJtWZMYyPtPd18+/Jvv6eWOfjggznjzDPYtGUL2WwWKSVjJrbgDpeQxvDb7uWsHOyhWvqE0pBorsF2trP6q9cTAtPO/wx1l5zL8MZWvEIOX0h8z0cO9FNsX0f1578A48bxg2/9jgKWeAIKgaIyHWdsXZLNbd1Ra2Ns1L9BGwqFAq7jkk7GAfjCFb+nerfzmHPMt5h59LcZf9il7HrCZQz09XmfOeGwWO2kcXpouEDtmDjrlm1uevSV1QujWdVihO81uh2NZuQIZITyRY9AWZBaCil8hBSE5TS3zX/8zcI8UFq92bZvWCY0JTFm/lyx/aHHZHH5i5jiEIXOdoY7O8gNd9DQXAdA78q1UY2HcpR2ByVLEKxdh0Uh02lUMYiwj/H1tL/2Clvuup8zjlnI7gunsXVjH66yWAIQIaOFhsr2TcQxDMAa3HIFyUKxSGUiQbFniJcefJZkLElMgtEhwrUkDUx1GvG8GIWwhOs4eK5LMQhorG/glltv4Z1l77yn0Hz10q8xdcZ0Nm7ejBWSqVOmks5UEgNMNuQH619hU2mIZptECYVfW0XHPfex+baIvDX5gnNo+Pr55DdvJggKxLRFr3ibQryWyht/wPPrWvn9PU8wvWUcMrAUjSHhx3CA9u48oSkXcB4h2QtLoRiSL0a6obK2mqHNA7R3DdHeNcRALuTNp5fy2MtLift+Np/L5wsr2+je1g1r27jnmeVHMyoF0VlLJoqKowQoWSZQlQXGBgozLDCOtFlg09atk/p6uueV4HNq/tzT458+g+SXL2PseRfYpu9eLUog+h78Cz6gx9SRSGZwKitxSJOaPguA3Lo1yFgcgUC4DmFPP3ogi0r4DK5ZB4BXW4spRTEDDNTWNfDWRVcDlmt+8BlyQwNoHeKYiJ0vjCWmXOJODEKDY6PtSFkNOiDheyRjLibIU11VQa63nw2r1uHFE0gLrlAI1yEjPOaJDEUMJRlBDlhLIpEAAWecccZ7RrBcx+WKK66kVCxSKpVQShFLxHAclyrl0UWBGzYsYU1YpJYESc+hckotndfewNZnX0ACzeedRcU130Z1FwhWvgP9nTTedA0ayXe++msymRTKEVgUuligvsYDJGvWbsdNuvRn8/T053EdiYeDlfCnp94AYM7kRlRNmkwqQSYdo7rCh5oqlryzBSB22Rn7umd94RjOP+twzvjaCew7u+kogN7+oaatbe1zIcR3bDl9Zcd9j0IDQsGQBzng9bPOvfyVSZPXb/3KZW9buGXBRRc1H/yr37DHdVeKPW7+idj10q/igDU1aQrSxcmXO9pjkNLFaYw0TKm1AycZQzsS3dmDnDoWd8I4PEIGNm6L4iBTWwhyeSAiXTm1GXTXVt74yndZOL2Z407YjdYNXTgSpHVRSLQpEuoSSkrK8CTCGqwJ8F1J3PVGCwjFXZeE5+A4IKTEBgbXdfERTKaCcTJFQQegJOlUCqxl0vgJvP7G61z57e+8p5bZbeFuXPL1r7N50yZ0GDJ58hRaJkyglM8zxkuxvDTM97YsYbsokFE+IlNNRXWagfMvo2vlMhRQd8rHSFz/TQY3rCSsaSL+6bP45UOvsfjFpYxvqkNbi8CQzxaZPKkJgJWrNxFaw8Sx9cyYUEv/QNTHQQmHR5+L+MotDSlcF4Iy49diwE+ydl0boGNfP/uj/i++9Qluuvgj/Oaa0znnI/vOBV695JdPrJ8w+fNLP/aNu34FQbT5sIMCKocH8gwP5BkeGiYdg+Fn/jrJ/dWt354WBvgVKXxg81vL7Ou/u531dz7A8t/+VmxZ/LrQIIqr20gbKLiGvCsROsDzYqRrGgkAkc0ilUOYz1Ewijl3/Yzac05mMNdB0N6NBDKTWgiDIlZohI2sp+TEiay6/haKW7byze+dh3ACskOFyMUWkeekTTCKXkQxJ4HrKnLDQwwPDBFzYihZxm/Q2LBABIxFJGwVU7jCZa6sJmUVw2GJZGUlqUSCoFSiqa6e73zn2yxb+u6EcYDTTj+NQw8+mFUrViClZHxLC2PGNZPLZhmfqOTt/h6+t/Z1+pWgnhh+TT1+3KHvs5fSs60NBaSOOIiKO35Hy5/upCcoceM3bmL8+LFlXlMkMMXAMHHcGADauwr0d3Tz6Y/vwy9+9Bl6evsxjsfhe02gsiJGoA21mThKGUJ2KAjpCnJhHhC88fYKfnbXn7n9kRf52R8e5+3VGzxg9+oKN2bcGPf9/KVPP7tsyyyBoBCWyBvQIUgdGsKSQcV9kQPavvLVTypgIwTVnz4rGNbF8I0F8+3W00+1q0/5hHnljDPs9nv/ZH2wxTUrbSgkrvXQQmBLAaQqcMaMIZ8bJijkEFLB0DDOjEnUTJhA9ezZGJEiGOwiBGINzUTtJsqTYy0iHsOXPku+cBljU3E+86Vj6WrtIOYIJAGOVSgjyuTwAGUi20YZgULhSrBhAR0WI/zJCAhMlD8kNdIE+Egcx6HeesyRGZSQ5IICynFwHYdUqgILnHXWZ95TYACuuvpqGhsbWbVyJVjL9OnTqa6tJT+cpSmZ5qm+bq5e+zZaQcZ1cMY2IYeHGLjwyxT6e1FA7JOnUtj3AL5z6a/oGtBUV1Yy0u/cIAltyLjGDACDwwGxeIJZ0xqYMK6OseMq6erKMnlyDQ3VtXR29jOmIUNtZToqtyYib0MKQ64QWYAPPfsGnzvlx5x68R/43JfuZMGp3ycIsnzqiDkQU9DVziU/eORyACFsVPcXkJWZJJnqJH7MsTo0Qp78idOGv/Z16q66yVbPnyl6HnpYprBibOMEMhMniEagZf+9hQYKpSGBn8ItRaQhEVhUOoWoihPmChT8BFoYwnyeRH0lABWTJ1HRPAHd009oNdRUE1Glo6UgALQmPq2FrQ88Rs8bS/jihacweVI9PV15XFsujV5GNYTZUW1T2Kj72Q4vCqyxKOXgKAeMLkMFFhkaHN/HsZIZOkWzTFLCUlmRxknECEolpoyfyKtLlnDd97//ngKTzlRy7XXXUQgDOrq6UEoxf948KtJpgqF+mirS3N+1ncs3LMF1PGpkAm/6eFJd29l28LGEry+B4WE+e8Z3eOCBt5g8ZWI5p0qMppAIoC6TADR9Q1kmjG1g4tgGAHadO4F8Nsvv7lvC6yu2YkxIKllJTVUFQVAqY1QWx/PoHYwoHnvsOgcmjSfdVEtq3nRse4E//uV1O3fCZK669mS+ef1pnPahedu0KeEoRVyB4+zkVgcDAUklkwu//IVJB19zNftddr6Jge5fug4BInRjhIHBk0mRnjCRPIhSoYhyUxQdizIaW9K4mTRxIbHtvTAwBL4iyGepX7gLAnAzFaQb6hGDAaqQx6lOg/IRppw9NCLJQpJKVfHcpy/FBT79zdPZtmUdQkVl4KUgSkux0XsjzkzZ5bbRFiXK6SVRsI+olV4ZwLQCfA0x38MNDfsEGRKhYHt+kKpEBV4iRqhDxtTV89VLLmHJkiXvKTTzF+zCFVd/l/bODnp7e6mtrWXfffclWZmBXI7mVIzfb27li6veJpFwaHF8Qs/DefNl8vfcSyaVorvPIHyJQ4gW4Y66fBZ8JyojUiwGDAyGNDSkqKxKRAIzexK2GJKpyFDQRXoGCoBCKEHJFEcLRrqOom94ACgyqbkOfEmIxqEIjs+Sld0C4LJPH8YVF3+UCz5xyLeUFIAQLgZtDHK4mCc7nAUpyIUk19xys33rSxew+vobAwCnd8h6CGvRCB2gpQd1NQT9/ajhAm7MRXgOtneA/uxmAhk9tFJPP/7gUFkbJFCNzQD4ShJYzZDeguzNIdJxQp1HDGbR2Swmm8NkCzA4iFtVSfHtV1j7w5/x0SP2ZK99Z9De2oESBmmDKFVVGpQtldM8DNIECBPiCY1DiCM0hCXQJVxZ7gNrozwidAmlLLLCoyq0HFBKI5CEWKpSaXAdkokEruNw0idOYvg9UlMAjv7QkZx33nls3bKFrs5OPN9j7332QUiFLRRpSldxW9smPrN+CRRC6pa+Q9yrJvP1r3HHq+/w5qurqYqnGMwVyOYCsrkS2VyJoWxArhgQTzlkh4r0rd1CIQhRKiqm1Fidxjo2aspeEgz0FqK5jsUxOqK/WQu+Y8lli/R2D1FVlcBJ2ggP0EShlYh0xBW3P8t5l/6OHz/44hlRoo+ygRYiFwikdiSFmMRPu3T86cEPbzjvAse54WZbuvk3sqdQFAOLXxSeU43VAmGkEFpifZfi1m1QGMI6DkFXj3UO25eG8y/Bb2zEAkP93RRsEG0cjgs1tQxpSyFbIn7wfvgzdid0yjGgRAU2niCMx9HxGDrhUUr5DFbE8cZM4oVrbob+Pr583RfJd/citCnzY5yoIZaVgMGYAM9zSKaShDpSI0ooHOVEBTF01NJGlcUCoVFhQKUXIx+XTCi57Bsm6RUaozyqKisxoWZcwxi2bd7Kt7/5zXcVlhEX/HPnnsshhx3GqtWrGeobxBGSXRfuikHghlma/Ti/27iFs5a+QLanjcwN36Y3U82vv/krKqqSJCsFsbggERckYpJETJKKSSoTAUJGGQ8L9p3MAXtOYLiQw5iA6qoYyoscAB1qeoaGIoFxQGug3O3FVw7ZXI71bd1UxBxi5RRksKAMuXIp3B/fuYRbrn2Cz5/765v+9Mo70wHcQNhYKHD8WJxKIA+sffKxccno4zY85jAvm81SXLGWTDxBzsqog3fCFdKXBH39WAICJZD5QFSk6qk55Aja3vpbNHnZLLqcjGZiAlWRxAWCpMce132LPa77VjTDDbUc3PkOQinwXMJQo7wovUIgUQKGevsgU8X8TBWHnXgoLzz4IjOmj8GEAZGZG+UDWQye5yKIktZS8VhUktVECfnocvaBiNxwCQghsIUSGRVjyBlm96xDr4jzVqzImFgcm8nQ193DxJYWbrjhBhbutpBPnPLJfxKYnUPpV3/vWi48/wJWvPU2k6ZMoa6ujoW77cbixa/QUJ+hxqviV8veIjZjHjeddyEx4N47rqC6toKIvl3OxxotiC8JdYCjoijuGy/cWP6mEG0ssbhH3HOjOG0YMFDI7RCYqHoQ2GiZ2FJIV/8gMbcFYVW0RUeVsxkYjqJ+Cyc28MScFkthULz2+tqff2TPeQcQAw9weh959LDO++87ueGaay+qaaxbkQfaIZy4624ylamUaCu0U84tMjZKwvJcRDYX3ZSSeGPH0vPgA2y57QZSx3w02pKKJayMSm5Yz8GtSBJTgk2/v5Oe+54gPXE8uVwBx0i8GePRviIYGMZ6DnYohyNdtACBRYsYW5at4qAvn8kXr/0cbz63hNxwQDwhcLTBdQXSKKwxZAeGqUglqckkCYdzSOUgMDhCoxyB1CCDACXUKBUUEeILhaM8hnSOA3KKrAPbXE1tOk3Jaob6B0jE4px62mks2H0h06dNe1dt4/s+N/z4R5x15qfZtHkTEydOpKGhgXnz5jIwMIAuFMHAgb+/hY7BEtd87YeMGzsO1xFRH0gR4XolEeVURu2qJd29Q+RLmngqxvatXXzoQ/P5xPGHkInH8VUCrTUIQakQUVE9z40anpcT3YwwYFxyuTAqv6okYdSrCJwEhXy0lcXi0mJLEFhbmczs39k78MSF37hh6/EnHv6Qk//Rj6/Y9NSTixLf+k6yobGxZTOYEohYTVpUKoXTWI3Zuk2QjGOlxClFAmuMZqTvjwlCZEMGv1BFzEb7qs7mUMZEQhaLITJJADpfepOOhx6ne/I4rPVQRdCLK9CepDSUQ/oeZrgAjiJUkQFrhWJoYzsvjK3i+Buv5MTPHMVt3/0Dc+dPAzFcztCQOEqhTUDMkaAjtt1IVzgwkcZyyg3IAx2x2wTRhIWauFIUPIUsFDk0G+e+dIEex6EuU40jJb7nsXbTRo477jiWL38n8rz+xbBYkokEP77pJ3zm059m4+bNTBw/gYkTJ9LW3s4jf36UY448ihMX7s1vf/kIf37kVcaN24IRikCWw/HWYMpaAQElKcBGRPIAweYt7aTqYnzi+ENIp11cR6O1gxCQyw0DIIUT0UrKpQyFiDDDfBil7phyG6ERzGg4H3lQlTEDoQHX2HgqJQb7Bw+/55aXaNUVeSc7lM9OAKqSFR/vHxrGQDEOXufrrzD2uKNJTp9EfuNKhKhHy+jkUltCFUl/OQsFWdJ4JQcpootzrcCxBmM0XrICFYsaY+1963Vw63X8PS/wPxul8s9PnPdxnrj9UQY7e6iqTyB0GLmNSuJ6DkODAyjAd6M9ukzaKJdMNziejFrblIpgDEI6ICzChFQ7Pj2upj4X8lFi3FUd0OtK6qtq6JWKCePGsWb1as447XRuv+OOf3mdI1hvXV0dP7jhBi44/3y2bNnCuJYW0pWVzJg+gyu+ewUAp591FKefdcz7mIW/H9YalK/w44JcAcCiTVQwUQgXZaK6yNHCAdCENrIdhYyAS4kFT7G5ow+AA3abLn53z1sWYcRwIWfr6zIWt0ZOam7a6sihoZIEiujWeMmOiYOTA4odXcICyk2gKcc0rEArUXZ7d0yMGPlLROipBfKFfLSujcVxFL6I6sMGCPIdXfg7wrSjU2yJUltGSshHvTfKJeYdgQoNHcNDNEwaz9nf+SzXn3EltdXTEULiCBVpDQG+dKNAXrnKk0KUex9FyLbUIKXC8+OYUgET6igFF3DDkEbHo9cNGZfVfBzBvTWWPhFQV1ON63mEpZA77ryTXebP58tf/ep7PtCpU6bwi5//ggvPPZfW1laGc1m+cemlLFiwG62t7REwGXPL+V/lh1sOCYy0RBaUu7rZqNKU0QodGhob00QBOYdkKk2+WIjqEJeTDoWMFulI4K78Io6rRqYday0mFFDhs3ZbO7qQZ4+5U8CRUJRgAhuUQosWNNZlko51RsrdC6OtHSleaOLJlAgBmysKF1cYAcKESNcFV6EcL1KXVpSTvyUaiYiKU2GKGoEanQSVSiAQ/O20z5G/5y+4TQ3l6o8OxqqoEpKMziGVItQhpryNFGUUe8FA25ZWDv/5lRx+xsd47HeP0Ll4A2OmjMHaECHNaAc3Zculk0f75FgcCcKIKP028vdxYx6UQigVIh6xhRiCWj9OBwNMykkOF4oHqy1uaJhQX4/ruvT29fKVSy5h0Z6L2PeA/d9TaFrGt3DzrbfyiY+fiO+5nHLaqby1ZAUnf/QLTJk6CyMccvkSQqpym55IQEIblahFgC3j9EL69GdLdPW0c8Kxi/jFjedSURHHGjtax2e0Tj4BtlxdXAiDtoB0SZZ7FQmiRvQ1mTgDg0XsQJfVYZ6Szgm0FRAjIpQUBJkk9/156SEyb33XAg6oYc9QAuGDIIzCPTLmYMqXoqzBWtAShBPVwaXcK1mWQ7UjLYLD4TySqC6aCUO0E2ke8fLbuLaALRWQpTyU8igdRMnmpSw2yBEU84RBHhPkCXQRUSoQhnnytkRNKslzX7sOHRS48Edfo7/QjylGwqKkRUpb9oBGOkGaMuZkR7ctz3EQZsRLsvgJl3jcw2IJhUQbQwWCBi9FvzLsEQiOHYI+AjZns8yaOZPDjzwSARxz9NFs2rTpPQUGYGzLOK6/8QdceVW0FV116c/wqaNYCMllhymFJQpBQKkUEJZKFEolgmJIUNQUiyHFUkA+MHR09TNzZhXjpo3lmRcjxN9RomywShBylJ2L1aMCE7m4CqTCVwASXyrQAUKG2P4Ce+8zEy9VxTNvrLAUQ4tRVqKE8lxBpsjG7T1NDqmKqlagZmiwiWQiqvwEBDq0CqyK+0Q1Gi26rCqFMVgvygEWZmQbsshyVWkN2CAfFQZSDqV8kXxnH5UVGdwpE+hav4R4t4dRBm0VQniEImrLAgptJaE0kQaSDtqOdFtzUAoGOtbx2HmXc8wvvsfR553I8z/7E1NmTkZiwAS4qKjenLEoFA5Rmq0q35sqNyJ1bKTujbZ4roefVJTyBUwYUlKGlBJI16foCQ4ZLKGt5MFMyMb2dvaYPx/fcbj7j/ex//77s3rNauKxeHnb+NeW2aJF+0bCcslPeOKpV5g5eTadnUNogsijZMdWEQowRkZNUUXUlS3SRAFbtnaxcl07B+4T0Ui6unooFAo4qnInXLl8qtEeSWXN41gcP9rsdTGkua4CKULoHWTGhAUCBK8tbY/Y3zpLIu5SyoewYR2zT5j5hpO86KzvrxTZ030v3jMcmIMNNCmwIpuPviLuAlo4OISihDSgtEAoD1NVSXFyM87GDqSEwJXEy4w4rCBEYRyByeYI+6NgUt1Jx1EaLuJOHovQGiUd8OPl/Tq6sahf9YiNIzGyDM+j0KbEFEfR0ztMrpjlM1d9kVd//xj5gSFSlYlRrREJcNQGcCSRX4jIu4vIVoIIvdYIBNpalAOxZBxtNapUQgpLGkHPYJYuKTh0QGGV5SHbjb9iNUcftD81dbX89NZbOeLQw/nriy+8q7CMjOHhYXqHCpx/7ilUZuIUggAt7GjUJSoYINHSYmykJwUglCVbiHL2B0oB1ekMnz5xbwD6B7KEYYgXs2ghcWJRvEZbO/I0KAcoAEsq5kdzrSSFvCRW4UJMsbmjH4DQiMiG0YYwLOL7zvJ9Dt5jw2mnHnibM/4TJ93d9ImT7q4EXt/e8W0FlwugkOvXIeB7cTyEVUYhEEIJgSsUJhEjKIVUbu/GKLmDs1uMyo2pdBKBolDhkt/SRmlLB6UFmolnnMz0M08encCd+52OMPLKkYF/6UGJnT6nbYgv4OjzP8lDV/2U1C4zcIQYbfylpESake0pcimFsCgJI81+o602MuqNNeAoUg3VyJ5BCoODxKsSNFUmaO/oZoAiR/QqlJHcJ7dSu2w5H//wsWQy1Vx97dWcccqnuO2O299TYFKpOD/86Vfe8z3/+QixJmAoF1AohcSTAqsDYrHIRikGZQ+wDF+WnWjibiz6rFJ09BfxQwuuoLYyBkCuVARHQcnQP9Sfz1TW7v7i0z/KQ4BDfphMPIUA6ieOL3QAHojBsNeEIJ1ERbkJF0K6DmawgC4UEQk/qgA5lMfG4xhpiVmBW4hcusoJzXSgsa1d1Bx5GOn9d2ewL4ufcmn7w5/pfulFZt5wNaX2Vt447QLSlVUUYx4ahbQGTdkANpqSlIQqet1g0dIBXDo2bOLQ677Ox75+Bq/d+SgD27poGFdXbi4alUOVVkcYk9VRgn+5/pyybhkiKBctxOILhdQCHWpUPBZVzgTckqbBi9GvS2TDIsd0W0pYHl37DlUv1fC500+nqqqSr1xyCU3jW9419fb119/hO9+4hca6RoyrCMuRbGsdyr4QBhU1nsCgVTk1x4S09Q7wmxvOYnxTI5d86272XDieY4/ehaSXoFgKyAYhGeEQdwUtDVWROAUgpf/3zEEho1yoUolCaHBiPo6joBhSkfAAyOZNBNk4hubmpsjpbd2ObUzhxFwfWy73mRzT9BcB1wRAw4CwLhBm0lZgkMIKt1Ci0NxI1hEkXZ+El2DIEySwxAIIlMTqKFqSmDCBIOaQCi1ONkvQ3UXDxEkYT7HuBz9h4zvPM+HSr6IGs+T+9hQy1kzguoTlqnBaaLS0WKuImopHnVVLQCAlRgmCrh6eO++bTFz9DKfceAnXH/VpasdU4zsOoMu833J/IBGh2pHTVN4ARFSCS5lyZSXKEe1iCSMhnoxjczmK+Rwxa2l0PdopMUDAyR0SP8hy76tPU1Gd5jvnfZ50upJzzv0cUyZP5tOf+WcezY+vvYslL7TSNC6HlgItVBnQGGEoi7ItEzkpoYyaawTa0tPWy+CQYKAvz4++dzu7HTafT5y4DwKPgYEAEyjCMKCyMsn0CRHjMQgMjtTlolSS0ICXiFNXGWMgV6IQFvH9FK7VYCWVqZgFGCpqQAgSkklNyesBclaSLCIda0AbjfQkqenTX/f9WLdTLNSqgbxSgKmtxWCFIyyB0dhUAlEqISszOPEkTiHEVPj4oSBwFMV8VJbVra4mTMTwqqvo+utj1P5+H8Zc9VVKJsRNJakVY/Grqyhs34brjMGMa8YlAkyNcFHlWIzGK/dvtIQofAQOAi0NfnMd3W+t4Y2f/I5dLzyN3Y85gI3PvE5i5mSUiuIwiqiplLARYVoKVd6SyrCAtWCjmgSUWxpH2QhgtUbGXfxEBnJFvGyeZj9Gmw3odEt8rM/D13n+8NgjZNI1fPFz5+D7Pmd8+kwyVVUcf/zxo8Jy928f4fW/rWbXXacRish70Vi0jGIh0SJxytRmgS67xkYKAi0p6YBCsUh1Kk7NpMmkKmowRLSO1q48JrRYE+DFfVLJaEvKFUtIJ7L9QFIKNamYYkx9glVb+6MiknEZAbFoqlI+gO3PF6BUFO64xu4ZLU2XQ0isOq0cP66lchTSiQhM8akTcZMNa2JAX+d2WQQZnzJVCDwhsMiaDO6bL1N8+U2cdAVUpRBBUI5pCFzHIRzIEwDxihTKiRGWAlKyklxbWyT1g/2wrRtZmaBY4REM5hBhiFcmQu1cpsSO/j0SwDKjDxYBMnRoaJ7Ic5ffSJjLceKPLqOQGyLM5XFQuKgy8Vviokb7YCsrUUbgIiNSuACkjMrAE9XZHYH/rLEoK3BTCXRFHLdkaJE+HoqehObkgRLnbi9y6x/v4Mbf/IbTzzyDq6+6ihNOOIGnn3m2fCeGe+96klJR4Hjy7+6pvE/wryy2kUanUljCUkB/PocTNyTSLp1dBQaHosW5bN1GHM8FY3GUwo/FgYChQh7puOXGoBAEltqUBypOW0c/5KNikUYIIGTCmDoBiI7eASgZxlbHss3VEfHN82T0mGVUe5VAGypCS3zerA0DQNjWJQZ7emTN7ruIOBXlnsfShkD/ts0kgUQmgcwHeKEgVAblKGxukPxwFlWbIeZ52ACoytD29htooLitm862LcQzaRJSQt9AeXLEaF/N/2RYAGOxNSnM4ABPXnw1Y8Y2ss/Zn6R9zcao6KOUoENc38WPR6weJQSiXLIRoRBCIMs8GdDs3LlTYXFFtF3ZUKOSMWRtJZ70GCMcVClgfazEke29fGFlJz/7/c/53q9+xdcvvYwvXPR5Dj3kYN5e+hYg+cZV51BdH6OjvR2l7GhfSlFO6hgtzzwiS0KPRmijIJ5guL8EMkZVRZrN27fTsb0TgDeXr6eyohKNwpcOqZhiMJcjm8sRUxYlPUphQL6ji8a6DCBYtbENdFQ21oQK4jH2ntdCX2+PyG3vFhQ1CyZm1oGLLSmBcaWRSKl1lE+trBFuIkH885+5WQKJsF8MPfoQbl2NDZtrrB0eNtJEMY3s2qizvF9ZhdUhypTVuOdiBvoJW9uQFRXYmBc91EwatXwj/T3ddKxfQ2j6UOkMCSDYuo2RQljvZ4xgWKEJaZg6gRW33sXWpSs54SdfpyqdJmjrRDsG5TroUokwCFAKhNQIYXGkQAkQNqJtKkGU6IYt0zzFjo61ZVafDDQkfGRDDRWpBM0yRlXJoy0hObCY5bsr2nnktl/z1R/fxMVf+CqfOe1k9lm4iOUrVrDLbrO57sfn09eTY3jQIEQpCmyO3s3oMigP83fLQ0qX7e0DgKKywiXX28/KtdsZyPewaV2WipTEyDDqOKJctncMMjCQxXM9hnMlpjdXcvihs5k5NbJvlq7fClKghGW4EFUenzimgftfXA1rewWDbZx1zMJvAARaSwShKheDL2tEA9oy4UMfXTxwyKG3DgKFN95BgQgzCUuhJKzjidKEmQSbt1EArJskFBojBV4oMEqiskXCju4IH40nsKFGOA6qMsnbn/oSW3/8a6rSzcix4ygAg5s2IF1ndHG93yGswMY8vFScF774PWIC9rv6fNo3biBeKOE5EWIrtIlgi3JWnSr7I1FNuqhejLICB4myO+FjMuIJOzZyv52SiWJLDRkymTTNrk/CQJcSLChqvr56G2vuuo3rfvUTTj/nIvbf70AW7rYLmzZtYL9D9uRrl3+cjZs2YE2M9+5WtGMFSSy+47J+S5TCW9vgU1VTxS/ueI3TLvwFyYSL6wqMDZFOFLcf7BukVDQI4eA5gv6cZsPGNhZMHwvA1u4iKIW1lqBYYmJDehDET1ev2dqLybPfyYseOnL/XReDwUihg6jOpXWEEAghMIHAWE0i5jDj8YfPlctX3Z6orTs2gEtk01jJ8rdwg7GoigSF1sge8SZMIigOIqXGmnJnewP57h7qgFR9AwObNhDXaURdHfm/LcE6EmsllWNrKQF9G7eg4h5WyIijK9+P2JRtm1AQnzyW1mf+ytonnuegT5/IGz/5HYNrtlI5Zwq+kihtsOX2Mo62EXoqI60vibAqKyyUG2hpKSgXKY5AS1M2mK1BBhF1wlQm8TyHxh7D4BBs8mF2YZCvrevkO2oxtwwOc+r5pzE43M2us+azdttGzvzcibzx5nr+dN9rzFkwMWLEjUaf3u0uFcmYx9pNWwCY3jKWv3lbWblmG4VCwJhxlQShppCH6gmRzdHZVyTQAZIA5bq09gzT09bHrEkTABgaChExD+1ZKAaMq6t6Gez5l5z5oWvPPmGf3aZObH4UBNaGUdmX8hawI5ENYW1Es6fRiVE/f5eXUs3NX3Ng98QRR23IT5iECizx1ZsQnV3EgPpPnYDnJAhNVEhIIdFoStvbEUB8agthNhsRsQsGtyGDU1tJaWiY6iktJIFwew/Cd0dR2vc3djC6PS3xx1Tz9AVXAXDizVfQ09+HzmajFjXClAFJUWbziXLzrgjuGKnciTWERo9uT2LE4ZUWhMHKSMDc0FKyBp2Ok2iso6EuTXPM0p0dYHOPYVZ+Iry6iYcffoKPnnI6EydPYtdddqGnt4uf/OwS5uxSz9rVbTiOUwZI33tZeDFFe2c/ADOmjiObLVBTFaO5sZqgFEW2c9kS08dHmQRbuobQYYgUmtBYpDSk69NMGFMDQNdgDuW66MCFnn4WzRmzBAQ1NZVbp04c+ycQQVT+RUX1gt2oavhOmY9RISGEFNYEEhMKHRqA1+JTpn09v7WL/FAPKhMn39vDYOt2GvdYgGqZgMmVcEx00UooBldENk5q+gSEsWAjso5FgDEYoaiYOTWiP/T1I6KCNu9/lBemxoIxVDbW0bluM89/95eM33sXpn74YAaWr8PqItKJuo1YK/AqKyJ3W4NjowoQjlA4GuLxBImaDEKbqC4dOiKSC42Q5b5RgFUCTyicQEPcJ5mpZUxfD7WzZtN+7pkMrt3GmI4Yzsoif3v+ZY782HH4sRizZs5haLiPx56+mXETMqxdswnlqH+zVgx4guFc5M00jq3EaIjHk8TiPsZojFDogmbOhEYAlq/fCtKNhFEIghDSMcXYxmrWbdlgV63diufFqUkqkhMqmDehZjFAoEs7sARRZrNGQXEApCizu5DRqxYTcQKEsEpEOEbDPgufKE2ZFuqvfRb3gANsYWCr7XrhbxGCjcEPQ7SIYhluIkH2naheXMWYZkymCjlpEjKIQABhoww8r6UF09+DGR5Eum5UquO/JjaMcGlsIKibNp5nr/spPYMDfPjGb2FKRYq9/VjpjAJxjiGK4kqDlRojNVaGaKlxlIMnXRwlEY7EhmBKZaPYSFzholwv2q6MRVqBazSl3j56Bvup/fpX+fzNV3LWjz7PoCkSru0muQ1Wv7aaI487jExViumTpzE02MezL9zE5Cl1rFu1DaUkZgRoFoBVo9wgUPiOYThXoHOoQEtDmlgsQV9hmGxuOKoaZhxCFVDXHG1J61ZsJZ5MIhDEbIAQBqskQimeXbxS0D+IRuMpuOi0Rev2mj/tuUgglDXGCGt3PJARO1eIUTGJ9qiIwASgrDUWjBbkDLK2cmDMeWf+NvjjQ+jVW0UFSgyseEcUAFFRQSmMyODKgpdIUmzdFsVi5s5EFEOCtm0otyy0pRBRVUlsygSGXnkd3TeAdP6LGmYngYEoQ9BPxIgFIU9dcBVV48aw65dOp2flRtx8gPIkjoDi8CBBWMJiopztMq7kuIpCdpih7m6EkthiiE0m8euqIYgqiUc1hKMObEJG7X9NsYRas4TUngcjPnESr7+6gj3PPJqb37mdOQfvRteydgqrBW2reznskIOpqa1n94V7kc3289TTP2LWrBrWrNiMM6IRgBFroRx/xpOS3v5hXnlrK1MnjqE641Is6lHOEEbixUrMnRF5QdvaBkgn/ShGZiX5kiaTiM65uTMAFSNR4bHyhSW4ofldQ211LsrhkiPJXP947HRV/2r6pcRKLI7BGqg/8aMX595e3Zld9hwCTd+v78QD0h87muLAIPGyUSliLmFPJ7lt26icNYPEuAnI9k6CkdLzuSypieNRiTjbn3oRz8r/tKbwfzCiYo61E8ax+vY/s3npag77/mUkx9ST3bIZYct5SjYkVVNNZSaDKQTl8u4CZSyeI4m7ktAGuEVD1cRmnLpKTCkkKp9vEWEBB42DQQqDbm2jH6i599d0lyxnH3IuJx1yHls7s1x67/e47A+Xk056rP9bls1vGw48aD8qKwXTJk5m48bVPPbEjeyz9zRWvr0pYveLEVEZeSI2ileLGM88/yaOn2RSSxX5oaC8TUL34CDzZ7Qwd9JEWnu62J4tkfQilmFJuhT6cnz04AWA5dY/vggDefoWv0PN1Kblnz/9qOughBlpLCXEaCm0fxzvXthZiKjxkidxgaqmpoFpLz97RHDEca8Hhx+zqjBzUr5UCqjdfU+gSFxHTqL1FKp/iPanXsAHqhYuID84HNEdpENhcID0+An4QHb5Okgldurx+F/flqKJjU5gPEmsKsmfLvoOAAdf/zW62lqxuTyedFDCjUqkmhAUmHKwRZbl1gCuBVnhEvb2EmxpJ5FJIx2LUCHWFAhNiOv6mFyW4ta1VJz3BcS48fz2kh+STFSxfX0vpx14ITf/8Hb2+fCB3PHG7znprKPZtiHHXx/pYP7cgxg3sZ7dd1nA+jUruffe73DMUbuyfMUmtHEjItiO5s1Yq6hOOKxdvx2AiWOa6B8cBmkxEjr7htl17hRA8PTzy+nt7sdXHhonesqlLHvNn/S0NqWrZ49PLN376FnrDzl61tOP//xLB1Sn/YI17WWKwHsv3ncXGMqzT8S7EUNZGvZY+NZujz+4cPcnHp554F/+vDDhOVeJprE3iMwYgmIWhEDgIIVH93MvApDcZRYiLBI6Fi0EQckw5mMRW624dDWxioqduDD/PcMYTU1zI93Pv8HbDz7D9E9+mPoZc8iu2oAxmng8RmE4x/DAEJ7rImVU99cpc09kmSNslSW/vRNVDBnJTxZBgKyuwctUEZbArF+LcHyqf/R9Xl/byuO3P07DxCbGtdRT3ZDh51ffzccOvYC/vbKUS649l3ufuYb5uy/kkUfbSVcewuw589l33915840XuO03F3PSiXuw4p0VhMYglGBHOxtLZTrJW2va0IR8+JgFFPJ5jHWwQmELeaY3ZQD4y19XREUIBGghyRcDKqpjtDRlTlDSv+z5266Y/9JtX5vy1O++dejCmeN7gpLGlOoi5tu/8dj+jcDsGBrIDw2jiDq4J2CFRHyzfs60LyX232tFvn0bnlBYq0hUpim99Q4GaPrwYQRuDK9YwskXEalKak74EK3P/I2gdQOkEuXaDR9Et0RjROwkUFSQGdvAExdfiQUOuuU79A+2UcoOoh2LKyWeciKk2kTJ/AqQ2uIJhZBRj+qk40f2TBDimojF502fQbK6EdmxBdPTSer6a8Fx+c0F15NI1eF7ilBr4gmf6XMn0Lp1kM8efwVfv/CHNI+r43f3XsYf7rkcYarZ2j+deO18jj/wAP7ywJ38/Cdf4LzzD2HZii3ksg6Oo8tbksFLJGjd0s+Tf32bDx0xj0RKRn0tRYjrxzj24AUAvLa+nUx1LdoapISObV3sv/u8V+bMmDnwT8/VGKROYk0cWyKCcuBd1+9/LDDRE7EYXULrIqGBYHgYH2g6+SM351HIoAimiIzHKL79DhuefZnaaZOo3mN3ipvayW5aT8OHDyWGw7bf/B5PupQUZapBuU78f8MQVoIx+A0Zhja388SVP6PpwEVM/ciJ5F5fhiwMY7wo5oQo+4zCYBQ4vks40o5DQlDuceBIjZAGL+5RXL+R/JZtOFvXwIRZZD7/BR548CXeWryU+nG1UT6zMFgTYXSNTVVMmDCWB+97mUMWXcT3r/41BxwwiyeeuoJvf/t8Jsw6klZvEYcffwZ3/PpGvn/5udx47afZtG0Tnf2DKOVghQQRoCri/PaBFwGPjx+5kA0betm6rZfd5k9kypRxLF78FquWbaSiykdbiQmBYo6PH7fHrRAxE6w1jHhBUgpGV41gRyeSd5tbY8y7/GbkRwS9h0NZ8tZA0osacwsPoXNIL4FEiiV7HPXO8JInZ1Xvuoj+dIbCc88TP/woDnjibrYtfo2H91pEigqO6l0L7QMsmX8w6aYqjOthBAjrRFuWtFicMk8EDO4oaqsRGKEiML5cNM/YqBuksVHWoBmhBwChYwmzIUPtfXx+23O4QYH7aubT3DIGb8ZkVKmEsBrHSpxyAwwlBZigzAOWYKJeQq4Iy6AlxITA2bKd4oalpBY/SbDnYZw35zQGTUC6JoO25QAFKuK8CIsRBuEIBgZg45ZtjGup45zzj+PU/6+8Mw+zorrW/m/vqjrn9Dmn54kGuulmBkEm49UACYqCMUaM91NRE71x1oskcq+amBjNvV79JNE4fFGTGL3milM0qKBoFFEQREVUJttu6KYb6Al67j5T1d77+6OqATUOaJLnmuznqf6jz7Sr9lur1lp7ve/6ns9JuvvZrdxz94NsWn4z1/775fzHz2/nyVXr+e55vyGaV0BZWQzX9ejRNrub2qle/iOGFoWID18AHWlWv/4zZh45iTln/F9eWLeDUYcNRRrD+1vrmDC5uHHz8puGGUIMsCAJcPExqw8E1kT8mf8d6pD4JZKpUBb9xuCCGXz79XP7ooN27tpYTfLtalIiQs2fHmP1T2+h5KgjmPPCS8xpqKYwv4jatWtJu02EsVD2gMzhX35YCuzsLFzl8vSC/yJaUMDEG/+dRFsnurefSCQLR5tAnUaANmg3HXSG9Ztj2MZXDDfCt0iOE8FOeaTrNqHmzCP6T8fz+B2P09jcTEFh7od1kNl/uxqB8gTRmMWECaNRKosf//Ahjpl5OX94bCWXnngY7y67ifueeoM7n3iVef98LqfMmsYzjyxCup3sa+1C2hbhUBR2dvLgky+aWG4xbZvv5Onnf8LMIydx/S8e4oXH/gRCsat+J++//Q4i1J/61TVnngohMl7y431acdDxwZl/8G2fx8I4xmBECFf41edIQwib3i3byjqffelcOz9m6ayISvd0eZ6MlI+/5HsLQ0Db1q3U/OctDFl4EalX36bx6kVkjxyHKyMHuElotPjLWBgjQQlfaqu5tpHzNz7B6PGjeKZkEhHhkX/UEch0P7oniQg7fl9JA3bgM4AkJA3StrATGWTIIMJZWJtq6G1+j8r67bQUDeGiMacRKi0imuXgCWugzi+wMDKYk5/h9vus+Xr2WoZpbe+mvbOL0aOquOS8GZxx1jcBuOOBJ0h2tXL198+ndnsLJ51zJ4lwNrurG7nsglksPHcGt9z7FBdeeBJfGTESgLuXPP+m7cjHs6MxpTxl9fZ2WTNmTF42oap8i0krjKWFsOwP4OCTLIzgo0HTFwKMFwBGCYXQkGf5NaEGSOPToABqHnvK7Hn8CXr+sBRBH0XDpzG2ehW7bryX3ddfSd6or5CRIYxRf1HAaBnEF9Jh355WcoeVs+iNR3lvySO8/53zGXb0sVhjh+I17sXpTyBDftNx2+igaFz4rYV1BqEl4dJi7KadpNe/ilxwFUV33sy15/8Ha5evp3xMJVp5QdnlJwHGQqExQvrn4yd06WhzaWvtpGxkMfNP/Scuv+hkotkS8LnqR8+7ifXPbTQXLpjOb275ASeeezsrlq4XZFv88xnHceJRIzjv9JkjgLqPLqYfZZmBC3nQGh8qYKzrrrvuUwDj/9UZX0uXkC+uQfBsDrZzfTnUnj50dzv9YYVyE7jSwTOCHY88VbX7nlsnFxWVklUxgb11O+hf/hJjltyB6+XQ9uTjZBUUoKXtKwwEFLSBMqaBuRgERvj3/n6SXxBD+K8FlNIgoT5wfbQRxPLzaNiwhfi40Uw7cx51y14g/eZGcscfRnZZEV57B8b1iNg2CL+ZRSQcwvIyuJk+YkPKEaEocs1aUlIwaN2LvLm5gXv/7ZdUjBmJFq5/e4kDj1iDPGhOJnhNMiBiYAJaMdomHHPIL8uhL6n404tbuOeBZ2ls6SOZ6ef/3b+Cpfc/Y86+5ATuv20h3114B398cTNjpo0hN6dMrHtkBbogdM2pc6csszFglG/p/J/xq27MfhLuQWKSnxxm/NUsjBYaoTS5fUl0up++/AiWcIg5Ofu/bt31Nz2882fXzB88ZCwiVkRfzRbiU7/CUW/9ifcW30HD1deQVzEWkxUlFWzwYSwU9he2MAqJkhap9l4IOVxRuwJVv503D5tBvHwEg06ejeelcd/dju7oxLL8qCluLDxHIMcMpbCkkr41a0i9voqcX91FzmWXcsVJl1O3uYH88sG+kpPg0CyMEH6RiTngGINEizB9rkdbRzuptEtPbSuX/eh086sbv8f8Bbfx6JNbxPiJg01SRET9G1uY/50jn3r4th+cAqA97dOy/Kbgwb338VLwn9SA+K9mYUxAQ41kPIxyyWTZCCQhK+LXkgqonDXziY597uj6lUsn5keKiAwupWfLJuqXPsukW28ga/xkan6/hJiwsWNRPDQYGYST/lw+j4XZ/zkjiEdj7KqrJ6E1U045gUxPmq6nHwAZIz5hHFljhyPjWUSjEWR5EaGCEkKTJhAfVE7/xvXw8vPoKV+l+N67ee7J1Sy9/UHKRlWx/54THLqFEQdOxn/N8eXFwqBth+baNm76r3O46dozxUmXLmbp8s0cNraCjCdF3YZtzP7WhNVP33PVtwDtk2GDfHVQ7/Pnm9ocGP9rLIzEJh7yo4Y+zyXiOBjgjX+54uEdD9w2v7R8IiKeR+q9epwhhUx7exnJmiY2zDmDmAExohLPA6mlX1nPF7QwSLSU6IxH285Gzl/3MOMOH8dbU4+h7+2XKTlsOvFvziJn7AicvFJEJBtvXwv91ZsJr3iZ1Ntr6CsezKimRhoTKRZOO4NsmYtTkoVScj9AD93CGIwOGv1IANsQckRTWye72zr577vO4+yTpzH9lJtZ98ZuJk0uJ5FR1G7YysxjRq9b9cebv24Jy0srF8dygjZDftG3sP1H0UHL+ZFxqBbmbwKYfuX53KdQiDiw6sJFDzfce9f8IYNGogsKSezcheMaDn/pIeIVg1nzjXPo37adolEjSYR8i+Io4RO8vhBgAMumu6UTYYe49I0llBUXsPHsi+l+6DcU4pA7cjJ2ZZkvA7lnD7q2Bk/1IY+cQdXa5+m1oyyadQ57a1spGTEc5WUCLtWhAMa3BSqgxBpj0FgGaaFtm3e3N5LnhMzKp64VhYWWmXrsjXJXV5qvjC2l2/Oo2biBY487Yt3Kx2+eBcJ13SSO5YsjmAHFjL8SYD5XHubzDCEEXipJP/DV3956ZtXCq5c2tdSSbG8gq3IIMjvOmzNPZM+ylcxc/zxVF51FU+026Owm7At0fOE8sF+BqcgeXEomkeDX079D7aZapi75NUe9to6c+fPpSKVoXrOWnlUrSba1YJ/6LSqffoaq19fQ2JFh0ezz6djaRkXlUJRKfOY5fWDZBvYw9hdUG2wL+hOu2PB2tThh+nixde3PZXPLDkZPXmT6+7WeNDLHtHX3UPPaWmbPm7b2+cdvPhaESzqNNQDYL3h9Psv4m1kYjEFphSsgOxQhBLz+i7vv3nTlDy8pimWTVVFBKpmme2cNZfNOY9LvFtP/5mbeOesK+rv3kjtuFFqH8AJWpAGE9OkXn9nCCJ96IrSFF5L0NreTSqSYdt4pzP7hAooLIr5/ppV/Z1o2SWCvgvW3LOHJ3zyCSSkKK8vJKH8rw5MGZT7dwviPIQttLJTQaKRR0gglDeCwo67FpLwUv/z5Ak6bN9Vcf8MDZvEdzzF0ZCXFRcJrau4It7z3Pt9bOOdn9/3yxusBjMoEJRcHFs2Yv66F+ZsDRkmBpTSRSBZhoPrR5WetPu+S+0sSmZAYOxoXl76aekLFg5j+u9uJThvPxqsXs/P3DxMfNIhwcQmecn3BRCGDNPxnB4zvNEt/Po5NOuWxb1crTjxO6VETOOzYoymsGErGgd7mJupfeoct6zbT3d5NdnkJsXgM1/PQwvHLIjGB+oIvyaGE7TvlH3kkmQNzM9Io4WBsRU9Piq3Vu5gzdxK33XKRSfQlzTkX38pbWxoYN6FCRG0t3m9sFn3tTdx4w6IFP7r8u78CSPd5wonbRnzYrgRbcn9XgLG1QeBgpEuOE6HhrU3jXz7j4mfMji2VucPGkMkOk97bTndrG+Mv+1cmXPN9+t59n9evvoZ9W2spqKxC5ETRPlvNr387SE7NIPA+ATAqiFR8LrONxsZNp+jt7qWnP40XkP6RknAsm1heHiJiY4RBYdDG8v0REdDfPgKYAcm1gyyM0PgaN8ZghUQyqXmverspLMnjhhvOF8fPnWTuv2+F+el/3m+ycgopqYhLVyVF9YY6RFao5+k/3HDcScd9/U0A5YIR6iOraTCBeoVEG/P3BRgpHJSbQDuacCiXdE9PyZsXLLx72x8eP7UwrxS7bDDSVXRu30F26TCm3Ppj8o6czM7nnqfmFw/Q27ib6PAyopEcX55US2wEKdsXPsJwUHT18YBB2ChhkRbabxNo4Zt0JdDSQdkKZQxoG+3vRaKN/BTAfMjC4Ed4xsrQl4K6+may8xTnnDPPnHLabPY0tpof/eQu8ca72xk/YbSKxhV797XbDVsaOHzmkS8s+fVPL5kwrqouY1yM53OohFAfcVo0xhex/jICRhhJdjgfY6DX88BolFZ4UuBogxQh0m4vWVLihLMI+0W/bLjnvkWvX7X4Onr35RQOq0RHQ3R3d+E1dVB6zGzGXvodcscMo+3l19hy98Ps3bGTvJIi7PwCtJBIY/CEwBMHMr2fBBgtbAwWntCBL+qT5DUCT1q+HLvBtyqHCBgVfEZITXtXj2nY3SkKy+LMP/cY5n5jOl37Evz2d380jz7xiskpyKWsIh+jM7K+ppH+Trf/yisv/sHixZfdC5D0XMsWDpYwSmvlq359aKfTYLCk9eUEjC1CRJ1sfEqS70Rqo1Ei0G7BwuDhCIEtfeXvgbbAzXWNg9d8/ye/bFz+5OnxeAmx8nJcDF0tuzGdKYpPPZGpF5xFtLiYts3bqP2fJ9jzykasaJR4eQnSCaENeAEpzleEOeD0KhP4MOIAYBR6vyChOghMOgCMMfLPAkbjy4sNJOM8OZBnMXiuxa6mTtPRt48RE0r5P6efYo786giRziiW3P8sjz74ClZMMmh4tkbasrllr2ipq+eIqbOeu/XnCy6aeewRu0CRyWArIUXY0kpKSwd1kB+/0gM1LV8GwKh0H6nCbKJ2DgMCquLDXwociC0PDG0MygicwPF/478fO+f16268s6fx/ZxIaRWxoiIcT9PR3EqqP83Ir3+NqgtOJTp6GF5rB3tXb6Bm6SraG/ZgRRyihXmEsrMxwsbDoAQgJCqIVAKuwIcAIwPA4ANCgtKBkLvE90cCKQ5PWriB5owRCiOhp1/T3tpPb28v2WVRZs+bYY782kQqKgdTv7PR/P5/XmTlitdMRBg9tGqItGO21d7TRc3WapxYzp4fX3X5Dddde8E9/hXIoAiR8lxfQknaWnyWRIgOji8DYLx0D25RIVlWjE/mDn/czwroykA8BDa07mstX3/znZfXLll2caJ5V07+kArs3By0J02io4PEvnYxZNIkRp/7bfImjUF1JFCpDK3VNbSt3ULNu1tRrktOJIpTkI2MRvGEL+ahhcATDiBRRqN9UZMgo6wCi+QEgDFoyweMZyTa2GAs0ukMHT1d9PT1kFEuwyeO4fCjJjNm4khj57jk5eZTX93KsmUvmRdXrdPR7JgpKcrV4XCWyKSSoXe2vkM0Oy918rfn/vbKKy68dsrkMd0AfcpIW2MyaOMaSZ4tsHzxwE+/qgPFi9aXBjAFZFnxzwkYv0+hdgELwsEd1VLXMOjVxXddteWR5Re73fui+YMGQ1GcsGeR6EvT09RCOBol/6tTmPjNuRRUlRMryKGvt4/u3c301eyidt0G9jW2kOnPkHDTYNlEojnYkSjGAm0JIOT7JVL5TrOwcV2D8TQJlSbZn8RLKqNiUWHFHAoG5TL+qKmUjx9G0aB8k1+cy96uVtPZ0smaFa+ZV1Ztlq1dnQwqyzMFBfmuq43oS/SHtu/cgTaee8Lxs+/64aIFtxx97NRd4Gu4YCGSQoi0SpOnMZ4OEQ4LIz+rFspBY8DN+bsEjJ/zhN6MwEiISrDdDAaQYb/WZuembRXr73vw37Y9vGyhamsjEs+DIUU4VogMAt2TMom2TrQtKJ46lgnHfY3cYUNEbEipyQqFhE4rozJKZNIZOve00rxzD51tHWQSKTKJFGQUrjAHSjccB5mVhYg55BfmM7iyiuKKIVi5xihbEYnEwFU07dlNe1OPWbviHfPqurfo95KitLBEZOWH0KEUuFo0tfbSuLeBWCyLOXPm3HXhZWf/4hvHfa0eQCc9jG1JbIzRhowI2nJIy4gDe62HPP5hACOBuONLiGlXYWlBoEgMQEvt7lGbHn369A3Lnzm7eePWcWk3Q2lRKbIohrbDSC2M6uunr71TJF2XrOw8qg4fR/6Y4TiDiiitHEReURHacbDCDraWCC1Qtuf7N0YijU/dl0III8BzNRnXI9GdYHddo2lv6xCNdc1s3VRt9rZ3Cixbx3IKiOTYaJHCcz25tytFfcsuPDzGjRveOPeEmfefedZpDx5xxOTt/oIZMjojbM8W0sIYywJtjDEaLX3JNSH8DnPyc0DmHw8wZuCkjV/hDuAaCPnPqp60ZvvK1XNrX1593JZnXji9fceuit50hnhOHtkFOVjRCAaJ1gI3mTTplEsq4QqVSaFCkkhuPrk5vl6fzIpiIgIlNC5+AsxKe7hpz/SkMvT09oierj7jeRbSCmHHQ9hhKZxQDB0WxrOV6E+m6ezopKl5N9LRxHJzGmYeP+ux444/et03Tp60rLhwQrBG/uaGF5yiZZQErY208aX3fMDYBy213K/q/dnHlwIwmaJ8olb25wZMd9oHTE7IYLQJMqcGKW2k9lAZv9TIilhGHlSR19TRau9dXzOj+tmVZ25+d+Osluq60W37mjEiTDQeIzc3j3As7pPyg8MzwiihhTFB9zIt8XOyAmkcjGNwpcS1LCMsC2EJoYXB036Y3ZvoYV9LF50d7XTSQ66TS/7gorenTp+69tunn/DQxEkTXq+qrNIAGdVGV1KJGNnSti2sUMgYIbGEMRJhML5FNToI7YX+xwCMKi4mLLM+N2AyKugsEmz9H3hDIB2gESZjIWw/AW80CMsYDiL1J1Fs37Dt8E2vvDa3Y2fDlI76horabTXT97btRWc8FIZIJIqlBXZ2HDvkYNsOlhUOugv5WwYempSXwUt79GcSJFIZ0q6H5yiMciksKaZi/KjVpRWl20rL8uomTZvywtAxFe+MGzVh/1xcwAORTCiR7u2wI7YjZFZYOyFLOVIajDSW9EsnMSAMuP8YgEmg0n1QXIYl7Y8ldH/a2F9v+oGPB0k4Q9CAQuC3JghCR41AaeP1pdBhBycW/kDthgLqG3aN273t/cLe1o7irq7OcU3v7ZDJRHJGb3f/kEwmo4zrYZQGbRDSQjkW0rYMtrSNY3nZ2dkv5hcUtw0dXmlnFYUSXjhUN3r8uO1Txo5+78+dh/a0UFqAEELbfq8xEhkhpZLSCmvpoC0MSVcgJYQdX+wIA97/UsD8fykY/RVnLOBjAAAAAElFTkSuQmCC"--}}
    {{--alt="" width="150">--}}
    {{--</td>--}}
    {{--<td style="border: none; width: 40%;">--}}
    {{--<div class="title">???????????? ????????????</div>--}}
    {{--</td>--}}
    {{--<td style="border: none; width: 30%;">--}}
    {{--<div class="code-label">--}}
    {{--???????????? ???????? : {{ $program->requester_name }}--}}
    {{--</div>--}}
    {{--<div class="code-label">--}}
    {{--???????? ???????????? ????--}}
    {{--: {{ (\Morilog\Jalali\Jalalian::forge($program->from)->format('%d %B %y')) }}--}}
    {{--</div>--}}
    {{--<div class="code-label">--}}
    {{--???? ?????? : {{ ($program->duration).' ??????' }}--}}
    {{--</div>--}}
    {{--<div class="code-label">--}}
    {{--?????????????? : {{ ($program->comment) ?: '-' }}--}}
    {{--</div>--}}
    {{--</td>--}}
    {{--</tr>--}}
    {{--</table>--}}
    {{--</header>--}}
    {{--<main>--}}
    {{--@php--}}
    {{--$days = array_values(array_unique($program->items()->pluck('day')->toArray()));--}}
    {{--@endphp--}}
    {{--@for($j=1; $j <= count($days); $j++)--}}
    {{--<div style="width: 100%;text-align: right;padding-right: 20px;font-size: 20px">--}}
    {{--<h4>{{ $days[$j-1] }}</h4>--}}
    {{--</div>--}}
    {{--<table class="table table-bordered mb-4 w-100">--}}
    {{--<thead>--}}
    {{--<tr>--}}
    {{--<th style="width: 30%" class="table-label">??????????</th>--}}
    {{--<th style="width: 10%" class="table-label">????</th>--}}
    {{--<th style="width: 15%" class="table-label">??????????</th>--}}
    {{--<th style="width: 10%" class="table-label">????????</th>--}}
    {{--<th style="width: 10%" class="table-label">??????????????<span style="font-size: 10px">(??????????)</span></th>--}}
    {{--<th style="width: 20%" class="table-label">??????????????</th>--}}
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
    {{--<td>{{ $item->comment }}</td>--}}
    {{--</tr>--}}
    {{--@endforeach--}}
    {{--</tbody>--}}
    {{--</table>--}}
    {{--@endfor--}}
    {{--</main>--}}
</div>
</body>
</html>
