(function() {

    $(".dropzone").dropzone({
        url: 'ajax-file.php',
        margin: 20,
        params:{
            'action': 'save'
        },
        success: function(res, index){
            console.log(res, index);
        }
    });

}());
