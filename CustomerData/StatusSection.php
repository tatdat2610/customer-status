<?php
/**
 * @package     Extensions\Status
 * @author      Brian Pham <brian.pham261090@gmail.com>
 * @copyright   Copyright © 2021 Brian Pham, Inc. All Rights Reserved. *
 */

namespace Extensions\CustomerStatus\CustomerData;

use Magento\Customer\CustomerData\SectionSourceInterface;
use Magento\Customer\Model\Session;

/**
 * Class StatusSection
 * @package Extensions\CustomerStatus\CustomerData
 */
class StatusSection implements SectionSourceInterface
{
    /**
     * @var Session
     */
    protected $customerSession;

    /**
     * StatusSection constructor.
     * @param Session $customerSession
     */
    public function __construct(Session $customerSession)
    {
        $this->customerSession = $customerSession;
    }

    /**
     * @return array
     */
    public function getSectionData()
    {
        return [
            'status' => $this->customerSession->getCustomer()->getAttrStatus()
        ];
    }
}
