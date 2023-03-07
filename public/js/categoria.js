$(document).ready(function(){
     $(document).on("submit","#categoria", function(e){
        e.preventDefault();
        // alert("bem vindo ao ajax")
        $.ajax({
            url: 'php/addCategoria.php',
            method: 'POST',
            data: new FormData(this), 
            contentType: false,
            cache: false,
            processData: false,
        }).done(function(data){
             $(".resp").html(data)
            // alert(data)
        })
     })


     $(document).on("change","#var", function(e){
        e.preventDefault();
        // alert("bem vindo")
        const id = $(this).val();
        // alert("bem vindo ao ajax")
        $.ajax({
            url: 'php/tabelaCat.php',
            method: 'POST',
            data:  {
                id:id
            }
        }).done(function(data){
            $(".tab").html(data)
            
        })
     })

    //  tabela
    $.ajax({
        url: 'php/tabelaCat.php',
        method: 'GET',
    }).done(function(data){
         $(".tab").html(data)
        // alert(data)
    })

    // // get add categoria
    // var url = $("url").val();
    // alert(url)
    // $.ajax({
    //     url: 'php/update.php',
    //     method: 'GET',
    //     data:  {
    //         url:url
    //     }
    // }).done(function(data){
    //     $(".resp").html(data)
        
    // })
})
