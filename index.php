<?php
/*
* モデル読み込み
*/
require_once('./model_stack_data.php');
/*
* セレクトデータ作成
*/
$result_obj = new model_stack_data();
$result_select = $result_obj->select_stack_data();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>管理ページ</title>
</head>
<body>

<table class="table table-bordered  table-striped" style="font-size: 0.5em;">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">商品</th>
      <th scope="col">カテゴリ</th>
      <th scope="col" style="width:10px;">画像</th>
      <th scope="col">URL</th>
      <th scope="col">登録日</th>
    </tr>
  </thead>
  <tbody>
		<?php
			/*
			* セレクトデータ表示
			*/
			foreach ($result_select as $k => $v) {
				echo '<tr>';
					echo '<td>' . $v['id'] . '</td>';
					echo '<td>' . $v['title'] . '</td>';
					echo '<td>' . $v['category'] . '</td>';
					echo '<td>' . $v['link_image'] . '</td>';
					echo '<td>' . $v['link_page'] . '</td>';
					echo '<td>' . $v['created_at'] . '</td>';
				echo '</tr>';
			}
		?>
  </tbody>
</table>

    
	</body>
</html>


