@if (Cache::store('styles')->get('fixed_action'))
@push('js')

 
@endpush
@endif
<button type="button" class="float-right btn btn-tool btn_datatable_settings">Settings
    <i class="fas fa-cog"></i>
</button>

<x-modal class="modal_datatable_settings" title="Datatable Settings" size="sm">
    <form id="form_datatable_settings">
        @csrf
        @method('PUT')
        <div class="modal-body">
            <x-input label="Left Fixed Coloumn" id="left_fixed_action" info="Info : Separated with comma" />
            <x-input label="Right Fixed Coloumn" id="right_fixed_action" info="Info : Separated with comma" />
            <x-select2 id="action_button" name="action_button[]" label="Action Button"
                placeholder="Select Action Button" multiple>
                @foreach (['copy', 'csv', 'excel', 'pdf', 'print', 'colvis'] as $item)
                    <option value="{{ $item }}">{{ $item }}</option>
                @endforeach
            </x-select2>

        </div>
        <div class="modal-footer">
            <button data-dismiss="modal" type="button" class="btn btn-secondary">Cancel</button>
            <button type="submit" class="btn_submit btn btn-primary">Save</button>
        </div>
    </form>
</x-modal>


<script>
    $("#action_button").val(@json(Cache::store('styles')->get('action_button'))).change()
    $('.btn_datatable_settings').click(function(e) {
        e.preventDefault();
        $('.modal_datatable_settings').modal('show');
        $('#left_fixed_action').val(@json(Cache::store('styles')->get('left_fixed_action')));
        $('#right_fixed_action').val(@json(Cache::store('styles')->get('right_fixed_action')));
    });

    $("#form_datatable_settings").submit(function(e) {
        e.preventDefault()
        const formData = new FormData(this)
        $.ajax({
            type: 'POST',
            url: route('settings.datatable'),
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function() {
                _showLoading()
            },
            success: (response) => {
                if (response) {
                    $('.modal_datatable_settings').modal('hide')
                    window.location.reload()
                }
            },
            error: function(response) {
                _showError(response)
            }
        })
    })
</script>
