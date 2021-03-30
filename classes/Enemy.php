<?php

class Enemy
{
  const MAX_HIT_POINT = 50;
  private $name;
  private $hitPoint = self::MAX_HIT_POINT;
  private $attackPoint = 10;

  public function __construct($name)
  {
    $this->name = $name;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getHitPoint()
  {
    return $this->hitPoint;
  }

  public function getAttackPoint()
  {
    return $this->attackPoint;
  }

  public function doAttack($human)
  {
    echo "『".$this->getName()."』の攻撃！\n";
    echo "【".$human->getName()."】に".$this->getAttackPoint()."のダメージ！\n";
    $human->tookDamage($this->getAttackPoint());
  }

  public function tookDamage($damage)
  {
    $this->hitPoint -= $damage;
    if ($this->hitPoint < 0) {
      $this->hitPoint = 0;
    }
  }
}