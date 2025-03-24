jQuery(document).ready(function($) {
    // Tilføj produkt til kurv
    $(document).on('click', '.add-to-cart', function() {
        const productId = $(this).data('id');
        
        $.ajax({
            url: shop_vars.ajax_url,
            type: 'POST',
            data: {
                action: 'add_to_cart',
                product_id: productId
            },
            success: function(response) {
                if (response.success) {
                    addProductToCart(response.data);
                } else {
                    alert('Fejl: ' + response.data);
                }
            }
        });
    });
    
    // Tilføj produkt til kurv visning
    function addProductToCart(product) {
        let cartItem = $('.cart-item[data-id="' + product.id + '"]');
        
        if (cartItem.length) {
            // Opdater antal hvis produkt allerede er i kurven
            let quantity = parseInt(cartItem.find('.quantity').text()) + 1;
            cartItem.find('.quantity').text(quantity);
        } else {
            // Tilføj nyt produkt til kurven
            $('#cart-items').append(`
                <div class="cart-item" data-id="${product.id}">
                    <h4>${product.name}</h4>
                    <p>${product.price} kr x <span class="quantity">1</span></p>
                    <button class="remove-item" data-id="${product.id}">Fjern</button>
                </div>
            `);
        }
        
        updateCartTotal();
    }
    
    // Fjern produkt fra kurv
    $(document).on('click', '.remove-item', function() {
        $(this).parent().remove();
        updateCartTotal();
    });
    
    // Opdater total beløb
    function updateCartTotal() {
        let total = 0;
        
        $('.cart-item').each(function() {
            const price = parseFloat($(this).find('p').text().split(' kr')[0]);
            const quantity = parseInt($(this).find('.quantity').text());
            total += price * quantity;
        });
        
        $('#cart-total-amount').text(total);
    }
});