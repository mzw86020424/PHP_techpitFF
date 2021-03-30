<?php
require_once './classes/Human.php';
require_once './classes/Enemy.php';
require_once './classes/Brave.php';

$hero = new Brave("ヒーロー");
$goblin = new Enemy("ゴブリン");

$turn = 1;

// どちらかのHPが0になるまで繰り返す
while($hero->getHitPoint() > 0 && $goblin->getHitPoint() > 0) {
  echo "*** $turn ターン目 ***\n\n";
  // 現在のHPの表示
  echo $hero->getName().":".$hero->getHitPoint()."/".$hero::MAX_HIT_POINT."\n";
  echo $goblin->getName().":".$goblin->getHitPoint()."/".$goblin::MAX_HIT_POINT."\n\n";
  
  // 攻撃
  $hero->doAttack($goblin);
  echo "\n";
  $goblin->doAttack($hero);
  echo "\n";

  $turn++;
}

echo "★★★ 戦闘終了 ★★★\n\n";
echo $hero->getName() . "　：　" . $hero->getHitPoint() . "/" . $hero::MAX_HIT_POINT . "\n";
echo $goblin->getName() . "　：　" . $goblin->getHitPoint() . "/" . $goblin::MAX_HIT_POINT . "\n\n";