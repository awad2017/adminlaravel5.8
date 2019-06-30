$(document).ready(function () {
    $('.sidebar-menu').tree();

    //icheck
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    });

    // // image preview
    $(".image").change(function () {

       if (this.files && this.files[0]) {
            var reader = new FileReader();

           reader.onload = function (e) {
            $('.image-preview').attr('src', e.target.result);
           }

            reader.readAsDataURL(this.files[0]);
        }
     });

    CKEDITOR.config.language =  "{{ app()->getLocale() }}";

});//end of ready
