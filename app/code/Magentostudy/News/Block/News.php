<?php
namespace Magentostudy\News\Block;

/**
 * News content block
 */
class News extends \Magento\Framework\View\Element\Template
{
    /**
     * News collection
     *
     * @var \Magentostudy\News\Model\ResourceModel\News\Collection
     */
    protected $_newsCollection = null;

    /**
     * News factory
     *
     * @var \Magentostudy\News\Model\NewsFactory
     */
    protected $_newsCollectionFactory;

    /** @var \Magentostudy\News\Helper\Data */
    protected $_dataHelper;


    /**
     * News constructor.
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magentostudy\News\Model\ResourceModel\News\CollectionFactory $newsCollectionFactory
     * @param \Magentostudy\News\Helper\Data $dataHelper
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magentostudy\News\Model\ResourceModel\News\CollectionFactory $newsCollectionFactory,
        \Magentostudy\News\Helper\Data $dataHelper,
        array $data = []
    )
    {
        $this->_newsCollectionFactory = $newsCollectionFactory;
        $this->_dataHelper = $dataHelper;
        parent::__construct(
            $context,
            $data
        );
    }

    /**
     * Retrieve news collection
     *
     * @return \Magentostudy\News\Model\News|\Magentostudy\News\Model\ResourceModel\News\Collection
     */
    protected function _getCollection()
    {
        $collection = $this->_newsCollectionFactory->create();
        return $collection;
    }

    /**
     * Retrieve prepared news collection
     * @return \Magentostudy\News\Model\ResourceModel\News\Collection
     */
    public function getCollection()
    {
        if (is_null($this->_newsCollection)) {
            $this->_newsCollection = $this->_getCollection();
            $this->_newsCollection->setCurPage($this->getCurrentPage());
            $this->_newsCollection->setPageSize($this->_dataHelper->getNewsPerPage());
            $this->_newsCollection->setOrder('published_at', 'desc');
        }

        return $this->_newsCollection;
    }

    /**
     * Fetch the current page for the news list
     *
     * @return int
     */
    public function getCurrentPage()
    {
        return $this->getData('current_page') ? $this->getData('current_page') : 1;
    }

    /**
     * Return URL to item's view page
     *
     * @param $newsItem
     * @return string
     */
    public function getItemUrl($newsItem)
    {
        return $this->getUrl('*/*/view', array('id' => $newsItem->getId()));
    }

    /**
     * Return URL for resize News Item image
     *
     * @param $item
     * @param $width
     * @return bool|string
     */
    public function getImageUrl($item, $width)
    {
        return $this->_dataHelper->resize($item, $width);
    }

    /**
     * Get a pager
     *
     * @return string|null
     */
    public function getPager()
    {
        $pager = $this->getChildBlock('news_list_pager');
        if ($pager instanceof \Magento\Framework\Object) {
            $newsPerPage = $this->_dataHelper->getNewsPerPage();

            $pager->setAvailableLimit([$newsPerPage => $newsPerPage]);
            $pager->setTotalNum($this->getCollection()->getSize());
            $pager->setCollection($this->getCollection());
            $pager->setShowPerPage(TRUE);
            $pager->setFrameLength(
                $this->_scopeConfig->getValue(
                    'design/pagination/pagination_frame',
                    \Magento\Store\Model\ScopeInterface::SCOPE_STORE
                )
            )->setJump(
                $this->_scopeConfig->getValue(
                    'design/pagination/pagination_frame_skip',
                    \Magento\Store\Model\ScopeInterface::SCOPE_STORE
                )
            );

            return $pager->toHtml();
        }

        return NULL;
    }

    /**
     * Get published date
     *
     * @param $date
     * @return bool|string
     */
    public function getDate($date)
    {
        if (!isset($date)) return false;
        $time = strtotime($date);
        $newFormat = date('F jS, Y',$time);
        return $newFormat;
    }
}
