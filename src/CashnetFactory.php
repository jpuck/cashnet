<?php namespace Puckett\Cashnet;
class CashnetFactory
{

/*
  --
  -- PUBLIC METHODS
  --
  -- functionName($parameters = DEFAULTS) returns
  --

  getPrice() numeric or false
  setPrice($price) boolean

*/

  private $price;

  function __construct()
  {
    $this->price = false;
  }

  public function getPrice()
  {
    return $this->price;
  }

  public function setPrice($price)
  {
    $this->price = $price;
    return true;
  }

}
