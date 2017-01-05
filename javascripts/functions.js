$(document).ready(function(){

    $(".add-more").on('click', function(){
        $('.videos').append('<br><input name="videos[]" type="file" class="form-control">');
    });

    var valSelect = $('select[name="type"]').val();
    if(valSelect == 0){
        $('.to-hide').hide();
    }
    else{
        $('.to-hide').show();
    }

    $('select[name="type"]').on('change', function(){
        var value = $(this).val();
        if(value == 0){
            $('.to-hide').hide();
        }
        else{
            $('.to-hide').show();
        }
    });


});
