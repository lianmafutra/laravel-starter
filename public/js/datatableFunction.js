
window._datatableButton = function (datatable, tableOptions, cacheSettings) {
   Object.assign(tableOptions, {
      dom: "<'row' <'col-sm-12 col-md-1'l>  <'col-sm-12 col-md-5'B> <'col-sm-12 col-md-6'f> >" +
         "<'row'<'col-sm-12'tr> >" +
         "<'row' <'col-sm-12 col-md-5' i> <'col-sm-12 col-md-7 text-right'p> >",
      initComplete: function () {
         $('body').find('.dataTables_scrollBody').addClass("scrollbar");
      },
      buttons: {
         dom: {
            button: {
               className: 'btn btn-sm btn-default'
            }
         },
         "buttons": cacheSettings,
      },
   });
}

window._datatableFixed = function (datatable, tableOptions, cacheLeft, cacheRight) {
   Object.assign(tableOptions, {
      fixedColumns: {
         leftColumns: cacheLeft,
         rightColumns: cacheRight
      },
   });

   datatable.DataTable(tableOptions);

}


