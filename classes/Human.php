<?php

class Human extends Lives
{
  const MAX_HIT_POINT = 100;

  public function __construct($name, $hitPoint, $attackPoint, $intelligence = 0)
  {
    parent::__construct($name, $hitPoint, $attackPoint, $intelligence);
  }
}