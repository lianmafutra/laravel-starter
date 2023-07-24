<script src="//cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap4.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
@foreach (Cache::store('styles')->get('action_button') as $item)
    @switch($item)
        @case('copy')
        @break

        @case('csv')
        @break

        @case('excel')
        
        @break

        @case('pdf')
            <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        @break

        @case('print')
            <script src="//cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
        @break

        @case('colvis')
            <script src="//cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
        @break

        @default
    @endswitch
@endforeach
