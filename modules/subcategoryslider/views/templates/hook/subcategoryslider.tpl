<div class="subcategory-slider-container">
    <h2 class="slider-title">{l s='Subcategories' d='Modules.Subcategoryslider'}</h2>
    <div class="subcategory-slider">
        {foreach from=$subcategories item=subcategory}
            <div class="subcategory-item">
                <a href="{$subcategory.link}">
                    <div class="subcategory-image" style="background-image: url({$subcategory.image_url})"></div>
                    <h3>{$subcategory.name}</h3>
                    <p>{$subcategory.nb_products} {l s='products' d='Modules.Subcategoryslider'}</p>
                </a>
            </div>
        {/foreach}
    </div>
</div>