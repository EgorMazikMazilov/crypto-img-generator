"use strict";

$(document).ready(function ($) {

        /*AJAX SEND MAIL*/

    $('.btnMargin').click( function (e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '/sendmail',
            data: $('#contactForm').serialize(),
            success: function(result){
                console.log(result);
                $( "#msgSubmit").removeClass( "hidden");
                $('.btnMargin').attr("disabled","disabled");
                dataLayer.push({'event': 'Order'});
                setTimeout(function () {
                    $(".close").trigger('click');

                }, 3000); // время в мс

            },
            error: function (result) {
                $( "#msgError").removeClass( "hidden");
            }

        });
    });

    /*send from scrollup*/
    $('.scrollUpBtn').click( function (e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '/callme',
            data: $('#contactForm1').serialize(),
            success: function(result){
                console.log(result);
                $( "#msgSubmit1").removeClass( "hidden");
                $('.scrollUpBtn').attr("disabled","disabled");
                dataLayer.push({'event': 'Order'});
                setTimeout(function () {
                    $(".close").trigger('click');
                }, 3000); // время в мс

            },
            error: function (result) {
                $( "#msgError1").removeClass( "hidden");
            }

        });
    });

    /*SEARCH*/
    /*select search*/

    /*when type search*/
    // $("#brand").keyup(function(){
    //
    //     var token = $('input[name=_token]').val();
    //     //console.log(token);
    //     var search = $("input#brand").val();
    //     //console.log(search);
    //     $.ajax({
    //         type: "POST",
    //         url: "/search",
    //         dataType: "JSON",
    //         data: {
    //             "search": search,
    //             "_token": token,
    //         },
    //
    //         cache: false,
    //         success: function(response){
    //             console.log(response);
    //
    //              var parsResponse = response;
    //              var render = '';
    //              $.each(parsResponse, function (key,val){
    //
    //                  //console.log(val.id);
    //
    //                  render += "<div class='autocomplete-suggestion' data-index='"+val.id+"' data-name='"+val.title+"'><strong>"+val.title+"</strong></div>"
    //              })
    //             $("#resSearch").html(render);
    //
    //         }
    //     });
    //     return false;
    // });

/*next step when word*/
    var parentId = 0;
    $("#brand1").change(function () {


        var parentName =  $("#brand1 :selected").attr('data-name');
        //console.log(parentName);
        parentId =  $("#brand1 :selected").attr('data-index');
       // console.log(parentId);

        $("#brand").val(parentName);
        $("#brand_id").val(parentName);

        $('#resSearch').html('');

        var token = $('input[name=_token]').val();
        // console.log(token);
        var search = parentId;
        //console.log(search);
        $.ajax({
            type: "POST",
            url: "/searchNext",
            dataType: "JSON",
            data: {
                "search": search,
                "_token": token,
            },

            cache: false,
            success: function(response){
                //console.log(response);

                var parsResponse = response;
                var render = '';
                $.each(parsResponse, function (key,val){

                    //console.log(val.alias);

                    render += "<div class='autocomplete-suggestion2' data-index='"+val.id+"' data-alias='"+val.alias+"'data-name='"+val.title+"'><strong>"+val.title+"</strong></div>"
                })
                $("#resSearch2").html(render);

            }
        });
        return false;

    })


    /*next step when type*/
    // var parentId = 0;
    // $('#resSearch').on('click', '.autocomplete-suggestion', function () {
    //
    //     var parentName =  $(this).attr('data-name');
    //     console.log(parentName);
    //     parentId =  $(this).attr('data-index');
    //     console.log(parentId);
    //
    //     $("#brand").val(parentName);
    //     $("#brand_id").val(parentName);
    //
    //     $('#resSearch').html('');
    //
    //     var token = $('input[name=_token]').val();
    //    // console.log(token);
    //     var search = parentId;
    //     //console.log(search);
    //     $.ajax({
    //         type: "POST",
    //         url: "/searchNext",
    //         dataType: "JSON",
    //         data: {
    //             "search": search,
    //             "_token": token,
    //         },
    //
    //         cache: false,
    //         success: function(response){
    //             //console.log(response);
    //
    //             var parsResponse = response;
    //             var render = '';
    //             $.each(parsResponse, function (key,val){
    //
    //                 //console.log(val.alias);
    //
    //                 render += "<div class='autocomplete-suggestion2' data-index='"+val.id+"' data-alias='"+val.alias+"'data-name='"+val.title+"'><strong>"+val.title+"</strong></div>"
    //             })
    //             $("#resSearch2").html(render);
    //
    //         }
    //     });
    //     return false;
    //
    // })
    /*3 level of search*/

    $('#resSearch2').on('click', '.autocomplete-suggestion2', function () {

        var parentName = $(this).attr('data-name');
        var parentId = $(this).attr('data-index');
        var parentI = $(this).attr('data-alias');

        //console.log(parentId);

        $("#model").val(parentName);
        $("#model_id").val(parentI);

        $('#resSearch2').html('');

        var token = $('input[name=_token]').val();
        //console.log(token);

        var search = parentId;
        console.log(search);
        $.ajax({
            type: "POST",
            url: "/searchNextLevel",
            dataType: "JSON",
            data: {
                "search": search,
                "_token": token,
            },

            cache: false,
            success: function(response){
                //console.log(response);

                var parsResponse = response;
                var render = '';
                $.each(parsResponse, function (key,val){

                    //console.log(val.alias);

                    render += "<div class='autocomplete-suggestion3' data-index='"+val.id+"' data-name='"+val.title+"' data-alias='"+val.alias+"'><strong>"+val.title+"</strong></div>"
                })
                $("#resSearch3").html(render);

            }
        });
        return false;

    });
    $('#resSearch3').on('click', '.autocomplete-suggestion3', function () {
        var parentName = $(this).attr('data-name');

        var parentI = $(this).attr('data-alias');


        //console.log(parentId);
        $("#body").val(parentName);
        $("#body_id").val(parentI);

        $('#resSearch3').html('');
    });


    /*SCROLL-UP*/

    $("#phone").inputmask({"mask":"+38 (999) 999-99-99"});
    $(".phoneMask").inputmask({"mask":"+38 (999) 999-99-99"});
});


    $('#blfix .close').bind('click',function(){
        $(this).parent().remove();
    });



jQuery(function(f){
    var element = f('#blfix');
    f(window).scroll(function(){
        element['fade'+ (f(this).scrollTop() > 3600 ? 'In': 'Out')](264);
    });
});
