<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class MyModule extends Module
{
    public function __construct()
    {
        $this->name = 'mymodule';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Your Name';
        $this->need_instance = 0;

        parent::__construct();

        $this->displayName = $this->l('My Module');
        $this->description = $this->l('Custom logic for PrestaShop test.');
    }

    public function install()
    {
        return parent::install() &&
            $this->registerHook('displayOrderConfirmation');
    }

    public function uninstall()
    {
        return parent::uninstall();
    }

    public function hookDisplayOrderConfirmation($params)
    {
        $order = $params['order'];
        $products = $order->getProducts();

        $this->context->smarty->assign([
            'products' => $products,
        ]);

        return $this->display(__FILE__, 'views/templates/hook/order_confirmation.tpl');
    }
}
