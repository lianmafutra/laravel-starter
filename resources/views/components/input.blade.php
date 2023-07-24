<div class="form-group">
   <label>{{ $label }}
      @if ($attributes['required'] == 'true')
          <span style="color: red">*</span>
      @endif
  </label>
    <input {{ $id ?? ""}} spellcheck="false" type="text" class="form-control input" name={{ $name }} {{ $attributes }}>
    <small style="font-style: italic"> {{ $info }}</small>
    <span class="text-danger error error-text {{ $id ?? ""}}_err"></span>
</div>
