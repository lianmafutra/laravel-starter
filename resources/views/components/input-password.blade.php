<div class="form-group field" data-password-field>
    <label>{{ $label }}
        @if ($attributes['required'] == 'true')
            <span style="color: red">*</span>
        @endif
    </label>
    <div class="input-group mb-3 input_pass" id="{{ $id }}">
        <input autocomplete="new-password" name="{{ $name }}" type="password" class="form-control input"
            {{ $attributes }}>
        <div class="input-group-append">
            <span class="input-group-text"> <a class="password-btn" data-password-field-btn href=""
                    style="color: inherit"><i class="trigger fa fa-eye-slash" aria-hidden="true"></i></a></span>
        </div>
        <span style="font-size: 12px"
            class="password_err invalid-feedback text-danger error error-text {{ $id }}_err"></span>
    </div>
</div>
