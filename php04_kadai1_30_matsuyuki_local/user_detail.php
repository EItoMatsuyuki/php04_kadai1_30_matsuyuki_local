<?php
//selsect.phpから処理を持ってくる
//1.外部ファイル読み込みしてDB接続(funcs.phpを呼び出して)
require_once('funcs.php');
$pdo = db_conn();

//2.対象のIDを取得
$id=$_GET['id'];

//3．データ取得SQLを作成（SELECT文）
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id;");
$stmt -> bindValue(':id',$id,PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ表示
$view = "";
if ($status == false) {
    sql_error($status);
} else {
    $result = $stmt->fetch();
}
?>

<!-- 以下はindex.phpのHTMLをまるっと持ってくる -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="user_select.php">ユーザー登録一覧に戻る</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="user_update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ユーザー登録(id:<?= $result['id']?>)</legend>
     <label>name：<input type="text" name="name" value="<?= $result['name']?>"></label><br>
     <label>lid：<input type="text" name="lid" value="<?= $result['lid']?>"></label><br>
     <label>lpw：<input type="text" name="lpw" value="<?= $result['lpw']?>"></label><br>
     <label>kanri_flg：
     <input type="radio" name="kanri_flg[]" value=0 <?php if($result['kanri_flg'] === '0') echo 'checked="checked"'?>>0:管理者
     <input type="radio" name="kanri_flg[]" value=1 <?php if($result['kanri_flg'] === '1') echo 'checked="checked"'?>>1:スーパー管理者
     </label><br>
     <label>life_flg：
     <input type="radio" name="life_flg[]" value=0 <?php if($result['life_flg'] === '0') echo 'checked="checked"'?>>0:退社
     <input type="radio" name="life_flg[]" value=1 <?php if($result['life_flg'] === '1') echo 'checked="checked"'?>>1:入社
     </label><br>
     <input type="hidden" name="id" value="<?= $result['id']?>">
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->
