<?php

require_once('Models/User.php');

// 送信されてきたユーザー名とパスワードを取得
$username = $_POST['username'];
$password = $_POST['password'];

// パスワードを暗号化
$hashPass = 
password_hash($password, PASSWORD_BCRYPT);

// Userクラスのインスタンスを作成（インスタンス化）
$user = new User();

// ユーザー登録
$user->create($username, $hashPass);

// 登録したユーザーを取得
$newUser = $user->findByUsername($username);

// セッションにログイン情報を保存

// セッションの開始
session_start();

// セッションにログイン情報の登録
$_SESSION['user'] = $newUser;

// 一覧画面に遷移
header('Location: index.php');