<div class="form-group">
    <label>{{ $label }}
        @if ($required == 'true')
            <span style="color: red">*</span>
        @endif
    </label>
    <input spellcheck="false" type="text" class="form-control input" value="{{ $value }}"
        @if ($id != '') 
         id="{{ $id }}"
         name="{{ $id }}"
         @else
         name="{{ $name ?? '' }}" @endif
        @if ($required == 'true') required @endif {{ $attributes }}>
    <small style="font-style: italic"> {{ $info ?? '' }}</small>
    <span class="text-danger error error-text {{ $id }}_err"></span>
</div>
