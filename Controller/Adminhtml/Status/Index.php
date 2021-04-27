<?php
/**
 * @package     Extensions\Status
 * @author      Brian Pham <brian.pham261090@gmail.com>
 * @copyright   Copyright © 2021 Brian Pham, Inc. All Rights Reserved. *
 */

namespace Extensions\CustomerStatus\Controller\Adminhtml\Status;

use Magento\Framework\View\Result\Layout;
use Magento\Framework\View\Result\Page;

/**
 * Class Index
 * @package Extensions\CustomerStatus\Controller\Adminhtml\Status
 */
class Index extends \Magento\Customer\Controller\Adminhtml\Index
{
    /**
     * Customer compare grid
     *
     * @return Layout
     */
    public function execute()
    {
        /** @var Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->set(__('Status'));
        return $resultPage;
    }
}
