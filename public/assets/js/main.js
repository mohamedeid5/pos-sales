$(document).ready(function(){
    $('#has_retailunit').change(function (){
        if ($('#uom_id').val() == '') {
            alert('choose uom first')
            $('#has_retailunit').val('');
            return false;
        }

        if ($(this).val() == 1) {
            $('.related_retail').show();
        } else {
            $('.related_retail').hide();
        }


    });


    $('#uom_id').change(function (){
        if ($(this).val()) {
            var selectedOption = $('option:selected', this);
            var selectedValue = selectedOption.text();

            $('.parent_uom_name').text('for (' + selectedValue + ')');
            $('.parent_price').text('for (' + selectedValue + ')');
            $('.related_parent_price').show();
        } else {
            $('.parent_uom_name').text('');
            $('.related_parent_price').hide();
        }
    });


    $('#retail_uom_id').change(function () {
        if ($(this).val()) {
            var selectedOption = $('option:selected', this);
            var selectedValue = selectedOption.text();

            $('.retail_price').text('for (' + selectedValue + ')');
            $('.related_retail_price').show();

        } else {
            $('.retail_price').text('');
            $('.related_retail_price').hide();

        }
    });


    $('#image').change(function () {
       var reader = new FileReader();

       reader.onload = function (e) {
           $('#preview').attr('src', e.target.result);
           $("#preview").show();
       }
        reader.readAsDataURL($(this)[0].files[0]);
    });


    $('#is_parent').change(function (){
        var selectedOption = $('option:selected', this);

       if(selectedOption.val() == 0) {
           $('#parent_account').show()
       } else if(selectedOption.val() == 1){
           $('#parent_account').hide()
       }
    });



    // validation
/*

    $('form').on('keyup change', function() {
        $(this).validate({
            rules: {
                name: {
                    required: true,
                    minlength: 5,
                    maxlength: 50,
                 //   pattern: /^[a-zA-Z\s]+$/
                }
            },
            messages: {
                name: {
                    required: "Please enter your name",
                    minlength: "Your name must be at least 5 characters long",
                    maxlength: "Your name cannot be longer than 50 characters",
                    pattern: "Your name can only contain letters and spaces"
                }
            },
            highlight: function(element) {
                $(element).addClass('error').removeClass('valid');
            },
            unhighlight: function(element) {
                $(element).addClass('valid').removeClass('error');
            }

        });
    });
*/

});
