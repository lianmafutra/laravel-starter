


<div class="form-group">
   <label> {{ $label }}
       @if ($required == 'true')
           <span style="color: red">*</span>
       @endif
   </label>
   <select id="{{ $id }}" multiple="multiple" name="{{ $id }}[]"  @if ($required == 'true') required @endif type=""
       class="select2 select2-{{ $id }} form-control select2bs4"
       data-placeholder="-- {{ $placeholder }} --" style="width: 100%;">
       {{ $slot }}
   </select>
   <span class="text-danger error-text {{ $id }}_err"></span>
</div>

