<?php
		/*
		 * ライブラリ
		 */
    require_once('simple_html_dom.php');

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


		// echo '<pre>';
		// var_dump($html_array);

		// var_dump($html_str);

		echo '<pre>';

		/*
		 * それぞれの要素を取得
		 */

		//仕切り
		print_r('<hr>');

		//リンク
		var_dump('http://amazon.co.jp' . $html_array->find("#zg_critical .zg_itemRow a")[0]->href);

		//タイトル
		var_dump($html_array->find("#zg_critical .zg_itemRow img")[0]->alt);

		//画像（画像URL）
		var_dump($html_array->find("#zg_critical .zg_itemRow img")[0]->src);

		//評価
 		var_dump($html_array->find("#zg_critical .zg_itemRow div div div div a i span ")[0]->innertext);

		//仕切り
		print_r('<hr>');

		//リンク
		var_dump('http://amazon.co.jp' . $html_array->find(".zg_itemRow a")[2]->href);

		//タイトル
		var_dump($html_array->find(".zg_itemRow img")[2]->alt);

		//画像（画像URL）
		var_dump($html_array->find(".zg_itemRow img")[2]->src);

		//評価
 		var_dump($html_array->find("#zg_critical .zg_itemRow div div div div a i span ")[2]->innertext);

		//仕切り
		print_r('<hr>');

		//リンク
		var_dump('http://amazon.co.jp' . $html_array->find(".zg_itemRow a")[4]->href);

		//タイトル
		var_dump($html_array->find(".zg_itemRow img")[4]->alt);

		//画像（画像URL）
		var_dump($html_array->find(".zg_itemRow img")[4]->src);

		//評価
 		var_dump($html_array->find("#zg_critical .zg_itemRow div div div div a i span ")[4]->innertext);
