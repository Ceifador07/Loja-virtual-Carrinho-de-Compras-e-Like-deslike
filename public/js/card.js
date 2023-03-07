$(document).ready(function(){
       
    // Chamar os conteudos do carrinho
    function card(){
        $.ajax({
            url: 'public/classes/cardAJAX.php',
            method: 'GET',
        }).done(function(data){
            $(".tb").html(data)
            // alert(data)
        })
    }
    setInterval(card,2000);  
    


  

    // chamar as categorias do sistema
    $.ajax({
        url: 'public/classes/categoria.php',
        method: 'GET',
    }).done(function(data){
        $(".link").html(data)
        // alert(data)
    })


    // preco total do carrinho de compras 
    function PriceTotal(){
        $.ajax({
            url: 'public/classes/PriceTotal.php',
            method: 'GET',
        }).done(function(data){
            $(".total").html(data)
            // alert(data)
        })
    }
    setInterval(PriceTotal,2000);

    // Mostrar quantos itens tem no carrinho de compras 
    function ShowCard(){
        $.ajax({
            url: 'public/classes/ShowCard.php',
            method: 'GET',
        }).done(function(data){
            $(".ShowCard").html(data)
            // alert(data)
        })
    }
    setInterval(ShowCard,2000);


  
    // baixar a quantidade do produto adicionado ao carrinho
    $(document).on("click",".min",function(e){
        e.preventDefault()
        const id = $(this).attr("data-id")
        const preco = $(this).attr("id")
        var quantidade = $(this).attr("data-value");
        // alert(preco)
        $.ajax({
            url: 'public/classes/cart.php',
            method: 'POST',
            data: {
                quantidade: quantidade,
                id:id,
                preco:preco
            }
        }).done(function(data){
            // $(".link").html(data)
            // alert(data)
        })

    })

    // Aumentar a quantidade do produto adicionado ao carrinho
    $(document).on("click",".max",function(e){
        e.preventDefault()
        const id = $(this).attr("data-id")
        const preco = $(this).attr("id")
        var quantidade = $(this).attr("data-value");
        // alert(quantidade)
        $.ajax({
            url: 'public/classes/cart.php',
            method: 'POST',
            data: {
                quantidade: quantidade,
                id:id,
                preco:preco
            }
        }).done(function(data){
            // $(".link").html(data)
            // alert(data)
        })

        

    })

    
    $(document).on("click",".Excluir",function(e){
        e.preventDefault()
         var id = $(this).attr("data-id");
        //  alert(id)
        $.ajax({
            url: 'public/classes/DeletCart.php',
            method: 'POST',
            data: { id:id  }
        }).done(function(data){
            // $(".link").html(data)
            alert(data)
        })
        
    })  

    $(document).on("click",".ExcluirTudo",function(e){
        e.preventDefault()
          
        //  alert(id)
        $.ajax({
            url: 'public/classes/DeletCart.php',
            method: 'POST'
         
        }).done(function(data){
            // $(".link").html(data)
            alert(data)
        })
        
    })  
        
    
    $(".Prit").click(function(e){
        e.preventDefault()
        window.open("", "index", "width=700,height=600,left=400, right=100");
    })
    
})