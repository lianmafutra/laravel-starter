@extends('admin.layouts.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('plugins/coloris/coloris.min.css') }}" />
@endpush
@section('header')
    <x-header title='Settings Application'></x-header>
@endsection
@section('content')
    <div class="col-lg-12">
        <div class="card">
            <form action="{{ route('settings.update') }}" autocomplete="off" id="form_styles" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="card-header">
                    <h5>Style Apps</h5>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Sidebar Primary : </label>
                                <input id="sidebar_color" name="sidebar_color" type="text" data-coloris>
                            </div>
                            <div class="form-group">
                                <label>Sidebar child : </label>
                                <input id="sidebar_active_bg" name="sidebar_active_bg" type="text" data-coloris>
                            </div>
                            <div class="form-group">
                                <label>Navbar Hover : </label>
                                <input id="nav_item_hover" name="nav_item_hover" type="text" data-coloris>
                            </div>
                            <div class="form-group">
                                <label>Sidebar Bg : </label>
                                <input id="sidebar_bg_color" name="sidebar_bg_color" type="text" data-coloris>
                            </div>
                            <div class="form-group">
                                <label>Sidebar Header Bg : </label>
                                <input id="sidebar_header_bg" name="sidebar_header_bg" type="text" data-coloris>
                            </div>
                            <div class="form-group">
                                <label>Content Wrapper Bg : </label>
                                <input id="content_wrapper_bg_color" name="content_wrapper_bg_color" type="text"
                                    data-coloris>
                            </div>
                            <div class="form-group">
                                <label>Navbar Bg : </label>
                                <input id="navbar_bg" name="navbar_bg" type="text" data-coloris>
                            </div>



                            <x-coloris id="progress_bar" label="Progress Bar : "></x-coloris>

                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card-body">
                            <x-coloris id="btn_primary" label="Btn Primary : "></x-coloris>
                            <x-coloris id="btn_secondary" label="Btn Secondary : "></x-coloris>
                            <x-coloris id="btn_danger" label="Btn Danger : "></x-coloris>
                            <x-coloris id="btn_warning" label="Btn Warning : "></x-coloris>
                            <x-coloris id="btn_info" label="Btn Info : "></x-coloris>
                            <x-coloris id="btn_success" label="Btn Success : "></x-coloris>
                        </div>
                    </div>
                </div>

                <div class="card-header">
                    <h5>Setting Apps</h5>
                </div>
                <div class="card-body">
                  <div class="form-group">
                     <b>Fav Icon</b><br />
                     <img class="mr-3" src="{{ asset('img/'.Cache::store('styles')->get('fav_icon','img/logo_laravel.jpeg')) }}" width="50px" height="50px">
                     <input type="file" id="fav_icon" name="fav_icon">                   
                 </div>  
                 <div class="border-top my-3"></div>
                  <div class="form-group">
                        <b>Header Logo App</b><br />
                        <img class="mr-3" src="{{ asset('img/'.Cache::store('styles')->get('header_logo','img/logo_laravel.jpeg')) }}" width="50px" height="50px">
                        <input type="file" id="header_logo" name="header_logo">
                    </div>
                    <div class="border-top my-3"></div>
                    <div class="mt-3"></div>
                    <x-input id="app_name" name='app_name' placeholder='Header App Name' label='Header App Name'
                        required='false' />
                    <x-input id="footer_text" name='footer_text' placeholder='Footer Text' label='Footer Text'
                        required='false' /> 
                    <x-input id="footer_right" name='footer_right' placeholder='Footer Right' label='Footer Right'
                        required='false' />
                </div>
                <div class="card-footer">
                    <button id="btn_action" type="submit" class="float-right btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('plugins/coloris/coloris.min.js') }}"></script>
    <script>
        Coloris({
            themeMode: 'light',
            alpha: true,
        })

        data = @json($settingsArray);
        data.forEach(obj => {
            for (let key in obj) {
                const value = obj[key];
                console.log(`Key: ${key}, Value: ${value}`);
                $('#' + key).val(value)
            }
        })

        
    </script>
@endpush
