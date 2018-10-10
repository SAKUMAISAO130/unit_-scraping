-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 
-- サーバのバージョン： 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo_scraping`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `stack_data`
--

CREATE TABLE `stack_data` (
  `id` int(11) NOT NULL COMMENT 'プライマリ',
  `title` varchar(255) DEFAULT NULL COMMENT 'タイトル',
  `category` varchar(255) DEFAULT NULL COMMENT 'カテゴリ名',
  `link_image` varchar(255) DEFAULT NULL COMMENT '画像URL',
  `link_page` varchar(255) DEFAULT NULL COMMENT '商品URL',
  `evaluation` double DEFAULT NULL COMMENT '商品評価',
  `price` int(11) DEFAULT NULL COMMENT '価格',
  `created_by` int(11) DEFAULT NULL COMMENT '作成者',
  `created_at` datetime DEFAULT NULL COMMENT '作成日時',
  `updated_by` int(11) DEFAULT NULL COMMENT '更新者',
  `updated_at` datetime DEFAULT NULL COMMENT '更新日時',
  `deleted_by` int(11) DEFAULT NULL COMMENT '削除者',
  `deleted_at` datetime NOT NULL COMMENT '削除日時'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stack_data`
--
ALTER TABLE `stack_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stack_data`
--
ALTER TABLE `stack_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'プライマリ';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
