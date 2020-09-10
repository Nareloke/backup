$(document).ready(function() {
    jQuery.ajaxPrefilter(function(options) {
        if (options.crossDomain && jQuery.support.cors) {
            options.url = 'https://cors-anywhere.herokuapp.com/' + options.url;
        }
    })

    $(".quick-view").click(function() {
        let idButtonView    = $(this).attr('id');

        $.ajax ({
            url: "ProductPage",
            type: 'GET',
            datatype: 'JSON',
            success: function( envio ) {
                location.href = `ProductPage?id=${idButtonView}`
            }
        })
    })

    $(".add-to-cart").click(function() {
        try {
            let idProduct = $(this).attr('id');
            produtoDesejado = searchProductById(idProduct);

            jsonProduct = {};
            jsonProduct = jsonStringfyProduct(produtoDesejado);

            $.ajax ({
                url: "adicionarCarrinho",
                data: jsonProduct,
                type: 'POST',
                datatype: 'JSON',
                success: function( sucesso ) {
                    console.log(sucesso);
                    insertProductToCart(produtoDesejado);
                }, error: function ( erro ) {
                    alert("Não foi possível continuar com a solicitação. Tente novamente, mais tarde.");
                    console.error(erro);
                }
            })
        } catch (erro) {
            alert("Erro inesperado. Por favor, tente novamente mais tarde ou entre em contato conosco através do email: trabalhoRamos@ifsp.com.br");
            console.error(erro);
        }
    })

    $(".remove-from-cart").click(function() {
        try {
            let idProduct = $(this).attr('id');
            let divRemove = $(this).parent();
            $(divRemove).remove();

            produto = searchProductById(idProduct);
            jsonProduct = jsonStringfyProduct(produto);

            $.ajax ({
                url: "removerCarrinho",
                data: jsonProduct,
                type: 'POST',
                datatype: 'JSON',
                success: function( sucesso ) {
                    removeProductFromCart(produto);
                }, error: function ( erro ) {
                    alert("Não foi possível continuar com a solicitação. Tente novamente, mais tarde.");
                    console.error(erro);
                }
            })
        } catch (erro) {
            alert("Erro inesperado. Por favor, tente novamente mais tarde ou entre em contato conosco através do email: trabalhoRamos@ifsp.com.br");
            console.error(erro);
        }
    })

    $(".viewMesmaCategoria").click(function() {
        let categoria = $(this).children().html();
        $.ajax ({
            url: "mesmacategoria",
            type: 'GET',
            datatype: 'JSON',
            success: function( envio ) {
                location.href = `mesmacategoria?categoria=${categoria}`
            }
        })
    })

    $(".sort-by").click(function() {
        let ordenar = $(".select :selected").attr("value");
        let mostrar = $(".selectShow :selected").attr("value")

        $.ajax ({
            url: "index",
            type: 'GET',
            datatype: 'JSON',
            success: function( envio ) {
                location.href = `Products?order=${ordenar}`
            }
        })
    })
});

function sortByPrice(produtoA, produtoB){
    if (produtoA.preco < produtoB.preco)
        return -1 
    else if (produtoA.preco > produtoB.preco)
        return 1 
    else 
        return 0
}

function searchProductById(idProduct) {
    // produtos.forEach(element => {
    //     if ( element.id == idProduct ) {
    //         produtoDesejado = element;
    //     }
    // });

    produtoDesejado = produtos.find(x => x.id === idProduct);
    return produtoDesejado;
};

function jsonStringfyProduct(produtoDesejado) {
    let dici = {};
    dici["carrinho"] = JSON.stringify(produtoDesejado);
    return dici;
};

function useAjax(urlGettedByParameter, dataGettedByParameter, produtoDesejado) {

};

function insertProductToCart (produto) {
    let div = createDivCart(produto);

    $(".shopping-cart-list").append(div);

    updateCartPrice("add", produto);    
    updateCartSize("add", produto);
};

function createDivCart(product) {
    let div = `<div id="produtoID_${product.id}" class="product product-widget"><div class="product-thumb"><img src="${product.imagem}" alt=""></div><div class="product-body"><h3 class="product-price">${product.preco}</h3><h2 class="product-name"><a href="#">${product.nome}</a></h2></div><button id="${product.id}" class="remove-from-cart cancel-btn"><i class="fa fa-trash"></i></button></div>`
    return div;
}

function removeProductFromCart (produto) {
    var divsItensCarrinho       = $(".shopping-cart-list").children();
    var itemFiltrado            = $(divsItensCarrinho).filter(item(produto));
    $(itemFiltrado).remove();

    updateCartPrice("subtract", produto);    
    updateCartSize("subtract", produto);
};

function item(produto) { return $("#produtoID_" + produto.id) };

function updateCartPrice(toDo, produto) {
    var valorDoCarrinho = $("#totalCarrinho").html().trim();
    fValordoCarrinho    = parseFloat(valorDoCarrinho);

    var novoValorCarrinho = 0.00;
    fPrecoProduto = parseFloat(produto.preco);

    if (toDo == "add") {
        novoValorCarrinho   =  fValordoCarrinho + fPrecoProduto;
    } else {
        novoValorCarrinho   =  fValordoCarrinho - fPrecoProduto;
    }

    var n = novoValorCarrinho.toFixed(2);
    $("#totalCarrinho").html(n);
};

function updateCartSize(toDo, produto) {
    let quantidadeDeItensNoCarrinho     = $("#qtdd_carrinho").html();
    quantidadeDeItensNoCarrinho         = parseInt(quantidadeDeItensNoCarrinho);

    let novoValorCarrinho;
    if (toDo == "add") {
        novaQuantidadeDeItensNoCarrinho = quantidadeDeItensNoCarrinho + 1;
    } else {
        novaQuantidadeDeItensNoCarrinho = quantidadeDeItensNoCarrinho - 1;
    }
    $("#qtdd_carrinho").html(novaQuantidadeDeItensNoCarrinho);
};

function paginacao (comeco, fim) {
    for (let i=0; i < $(".produto").length; i++){
        if( i < comeco || i > fim)
            $($(".produto")[i]).hide()
        else
            $($(".produto")[i]).show()
    }
}
