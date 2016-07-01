<?php namespace Puckett\Cashnet;
class CashnetFactory
{

/*
  //
  // PUBLIC METHODS
  //
  // functionName($parameters = DEFAULTS) returns
  //

  __construct($data = NULL)
    $data = array(
      'store' => $store,
      'itemcode' => $itemcode,
      'price' => $price
    )
  requiredFieldsSet() boolean
  getURL() URL or false
  getStore() $store or false
  setStore($store) $store or false
  getItemcode() $itemcode or false
  setItemcode($itemcode) $itemcode or false
  getPrice() numeric or false
  setPrice($price) numeric or false

*/

  private $data;

  //
  // PUBLIC METHODS
  //

  function __construct($data = null)
  {
    if(isset($data['store']))
         $this->setStore($data['store']);
    else $this->setStore(false);

    if(isset($data['itemcode']))
         $this->setItemcode($data['itemcode']);
    else $this->setItemcode(false);

    if(isset($data['price']))
         $this->setPrice($data['price']);
    else $this->setPrice(false);
  }

  public function requiredFieldsSet()
  {
    if ($this->getStore() === false) return false;
    if ($this->getItemcode() === false) return false;
    if ($this->getPrice() === false) return false;
    return true;
  }

  public function getURL()
  {
    if(!$this->requiredFieldsSet()) return false;

    $url  = 'https://commerce.cashnet.com/';
    $url .= rawurlencode($this->getStore()) . '?';

    $data = [
      'itemcode' => $this->getItemcode(),
      'amount' => $this->getPrice()
    ];

    return $url . http_build_query($data);
  }

  public function getStore()
  {
    return $this->data['store'];
  }

  public function setStore($store)
  {
    if (
      !is_string($store) ||
      empty($store) ||
      is_numeric($store)
    )    $this->data['store'] = false;
    else $this->data['store'] = $store;

    return $this->data['store'];
  }

  public function getItemcode()
  {
    return $this->data['itemcode'];
  }

  public function setItemcode($itemcode)
  {
    if (
      !is_string($itemcode) ||
      empty($itemcode) ||
      is_numeric($itemcode)
    )    $this->data['itemcode'] = false;
    else $this->data['itemcode'] = $itemcode;

    return $this->data['itemcode'];
  }

  public function getPrice()
  {
    return $this->data['price'];
  }

  public function setPrice($price)
  {
    // validate
    if (
      !is_numeric($price) ||
      $price <= 0
    ) {
      $this->data['price'] = false;
    } else {
      $this->data['price'] = $price;
    }

    return $this->data['price'];
  }

}
