<?php
namespace Mag\Homebackery\Controller\Index;

class Test extends \Magento\Framework\App\Action\Action


{
    protected $_pageFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        return parent::__construct($context);
    }

    public function execute()
    {
        $this->_view->loadLayout();
        $this->_view->getLayout()->getBlock('homebackery');
        $this->_view->renderLayout();
    }
}

