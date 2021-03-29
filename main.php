<?php
require_once './classes/Human.php';
require_once './classes/Enemy.php';
require_once './classes/Brave.php';

$hero = new Brave();
$goblin = new Enemy();

$hero->name = "ヒーロー";
$goblin->name = "ゴブリン";

$turn = 1;

// どちらかのHPが0になるまで繰り返す
while($hero->hitPoint > 0 && $goblin->hitPoint > 0) {
  echo "*** $turn ターン目 ***\n\n";
  // 現在のHPの表示
  echo $hero->name.":".$hero->hitPoint."/".$hero::MAX_HIT_POINT."\n";
  echo $goblin->name.":".$goblin->hitPoint."/".$goblin::MAX_HIT_POINT."\n\n";
  
  // 攻撃
  $hero->doAttack($goblin);
  echo "\n";
  $goblin->doAttack($hero);
  echo "\n";

  $turn++;
}

echo "★★★ 戦闘終了 ★★★\n\n";
echo $hero->name . "　：　" . $hero->hitPoint . "/" . $hero::MAX_HIT_POINT . "\n";
echo $goblin->name . "　：　" . $goblin->hitPoint . "/" . $goblin::MAX_HIT_POINT . "\n\n";