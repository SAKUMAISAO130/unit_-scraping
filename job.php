
<?php
/*
* モデル読み込み
*/
require_once('./model_stack_data.php');
/*
* ライブラリ読み込み
*/
require_once('./simple_html_dom.php');

/*
* データ取得
*/

/*
* 取得元URL
*/
$uri = "https://www.amazon.co.jp/gp/top-sellers/books/ref=crw_ratp_ts_books";

/*
* 生DOM取得
*/
$html_str = @file_get_contents($uri);

/*
* DOMオブジェクトに変換
*/
$html_array = str_get_html($html_str);

/*
* 要素の取得
*/
$save_data = [];

echo '<pre>';

/*
* 取得するセクション番号
*/
$div_number = 2;

/*
* 取得実行
*/
// rank
$save_data['rank'] = trim(str_replace('.', '', $html_array->find("#zg_critical", 0)->find('.zg_itemRow', $div_number)
->find('div', 0)->find('div', 0)->find('div', 1)->find('div', 0)->find('span', 1)->innertext));
// title
$save_data['title'] = trim($html_array->find("#zg_critical", 0)->find('.zg_itemRow', $div_number)
->find('div', 0)->find('div', 0)->find('div', 1)->find('div', 1)->innertext);
// publisher
$save_data['publisher'] = trim($html_array->find("#zg_critical", 0)->find('.zg_itemRow', $div_number)
->find('div', 0)->find('div', 0)->find('div', 1)->find('div', 2)->find('.a-size-small', 0)->innertext);
// category
$save_data['category'] = trim($html_array->find("#zg_listTitle", 0)->find("span", 0)->innertext);
// category_second
$save_data['category_second'] = trim($html_array->find("#zg_critical", 0)->find('.zg_itemRow', $div_number)
->find('div', 0)->find('div', 0)->find('div', 1)->find('div', 2)->find('.a-size-small', 0)->innertext);
// link_image
$save_data['link_image'] = trim($html_array->find("#zg_critical", 0)->find('.zg_itemRow', $div_number)
->find('div', 0)->find('div', 0)->find('div', 0)->find('a', 0)->find('img', 0)->src);
// link_page
$save_data['link_page'] = trim('http://amazon.co.jp' . $html_array->find("#zg_critical", 0)->find('.zg_itemRow', $div_number)
->find('div', 0)->find('div', 0)->find('div', 0)->find('a', 0)->href);
// evaluation
$save_data['evaluation'] = trim($html_array->find("#zg_critical", 0)->find('.zg_itemRow', $div_number)
->find('div', 0)->find('div', 0)->find('div', 1)->find('div', 3));
if (strpos($save_data['evaluation'],'5つ星のうち') ) {
    $save_data['evaluation'] = trim($html_array->find("#zg_critical", 0)->find('.zg_itemRow', $div_number)
    ->find('div', 0)->find('div', 0)->find('div', 1)->find('div', 3)->find('a', 0)->find('i', 0)->innertext);
    $save_data['evaluation'] = trim(str_replace('5つ星のうち ', '', $save_data['evaluation']));
}else{
    $save_data['evaluation'] = null;

}
// price
$save_data['price'] = trim(str_replace(['￥',',',' '], '', $html_array->find("#zg_critical", 0)->find('.zg_itemRow', $div_number)
->find('div', 0)->find('div', 0)->find('div', 1)->find('div', 5)));
if (strpos($save_data['price'],'￥') ) {
    $save_data['price'] = trim(str_replace(['￥',',',' '], '', $html_array->find("#zg_critical", 0)->find('.zg_itemRow', $div_number)
    ->find('div', 0)->find('div', 0)->find('div', 1)->find('div', 5)->find('a', 0)->find('span', 0)->find('span', 0)->innertext));
}else{
    $save_data['price'] = trim(str_replace(['￥',',',' '], '', $html_array->find("#zg_critical", 0)->find('.zg_itemRow', $div_number)
    ->find('div', 0)->find('div', 0)->find('div', 1)->find('div', 4)->find('a', 0)->find('span', 0)->find('span', 0)->innertext));
}

// created_by
$save_data['created_by'] = 1;//固定値
// created_at
$save_data['created_at'] = date("Y-m-d H:i:s");//実行日時

var_dump($save_data);
exit;


var_dump($save_data);



/*
* INSERT
*/
$result_obj = new model_stack_data();
$result_insert = $result_obj->insert_query_run();


/*
* 失敗ログ書き込み
*/
if ($result_insert === false) {
    # code...
}


/*
* デバッグ
*/
echo '<pre>';
var_dump($result_insert);
exit;





?>
