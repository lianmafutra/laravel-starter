(function ($) {
   "use strict"; $('.input100').each(function () {
      $(this).on('blur', function () {
         if ($(this).val().trim() != "") { $(this).addClass('has-val'); }
         else { $(this).removeClass('has-val'); }
      })
   })
   var input = $('.validate-input .input100'); $('.validate-form').on('submit', function () {
      var check = true; for (var i = 0; i < input.length; i++) { if (validate(input[i]) == false) { showValidate(input[i]); check = false; } }
      return check;
   });
   function showValidate(input) { var thisAlert = $(input).parent(); $(thisAlert).addClass('alert-validate'); }
   function hideValidate(input) { var thisAlert = $(input).parent(); $(thisAlert).removeClass('alert-validate'); }
})(jQuery);