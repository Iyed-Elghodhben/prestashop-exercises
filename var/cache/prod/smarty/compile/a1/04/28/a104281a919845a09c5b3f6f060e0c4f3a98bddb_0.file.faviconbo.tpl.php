<?php
/* Smarty version 3.1.33, created on 2025-07-16 16:37:03
  from 'C:\xampp\htdocs\prestashop\modules\ps_faviconnotificationbo\views\templates\hook\faviconbo.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6877c71fa45da5_56051303',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a104281a919845a09c5b3f6f060e0c4f3a98bddb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\prestashop\\modules\\ps_faviconnotificationbo\\views\\templates\\hook\\faviconbo.tpl',
      1 => 1752667235,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6877c71fa45da5_56051303 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">
/*
 * Return total of notification per checkbox checked
 * @param  int nbNewCustomer
 * @param  int nbNewOrder
 * @param  int nbNewMessage
 * @return int result        Total of Notification
 */
function getNotification(nbNewCustomer, nbNewOrder, nbNewMessage) {
    let result = 0;
    //if radiobutton is checked
    <?php if ($_smarty_tpl->tpl_vars['bofavicon_params']->value['CHECKBOX_ORDER'] == 1) {?> result += nbNewOrder; <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['bofavicon_params']->value['CHECKBOX_CUSTOMER'] == 1) {?> result += nbNewCustomer; <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['bofavicon_params']->value['CHECKBOX_MESSAGE'] == 1) {?> result += nbNewMessage; <?php }?>

    return result;
}

function loadAjax(adminController) {
    $.ajax({
        type: 'POST',
        dataType: 'JSON',
        url: adminController,
        data: {
            ajax: true,
            action: "GetNotifications",
        },

        success: function(data) {

            let nbNewCustomers = parseInt(data.customer.total);
            let nbNewOrders = parseInt(data.order.total);
            let nbNewCustomerMessages = parseInt(data.customer_message.total);

            let nbTotalNotification = getNotification(nbNewCustomers, nbNewOrders, nbNewCustomerMessages);

            favicon.badge(nbTotalNotification);
        },
        error: function(err) {
            console.log(err);
            console.log(adminController);
        },
    });
}

function updateNotifications(type) {
  $.post(
    baseAdminDir + "ajax.php",
    {
      "updateElementEmployee": "1",
      "updateElementEmployeeType": type
    }
  );
}

$(document).ready(function() {
    adminController = adminController.replace(/\amp;/g, '');
    //set the configuration of the favicon
    window.favicon = new Favico({
        animation: 'popFade',
        bgColor: BgColor,
        textColor: TxtColor,
    });
    loadAjax(adminController)
    setInterval(function() {
        loadAjax(adminController);
    }, 60000); //refresh notification every 60 seconds

    //update favicon when you click on the customer tab into your backoffice
    $(document).on('click', '#subtab-AdminCustomers', function (e) {
        updateNotifications('customer');
    });
    //update favicon when you click on the customer service tab into your backoffice
    $(document).on('click', '#subtab-AdminCustomerThreads', function (e) {
        updateNotifications('customer_message');
    });
    //update favicon when you click on the order tab into your backoffice
    $(document).on('click', '#subtab-AdminOrders', function (e) {
        updateNotifications('order');
    });
});
<?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 type="text/javascript">
    let BgColor = "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['bofavicon_params']->value['BACKGROUND_COLOR_FAVICONBO'],'html','UTF-8' ));?>
";
    let TxtColor = "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['bofavicon_params']->value['TEXT_COLOR_FAVICONBO'],'html','UTF-8' ));?>
";
    let CheckBoxOrder = "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['bofavicon_params']->value['CHECKBOX_ORDER'],'html','UTF-8' ));?>
";
    let CheckBoxCustomer = "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['bofavicon_params']->value['CHECKBOX_CUSTOMER'],'html','UTF-8' ));?>
";
    let CheckBoxMessage = "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['bofavicon_params']->value['CHECKBOX_MESSAGE'],'html','UTF-8' ));?>
";
    let adminController = "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['adminController']->value,'htmlall','UTF-8' ));?>
";
<?php echo '</script'; ?>
>

<?php }
}
