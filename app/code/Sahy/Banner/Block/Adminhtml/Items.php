<?php

namespace Sahy\Banner\Block\Adminhtml;

class Items extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'Training Video';
        $this->_headerText = __('Training Video');
        $this->_addButtonLabel = __('Add New Video');
        parent::_construct();
    }
}
