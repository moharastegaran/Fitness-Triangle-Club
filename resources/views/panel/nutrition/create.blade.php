@extends('panel.includes.master')

@section('title','جدول ارزش غذایی')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('panel.admin.nutrition-programs.index') }}">برنامه‌های غذایی</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>جدول ارزش غذایی</span></li>
@endsection

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/plugins/table/datatable/custom_dt_custom.css') }}">
@endsection

@section('content')
    <div class="col-md-9 col-12 mx-auto iransans-web">
        <div class="box">
            <div class="box-body table-responsive no-padding">
                <form id="nutrition_form" method="post" action="{{ route('panel.admin.nutritions.store') }}">
                    {{ csrf_field() }}
                    <table id="nutrition_table" class="table table-hover table-bordered style-3">
                        <thead>
                        <tr>
                            <th>نام</th>
                            <th>گرم</th>
                            <th>کالری</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($nuts as $nut)
                            <tr class="exact-row">
                                <input type="hidden" value="{{ $nut->id }}">
                                <td class="editable">{{ $nut->name }}</td>
                                <td class="editable d-none"><input class="form-control" type="text" name="name"
                                                                   value="{{  $nut->name }}"></td>

                                <td class="editable">{{ $nut->gram }}</td>
                                <td class="editable d-none"><input class="form-control" type="number" name="gram"
                                                                   value="{{ $nut->gram }}"></td>

                                <td class="editable">{{ $nut->calorie }}</td>
                                <td class="editable d-none"><input class="form-control" type="number" name="calorie"
                                                                   value="{{ $nut->calorie }}"></td>
                                {{--<td>--}}
                                {{--<button type="button" class="btn-edit btn btn-default btn-xs" title="ویرایش"><i--}}
                                {{--class="fa fa-pencil"></i></button>--}}
                                {{--<button type="button" class="btn-delete btn btn-default btn-xs" title="حذف"><i--}}
                                {{--class="fa fa-times"></i></button>--}}
                                {{--</td>--}}
                                <td>
                                    <ul class="table-controls">
                                        <li>
                                            <a type="button" href="javascript:void(0);" class="btn-edit bs-tooltip"
                                               data-toggle="tooltip" data-placement="top" title=""
                                               data-original-title="ویرایش">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-edit-2 p-1 br-6 mb-1">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a type="button" href="javascript:void(0);" class="btn-delete bs-tooltip"
                                               data-toggle="tooltip" data-placement="top"
                                               title="" data-original-title="حذف">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2"
                                                     stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-trash p-1 br-6 mb-1">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </td>

                            </tr>
                        @endforeach
                        <tr class="extra-row d-none">
                            <td>
                                <input type="text" class="form-control">
                            </td>
                            <td>
                                <input type="number" class="form-control">
                            </td>
                            <td>
                                <input type="number" class="form-control">
                            </td>
                            <td>
                                <ul class="table-controls">
                                    <li>
                                        <a type="button" href="javascript:void(0);" class="btn-remove-row">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg>

                                        </a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control">
                            </td>
                            <td>
                                <input type="number" class="form-control">
                            </td>
                            <td>
                                <input type="number" class="form-control">
                            </td>
                            <td>
                                <ul class="table-controls">
                                    <li>
                                        <a type="button" href="javascript:void(0);" class="btn-add-row">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                 stroke-linejoin="round" class="feather feather-plus">
                                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <input type="submit" value="ثبت" class="btn btn-primary btn-block">
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {

            $(".btn-add-row").on("click", function (e) {
                e.preventDefault();
                $(this).parents("tbody").first()
                    .append($("<tr class='extra-row'></tr>").html($(".extra-row.d-none").html()));
            });

            $(document).on("click", "#nutrition_table .btn-edit", function (e) {
                e.preventDefault();
                if ($(this).hasClass("btn-success")) {
                    var parent = $(this).closest("tr");
                    var url = '{{ route("panel.admin.nutritions.destroy", ":id") }}';
                    url = url.replace(':id', parent.find("input[type='hidden']").val());
                    $.ajax({
                        method: "PUT",
                        url: url,
                        headers: {
                            'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr("content")
                        },
                        data: {
                            name: parent.find("input[name='name']").val(),
                            gram: parent.find("input[name='gram']").val(),
                            calorie: parent.find("input[name='calorie']").val()
                        },
                        success: function (response) {
//                            console.log(response);
//                            console.log(response.id);
                            parent.html("<input type=\"hidden\" value=\"" + response.id + "\">\n" +
                                "                                <td class=\"editable\">" + response.name + "</td>\n" +
                                "                                <td class=\"editable d-none\"><input class=\"form-control\" type=\"text\" name=\"name\" value=\"" + response.name + "\"></td>\n" +
                                "\n" +
                                "                                <td class=\"editable\">" + response.gram + "</td>\n" +
                                "                                <td class=\"editable d-none\"><input class=\"form-control\" type=\"number\" name=\"gram\" value=\"" + response.gram + "\"></td>\n" +
                                "\n" +
                                "                                <td class=\"editable\">" + response.calorie + "</td>\n" +
                                "                                <td class=\"editable d-none\"><input class=\"form-control\" type=\"number\" name=\"calorie\" value=\"" + response.calorie + "\"></td>\n" +
                                "                                  <td>\n"+
                                "<ul class=\"table-controls\">\n"+
                                "<li>\n"+
                                "<a type=\"button\" href=\"javascript:void(0);\" class=\"btn-edit bs-tooltip\"\n"+
                            "data-toggle=\"tooltip\" data-placement=\"top\" data-original-title=\"ویرایش\">\n"+
                                "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\"\n"+
                            "viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\"\n"+
                            "stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"\n"+
                        "class=\"feather feather-edit-2 p-1 br-6 mb-1\">\n"+
                                "<path d=\"M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z\"></path>\n"+
                                "</svg>\n"+
                                "</a>\n"+
                                "</li>\n"+
                                "<li>\n"+
                                "<a type=\"button\" href=\"javascript:void(0);\" class=\"btn-delete bs-tooltip\"\n"+
                                "data-toggle=\"tooltip\" data-placement=\"top\" data-original-title=\"ویرایش\">\n"+
                                "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\"\n"+
                            "viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\"\n"+
                            "stroke-width=\"2\"\n"+
                            "stroke-linecap=\"round\" stroke-linejoin=\"round\"\n"+
                        "class=\"feather feather-trash p-1 br-6 mb-1\">\n"+
                                "<polyline points=\"3 6 5 6 21 6\"></polyline>\n"+
                                "<path d=\"M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2\"></path>\n"+
                                "</svg>\n"+
                                "</a>\n"+
                                "</li>\n"+
                                "</ul>\n"+
                                "</td>");
                        },
                        error: function (xhr) {
                            console.log(xhr)
                        }
                    })
                } else {
                    $(this).toggleClass("btn-success")
                        .closest("tr").find(".editable").toggleClass("d-none");
                }
            });

            $("#nutrition_table .btn-delete").on("click", function (e) {
                e.preventDefault();
//                if ($(this).hasClass("btn-success")) {
                var parent = $(this).closest("tr");
                var url = '{{ route("panel.admin.nutritions.destroy", ":id") }}';
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
                })
//                } else {
//                    $(this).toggleClass("btn-default btn-success")
//                        .closest("tr").find(".editable").toggleClass("d-none");
//                }
            });

            $(document).on("click", ".btn-remove-row", function () {
                $(this).parents("tr").remove();
            });

            $("#nutrition_form").on("submit", function () {
                var inputs = $(".extra-row").find("input");
                var rows = $("#nutrition_table tbody").find("tr:not(.exact-row,.extra-row.d-none)");
                for (var i = 0; i < rows.length; i++) {
                    for (var j = 0; j < inputs.length; j++) {
                        rows.eq(i).find("input").eq(j).attr("name", "data[" + i + "][" + j + "]");
                    }
                }
                $(this).submit();
            });
        })
    </script>
@endsection
