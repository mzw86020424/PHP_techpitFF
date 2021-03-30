<?php
require_once './lib/Loader.php';

// オートロード
$loader = new Loader();
// classesフォルダの中身をロード対象ディレクトリとして登録
$loader->regDirectory(__DIR__.'/classes');
$loader->register();

$members = array();
$members[] = new Brave('ティーダ');
$members[] = new WhiteMage('ユウナ');
$members[] = new BlackMage('ルールー');

$enemies = array();
$enemies[] = new Enemy('ゴブリン', 20);
$enemies[] = new Enemy('ボム', 25);
$enemies[] = new Enemy('モルボル', 30);

$turn = 1;
$isFinishFlg = false;

$messageObj = new Message;

// 終了条件の判定
function isFinish($objects)
{
  $deathCnt = 0;
  foreach ($objects as $object) {
    if ($object->getHitPoint() > 0) {
      return false;
    }
    $deathCnt++;
  }
  if ($deathCnt == count($objects)) {
    return true;
  }
}

while(!$isFinishFlg) {
  echo "*** $turn ターン目 ***\n\n";
  // 仲間の表示
  $messageObj->displayStatusMessage($members);
  // 敵の表示
  $messageObj->displayStatusMessage($enemies);

  // 味方の攻撃
  $messageObj->displayAttackMessage($members, $enemies);
  // 敵の攻撃
  $messageObj->displayAttackMessage($enemies, $members);

  // 仲間全員か敵全員のHPが0かチェック
  $isFinishFlg = isFinish($members);
  if ($isFinishFlg) {
    $message = "game over...\n\n";
    break;
  }
  $isFinishFlg = isFinish($enemies);
  if ($isFinishFlg) {
    $message = "ファンファーレ♪\n\n";
    break;
  }
  $turn++;
}

echo "★★★ 戦闘終了 ★★★\n\n";

echo $message;

// 仲間の表示
$messageObj->displayStatusMessage($members);
// 敵の表示
$messageObj->displayStatusMessage($enemies);