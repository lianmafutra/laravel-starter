<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ Cache::store('styles')->get('app_name') }}</title>
    <link rel="icon" type="image/x-icon"
        href="{{ asset('img/' . Cache::store('styles')->get('fav_icon', 'img/logo_laravel.jpeg')) }}">
    <link rel="stylesheet" href="{{ asset('template/admin/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/admin/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/progress-bar/pace-theme-default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/progress-bar/flash.css') }}">
    <script src="{{ asset('template/admin/plugins/jquery/jquery.min.js?v=4') }}"></script>
    <script src="{{ asset('template/admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('css')

    <style>
        .select2-selection--multiple .select2-search__field {
            width: 100% !important;
        }

        table.dataTable tbody tr.selected>* {
            box-shadow: inset 0 0 0 9999px rgb(13 110 253 / 90%) !important;
            color: white !important;
        }


        /* fix modal open, problem auto add padding on body */
        body {
            padding-right: 0 !important
        }


        /* settings style from cache file */
        :root {
            --sidebar_primary: {{ Cache::store('styles')->get('sidebar_color') }};
            --sidebar_active_bg: {{ Cache::store('styles')->get('sidebar_active_bg') }};
            --sidebar_bg_color: {{ Cache::store('styles')->get('sidebar_bg_color') }};
            --sidebar_header_bg: {{ Cache::store('styles')->get('sidebar_header_bg') }};
            --content_wrapper_bg_color: {{ Cache::store('styles')->get('content_wrapper_bg_color') }};
            --navbar_bg: {{ Cache::store('styles')->get('navbar_bg') }};
            --nav_item_hover: {{ Cache::store('styles')->get('nav_item_hover') }};
            --btn_primary: {{ Cache::store('styles')->get('btn_primary') }};
            --btn_secondary: {{ Cache::store('styles')->get('btn_secondary') }};
            --btn_danger: {{ Cache::store('styles')->get('btn_danger') }};
            --btn_info: {{ Cache::store('styles')->get('btn_info') }};
            --btn_success: {{ Cache::store('styles')->get('btn_success') }};
            --btn_warning: {{ Cache::store('styles')->get('btn_warning') }};
            --progress_bar: {{ Cache::store('styles')->get('progress_bar') }};

        }

        @keyframes spinner {
            to {
                transform: rotate(360deg);
            }
        }

        .spinner:before {
            content: '';
            box-sizing: border-box;
            position: absolute;
            top: 56%;
            left: 50%;
            width: 20px;
            height: 20px;
            margin-top: -10px;
            margin-left: -10px;
            border-radius: 50%;
            border-top: 2px solid #ff5252;
            border-right: 2px solid transparent;
            animation: spinner .6s linear infinite;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed text-sm">
    <div class="wrapper">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="img-circle"
                src="{{ asset('img/' . Cache::store('styles')->get('fav_icon', 'img/logo_laravel.jpeg')) }}"
                alt="AdminLTELogo" height="60" width="60">
                <div sty class=" loader_custom"></div>
        </div>
        @include('admin.layouts.navbar')
        @include('admin.layouts.sidebar')
        <div class="content-wrapper">
            @yield('header')
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        @yield('content')
                    </div>
                </div>
            </section>
        </div>
        @yield('modal')
        @include('admin.layouts.modal')
        @routes {{-- route library https://github.com/tighten/ziggy --}}
        @include('admin.layouts.footer')
    </div>


    <script src="{{ asset('template/admin/plugins/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('template/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('template/admin/dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('plugins/progress-bar/pace.min.js') }}"></script>
    <script src="{{ asset('plugins/sweetalert2/sweetalert2-min.js') }}"></script>
    @yield('js')
    @stack('script')
    @stack('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        $('.loader_custom').addClass('spinner');
    

        // fix problem with select2 multiple not show placeholder
        $('.select2-search__field').css('width', '100%');


        //   reset form input value on modal
        window.clearInput = function() {
            $('.modal').find('.input').val('')
            $('.modal').find('.error').hide()
            $('.modal').find('form').trigger("reset")
            $('.modal').find('.select2').val(null).trigger("change")
            if ($(".filepond")[0]) {
                let filePond = FilePond.find(document.querySelector('.filepond'));
                if (filePond != null) {
                    filePond.removeFiles();
                }
            }
        }

        window.showError = function(response) {
            $('.error').hide();
            swal.hideLoading()
            let text = '';
            if (response.status == 422) {
                printErrorMsg(response.responseJSON.errors);
                text = "Periksa kembali inputan anda"
            }
            if (response.status == 400) {
                text = response.responseJSON.message
            }
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan...',
                text: text,
            })
        }
        window.showLoading = function(title = 'Processing', message = 'Please Wait...') {
            Swal.fire({
                title: title,
                html: message,
                timer: 2000,
                allowEscapeKey: false,
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading()
                }
            })
        }
        window.hideLoading = function(title = 'Processing', message = 'Please Wait...') {
            Swal.close()
        }

        function printErrorMsg(msg) {
            let error = [];
            let error_array = [];
            $.each(msg, function(key, value) {
                $('.text-danger').each(function() {
                    let id = $(this).attr("class").split(" ").pop()
                        .slice(0, -4)
                    error.push(id)
                });
                error_array.push(key)
                $('.' + key + '_err').text(value);
                $('.' + key + '_err').show();
            });
            let uniqueChars = [...new Set(error)];
            getDifference(uniqueChars, error_array).forEach(element => {
                $('.' + element + '_err').hide();
            });
        }

        function getDifference(a, b) {
            return a.filter(element => {
                return !b.includes(element);
            });
        }


        const rupiah = (number) => {
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
                maximumFractionDigits: 0,
                minimumFractionDigits: 0,
            }).format(number);
        }

        $('.modal-ajax').on('show.bs.modal', function() {
            $('.modal-loading').show();
        })

        $(document).ajaxSuccess(function(event, xhr, settings) {
            setTimeout(() => {
                if ($('.modal-ajax').is(':visible')) {
                    $('.modal-loading').hide();
                }
            }, 1000);
        })

        // dropdown datatable 
        // dropdown datatable 
        $('.custom-datatable').on('show.bs.dropdown', function(e) {
            dropdownMenu = $(e.target).find('.dropdown-menu');
            $('body').append(dropdownMenu.detach());
            var eOffset = $(e.target).offset();
            return 0;
            dropdownMenu.css({
                'display': 'block',
                'top': eOffset.top + $(e.target).outerHeight(),
                'left': eOffset.left - 50
            });
        })

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        if (@json(Session::has('success'))) {
            Toast.fire({
                icon: 'success',
                title: @json(Session::get('success'))
            })
        }

        if (@json(Session::has('error'))) {
            Toast.fire({
                icon: 'error',
                title: @json(Session::get('error'))
            })
        }

        window.alertSuccess = function(title = 'Success') {
            Toast.fire({
                icon: 'success',
                title: title
            })

        }
    </script>


</body>

</html>
