@extends('panel.includes.master')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/plugins/table/datatable/custom_dt_html5.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cork/plugins/table/datatable/custom_dt_custom.css') }}">
    <link href="{{ asset('cork/assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css">
    @yield('sub-style')
@endsection

@section('content')

    @include('panel.includes.modals.delete')

    <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <div class="mr-md-4 mr-0 text-md-right text-center">
                @yield('content-header')
            </div>

            @if($total > 0)
                <div class="table-responsive mb-4 mt-4">
                    <table id="html5-extension" class="table table-hover non-hover style-3">
                        <thead>
                        @yield('table-header')
                        </thead>
                        <tbody>
                        @yield('table-body')
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-primary my-5" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-x close" data-dismiss="alert">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                    <strong>خطا! </strong>داده‌ای برای نمایش وجود ندارد.</button>
                </div>
            @endif
        </div>
    </div>
@endsection


@section('script')
    <script src="{{ asset('cork/plugins/table/datatable/datatables.js') }}"></script>

    <script src="{{ asset('cork/plugins/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('cork/plugins/table/datatable/button-ext/jszip.min.js') }}"></script>
    <script src="{{ asset('cork/plugins/table/datatable/button-ext/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('cork/plugins/table/datatable/button-ext/buttons.print.min.js') }}"></script>
    {{--    <script src="{{ asset('cork/plugins/notification/snackbar/snackbar.min.js') }}"></script>--}}
    <script>

        {{--@if(isset($is_deleted) && $is_deleted==true)--}}
        {{--$(document).ready(function () {--}}
        {{--Snackbar.show({--}}
        {{--text: 'آیتم با موفقیت حذف شد',--}}
        {{--pos: 'bottom-right'--}}
        {{--});--}}
        {{--});--}}
        {{--@endif--}}
        $('#html5-extension').DataTable({
            dom: '<"row"<"col-md-12"<"row"<"col-md-6 text-md-left text-center px-0 px-sm-2 px-md-3 px-lg-4"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
            buttons: {
                buttons: [
                    {extend: 'copy', className: 'btn'},
//                    {extend: 'csv', className: 'btn'},
                    {extend: 'excel', className: 'btn'},
                    {extend: 'print', className: 'btn'}
                ]
            },
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
                    "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>'
                },
                "sInfo": "نمایش صفحه _PAGE_ از _PAGES_",
                "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
                "sSearchPlaceholder": "جست‌وجو...",
                "sLengthMenu": "نتایج :  _MENU_",
            },
            "stripeClasses": [''],
        });
        @if(count($errors) || request('is_redirected'))
        $(document).ready(function () {
            $(".register-modal").modal('show')
        });
        @endif

        $("input[name^='expense_id']").on("change", function (e) {
            var total = parseInt(toEnDigits($("#expense_total").text()));
            var change = parseInt($(this).val() == '1' ? '{{ \App\Expense::where('type','برنامه تمرینی')->first()->price }}' : '{{ \App\Expense::where('type','برنامه غذایی')->first()->price }}');
            if ($(this).prop("checked")) {
                total += change;
            } else {
                total -= change;
            }
            $("#expense_total").text(toFaDigits(total));
        });

        function toFaDigits(n) {
            const farsiDigits = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];

            return n
                .toString()
                .split('')
                .map(x => farsiDigits[x])
        .join('');
        };

        function toEnDigits(n) {
            return n.toString().replace(/[۰-۹]/g, function (chr) {
                var persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
                return persian.indexOf(chr);
            });
        }
    </script>
@endsection
