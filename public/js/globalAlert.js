



const Toast = Swal.mixin({
   toast: true,
   position: 'top-end',
   showConfirmButton: false,
   timer: 3000,
   timerProgressBar: true,
   didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
   }
})

if (successSession) {
   Toast.fire({
      icon: 'success',
      title: successSession
   })
}

if (errorSession) {
   Toast.fire({
      icon: 'error',
      title: errorSession
   })
}

window._alertSuccess = function (title = 'Success') {
   Toast.fire({
      icon: 'success',
      title: title
   })
}


window._alertError = function (title = 'Error') {
   Toast.fire({
      icon: 'error',
      title: title
   })
}
