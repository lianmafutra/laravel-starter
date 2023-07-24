<div class="form-group">
   <label>{{ $label }}</label>
   <div class="input">
       <textarea id="{{ $id }}" name="{{ $name }}"> 
         {{ $slot }}
    </textarea>
   </div>
</div>