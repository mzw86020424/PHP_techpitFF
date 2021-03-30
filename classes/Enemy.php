<?php
class Enemy extends Lives
{
  const MAX_HIT_POINT = 50;

  public function __construct($name, $attackPoint)
  {
    $hitPoint = 50;
    $intelligence = 0;
    parent::__construct($name, $hitPoint, $attackPoint, $intelligence);
  }
}