<div class="modal fade" id="modal_create_direct_permission">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Direct Permission To User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form autocomplete="off" id="form_create_direct_permission" method="POST">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                 <input hidden id="user_id" name="user_id" value="{{ $user->id }}" />
                                 <x-select2_multi id="permission" name='permission' label='Select Permission' required="true"
                                  placeholder='Select Permission'>
                                    @foreach ($permissions as $item)
                                        <option value='{{ $item->name }}'>{{ $item->name }}</option>
                                    @endforeach
                                </x-select2_multi>
                                  
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button id="btn_action" type="submit" class="float-right btn btn-primary">Save</button>

                </div>
            </form>
        </div>
    </div>
</div>
