<x-modal title="Create Group Permission" id="modal_edit_create_group" size="md">
      <form id="form_create_group">
         @csrf
         <div class="modal-body">
             <x-input id='name' placeholder='Group Permission Name' label='Group Name' 
             required='true' />
             <x-input id='desc' placeholder='Description Group Permission' label='Desc' 
             required='false' />
         </div>
         <div class="modal-footer">
            <button data-dismiss="modal" type="button" class="btn btn-secondary">Cancel</button>
            <button type="submit" class="btn_submit btn btn-primary">Save</button>
        </div>
     </form>
</x-modal>

