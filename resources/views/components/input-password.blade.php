<div class="form-group">
    <label> <label>{{ $label }}
            @if ($required == 'true')
                <span style="color: red">*</span>
            @endif
        </label></label>
    <div class="input-group mb-3 input_pass" id="{{ $id }}">
        <input value="{{ $value }}" placeholder="{{ isset($placeholder) ? $placeholder : '' }}" autocomplete="new-password" @if ($required == 'true') required @endif {{ $value }} required
            name="{{ $id }}" type="password" class="form-control input">
        <div class="input-group-append">
            <span class="input-group-text"> <a href="" style="color: inherit"><i class="fa fa-eye-slash"
                        aria-hidden="true"></i></a></span>
        </div>
        <span style="font-size: 12px"
            class="password_err invalid-feedback text-danger error error-text {{ $id }}_err"></span>
    </div>
</div>
<script>
    $("#" + @json($id) + " a").on('click', function(event) {
        event.preventDefault()
        if ($('#' + @json($id) + ' input').attr("type") == "text") {
            $('#' + @json($id) + ' input').attr('type', 'password')
            $('#' + @json($id) + ' i').addClass("fa-eye-slash")
            $('#' + @json($id) + ' i').removeClass("fa-eye")
        } else if ($('#' + @json($id) + ' input').attr("type") == "password") {
            $('#' + @json($id) + ' input').attr('type', 'text')
            $('#' + @json($id) + ' i').removeClass("fa-eye-slash")
            $('#' + @json($id) + ' i').addClass("fa-eye")
        }
    })
</script>
