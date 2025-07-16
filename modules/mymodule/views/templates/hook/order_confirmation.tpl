<h3>Products in your order:</h3>
<ul>
{foreach from=$products item=product}
    <li>{$product.name}</li>
{/foreach}
</ul>
