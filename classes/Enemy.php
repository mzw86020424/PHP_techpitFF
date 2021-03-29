<?php

class Enemy {
  const MAX_HITPOINT = 50;
  public $name;
  public $hitPint = 50;
  public $attackPoint = 10;

  public function doAttack($human) {
    echo "『".$this->name."』の攻撃！/n";
    echo "【".$human->name."】に".$this->attackPoint."のダメージ！/n";
    $human->tookDamage($this->attackPoint);
  }

  public function tookDamage($damage) {
    $this->hitPint -= $damage;
    if ($this->hitPint < 0) {
      $this->hitPint = 0;
    }
  }
}