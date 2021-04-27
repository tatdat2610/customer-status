<?php
/**
 * @package     Extensions\Status
 * @author      Brian Pham <brian.pham261090@gmail.com>
 * @copyright   Copyright © 2021 Brian Pham, Inc. All Rights Reserved. *
 */

namespace Extensions\CustomerStatus\Block\Status;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Template\Context;

/**
 * Class Index
 * @package Extensions\CustomerStatus\Block\Status
 */
class Index extends \Magento\Framework\View\Element\Template
{
    /**
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * Index constructor.
     * @param Context $context
     * @param UrlInterface $urlBuilder
     * @param array $data
     */
    public function __construct(
        Context $context,
        UrlInterface $urlBuilder,
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $data);
    }
    /**
     * Retrieve customer status form post url
     *
     * @return string
     */
    public function getStatusPostUrl()
    {
        return $this->urlBuilder->getUrl('extensions/customerstatus/edit');
    }
}
