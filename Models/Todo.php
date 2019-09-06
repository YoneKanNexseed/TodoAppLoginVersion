<?php

require_once('config/dbconnect.php');

// Todoを操作するクラス（もの）
// - 追加する機能
// - 検索する機能
// - 編集する機能
// - 削除する機能

class Todo
{
  // プロパティ
  // - テーブル名
  // - DbManagerインスタンスを持つ変数

  // テーブル名
  private $table = 'tasks';

  // DbManagerクラスのインスタンス
  private $db_manager;

  // コンストラクタ：生まれた瞬間に実行
  function __construct()
    {
        // db_managerプロパティは、
        // DbManagerクラスのインスタンス
        $this->db_manager = new DbManager();

        // データベースに接続
        $this->db_manager->connect();
    }

  public function create($task)
  {
    // INSERT分の準備
    $stmt = $this->db_manager->dbh->prepare('INSERT INTO ' . $this->table . '(name) VALUES (?)');
    // 準備したものを実行
    $stmt->execute([$task]);
  }

  // タスクをすべて取得する
  public function getAll()
  {
    // SELECT文の準備
    $stmt = $this->db_manager->dbh->prepare('SELECT * FROM ' . $this->table);

    // 準備したSQLを実行
    $stmt->execute();

    // 実行した結果を取得
    $tasks = $stmt->fetchAll();

    // 取得した結果を返す
    return $tasks;
  }

  // 削除するメソッド
  public function delete()
  {

  }
}
