@extends('admin.layouts.master')
@push('css')
@endpush
@section('header')
    <x-header title="Permission"></x-header>
@endsection
@section('content')
    <div class="col-12">
        <div class="card">
            <form action="{{ route('role.update', $role->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <x-input placeholder="Role Name" id="name" label="Name" value="{{ $role->name }}"
                            required="true" />
                        <x-input placeholder="Role Description" id="desc" label="Description" required="false"
                            value="{{ $role->desc }}" />
                        <div class="form-group">
                            <label>Guard</label>
                            <select name="guard_name" class="form-control">
                                <option value="web">web</option>
                                <option value="api">api</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="border-top my-3"></div>
                <div class="card-body">
                    <div class="col-12">
                        <label>Permissions</label>
                    </div>
                    <div class="row">
                        @foreach ($data->get() as $item)
                            <div class="col-lg-3 col-md-6 col-sm-2">
                                <div class="card">
                                    <div style="font-weight: bold" class="card-header">
                                        <div class="d-flex">
                                            <h5 class=" mr-auto p-2">{{ $item->name }}</h5>
                                            <div class="p-0">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            @if ($role->name == 'superadmin')
                                                @foreach ($item->permissions as $item2)
                                                    <div class="custom-control custom-checkbox">
                                                        <input  checked disabled
                                                            class="custom-control-input" type="checkbox"
                                                            id="customCheckbox-{{ $item2->id }}"
                                                            value="{{ $item2->name }}" name="permissions[]">
                                                        <label for="customCheckbox-{{ $item2->id }}"
                                                            class="custom-control-label">{{ $item2->name }}</label>
                                                    </div>
                                                @endforeach
                                            @else
                                                @foreach ($item->permissions as $item2)
                                                    <div class="custom-control custom-checkbox">
                                                        <input @if (in_array($item2->name, $role->permissions->pluck('name')->toArray())) checked @endif
                                                            class="custom-control-input" type="checkbox"
                                                            id="customCheckbox-{{ $item2->id }}"
                                                            value="{{ $item2->name }}" name="permissions[]">
                                                        <label for="customCheckbox-{{ $item2->id }}"
                                                            class="custom-control-label">{{ $item2->name }}</label>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-primary float-right"> Update Permissions</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@push('js')
    <script>
        $(function() {})
    </script>
@endpush
