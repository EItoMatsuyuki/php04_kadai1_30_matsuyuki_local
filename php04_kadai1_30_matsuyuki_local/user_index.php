<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>新規ユーザー登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン画面に戻る</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->
<!-- Main[Start] -->
<form method="POST" action="user_insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>新規ユーザー登録画面</legend>
     <label>name：<input type="text" name="name"></label><br>
     <label>lid：<input type="text" name="lid"></label><br>
     <label>lpw：<input type="text" name="lpw"></label><br>
     <label>kanri_flg：
     <input type="radio" name="kanri_flg[]" value=0 checked="checked">0:管理者
     <input type="radio" name="kanri_flg[]" value=1>1:スーパー管理者
     </label><br>
     <label>life_flg：
     <input type="radio" name="life_flg[]" value=0 checked="checked">0:退社
     <input type="radio" name="life_flg[]" value=1>1:入社
     </label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->
</body>
</html>