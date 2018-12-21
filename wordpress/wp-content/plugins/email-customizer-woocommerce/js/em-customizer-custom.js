
    // $('select').select2();

jQuery(document).ready(function() {
   $('select').select2();



$('.template-choose-select').select2({

   "language": {
       "noResults": function(){
           return "<a href='#' class='em-link-text'>Create Template</a>";
       }
   },
    escapeMarkup: function (markup) {
        return markup;
    }
});




});


