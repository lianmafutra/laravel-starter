<x-modal title="Create New Permission" id="modal_create_multi" size="md">
    <form id="form_create_multi_permission">
        @csrf
        <div class="modal-body">
            <input hidden name="multi" value="">
            <input hidden name="permission_group_id">
            <x-input name='name' placeholder='create,edit,delete,update' label='Permission Name' required='true'
                info='Separate with Comma' />
            @isset($groupIndex)
                <x-select2 id="permission_group_id_multi"  label='Select group' required="true"
                    placeholder='Select group' name='permission_group_id'>
                    @foreach ($groupIndex as $item)
                        <option value='{{ $item->id }}'>{{ $item->name }}</option>
                    @endforeach
                </x-select2>
            @endisset
            <div class="form-group">
                <label>Guard</label>
                <select name="guard_name" class="form-control">
                    <option value="web">web</option>
                    <option value="api">api</option>
                </select>
            </div>

        </div>
        <div class="modal-footer">
            <button data-dismiss="modal" type="button" class="btn btn-secondary">Cancel</button>
            <button type="submit" class="btn_submit btn btn-primary">Save</button>
        </div>
    </form>
</x-modal>
