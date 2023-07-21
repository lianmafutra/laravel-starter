<div class="form-group">
    <label>{{ $label }}
        @if ($required == 'true')
            <span style="color: red">*</span>
        @endif
    </label>
    <input id="{{ $id }}" class="form-control input input-number" name="{{ $id }}" type='number' placeholder=""
        value="" placeholder="{{ $placeholder }}"  @if ($required == 'true') required @endif>
    <span class="text-danger error error-text {{ $id }}_err"></span>
</div>
<script>
     
     document.getElementById(@json($id)).placeholder = @json($placeholder);
   </script>
