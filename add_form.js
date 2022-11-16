$(document).ready(function() {

    // $('.slick-slider').slick({
    //     dots: true,
    //     infinite: false,
    //     speed: 300,
    //     slidesToShow: 4,
    //     slidesToScroll: 4,
    //     responsive: [
    //       {
    //         breakpoint: 1024,
    //         settings: {
    //           slidesToShow: 3,
    //           slidesToScroll: 3,
    //           infinite: true,
    //           dots: true
    //         }
    //       },
    //       {
    //         breakpoint: 600,
    //         settings: {
    //           slidesToShow: 2,
    //           slidesToScroll: 2
    //         }
    //       },
    //       {
    //         breakpoint: 480,
    //         settings: {
    //           slidesToShow: 1,
    //           slidesToScroll: 1
    //         }
    //       }
    //       // You can unslick at a given breakpoint now by adding:
    //       // settings: "unslick"
    //       // instead of a settings object
    //     ]
    // });
    // //Datetimepicker
    // $('#id_date_birth').datetimepicker({
    //     dayNamesMin: [ "Di", "Lu", "Ma", "Me", "Je", "Ve", "Sa" ]
      
    // });

    var valid;
    

    //Fill inputs
    //Validation

    $('#form-register').on('submit', function(e){

        var user_data;
        console.log('Submited')
      // validation code here
        // if(!valid) {
        // e.preventDefault();
        // }

        //if Validated
        $.ajax({
            url : 'urltoAjax',
            method : "POST",
            data : user_data,
            dataType : 'json',
            
            error : function(){
                console.log("Custom error ");
            },
            success : function(){
                console.log("Success ");
            },
            complete : function(){
                console.log("complited");
            }
        })
    });
});