(function () {
    $('#summernote').summernote({
        lang: 'ar-AR',
        width: 840,
        height: 450,
        destroyOnClose: true,
    });
});

$(document).ready(function(){
    $('#selectAllBoxes').click(function(event){
        if(this.checked){

            $('.checkBoxes').each(function(){
                this.checked = true;
            });
        }else{
                this.checked = false;
        }

    })
});

