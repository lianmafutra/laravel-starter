@extends('admin.layouts.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('plugins/flatpicker/flatpickr.min.css') }}">

    <link href="{{ asset('plugins/filepond/filepond.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugins/filepond/filepond-plugin-image-preview.css') }} " rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('template/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('template/admin/plugins/summernote/summernote-bs4.min.css') }}">
@endpush
@section('header')
    <x-header title="Sample Crud"></x-header>
@endsection
@section('content')
    <div class="col-lg-8 col-sm-12">
        <form id="form_sample">
            @csrf
            <div class="card">
                <div class="card-header">
                    Data
                </div>
                <div class="card-body">
                    <x-input label="Book Titte" id="title" info="Info : Sample Data Description Info"
                        placeholder="Book Name" />
                    <x-textarea id="desc" label="Short Description" placeholder="Description" />
                    <x-select2 id="category_id" label="Category" placeholder="Select Category">
                        <option value="fiction">Fiction</option>
                        <option value="biography">Biography</option>
                    </x-select2>
                    <x-select2 id="category_multi_id" name="category_multi_id[]" label="Category Multiple"
                        placeholder="Select Category" multiple>
                        <option value="fiction">Fiction</option>
                        <option value="biography">Biography</option>
                    </x-select2>

                    <x-select-days id="days" label="Select Days" placeholder="Select Days" />
                    <x-select-month id="month" label="Select Month" placeholder="Select Month" />
                    <x-date-picker-column label="Date Range Column">
                        <x-slot:date_start>
                            <x-datepicker id='start_date' label='Start Date' />
                        </x-slot:date_start>
                        <x-slot:date_end>
                            <x-datepicker id='end_date' label='End Date' />
                        </x-slot:date_end>
                    </x-date-picker-column>
                    <x-datepicker id="date_publisher" label="Date Publisher" />
                    <x-datepicker id='date_range' label='Deadline Range' />
                    <x-timepicker id="time" label="Time Publisher" placeholder="Time" />
                    <x-input-rupiah id="price" label="Price" />
                    <x-input-password id="password" placeholder="Password" label="Password" />
                    <x-input-phone id="contact" label="Contact Number" placeholder="Nomor Telepon Aktif" />
                    <x-check-box label="Checkbox Select">
                        <x-checkbox.item id="check_ya" name="check" text="Option 1" type="checkbox"></x-checkbox.item>
                        <x-checkbox.item id="check_tidak" name="check" text="Option 2" type="checkbox"></x-checkbox.item>
                    </x-check-box>
                    <x-check-box label="Radio Button Select">
                        <x-checkbox.item id="radio_1" name="check" text="Ya" type="radio" color="primary">
                        </x-checkbox.item>
                        <x-checkbox.item id="radio_2" name="check" text="Tidak" type="radio" color="primary">
                        </x-checkbox.item>
                    </x-check-box>
                    <x-filepond id="file_cover" label='File Cover' info='( Format File JPG/PNG , Maks 5 MB)' />
                    <x-summernote id="summernote" label="Summenote Editor">
                        Place <em>some</em> <u>text</u> <strong>here</strong>
                    </x-summernote>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn_submit btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('js')
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>

    <script src="{{ asset('template/admin/plugins/summernote/summernote-bs4.min.js') }}"></script>

    {{-- currency format input --}}
    <script src="{{ asset('plugins/autoNumeric.min.js') }}"></script>

    {{-- flatcpiker format date input --}}
    <script src="{{ asset('plugins/flatpicker/flatpickr.min.js') }}"></script>
    <script src="{{ asset('plugins/flatpicker/id.min.js') }}"></script>

    {{-- filepond --}}
    <script src="{{ asset('plugins/filepond/filepond.js') }}"></script>
    <script src="{{ asset('plugins/filepond/filepond-plugin-file-metadata.js') }}"></script>
    <script src="{{ asset('plugins/filepond/filepond-plugin-file-encode.js') }}"></script>
    <script src="{{ asset('plugins/filepond/filepond-plugin-file-validate-type.js') }}"></script>
    <script src="{{ asset('plugins/filepond/filepond-plugin-file-validate-size.js') }} "></script>
    <script src="{{ asset('plugins/filepond/filepond-plugin-image-preview.js') }}"></script>

    {{-- password toggle show/hide --}}
    <script src="{{ asset('plugins/toggle-password.js') }}"></script>

    {{-- masking input currency,date input --}}
    <script src="{{ asset('plugins/jquery.mask.min.js') }}"></script>

    <script>
        $(function() {

       

            $('.select2bs4').select2({
                theme: 'bootstrap4',
            })


            AutoNumeric.multiple('.rupiah', {
                digitGroupSeparator: '.',
                decimalPlaces: 0,
                minimumValue: 0,
                decimalCharacter: ',',
                formatOnPageLoad: true,
                allowDecimalPadding: false,
                alwaysAllowDecimalCharacter: false
            });

            const date_publisher = flatpickr("#date_publisher", {
                allowInput: true,
                defaultDate: ''
            });

            const start_date = flatpickr("#start_date", {
                allowInput: true,
                defaultDate: ''
            });

            const end_date = flatpickr("#end_date", {
                allowInput: true,
                defaultDate: ''
            });

            const time = flatpickr("#time", {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true
            });


            const date_range = $("#date_range").flatpickr({
                allowInput: true,
                mode: "range",
                onChange: function(dates, dateStr, instance) {
                    if (dates.length == 2) {
                        let dateStart = instance.formatDate(dates[0], "Y-m-d");
                        let dateEnd = instance.formatDate(dates[1], "Y-m-d");
                    }
                }
            })

            $('#date_publisher').mask('00/00/0000');
            $('#contact').mask('0000-0000-000000');

            FilePond.registerPlugin(
                FilePondPluginFileEncode,
                FilePondPluginImagePreview,
                FilePondPluginFileValidateType,
                FilePondPluginFileValidateSize)

            FilePond.create(document.querySelector('#file_cover'), {
                storeAsFile: true
            });

            $('#summernote').summernote({
                lang: 'fr-FR',
                height: 200,
                imageTitle: {
                    specificAltField: true,
                },
                popover: {
                    image: [
                        ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                        ['float', ['floatLeft', 'floatRight', 'floatNone']],
                        ['remove', ['removeMedia']],
                        ['custom', ['imageTitle']],
                    ],
                },
            })
        })

        $('#form_sample').submit(function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: route('sample-crud.store'),
                data: formData,
                contentType: false,
                processData: false,
                dataType: 'json',
                beforeSend: function() {
                    _showLoading()
                },
                success: (response) => {
                    if (response) {
                        this.reset()
                        _alertSuccess(response.message)
                    }
                },
                error: function(response) {
                    _showError(response)
                }
            })
        })
    </script>
@endpush
