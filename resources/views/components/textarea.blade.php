<div class="form-group">
   <label>{{ $label }}
      @if ($attributes['required'] == 'true')
          <span style="color: red">*</span>
      @endif
  </label>
    <textarea id="{{ $id }}" name="{{ $name }}" class="form-control" rows="3"
       {{ $attributes }}></textarea>
</div>
