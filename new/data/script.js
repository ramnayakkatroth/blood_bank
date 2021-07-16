$(document).ready(function() {
  var table = $('#example').DataTable( {
    lengthChange: false,
    buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
  } );

  // table.buttons().container() gives us the DOM element with buttons
  //  we append the container to a menu outside of the table
  //  and then add buttons vertical so the buttons appear vertically
  //  could easily change to make sidebar or really anything
  table.buttons().container()
    .appendTo( $('#buttons-menu') )
    .addClass('ui buttons vertical')
  
  // demonstrate how to change styling of buttons
  //   order of classes matter
  $('.ui.button', table.buttons().container())
    .addClass('basic primary')
} );