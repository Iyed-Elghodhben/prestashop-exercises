<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

class DisplayProductCategory extends Module
{
    public function __construct()
    {
        $this->name = 'displayproductcategory';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Your Name';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
            'min' => '1.7',
            'max' => '1.7.6.1'
        ];
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Display Product Category');
        $this->description = $this->l('Displays product subcategories in cart confirmation');
    }

    public function install()
    {
        return parent::install() 
            && $this->registerHook('displayOrderConfirmation');
    }

public function hookDisplayOrderConfirmation($params)
{
    $order = $params['order'];
    $products = $order->getProducts();
    $productCategories = [];

    foreach ($products as $product) {
        $category = new Category($product['id_category_default'], $this->context->language->id);
        
        // Get the lowest level category
        $lowestCategory = $this->getLowestLevelCategory($category);
        
        $productCategories[$product['id_product']] = $lowestCategory->name;
    }

    $this->context->smarty->assign([
        'productCategories' => $productCategories
    ]);

    return $this->display(__FILE__, 'views/templates/hook/orderconfirmation.tpl');
}
private function getLowestLevelCategory($category)
{
    $children = $category->getChildren($this->context->language->id, true);
    
    if (empty($children)) {
        return $category;
    }
    
    $lastChild = end($children);
    return $this->getLowestLevelCategory(new Category($lastChild['id_category'], $this->context->language->id));
}
}