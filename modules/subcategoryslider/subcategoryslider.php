<?php
if (!defined('_PS_VERSION_')) {
    exit;
}

class SubcategorySlider extends Module
{
    public function __construct()
    {
        $this->name = 'subcategoryslider';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Your Name';
        $this->need_instance = 0;
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Subcategory Slider');
        $this->description = $this->l('Displays subcategories in a slider on category pages');
    }

    public function install()
    {
        return parent::install() && 
               $this->registerHook('displayHeader') &&
               $this->registerHook('displayCategoryAdditionalContent');
    }

    public function hookDisplayHeader()
    {
        $this->context->controller->registerStylesheet(
            'modules-subcategoryslider',
            'modules/'.$this->name.'/views/css/subcategoryslider.css'
        );
        
        $this->context->controller->registerJavascript(
            'modules-subcategoryslider',
            'modules/'.$this->name.'/views/js/subcategoryslider.js',
            ['position' => 'bottom', 'priority' => 150]
        );
    }

    public function hookDisplayCategoryAdditionalContent($params)
    {
        $category = new Category($params['category']->id, $this->context->language->id);
        $subcategories = $category->getSubCategories($this->context->language->id);

        foreach ($subcategories as &$subcategory) {
            $cat = new Category($subcategory['id_category'], $this->context->language->id);
            $subcategory['nb_products'] = $cat->getProducts(null, null, null, null, null, true);
            $subcategory['image_url'] = $this->getCategoryImage($subcategory['id_category']);
        }

        $this->context->smarty->assign([
            'subcategories' => $subcategories
        ]);

        return $this->display(__FILE__, 'views/templates/hook/subcategoryslider.tpl');
    }

    private function getCategoryImage($id_category)
    {
        $image_path = _PS_CAT_IMG_DIR_ . $id_category . '.jpg';
        if (file_exists($image_path)) {
            return $this->context->link->getCatImageLink($id_category, 'medium_default');
        }
        return $this->context->link->getMediaLink(_THEME_CAT_DIR_ . 'default.jpg');
    }
}