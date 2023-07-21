 <div class="form-group">
        <div class="bd-highlight">
            <label>{{ $label }}
                @if ($required == 'true')
                    <span style="color: red">*</span>
                @endif
            </label>
            <div style="padding: 0 !important; " class="input-group ">
                <input style="width: 80%" id="{{ $id }}"  @if ($required == 'true') required @endif autocomplete="off" name="{{ $id }}"
                    class="form-control tanggal" type="text" placeholder="Tanggal/Bulan/Tahun" data-input>
                <div class="input-group-append">
                    <div class="input-group-text"><i class="fa fa-calendar"></i>
                    </div>
                </div>
            </div>
        </div>
        <span class="text-danger error-text {{ $id }}_err"></span>
    </div>
