<div class="form-group">
   <label>{{ $label }}
      @if ($attributes['required'] == 'true')
          <span style="color: red">*</span>
      @endif
  </label>
   <div class="input-group">
       <div class="input-group-prepend">
           <span class="input-group-text"><i class="fas fa-phone"></i></span>
       </div>
       <input id="{{ $id }}" name="{{ $name }}" type="text" class="form-control" {{ $attributes }}>
   </div>

</div>