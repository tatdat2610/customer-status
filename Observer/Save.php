<?php
/**
 * @package     Extensions\Status
 * @author      Brian Pham <brian.pham261090@gmail.com>
 * @copyright   Copyright © 2021 Brian Pham, Inc. All Rights Reserved. *
 */

namespace Extensions\CustomerStatus\Observer;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Model\CustomerFactory;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class Save implements ObserverInterface
{
    /**
     * @var CustomerRepositoryInterface
     */
    protected $_customerRepositoryInterface;
    /**
     * @var CustomerFactory
     */
    protected $_customerFactory;

    /**
     * Save constructor.
     * @param CustomerRepositoryInterface $customerRepositoryInterface
     * @param CustomerFactory $customerFactory
     */
    public function __construct(
        CustomerRepositoryInterface $customerRepositoryInterface,
        CustomerFactory $customerFactory
    ) {
        $this->_customerRepositoryInterface = $customerRepositoryInterface;
        $this->_customerFactory = $customerFactory;
    }

    /**
     * Observer for adminhtml_customer_save_after
     *
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer)
    {
        $customer = $observer->getEvent()->getCustomer();
        $params = $observer->getEvent()->getRequest()->getParams();
        if (isset($params['fieldset_attr_status']['attr_status'])) {
            $customer->setCustomAttribute('attr_status', $params['fieldset_attr_status']['attr_status']);
        }
    }
}
