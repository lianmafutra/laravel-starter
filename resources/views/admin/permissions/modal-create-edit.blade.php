<x-modal title="" id="modal_create_edit" size="md">
    <form id="form_create_edit_permission">
        @csrf
        <div class="modal-body">
            <input hidden name="permission_id">
            <input hidden name="permission_group_id">
            <x-input name='name' placeholder='Permission Name' label='Permission Name' required='true' />
            <x-input name='desc' placeholder='Permission Description' label='Description' required='false' />

            @isset($groupIndex)
                <x-select2 id="permission_group_id" name='permission_group_id' label='Select group' required="true"
                    placeholder='Select group'>
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
