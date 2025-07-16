
{foreach from=$products item=product}
    <div class="product-category">
        Subcategory: {$productCategories[$product.id_product]}
    </div>
{/foreach}