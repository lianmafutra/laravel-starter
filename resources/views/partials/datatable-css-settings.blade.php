@if (Cache::store('styles')->get('fixed_action'))
        <link rel="stylesheet" href="{{ asset('plugins/datatable/fixedColumns.dataTables.min.css') }}">
@endif
