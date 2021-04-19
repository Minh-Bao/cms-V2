var ul_sortable = $('.sortable'); //setup one variable for sortable holder that will be used in few places

/*
* jQuery UI Sortable setup
*/
ul_sortable.sortable({revert: 100, placeholder: 'placeholder'});
ul_sortable.disableSelection();

/*
* Saving and displaying serialized data
*/
var btn_save = $('button.save'), // select save button
  div_response = $('.saved'); // response div

btn_save.on('click', function(e){ // trigger function on save button click
    e.preventDefault(); 
    var sortable_data = ul_sortable.sortable('serialize'); // serialize data from ul#sortable
    // alert(sortable_data);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $.ajax({ //ajax
          data: sortable_data,
          type: 'POST',
          url: 'http://localhost:8000/admin/ajax/sliderimage/sort.json', // save.php - file with database update
          success:function(result) {
              // alert (sortable_data);
              toastr.success("Ordre des photos enregistré");
          },
          error:function(result) {
            toastr.danger('Une erreur est survenue');
          }
      });      
});