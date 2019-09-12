<?php

header("Content-type: application/json; charset=utf-8");

// Todo.phpを読み込む
require_once('Models/Todo.php');

// ユーザーが入力したタスクを変数に格納
$task = $_POST['task'];

// Todoクラスのインスタンスを作成し、
// 変数todoにいれる
$todo = new Todo();

// Todoクラスのcreateメソッドを実行
$lastId = $todo->create($task);

// 取得した最新のIDをもとに、タスクを取得
$newtask = $todo->get($lastId);

echo json_encode($newtask);
exit();
// 一覧画面に戻る
// header('Location: index.php');

// echo '<br>';
// echo $todo->table;
// echo '<br>';
// echo $todo->db_manager;
// var_dump($todo->db_manager);
