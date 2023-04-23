-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 25, 2021 at 06:13 PM
-- Server version: 10.3.31-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ospdev_v1`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_providers`
--

CREATE TABLE `api_providers` (
  `id` int(10) UNSIGNED NOT NULL,
  `ids` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` decimal(15,5) DEFAULT NULL,
  `currency_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created` datetime DEFAULT NULL,
  `changed` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `api_providers`
--

INSERT INTO `api_providers` (`id`, `ids`, `uid`, `name`, `url`, `key`, `balance`, `currency_code`, `description`, `status`, `created`, `changed`) VALUES
(2, '17e2f44151d9628d2aa18bb3f157788d', 1, 'SocialKart.in', 'https://socialkart.in/api/v2', '1108d1529518632dbef2f22f562181a7', 0.10000, NULL, 'API', 1, '2021-09-25 18:59:28', '2021-09-25 18:59:28');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `ids` text DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `created` datetime DEFAULT NULL,
  `changed` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `ids`, `uid`, `name`, `desc`, `image`, `sort`, `status`, `created`, `changed`) VALUES
(1, '35445187657c30df807bb1ac5128f999', 1, '♛ SocialKart Promo ⭐', NULL, NULL, 0, 1, '2021-09-25 19:00:21', '2021-09-25 19:00:21');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `ids` text DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `question` text DEFAULT NULL,
  `answer` longtext DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `created` datetime DEFAULT NULL,
  `changed` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `ids`, `uid`, `question`, `answer`, `sort`, `status`, `created`, `changed`) VALUES
(38, '58a30f4cac11b9c27332fb1bfb47f597', 38, 'What is Cancel and Partial status?', '<p><span>Partial Status is when we partially refund the remains of an order. Sometimes for some reasons, we are unable to deliver a full order, so we refund you the remaining undelivered amount. Example: You bought an order with quantity 10000 and charges $10, let\'s say we delivered 9000 and the remaining 1000 we couldn\'t deliver, then we will </span><span xss=\"removed\"><strong>Partial</strong></span><span> the order and refund you the remaining 1000 ($1 in this example). For orders issue problem usually takes up 24-48HR automatic solve the problem. If the status is Partially Completed / Canceled it means Smm-Panel System can\'t give more likes / followers to the current page or post and money automatically refunded for remains likes / followers. Please order in the different server in that case.</span></p>', 1, 1, '2020-05-05 06:46:34', '2020-05-05 06:46:34'),
(39, 'aeff775f290fcd8af02ac13f41467db1', 38, 'What is Drip Feed?', '<p><span>Drip Feed is a service that we are offering so you would be able to put the same order multiple times automatically. Example: let\'s say you want to get 1000 likes on your Instagram Post but you want to get 100 likes each 30 minutes, you will put Link: Your Post Link Quantity: 100 Runs: 10 (as you want to run this order 10 times, if you want to get 2000 likes, you will run it 20 times, etc…) Interval: 30 (because you want to get 100 likes on your post each 30 minutes, if you want each hour, you will put 60 because the time is in minutes) P.S: Never order more quantity than the maximum which is written on the service name (Quantity x Runs), Example if the service\'s max is 4000, you don’t put Quantity: 500 and Run: 10, because total quantity will be 500x10 = 5000 which is bigger than the service max (4000). Also never put the Interval below the actual start time (some services need 60 minutes to start, don’t put Interval less than the service start time or it will cause a fail in your order). Lastly, remind user not to use much now days on most server, because the server delayed the time and start time hard to control issue, please try understanding the start time before set the drip feed. Only recommended very less server which instant start and instant add on to use, otherwise will loss amount completed.</span></p>', 2, 1, '2020-05-05 06:46:57', '2020-05-05 06:46:57'),
(40, 'de79f2d271cfeb8e5597afcf16afa6a4', 38, 'How do I use mass order?', '<p>You put the service ID followed by | followed by the link followed by | followed by quantity on each line To get the service ID of a service please check here: <a href=\"https://greatsmo.com/services\">https://greatsmo.com/services</a> Let’s say you want to use the Mass Order to add Instagram Followers to your 3 accounts: abcd, asdf, qwer From the Services List @ <a href=\"https://greatsmo.com/services\">https://greatsmo.com/services</a>, the service ID for this service “Instagram Followers [15K] [REAL] ” is 102 Let’s say you want to add 1000 followers for each account, the output will be like this: ID|Link|Quantity or in this example:</p>\r\n<p>102|abcd|1000</p>\r\n<p>102|asdf|1000</p>\r\n<p>102|qwer|1000</p>', 3, 1, '2020-05-05 06:47:59', '2020-05-05 06:47:59'),
(41, 'fc8efa33a99c635717fe7b2d31d22516', 38, 'Cancel button / Refill button is not working for me?', '<p><span>The cancel or refill button sends a trigger to cancel or refill an order, it doesn\'t work instantly, it\'s just a trigger, sometimes it\'s too late to stop an order, and sometimes an order might not need refill, because your no drop or dropped by not the service you order on this.</span></p>', 4, 1, '2020-05-05 06:48:26', '2020-05-05 06:48:26'),
(42, '73c4118756122e6ec40428d02918ecb7', 38, 'Can I get a discount and bonus?', '<p><span>Yes we can </span><strong>offer</strong><span> it if you are a big buyer!</span></p>', 5, 1, '2020-05-05 06:48:47', '2020-05-05 06:48:47'),
(43, '98c6294fe9c50c69b6272eef40874e5b', 38, 'Which can add fund by Auto Instant? PayPal or Stripe?', '<p><span>You can use Paypal & Stripe whenever you want by following the instructions in the Add Funds page (manual use) To have it automatically enabled, you have to have added at least 50$ in your account, and then you can send us a ticket with your username to enable it for you!</span></p>', 6, 1, '2020-05-05 06:49:06', '2020-05-05 06:49:06'),
(44, '24af590e507b226918d831fb243ad676', 38, 'Does drip feed work with mass order / or with API?', '<p><span>Drip Feed doesn\'t work with neither </span><strong>Mass Order</strong><span> nor API.</span></p>', 7, 1, '2020-05-05 06:49:27', '2020-05-05 06:49:27'),
(45, '44a32ca56a66ae702a6904707fd26318', 38, 'Do you accept Paytm?', '<p><span>Yes, we accept PAYTM!</span></p>', 8, 1, '2020-05-05 06:49:49', '2020-05-05 06:49:49'),
(46, '086cfda1602b56bc6faf7f54aec55d99', 38, 'How to get youtube comment link?', '<p><span>Find the timestamp that is located next to your username above your comment (for example: 3 days ago) and hover over it then right click and Copy Link Address.</span><br><span>The link will be something like this: https://www.youtube.com/watch?v=12345&lc=a1b21etc instead of just https://www.youtube.com/watch?v=12345</span><br><span>To be sure that you got the correct link, paste it in your browser\'s address bar and you will see that the comment is now the first one below the video and it says </span><em>Highlighted comment</em><span>.</span></p>', 9, 1, '2020-05-05 06:50:07', '2020-05-05 06:50:07'),
(47, 'b50934938c4b4210c982aebf6337cd5d', 38, 'Which youtube view service can be used with monetizable video?', '<p><span>The one that has \\\"Monetized\\\" in its service\' name. Always check newest updated and your order list to process.</span></p>', 10, 1, '2020-05-05 06:50:28', '2020-05-05 06:50:28'),
(48, '1dc5e0961782f7bcd6222b0eee22034d', 38, 'What is Instagram mentions, how do you use it?', '<p><span>Instagram Mention is when you mention someone on Instagram (example @abcde this means you have mentioned abcde under this post and abcde will receive a notification to check the post). Basically the Instagram Mentions [User Followers], you put the link of your post, and the username of the person that you want us to mention HIS FOLLOWERS!</span></p>', 11, 1, '2020-05-05 06:51:08', '2020-05-05 06:51:08'),
(49, 'ef24fbe3d1b5b694fa172379ca25f70f', 38, ' What is Instagram impressions?', '<p><span>Impression means reach (also how many users have seen your post) it is mostly used with brands, they will ask you to show them statistic of the impressions your posts have.</span></p>', 12, 1, '2020-05-05 06:51:28', '2020-05-05 06:51:28'),
(50, '9b694659ab3893de503ceb227225399d', 38, 'The link must be added before the user goes live or after?', '<p><span>After he goes live, or just 5 seconds before he goes!</span></p>', 13, 1, '2020-05-05 06:51:48', '2020-05-05 06:51:48'),
(51, '4057b3b52ad87883d6812416a807ddb9', 38, 'What is VIP service?', '<p><span>VIP Support For 10 (20 or 30 Days) We Will Answer Your Tickets Have You On Skype And Have Your Phone Number For 24/7 Hours Priority VIP Support For Any Order Open A Ticket After You Purchase This Service And Send Order ID Quantity Must Be 1000</span></p>', 13, 1, '2020-05-05 06:52:12', '2020-05-05 06:52:12'),
(52, 'f6130ef52317216dcce13a80b51f7558', 38, 'What is Instagram Saves, and what does it do?', '<p><span>Instagram Saves is when a user saves a post to his history on Instagram (by pressing the save button near the like button). A lot of saves for a post increase its impression.</span></p>', 14, 1, '2020-05-05 06:52:32', '2020-05-05 06:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `general_custom_page`
--

CREATE TABLE `general_custom_page` (
  `id` int(11) NOT NULL,
  `ids` text DEFAULT NULL,
  `pid` int(1) DEFAULT 1,
  `position` int(1) DEFAULT 0,
  `name` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `general_file_manager`
--

CREATE TABLE `general_file_manager` (
  `id` int(11) NOT NULL,
  `ids` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `file_name` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `file_type` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `file_ext` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `file_size` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `is_image` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `image_width` int(11) DEFAULT NULL,
  `image_height` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general_file_manager`
--

INSERT INTO `general_file_manager` (`id`, `ids`, `uid`, `file_name`, `file_type`, `file_ext`, `file_size`, `is_image`, `image_width`, `image_height`, `created`) VALUES
(316, '2fcbdcdbf04b079fb9d4f952a1af21f6', 38, 'fbada030fe98f98eca9b6db5a13bb5f9.png', 'image/png', 'png', '19.15', '1', 1679, 1679, '2020-05-05 02:55:55'),
(317, '85ac89dce45c27ce8445c8e1df563ebd', 38, 'e20b34335538731accbecba04dd082f0.png', 'image/png', 'png', '153.67', '1', 1920, 438, '2020-05-05 02:56:01'),
(318, 'dd5f3eb0460b78da2f63f0b93ffde1bd', 38, 'a2fd6002501165cb954a0e8315f0bb11.png', 'image/png', 'png', '150', '1', 1920, 438, '2020-05-05 02:56:37'),
(319, 'ca424865d8a19ea0a1430ec3e989427f', 38, 'a26f909852c4f9f9f543b5a059b2ae15.png', 'image/png', 'png', '152.09', '1', 1920, 438, '2020-05-05 06:01:51'),
(320, 'df8ce1c0c1721de9a908b756054b049b', 38, 'cb74b00056f42debf4ab615f656c6272.png', 'image/png', 'png', '165.82', '1', 1920, 438, '2020-05-05 06:02:36'),
(321, '2543a5c8aa608ff0de6405722754bb61', 1, '1526d8e5aabc4d1b4da1341e5d83d6c9.png', 'image/png', 'png', '236.15', '1', 3264, 932, '2020-07-21 17:01:23'),
(322, 'c4249f72e3f13a68eac3f1dfe764b3db', 1, 'f88f61f8672b841156cac5a166f4190b.png', 'image/png', 'png', '23.41', '1', 560, 160, '2020-07-21 17:03:28'),
(323, '54d2d2eb1ad06125fd5780ab724c9d61', 1, '328027ac1b735f103d856daffb335c7d.png', 'image/png', 'png', '300.74', '1', 3264, 932, '2020-08-24 16:50:30'),
(324, '28e2952188e012f0d580d0a8f3579323', 1, 'aeb0771913ac4553032d65e6bb3df621.png', 'image/png', 'png', '45.62', '1', 560, 160, '2020-08-24 16:52:44');

-- --------------------------------------------------------

--
-- Table structure for table `general_lang`
--

CREATE TABLE `general_lang` (
  `id` int(11) NOT NULL,
  `ids` varchar(100) DEFAULT NULL,
  `lang_code` varchar(10) DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `general_lang`
--

INSERT INTO `general_lang` (`id`, `ids`, `lang_code`, `slug`, `value`) VALUES
(1, '94cfce44c05e561c9757cbd01df9fc29', 'en', 'coinbase_confirm_form', 'Coinbase Confirm Form'),
(2, '1662f706d4a8e3e65b15020a26b4f180', 'en', 'coinbase_confirm_form_note', 'After Click \"Submit\", you will be redirected to Coinbase Commerce to commplete your Deposit payment securely.                                                                                                                                                                                                                                                                                        '),
(3, '1915ccee80c1e51cfece0a492a64e008', 'en', 'coinpayments_integration', 'Coinpayments Integration'),
(4, 'fada34f9e16469ab9100c70898702d3e', 'en', 'coin_acceptance_settings', 'Coin Acceptance Settings:'),
(5, '0ed8af4600d9ee57cc86941773b6a1d8', 'en', 'make_sure_the_list_of_coins_have_the_enabled_status_in', 'Make sure the list of coins have the \'Enabled\' status in'),
(6, '437f2b6051fdff176332634cf12fd665', 'en', 'coinpayments_confirm_form', 'Coinpayments confirm form'),
(7, '3d700721655689f8c0e5c9304483f9bc', 'en', 'choose_your_coin', 'Choose Your Coin'),
(8, 'e9548b507a2128cb247b6c4f91c6491f', 'en', 'Statistics', 'Statistics'),
(9, '2c40d0e7b4a50893373bbe38d8718ecd', 'en', 'Services', 'Services'),
(10, 'bc7b14129eafd5e9753627d7441d0346', 'en', 'Order', 'Order'),
(11, '46b9f12bdddd13b7aaf561e4f6b3ef6f', 'en', 'order_logs', 'Order Logs'),
(12, '694fec752840535448e3efa524fb4ac0', 'en', 'New_order', 'New Order'),
(13, 'fa5d98fad80aceb9700a3116b4e47510', 'en', 'API', 'API'),
(14, '238e1486c70202293ea5590b1d1b437f', 'en', 'user_manager', 'User manager'),
(15, '7ee28ed0f98f05fb60c7dc049b069461', 'en', 'user_activity_logs', 'User Activity Logs'),
(16, 'd2df7b5f4a75d0011ed59a7a2dbc2864', 'en', 'banned_ip_address_list', 'Banned IP Address List'),
(17, '448e4c084ef22ed446e859b7f3ef143c', 'en', 'system_settings', 'System Settings'),
(18, 'f29d1cd4fdfe3590f2d7f8cefddd7eae', 'en', 'API_providers', 'API Providers'),
(19, '5c28d72d4a7395ec9e3157ab0355f973', 'en', 'Language', 'Language'),
(20, '423a7efd4cff082b7561345c9c3479c3', 'en', 'Documentation', 'Documentation'),
(21, '25053278c52c04e6d8c600334f52ab16', 'en', 'Support', 'Support'),
(22, 'de27dc18553ac131980ad82e796c6a05', 'en', 'Profile', 'Profile'),
(23, 'd00bb91c39ffa46c1d6a1d09fda69831', 'en', 'Admin_account', 'Admin account'),
(24, '6251d79d65d847e2506a526c49380e80', 'en', 'Add_funds', 'Add funds'),
(25, '1d622b06eb3ffefb54e47d88128ed65f', 'en', 'Add_money', 'Add money'),
(26, '98565b1c10eb806ef7c0bae30327db5d', 'en', 'Hi', 'Hi'),
(27, '13a849d57ac45da27bca2bd3c5ef390c', 'en', 'Enter_license', 'Enter license'),
(28, '7c0cd040e5ffea44dcb0d2d97cc65000', 'en', 'Quick_links', 'Quick Links'),
(29, 'e98e29e49c9e6fbef59a996e30bea6c5', 'en', 'terms__conditions', 'Terms & Conditions'),
(30, '480a8ccebbb058dfb7110da78e8e66ad', 'en', 'Cookie_Policy', 'Cookie Policy'),
(31, '2ecd67fa5603115390b8b41f6dea99f4', 'en', 'Home', 'Home'),
(32, '37d7ce2b5b16994a1b670ab2af627a7c', 'en', 'Copyright', 'Copyright © 2020'),
(33, 'c58d2e87659d44635301b402265be1c7', 'en', 'add_new', 'Add new'),
(34, 'ef1ad6ac926e5b4bc2a392757a31a597', 'en', 'Lists', 'Lists'),
(35, '4698640614c5732591858c35609962c8', 'en', 'No_', 'No.'),
(36, '24e0ed356286ae0151f3d0b4115f2495', 'en', 'Created', 'Created'),
(37, '8be90605e5b05fa66ea7a1a185a8fca8', 'en', 'Updated', 'Updated'),
(38, '251362b48a6698d09e993dbab32cc927', 'en', 'Status', 'Status'),
(39, '991c9924e976e2cca7091c29950ac6ee', 'en', 'Action', 'Action'),
(40, 'd683cb1ac4b7fad0566a8e5efaa4861d', 'en', 'Description', 'Description'),
(41, '7149e4eb80aa4211f914c3e03c5ada31', 'en', 'Edit', 'Edit'),
(42, 'bc2ca04e273e2dc75327b72f14ac558f', 'en', 'Delete', 'Delete'),
(43, 'ea9876f72847ab9290921f114741684d', 'en', 'Active', 'Active'),
(44, '7e655dfbbb2d1c1efe20205818203437', 'en', 'Deactive', 'Deactive'),
(45, '0efc5d5ce6416a47fb2c116d0ff430c6', 'en', 'Yes', 'Yes'),
(46, '00daaa8aa4297291070c9d549e668695', 'en', 'No', 'No'),
(47, 'b713c4cb103a7a7cc2a11931f7edfb02', 'en', 'Email', 'E-mail'),
(48, 'ba927d73489d45408cfca90179fd43cb', 'en', 'Timezone', 'Time zone'),
(49, '56401804b10d3029a0da5828285ce47c', 'en', 'Password', 'Password'),
(50, '8b68400c9fdc6b88c45c4a5f58399744', 'en', 'Confirm_password', 'Confirm Password'),
(51, '2fee77e957389a957d07acf0f01c9eda', 'en', 'Save', 'Save'),
(52, 'bd0b8bd72e337fe67da4d1bd5cc23bd9', 'en', 'look_like_there_are_no_results_in_here', 'Look like there are no results in here!'),
(53, 'a13f751171dde42f9d61a188889d50a9', 'en', 'Subject', 'Subject'),
(54, '66b29bbab33a95bffe98ce5f6326108f', 'en', 'Content', 'Content'),
(55, '099d1b3f45d3034df58ae73d2d38df19', 'en', 'Message', 'Message'),
(56, '10fc041d21808d18895bfb9f69df2388', 'en', 'Submit', 'Submit'),
(57, '9c8aa6d075e7e364176b5a21ea708d15', 'en', 'Cancel', 'Cancel'),
(58, '3490a162f5f706cee47137b396ba6b06', 'en', 'Password_is_required', 'Password is required'),
(59, '0c05b05fd9f2fbdf4257a7d455b72bbb', 'en', 'email_is_required', 'Email is required'),
(60, '4e303e15c6da353cc6694d4e2b3c6d93', 'en', 'invalid_email_format', 'Invalid email format'),
(61, 'dcc028b4fd04f7810b6a39378ebff886', 'en', 'Password_must_be_at_least_6_characters_long', 'Password must be at least 6 characters long'),
(62, '2d168bb49cc9e32dd4f5f80ad5a33bcf', 'en', 'Password_does_not_match_the_confirm_password', 'Password does not match the confirm password'),
(63, 'd987ad7bbea1a8e8b5ceb7379253ac57', 'en', 'There_was_an_error_processing_your_request_Please_try_again_later', 'There was an error processing your request. Please try again later                                                                                                                                                                                                                                                                                        '),
(64, 'b65898473132a02a03cea6ec0b3fba1b', 'en', 'Update_successfully', 'Update successfully'),
(65, '4a34db7db8a97bd93c846ecf5f92d86c', 'en', 'Deleted_successfully', 'Deleted successfully'),
(66, '37a4f6bdb525b7456af4a28c5ab393a8', 'en', 'the_item_does_not_exist_please_try_again', 'The item does not exist. Please try again'),
(67, '07d2582f8901a24c4f7bc47263c8a531', 'en', 'Are_you_sure_you_want_to_delete_this_item', 'Are you sure you want to delete this item?'),
(68, '2e5e047910488e6be73e9bd5b842c7de', 'en', 'Are_you_sure_you_want_to_delete_all_items', 'Are you sure you want to delete all items?'),
(69, 'f7b915bce13b5f798a2fd52fd6de1912', 'en', 'please_choose_at_least_one_item', 'Please choose at least one item'),
(70, '64d494e48a7a46f421fc4df01440612c', 'en', 'Search_for_', 'Search for...'),
(71, 'ef9c12f78efff774f1305b7988eb573b', 'en', 'Sign_out', 'Sign out'),
(72, '4cb32839a80d99e860fa1e7d178994a5', 'en', 'Sign_Up', 'Sign Up'),
(73, 'e39a636e480c71745eede5021aaffc99', 'en', 'Login', 'Login'),
(74, 'ace6aa6aa3ebfb05ab8f453a07c6ff1c', 'en', 'note', 'Note:'),
(75, 'c28fdfaf890bf91dbbe6f97b0d5dfaa5', 'en', 'Facebook', 'Facebook'),
(76, '12d3aad77be27fa722faaa3bf45d25f4', 'en', 'Instagram', 'Instagram'),
(77, '941511269ec469b621f40513f0204e79', 'en', 'Pinterest', 'Pinterest'),
(78, '0f938e4178e6c3514e80ed3f587a6905', 'en', 'Twitter', 'Twitter'),
(79, '98ed86f1ba3805ba0d574c8c9d6a1119', 'en', 'Paypal', 'Paypal'),
(80, '360ffedc4d1d73a0e8e27dfab4b4f309', 'en', '2Checkout', '2Checkout'),
(81, '0f00299be40142091096b8944ecd3aa5', 'en', 'Stripe', 'Stripe'),
(82, 'cf6c5d0178e714610d83a3d6770cd900', 'en', 'users', 'Users'),
(83, 'b8ace258473ab6861097516308b0dc35', 'en', 'admin', 'Admin'),
(84, 'f4e44a2eb151542c21a80d06dd1e8cf9', 'en', 'regular_user', 'Regular User'),
(85, '7287cd03a11bc1595a8c23c657361a3c', 'en', 'Funds', 'Funds'),
(86, '113bedd584b157087e8b060f61df1880', 'en', 'User_profile', 'User profile'),
(87, '9baa20c0ae0e7b0eb5681be3ad9fed9b', 'en', 'send_mail', 'Send Mail'),
(88, 'ffb081c117ef6f42dc8e8eefc9d90207', 'en', 'Edit_user', 'Edit user'),
(89, 'c06b202de16784d9895ecf909de2c236', 'en', 'basic_information', 'Basic Information'),
(90, 'e39a0eeba2708295af973d318d791aae', 'en', 'first_name', 'First name'),
(91, '29918d55df449fb0232a571bc97a8de6', 'en', 'last_name', 'Last name'),
(92, 'ea6825d62ed68ff97d45453fc1367d70', 'en', 'account_type', 'Account type'),
(93, '213977add26e3f96bacfee11d3779dde', 'en', 'note_if_you_dont_want_to_change_password_then_leave_these_password_fields_empty', 'Note: If you don\'t want to change password then leave these password fields empty!                                                                                                                                                                                                                                                                                        '),
(94, 'a349121ddfc262d03853824ff5138937', 'en', 'more_informations', 'More Informations'),
(95, '4bd8c850947c7abc91720635264e18f8', 'en', 'whatsapp_number', 'WhatsApp Number'),
(96, '835833e5781d6948ed41add4fcf8c372', 'en', 'Website', 'Website'),
(97, 'a15955903f3135aabb3ed41541ddd9d4', 'en', 'Phone', 'Phone'),
(98, 'fe3bb9ecdf095a226fb23b8c2ed374ff', 'en', 'Skype_id', 'Skype ID'),
(99, 'e742c07950974acee8904219c73f187f', 'en', 'Address', 'Address'),
(100, '41a0e5c4603558962559240682afc396', 'en', 'note_if_you_dont_want_add_more_information_then_leave_these_informations_fields_empty', 'Note: If you don\'t want add more information then leave these informations fields empty!                                                                                                                                                                                                                                                                                        '),
(101, '9cb89ae8975ca17788d5a2aefaa757f4', 'en', 'To', 'To'),
(102, 'e3ccc734c3f962cc9d3c0003d14d8d66', 'en', 'please_fill_in_the_required_fields', 'Please fill in the required fields'),
(103, '0f4352ba04cac068eaabea4cb3d76c75', 'en', 'An_account_for_the_specified_email_address_already_exists_Try_another_email_address', 'An account for the specified email address already exists. Try another email address                                                                                                                                                                                                                                                                                        '),
(104, '706dc3991a4063fd787d5666b2ac7137', 'en', 'subject_is_required', 'Subject is required'),
(105, '78ee04a9adebbb125b2fae401d05d14f', 'en', 'message_is_required', 'Message is required'),
(106, 'd843e84f6fa3f5336da41f2f131cdb6a', 'en', 'description_is_required', 'Description is required'),
(107, 'a00c3a24502e62a28fe914bdd72c2124', 'en', 'your_email_has_been_successfully_sent_to_user', 'Your email has been successfully sent to user'),
(108, 'd267bc0c7d26f3edf2709a37fa921876', 'en', 'the_account_does_not_exists', 'The account does not exists'),
(109, '1acb85dc684b54f0f27a0ce54fc4b885', 'en', 'the_input_value_was_not_a_correct_number', 'The input value was not a correct number'),
(110, '5baf801aceaa839bbc29385811f579ce', 'en', 'can_not_delete_administrator_account', 'Can not delete Administrator account'),
(111, '008f82b283705f97f1fb7b8bd40380be', 'en', 'custom_rate', 'Custom rate(%)'),
(112, '3818a42faf86566741dcb7abc6d685c6', 'en', 'history_ip', 'history_ip'),
(113, '587cbe0e4e215d47e127db30e70eb110', 'en', 'view_user', 'View User'),
(114, '536064a094f5e8959929714a1b10991c', 'en', 'Back_to_Admin', 'Back to Admin'),
(115, 'f58c17338e489f4f0b0a75369916f81d', 'en', 'Settings', 'Settings'),
(116, '7190d8c91d9a1e1826c96b6935df5045', 'en', 'general_settings', 'General Settings'),
(117, '209af4c267d5295a9245f5ca2572b6db', 'en', 'website_setting', 'WebSite Setting'),
(118, '9f8a8f149d2950b9feeb12a8e4fe0258', 'en', 'Logo', 'Website Logo'),
(119, '08f73624c8062e750bab9a8796407332', 'en', 'terms__policy_page', 'Terms & Policy page'),
(120, '86a22b3288ccac6c440eeaa54dddb27c', 'en', 'default_setting', 'Default Setting'),
(121, '8daf7d6e051799b6516e0d387c3af366', 'en', 'Other', 'Other'),
(122, '140a7c8430fed1e3897113c80135a8c1', 'en', 'email_setting', 'Email Setting'),
(123, '0140f2c42095986b6abae9308ce55bcb', 'en', 'email_template', 'Email Template'),
(124, '7d35024abd9467abffc85a2a2d5c09fc', 'en', 'integrations', 'Integrations'),
(125, '2743f30f563dd9d92d908bd0ed8adee6', 'en', 'Payment', 'Payment'),
(126, '869c587fb8ed891f5dd0baf9ac57a7b4', 'en', 'Maintenance_mode', 'Maintenance mode'),
(127, 'f1a3ac6d494b3eedb3760f7a42131314', 'en', 'link_to_access_the_maintenance_mode', 'Make sure you remmeber this link to get access Maintenance mode before you activate:                                                                                                                                                                                                                                                                                        '),
(128, '89244506ee438bd2a8e936888ec49fd7', 'en', 'website_name', 'Website name'),
(129, '9f716f630d0996bc58b0a1390b5e04cc', 'en', 'website_description', 'Website description'),
(130, '8cf6a52eae683b215222fdf6ed5ebe79', 'en', 'website_keywords', 'Website keywords'),
(131, '5318ff8797b45f78495768e81906b701', 'en', 'website_title', 'Website title'),
(132, '1ec70a78af62c5ad5f3106cacbb6ad1d', 'en', 'website_logo', 'Website Logo'),
(133, '45faf02ca6b4fb1f8b47884363672868', 'en', 'website_favicon', 'Website favicon'),
(134, 'e792ef63ddab7b97fdb1da174471551f', 'en', 'website_logo_white', 'Website logo (white)'),
(135, 'e43f36296af398f0fb7094b1378822bb', 'en', 'terms__policy', 'Terms & Policy'),
(136, '025434c6fc7bf9788ab3b89c2832af06', 'en', 'content_of_terms', 'Content of Terms'),
(137, '51ef4e169f23d00fcae774861bde01d9', 'en', 'content_of_policy', 'Content of Policy'),
(138, '16ab83adbfcb700bdc54659a281579bf', 'en', 'other_settings', 'Other settings'),
(139, '239817c5ed7eadfc1d901185618ad408', 'en', 'enable_https', 'Enable HTTPS'),
(140, '4d8d2e4bd623cad12b0a2ba701a8a403', 'en', 'emded_code', 'Emded Code'),
(141, '4b6e905a1b39014f646542926b172e37', 'en', 'social_media_links', 'Social Media links'),
(142, 'bacfa1efb6943ca6daebc8964b5408c4', 'en', 'note_please_make_sure_the_ssl_certificate_has_the_active_status_in_your_hosting_before__you_activate', 'Note: Please make sure the SSL certificate has the \'Active\' status in your hosting before  you activate.                                                                                                                                                                                                                                                                                        '),
(143, 'a7b35a1020d426c736e6f809bddf4b96', 'en', 'note_only_supports_javascript_code', 'Note: Only supports Javascript code '),
(144, '232c92bed04fad042f50628a63103f2f', 'en', 'contact_informations', 'Contact Informations'),
(145, 'cb3d6832a9295a7b3655d0423cd9b2e9', 'en', 'working_hour', 'Working Hour'),
(146, '4d43a9b8a73e27247dbe82bf683c4fe7', 'en', 'Tel', 'Tel'),
(147, '7847d85444bde6363630f5bb3e3cf881', 'en', 'email_notifications', 'Email notifications'),
(148, 'a001670ccd5b2a8aac4643259f214091', 'en', 'new_user_welcome_email', 'New User Welcome Email'),
(149, 'cd5116e0448a9014078e162baeeeaf0f', 'en', 'new_user_notification_email', 'New User Notification Email'),
(150, '6a467675b3e19a7f6841ea4e34516877', 'en', 'receive_notification_when_a_new_user_registers_to_the_site', '(Receive notification when a new user registers to the site)'),
(151, '673d8e12ac9a783fadcf234c8b471b57', 'en', 'payment_notification_email', 'Payment Notification Email'),
(152, '38ae686932062a5512210dc073ea2b3f', 'en', 'send_notification_when_a_new_user_add_funds_successfully_to_user_balance', '(Send notification when a new user add funds successfully to user balance)                                                                                                                                                                                                                                                                                        '),
(153, '01591860ed1ecbe48eb5775dfd40e7b8', 'en', 'ticket_notification_email', 'Ticket Notification Email'),
(154, '640124ddfd1f4e622078dec95e04a514', 'en', 'send_notification_to_user_when_admin_reply_to_a_ticket', '(Send notification to user when Admin reply to a ticket)'),
(155, '37ca72f6fcfcbeba9d78d2dd1cdd1d20', 'en', 'order_notification_email', 'Order Notification Email'),
(156, '7020ca16c6c7f2cb61a20df290d10e54', 'en', 'receive_notification_when_a_user_place_order_successfully', '(Receive notification when a user place order successfully)'),
(157, '3907fb8c623bafab9fcfd7d774c8c72d', 'en', 'From', 'From'),
(158, '3b23af92125d6cc2fddcd8b07ff2ff2b', 'en', 'your_name', 'Your name'),
(159, '4a6eeffb5a81f49019513bbcdfad9761', 'en', 'email_protocol', 'Email protocol'),
(160, '2241b0c6cab0723db8de23b608b9f53c', 'en', 'php_mail_function', 'PHP mail function'),
(161, 'c4e44a69638c8a45d1ad0efa88f239ea', 'en', 'recommended', '(Recommended)'),
(162, 'c299abe0e25a184b93fb54636fb52561', 'en', 'sometime_email_is_going_into__recipients_spam_folders_if_php_mail_function_is_enabled', 'Sometime, email is going into  recipients\' spam folders if PHP mail function is enabled                                                                                                                                                                                                                                                                                        '),
(163, 'e247859b5dc1964ae4c8cc8b7f33cdb9', 'en', 'SMTP', 'SMTP'),
(164, 'eb71844b8e9543850f1b322edcd164cc', 'en', 'smtp_server', 'SMTP Server'),
(165, '100faa8d8940fe919b26ea62785bdc10', 'en', 'smtp_port', 'SMTP Port'),
(166, '9faf7b675459d0c3aba3b8a5b111c4f2', 'en', 'smtp_encryption', 'SMTP Encryption'),
(167, 'a202c28e66fb0af74f6cb7a1e9a8bd26', 'en', 'smtp_username', 'SMTP Username'),
(168, '01b1e753e015513f51d0f51ed56ba508', 'en', 'smtp_password', 'SMTP Password'),
(169, '733fa44230a1f35f149444b02f2c2155', 'en', 'password_recovery', 'Password Recovery'),
(170, '5f33db0f78e9a28a40e87162d0f53736', 'en', 'you_can_use_following_template_tags_within_the_message_template', 'You can use following template tags within the message template:                                                                                                                                                                                                                                                                                        '),
(171, '634d965123e9c915230665e10b07e274', 'en', 'displays_the_users_first_name', 'displays the user\'s first name'),
(172, '1ac2efe06e4d2ff3eb18ba97b5853c35', 'en', 'displays_the_users_last_name', 'displays the user\'s last name'),
(173, '767214b1a14f1e2d15adf38215a9ea5a', 'en', 'displays_the_users_email', 'displays the user\'s email'),
(174, '00d44c6102600ce892d0a45b3afdc9b2', 'en', 'displays_the_users_timezone', 'displays the user\'s timezone'),
(175, 'd1726d96de3b84d7845e629e62141cfb', 'en', 'displays_recovery_password_link', 'displays recovery password link'),
(176, '18312faaf1b1b5e5c70192356e0ddb07', 'en', 'payment_integration', 'Payment Integration'),
(177, 'e08b31220037d7a0055613705b348b1c', 'en', 'currency_setting', 'Currency Setting'),
(178, '27011bd2b380e4bc84cf71bd7cae65a4', 'en', 'currency_code', 'Currency Code'),
(179, 'a9665c2678d3918e492481a2570ef24b', 'en', 'thousand_separator', 'Thousand Separator'),
(180, 'a7663814e235c3bf28d5d3a1e06e264e', 'en', 'decimal_separator', 'Decimal Separator'),
(181, 'c726b5c4c79176b65e492138d0618de3', 'en', 'Dot', 'Dot'),
(182, '28c8973dc74f6372e033792376660f56', 'en', 'Comma', 'Comma'),
(183, 'd40c52161b3ef0b52b597ec06ff2d343', 'en', 'Space', 'Space'),
(184, '1ddab7144aad299d700e8bc63e18a987', 'en', 'auto_currency_converter', 'Auto Currency converter'),
(185, '952efe2cff6dd29677a9ce992183ee07', 'en', 'applying_when_you_fetch_sync_all_services_from_smm_providers', '(Applying when you fetch, sync all services from SMM providers)'),
(186, '6995c70a60cb420de560d83fe12a44a9', 'en', '1_original_currency', '1 Original currency'),
(187, '70bef645b4573619e74c22aaaa1de163', 'en', 'new_currency', 'New Currency'),
(188, 'c5f8b8c27ded9fbf518f4af00b4fc97e', 'en', 'if_you_dont_want_to_change_currency_rate_then_leave_this_currency_rate_field_to_1', 'If you don\'t want to change Currency rate then leave this currency rate field to 1                                                                                                                                                                                                                                                                                        '),
(189, '7441d3f3b0c384ef027596d746d9a249', 'en', 'the_paypal_payments_only_supports_these_currencies', 'The PayPal Payments only supports these currencies:'),
(190, 'dec61c5dcaddceb332121aabfe85e610', 'en', 'currency_symbol', 'Currency Symbol'),
(191, '08384a88f4615f41a332800c7bac9a2d', 'en', 'transaction_limits', 'Transaction Limits'),
(192, '5077107d16ab46215a449458dc64b910', 'en', 'currency_decimal_places', 'Currency decimal places'),
(193, 'a2dc0cd3e7a5877c82dbfb97ce44b062', 'en', 'minimum_amount', 'Minimum Amount'),
(194, '2c8c57b638344bba8fe819685520f575', 'en', 'Environment', 'Environment'),
(195, '9d808799947dc83928104b6218574da5', 'en', 'Live', 'Live'),
(196, '3bd2fda9c53030fee256e782b816c255', 'en', 'transaction_fee', 'Transaction fee'),
(197, '0ae840fb34f7a349981f1c99f489d64e', 'en', 'sandbox_test', 'Sandbox (test)'),
(198, '48214b1144fc8a103c80b8ecb942a803', 'en', 'paypal_client_id', 'Paypal Client ID'),
(199, 'f7909367a2c19e48f4e98cde6eb4a10d', 'en', 'paypal_client_secret', 'Paypal Client Secret'),
(200, '0ae0a5860fadcd17b53c685b97398d95', 'en', 'publishable_key', 'Publishable Key'),
(201, '4df69d2659e74cba35fd7000ccb0c18b', 'en', 'secret_key', 'Secret Key'),
(202, '56fa7897bfbac7009850740461e30ca7', 'en', 'private_key', 'Private Key'),
(203, 'fa0ea2f5042f7451143f4d22ce26e7ad', 'en', '2checkout_account_number_sellerid', '2Checkout account number (sellerId)'),
(204, '4235007bc25a9c2b285c91910820b658', 'en', 'auto_clear_ticket_lists', 'Auto clear ticket lists'),
(205, '131f6c81338426556268ac9b7eaabc95', 'en', 'default_tickets_log', 'Default Tickets log'),
(206, '67668f8f7e25be8e690f1ad4b28f398e', 'en', 'clear_ticket_lists_after_x_days_without_any_response_from_user', 'Clear Ticket lists (after X days) without any response from user                                                                                                                                                                                                                                                                                        '),
(207, '64f76f09ee85eff174875c87b4062eec', 'en', 'default_service', 'Default Service'),
(208, '62059e486573da1f7cb0377d213326c5', 'en', 'default_min_order', 'Default Min Order'),
(209, 'f2a0e67b63094e34155ab7ad2582bf26', 'en', 'default_max_order', 'Default Max Order'),
(210, '4fc6f24aec8e567edb97fc3676d5e57f', 'en', 'default_price_per_1000', 'Default Price per 1000'),
(211, '11a42bdc8756ff0cc6567aed6c63664f', 'en', 'dripfeed_option', 'Drip-feed option'),
(212, '59887e07807ce7cba40caa29c3023261', 'en', 'note_please_make_sure_the_dripfeed_feature_has_the_active_status_in_api_provider_before_you_activate', 'Note: Please make sure the Drip-feed feature has the \'Active\' status in API provider before you activate.                                                                                                                                                                                                                                                                                        '),
(213, 'a852a10c9095ded72fc7ada59db38431', 'en', 'default_runs', 'Default Runs'),
(214, '0bf14f838d9d214452ab68e86ff6e593', 'en', 'default_interval_in_minutes', 'Default Interval (in minutes)'),
(215, '92b137d25d111152393824be0a98e615', 'en', 'explication_of_the_service_symbol', 'Explication of the service symbol'),
(216, 'ad4c9a210b041b48dfd89e97ea2cf973', 'en', 'Pagination', 'Pagination'),
(217, 'e1c4b1d94595447015912b69367b29e3', 'en', 'limit_the_maximum_number_of_rows_per_page', 'Limit the Maximum Number of Rows per Page'),
(218, '809910b644f4cc7f8ee59f37eb81f502', 'en', 'price_percentage_increase', 'Price percentage increase'),
(219, '59419555a8707d079f4434a02161412c', 'en', 'use_for_sync_and_bulk_add_services', 'Use for sync and Bulk add services'),
(220, '3390ee36ae2fef6b562b7fb08534819c', 'en', 'displays_the_service_lists_without_login_or_register', 'Displays the service lists without login or register'),
(221, 'd73b73dffd27449070628c7f06adb3e8', 'en', 'displays_api_tab_in_header', 'Displays API tab in header'),
(222, 'a0dfd99fedd8f5bcd928f31798b7e498', 'en', 'displays_required_skypeid_field_in_signup_page', 'Displays required SkypeID field in signup page'),
(223, 'd7219468e35434e8d68dff41f06f8d23', 'en', 'displays_google_recapcha', 'Displays Google reCAPTCHA'),
(224, '85ac7028b89c2dfbb97ab0277dae1468', 'en', 'google_recaptcha_site_key', 'Google reCAPTCHA site key'),
(225, '0a5c4ec7b6bbc2192f20e793978fc04d', 'en', 'google_recaptcha_serect_key', 'Google reCAPTCHA serect key'),
(226, '1f447f6264e97fd0dccd5c8e54847501', 'en', 'please_verify_recaptcha', 'Please verify reCAPTCHA'),
(227, '25c13215e7254e937aad08587e4f6faa', 'en', 'email_verification_for_new_customer_accounts', 'Email verification for new customer accounts'),
(228, '4a975bb51ecd4d14265076dd7867a272', 'en', 'email_verification_for_new_customer_accounts_preventing_spam_account', 'Email verification for new customer accounts (Preventing Spam Account)                                                                                                                                                                                                                                                                                        '),
(229, '8c3428198b02deb20a6e02718885a488', 'en', 'default_timezone', 'Default Timezone'),
(230, '67c484404eefce5c2153f9db50a9cf45', 'en', 'set_the_default_timezone_at_register_page', 'Set the default timezone at Register page'),
(231, '5390e0c3eb57bb0eb00ea5ee6da22735', 'en', 'notification_popup_at_home_page', 'Notification popup at home page'),
(232, '8ff9c0653a06ea191370aa78637bb46f', 'en', 'disable_home_page_langding_page', 'Disable Home page (Langding page)'),
(233, '2f999541a4d3659621d0b682ae7cea1c', 'en', 'Default_Homepage', 'Default Homepage'),
(234, '8ad7895a8cba104c1e472df87eb6cf59', 'en', 'language_code', 'Language code'),
(235, '64c31e596f0156761d488a3275c8fa54', 'en', 'choose_a_language_code', 'Choose a language code'),
(236, 'f41b58fc0bedfa79d2a9035acb5641cc', 'en', 'Default', 'Default'),
(237, 'df922ddc47e80e53ddf7cd481a231ef0', 'en', 'Location', 'Location'),
(238, '85f73e36126de2ab2e82c4dfa9afe6f4', 'en', 'Key', 'Key'),
(239, 'd169fc27c701b8c600afd49af1d9196e', 'en', 'Value', 'Value'),
(240, '1f5be4f9203a52cdbfcda97e6e4836da', 'en', 'Name', 'Name'),
(241, '5f9a0818bd362011f55250afc51c9091', 'en', 'Code', 'Code'),
(242, '2b0d52d7983c050467c6f9f0f0313c5e', 'en', 'Icon', 'Icon'),
(243, 'f2bd6caf29be87adcf2e1faf1469d6c5', 'en', 'choose_your_country', 'Choose your country'),
(244, '125a942750d5009c3bec54fdc5f91375', 'en', 'translation_editor', 'Translation editor'),
(245, '4ebb1efe491dc423dd6e1d401d117cc8', 'en', 'language_code_does_not_exists', 'Language Code does not exists'),
(246, '45b3ecf75bb500f0238ea85579cfd21c', 'en', 'language_code_already_exists', 'Language code already exists'),
(247, 'd7388b56d3813d4739dc21fe0fb558a3', 'en', 'Transaction_logs', 'Transaction logs'),
(248, 'b3a75f351c174315002a279d5018af3c', 'en', 'User', 'User'),
(249, '27e90895bba207acea2533405a4bf384', 'en', 'Transaction_ID', 'Transaction ID'),
(250, '2892ebe21628a740f5f5536f8b8c0ece', 'en', 'Payment_method', 'Payment method'),
(251, '552e105c2ed7c9602617278f7c244f13', 'en', 'Amount_includes_fee', 'Amount (includes fee)'),
(252, 'c700e8902d4e79ad3561b48900979d7e', 'en', 'Amount_paid_includes_fee', 'Amount Paid (includes fee)'),
(253, 'f4f0c58c1af6f55f1d21141d4ef1be39', 'en', 'Paid', 'Paid'),
(254, '424c9e9774b6d9da947f68b5b6b593c2', 'en', 'waiting_for_buyer_funds', 'Waiting for buyer funds...'),
(255, '1595f3767b14ee5414fda36582321f4d', 'en', 'cancelled_timed_out', 'Cancelled/Timed Out'),
(256, 'd13d9362b98f3c6858d2f2e12fc423c7', 'en', 'Tickets', 'Tickets'),
(257, 'a4fb29e2ca4c07d9359d0d7097121399', 'en', 'mark_as_new', 'Mark as New'),
(258, 'e9ac1e95e96b12750ce6bec1bea2063e', 'en', 'mark_as_pending', 'Mark as Pending'),
(259, '05245451802f762c3182c9c6898862bf', 'en', 'mark_as_closed', 'Mark as Closed'),
(260, '442ab966e00ea4f39352b82c8737cc97', 'en', 'add_new_ticket', 'Add New Ticket'),
(261, 'd457c76293f4c723111599fa9f9e136e', 'en', 'Ticket_no', 'Ticket #'),
(262, '91f43a327b965e74af78f7ee5780c47b', 'en', 'submit_as_closed', 'Submit as Closed'),
(263, '723c8c9987420e392571e1bd46e819bf', 'en', 'submit_as_pending', 'Submit as Pending'),
(264, '13f39728dff6227a87cabdc436ce270e', 'en', 'submit_as_new', 'Submit as New'),
(265, '3bab97b071ba591b7fe33ce7f8fb0af8', 'en', 'New', 'New'),
(266, 'c23015812b3aa577f21804d8866ac2f1', 'en', 'Pending', 'Pending'),
(267, 'ba744c42615bcfc585962b1482da7764', 'en', 'Closed', 'Closed'),
(268, '1ed1b06d7f1e49cf797fbb357096cbc6', 'en', 'ticket_created_successfully', 'Ticket created successfully'),
(269, 'fbb729cb7e874015e15843b23503b7b8', 'en', 'Cancellation', 'Cancellation'),
(270, 'e048d0011bdfd23897ea6ceeddccbc11', 'en', 'Speed_Up', 'Speed Up'),
(271, '8a24f8a4819ca2d05816cb203b7c13ae', 'en', 'Refill', 'Refill'),
(272, '0f41cdbe28ce41f268dbd0583b205676', 'en', 'Unread', 'Unread'),
(273, 'd533e2e807af4effe1e82c505f6798e0', 'en', 'Request', 'Request'),
(274, '8a18ba332f113c985f016d17b646e36c', 'en', 'enter_the_transaction_id', 'Enter the Transaction ID'),
(275, '612af13280811709238abfb339a011d8', 'en', 'for_multiple_orders_please_separate_them_using_comma_example_123451234512345', 'For multiple orders, please separate them using comma. (example: 12345,12345,12345)                                                                                                                                                                                                                                                                                        '),
(276, 'a6b5e8ad4d78b57a5ba8ff90680970eb', 'en', 'order_id_field_is_required', 'Order ID field is required'),
(277, '7006083e457328cefc54fb3108630755', 'en', 'please_choose_a_request', 'Please choose a request'),
(278, '30baab190c793148ec9ef757c27b95a2', 'en', 'transaction_id_field_is_required', 'Transaction ID field is required'),
(279, 'ed0d762ed501050195ceac735974998f', 'en', 'please_choose_a_payment_type', 'Please choose a payment type'),
(280, 'c003085ba1f03a792527c34cce486714', 'en', 'FAQs', 'FAQs'),
(281, '3035e2ba17f034a873649a35de2a4d95', 'en', 'Question', 'Question'),
(282, '70ab6d56093882b5deb697b1b26f123f', 'en', 'Answer', 'Answer'),
(283, '0a9328c7ca97ddae22cee6a66801652f', 'en', 'Default_sorting_number', 'Default Sorting number'),
(284, '4fba2d9470c79f9d122b8df3cc52daba', 'en', 'Sorting', 'Sort'),
(285, 'b95fb6219940768d064453a309ce472c', 'en', 'Edit_FAQ', 'Edit FAQ'),
(286, '923e64ba239155b15175dae0a1d9d259', 'en', 'question_is_required', 'Question is required'),
(287, '75726087a77e1489d8260ea8a0003e99', 'en', 'answer_is_required', 'Answer is required'),
(288, 'a67f23a384e0f8ff56774bc24c342715', 'en', 'sort_number_must_to_be_greater_than_zero', 'Sort number must to be greater than zero'),
(289, '15292592a8d8de726231057c11015830', 'en', 'api_documentation', 'API Documentation'),
(290, '9e581f14366e191b1e2872db2785feb8', 'en', 'note_please_read_the_api_intructions_carefully_its_your_solo_responsability_what_you_add_by_our_api', 'Note: Please read the API intructions carefully. Its your solo responsability what you add by our API.                                                                                                                                                                                                                                                                                        '),
(291, '564d17e358d7ac537f5eff00937ff45f', 'en', 'response_format', 'Response format'),
(292, '429e1527b7e2834095a6cfd08dc9db56', 'en', 'http_method', 'HTTP Method'),
(293, 'c7b196e8163410e817fb3630cd84281e', 'en', 'api_key', 'API Key'),
(294, 'a1e6ba9e303a3abfbbcd5e922cd804b1', 'en', 'download_php_code_examples', 'Download PHP Code Examples'),
(295, '852dc72e51994f8a43a81123a6c81a79', 'en', 'place_new_order', 'Place new Order'),
(296, '76b4a09fb48715c2caee8a54e265255b', 'en', 'example_response', 'Example response:'),
(297, '273f11d1837f495b5ad73bfdf82826f5', 'en', 'status_order', 'Status Order'),
(298, '99f6a9b4efdc5f32891f24095203359b', 'en', 'parameter', 'Parameter'),
(299, '0f7c2fe419cfaa576cb9c2a12c7f3ad2', 'en', 'multiple_orders_status', 'Multiple orders status'),
(300, 'b93eb2d866fa2f417f14e4e301e3cba9', 'en', 'services_lists', 'Services Lists'),
(301, '3cf90588ac9355f48fbd8b74023977e4', 'en', 'Balance', 'Balance'),
(302, 'b42c58e7eaae7bedc57d6ab900bdc18d', 'en', 'your_api_key', 'Your API key'),
(303, '39a5d44c3db2b7f868992752c2baf361', 'en', 'service_id', 'Service ID'),
(304, '2738c5da27600cf2f25fd0789ca404b7', 'en', 'link_to_page', 'Link to page'),
(305, 'bc0259e3735e53e7fc6d09077ecc74e2', 'en', 'needed_quantity', 'Needed quantity'),
(306, '3a56278e54cbf8a994a006420c8aefaf', 'en', 'order_id', 'Order ID'),
(307, '3dbd67935825f86fbaef163b27c0016f', 'en', 'order_ids_separated_by_comma_array_data', 'Order IDs separated by comma (array data)'),
(308, '0655c19ccd27197f29ec5072c4883403', 'en', 'api_is_disable_for_this_user_or_user_not_found_contact_the_support', 'API is Disable for this user or User Not Found! Contact the Support                                                                                                                                                                                                                                                                                        '),
(309, 'c10de79135dc7888b51fbb0d1c8ae9b3', 'en', 'this_action_is_invalid', 'This action is Invalid'),
(310, 'c5a46afab2156aec5491c0a79395e27e', 'en', 'there_are_missing_required_parameters_please_check_your_api_manual', 'There are missing required parameters. Please check your API Manual                                                                                                                                                                                                                                                                                        '),
(311, '447469b5f92f82f44003504822face2c', 'en', 'invalid_link', 'Invalid Link'),
(312, '129f36e4a9f463dcca068d2a5fd96771', 'en', 'service_id_does_not_exists', 'Service ID does not exists'),
(313, 'ef50434e2c481fb81ef27241f6d47251', 'en', 'quantity_must_to_be_greater_than_or_equal_to_minimum_amount', 'Quantity must to be greater than or equal to minimum amount'),
(314, 'cc5eed55012404cd0649262137ac8a30', 'en', 'quantity_must_to_be_less_than_or_equal_to_maximum_amount', 'Quantity must to be less than or equal to maximum amount'),
(315, 'db688bd67e8af57df4d0f0be98bcf16a', 'en', 'not_enough_funds_on_balance', 'Not enough funds on balance'),
(316, '0d621186dce552e460561a48c8bb9bf4', 'en', 'order_id_is_required_parameter_please_check_your_api_manual', 'Order ID is required parameter. Please check your API Manual'),
(317, 'c4548c4a6215f99fe8096dd29674e8ae', 'en', 'incorrect_order_id', 'Incorrect order ID'),
(318, '27af72ef070b0d1a38769128c4b38bcb', 'en', 'edit_service', 'Edit Service'),
(319, '283d4fe40f94980609ac9d55d4ad27af', 'en', 'package_name', 'Package Name'),
(320, 'dd28f295309ec4626d50ec03e6f8ea45', 'en', 'choose_a_category', 'Choose a category'),
(321, '6abd3cec83a4348d07492ba48357b387', 'en', 'maximum_amount', 'Maximum Amount'),
(322, '111a1cb9252ec6811ed9a32657f85f45', 'en', 'Price', 'Price'),
(323, '79662240fd44c75cb2c3eb48473e4c16', 'en', 'rate_per_1000', 'Rate per 1000'),
(324, '1b85f1d78d015aad4f616ff2db42a138', 'en', 'min__max_order', 'Min / Max order'),
(325, 'c11401ca74f0220f19faf58217187c8e', 'en', 'name_is_required', 'Name is required'),
(326, '09e6782d444c49a96debcf58ab2765ec', 'en', 'category_is_required', 'Category is required'),
(327, '465b5c9da01b6101405854a70cd57cd8', 'en', 'min_order_is_required', 'Min order is required'),
(328, '44d3e6575cd463e197c8b4989c72a41d', 'en', 'max_order_is_required', 'Max order is required'),
(329, '25b8b230e76670f930b0e4b815844327', 'en', 'max_order_must_to_be_greater_than_min_order', 'Max order must to be greater than Min order'),
(330, '278be8357878118336dd235ed7a2680e', 'en', 'price_invalid', 'Price invalid'),
(331, '2ce5fd196a406f2f43a89be006a59106', 'en', 'currency_decimal_places_must_to_be_equal_than_2', 'Currency decimal places must to be equal than 2'),
(332, '24600fea2f4129054a607635955e773f', 'en', 'Details', 'Details'),
(333, 'f8a46f3dff0acc9c4b3f91edb3364ed5', 'en', '__good_seller', 'Good Seller'),
(334, '3e1cf4142a064248ce4e3caf7add0a79', 'en', '__speed_level', 'Speed Level'),
(335, '560b6ed0837b50ac73199582e90667ea', 'en', '__hot_service', 'Hot service'),
(336, '4a13b1e3107d4c40c015aa15a06fe501', 'en', '__best_service', 'Best Service'),
(337, '04839dcc1ec5d53f6c0554163e9d3062', 'en', '__drip_feed', 'Drip Feed'),
(338, '9663c0f8d3fdaf2313cd4be907c11189', 'en', '__cancel_button', 'Cancel Button'),
(339, '2071c22b4335b5161b3964f072fa64c0', 'en', 'custom_comments', 'Custom comments'),
(340, '7be665f95483be4e10c78c0ea48a7b38', 'en', 'custom_comments_package', 'Custom comments package'),
(341, 'd715a597bc6acd9cf1167a9003d5e8fa', 'en', 'mentions_with_hashtags', 'Mentions with hashtags'),
(342, '4a82aa6747c05b77036cf13380fae7dc', 'en', 'mentions_custom_list', 'Mentions custom list'),
(343, '90cea7e17bdec326a9acaf174175f3b5', 'en', 'mentions_hashtag', 'Mentions hashtag'),
(344, '08188b25be5dbbbef034e0b70f48d800', 'en', 'mentions_user_followers', 'Mentions user_followers'),
(345, 'c546a849b990202caf66a5425b3d0030', 'en', 'mentions_media_likers', 'Mentions_media_likers'),
(346, '0d2a0c089354c262d8c0212d43d2d366', 'en', 'package', 'Package'),
(347, 'f925d6fd6dd082e2ea53948f6b6af1c2', 'en', 'comment_likes', 'Comment likes'),
(348, '8f945d2af57834cbfb023ad25f3e6efc', 'en', 'all_deactivated_services', 'All deactivated Services'),
(349, 'c3ecd2caded4c1e3d4d8da8785fbe0a7', 'en', 'failed_to_delete_there_are_no_deactivate_service_now', 'Failed to delete. There are no deactivate service now!'),
(350, '174e3342559eede7b42dc1bc0b975304', 'en', 'Category', 'Category'),
(351, '4b91718d2300af89e8caa1979fa411a8', 'en', 'edit_category', 'Edit Category'),
(352, '52fa1d490b90f52f8319f1c01ab7fba3', 'en', 'all_deactivated_categories', 'All deactivated Categories'),
(353, '1cde873036f13f19e9716438a45b1d65', 'en', 'failed_to_delete_there_are_no_deactivate_category_now', 'Failed to delete. There are no deactivate Category now!'),
(354, '59d625ade4f0418f03a19881c6cc1095', 'en', 'single_order', 'Single Order'),
(355, '31a4687cbe0f7f1ff4f64c9f44e9cf27', 'en', 'mass_order', 'Mass Order'),
(356, 'cd9e155cf4d389a9a564aa106b4e6b4b', 'en', 'order_service', 'Order Service'),
(357, '443d14be0982e88d0676f7b9a0a6fcc4', 'en', 'choose_a_service', 'Choose a service'),
(358, '993ed8d5eb0d31372c0a3c82e3093b9e', 'en', 'Link', 'Link'),
(359, '432df813374a5e15d41a9ba19bd7942c', 'en', 'Quantity', 'Quantity'),
(360, 'caedab2b343cb6ded9c37e417adf9f9b', 'en', 'yes_i_have_confirmed_the_order', 'Yes, i have confirmed the order!'),
(361, 'daab801f5ce8430a8804bf33f9c92dd7', 'en', 'total_charge', 'Total Charge:'),
(362, '42077a907010178a2ede23efbe8bff2c', 'en', 'order_resume', 'Order Resume'),
(363, '6e37ec321b8a3e40ddf34a254f51d730', 'en', 'service_name', 'Service name'),
(364, 'a21f006c9879c717da6ad623e68b52ca', 'en', 'price_per_1000', 'Price per 1000'),
(365, 'a4ffc6d2a5055e29db56db1b9329bc43', 'en', 'place_order', 'Place order'),
(366, '0bf144f144a0590f1b1a2aeab32804bc', 'en', 'one_order_per_line_in_format', 'One order per line in format'),
(367, '1c026084a60ccf962f5a4da71f5f5cbf', 'en', 'here_you_can_place_your_orders_easy_please_make_sure_you_check_all_the_prices_and_delivery_times_before_you_place_a_order_after_a_order_submited_it_cannot_be_canceled', 'Here you can place your orders easy! Please make sure you check all the prices and delivery times before you place a order! After a order submited it cannot be canceled.                                                                                                                                                                                                                                                                                        '),
(368, '3382965f9b18ec15d5c33a5e11724ec2', 'en', 'failed', 'Failed!'),
(369, 'd6136ec523a1137a6434b09e8835c773', 'en', 'there_was_some_issues_with_your_mass_order', 'There was some issues with your mass order:'),
(370, '3b5177aad6b43f9a6d0f02a5672a76f3', 'en', 'order_content', 'Order content'),
(371, '6ce5fa5a6e79b4edb6bf9dc63cec8a08', 'en', 'error_message', 'Error Message'),
(372, '5ef0c009ae9afcba685846154ba64e36', 'en', 'order_basic_details', 'Order Basic Details'),
(373, 'd948f85d1c2debc8942404eddc823067', 'en', 'sort_by', 'Sort by'),
(374, '0bacbacb31b84c70f95a81935d58d351', 'en', 'All', 'All'),
(375, '6503f4a6870dd584bc062be0f49afa20', 'en', 'Completed', 'Completed'),
(376, '51d6f53297ccf34a1df83233e94e37af', 'en', 'Processing', 'Processing'),
(377, 'b6a8c098a3e6d0275da447861e82f007', 'en', 'In_progress', 'In progress'),
(378, '8f158a39eeecf3b732e24f4da26be5d4', 'en', 'Partial', 'Partial'),
(379, '8f64144419613a8d46d56e9978df86e9', 'en', 'Canceled', 'Canceled'),
(380, 'b9772cf8ba44220885c832a91038d4cb', 'en', 'Refunded', 'Refunded'),
(381, 'b801c5a0857f3dd2701cfd6b8d312b3c', 'en', 'Edit_Order', 'Edit Order'),
(382, '425f397447a32d6f5cde0735618da9e2', 'en', 'Start_counter', 'Start counter'),
(383, '26aea1103a44fc7f4bd911b6e3c62e89', 'en', 'Remains', 'Remains'),
(384, 'deee964b438a10b713398386cd84d8be', 'en', 'Amount', 'Amount'),
(385, '4a111b2d84563203f8d9fa8bea7cff00', 'en', 'Service', 'Service'),
(386, '99974b6e0bb9ef3e57f08b6da91c5df1', 'en', 'service_does_not_exists', 'Service does not exists'),
(387, 'f6d29ee0af660d9c7a5db86d80915ef6', 'en', 'order_amount_exceeds_available_funds', 'Order amount exceeds available funds!'),
(388, '9c27361584015e75e892ddf555a8748c', 'en', 'order_amount_exceeds_available_the_min_max', 'Order amount exceeds available minimum or maximum!'),
(389, 'd6eef6abcc2037251399b6b97f12ed97', 'en', 'please_choose_a_category', 'Please choose a category'),
(390, 'eeaad98996e1565df77e859f4c345eb1', 'en', 'please_choose_a_service', 'Please choose a service'),
(391, '8d9c39a97509f36f8d1008a7b55f4a2a', 'en', 'category_does_not_exists', 'Category does not exists'),
(392, 'f095286b841020b9ce8941b799911619', 'en', 'quantity_is_required', 'Quantity is required'),
(393, '72d795ae8dc9cb4bab574011303c57e7', 'en', 'you_must_confirm_to_the_conditions_before_place_order', 'You must confirm to the conditions before place order'),
(394, '7e195565fa53204468ff82921005ee07', 'en', 'place_order_successfully', 'Place Order successfully'),
(395, 'cc7b73f50918b72361c6462c13f64a13', 'en', 'field_cannot_be_blank', 'Field cannot be blank'),
(396, 'c60c493bc859a72b7d72a0bc495973fd', 'en', 'you_do_not_have_enough_funds_to_place_order', 'You do not have enough funds to Place order'),
(397, '390fecac729c2122533d6e38aa32bc85', 'en', 'invalid_format_place_order', 'Invalid format place order'),
(398, '3921c3ecbd5fb1fb0352e3f17010c192', 'en', 'link_is_required', 'Link is required'),
(399, '6beda58a74ffcad4fe933e12d90cdef2', 'en', 'start_counter_is_a_number_format', 'Start counter is a number format'),
(400, '8dd1145b49f693df766a917d52f54af8', 'en', 'remains_is_a_number_format', 'Remains is a number format'),
(401, '4f3126743896a3ea8af9ce81351b1630', 'en', 'dripfeed', 'Drip-feed '),
(402, 'a78b0cc07e1470787347a746e8ad9c54', 'en', 'what_is_dripfeed', 'What is Drip-feed?'),
(403, '061020b11767546f600231fc219bb3e4', 'en', 'Runs', 'Runs'),
(404, 'b98e2b4401cda67fc037a2cf41d04cc9', 'en', 'interval_in_minutes', 'Interval (in minutes)'),
(405, '41968fb8bd488566eefdc59e1aa06480', 'en', 'interval', 'Interval'),
(406, 'e976ecc8a4ea09d08f3f2f9a8b0b4e8e', 'en', 'total_quantity', 'Total Quantity'),
(407, 'd0c5601059bca16de48b9b484b29d187', 'en', 'runs_is_required', 'Runs is required'),
(408, '57d41873e9446043524b2fb7b2829209', 'en', 'interval_time_is_required', 'Interval time is required'),
(409, 'ae349ef58225a4705303b0c4c922a1f8', 'en', 'interval_time_must_to_be_less_than_or_equal_to_60_minutes', 'Interval time must to be less than or equal to 60 minutes'),
(410, '6c39e39b536fee4a095967879bfbf7c1', 'en', 'drip_feed_desc', '<p><strong>Drip-Feed</strong> is a service that we are offering so you would be able to put the same order multiple times automatically.</p>\r\n                        <p>Example: let\'s say you want to get 1000 likes on your Instagram Post but you want to get 100 likes each 30 minutes, you will put:</p>\r\n                        <ul>\r\n                          <li>Link: Your Post Link</li>\r\n                          <li>Quantity: 100 </li>\r\n                          <li>Runs: 10</li>\r\n                          <li>Interval: 30</li>\r\n                        </ul>\r\n                        <p>\r\n                          <strong>Note:</strong> Never order more quantity than the maximum which is written on the service name (Quantity x Runs), Example if the service\'s max is 4000, you don’t put Quantity: 500 and Run: 10, because total quantity will be 500x10 = 5000 which is bigger than the service max (4000). Also never put the Interval below the actual start time (some services need 60 minutes to start, don’t put Interval less than the service start time or it will cause a fail in your order).\r\n                        </p>                                                                                                                                                                                                                                                                                        '),
(411, '1afbec52afbb30393a2cc7d7bbdb2c2f', 'en', 'Comments', 'Comments'),
(412, '98bc72b848f3670141063397472da3bd', 'en', 'Usernames', 'Usernames'),
(413, '4abadee9d1552cee2f762c767fc02925', 'en', 'Hashtag', 'Hashtag'),
(414, '4956de0741347d51bed76deb7f3a26e5', 'en', 'Media_Url', 'Media Url'),
(415, 'fa0adf7e9fc26a3638dc29d003546e5e', 'en', 'hashtags_format_hashtag', 'Hashtags (Format: #hashtag)'),
(416, '596c06e37b042d3d16328b1017b2a949', 'en', 'hashtag_field_is_required', 'Hashtag field is required'),
(417, '8225f41ee9bb4294619e1cd133bf64d8', 'en', 'username_field_is_required', 'Username field is required'),
(418, '683d613c324654bda46edaed583e2914', 'en', 'comments_field_is_required', 'Comments field is required'),
(419, '410004bf4284a3a36cf86f619d8091a1', 'en', 'min_cannot_be_higher_than_max', 'Min cannot be higher than Max'),
(420, '184c63f46599d5fdd6c6a47ac1f2d8dc', 'en', 'incorrect_delay', 'Incorrect delay'),
(421, '5756b763f6242ec06af61b34e9cc8f2e', 'en', 'min', 'min'),
(422, 'bb8f654ab17c318424e132ed75dbb9e3', 'en', 'max', 'max'),
(423, '1d2381ba570a9100ad01fd4b733f8f9d', 'en', 'minimum_1_post', 'minimum 1 post'),
(424, '32b724c895992bc574f9624a352cf046', 'en', 'new_posts_future_posts_must_to_be_greater_than_or__equal_to_1', 'New Posts (Future posts) must to be greater than or  equal to 1'),
(425, 'aeb04944ef2bc55e993b793b4adc9a9b', 'en', '1_per_line', '(1 per line)'),
(426, '8e40e4eb350957827d30cf4e4031d49c', 'en', 'Subscriptions', 'Subscriptions'),
(427, '6cf44547afa802ec1c8e91940e85b215', 'en', 'No_delay', 'No delay'),
(428, 'b7d3aa2570d629c21275a48a63c43def', 'en', 'minutes', 'minutes'),
(429, '66df38999daa5d3925cc4a023282fec1', 'en', 'Posts', 'Posts'),
(430, 'df448fec9af4c5aac7752cba4f5d4a3c', 'en', 'New_posts', 'New posts'),
(431, '8526423767f46ff9e962adc3788cc94e', 'en', 'Actived_Posts', 'Actived Posts'),
(432, 'd292fa19c57f0ead4c6d0cbf9167ad48', 'en', 'Username', 'Username'),
(433, 'f2e31341da11ec070a67e93a9b0c9d45', 'en', 'Expiry', 'Expiry'),
(434, '9345d3743339da56e4da1046289c82a7', 'en', 'Delay', 'Delay'),
(435, '7a82f8e5850bd3df6ceb83a04179ef44', 'en', 'Paused', 'Paused'),
(436, 'd588ca31bbdf051c7d38af531a10684c', 'en', 'Expired', 'Expiry field is required'),
(437, 'a08be8328ecc5b023c0a362350f1f82f', 'en', 'total_users', 'Total Users'),
(438, '48fbd9970718b3bdb9c6e85c944cd84e', 'en', 'your_balance', 'Your Balance'),
(439, '54cfc016b97104b007a73ebdd4e169dc', 'en', 'total_orders', 'Total Orders'),
(440, 'f7a5cd19f07e579bd0d0c6e8385075c2', 'en', 'total_tickets', 'Total Tickets'),
(441, 'b2458f3b7233e7f3c8bfecf511334916', 'en', 'total_transactions', 'Total Transactions'),
(442, 'f37f2284b28f3e660ef32c249e82fcd8', 'en', 'recent_orders', 'Recent Orders'),
(443, 'df72741ae13933020a1d9ce5f312baf0', 'en', 'recent_tickets', 'Recent Tickets'),
(444, '89e9aface8b6977253325942ba09e60b', 'en', 'total_amount_recieved', 'Total Amount Recieved'),
(445, 'd9194a127e4d8b314d796a4a5a1313d0', 'en', 'total_amount_spent', 'Total Amount Spent'),
(446, '6b3480174e75c11c68f7a972363c5a4c', 'en', 'Your_account', 'Your account'),
(447, '16202fff006889fb62d66d1a42377298', 'en', 'Generate_new', 'Generate new'),
(448, '93cfc301ede1a3f30e4c684e74a866ee', 'en', 'manual_payment', 'Manual Payment'),
(449, 'f010ceb6d7a4046ffd40b49abb474dec', 'en', 'you_can_deposit_funds_with_paypal_they_will_be_automaticly_added_into_your_account', 'You can deposit funds with %s® they will be automaticly added into your account!                                                                                                                                                                                                                                                                                        '),
(450, 'd12a192d46ce753f723acb9bf0153072', 'en', 'amount_usd', 'Amount (%s)');
INSERT INTO `general_lang` (`id`, `ids`, `lang_code`, `slug`, `value`) VALUES
(451, 'd40404ec9a25ed0dc3bdc019ce6faf73', 'en', 'yes_i_understand_after_the_funds_added_i_will_not_ask_fraudulent_dispute_or_chargeback', 'Yes, I understand after the funds added i will not ask fraudulent dispute or charge-back!                                                                                                                                                                                                                                                                                        '),
(452, '45ac747ad43c0676c0e3b98d35703c1b', 'en', 'this_payment_gateway_is_not_already_active_at_the_present', 'This Payment Gateway is not already active at the present!'),
(453, '75fe9394af9f5347cadd124815abb0df', 'en', 'Pay', 'Pay'),
(454, '5430c5ca5d3bb8fdb18960e7360742c7', 'en', 'you_can_make_a_manual_payment_to_cover_an_outstanding_balance_you_can_use_any_payment_method_in_your_billing_account_for_manual_once_done_open_a_ticket_and_contact_with_administrator', 'You can make a manual payment to cover an outstanding balance. Once time, open a ticket and contact with Administrator.                                                                                                                                                                                                                                                                                        '),
(455, 'eaf7d7ead05483c0f3775aa72ab637c4', 'en', 'amount_is_required', 'Amount is required'),
(456, 'e737bd3b1ea47d928c8ef6a4766e6051', 'en', 'amount_must_be_greater_than_zero', 'Amount must be greater than zero'),
(457, 'b7afaee48eacad4524dc0ad386ade8da', 'en', 'minimum_amount_is', 'Minimum Amount is'),
(458, '0f5bba7bd51578e729c3fb1ca04f1797', 'en', 'you_must_confirm_to_the_conditions_before_paying', 'You must confirm to the conditions before paying'),
(459, '176f675891aa12a407defbd5fc5f7617', 'en', 'processing_', 'Processing ....!'),
(460, '215529dfdba1286a19122f75b9b32a08', 'en', 'payment_sucessfully', 'Payment sucessfully!'),
(461, 'ab51c5417eb4ee9fac953e1b3e881a69', 'en', 'your_payment_has_been_processed_here_are_the_details_of_this_transaction_for_your_reference', 'Your payment has been processed. Here are the details of this transaction for your reference:                                                                                                                                                                                                                                                                                        '),
(462, '857d6c462781b1cbcc8131b9e197c471', 'en', 'payment_unsucessfully', 'Payment unsucessfully!'),
(463, '1f4b9223ae37d5e6a6a4509622ab934f', 'en', 'sorry_your_payment_failed_no_charges_were_made', 'Sorry, your payment failed. No charges were made'),
(464, 'e77ef8b41bf82ca38dfab8834bfd448e', 'en', '2checkout_creditdebit_card_payment', '2Checkout Credit/Debit card Payment'),
(465, '4b5de4bcbdb6816f7764320720620fe8', 'en', 'stripe_creditdebit_card_payment', 'Stripe Credit/Debit card Payment'),
(466, '224eab3e3973dbbde23e7892e7d9e9a6', 'en', 'user_information', 'User information'),
(467, '80562fd91762b4f040d15e1179061cbc', 'en', 'card_number', 'CARD NUMBER'),
(468, '169b824efc0545bfcd1246871d36acaf', 'en', 'expiry_date', 'EXPIRY DATE'),
(469, '0251ba94566ddddf98b2776fa6113a46', 'en', 'there_is_no_any_payment_gateway_at_the_present', 'There is no any payment gateway at the present!'),
(470, 'ae53a6af0be25f033fb09151f8388a02', 'en', 'payment_gateway', 'Payment Gateway'),
(471, '5f964918c01c5b963d84e9adbe35cb03', 'en', 'empty', 'Empty'),
(472, 'fcd8f292bbce0b6e3b80bb2612998ee5', 'en', 'transaction_id_was_sent_to_your_email', '(Transaction ID was sent to your email)'),
(473, '2ef65f55f414cb5d622c700016c753e5', 'en', 'total_amount_XX_includes_fee', 'Total Amount (%s) (Includes fee):'),
(474, '15ad019a208d134c0c14809d4923c2b3', 'en', 'currency_rate', 'Currency Rate'),
(475, 'd88484c73bc28d1ec9b4c8516750f01e', 'en', 'please_do_not_refresh_this_page', 'Please do not refresh this page...'),
(476, '706475d18e8027ae0f58022ed5d29dc4', 'en', 'Deposit_to_', 'Deposit_to_'),
(477, '92c1affe5208880574a3921e420b49d4', 'en', 'clicking_return_to_shop_merchant_after_payment_successfully_completed', 'Clicking <strong class=\'text-danger\'>Return to Shop (Merchant)</strong> after payment successfully completed                                                                                                                                                                                                                                                                                        '),
(478, 'dcb1ba3084987294390112b0eb9fa3cf', 'en', 'resellers_1_destination_for_smm_services', 'Resellers\' #1 Destination for SMM Services'),
(479, '7734fcc824bd9b0d5f0e2de3687bdb68', 'en', 'save_time_managing_your_social_account_in_one_panel_where_people_buy_smm_services_such_as_facebook_ads_management_instagram_youtube_twitter_soundcloud_website_ads_and_many_more', 'Save time managing your social account in one panel. Where people buy SMM services such as Facebook ads management, Instagram, YouTube, Twitter, Soundcloud, Website ads and many more!                                                                                                                                                                                                                                                                                        '),
(480, '36c14edfc062061044071adbf88a5273', 'en', 'get_start_now', 'Get start now!'),
(481, 'baf7261ef66befd7aad761a4a842748a', 'en', 'best_smm_marketing_services', 'Best SMM Marketing Services!'),
(482, 'cd04603bf2c2e5224bbf8ca56f12f0c4', 'en', 'best_smm_marketing_services_desc', 'We provide the cheapest SMM Reseller Panel services amongst our competitors. If you’re looking for a super-easy way to offer additional marketing services to your existing and new clients, look no further! our site offers that and more ! <br><br>You can resell our services in any site or Link your site through API and start resell our services directly start building stronger relationships, and helping you make a great profit at the same time. We do the work so you can focus on what you do best! As you grow, your profit grows without having to hire more people. This allows you to expand your business without all the expense and headaches usually associated with growing bigger!                                                                                                                                                                                                                                                                                        '),
(483, 'd9bf6ecb999ef0c8eb41a188a777b2c9', 'en', 'What_we_offer', 'What we offer!'),
(484, '455480538d4a02c46b79fcfece853394', 'en', 'you_can_resell_our_services_and_grow_your_profit_easily_resellers_are_important_part_of_smm_panel', 'You can resell our services and grow your profit easily, Resellers are important part of SMM PANEL                                                                                                                                                                                                                                                                                        '),
(485, 'ee10b7e19ca01d3712e2c9b2e764463e', 'en', 'technical_support_for_all_our_services_247_to_help_you', 'Technical support for all our services 24/7 to help you'),
(486, '769b4d7d8e76e4c1c628a084317c843e', 'en', 'get_the_best_high_quality_services_and_in_less_time_here', 'Get the best high quality services and in less time here'),
(487, '8f7f3e0f4196f18f256663085d16bf20', 'en', 'services_are_updated_daily_in_order_to_be_further_improved_and_to_provide_you_with_best_experience', 'Services are updated daily In order to be further improved and to provide you with best experience                                                                                                                                                                                                                                                                                        '),
(488, 'a2dcb71a104d61fa802799fab726fa91', 'en', 'we_have_api_support_for_panel_owners_so_you_can_resell_our_services_easily', 'We have API Support For panel owners so you can resell our services easily                                                                                                                                                                                                                                                                                        '),
(489, 'ba2fa1e1693c4d86168fe05bf87481f7', 'en', 'we_have_a_popular_methods_as_paypal_and_many_more_can_be_enabled_upon_request', 'We have a Popular methods as PayPal and many more can be enabled upon request                                                                                                                                                                                                                                                                                        '),
(490, '530504dd1f34e7aece1a6853aa3b099f', 'en', 'Resellers', 'Resellers'),
(491, '599d5e4577567debf8147e1a91371c67', 'en', 'secure_payments', 'Secure Payments'),
(492, 'a2fb3231c1797d25c8a91450366eb70d', 'en', 'Supports', 'Supports'),
(493, 'c1b9f4c3e66a64b35da3473d2254f1cd', 'en', 'Updates', 'Updates'),
(494, '9b854f3942d7d0ad91bdbdfbdcac7a43', 'en', 'api_support', 'Api support'),
(495, '904b9c9cdbae3b87f50203fb107c1f99', 'en', 'high_quality_services', 'High quality services'),
(496, 'e26b144523891a715d42e5aca543eec5', 'en', 'ready_to_start_with_us', 'READY TO START WITH US?'),
(497, 'bd2e3bed9d44db0e4fb6f7a4b612db2e', 'en', 'Terms__Privacy_Policy', 'Terms & Privacy Policy'),
(498, 'cf0c1ab8cfef675d76fcfb30dc2bbedb', 'en', 'Terms', 'Terms'),
(499, '1055a14d68152fc62889666a7557f0ba', 'en', 'Privacy_Policy', 'Privacy Policy'),
(500, 'd9cdb908aa88355a98434418255e11c7', 'en', 'Notification', 'Notification!'),
(501, 'e180d9b3dad89c23593311e3242f441b', 'en', 'Close', 'Close'),
(502, '8789e3c64acc266de9f296d3ad77a7df', 'en', 'register_and_try_for_free_we_give_you_1_to_get_started', 'Register and try for FREE. We give you € 1 to get started!'),
(503, 'dfa7f314d8d7202e62ff2a4ce73bbb70', 'en', 'login_to_your_account', 'Login to your account'),
(504, '424022becc371e62bbddedfe324124a1', 'en', 'only_letters_and_white_space_allowed', 'Only letters and white space allowed'),
(505, '30825f0fa47e26e35b45613d9c5023be', 'en', 'remember_me', 'Remember me'),
(506, '0338780f400336732550a0b3b9b5a4e5', 'en', 'forgot_password', 'Forgot password'),
(507, '4364415daa9b5bae04bebe1aab798fe6', 'en', 'dont_have_account_yet', 'Don\'t have account yet?'),
(508, '2b588ff98b1eda8c55182e14eb68fa13', 'en', 'enter_your_registration_email_address_to_receive_password_reset_instructions', 'Enter your registration email address to receive password reset instructions.                                                                                                                                                                                                                                                                                        '),
(509, 'def235850c763c5fa00ecf34d47336f3', 'en', 'new_password', 'New Password'),
(510, 'ded31cee3d617ac09d5c84a865e36e77', 'en', 'register_now', 'Register Now'),
(511, '08af3d8afc1d63dca1942f5b34cb5813', 'en', 'create_new_account', 'Create new account'),
(512, '2c350ff321a95fc0545a651765099f2a', 'en', 'i_agree_the', 'I agree the'),
(513, 'a7286d68ed6737df63f58ea88ca7e729', 'en', 'already_have_account', 'Already have account?'),
(514, '518ffffd508e90524e9f4cd9262a5e67', 'en', 'oops_you_must_agree_with_the_terms_of_services_or_privacy_policy', 'Oops! You must agree with the Terms of Services or Privacy Policy                                                                                                                                                                                                                                                                                        '),
(515, 'a81ea34b730d0727c4b62369fd651d9d', 'en', 'welcome_you_have_signed_up_successfully', 'Welcome! you have signed up successfully.'),
(516, '4806bfd788d2855d962bac9401a3cf42', 'en', 'your_account_has_not_been_activated', 'Your account has not been activated'),
(517, 'e312fd24b82b5d9251cc8cdc6f70c1eb', 'en', 'Login_successfully', 'Login successfully'),
(518, '463852a8b28fb9498ac7385d30d4cbef', 'en', 'email_address_and_password_that_you_entered_doesnt_match_any_account_please_check_your_account_again', 'Email address and password that You entered doesn\'t match any account. Please check your account again                                                                                                                                                                                                                                                                                        '),
(519, 'afbb1be0484937a2fd0e76e5e0fd6986', 'en', 'we_have_send_you_a_link_to_reset_password_and_get_back_into_your_account_please_check_your_email', 'We have send you a link to reset password and get back into your account. Please check your email                                                                                                                                                                                                                                                                                        '),
(520, '28f75b7d3cf606d104df3fb141a68334', 'en', 'your_password_has_been_successfully_changed', 'Your password has been successfully changed'),
(521, '625145e197bc958a6069329f6635d7a5', 'en', 'thank_you_for_signing_up_please_check_your_email_to_complete_the_account_verification_process', 'Thank you for signing up! Please check your email to complete the Account Verification Process                                                                                                                                                                                                                                                                                        '),
(522, '417d335ba29c54584a4a58085b22a4bd', 'en', 'congratulations_your_registration_is_now_complete', 'Congratulations! Your Registration is Now Complete'),
(523, 'b52d9c45cb5a32fa1b6042651fac1722', 'en', 'congratulations_desc', 'Welcome to our service! We\'re happy to have you as a part of our community. Your account has been successfully created. You can access your account by clicking on the button below.                                                                                                                                                                                                                                                                                        '),
(524, '1f136cc3338ff816b1f0aa06779964ea', 'en', 'api_providers_list', 'API Providers List'),
(525, 'e126514a7159bd10461386a6c5f535aa', 'en', 'update_api', 'Update API'),
(526, '641aa62d3e7f6999d5e295c55ca28530', 'en', 'update_balance', 'Update Balance'),
(527, '1fc271045a7cd67a4ca7732707408b28', 'en', 'Type', 'Type'),
(528, '19aec8d3da5a8103d809842ce19cf4ea', 'en', 'Manual', 'Manual'),
(529, '9b6667b5384ce4f881f36d6e06e4e16b', 'en', 'edit_api', 'Edit API'),
(530, '75b85461ee302e2c6d98973d2edb3930', 'en', 'api_url', 'API Url'),
(531, '16f6b67632da3d1be13652f0998890c0', 'en', 'list_of_api_services', 'List of API Services'),
(532, '25d79523a565ac4014a579ff5851e008', 'en', 'choose_a_api_provider', 'Choose a API Provider'),
(533, 'b265a198243a933e9979fb7cfff406f0', 'en', 'add_service', 'Add service'),
(534, '4bc0aebe337260228b9ac7178bb692ec', 'en', 'services_list_via_api', 'Services list via API'),
(535, 'cebba30a90d71498376ce1e4c2bf3e55', 'en', 'api_provider_does_not_exists', 'API Provider does not exists.'),
(536, 'cad70b4b9a3691fa12903097e51b9088', 'en', 'api_url_is_required', 'API URL is required'),
(537, '0d6884d82adba12c7da9cd8b50477e80', 'en', 'api_key_is_required', 'API KEY is required'),
(538, 'eacf75361aa13950f360341307bc6d74', 'en', 'sorry_the_service_id_already_exists', 'Sorry! The Service ID already exists'),
(539, '7338f25a3f70beed57ecc788eb1e0453', 'en', 'add_new_service_via_api', 'Add New Service via API'),
(540, '8793a6368ba53fdca4922a0f7947a7be', 'en', 'api_orderid', 'API OrderID'),
(541, '6b58786dc7a0c6b7e7480ad381392418', 'en', 'API_Response', 'API Response'),
(542, '520a3e625740ffe2e1d163d474020c1f', 'en', 'bulk_add_all_services', 'Bulk Add All Services'),
(543, '0f41c75f817f462b5fab487e82992f01', 'en', 'api_provider_name', 'API Provider Name'),
(544, '6adbbd2b8443cc0976fae220707c534e', 'en', 'api_provider', 'API Provider'),
(545, '59bbe1a32b497b18026c21e9c7d78d45', 'en', 'api_service_id', 'API ServiceID'),
(546, '61f56a5b75675d28b07f15cf5a27b9ef', 'en', 'price_percentage_increase_auto_rounding_to_2_decimal_places', 'Price percentage increase (Auto rounding to 2 decimal places)'),
(547, 'd4d29c0fd4ec56bd5020997763234a93', 'en', 'bulk_add_limit', 'Bulk add limit'),
(548, '349691e50c04e3872d88f0faa5534ff4', 'en', 'note_when_you_use_this_feature_the_system_will_bulk_add_services_categories_from_api_provider_and_set_price_percentage_increase', 'Note: When you use this feature, the system will bulk add services, categories from API provider and set price percentage increase                                                                                                                                                                                                                                                                                        '),
(549, '9681abbb1a26b05520a685e6f1bce7f8', 'en', 'price_percentage_increase_in_invalid_format', 'Price Percentage increase in invalid format'),
(550, '9ada23aff7552f20f4f62a4304a57cfe', 'en', 'bulk_add_limit_in_invalid_format', 'Bulk add limit in invalid format'),
(551, '75b900772ad303a073241dfa4a79b696', 'en', 'add_edit_provider_note', 'Note: This script supports most of all API Providers like: JAP, GreatSMO.com etc. So it doesn\'t support another API provider which have different API Parameters                                                                                                                                                                                                                                                                                        '),
(552, '56bd550e20e66df5bb78d4f31180814c', 'en', 'sync_services', 'Sync Services'),
(553, '44251ea81c6aed75ff7804655ccc77e5', 'en', 'Disabled', 'Disabled'),
(554, '195b8f4c987b3ab49d37d71a52dc3426', 'en', 'synchronization_results', 'Synchronization results'),
(555, 'c3d8d5b910d4cc2e4a873f64268775fc', 'en', 'synchronous_request', 'Synchronous request'),
(556, '50d77b26e279498e03dc79796c34ca22', 'en', 'current_service', 'Current Services'),
(557, '4f13b6971b62216c44522f99bc52797c', 'en', 'current_service_sync_all_the_current_services', 'Current Service: Sync all the current services'),
(558, '28872248fd5b24ea0b66df1913349aef', 'en', 'all_auto_add_new_service_if_the_service_doesnt_exists', 'All: Auto add new service if the service doesn\'t exists'),
(559, 'e9c4fd5d67d07046121c2d62fc4a8249', 'en', 'add_update_service', 'Add/Update service'),
(560, 'c964fff578d804d51cd8112dadc11abf', 'en', 'service_lists_are_empty_unable_to_sync_services', 'Service lists are empty. Unable to sync services!'),
(561, '5de9588bbedb3d6bb366c34dcfff1e58', 'en', 'there_seems_to_be_an_issue_connecting_to_api_provider_please_check_api_key_and_token_again', 'There seems to be an issue connecting to API provider. Please check API key and Token again!                                                                                                                                                                                                                                                                                        '),
(562, '70fcc0be26aeeeed154938fd496294d3', 'en', 'price_invalid_format', 'Price invalid format'),
(563, 'c325ac855d7a8d8e49ad9ae660c54c96', 'en', 'auto_rounding_to_X_decimal_places', '(Auto rounding to %s decimal places)'),
(564, '90b5deb1fd47f8a6f4e206b9096dcb4b', 'en', 'sync_min_max_dripfeed', 'Sync Min, Max, DripFeed'),
(565, 'c2e1646e5fa30c34fbc1c7ff36db3610', 'en', 'sync_new_price', 'Sync New Price'),
(566, '4437c4eff06be5d061c0efabcf1c7fa7', 'en', 'sync_original_price', 'Sync Original Price'),
(567, '8a431fa3e8b42997bcf50b6b8a0b938e', 'en', 'auto_convert_to_new_currency_with_currency_rate_like_in', 'Auto convert to new currency with currency rate like in '),
(568, 'bd18df536302f85ed88bee533663cf84', 'en', 'currency_setting_page', 'Currency Setting page'),
(569, 'c42850a89e1e0dcc978b56d535400fe4', 'en', 'auto_sync_services_setting', 'Auto Sync Services Setting'),
(570, '8e9e4db5f579e31443b0ffbc22740623', 'en', 'login_to_maintenace_mode', 'Login to Maintenace Mode'),
(571, '798f82ce22324ba59fd0386b7124cacc', 'en', 'use_admin_account', '(Use Admin account)'),
(572, '83a07825ba9845a04f1938c34c303f77', 'en', 'the_website_is_in_maintenance_mode', 'The website is in maintenance mode'),
(573, 'fae58c44861ee673b16a86fd0e19b188', 'en', 'were_undergoing_a_bit_of_scheduled_maintenance_sorry_for_the_inconvenience_well_be_backup_and_running_as_fast_as_possible', 'We\'re undergoing a bit of scheduled maintenance. Sorry for the inconvenience. We\'ll be backup and running as fast as possible!                                                                                                                                                                                                                                                                                        '),
(574, 'f694487db1e6c88afd5be1965912f9c2', 'en', 'displays_news__announcement_feature', 'Displays News & Announcement feature'),
(575, '83c27822e09ba2fb99ea56d5f4566e53', 'en', 'news__announcement', 'News & Announcement'),
(576, '5b40d6b7f12344e44bad03e3ffab0b1c', 'en', 'New_services', 'New services'),
(577, '61566f7223a1d95f52d5dfe223ea5423', 'en', 'Updated_services', 'Updated service'),
(578, '9db11c80570db3cc74920aec025110b1', 'en', 'Announcement', 'Announcement'),
(579, '75ad9f84ea2965995af940ef4390cf22', 'en', 'Disabled_services', 'Disabled services'),
(580, 'e277aeeb7e8f96400edea95522f6522e', 'en', 'View', 'View'),
(581, 'ee320c327129ad30816e9b7957bf417a', 'en', 'edit_news_announcement', 'Edit News/Announcement'),
(582, 'ae355c66c2c6626e87ed75f2e8ce12fe', 'en', 'Start', 'Start'),
(583, '47de7b5fa056721ca31fcf7e642ea591', 'en', 'whats_new_on_smartpanel', 'What\'s new!!'),
(584, 'ab980128d0a486d8c15000704c88544b', 'en', 'invalid_news_type', 'Invalid news type!'),
(585, 'ff16bd4aeee22fa2a0bcbf2ee40df52d', 'en', 'start_field_is_required', 'Start field is required'),
(586, '631c725a3e144d2e2542893c39f5c775', 'en', 'Description_field_is_required', 'Description field is required'),
(587, '92434e8bdae1606f7f8f945bb8af72e6', 'en', 'expiry_field_is_required', 'Expiry field is required'),
(588, '6f4b18284ebc61f037b4a401cb6d3a6d', 'en', 'Modules', 'Modules'),
(589, 'c538d076708fea652b2742b4ff350d15', 'en', 'Purchased', 'Purchased'),
(590, '038d64c30da39bf17a8a43bf58aac505', 'en', 'Buy_now', 'Buy Now'),
(591, 'cc914769e40b50c47a5f6fb7cb83be4a', 'en', 'Upgrade_version', 'Upgrade to version '),
(592, '405acc72618e7a9b477aef8958d603c2', 'en', 'Clear_all', 'Clear all'),
(593, '996541cacde4b28c660675450a907124', 'en', 'Role', 'Role'),
(594, 'da8408718b985cbfd4151f65b6a4ba54', 'en', 'IP_Address', 'IP_Address'),
(595, 'de845fa55d47111e953cf60aa43089bf', 'en', 'Date_Time', 'DateTime'),
(596, 'df7aa10afe52e45597fff0115715d908', 'en', 'Check_in', 'Check in'),
(597, '6a9e21dcba9d305b99d945806f406159', 'en', 'Check_out', 'Check out'),
(598, '0a3f575733d7016381209bde9e1db441', 'en', 'Banned_By', 'Banned By'),
(599, 'd62c2185d0739db5771712d259a03149', 'en', 'newsletter', 'Newsletter'),
(600, '0d92ffe93bc80c9e81e08b6cf42ad153', 'en', 'fill_in_the_ridiculously_small_form_below_to_receive_our_ridiculously_cool_newsletter', 'Fill in the ridiculously small form below to receive our ridiculously cool newsletter!                                                                                                                                                                                                                                                                                        '),
(601, 'a1c7323d49dd82df889ac0faebd2571c', 'en', 'subscribe_now', 'Subscribe now'),
(602, '474e30326a68aad2bf96f621de16554c', 'en', 'you_subscribed_successfully_to_our_newsletter_thank_you_for_your_subsrciption', 'You subscribed successfully to our newsletter. Thank you for your subsrciption                                                                                                                                                                                                                                                                                        '),
(603, '695a6e9060640e8b7e637a63a4fe0074', 'en', 'an_error_occurred_while_subscribing_please_try_again', 'An error occurred while subscribing. Please try again.'),
(604, '1bb0abce8ddca6f2d3619b5ece079b47', 'en', 'a_subscriber_for_the_specified_email_address_already_exists_try_another_email_address', 'A subscriber for the specified email address already exists. Try another email address                                                                                                                                                                                                                                                                                        '),
(605, '93a548791f9281a2c581ece370433cf9', 'en', 'cookie_policy_page', 'Cookie Policy Page'),
(606, '5e7244cb3c8a600d54962df0c595b5c1', 'en', 'freekassa_confirm_form', 'Free-Kassa Confirm Form'),
(607, 'da55f2788171d7ee62086646f8e53039', 'en', 'choose_payment_method', 'Choose a payment Method'),
(608, 'd931a84f28160e6ac1541507df740531', 'en', 'hesabe', 'Hesabe'),
(609, 'd496b50efcd3adf3fb23b46e44b838fd', 'en', 'the_system_will_convert_automatically_from_KWD_to_USD_and_add_funds_to_your_blance_when_payment_is_made', 'The system will convert automatically from KWD to USD and add funds to your blance when payment is made                                                                                                                                                                                                                                                                                        '),
(610, '4ba6d028982cb36776312ba540c1355e', 'en', 'mercadopago_payment_form', 'Mercadopago payment form'),
(611, '7e8cf5b9f11f4dd18a8a886645a3a7d5', 'en', 'card_holder_name', 'Card holder name:'),
(612, '3ed940c71223a81ceed6b99606c71895', 'en', 'document_number', 'Document number:'),
(613, 'e2ce704ccc99552e6fc597d3b116c9c1', 'en', 'paytm_merchant_key', 'Paytm Merchant Key'),
(614, '549ed5d51e2c3e3bc5add3fd1e778fae', 'en', 'Paytm_mid_merchant_id', 'Paytm MID (Merchant ID)'),
(615, 'eef70ca960237159173e89a0f04e434c', 'en', 'Paytm_Integration', 'Paytm Integration'),
(616, 'c2f3d69e921fe0f3f81ccdd59ba3738b', 'en', 'paytm_confirmation', 'Paytm confirmation'),
(617, '06f27aa1b542bef294e742f98281e2ce', 'en', 'the_system_will_convert_automatically_from_INR_to_USD_and_add_funds_to_your_blance_when_payment_is_made', 'The system will convert automatically from INR to USD and add funds to your blance when payment is made                                                                                                                                                                                                                                                                                        '),
(618, '50109d40ca835b76a01dc9e1346299bc', 'en', 'payulatam_confirm_form', 'Payulatam Confirm Form'),
(619, '3e87e41b2826ee97b33b23559db74720', 'en', 'the_system_will_convert_automatically_from_cop_to_usd_and_add_funds_to_your_blance_when_payment_is_made', 'The system will convert automatically from COP to USD and add funds to your blance when payment is made                                                                                                                                                                                                                                                                                        '),
(620, 'f6b37a65de34495129fa6b833145854f', 'en', 'Paywant_Integration', 'Paywant Integration'),
(621, 'bbe071152bf4912aa4f4d060b666c78e', 'en', 'perfect_money', 'Perfect Money'),
(622, '411f6b15f0da8261419a4185b596bc1c', 'en', 'perfect_money_integration', 'Perfect Money integration'),
(623, '59f40ab3126d2d80522ea60845c69dad', 'en', 'perfect_money_account_id_usd', 'Perfect Money Account ID (USD)'),
(624, '2f501eb65e3886dda3a3b94fe8cd578b', 'en', 'perfect_money_confirmation', 'Perfect Money® Confirmation'),
(625, 'be56bb0bfe0af482c78ee21514a642e1', 'en', 'total_amount_usd_includes_fee', 'Total Amount (USD) (Includes fee):'),
(626, '5a9b0e91699726848cfc8fe8c788477b', 'en', 'webmoney', 'Webmoney'),
(627, 'fc1172556706deb23ee72cf96d602ddf', 'en', 'get_your_social_accounts_followers_and_likes_at_one_place_instantly', 'Get Your Social Account\'s Followers And Likes At One Place, Instantly                                                                                                                                                                                                                                                                                        '),
(628, '4284a355f491fe3c7ea72578543c6d6e', 'en', 'what_people_say_about_us', 'What People Say About Us'),
(629, '2755d06733a5e975d88b22ec7597472e', 'en', 'our_service_has_an_extensive_customer_roster_built_on_years_worth_of_trust_read_what_our_buyers_think_about_our_range_of_service', 'Our service has an extensive customer roster built on years’ worth of trust. Read what our buyers think about our range of service.                                                                                                                                                                                                                                                                                        '),
(630, '5b6a73617d310bb158bc8bd8db9bf163', 'en', 'client_one', 'John Smith'),
(631, '14f81d0b36bcfc62702d4cd8df4d40ad', 'en', 'client_one_jobname', 'Youtuber'),
(632, 'df41e242a5cfcff296060b2e206274cc', 'en', 'client_one_comment', 'After trying several websites who claim to have \'fast delivery\', I\'m glad I finally found this service. They literally started delivering 5 seconds after my payment!                                                                                                                                                                                                                                                                                        '),
(633, 'e22311c3248a9f616ce3c6fe3f133369', 'en', 'client_two', 'Keith Irvine'),
(634, '435bf4af0d46dcfbe9ff584e1d4cf1ff', 'en', 'client_two_jobname', 'Instagram Model'),
(635, 'cce848388159088ec5c200b75fdfc8fb', 'en', 'client_two_comment', 'I cannot stress enough how happy I am with the service that I received. Thanks to all of you, my Instagram account is surging with activity! You’ve not only earned yourself a loyal customer, but a friend for life.                                                                                                                                                                                                                                                                                        '),
(636, '797c7e703051b6a5efc5598fb4b1778d', 'en', 'client_three', 'Sara-Jade Bevis'),
(637, 'af764a4e12513fc57cfb347bb47a3072', 'en', 'client_three_jobname', 'Bloger'),
(638, '14f7a2944da66bf770853b14c7778d86', 'en', 'client_three_comment', 'Wow! This is amazing, i have been purchasing Instagram Likes for over a year and never got a delay! ? did a great job always                                                                                                                                                                                                                                                                                        '),
(639, '100a83353326ae99e6e25724a0592023', 'en', 'we_have_several_services_that_you_can_opt_for_backed_by_our_comprehensive_guarantee_click_the_button_below_to_find_out_more', 'We have several services that you can opt for backed by our comprehensive guarantee – click the button below to find out more.                                                                                                                                                                                                                                                                                        ');

-- --------------------------------------------------------

--
-- Table structure for table `general_lang_list`
--

CREATE TABLE `general_lang_list` (
  `id` int(11) NOT NULL,
  `ids` varchar(225) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `country_code` varchar(225) DEFAULT NULL,
  `is_default` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `general_lang_list`
--

INSERT INTO `general_lang_list` (`id`, `ids`, `code`, `country_code`, `is_default`, `status`, `created`) VALUES
(1, '26da880cfbebc900e6289167e2a96b62', 'en', 'GB', 1, 1, '2020-05-04 09:47:23');

-- --------------------------------------------------------

--
-- Table structure for table `general_news`
--

CREATE TABLE `general_news` (
  `id` int(10) UNSIGNED NOT NULL,
  `ids` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `created` datetime DEFAULT NULL,
  `expiry` datetime DEFAULT NULL,
  `changed` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_news`
--

INSERT INTO `general_news` (`id`, `ids`, `uid`, `type`, `description`, `status`, `created`, `expiry`, `changed`) VALUES
(1, '4ca7d8c9e2d776ffc49ea457e5599b4f', 1, 'announcement', '&lt;h3 class=&quot;featureTitle&quot;&gt;🎁 &lt;em&gt;15% Deposit Bonus!&lt;/em&gt; 🎁&lt;/h3&gt;\r\n&lt;p&gt;&lt;strong&gt;&lt;a href=&quot;https://socialkart.in&quot; target=&quot;_blank&quot; rel=&quot;noopener&quot;&gt;SocialKart.in&lt;/a&gt;&lt;/strong&gt; hopes you are having a wonderful week!&lt;/p&gt;\r\n&lt;p&gt;To make it even better, we decided to give a Deposit Bonus to all our customers in the next &lt;em&gt;&lt;strong&gt;48 hours!&lt;/strong&gt;&lt;/em&gt;&lt;/p&gt;\r\n&lt;p class=&quot;&quot;&gt;We are giving a &lt;span style=&quot;color: #ff0000;&quot;&gt;&lt;strong&gt;15% Deposit Bonus&lt;/strong&gt;&lt;/span&gt; on every transaction starting from now until &lt;span style=&quot;color: #ff6600;&quot;&gt;&lt;strong&gt;00:00 AM GMT 06/11/2051&lt;/strong&gt;&lt;/span&gt;.🔥&lt;/p&gt;\r\n&lt;p class=&quot;&quot;&gt;&lt;em&gt;&lt;strong&gt;Don&#039;t miss this great opportunity to Deposit Money and grow your Social Media profiles on the next level!&lt;/strong&gt;&lt;/em&gt;&lt;/p&gt;', 1, '2021-09-25 00:00:00', '2051-11-06 00:00:00', '2021-09-25 19:17:19');

-- --------------------------------------------------------

--
-- Table structure for table `general_options`
--

CREATE TABLE `general_options` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `value` longtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `general_options`
--

INSERT INTO `general_options` (`id`, `name`, `value`) VALUES
(67, 'enable_https', '1'),
(68, 'enable_disable_homepage', '0'),
(69, 'website_desc', 'OSPXPRO v1 SMM Panel is the world\'s Largest and Best Cheapest Social Media Optimization Service Panel for Buyer & Resellers with 24*7 Customer support - Instagram , Facebook ,Youtube ,Twitter Service & more                                                                                                                                                                '),
(70, 'website_keywords', 'OSPXPRO v1, smmpanel, smm reseller panel, smm provider panel, reseller panel, instagram panel, resellerpanel, social media reseller panel, smmpanel, panelsmm, smm, panel, socialmedia, instagram reseller panel,smmpanel,SMM Panel India,SMM Panel Paytm,SMM Panel Cheap India,SMM Reseller Panel,SMM Reseller Panel India,Cheap SMM Panel,cheapest SMM panel,cheap SMM panel india,Cheapest SMM Reseller Panel,Cheapest SMM Panel Paytm,Cheapest SMM Panel Paytm,INDIAN SMM Panel,IndianSMM Reseller Panel,Best SMM panel,Best SMM Panel India,Top SMM Panel ,cheapest smm panel, best smm panel, social media reseller panel, smm panel reseller, instagram reseller panel                                                                                                                                                                                                                       '),
(71, 'website_title', 'OSPXPRO v1 - Social Media Optimization'),
(72, 'website_favicon', 'https://ownsmmpanel.in/ownsmmpanel/images/favicon.png'),
(73, 'embed_head_javascript', ''),
(204, 'razor_pay_payment_transaction_min', ''),
(205, 'paypal_payment_transaction_min', ''),
(206, 'stripe_payment_transaction_min', ''),
(74, 'website_logo', 'https://ownsmmpanel.in/ownsmmpanel/images/logofooter.png'),
(75, 'website_logo_white', 'https://ownsmmpanel.in/ownsmmpanel/images/logofooter.png'),
(108, 'cookies_policy_page', '<p>We use cookies to personalise content and ads, to provide social media features and to analyse our traffic. We also share information about your use of our site with our social media, advertising and analytics partners who may combine it with other information that you’ve provided to them or that they’ve collected from your use of their services.</p>'),
(76, 'enable_service_list_no_login', '1'),
(77, 'disable_signup_page', '0'),
(78, 'notification_popup_content', ''),
(79, 'is_cookie_policy_page', '1'),
(80, 'enable_api_tab', '1'),
(81, 'contact_tel', '0123456789'),
(82, 'contact_email', 'ownsmmpanel@gmail.com'),
(83, 'contact_work_hour', 'Mon - Sat 09 am - 10 pm'),
(84, 'social_facebook_link', '#'),
(85, 'social_twitter_link', '#'),
(86, 'social_instagram_link', '#'),
(87, 'social_pinterest_link', '#'),
(88, 'social_tumblr_link', '#'),
(89, 'social_youtube_link', '#'),
(90, 'copy_right_content', 'Copyright © 2021 - OSPXPro v1'),
(91, 'embed_javascript', ''),
(92, 'enable_notification_popup', '0'),
(93, 'enable_goolge_recapcha', '0'),
(94, 'get_features_option', '1'),
(95, 'currency_decimal_separator', 'dot'),
(96, 'currency_thousand_separator', 'comma'),
(97, 'currency_symbol', '₹'),
(98, 'currency_decimal', '2'),
(99, 'default_header_skin', 'purple'),
(100, 'enable_news_announcement', '1'),
(101, 'terms_content', NULL),
(102, 'policy_content', NULL),
(103, 'enable_signup_skype_field', '1'),
(104, 'auto_rounding_x_decimal_places', '2'),
(105, 'default_price_percentage_increase', '20'),
(106, 'is_maintenance_mode', '0'),
(107, 'website_name', 'OSPXPro v1'),
(109, 'default_home_page', 'pergo'),
(110, 'default_limit_per_page', '10'),
(111, 'default_timezone', 'UTC'),
(112, 'is_clear_ticket', '1'),
(113, 'default_clear_ticket_days', '1'),
(114, 'default_min_order', '100'),
(115, 'default_max_order', '5000'),
(116, 'default_price_per_1k', '0.10'),
(117, 'enable_drip_feed', '1'),
(118, 'default_drip_feed_runs', '10'),
(119, 'default_drip_feed_interval', '30'),
(120, 'enable_explication_service_symbol', '0'),
(121, 'google_capcha_site_key', 'Yours'),
(122, 'google_capcha_secret_key', 'Yours'),
(123, 'currency_code', 'INR'),
(124, 'is_auto_currency_convert', '1'),
(125, 'new_currecry_rate', '1'),
(126, 'is_verification_new_account', '0'),
(127, 'is_welcome_email', '0'),
(128, 'is_new_user_email', '0'),
(129, 'is_payment_notice_email', '0'),
(130, 'is_ticket_notice_email', '0'),
(131, 'is_ticket_notice_email_admin', '0'),
(132, 'is_order_notice_email', '0'),
(133, 'email_from', 'no-reply@ownsmmpanel.in'),
(134, 'email_name', 'OSPXPro'),
(135, 'email_protocol_type', 'php_mail'),
(136, 'smtp_server', ''),
(137, 'smtp_port', ''),
(138, 'smtp_encryption', 'none'),
(139, 'smtp_username', ''),
(140, 'smtp_password', ''),
(141, 'verification_email_subject', '{{website_name}} - Please validate your account'),
(142, 'verification_email_content', '<p><strong>Welcome to {{website_name}}! </strong></p><p>Hello <strong>{{user_firstname}}</strong>!</p><p> Thank you for joining! We&#39;re glad to have you as community member, and we&#39;re stocked for you to start exploring our service.  If you don&#39;t verify your address, you won&#39;t be able to create a User Account.</p><p>  All you need to do is activate your account by click this link: <br>  {{activation_link}} </p><p>Thanks and Best Regards!</p>'),
(143, 'email_welcome_email_subject', '{{website_name}} - Getting Started with Our Service!'),
(144, 'email_welcome_email_content', '<p><strong>Welcome to {{website_name}}! </strong></p><p>Hello <strong>{{user_firstname}}</strong>!</p><p>Congratulations! <br>You have successfully signed up for our service - {{website_name}} with follow data</p><ul><li>Firstname: {{user_firstname}}</li><li>Lastname: {{user_lastname}}</li><li>Email: {{user_email}}</li><li>Timezone: {{user_timezone}}</li></ul><p>We want to exceed your expectations, so please do not hesitate to reach out at any time if you have any questions or concerns. We look to working with you.</p><p>Best Regards,</p>'),
(145, 'email_new_registration_subject', '{{website_name}} - New Registration'),
(146, 'email_new_registration_content', '<p>Hi Admin!</p><p>Someone signed up in <strong>{{website_name}}</strong> with follow data</p><ul><li>Firstname {{user_firstname}}</li><li>Lastname: {{user_lastname}}</li><li>Email: {{user_email}}</li><li>Timezone: {{user_timezone}}</li></ul> '),
(147, 'email_password_recovery_subject', '{{website_name}} - Password Recovery'),
(148, 'email_password_recovery_content', '<p>Hi<strong> {{user_firstname}}! </strong></p><p>Somebody (hopefully you) requested a new password for your account. </p><p>No changes have been made to your account yet. <br>You can reset your password by click this link: <br>{{recovery_password_link}}</p><p>If you did not request a password reset, no further action is required. </p><p>Thanks and Best Regards!</p>                '),
(149, 'email_payment_notice_subject', '{{website_name}} -  Thank You! Deposit Payment Received'),
(150, 'email_payment_notice_content', '<p>Hi<strong> {{user_firstname}}! </strong></p><p>We&#39;ve just received your final remittance and would like to thank you. We appreciate your diligence in adding funds to your balance in our service.</p><p>It has been a pleasure doing business with you. We wish you the best of luck.</p><p>Thanks and Best Regards!</p>'),
(151, 'payment_transaction_min', '10'),
(152, 'payment_environment', 'live'),
(153, 'is_active_paypal', '1'),
(154, 'paypal_chagre_fee', '4'),
(155, 'paypal_client_id', 'test'),
(156, 'paypal_client_secret', 'test'),
(157, 'is_active_stripe', '1'),
(158, 'stripe_chagre_fee', '4'),
(159, 'stripe_publishable_key', 'test'),
(160, 'stripe_secret_key', 'test'),
(161, 'is_active_2checkout', '1'),
(162, 'twocheckout_chagre_fee', '4'),
(163, '2checkout_publishable_key', 'test'),
(164, '2checkout_private_key', 'test'),
(165, '2checkout_seller_id', 'test'),
(166, 'is_active_manual', '1'),
(167, 'manual_payment_content', '&lt;p&gt;&lt;strong&gt;HELLO !&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;If You Want To Add Funds&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;With Other Payment Methords&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;JUST CREATE A SUPPORT TICKITS&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;THANK YOU&lt;/strong&gt;&lt;/p&gt;'),
(168, 'is_active_paytm', '0'),
(169, 'paytm_payment_environment', 'PROD'),
(170, 'paytm_chagre_fee', '0'),
(171, 'paytm_currency_rate_to_usd', '1'),
(172, 'paytm_merchant_id', 'Yours'),
(173, 'paytm_merchant_key', 'Yours'),
(174, 'is_active_payumoney', '1'),
(175, 'payumoney_payment_environment', 'LIVE'),
(176, 'payumoney_chagre_fee', '4'),
(177, 'payumoney_payment_transaction_min', '5000'),
(178, 'payumoney_currency_rate_to_usd', '7.5'),
(179, 'payumoney_merchant_key', 'test'),
(180, 'payumoney_merchant_salt', 'test'),
(181, 'is_active_coinbase', '1'),
(182, 'paytm_payment_transaction_min', '10'),
(183, 'coinbase_chagre_fee', '0'),
(184, 'coinbase_payment_transaction_min', '10'),
(185, 'coinbase_api_key', 'yours'),
(186, 'enable_attentions_orderpage', ''),
(187, 'is_active_paytm_manual', '1'),
(188, 'paytm_number', ''),
(189, 'paytm_email', 'info@gmail.com'),
(190, 'paytm_password', 'ghgfhgfhfgh'),
(191, 'paytm_qr_url', 'https://i.imgur.com/77ca5Er.png'),
(192, 'is_active_razor_pay', '1'),
(193, 'razor_pay_chagre_fee', '4'),
(194, 'razor_pay_publishable_key', 'test'),
(195, 'razor_pay_secret_key', 'test'),
(196, 'is_active_perfectmoney', '1'),
(197, 'perfectmoney_chagre_fee', '4'),
(198, 'perfectmoney_payment_transaction_min', '50'),
(199, 'perfect_money_currency_code', 'USD'),
(200, 'perfect_money_account_usd_client_id', ''),
(201, 'perfect_money_account_eur_client_id', ''),
(202, 'perfect_money_account_btc_client_id', ''),
(203, 'perfectmoney_alternate_passphrase', ''),
(207, 'paytm_qr_image', 'Image Link Here'),
(208, 'is_active_paytmqr', '1'),
(209, 'paytm_qr_currency_rate_to_usd', '1'),
(210, 'paytm_qr_merchant_id', 'Yours'),
(211, 'paytm_qr_chagre_fee', '0'),
(212, 'paytm_qr_payment_transaction_min', ''),
(213, 'paytmqr_payment_environment', 'PROD');

-- --------------------------------------------------------

--
-- Table structure for table `general_purchase`
--

CREATE TABLE `general_purchase` (
  `id` int(11) NOT NULL,
  `ids` text DEFAULT NULL,
  `pid` text DEFAULT NULL,
  `purchase_code` text DEFAULT NULL,
  `version` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `general_purchase`
--

INSERT INTO `general_purchase` (`id`, `ids`, `pid`, `purchase_code`, `version`) VALUES
(1, '8068ec7f79145fe55dea67dd63b012c3', '23595718', '6627369b9e88fbca83df015e3aad8f751527', '3.2'),
(2, '79b73954fe929aa9d58ff842cae7b1c6', '20190607', '5c33fr93-dfe8-a4d8-78d2-df89a14d196g', '1.4');

-- --------------------------------------------------------

--
-- Table structure for table `general_sessions`
--

CREATE TABLE `general_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `general_sessions`
--

INSERT INTO `general_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('26225eb503f19630df4d6b27e0d5609162a590f2', '103.195.74.164', 1632583525, 0x5f5f63695f6c6173745f726567656e65726174657c693a313633323537353736363b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2231223b733a333a22696473223b733a33323a223236646138383063666265626339303065363238393136376532613936623632223b733a343a22636f6465223b733a323a22656e223b733a31323a22636f756e7472795f636f6465223b733a323a224742223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323032302d30352d30342030393a34373a3233223b7d7569647c733a313a2231223b757365725f63757272656e745f696e666f7c613a353a7b733a343a22726f6c65223b733a353a2261646d696e223b733a353a22656d61696c223b733a31353a2261646d696e406f73706465762e696e223b733a31303a2266697273745f6e616d65223b733a363a224f5350446576223b733a393a226c6173745f6e616d65223b733a343a225465616d223b733a383a2274696d657a6f6e65223b733a31323a22417369612f4b6f6c6b617461223b7d),
('be38903603c23e48d8665e84bb0e4f9783d3d1d3', '157.55.39.17', 1632576385, 0x5f5f63695f6c6173745f726567656e65726174657c693a313633323537363338353b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2231223b733a333a22696473223b733a33323a223236646138383063666265626339303065363238393136376532613936623632223b733a343a22636f6465223b733a323a22656e223b733a31323a22636f756e7472795f636f6465223b733a323a224742223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323032302d30352d30342030393a34373a3233223b7d),
('eaf39f5e0b4b28a0063451b492034daec84a3dc8', '27.61.230.102', 1632579548, 0x5f5f63695f6c6173745f726567656e65726174657c693a313633323537393534383b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2231223b733a333a22696473223b733a33323a223236646138383063666265626339303065363238393136376532613936623632223b733a343a22636f6465223b733a323a22656e223b733a31323a22636f756e7472795f636f6465223b733a323a224742223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323032302d30352d30342030393a34373a3233223b7d),
('1ef52a414616b50cec7e99fe6c3c0b9817471cd5', '172.105.78.243', 1632582448, 0x5f5f63695f6c6173745f726567656e65726174657c693a313633323538323434383b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2231223b733a333a22696473223b733a33323a223236646138383063666265626339303065363238393136376532613936623632223b733a343a22636f6465223b733a323a22656e223b733a31323a22636f756e7472795f636f6465223b733a323a224742223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323032302d30352d30342030393a34373a3233223b7d),
('a503470decc0090c4339e9f394fd5dab61f16114', '103.195.74.164', 1632583363, 0x5f5f63695f6c6173745f726567656e65726174657c693a313633323538333232343b6c616e6743757272656e747c4f3a383a22737464436c617373223a373a7b733a323a226964223b733a313a2231223b733a333a22696473223b733a33323a223236646138383063666265626339303065363238393136376532613936623632223b733a343a22636f6465223b733a323a22656e223b733a31323a22636f756e7472795f636f6465223b733a323a224742223b733a31303a2269735f64656661756c74223b733a313a2231223b733a363a22737461747573223b733a313a2231223b733a373a2263726561746564223b733a31393a22323032302d30352d30342030393a34373a3233223b7d);

-- --------------------------------------------------------

--
-- Table structure for table `general_subscribers`
--

CREATE TABLE `general_subscribers` (
  `id` int(11) NOT NULL,
  `ids` text DEFAULT NULL,
  `first_name` text DEFAULT NULL,
  `last_name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `ip` text DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `general_transaction_logs`
--

CREATE TABLE `general_transaction_logs` (
  `id` int(11) NOT NULL,
  `ids` text DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `type` text DEFAULT NULL,
  `transaction_id` text DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `general_users`
--

CREATE TABLE `general_users` (
  `id` int(11) NOT NULL,
  `ids` text DEFAULT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `login_type` text DEFAULT NULL,
  `first_name` text DEFAULT NULL,
  `last_name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `timezone` text DEFAULT NULL,
  `more_information` text DEFAULT NULL,
  `settings` longtext DEFAULT NULL,
  `desc` longtext DEFAULT NULL,
  `balance` decimal(15,4) DEFAULT 0.0000,
  `custom_rate` int(11) NOT NULL DEFAULT 0,
  `api_key` varchar(191) DEFAULT NULL,
  `spent` varchar(225) DEFAULT NULL,
  `activation_key` text DEFAULT NULL,
  `reset_key` text DEFAULT NULL,
  `history_ip` text DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `general_users`
--

INSERT INTO `general_users` (`id`, `ids`, `role`, `login_type`, `first_name`, `last_name`, `email`, `password`, `timezone`, `more_information`, `settings`, `desc`, `balance`, `custom_rate`, `api_key`, `spent`, `activation_key`, `reset_key`, `history_ip`, `status`, `changed`, `created`) VALUES
(1, '6915ac96a4b72cca19aa6cd47a5f99c8', 'admin', NULL, 'OSPDev', 'Team', 'admin@ospdev.in', '$2a$08$kogbxTIrRu65KxrPzNt11.IcC30dRZlwnRG/q0L8g0Bx2MsvYo7mG', 'Asia/Kolkata', '{\"skype_id\":\"+91 8355965199\"}', NULL, NULL, 0.0000, 0, 'jWE26BZLnlzjwgVU0fqFgHs5dAQ2qgwF', NULL, 'ffc50cbb906b329b91987c0f0cb7baff', '4267607a04fc7d53444297bdd2653621', '103.195.74.164', 1, '2020-08-24 16:46:56', '2020-08-24 16:46:56');

-- --------------------------------------------------------

--
-- Table structure for table `general_user_block_ip`
--

CREATE TABLE `general_user_block_ip` (
  `id` int(11) NOT NULL,
  `ids` varchar(100) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `general_user_logs`
--

CREATE TABLE `general_user_logs` (
  `id` int(11) NOT NULL,
  `ids` varchar(100) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  `country` text DEFAULT NULL,
  `type` int(1) DEFAULT 1 COMMENT '1 - login, 0 - logout',
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `general_user_logs`
--

INSERT INTO `general_user_logs` (`id`, `ids`, `uid`, `ip`, `country`, `type`, `created`) VALUES
(1, '7ea7220be1fa3210b44d2dd4af52355b', 1, '103.195.74.164', 'India', 1, '2021-09-25 18:48:59'),
(2, 'e2c21d7b5d5ea443c1544520de3d8481', 1, '103.195.74.164', 'India', 0, '2021-09-25 19:19:08'),
(3, '7890b915dcc968d5738cfab1f1b3a720', 1, '103.195.74.164', 'India', 1, '2021-09-25 19:23:21');

-- --------------------------------------------------------

--
-- Table structure for table `general_user_mail_logs`
--

CREATE TABLE `general_user_mail_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `ids` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `received_uid` int(11) DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `changed` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `ids` text CHARACTER SET utf8 DEFAULT NULL,
  `type` enum('direct','api') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'direct',
  `cate_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_order_id` int(11) DEFAULT NULL,
  `service_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'default',
  `api_provider_id` int(11) DEFAULT NULL,
  `api_service_id` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_order_id` int(11) DEFAULT 0,
  `uid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usernames` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hashtags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hashtag` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_posts` int(11) DEFAULT NULL,
  `sub_min` int(11) DEFAULT NULL,
  `sub_max` int(11) DEFAULT NULL,
  `sub_delay` int(11) DEFAULT NULL,
  `sub_expiry` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_response_orders` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_response_posts` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_status` enum('Active','Paused','Completed','Expired','Canceled') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge` decimal(15,4) DEFAULT NULL,
  `status` enum('completed','processing','inprogress','pending','partial','refunded','canceled') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `start_counter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `remains` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `is_drip_feed` int(1) DEFAULT 0,
  `runs` int(11) DEFAULT 0,
  `interval` int(2) DEFAULT 0,
  `dripfeed_quantity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `ids` text DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `price` decimal(15,4) DEFAULT NULL,
  `original_price` decimal(15,4) DEFAULT NULL,
  `min` int(50) DEFAULT NULL,
  `max` int(50) DEFAULT NULL,
  `add_type` enum('manual','api') DEFAULT 'manual',
  `type` varchar(100) DEFAULT 'default',
  `api_service_id` varchar(200) DEFAULT NULL,
  `api_provider_id` int(11) DEFAULT NULL,
  `dripfeed` int(1) DEFAULT 0,
  `status` int(1) DEFAULT 1,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `ids`, `uid`, `cate_id`, `name`, `desc`, `price`, `original_price`, `min`, `max`, `add_type`, `type`, `api_service_id`, `api_provider_id`, `dripfeed`, `status`, `changed`, `created`) VALUES
(1, '6cb5a494c286069238bf4504fa46f4d1', 1, 1, 'Insta Likes Instant & Cheapest In The Market ⛔⚡️⚡️🔥', '⚡Quality: Low Quality\r\n⌛ Start: 0-1h\r\n⚡Speed: Very Fast\r\n♻Refill: No Refill\r\n⬇Minimum: 10\r\n⬆Maximum: 15,000\r\n\r\n⚠Note:\r\n-High drop are possible.\r\n-If the link changed your order will be \r\nautomatically marked as completed and we will not guarantee any refund.', 6.0000, 6.0000, 10, 15000, 'api', 'default', '1', 2, 0, 1, '2021-09-25 19:08:59', '2021-09-25 19:00:21'),
(2, 'b256cc12f57727cbe240b11c6205f036', 1, 1, 'Instagram Likes - Instant & Fast ⛔⚡️🔥', '⚡Quality: Mix\r\n⌛ Start: 0-3 hours\r\n⚡Speed: +6K/Day\r\n♻Refill: No refill / No refund\r\n⬇Minimum: 10\r\n⬆Maximum: 20000', 4.0000, 4.0000, 10, 15000, 'api', 'default', '2', 2, 0, 1, '2021-09-25 19:08:06', '2021-09-25 19:00:21'),
(3, '8943ade492d6e28e3a1526f972b6afd3', 1, 1, 'Instagram Likes - Exclusive & Cheapest | SuperFast ⚡️⚡️⚡️', '⚡Quality: MIX\r\n⌛ Start: 0-1h\r\n⚡Speed: Up To 5K/ Day\r\n♻Refill: No Refill\r\n⬇Minimum: 50\r\n⬆Maximum: 15,000', 7.0000, 7.0000, 50, 15000, 'api', 'default', '3', 2, 0, 1, '2021-09-25 19:09:35', '2021-09-25 19:00:21'),
(4, 'a440ebe809a7585c145967aa9a833fb0', 1, 1, 'Emergency Instagram Views | Impressions ⭐⭐⭐', '⚡Quality: High Quality\r\n⌛ Start: Instant\r\n⚡Speed: Very Fast speed\r\n⬇Minimum: 300\r\n⬆Maximum: 10000000', 1.0000, 1.0000, 300, 10000000, 'api', 'default', '5', 2, 0, 1, '2021-09-25 19:05:41', '2021-09-25 19:00:21'),
(5, 'ea853f0f5f3702d445e91ec4dfe35339', 1, 1, 'Instagram Views - Cheapest ⚡⚡⚡', '⚡Quality: High Quality\r\n⌛ Start: Instant\r\n⚡Speed: Very Fast speed\r\n⬇Minimum: 100\r\n⬆Maximum: 10,000,000', 1.0000, 1.0000, 100, 10000000, 'api', 'default', '6', 2, 0, 1, '2021-09-25 19:06:05', '2021-09-25 19:00:21'),
(6, '97a317f2ee998d1d44d9585dacdc392d', 1, 1, 'Instagram Views - New & Fast ⭐', '⚡Quality: Real\r\n⌛ Start: Instant\r\n⚡Speed: Fast speed\r\n⬇Minimum: 100\r\n⬆Maximum: 10,000,000', 1.0000, 1.0000, 100, 50000000, 'api', 'default', '7', 2, 0, 1, '2021-09-25 19:06:43', '2021-09-25 19:00:21');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `ids` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('new','pending','closed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `created` datetime DEFAULT NULL,
  `changed` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_messages`
--

CREATE TABLE `ticket_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `ids` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `ticket_id` int(11) DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `changed` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_providers`
--
ALTER TABLE `api_providers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_user_id_foreign` (`uid`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_custom_page`
--
ALTER TABLE `general_custom_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_file_manager`
--
ALTER TABLE `general_file_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_lang`
--
ALTER TABLE `general_lang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_lang_list`
--
ALTER TABLE `general_lang_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_news`
--
ALTER TABLE `general_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_user_id_foreign` (`uid`);

--
-- Indexes for table `general_options`
--
ALTER TABLE `general_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_purchase`
--
ALTER TABLE `general_purchase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_sessions`
--
ALTER TABLE `general_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `general_subscribers`
--
ALTER TABLE `general_subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_transaction_logs`
--
ALTER TABLE `general_transaction_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_users`
--
ALTER TABLE `general_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_user_block_ip`
--
ALTER TABLE `general_user_block_ip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_user_logs`
--
ALTER TABLE `general_user_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_user_mail_logs`
--
ALTER TABLE `general_user_mail_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_user_id_foreign` (`uid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_user_id_foreign` (`uid`);

--
-- Indexes for table `ticket_messages`
--
ALTER TABLE `ticket_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_messages_user_id_foreign` (`uid`),
  ADD KEY `ticket_messages_ticket_id_foreign` (`ticket_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_providers`
--
ALTER TABLE `api_providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `general_custom_page`
--
ALTER TABLE `general_custom_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `general_file_manager`
--
ALTER TABLE `general_file_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=325;

--
-- AUTO_INCREMENT for table `general_lang`
--
ALTER TABLE `general_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=640;

--
-- AUTO_INCREMENT for table `general_lang_list`
--
ALTER TABLE `general_lang_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `general_news`
--
ALTER TABLE `general_news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `general_options`
--
ALTER TABLE `general_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `general_purchase`
--
ALTER TABLE `general_purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `general_subscribers`
--
ALTER TABLE `general_subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_transaction_logs`
--
ALTER TABLE `general_transaction_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_users`
--
ALTER TABLE `general_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `general_user_block_ip`
--
ALTER TABLE `general_user_block_ip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_user_logs`
--
ALTER TABLE `general_user_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `general_user_mail_logs`
--
ALTER TABLE `general_user_mail_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `ticket_messages`
--
ALTER TABLE `ticket_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
