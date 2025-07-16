{**
 * 2007-2019 PrestaShop and Contributors
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to https://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2019 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
{extends file='catalog/listing/product-list.tpl'}

{block name='product_list_header'}
    {include file='catalog/_partials/category-header.tpl' listing=$listing category=$category}
{/block}

{if isset($category.subcategories) && $category.subcategories}
  <section class="subcategory-slider-section">
    <h2 class="h3 slider-title">{l s='Browse Subcategories' d='Shop.Theme.Catalog'}</h2>
    <div class="subcategory-slider">
      {foreach from=$category.subcategories item=subcategory}
        <div class="subcategory-slide">
          <a href="{$subcategory.link}" title="{$subcategory.name}">
            <div class="subcategory-image">
              <img 
                src="{if $subcategory.image}{$subcategory.image.bySize.medium_default.url}{else}{$urls.img_cat_dir}default.jpg{/if}" 
                alt="{$subcategory.name}"
                loading="lazy"
              >
            </div>
            <h3 class="h5">{$subcategory.name}</h3>
            <p class="product-count">{$subcategory.products_count} {l s='products' d='Shop.Theme.Catalog'}</p>
          </a>
        </div>
      {/foreach}
    </div>
  </section>
{/if}
