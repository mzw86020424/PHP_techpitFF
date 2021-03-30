<?php
class Loader
{
  // オートロード対象のディレクトリを保持するプロパティ
  private $directories = array();

  // オートロード対象のフォルダのパスを$directoriesプロパティに配列型式で格納
  public function regDirectory($dir)
  { 
    $this->directories[] =$dir;
    return;
  }
  
  // クラスを読み込むオブジェクトを登録するメソッド
  public function register()
  {
    // 自分自身のloadClass()メソッドをコールバックとして登録
    spl_autoload_register(array($this, 'loadClass'));
  }

  // register()メソッドによってオートロードに登録されたコールバック
  public function loadClass($className)
  {
    // パスを一個ずつ取り出す
    foreach ($this->directories as $dir) {
      // クラスファイルへのパスを生成
      $filePath = $dir.'/'.$className.'.php';
      // $filePathが読み込めるかどうかチェック
      if (is_readable($filePath)) {
        // 読み込めたらrequireしてループ終了
        require $filePath;
        return;
      }
    }
  }
}
