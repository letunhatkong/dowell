<?php
namespace Sahy\Banner\Block\Frontend;
  
class Banners extends \Magento\Framework\View\Element\Template
{
    protected $_imageCollection = null;
    
    /**
     * Page factory
     *
     * @var \Magento\Cms\Model\PageFactory
     */
    protected $_imageCollectionFactory;
    
        public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
         \Sahy\Banner\Model\ItemsFactory $imageCollectionFactory,
        array $data = []
    ) {     
        $this->_imageCollectionFactory = $imageCollectionFactory;
        parent::__construct(
            $context,   
            $data
        );
    }
    
 
    
    public function getHomeLeftcollection()
    {
        $collection = $this->_imageCollectionFactory->create();
       
        $iCollection = $collection->getCollection()->addFieldToFilter('layout','left')->addFieldToFilter('pages','home page');
        
        
        $dd = $iCollection->getData();
        
        return $dd;

    }
    public function getHomeContentcollection()
    {
        $collection = $this->_imageCollectionFactory->create();
       
        $iCollection = $collection->getCollection()->addFieldToFilter('layout','top content')->addFieldToFilter('pages','home page');
        
        $dd = $iCollection->getData();
        
        return $dd;

    }
    public function getVideoContent()
    {
        $collection = $this->_imageCollectionFactory->create();

        $iCollection = $collection->getCollection();

        $dd = $iCollection->getData();

        return $dd;

    }

     public function getHomeBottomcontentcollection()
    {
        $collection = $this->_imageCollectionFactory->create();
       
        $iCollection = $collection->getCollection()->addFieldToFilter('layout','bottom content')->addFieldToFilter('pages','home page');
        
        $dd = $iCollection->getData();
        
        return $dd;

    }
    
    
     public function getCategoryleftcollection()
    {
        $collection = $this->_imageCollectionFactory->create();
       
        $iCollection = $collection->getCollection()->addFieldToFilter('layout','left')->addFieldToFilter('pages','Category Page');
        
        
        $dd = $iCollection->getData();
        
        return $dd;

    }
    public function getCategorytopcollection()
    {
        $collection = $this->_imageCollectionFactory->create();
       
        $iCollection = $collection->getCollection()->addFieldToFilter('layout','top content')->addFieldToFilter('pages','Category Page');
        
        $dd = $iCollection->getData();
        
        return $dd;

    }
     public function getCategorybottomcollection()
    {
        $collection = $this->_imageCollectionFactory->create();
       
        $iCollection = $collection->getCollection()->addFieldToFilter('layout','bottom content')->addFieldToFilter('pages','Category Page');
        
        $dd = $iCollection->getData();
        
        return $dd;

    }
     public function getProductleftcollection()
    {
        $collection = $this->_imageCollectionFactory->create();
       
        $iCollection = $collection->getCollection()->addFieldToFilter('layout','left')->addFieldToFilter('pages','Product Detail Page');
        
        
        $dd = $iCollection->getData();
        
        return $dd;

    }
    public function getProducttopcollection()
    {
        $collection = $this->_imageCollectionFactory->create();
       
        $iCollection = $collection->getCollection()->addFieldToFilter('layout','top content')->addFieldToFilter('pages','Product Detail Page');
        
        $dd = $iCollection->getData();
        
        return $dd;

    }
     public function getProductbottomcollection()
    {
        $collection = $this->_imageCollectionFactory->create();
       
        $iCollection = $collection->getCollection()->addFieldToFilter('layout','bottom content')->addFieldToFilter('pages','Product Detail Page');
        
        $dd = $iCollection->getData();
        
        return $dd;

    }
    public function getBaseUrl(){
              
              return $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
              
         
    }
             
    
    
    
//    
 
//  protected $_itemsFactory;
//     /**
//    * @var \Tutorial\SimpleItems\Model\ItemsFactory
//    */
//   
// 
//   /**
//    * @param Template\Context $context
//    * @param ItemsFactory $itemsFactory
//    * @param array $data
//    */
//   public function __construct(
//      Template\Context $context,
//      ItemsFactory $itemsFactory,
//      array $data = []
//   ) {
//        $this->_itemsFactory = $itemsFactory;
//        parent::__construct($context, $data);
//   }
// 
   /**
     * Set items collection
     */
//    protected  function _construct()
//    {
//        parent::_construct();
//        $collection = $this->_eventCollectionFactory->create()->getCollection()
//            ->setOrder('id', 'DESC');
//        $this->setCollection($collection);
//    }
// 
//   /**
//     * @return $this
//     */
//    protected function _prepareLayout()
//    {
//        parent::_prepareLayout();
//        /** @var \Magento\Theme\Block\Html\Pager */
//        $this->getLayout()->getCollection()->load();       
//           
//        return var_dump($this);
//    }
// 
//   /**
//     * @return string
//     */
//    public function getPagerHtml()
//    {
//        return $this->getChildHtml();
//    }

}