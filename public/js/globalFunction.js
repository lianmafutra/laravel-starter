//   reset form input value on modal
window._clearInput = function () {
   $('.modal').find('.input').val('')
   $('.modal').find('.error').hide()
   $('.modal').find('form').trigger("reset")
   $('.modal').find('.select2').val(null).trigger("change")
   if ($(".filepond")[0]) {
      let filePond = FilePond.find(document.querySelector('.filepond'));
      if (filePond != null) {
         filePond.removeFiles();
      }
   }
}

// filepond

window._getFilepond = function (source, load) {
   let filePond = FilePond.find(document.querySelector('.filepond'));
   if (filePond != null) {
      let request = new XMLHttpRequest();
      request.open('GET', source);
      request.responseType = "blob";
      request.onreadystatechange = () => request.readyState === 4 && load(request
         .response);
      request.send();
   }

}
function printErrorMsg(msg) {



   let error = [];
   let error_array = [];

   $.each(msg, function (key, value) {

      $('.text-danger').each(function () {
         let id = $(this).attr("class").split(" ").pop()
            .slice(0, -4)
         error.push(id)

      });

      baru = key.replace(/\.0$/, '');

      error_array.push(baru)
      $('.' + baru + '_err').text(JSON.stringify(value[0]).replace(/\.0/g, ''));
      $('.' + baru + '_err').show();

   });



   $([document.documentElement, document.body]).animate({
      scrollTop: $("#" + error_array[0])
   });
   let uniqueChars = [...new Set(error)];
   getDifference(uniqueChars, error_array).forEach(element => {
      $('.' + element + '_err').hide();
   });
}

function getDifference(a, b) {
   return a.filter(element => {
      return !b.includes(element);
   });
}

window._showError = function (response) {
   setTimeout(function () {
      $('.error').hide();
      swal.hideLoading()
      let text = '';
      if (response.status == 422) {

         printErrorMsg(response.responseJSON.errors);
         text = "Periksa kembali inputan anda"
      }
      if (response.status == 400) {
         text = response.responseJSON.message
         $('.error-text').hide();
      }

      Swal.fire({
         icon: 'error',
         title: 'Terjadi Kesalahan...',
         text: text,
      }).then(
         result => {
            if (result.value) {

            }
         }
      );
   }, 500);


}

window._showLoading = function (title = 'Processing', message = 'Please Wait...') {
   Swal.fire({
      title: title,
      html: message,
      timer: 2000,
      allowEscapeKey: false,
      allowOutsideClick: false,
      didOpen: () => {
         Swal.showLoading()
      }
   })
}


window._showLoading = function (title = 'Processing', message = 'Please Wait...') {
   Swal.fire({
      title: title,
      html: message,
      timer: 2000,
      allowEscapeKey: false,
      allowOutsideClick: false,
      didOpen: () => {
         Swal.showLoading()
      }
   })
}
window._hideLoading = function (title = 'Processing', message = 'Please Wait...') {
   Swal.close()
}



// flatpicker config default 
if (typeof flatpickr !== "undefined") {
   flatpickr.setDefaults({
      dateFormat: "d/m/Y",
      locale: "id",
      disableMobile: "true",
   })
}


// dropdown datatable handle UI
$('.custom-datatable').on('show.bs.dropdown', function (e) {
   dropdownMenu = $(e.target).find('.dropdown-menu');
   $('body').append(dropdownMenu.detach());
   var eOffset = $(e.target).offset();
   return 0;
   dropdownMenu.css({
      'display': 'block',
      'top': eOffset.top + $(e.target).outerHeight(),
      'left': eOffset.left - 50
   });
})

// autonumeric currency format
const rupiah = (number) => {
   return new Intl.NumberFormat("id-ID", {
      style: "currency",
      currency: "IDR",
      maximumFractionDigits: 0,
      minimumFractionDigits: 0,
   }).format(number);
}

// select2

// fix problem with select2 multiple not show placeholder
$('.select2-search__field').css('width', '100%');

// set auto focus select2
$(document).on('select2:open', function (e) {
   document.querySelector('[aria-controls="select2-' + e.target.id + '-results"]').focus();
})

//   others
$('.loader_custom').addClass('spinner');

$('.modal-ajax').on('show.bs.modal', function () {
   $('.modal-loading').show();
})

$(document).ajaxSuccess(function (event, xhr, settings) {
   setTimeout(() => {
      if ($('.modal-ajax').is(':visible')) {
         $('.modal-loading').hide();
      }
   }, 1000);
})