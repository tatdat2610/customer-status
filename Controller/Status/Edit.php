<?php
/**
 * @package     Extensions\Status
 * @author      Brian Pham <brian.pham261090@gmail.com>
 * @copyright   Copyright © 2021 Brian Pham, Inc. All Rights Reserved. *
 */

namespace Extensions\CustomerStatus\Controller\Status;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Edit
 * @package Extensions\CustomerStatus\Controller\Status
 */
class Edit extends \Magento\Framework\App\Action\Action
{
    /**
     * @var PageFactory
     */
    protected $_pageFactory;

    /**
     * @var CustomerRepositoryInterface
     */
    protected $customerRepoInterface;

    /**
     * @var Session
     */
    protected $customerSession;

    /**
     * Edit constructor.
     * @param Context $context
     * @param PageFactory $pageFactory
     * @param CustomerRepositoryInterface $customerRepoInterface
     * @param Session $customerSession
     */
    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        CustomerRepositoryInterface $customerRepoInterface,
        Session $customerSession
    ) {
        $this->_pageFactory = $pageFactory;
        $this->customerRepoInterface = $customerRepoInterface;
        $this->customerSession = $customerSession;
        return parent::__construct($context);
    }

    /**
     * @return saving customer status
     */
    public function execute()
    {
        $customer = $this->customerRepoInterface->get($this->customerSession->getCustomer()->getEmail(), $this->customerSession->getCustomer()->getId());
        $customer->setCustomAttribute('attr_status', $this->_request->getParam('status'));
        $this->customerRepoInterface->save($customer);

        $resultRedirect = $this->resultRedirectFactory->create();
        $resultRedirect->setPath('extensions/status/index');
        return $resultRedirect;
    }
}
