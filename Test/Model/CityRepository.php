<?php

namespace MyCustomShipping\Test\Model;

use MyCustomShipping\Test\Api\CityRepositoryInterface;
use MyCustomShipping\Test\Model\ResourceModel\City as CityResource;
use MyCustomShipping\Test\Model\ResourceModel\City\CollectionFactory;
use MyCustomShipping\Test\Api\Data\CitySearchResultsInterfaceFactory;
use Magento\Framework\Api\SearchCriteriaInterface;
use MyCustomShipping\Test\Api\Data\CityInterfaceFactory as CityDataFactory;

class CityRepository implements CityRepositoryInterface
{
    /**
     * @var customResource
     */
    private $cityResource;
    /**
     * @var customFactory
     */
    private $cityFactory;
    /**
     * @var CollectionFactory
     */
    private $cityDataFactory;
    private $collectionFactory;
    /**
     * @var CustomSearchResultsInterfaceFactory
     */
    private $searchResultsFactory;
    public function __construct(
        CityResource $cityResource,
        CityFactory $cityFactory,
        CollectionFactory $collectionFactory,
        CitySearchResultsInterfaceFactory $searchResultsFactory,
        CityDataFactory $cityDataFactory
    ) {

        $this->cityResource = $cityResource;
        $this->cityFactory = $cityFactory;
        $this->collectionFactory = $collectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->cityDataFactory = $cityDataFactory;
    }
    /**
     * @param \Magegain\Novaposhta\Api\Data\CityInterface|\Magegain\Novaposta\Api\Data\CityInterface $city
     * @return int
     */
    public function save(\MyCustomShipping\Test\Api\Data\CityInterface $city)
    {
        $this->cityResource->save($city);
        return $city->getId();
    }
    /**
     * @param SearchCriteriaInterface $searchCriteria
     * @return \Magegain\Novaposhta\Api\Data\CitySearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->cityFactory->create()->getCollection();
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $this->applySearchCriteriaToCollection($searchCriteria, $collection);
        $cities = $this->convertCollectionToDataItemsArray($collection);
        $searchResults->setTotalCount($collection->getSize());
        $searchResults->setItems($cities);
        return $searchResults;
    }
}