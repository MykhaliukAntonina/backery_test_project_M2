<?php

namespace Mag\Cms\Setup;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Cms\Model\BlockFactory;
use Magento\Framework\App\Config\Storage\WriterInterface;

class UpgradeData implements UpgradeDataInterface
{
    private $blockFactory;

    private $configWriter;



    public function __construct(
        BlockFactory $blockFactory,
        WriterInterface $configWriter)
    {
        $this->blockFactory = $blockFactory;
        $this->configWriter = $configWriter;
    }



    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)


    {


        if (version_compare($context->getVersion(), '8.0.0', '<')) {
            $this->configWriter->save('web/default/front', 'newmodule/index/index', 'default', 0);
        }

        if (version_compare($context->getVersion(), '7.0.0', '<')) {
            $contactCustomerService = [
                'title' => 'Write Us',
                'identifier' => 'write_us',
                'stores' => [0],
                'is_active' => 1,
                'content' => '<div class="contact-us">
                                <div class="img-form">
                                <img src="{{media url=wysiwyg/img1.jpeg}}" alt="" />
                                </div> {{block class="Magento\Contact\Block\ContactForm" name="contactForm" template="Magento_Contact::form.phtml"}} </div>'
            ];
            $this->blockFactory->create()->setData($contactCustomerService)->save();

            $contactCustomerService = [
                'title' => 'Our history',
                'identifier' => 'our_history',
                'stores' => [0],
                'is_active' => 1,
                'content' => '<div class="history">
                                <div class="content">
                                <h1>Welcome to Sweet Backery</h1> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Praesent at purus nibh. Aenean mattis, nulla sed suscipit commodo, erat tortor hendrerit nunc,
                                quis scelerisque libero mauris ac ipsum. Maecenas eget odio non ex aliquam feugiat non eu urna.
                                Pellentesque erat dui, placerat et commodo quis, pellentesque eu tellus.
                                Nullam vitae commodo urna, nec suscipit arcu. Aliquam vestibulum nec turpis ut tincidunt.
                                In molestie euismod volutpat. Suspendisse luctus leo urna, sed euismod sem mollis sed. Etiam quis justo ligula.</p>
                                </div>'
            ];
            $this->blockFactory->create()->setData($contactCustomerService)->save();

            $contactCustomerService = [
                'title' => 'Top banner',
                'identifier' => 'top_banner',
                'stores' => [0],
                'is_active' => 1,
                'content' => '<div class="home-banner">
<img src="{{media url=wysiwyg/banner2.jpg}}" alt="" />
<div class="top-banner-text">
<h3 style="font-size: clamp(2.00rem, 1.79vw + 1.43rem, 4.00rem); text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5), 4px 4px 10px rgba(0, 0, 0, 0.7);">
<strong>Sweet Backery</strong></h3>
<p style="font-size: clamp(1.30rem, 1.16vw + 1.01rem, 2.30rem); text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5), 4px 4px 10px rgba(0, 0, 0, 0.7);"> Where there is bread, there is life, and where there is life, there is hope.</p> </div> </div>'
            ];
            $this->blockFactory->create()->setData($contactCustomerService)->save();
        }
    }
}
