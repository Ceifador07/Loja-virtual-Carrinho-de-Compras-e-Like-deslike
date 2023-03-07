$(document).ready(function(){
    $("#Login").on('submit', function(e){
        e.preventDefault();
        // alert("bem vindo ao jquery")
        $.ajax({
            url: 'public/classes/login.php',
            method: 'POST',
            data: new FormData(this), 
            contentType: false,
            cache: false,
            processData: false,
        }).done(function(data){
             $(".resp").html(data)
        })
    })


    $(document).on('submit', '#registar',function(e){
        e.preventDefault();
        // alert("bem vindo ao jquery")
        $.ajax({
            url: 'php/cadastrar.php',
            method: 'POST',
            data: new FormData(this), 
            contentType: false,
            cache: false,
            processData: false,
        }).done(function(data){
             $(".resp").html(data)
        })
    })

    
})