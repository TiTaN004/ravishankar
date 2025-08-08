-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 08, 2025 at 06:36 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forms`
--

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `f_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `c_url` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `img_url` varchar(255) NOT NULL,
  `res_limit` int(11) DEFAULT NULL,
  `isActiveVender` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`f_id`, `title`, `c_url`, `created_at`, `status`, `img_url`, `res_limit`, `isActiveVender`) VALUES
('w0yiQ7bWsX', '24adyt', 'https://upstox.com/open-account/?f=24ADYT', '2025-02-05 10:00:48 AM', 0, '', NULL, 1),
('ZyC3RmJlWS', 'Aditya trade ', 'https://partners.trackopia.com/click?aid=668&oid=47&aff_sub={unique_user_id}', '2025-02-09 8:56:18 AM', 0, '', NULL, 1),
('wdjDFcaEGR', 'Motilal 1 device 1 account ', 'https://raghuvanshtechnologies.o18.click/c?o=21491390&m=7226&a=626068&aff_click_id={refer}{unique_user_id}', '2025-02-20 11:28:30 AM', 0, '', NULL, 1),
('WsvABuRy8p', 'Upstox ', 'https://upstox.com/open-account/?f=73ACQU', '2025-02-21 6:14:28 PM', 0, '', 0, 1),
('nY0ubcwNrp', 'Angel 27', 'https://a.aonelink.in/ANGOne/KboYSfe?utm_source=whatsapp&utm_medium=Jyoti&utm_campaign=Jyoti', '2025-02-27 2:17:49 PM', 0, '', NULL, 1),
('uyqVn3NzwE', 'Axis ', 'https://cl.adosiz.net/tracking/click/237652/5514/330673?unique_id=publisher_click_id&sub_id1=Jy0001_{refer}_{unique_user_id}', '2025-03-02 2:05:20 PM', 0, '', NULL, 1),
('idfatz4DgY', 'Angel login ', 'https://partnersales10607470.o18.click/c?o=20820938&m=12754&a=621286&sub_aff_id={refer}_{unique_user_id}', '2025-03-02 3:44:47 PM', 0, '', NULL, 1),
('oiQaFvI85z', 'Choice', 'https://partners.trackopia.com/click?aid=668&oid=187&aff_sub={unique_user_id}', '2025-03-02 6:23:49 PM', 0, '', NULL, 1),
('iKImBcGf5x', 'Aditya trade', 'https://partners.trackopia.com/click?aid=668&oid=47&aff_sub={refer}{unique_user_id}', '2025-03-05 1:32:50 PM', 0, '', NULL, 1),
('NuE75KOriR', 'Angel non login', 'https://partnersales10607470.o18.click/c?o=20820938&m=12754&a=621286&aff_click_id=', '2025-03-20 1:18:46 AM', 0, '', NULL, 1),
('WnsrbDVgjC', 'Mstock non', 'https://www.mstock.com/open-demat-account?utm_source=Rahul_YT&utm_medium=Youtube_BAU&utm_campaign=Rahul_Youtube_2024&utm_content=NT_JT&utm_adgroup=Rahul_BAU', '2025-03-26 1:35:27 AM', 0, '', 0, 1),
('lxz4g8G0IY', 'Motilal ', 'https://mosl.co/hBfoakgJSp', '2025-03-26 12:24:04 PM', 0, '', 0, 1),
('Ej3eMl9kwY', 'Axis demat ', 'https://cl.adosiz.net/tracking/click/237652/5514/330673?unique_id=publisher_click_id&sub_id1=Jy0001_{refer}_{unique_user_id}', '2025-04-01 4:58:12 PM', 0, '', NULL, 1),
('TQhURKDu70', 'Mstock trade ', 'https://www.mstock.com/open-demat-account?utm_source=Rahul_YT&utm_medium=Youtube_BAU&utm_campaign=Rahul_Youtube_2024&utm_content=APL25_JT&utm_adgroup=Rahul_BAU', '2025-04-01 5:00:31 PM', 0, '', NULL, 1),
('arxIKfL49D', 'Angel non login', 'https://partnersales10607470.o18.click/c?o=20820938&m=12754&a=621286&sub_aff_id={refer}_{unique_user_id}', '2025-04-04 11:26:14 AM', 0, '', NULL, 1),
('5MpWhKNvUA', 'Angel f&O', 'https://a.aonelink.in/ANGOne/o2kA3JO', '2025-04-04 3:39:46 PM', 0, '', NULL, 1),
('D4V7zShd9g', 'Angel trade', 'https://a.aonelink.in/ANGOne/htbseOi', '2025-04-07 2:10:28 PM', 0, '', NULL, 1),
('2AcuiI940J', 'Choice trade', 'https://choiceindia.com/open-free-demat-account?ref=QzAwMTc4NDc=&subref=NjIxMjg2', '2025-04-12 12:30:03 PM', 0, '', NULL, 1),
('7yRv3STj5N', 'Upstox trade', 'https://partnersales10607470.o18.click/c?o=20719196&m=12754&a=621286&sub_aff_id={refer}_{unique_user_id}', '2025-04-17 9:51:34 AM', 0, '', NULL, 1),
('wBV1vDezXN', 'Upstox aff', 'https://cl.adosiz.net/tracking/click/237666/5514/330686?unique_id=publisher_click_id&sub_id1=Jy0001_{refer}_{unique_user_id}', '2025-04-18 12:42:14 PM', 0, '', NULL, 1),
('4atnwxy1kg', 'Angel f&o', 'https://a.aonelink.in/ANGOne/pFCzFvA', '2025-04-26 9:57:11 PM', 0, '', NULL, 1),
('oGyKT5kEx8', 'Bajaj ', 'https://adzsquadmedia.o18.click/c?o=18723966&m=4604&a=534423&sub_aff_id={refer}_{unique_user_id}', '2025-04-27 3:56:28 PM', 0, '', NULL, 1),
('eLnrQ6Wymk', 'Angel first trade', 'https://a.aonelink.in/ANGOne/WzUHG0S', '2025-05-01 11:53:37 AM', 0, '', NULL, 1),
('dE8nWAfV3a', 'Angel login 3', 'https://a.aonelink.in/ANGOne/t4ULphe?utm_source=faceBook&utm_medium=Jyoti&utm_campaign=NR', '2025-05-01 11:53:50 AM', 0, '', NULL, 1),
('ykADYsf0hl', 'Upstox 2SCBWX', 'https://upstox.com/open-account/?f=2SCBWX', '2025-05-05 9:47:28 AM', 0, '', 0, 1),
('sIg9tbd57y', 'Choice A', 'https://partners.trackopia.com/click?aid=668&oid=187&aff_sub={unique_user_id}', '2025-05-06 1:13:29 AM', 0, '', NULL, 1),
('EHFaMN5z3t', 'Upstox affiliate ', 'https://cl.adosiz.net/tracking/click/237666/5460/330686?unique_id=publisher_click_id&sub_id1=jy0{refer}_{unique_user_id}', '2025-05-09 3:01:50 PM', 0, '', NULL, 1),
('B1TU49o3IN', 'Upstox first trade', 'https://partnersales10607470.o18.click/c?o=20497662&m=12754&a=621286&sub_aff_id={refer}_{unique_user_id}', '2025-05-09 5:36:41 PM', 0, '', NULL, 1),
('SgBvolRZnW', 'Angel f&o', 'https://a.aonelink.in/ANGOne/t4ULphe?utm_source=faceBook&utm_medium=Jyoti&utm_campaign=F', '2025-05-10 11:06:30 AM', 0, '', NULL, 1),
('Z5wIpCzUu8', 'Angel non login', 'https://a.aonelink.in/ANGOne/fqk1IM0?utm_source=mail&utm_medium=VO&utm_campaign=Vishu04', '2025-05-19 2:30:38 PM', 0, '', NULL, 1),
('EaQZpvwkL0', '5 paisa f&o', 'https://adzsquadmedia.o18.click/c?o=21589246&m=4604&a=534423&sub_aff_id={refer}', '2025-05-21 1:19:58 PM', 0, '', NULL, 1),
('eSxi1btzqE', 'Axis securities ', 'https://cl.adosiz.net/tracking/click/240027/5392/333117?unique_id=publisher_click_id&sub_id1=Jy001_{refer}_{unique_user_id}', '2025-05-24 12:07:36 PM', 0, '', NULL, 1),
('GuI9bgXhln', 'Mstock ', 'https://www.mstock.com/open-demat-account?utm_source=BhagwanJha&utm_medium=Affiliates&utm_campaign=BhagwanJha_1234&utm_content=Jyoti&utm_adgroup=BhagwanJha_BAU', '2025-05-27 2:28:06 PM', 0, '', NULL, 1),
('sAjQl0ktH8', 'Starbucks', 'https://partnersales10607470.o18.click/c?o=21653947&m=12754&a=398149&sub_aff_id={refer}', '2025-05-27 4:06:54 PM', 0, '', NULL, 1),
('retJH3qCKg', 'Axis trade', 'https://cl.adosiz.net/tracking/click/240027/5392/333117?unique_id=publisher_click_id&sub_id1=Jy001', '2025-05-27 5:37:26 PM', 0, '', NULL, 1),
('cLHAKzZGQs', '28AXAY upstox', 'https://upstox.com/open-account/?f=28AXAY', '2025-06-02 6:31:33 AM', 0, '', 0, 1),
('VZtRPluze6', 'Angel login june', 'https://a.aonelink.in/ANGOne/t4ULphe?utm_source=faceBook&utm_medium=Jyoti&utm_campaign=Link1', '2025-06-02 9:46:31 AM', 0, '', NULL, 1),
('JFbc3VpUiQ', 'Angel first trade', 'https://a.aonelink.in/ANGOne/kJkpvY3', '2025-06-05 3:20:22 PM', 0, '', NULL, 1),
('A2Lu4tx8WH', 'Upstox first trade', 'https://upstox.com/open-account/?f=V0JH', '2025-06-06 12:49:55 PM', 0, '', NULL, 1),
('qFZ5I4zcTn', 'Upstox aff', 'https://cl.adosiz.net/tracking/click/240596/5392/333694?unique_id=publisher_click_id&sub_id1=jy001{refer}_{unique_user_id}', '2025-06-07 3:42:53 PM', 0, '', NULL, 1),
('uSiDaPIcoC', 'Mstock trade 2', 'https://www.mstock.com/open-demat-account?utm_source=BhagwanJha&utm_medium=Affiliates&utm_campaign=BhagwanJha_1234&utm_content=JUNE25_Jyt&utm_adgroup=BhagwanJha_BAU', '2025-06-08 10:00:43 AM', 0, '', NULL, 1),
('NxPBwuGAmF', 'Bajaj non', 'https://adzsquadmedia.o18.click/c?o=21423406&m=4604&a=534423&sub_aff_id={refer}_{unique_user_id}', '2025-06-10 11:55:20 AM', 0, '', NULL, 1),
('Ksqnx8ukA5', 'Kotak 811', 'https://partnersales10607470.o18.click/c?o=20768992&m=12754&a=621286&sub_aff_id={refer}_{unique_user_id}', '2025-06-10 3:25:40 PM', 0, '', NULL, 1),
('tIPxyKoeGY', 'Upstox trade ', 'https://upstox.com/open-account/?f=V0JH', '2025-06-10 3:27:00 PM', 0, '', 0, 1),
('x4vFcbP5S1', 'Kotak', 'https://partnersales10607470.o18.click/c?o=20768992&m=12754&a=621286&sub_aff_id=', '2025-06-12 3:00:17 PM', 0, '', NULL, 1),
('cthsdV7yOm', 'Angel dra', 'https://a.aonelink.in/ANGOne/pWUdJ6v?utm_source=twitter&utm_medium=DRA&utm_campaign=JYT', '2025-06-14 11:51:15 AM', 0, '', NULL, 1),
('PakwVi3H08', '4HBLYP upstox 120', 'https://upstox.com/open-account/?f=4HBLYP', '2025-06-18 11:59:50 AM', 0, '', 0, 1),
('eWDQb8GSTX', 'Axis mf', 'https://partners.trackopia.com/click?aid=668&oid=116&aff_sub=', '2025-06-18 11:36:21 PM', 0, '', NULL, 1),
('1XjRshJVnD', 'Tide', 'https://digigrove.gotrackier.com/click?campaign_id=486&pub_id=266&gaid=&p1=(your-transaction-id)&source=(your-sub-aff-id)', '2025-06-19 1:43:53 PM', 0, '', NULL, 1),
('Ynvo3ztClP', 'upstox july  7TBCXJ', 'https://upstox.com/open-account/?f=7TBCXJ', '2025-06-20 12:18:14 PM', 0, '', 10, 1),
('Rlw4kuLC2q', 'Upstox non web DH', 'https://digigrove.gotrackier.com/click?campaign_id=344&pub_id=266&p1=(your-transaction-id)&source={refer}{unique_user_id}', '2025-06-20 12:54:50 PM', 0, '', NULL, 1),
('WeuU5h6LSY', 'Money control', 'https://spectrum.gotrackier.com/click?campaign_id=1186&pub_id=1913', '2025-06-20 1:15:28 PM', 0, '', 0, 1),
('tbcSTpZ21P', 'Motilal 23june', 'https://partnersales10607470.o18.click/c?o=21658521&m=12754&a=621286&sub_aff_id={unique_user_id}', '2025-06-23 1:48:49 PM', 0, '', NULL, 1),
('VdQi0LJmNq', 'Upstox..', 'https://adzsquadmedia.o18.click/c?o=21446076&m=4604&a=674649&sub_aff_id={refer}_{unique_user_id}', '2025-06-23 3:52:44 PM', 1, '', NULL, 1),
('ZEMtcFhKyj', 'Axis 23 june', 'https://partnersales10607470.o18.click/c?o=21285270&m=12754&a=621286&sub_aff_id={refer}_{unique_user_id}', '2025-06-23 4:24:01 PM', 0, '', NULL, 1),
('b9ELY5cKWd', 'Axis 23 june', 'https://partnersales10607470.o18.click/c?o=21285270&m=12754&a=621286&sub_aff_id={refer}_{unique_user_id}', '2025-06-23 4:24:14 PM', 0, '', NULL, 1),
('10y9ABQi52', 'Hdfc ', 'https://partnersales10607470.o18.click/c?o=20790667&m=12754&a=621286&sub_aff_id=', '2025-06-24 4:09:11 PM', 0, '', 110, 1),
('oD7f5eHCuE', 'Angel one25june', 'https://a.aonelink.in/ANGOne/TeXdR05?utm_source=Mohit+&utm_medium=CPC&utm_campaign=Mohit', '2025-06-26 6:18:02 PM', 0, '', NULL, 1),
('G3pkhN8L0f', 'Mstock trade', 'https://www.mstock.com/open-demat-account?utm_source=BhagwanJha&utm_medium=Affiliates&utm_campaign=BhagwanJha_1234&utm_content=TT_YourCode&utm_adgroup=BhagwanJha_BAU', '2025-06-27 8:49:09 PM', 0, '', NULL, 1),
('T6npy81BPj', 'Finone', 'https://adzsquadmedia.o18.click/c?o=21703725&m=4604&a=122798&sub_aff_id={refer}_{unique_user_id}', '2025-07-01 1:08:49 PM', 0, '', NULL, 1),
('D2TLX0YHWB', 'Bajaj july', 'https://adzsquadmedia.o18.click/c?o=21706387&m=4604&a=534423', '2025-07-03 1:10:05 PM', 1, '', NULL, 1),
('ztXVeKorip', 'Pytm money Trade', 'https://adzsquadmedia.o18.click/c?o=20494573&m=4604&a=534423&sub_aff_id={refer}_{unique_user_id}', '2025-07-03 1:13:07 PM', 0, '', NULL, 1),
('26TpI0aEDV', '5 paisa F&o trade', 'https://partnersales10607470.o18.click/c?o=21228990&m=12754&a=621286&sub_aff_id={refer}_{unique_user_id}', '2025-07-04 7:59:40 AM', 1, '', NULL, 1),
('w05LkjMegW', 'Airtel payment bank (first deposit)', 'https://partnersales10607470.o18.click/c?o=21172833&m=12754&a=621286&sub_aff_id={refer}_{unique_user_id}', '2025-07-04 8:02:57 AM', 1, '', NULL, 1),
('NfELTrhdix', 'Axis saving (5000 deposit)', 'https://partnersales10607470.o18.click/c?o=20217360&m=12754&a=621286&sub_aff_id={refer}_{unique_user_id}', '2025-07-04 8:04:22 AM', 1, '', NULL, 1),
('VGL0du5qA3', 'Indusind saving', 'https://partnersales10607470.o18.click/c?o=20757172&m=12754&a=621286&sub_aff_id={refer}_{unique_user_id}', '2025-07-04 8:05:27 AM', 1, '', NULL, 1),
('qEKWVbu27i', 'Kotak 811', 'https://partnersales10607470.o18.click/c?o=20768992&m=12754&a=621286&sub_aff_id={refer}_{unique_user_id}', '2025-07-04 8:06:40 AM', 1, '', NULL, 1),
('SfmLQwgjE5', 'Mstock trade july', 'https://www.mstock.com/open-demat-account?utm_source=Rahul_YT&utm_medium=Youtube_BAU&utm_campaign=Rahul_Youtube_2024&utm_content=July5_JYT&utm_adgroup=Rahul_BAU', '2025-07-04 2:22:36 PM', 0, '', NULL, 1),
('wlR6ChbcUP', 'Tide', 'https://partnersales10607470.o18.click/c?o=20642093&m=12754&a=621286&sub_aff_id={refer}_{unique_user_id}', '2025-07-07 12:37:04 PM', 1, '', NULL, 1),
('2y0PcB8qp7', 'Small cese', 'https://cl.adosiz.net/tracking/click/239788/5392/332878?unique_id=publisher_click_id&sub_id1=JY0001{refer}_{unique_user_id}', '2025-07-07 3:33:49 PM', 1, '', NULL, 1),
('SWk1lu8m4V', 'Upstox ...', 'https://adzsquadmedia.o18.click/c?o=21446076&m=4604&a=122798&sub_aff_id={refer}_{unique_user_id}', '2025-07-07 4:30:36 PM', 1, '', NULL, 1),
('KbHF5nv0Dy', 'Bajaj 2', 'https://adzsquadmedia.o18.click/c?o=21707467&m=4604&a=534423', '2025-07-08 2:36:34 PM', 0, '', NULL, 1),
('UAwBMN0JCT', 'Motilal 120', 'https://partnersales10607470.o18.click/c?o=21708850&m=12754&a=621286&sub_aff_id={refer}_{unique_user_id}', '2025-07-09 5:43:46 PM', 0, '', 206, 1),
('Xhy8cdYVxu', 'Tide first investment ', 'https://play.google.com/store/apps/details?id=co.tide.tideplatform.in', '2025-07-09 5:44:32 PM', 1, '', NULL, 1),
('iIO60f3T9L', 'Tide non', 'https://partnersales10607470.o18.click/c?o=20642093&m=12754&a=621286&sub_aff_id={refer}{unique_user_id}', '2025-07-09 5:59:14 PM', 1, '', NULL, 1),
('cjKuI5MFvD', 'Mstock 1', 'https://mstock.onelink.me/CX05/7w0omnjy', '2025-07-09 6:05:51 PM', 0, '', 0, 1),
('BYunCU0tZE', 'Mstock 2', 'https://mstock.onelink.me/CX05/ial6hn31', '2025-07-09 6:08:35 PM', 0, '', 0, 1),
('yhtUZ4eu5T', 'Bajaj 4', 'https://adzsquadmedia.o18.click/c?o=21707467&m=4604&a=534423', '2025-07-10 4:42:30 PM', 0, '', NULL, 1),
('XAKu0Oo84i', 'Pytm...', 'https://adzsquadmedia.o18.click/c?o=20494573&m=4604&a=122798&sub_aff_id={refer}_{unique_user_id}', '2025-07-10 4:49:41 PM', 0, '', NULL, 1),
('BsnKMIua8X', 'Mstock trade', 'https://tinyurl.com/7zsa7kyd', '2025-07-10 4:59:06 PM', 0, '', NULL, 1),
('JV2S8iZK5d', 'Upstox aff', 'https://cl.adosiz.net/tracking/click/240596/5392/333694?unique_id=publisher_click_id&sub_id1=Jy001{unique_user_id}', '2025-07-11 6:10:52 PM', 0, '', NULL, 1),
('fV0kvndarq', 'Bajaj mf', 'https://partnersales10607470.o18.click/c?o=20664317&m=12754&a=621286&sub_aff_id={refer}_{unique_user_id}', '2025-07-16 7:57:10 PM', 1, '', NULL, 1),
('B3FzxI7Xft', 'Angel one', 'https://angel-one.onelink.me/Wjgr/av47z5rv', '2025-07-17 12:40:34 PM', 0, '', 0, 1),
('jJmTGoKCgl', 'First trade uostox', 'https://upstox.com/open-account/?f=7MAUV8', '2025-07-17 4:34:11 PM', 0, '', NULL, 1),
('7waEyIqWi8', 'Upstox first trade', 'https://upstox.com/open-account/?f=7MAUV8', '2025-07-18 9:27:29 AM', 0, '', 0, 1),
('FG7aRvCjDd', 'Angel login', 'https://a.aonelink.in/ANGOne/eh6VAn9?utm_source=offline&utm_medium=Jyoti&utm_campaign=628439', '2025-07-20 11:10:37 AM', 0, '', NULL, 1),
('lTpBaZsd7w', 'Aditya gold', 'https://partners.trackopia.com/click?aid=668&oid=130&aff_sub={unique_user_id}', '2025-07-23 4:31:45 PM', 1, '', NULL, 1),
('xVsTCbpeUE', 'Open Demat Account ', 'https://upstox.com/open-account/?f=KE7367', '2025-07-26 2:57:54 PM', 1, 'uploads/2025-07-26_2-57-54_PM', NULL, 0),
('tc1eZI3MRL', 'Upstox Augest', 'https://upstox.com/open-account/?f=24ADYT', '2025-07-26 3:02:48 PM', 1, 'uploads/2025-07-26_3-02-48_PM', NULL, 1),
('RnVtcbuOrN', 'test1', 'test1', '2025-07-26 4:14:00 PM', 1, '', NULL, 0),
('CoHjUNkSnb', 'Upstox augest', 'https://upstox.com/open-account/?f=24ADYT', '2025-08-02 3:07:29 AM', 1, '', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `form_data`
--

CREATE TABLE `form_data` (
  `id` int(11) NOT NULL,
  `u_id` varchar(225) NOT NULL DEFAULT uuid(),
  `field_1` varchar(225) NOT NULL,
  `field_2` varchar(255) NOT NULL,
  `field_3` varchar(255) NOT NULL,
  `field_4` varchar(255) NOT NULL,
  `field_5` varchar(255) NOT NULL,
  `location_city` varchar(255) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `refer_num` varchar(255) NOT NULL,
  `form_title` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `date_time` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `f_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_data`
--

INSERT INTO `form_data` (`id`, `u_id`, `field_1`, `field_2`, `field_3`, `field_4`, `field_5`, `location_city`, `latitude`, `longitude`, `refer_num`, `form_title`, `created_at`, `date_time`, `f_id`) VALUES
(1, '25d8069e-73a7-11f0-be50-9675a3fe9cbb', 'manan', '7043860209', 'mananrathod214@gmail.com', 'test', '', NULL, NULL, NULL, '', 'Upstox augest', '2025-08-07 5:56:58 PM', '2025-08-07 21:26:58', 'CoHjUNkSnb'),
(2, 'a952e7fa-7410-11f0-9052-9675a3fe9cbb', 'manan', '7874760209', 'mananrathod45@gmail.com', 'test', '', 'Rajkot, Gujarat', 22.29040000, 70.79150000, '', 'Upstox augest', '2025', '2025-08-08 10:02:15', 'CoHjUNkSnb'),
(3, 'd4d32da4-7410-11f0-9052-9675a3fe9cbb', 'manan', '7874760208', 'gp12@gmail.com', 'test', '', 'Rajkot', 22.30928135, 70.75196457, '', 'Upstox augest', '2025', '2025-08-08 10:03:28', 'CoHjUNkSnb');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form_data`
--
ALTER TABLE `form_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_location` (`location_city`),
  ADD KEY `idx_coordinates` (`latitude`,`longitude`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form_data`
--
ALTER TABLE `form_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
