<?php

namespace MyCustomShipping\Test\Model;

use \Magento\Framework\Model\AbstractModel;
use MyCustomShipping\Test\Api\Data\WarehouseInterface;

class Warehouse extends AbstractModel implements WarehouseInterface
{
    protected function _construct()
    {
        $this->_init('MyCustomShipping\Test\Model\ResourceModel\Warehouse');
    }

    public function getCustomAttributesCodes()
    {
        return array('id', 'warehouse_name', 'warehouse_name_ru', 'city_name');
    }
    public function getId()
    {
        return $this->_getData('id');
    }
    public function setCityId($city_id)
    {
        return $this->setData('city_id', $city_id);
    }
    public function getCityId()
    {
        return $this->_getData('city_id');
    }
    public function setName($name)
    {
        return $this->setData('warehouse_name', $name);
    }
    public function getName()
    {
        return $this->_getData('warehouse_name');
    }
    public function setNameRu($warehouse_name_ru)
    {
        return $this->setData('warehouse_name_ru', $warehouse_name_ru);
    }
    public function getNameRu()
    {
        return $this->_getData('warehouse_name_ru');
    }
    public function setRef($ref)
    {
        return $this->setData('ref', $ref);
    }
    public function getRef()
    {
        return $this->_getData('ref');
    }

}