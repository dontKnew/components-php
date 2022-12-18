-- ---------------------------------------------------------
--
-- Rainbow PHP Framework - Database Backup Tool
-- 
--
-- Host Connection Info: localhost via TCP/IP
-- Generation Time: November 28, 2017 at 17:11 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.1
--
-- ---------------------------------------------------------


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `atozv2` --
--

-- Table `admin` --
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` text,
  `pass` text,
  `admin_name` text,
  `admin_logo` text,
  `admin_reg_date` text,
  `admin_reg_ip` text,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- Table `admin_history` --
CREATE TABLE `admin_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `last_date` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `browser` text,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Table `ads` --
CREATE TABLE `ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text_ads` text,
  `ad720x90` text,
  `ad250x300` text,
  `ad250x125` text,
  `ad480x60` text,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `ads` (`id`, `text_ads`, `ad720x90`, `ad250x300`, `ad250x125`, `ad480x60`) VALUES
(1, '&lt;br /&gt;Try Pro IP locator Script Today! &lt;a title=&quot;Get Pro IP locator Script&quot; href=&quot;http://prothemes.biz/index.php?route=product/product&amp;path=65&amp;product_id=59&quot;&gt;CLICK HERE&lt;/a&gt; &lt;br /&gt;&lt;br /&gt;\r\n\r\nGet 20,000 Unique Traffic for $5 [Limited Time Offer] - &lt;a title=&quot;Get 20,000 Unique Traffic&quot; href=&quot;http://prothemes.biz&quot;&gt;Buy Now! CLICK HERE&lt;/a&gt;&lt;br /&gt;&lt;br /&gt;\r\n\r\nA to Z SEO Tools - Get Now for $35 ! &lt;a title=&quot;50 SEO Tools Bundle&quot; href=&quot;https://codecanyon.net/item/atoz-seo-tools-search-engine-optimization-tools/12170678?ref=Rainbowbalaji&quot;&gt;CLICK HERE&lt;/a&gt;&lt;br /&gt;', '&lt;img class=&quot;imageres&quot; src=&quot;https://prothemes.biz/image/dummy-xd/720x90.png&quot; /&gt;', '&lt;img class=&quot;imageres&quot; src=&quot;https://prothemes.biz/image/dummy-xd/250x300.png&quot; /&gt;', '&lt;img class=&quot;imageres&quot; src=&quot;https://prothemes.biz/image/dummy-xd/250x125.png&quot; /&gt;', '&lt;img class=&quot;imageres&quot; src=&quot;https://prothemes.biz/image/dummy-xd/468x70.png&quot; /&gt;');

-- Table `banned_ip` --
CREATE TABLE `banned_ip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) DEFAULT NULL,
  `added_at` varchar(255) DEFAULT NULL,
  `reason` text,
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;

-- Table `capthca` --
CREATE TABLE `capthca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cap_options` text,
  `cap_data` text,
  `cap_type` text,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `capthca` (`id`, `cap_options`, `cap_data`, `cap_type`) VALUES
(1, '{\"register_page\":true,\"login_page\":true,\"contact_page\":true,\"allseo_page\":false,\"reset_pass_page\":true,\"resend_act_page\":true,\"admin_login_page\":false}', '{\"recap\":{\"cap_name\":\"Google reCAPTCHA\",\"recap_seckey\":\"\",\"recap_sitekey\":\"\"},\"phpcap\":{\"cap_name\":\"Built-in PHP Image Verification\",\"mode\":\"Normal\",\"allowed\":\"ABCDEFGHJKLMNPRSTUVWXYZabcdefghjkmnprstuvwxyz234567891\",\"color\":\"#ffffff\",\"mul\":\"yes\"}}', 'phpcap');

-- Table `interface` --
CREATE TABLE `interface` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `theme` text,
  `lang` text,
  `available_languages` text NOT NULL,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `interface` (`id`, `theme`, `lang`, `available_languages`) VALUES
(1, 'default', 'en', 'a:1:{i:0;a:7:{i:0;s:1:\"1\";i:1;b:1;i:2;s:2:\"en\";i:3;s:7:\"English\";i:4;s:6:\"Balaji\";i:5;b:1;i:6;s:3:\"ltr\";}}');

-- Table `lang` --
CREATE TABLE `lang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` text NOT NULL,
  `default_text` text NOT NULL,
  `lang_en` text NOT NULL,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=531 DEFAULT CHARSET=utf8;

INSERT INTO `lang` (`id`, `code`, `default_text`, `lang_en`) VALUES
(1, 'RF1', 'Home', 'Home'),
(2, 'RF2', 'Contact US', 'Contact US'),
(3, 'RF3', 'Image Verification', 'Image Verification'),
(4, 'RF4', 'Your image verification code is wrong!', 'Your image verification code is wrong!'),
(5, 'RF5', 'Submit', 'Submit'),
(6, 'RF6', 'True', 'True'),
(7, 'RF7', 'Try New Site', 'Try New Site'),
(8, 'RF8', 'Captcha', 'Captcha'),
(9, 'RF9', 'We value all the feedbacks received from our customers.', 'We value all the feedbacks received from our customers.'),
(10, 'RF10', 'If you have any queries, comments, suggestions or have anything to talk about.', 'If you have any queries, comments, suggestions or have anything to talk about.'),
(11, 'RF11', 'Please enter your fullname *', 'Please enter your fullname *'),
(12, 'RF12', 'Fullname is required', 'Fullname is required'),
(13, 'RF13', 'Please enter your email *', 'Please enter your email *'),
(14, 'RF14', 'Valid email is required', 'Valid email is required'),
(15, 'RF15', 'Subject is required', 'Subject is required'),
(16, 'RF16', 'Please enter your subject *', 'Please enter your subject *'),
(17, 'RF17', 'Please enter your message *', 'Please enter your message *'),
(18, 'RF18', 'Please leave some message', 'Please leave some message'),
(19, 'RF19', 'Send message', 'Send message'),
(20, 'RF20', 'Alert!', 'Alert!'),
(21, 'RF21', 'Name *', 'Name *'),
(22, 'RF22', 'Email *', 'Email *'),
(23, 'RF23', 'Subject *', 'Subject *'),
(24, 'RF24', 'Message *', 'Message *'),
(25, 'RF25', 'Some fields are missing or empty', 'Some fields are missing or empty'),
(26, 'RF26', 'Guest Visitor', 'Guest Visitor'),
(27, 'RF27', 'Your message has been sent successfully', 'Your message has been sent successfully'),
(28, 'RF28', 'Failed to send your message', 'Failed to send your message'),
(29, 'RF29', 'Please verify your image verification', 'Please verify your image verification'),
(30, 'RF30', 'User Message', 'User Message'),
(31, 'RF31', 'Additional Information', 'Additional Information'),
(32, 'RF32', 'Username', 'Username'),
(33, 'RF33', 'User IP', 'User IP'),
(34, 'RF34', 'Time & Date', 'Time & Date'),
(35, 'RF35', 'Login/Register', 'Login/Register'),
(36, 'RF36', 'You are already logged in', 'You are already logged in'),
(37, 'RF37', 'Activation link successfully sent to your mail id', 'Activation link successfully sent to your mail id'),
(38, 'RF38', 'Email ID already verified!', 'Email ID already verified!'),
(39, 'RF39', 'Email ID not found!', 'Email ID not found!'),
(40, 'RF40', 'Database Error! Contact Support!', 'Database Error! Contact Support!'),
(41, 'RF41', 'New password sent to your mail', 'New password sent to your mail'),
(42, 'RF42', 'You are already logged in', 'You are already logged in'),
(43, 'RF43', 'Login Successful..', 'Login Successful..'),
(44, 'RF44', 'Oh, no your account was banned! Contact Support..', 'Oh, no your account was banned! Contact Support..'),
(45, 'RF45', 'Oh, no account not verified', 'Oh, no account not verified'),
(46, 'RF46', 'Oh, no password is wrong', 'Oh, no password is wrong'),
(47, 'RF47', 'All fields must be filled out!', 'All fields must be filled out!'),
(48, 'RF48', 'Username not found', 'Username not found'),
(49, 'RF49', 'Username already taken', 'Username already taken'),
(50, 'RF50', 'Email ID already registered', 'Email ID already registered'),
(51, 'RF51', 'It looks like your IP has already been used to register an account today!', 'It looks like your IP has already been used to register an account today!'),
(52, 'RF52', 'Username not valid! Username can\'t contain special characters..', 'Username not valid! Username can\'t contain special characters..'),
(53, 'RF53', 'Email ID not valid!', 'Email ID not valid!'),
(54, 'RF54', 'Your account was successfully registered.', 'Your account was successfully registered.'),
(55, 'RF55', 'Redirecting to you index page...', 'Redirecting to you index page...'),
(56, 'RF56', 'An activation email has been sent to your email address, Please also check your Junk/Spam Folders', 'An activation email has been sent to your email address, Please also check your Junk/Spam Folders'),
(57, 'RF57', 'Sign In', 'Sign In'),
(58, 'RF58', 'Sign in using social network', 'Sign in using social network'),
(59, 'RF59', 'Sign in using Facebook', 'Sign in using Facebook'),
(60, 'RF60', 'Sign in using Google', 'Sign in using Google'),
(61, 'RF61', 'Sign in using Twitter', 'Sign in using Twitter'),
(62, 'RF62', 'Facebook', 'Facebook'),
(63, 'RF63', 'Google', 'Google'),
(64, 'RF64', 'Twitter', 'Twitter'),
(65, 'RF65', 'Sign in with your username', 'Sign in with your username'),
(66, 'RF66', 'Username', 'Username'),
(67, 'RF67', 'Password', 'Password'),
(68, 'RF68', 'Forgot Password', 'Forgot Password'),
(69, 'RF69', 'Resend Activation Email', 'Resend Activation Email'),
(70, 'RF70', 'Sign Up', 'Sign Up'),
(71, 'RF71', 'Sign up with your email address', 'Sign up with your email address'),
(72, 'RF72', 'Full Name', 'Full Name'),
(73, 'RF73', 'Email', 'Email'),
(74, 'RF74', 'Enter your email address', 'Enter your email address'),
(75, 'RF75', 'Options:', 'Options:'),
(76, 'RF76', 'Login to your Account', 'Login to your Account'),
(77, 'RF77', 'Register an account', 'Register an account'),
(78, 'RF78', 'Forgot Password', 'Forgot Password'),
(79, 'RF79', 'Resend activation email', 'Resend activation email'),
(80, 'RF80', 'Site is down for maintenance', 'Site is down for maintenance'),
(81, 'RF81', 'We are currently down for maintenance', 'We are currently down for maintenance'),
(82, 'RF82', 'Oops...', 'Oops...'),
(83, 'RF83', 'My Profile', 'My Profile'),
(84, 'RF84', 'Facebook Oauth', 'Facebook Oauth'),
(85, 'RF85', 'Google Oauth', 'Google Oauth'),
(86, 'RF86', 'Twitter Oauth', 'Twitter Oauth'),
(87, 'RF87', 'There was an error on Oauth service!', 'There was an error on Oauth service!'),
(88, 'RF88', 'There was a problem performing this request', 'There was a problem performing this request'),
(89, 'RF89', 'Log In', 'Log In'),
(90, 'RF90', 'Account already verified...', 'Account already verified...'),
(91, 'RF91', 'Something Went Wrong! Contact Support!', 'Something Went Wrong! Contact Support!'),
(92, 'RF92', 'Verification code is wrong..', 'Verification code is wrong..'),
(93, 'RF93', 'Account verified successfully. You can login now..', 'Account verified successfully. You can login now..'),
(94, 'RF94', 'New Password updated successfully!', 'New Password updated successfully!'),
(95, 'RF95', 'Current password is wrong!', 'Current password is wrong!'),
(96, 'RF96', 'New password & Retype password field can\'t matched!', 'New password & Retype password field can\'t matched!'),
(97, 'RF97', 'Sorry, your file is too large.', 'Sorry, your file is too large.'),
(98, 'RF98', 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.', 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.'),
(99, 'RF99', 'Sorry, there was an error uploading your file.', 'Sorry, there was an error uploading your file.'),
(100, 'RF100', 'File is not an image.', 'File is not an image.');

INSERT INTO `lang` (`id`, `code`, `default_text`, `lang_en`) VALUES
(101, 'RF101', 'Profile details was successfully updated!', 'Profile details was successfully updated!'),
(102, 'RF102', 'Unknown', 'Unknown'),
(103, 'RF103', 'Dashboard', 'Dashboard'),
(104, 'RF104', 'Logout', 'Logout'),
(105, 'RF105', 'Restricted words found on your domain name', 'Restricted words found on your domain name'),
(106, 'RF106', 'Continue', 'Continue'),
(107, 'RF107', 'About Us', 'About Us'),
(108, 'RF108', 'Contact Info', 'Contact Info'),
(109, 'RF109', 'Navigation', 'Navigation'),
(110, 'RF110', 'Profile', 'Profile'),
(111, 'RF111', 'Update Information', 'Update Information'),
(112, 'RF112', 'Change Password', 'Change Password'),
(113, 'RF113', 'User Logo', 'User Logo'),
(114, 'RF114', 'Email ID', 'Email ID'),
(115, 'RF115', 'Registered At', 'Registered At'),
(116, 'RF116', 'User Country', 'User Country'),
(117, 'RF117', 'Membership', 'Membership'),
(118, 'RF118', 'Free', 'Free'),
(119, 'RF119', 'Personal Information:', 'Personal Information:'),
(120, 'RF120', 'First Name', 'First Name'),
(121, 'RF121', 'Last Name', 'Last Name'),
(122, 'RF122', 'Company', 'Company'),
(123, 'RF123', 'Address Line 1', 'Address Line 1'),
(124, 'RF124', 'Address Line 2', 'Address Line 2'),
(125, 'RF125', 'City', 'City'),
(126, 'RF126', 'State', 'State'),
(127, 'RF127', 'Country', 'Country'),
(128, 'RF128', 'Post Code', 'Post Code'),
(129, 'RF129', 'Telephone', 'Telephone'),
(130, 'RF130', 'General Information:', 'General Information:'),
(131, 'RF131', 'Avatar:', 'Avatar:'),
(132, 'RF132', 'Upload a new avatar: (JPEG 180x180px)', 'Upload a new avatar: (JPEG 180x180px)'),
(133, 'RF133', 'Region / State', 'Region / State'),
(134, 'RF134', 'Current Password', 'Current Password'),
(135, 'RF135', 'New Password', 'New Password'),
(136, 'RF136', 'Retype Password', 'Retype Password'),
(137, 'RF137', 'Change Password', 'Change Password'),
(138, 'RF138', 'Retype your new password', 'Retype your new password'),
(139, 'RF139', 'Enter your new password', 'Enter your new password'),
(140, 'RF140', 'Enter your current password', 'Enter your current password'),
(141, 'RF141', 'Enter your postal code', 'Enter your postal code'),
(142, 'RF142', 'Enter your city', 'Enter your city'),
(143, 'RF143', 'Address line 2 (optional)', 'Address line 2 (optional)'),
(144, 'RF144', 'Enter your home address', 'Enter your home address'),
(145, 'RF145', 'Enter your phone no.', 'Enter your phone no.'),
(146, 'RF146', 'Enter your company name (optional)', 'Enter your company name (optional)'),
(147, 'RF147', 'Enter your last name', 'Enter your last name'),
(148, 'RF148', 'Enter your first name', 'Enter your first name'),
(149, 'RF149', 'Enter your full name', 'Enter your full name'),
(150, 'RF150', 'Enter your user name', 'Enter your user name'),
(151, 'RF151', 'Enter your email id', 'Enter your email id'),
(152, 'RF152', 'Domain is banned for following reason:', 'Domain is banned for following reason:'),
(153, '1', 'Home', 'Home'),
(154, '2', 'Blog', 'Blog'),
(155, '3', 'Contact US', 'Contact US'),
(156, '4', 'Malformed Request!', 'Malformed Request!'),
(157, '5', 'Your image verification code is wrong!', 'Your image verification code is wrong!'),
(158, '6', 'Paste (Ctrl + V) your article below then click Submit to watch this article rewriter do it\'s thing! ', 'Paste (Ctrl + V) your article below then click Submit to watch this article rewriter do it\'s thing! '),
(159, '7', 'Image Verification', 'Image Verification'),
(160, '8', 'Submit', 'Submit'),
(161, '9', 'Try New Document', 'Try New Document'),
(162, '10', 'Output', 'Output'),
(163, '11', 'About', 'About'),
(164, '12', 'Try Again', 'Try Again'),
(165, '13', 'Given Text', 'Given Text'),
(166, '14', 'MD5 Hash', 'MD5 Hash'),
(167, '15', 'Your IP', 'Your IP'),
(168, '16', 'City', 'City'),
(169, '17', 'Region', 'Region'),
(170, '18', 'Country', 'Country'),
(171, '19', 'ISP', 'ISP'),
(172, '20', 'Latitude', 'Latitude'),
(173, '21', 'Longitude', 'Longitude'),
(174, '22', 'Country Code', 'Country Code'),
(175, '23', 'Enter a URL', 'Enter a URL'),
(176, '24', 'Page URL', 'Page URL'),
(177, '25', 'Page Size(Bytes)', 'Page Size(Bytes)'),
(178, '26', 'Page Size(KB)', 'Page Size(KB)'),
(179, '27', 'Try New URL', 'Try New URL'),
(180, '28', 'Enter your domain name', 'Enter your domain name'),
(181, '29', 'Page URL', 'Page URL'),
(182, '30', 'Meta Title', 'Meta Title'),
(183, '31', 'Meta Description', 'Meta Description'),
(184, '32', 'Meta Keywords', 'Meta Keywords'),
(185, '33', 'Select Screen Resolution', 'Select Screen Resolution'),
(186, '34', 'Pixels', 'Pixels'),
(187, '35', 'Check', 'Check'),
(188, '36', 'URL entered does not seem to be a dynamic URL', 'URL entered does not seem to be a dynamic URL'),
(189, '37', 'Type 1 - Single Page URL', 'Type 1 - Single Page URL'),
(190, '38', 'Generated URL', 'Generated URL'),
(191, '39', 'Example URL', 'Example URL'),
(192, '40', 'Create a .htaccess file with the code below', 'Create a .htaccess file with the code below'),
(193, '41', 'The .htaccess file needs to be placed in', 'The .htaccess file needs to be placed in'),
(194, '42', 'Type 2 - Directory Type URL', 'Type 2 - Directory Type URL'),
(195, '43', 'Enter the text that you wish to encode or decode', 'Enter the text that you wish to encode or decode'),
(196, '44', 'Encoded URL', 'Encoded URL'),
(197, '45', 'Decoded URL', 'Decoded URL'),
(198, '46', 'Links', 'Links'),
(199, '47', 'Count', 'Count'),
(200, '48', 'Total Links', 'Total Links');

INSERT INTO `lang` (`id`, `code`, `default_text`, `lang_en`) VALUES
(201, '49', 'Internal Links', 'Internal Links'),
(202, '50', 'External Links', 'External Links'),
(203, '51', 'NoFollow Links', 'NoFollow Links'),
(204, '52', 'Links inside the current website', 'Links inside the current website'),
(205, '53', 'Link\'s URL', 'Link\'s URL'),
(206, '54', 'NoFollow/DoFollow', 'NoFollow/DoFollow'),
(207, '55', 'Links going to outside websites', 'Links going to outside websites'),
(208, '56', 'Paste (Ctrl + V) your article below then click Check for Plagiarism! ', 'Paste (Ctrl + V) your article below then click Check for Plagiarism! '),
(209, '57', 'Check for Plagiarism', 'Check for Plagiarism'),
(210, '58', 'Total Words', 'Total Words'),
(211, '59', 'Maximum', 'Maximum'),
(212, '60', 'words limit per search', 'words limit per search'),
(213, '61', 'Copy and paste your article here and click \"Check for Plagiarism\"', 'Copy and paste your article here and click \"Check for Plagiarism\"'),
(214, '62', 'Enter up to 100 URLs (Each URL must be on separate line)', 'Enter up to 100 URLs (Each URL must be on separate line)'),
(215, '63', 'Try New Sites', 'Try New Sites'),
(216, '64', 'Result', 'Result'),
(217, '65', 'Status of each sites', 'Status of each sites'),
(218, '66', 'URLs', 'URLs'),
(219, '67', 'HTTP Code', 'HTTP Code'),
(220, '68', 'Response Time', 'Response Time'),
(221, '69', 'Status', 'Status'),
(222, '70', 'Enter your text/paragraph here', 'Enter your text/paragraph here'),
(223, '71', 'Count Words', 'Count Words'),
(224, '72', 'Total Words', 'Total Words'),
(225, '73', 'Total Characters', 'Total Characters'),
(226, '74', 'How popular is', 'How popular is'),
(227, '75', 'Stats', 'Stats'),
(228, '76', 'Global Rank', 'Global Rank'),
(229, '77', 'Popularity at', 'Popularity at'),
(230, '78', 'Regional Rank', 'Regional Rank'),
(231, '79', 'Backlinks', 'Backlinks'),
(232, '80', 'Traffic Rank', 'Traffic Rank'),
(233, '81', 'Search Engine Traffic', 'Search Engine Traffic'),
(234, '82', 'Price of each sites', 'Price of each sites'),
(235, '83', 'URLs', 'URLs'),
(236, '84', 'Approximate Price', 'Approximate Price'),
(237, '85', 'WHOIS DATA', 'WHOIS DATA'),
(238, '86', 'Get WHOIS Data', 'Get WHOIS Data'),
(239, '87', 'Get Domain Age', 'Get Domain Age'),
(240, '88', 'Value', 'Value'),
(241, '89', 'Domain', 'Domain'),
(242, '90', 'Domain Created Date', 'Domain Created Date'),
(243, '91', 'Domain Updated Date', 'Domain Updated Date'),
(244, '92', 'Domain Expiry Date', 'Domain Expiry Date'),
(245, '93', 'Try New Domain', 'Try New Domain'),
(246, '94', 'Get Page Ranks', 'Get Page Ranks'),
(247, '95', 'Page Rank of each sites', 'Page Rank of each sites'),
(248, '96', 'PageRank', 'PageRank'),
(249, '97', 'Something Went Wrong!', 'Something Went Wrong!'),
(250, '98', 'URL', 'URL'),
(251, '99', 'Time Taken', 'Time Taken'),
(252, '100', 'CSS Links', 'CSS Links'),
(253, '101', 'Script Links', 'Script Links'),
(254, '102', 'Image Links', 'Image Links'),
(255, '103', 'Other Resource Links', 'Other Resource Links'),
(256, '104', 'Link Type', 'Link Type'),
(257, '105', 'Load Time', 'Load Time'),
(258, '106', 'Domain Geo Information', 'Domain Geo Information'),
(259, '107', 'Domain IP', 'Domain IP'),
(260, '108', 'IP', 'IP'),
(261, '109', 'Get Source Code', 'Get Source Code'),
(262, '110', 'Source Code', 'Source Code'),
(263, '111', 'Listed', 'Listed'),
(264, '112', 'Not Listed', 'Not Listed'),
(265, '113', 'Generate MetaTags', 'Generate MetaTags'),
(266, '114', 'Site Title', 'Site Title'),
(267, '115', 'Site Description', 'Site Description'),
(268, '116', 'Site Keywords (Separate with commas)', 'Site Keywords (Separate with commas)'),
(269, '117', 'Allow robots to index your website?', 'Allow robots to index your website?'),
(270, '118', 'Yes', 'Yes'),
(271, '119', 'No', 'No'),
(272, '120', 'What type of content will your site display?', 'What type of content will your site display?'),
(273, '121', 'Allow robots to follow all links?', 'Allow robots to follow all links?'),
(274, '122', 'Title must be within 70 Characters', 'Title must be within 70 Characters'),
(275, '123', 'Description must be within 320 Characters', 'Description must be within 320 Characters'),
(276, '124', 'keywords1, keywords2, keywords3', 'keywords1, keywords2, keywords3'),
(277, '125', 'What is your site primary language?', 'What is your site primary language?'),
(278, '126', '(Optional Meta Tags)', '(Optional Meta Tags)'),
(279, '127', 'Search engines should revisit this page after', 'Search engines should revisit this page after'),
(280, '128', 'days', 'days'),
(281, '129', 'Author', 'Author'),
(282, '130', 'Copy and paste into your site.', 'Copy and paste into your site.'),
(283, '131', 'Generate sitemap', 'Generate sitemap'),
(284, '132', 'Modified date', 'Modified date'),
(285, '133', 'Change frequency', 'Change frequency'),
(286, '134', 'Default priority', 'Default priority'),
(287, '135', 'Do not include', 'Do not include'),
(288, '136', 'Server response date', 'Server response date'),
(289, '137', 'Todays date', 'Todays date'),
(290, '138', 'Custom date', 'Custom date'),
(291, '139', 'Enter a domain name', 'Enter a domain name'),
(292, '140', 'How many pages do I need to crawl?', 'How many pages do I need to crawl?'),
(293, '141', 'Crawling', 'Crawling'),
(294, '142', 'Links Found', 'Links Found'),
(295, '143', 'Success', 'Success'),
(296, '144', 'Error', 'Error'),
(297, '145', 'Error, Try again later!', 'Error, Try again later!'),
(298, '146', 'Processing', 'Processing'),
(299, '147', 'Pages contain backlink', 'Pages contain backlink'),
(300, '148', 'Pagerank', 'Pagerank');

INSERT INTO `lang` (`id`, `code`, `default_text`, `lang_en`) VALUES
(301, '149', 'Status', 'Status'),
(302, '150', 'Default -  All Robots are', 'Default -  All Robots are'),
(303, '151', 'Allowed', 'Allowed'),
(304, '152', 'Refused', 'Refused'),
(305, '153', 'Crawl-Delay', 'Crawl-Delay'),
(306, '154', 'Default - No Delay', 'Default - No Delay'),
(307, '155', 'Sitemap', 'Sitemap'),
(308, '156', '(leave blank if you don\'t have)', '(leave blank if you don\'t have)'),
(309, '157', 'Search Robots', 'Search Robots'),
(310, '158', 'Same as Default', 'Same as Default'),
(311, '159', 'Restricted Directories', 'Restricted Directories'),
(312, '160', 'The path is relative to root and must contain a trailing slash', 'The path is relative to root and must contain a trailing slash'),
(313, '161', 'Create Robots.txt', 'Create Robots.txt'),
(314, '162', 'Now, Create \'robots.txt\' file at your root directory. Copy above text and paste into the text file.', 'Now, Create \'robots.txt\' file at your root directory. Copy above text and paste into the text file.'),
(315, '163', 'Create robots.txt file ?', 'Create robots.txt file ?'),
(316, '164', 'robots.txt generated by atozseotools.com', 'robots.txt generated by atozseotools.com'),
(317, '165', 'Enter your domain name', 'Enter your domain name'),
(318, '166', 'Find Keyword Position', 'Find Keyword Position'),
(319, '167', 'Not Found within', 'Not Found within'),
(320, '168', 'Empty Request', 'Empty Request'),
(321, '169', 'position', 'position'),
(322, '170', 'Keyword field cannot be empty!', 'Keyword field cannot be empty!'),
(323, '171', 'Keywords', 'Keywords'),
(324, '172', 'Check Positions upto', 'Check Positions upto'),
(325, '173', 'Enter keywords in separate line', 'Enter keywords in separate line'),
(326, '174', 'Example', 'Example'),
(327, '175', 'Your Browser', 'Your Browser'),
(328, '176', 'Browser Version', 'Browser Version'),
(329, '177', 'Your OS', 'Your OS'),
(330, '178', 'User Agent', 'User Agent'),
(331, '179', 'Good', 'Good'),
(332, '180', 'Bad - Not Redirecting!', 'Bad - Not Redirecting!'),
(333, '181', 'Domain', 'Domain'),
(334, '182', 'WWW Redirect Status', 'WWW Redirect Status'),
(335, '183', 'Requested URL looks down!', 'Requested URL looks down!'),
(336, '184', 'Code to Text Ratio is', 'Code to Text Ratio is'),
(337, '185', 'Text content size', 'Text content size'),
(338, '186', 'Total HTML size', 'Total HTML size'),
(339, '187', 'Host', 'Host'),
(340, '188', 'Class C', 'Class C'),
(341, '189', 'Enter up to 40 Domains (Each Domain must be on separate line)', 'Enter up to 40 Domains (Each Domain must be on separate line)'),
(342, '190', 'No Email Found!', 'No Email Found!'),
(343, '191', 'Email Found!', 'Email Found!'),
(344, '192', 'Email', 'Email'),
(345, '193', 'Google Indexed', 'Google Indexed'),
(346, '194', 'Pages', 'Pages'),
(347, '195', 'Hosting Provider', 'Hosting Provider'),
(348, '196', 'Hosting Info', 'Hosting Info'),
(349, '197', 'Safe Site', 'Safe Site'),
(350, '198', 'Not a harmfull site, but take care', 'Not a harmfull site, but take care'),
(351, '199', 'Potentially harmful site', 'Potentially harmful site'),
(352, '200', 'Unknown', 'Unknown'),
(353, '201', 'Enter up to 20 URLs (Each URL must be on separate line)', 'Enter up to 20 URLs (Each URL must be on separate line)'),
(354, '202', 'Antivirus stats of each sites', 'Antivirus stats of each sites'),
(355, '203', 'Percentage', 'Percentage'),
(356, '204', 'Total Keywords', 'Total Keywords'),
(357, '205', 'Listed', 'Listed'),
(358, '206', 'Not Listed', 'Not Listed'),
(359, '207', 'Overall', 'Overall'),
(360, '208', 'SPAM Database Server', 'SPAM Database Server'),
(361, '209', 'Moz access id missing on database!', 'Moz access id missing on database!'),
(362, '210', 'Moz secret key missing on database!', 'Moz secret key missing on database!'),
(363, '211', 'MozRank', 'MozRank'),
(364, '212', 'Page Authority Score', 'Page Authority Score'),
(365, '213', 'Domain Authority Score', 'Domain Authority Score'),
(366, '214', 'Backlinks (As per Alexa)', 'Backlinks (As per Alexa)'),
(367, '215', 'Backlinks (As per Google)', 'Backlinks (As per Google)'),
(368, '216', 'Backlinks', 'Backlinks'),
(369, '217', 'Screenshot of', 'Screenshot of'),
(370, '218', 'No reverse domain name detected!', 'No reverse domain name detected!'),
(371, '219', 'Reverse Domain Names', 'Reverse Domain Names'),
(372, '220', 'Domain Name', 'Domain Name'),
(373, '221', 'Failed extended and basic XML-RPC ping!', 'Failed extended and basic XML-RPC ping!'),
(374, '222', 'Enter your blog url', 'Enter your blog url'),
(375, '223', 'Enter your blog name', 'Enter your blog name'),
(376, '224', 'Enter your blog updated url', 'Enter your blog updated url'),
(377, '225', 'Enter your blog RSS feed url', 'Enter your blog RSS feed url'),
(378, '226', 'Ping Server List', 'Ping Server List'),
(379, '227', 'Email ID looks not valid!', 'Email ID looks not valid!'),
(380, '228', 'All fields must be filled out', 'All fields must be filled out'),
(381, '229', 'Message Sent Successfully', 'Message Sent Successfully'),
(382, '230', 'Captcha code is wrong!', 'Captcha code is wrong!'),
(383, '231', 'Error - Try Again (Message Failed)', 'Error - Try Again (Message Failed)'),
(384, '232', 'Contact Us', 'Contact Us'),
(385, '233', 'We value all the feedbacks received from our customers.', 'We value all the feedbacks received from our customers.'),
(386, '234', 'If you have any queries, comments, suggestions or have anything to talk about.', 'If you have any queries, comments, suggestions or have anything to talk about.'),
(387, '235', 'Name', 'Name'),
(388, '236', 'Email ID', 'Email ID'),
(389, '237', 'Subject', 'Subject'),
(390, '238', 'Message', 'Message'),
(391, '239', 'Send Message', 'Send Message'),
(392, '240', 'Enter your full name', 'Enter your full name'),
(393, '241', 'Enter your email id', 'Enter your email id'),
(394, '242', 'Enter your subject', 'Enter your subject'),
(395, '243', 'Enter your message', 'Enter your message'),
(396, '244', 'Contact Form', 'Contact Form'),
(397, '245', 'Name (required)', 'Name (required)'),
(398, '246', 'E-mail (required)', 'E-mail (required)'),
(399, '247', 'Send', 'Send'),
(400, '248', 'Redirecting to you index page...', 'Redirecting to you index page...');

INSERT INTO `lang` (`id`, `code`, `default_text`, `lang_en`) VALUES
(401, '249', 'Login Success.. Redirecting to you index page...', 'Login Success.. Redirecting to you index page...'),
(402, '250', 'Almost signup process over. One step need to go..', 'Almost signup process over. One step need to go..'),
(403, '251', 'Auto generated name', 'Auto generated name'),
(404, '252', 'Set your Username', 'Set your Username'),
(405, '253', 'No thanks keep auto generated name', 'No thanks keep auto generated name'),
(406, '254', 'Username not vaild', 'Username not vaild'),
(407, '255', 'Username already taken', 'Username already taken'),
(408, '256', 'Unable to post on database! Contact Support!', 'Unable to post on database! Contact Support!'),
(409, '257', 'Username changed successfully', 'Username changed successfully'),
(410, '258', 'Username not vaild', 'Username not vaild'),
(411, '259', 'Oauth Login System', 'Oauth Login System'),
(412, '260', 'Oh, no your account was banned! Contact Support..', 'Oh, no your account was banned! Contact Support..'),
(413, '261', 'There was an error on Oauth service!', 'There was an error on Oauth service!'),
(414, '262', 'Domain Age', 'Domain Age'),
(415, '263', 'Sign In', 'Sign In'),
(416, '264', 'Sign Up', 'Sign Up'),
(417, '265', 'Oauth Login System', 'Oauth Login System'),
(418, '266', 'Logout', 'Logout'),
(419, '267', 'Sign in using social network', 'Sign in using social network'),
(420, '268', 'Sign in using Facebook', 'Sign in using Facebook'),
(421, '269', 'Sign in using Google', 'Sign in using Google'),
(422, '270', 'Sign in with your username', 'Sign in with your username'),
(423, '271', 'Username', 'Username'),
(424, '272', 'Password', 'Password'),
(425, '273', 'Forgot Password', 'Forgot Password'),
(426, '274', 'Resend activation email', 'Resend activation email'),
(427, '275', 'Email', 'Email'),
(428, '276', 'Full Name', 'Full Name'),
(429, '277', 'Sign up with your email address', 'Sign up with your email address'),
(430, '278', 'Account Confirmation', 'Account Confirmation'),
(431, '279', 'Activation code successfully sent to your mail id', 'Activation code successfully sent to your mail id'),
(432, '280', 'Email ID already verified!', 'Email ID already verified!'),
(433, '281', 'Email ID not found!', 'Email ID not found!'),
(434, '282', 'Unable to post on database! Contact Support!', 'Unable to post on database! Contact Support!'),
(435, '283', 'Password changed successfully and Sent to your mail', 'Password changed successfully and Sent to your mail'),
(436, '284', 'Password Reset', 'Password Reset'),
(437, '285', 'You are already logged in', 'You are already logged in'),
(438, '286', 'Login Successful..', 'Login Successful..'),
(439, '287', 'Oh, no your account was banned! Contact Support..', 'Oh, no your account was banned! Contact Support..'),
(440, '288', 'Oh, no account not verified', 'Oh, no account not verified'),
(441, '289', 'Oh, no password is wrong', 'Oh, no password is wrong'),
(442, '290', 'Username not found', 'Username not found'),
(443, '291', 'All fields must be filled out!', 'All fields must be filled out!'),
(444, '292', 'Username already taken', 'Username already taken'),
(445, '293', 'Email ID already registered', 'Email ID already registered'),
(446, '294', 'Your account was successfully registered', 'Your account was successfully registered'),
(447, '295', 'Username not valid! Username can\'t contain special characters..', 'Username not valid! Username can\'t contain special characters..'),
(448, '296', 'Database Error', 'Database Error'),
(449, '297', 'Login/Register', 'Login/Register'),
(450, '298', 'An activation email has been sent to your email address, Please also check your Junk/Spam Folders', 'An activation email has been sent to your email address, Please also check your Junk/Spam Folders'),
(451, '299', 'Login to your Account', 'Login to your Account'),
(452, '300', 'Register an account', 'Register an account'),
(453, '301', 'Enter your email address', 'Enter your email address'),
(454, '302', 'Options:', 'Options:'),
(455, '303', 'Account already verified...', 'Account already verified...'),
(456, '304', 'Something Went Wrong! Contact Support!', 'Something Went Wrong! Contact Support!'),
(457, '305', 'Account verified successfully.. <br /> <br /> You can login now..', 'Account verified successfully.. <br /> <br /> You can login now..'),
(458, '306', 'Verification code is wrong..', 'Verification code is wrong..'),
(459, '307', 'Username not found', 'Username not found'),
(460, '308', 'Site is down for maintenance', 'Site is down for maintenance'),
(461, '309', 'We are currently down for maintenance', 'We are currently down for maintenance'),
(462, '310', 'Maintenance Notice', 'Maintenance Notice'),
(463, '311', 'Guest user limit is reached!', 'Guest user limit is reached!'),
(464, '312', 'to use SEO tools anymore..', 'to use SEO tools anymore..'),
(465, '313', 'Login required to access this tool!', 'Login required to access this tool!'),
(466, '314', 'Top 5 Tools', 'Top 5 Tools'),
(467, '315', 'Latest Tweets', 'Latest Tweets'),
(468, '316', 'Links', 'Links'),
(469, '317', 'Search Engine Optimization', 'Search Engine Optimization'),
(470, '318', 'Get Started', 'Get Started'),
(471, '319', 'More than 50 SEO Tools to keep track of your SEO issues <br/> and help to improve the visibility of a website in search <br/> engines.', 'More than 50 SEO Tools to keep track of your SEO issues <br/> and help to improve the visibility of a website in search <br/> engines.'),
(472, '320', 'Enter up to 20 Links (Each Links must be on separate line)', 'Enter up to 20 Links (Each Links must be on separate line)'),
(473, '321', 'Not Cached', 'Not Cached'),
(474, '322', 'Status Code', 'Status Code'),
(475, '323', 'Broken Link', 'Broken Link'),
(476, '324', 'Okay', 'Okay'),
(477, '325', 'Enquiry', 'Enquiry'),
(478, '326', 'No Subject', 'No Subject'),
(479, '327', 'Input Site is not valid!', 'Input Site is not valid!'),
(480, '328', 'Enter your keyword', 'Enter your keyword'),
(481, '329', 'Suggest Queries', 'Suggest Queries'),
(482, '330', 'Enter your domain names', 'Enter your domain names'),
(483, '331', 'Meta Content', 'Meta Content'),
(484, '332', 'H1 to H4 Tags', 'H1 to H4 Tags'),
(485, '333', 'Tags', 'Tags'),
(486, '334', 'Readable Text Content', 'Readable Text Content'),
(487, '335', 'Indexable Links', 'Indexable Links'),
(488, '336', 'It looks like your IP has already been used to register an account today!', 'It looks like your IP has already been used to register an account today!'),
(489, '337', 'Save As XML File', 'Save As XML File'),
(490, '338', 'Save Sitemap File', 'Save Sitemap File'),
(491, '339', 'Save the Screenshot', 'Save the Screenshot'),
(492, 'AS1', 'Export as CSV', 'Export as CSV'),
(493, 'AS2', 'Custom date field cannot be empty', 'Custom date field cannot be empty'),
(494, 'AS3', 'Crawler Limit Reached!', 'Crawler Limit Reached!'),
(495, 'AS4', 'Sitemap generated for [count] links!', 'Sitemap generated for [count] links!'),
(496, 'AS5', 'Input data field can\'t be empty', 'Input data field can\'t be empty'),
(497, 'AS6', 'Either input site is not valid or offline!', 'Either input site is not valid or offline!'),
(498, 'AS7', 'Page Speed Score', 'Page Speed Score'),
(499, 'AS8', 'Page Code Analysis', 'Page Code Analysis'),
(500, 'AS9', 'Page Optimization Suggestions', 'Page Optimization Suggestions');

INSERT INTO `lang` (`id`, `code`, `default_text`, `lang_en`) VALUES
(501, 'AS10', 'Checking...', 'Checking...'),
(502, 'AS11', 'Browse More Tools', 'Browse More Tools'),
(503, 'AS12', 'Open Graph meta tags is present', 'Open Graph meta tags is present'),
(504, 'AS13', 'Open Graph meta tags is not present', 'Open Graph meta tags is not present'),
(505, 'AS14', 'Open Graph', 'Open Graph'),
(506, 'AS15', 'Ideally, your title tag should contain between 10 and 70 characters (Yours [count] characters)', 'Ideally, your title tag should contain between 10 and 70 characters (Yours [count] characters)'),
(507, 'AS16', 'Meta descriptions contains between 160 and 320 characters (Yours [count] characters)', 'Meta descriptions contains between 160 and 320 characters (Yours [count] characters)'),
(508, 'AS17', 'Meta Viewport', 'Meta Viewport'),
(509, 'AS18', 'Site Name', 'Site Name'),
(510, 'AS19', 'No Title', 'No Title'),
(511, 'AS20', 'No Description', 'No Description'),
(512, 'AS21', 'No Keywords', 'No Keywords'),
(513, 'AS22', 'Guest', 'Guest'),
(514, 'AS23', 'Your article must be [limit] characters or more', 'Your article must be [limit] characters or more'),
(515, 'AS24', 'Maximum [limit] words allowed per search', 'Maximum [limit] words allowed per search'),
(516, 'AS25', 'String', 'String'),
(517, 'AS26', 'Uniqueness', 'Uniqueness'),
(518, 'AS27', 'Already Exists', 'Already Exists'),
(519, 'AS28', 'Unique Content', 'Unique Content'),
(520, 'AS29', 'Crawling Link', 'Crawling Link'),
(521, 'AS30', 'Type any word to search SEO tools', 'Type any word to search SEO tools'),
(522, 'AS31', 'Domain name field can\'t be empty!', 'Domain name field can\'t be empty!'),
(523, 'AS32', 'Enter a valid URL', 'Enter a valid URL'),
(524, 'AS33', 'Characters left', 'Characters left'),
(525, 'AS34', 'Loading...', 'Loading...'),
(526, 'AS35', 'Site title field can\'t be empty!', 'Site title field can\'t be empty!'),
(527, 'AS36', 'Site dscription field can\'t be empty!', 'Site dscription field can\'t be empty!'),
(528, 'AS37', 'Site keywords field can\'t be empty!', 'Site keywords field can\'t be empty!'),
(529, 'AS38', 'No result found related to your keyword...', 'No result found related to your keyword...'),
(530, 'AS39', 'Search SEO tools', 'Search SEO tools');

-- Table `mail` --
CREATE TABLE `mail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `smtp_host` text,
  `smtp_username` text,
  `smtp_password` text,
  `smtp_port` text,
  `protocol` text,
  `smtp_auth` text,
  `smtp_socket` text,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `mail` (`id`, `smtp_host`, `smtp_username`, `smtp_password`, `smtp_port`, `protocol`, `smtp_auth`, `smtp_socket`) VALUES
(1, '', '', '', '', '1', 'true', 'ssl');

-- Table `mail_templates` --
CREATE TABLE `mail_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` text NOT NULL,
  `body` blob NOT NULL,
  `code` text NOT NULL,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `mail_templates` (`id`, `subject`, `body`, `code`) VALUES
(1, 'e1NpdGVOYW1lfSAtIEFjY291bnQgQWN0aXZhdGlvbg==', 'Jmx0O3AmZ3Q7V2VsY29tZSBhbmQgdGhhbmsgeW91IGZvciByZWdpc3RlcmluZyBhdCB7U2l0ZU5hbWV9Jmx0O2JyIC8mZ3Q7DQombHQ7YnIgLyZndDsNCklmIHlvdSBhcmUgdGhlIGNyZWF0b3Igb2YgdGhlIHtTaXRlTmFtZX0gYWNjb3VudCwgcGxlYXNlIGNsaWNrIHlvdXIgYWN0aXZhdGlvbiB1cmw6Jmx0O2JyIC8mZ3Q7DQombHQ7YSBocmVmPSZxdW90O3tWZXJpZmljYXRpb25Vcmx9JnF1b3Q7IHRhcmdldD0mcXVvdDtfc2VsZiZxdW90OyZndDt7VmVyaWZpY2F0aW9uVXJsfSZsdDsvYSZndDsmbHQ7YnIgLyZndDsNCiZsdDticiAvJmd0Ow0KQWZ0ZXIgYWNjb3VudCBjb25maXJtYXRpb24sIFlvdSBjYW4gbG9nIGluIGJ5IHVzaW5nIHlvdXIgdXNlcm5hbWUgYW5kIHBhc3N3b3JkIGJ5IHZpc2l0aW5nIG91ciB3ZWJzaXRlLiZsdDticiAvJmd0Ow0KJmx0O2JyIC8mZ3Q7DQpUaGFuayB5b3UsJmx0O2JyIC8mZ3Q7DQotIFRoZSB7U2l0ZU5hbWV9IFRlYW0mbHQ7L3AmZ3Q7', 'account_activation'),
(3, 'e1NpdGVOYW1lfSAtIFBhc3N3b3JkIGNoYW5nZWQgc3VjY2Vzc2Z1bGx5', 'Jmx0O3AmZ3Q7SGVsbG8sJmx0O2JyIC8mZ3Q7DQombHQ7YnIgLyZndDsNClJlY2VudGx5IHlvdXIgYWNjb3VudCBwYXNzd29yZCBoYXMgYmVlbiByZXNldCBieSB5b3VyIHJlcXVlc3QuIFBsZWFzZSB0YWtlIG5ldyBwYXNzd29yZCB0byBsb2dpbi4mbHQ7YnIgLyZndDsNCiZsdDticiAvJmd0Ow0KWW91ciBOZXcgUGFzc3dvcmQ6IHtOZXdQYXNzd29yZH0mbHQ7YnIgLyZndDsNCiZsdDticiAvJmd0Ow0KWW91IGNhbiBsb2cgaW4gYnkgdXNpbmcgeW91ciB1c2VybmFtZSBhbmQgbmV3IHBhc3N3b3JkIGJ5IHZpc2l0aW5nIG91ciB3ZWJzaXRlLiZsdDticiAvJmd0Ow0KJmx0O2JyIC8mZ3Q7DQpUaGFuayB5b3UsJmx0O2JyIC8mZ3Q7DQotIFRoZSB7U2l0ZU5hbWV9IFRlYW0mbHQ7L3AmZ3Q7', 'password_reset');

-- Table `pages` --
CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` text NOT NULL,
  `sort_order` text NOT NULL,
  `posted_date` text,
  `page_name` text,
  `meta_des` text,
  `meta_tags` text,
  `page_title` text,
  `page_content` text,
  `header_show` text,
  `footer_show` text,
  `page_url` text,
  `lang` text NOT NULL,
  `status` text NOT NULL,
  `access` text NOT NULL,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `pages` (`id`, `type`, `sort_order`, `posted_date`, `page_name`, `meta_des`, `meta_tags`, `page_title`, `page_content`, `header_show`, `footer_show`, `page_url`, `lang`, `status`, `access`) VALUES
(1, 'internal', '1', '6th May 2017', '{{lang[RF1]}}', '-', '-', '{{lang[RF1]}}', 'YToyOntpOjA7czo0OiJub25lIjtpOjE7czo0OiJub25lIjt9', 'on', 'on', '{{baseLink}}', 'all', 'on', 'all'),
(2, 'internal', '2', '6th May 2017', '{{lang[RF2]}}', '-', '-', '{{lang[RF2]}}', 'YToyOntpOjA7czo0OiJub25lIjtpOjE7czo0OiJub25lIjt9', 'on', 'on', '{{baseLink}}contact', 'all', 'on', 'all'),
(3, 'page', '3', '05/06/2017 6:06 AM', '{{lang[RF107]}}', '', '', '{{lang[RF107]}}', '&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n\n&lt;p&gt;Hello, I am Balaji.&lt;br /&gt;\nIt is a sample page, you can write more about you&lt;/p&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;', '', 'on', 'about-us', 'all', 'on', 'all');

-- Table `plugins` --
CREATE TABLE `plugins` (
  `id` int(11) NOT NULL,
  `execution_type` text,
  `privilege` text,
  `plugin_active` text,
  `plugin_con_name` text,
  `con_name` text,
  `plugin_info` text
) DEFAULT CHARSET=utf8;

-- Table `pr02` --
CREATE TABLE `pr02` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `api_type` text,
  `wordLimit` text,
  `minChar` text,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `pr02` (`id`, `api_type`, `wordLimit`, `minChar`) VALUES
(1, '2', '1000', '30');

-- Table `pr24` --
CREATE TABLE `pr24` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `moz_access_id` text,
  `moz_secret_key` text,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `pr24` (`id`, `moz_access_id`, `moz_secret_key`) VALUES
(1, '', '');

-- Table `rainbow_track` --
CREATE TABLE `rainbow_track` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` text,
  `h0` blob,
  `h2` blob,
  `h4` blob,
  `h6` blob,
  `h8` blob,
  `h10` blob,
  `h12` blob,
  `h14` blob,
  `h16` blob,
  `h18` blob,
  `h20` blob,
  `h22` blob,
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;

-- Table `rainbowphp_temp` --
CREATE TABLE `rainbowphp_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task` text,
  `data` text,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `rainbowphp_temp` (`id`, `task`, `data`) VALUES
(1, 'ddos', '{\"maxcount\":\"15\",\"2017-04-19\":{\"117.248.4.88\":{\"time\":\"1492552482\",\"hit\":\"6\"},\"banned\":[]},\"2017-05-27\":{\"127.0.0.1\":{\"time\":1495836926,\"hit\":\"1\"},\"banned\":[]}}'),
(2, 'quick_login', '{\"2017-04-08\":{\"127.0.0.1\":{\"time\":\"1491592940\"},\"117.88.44.22\":{\"time\":\"1491593688\"},\"117.88.44.11\":{\"time\":\"1491593810\"}},\"2017-04-15\":{\"22.52.1.107\":{\"time\":\"1492201266\"}},\"2017-04-30\":{\"44.248.4.88\":{\"time\":\"1493502485\"}},\"2017-05-03\":{\"117.248.4.88\":{\"time\":\"1493806652\"}},\"2017-05-09\":{\"117.248.4.88\":{\"time\":\"1494305715\"}},\"2017-05-11\":{\"117.248.4.88\":{\"time\":\"1494505528\"}},\"2017-05-14\":{\"117.248.4.88\":{\"time\":1494773943}}}'),
(3, 'adblock', '{\"options\":\"force\",\"link\":\"{{baseLink}}test\",\"close\":{\"title\":\"Adblock detected!\",\"msg\":\"&lt;div class=&quot;text-center&quot;&gt;\\\\r\\\\n&lt;br&gt;\\\\r\\\\n&lt;i style=&quot;color: #e74c3c; font-size: 120px;&quot; class=&quot;fa fa-frown-o&quot; aria-hidden=&quot;true&quot;&gt;&lt;\\/i&gt;\\\\r\\\\n&lt;p class=&quot;bold&quot;&gt;We have detected that you are using adblocking plugin in your browser.&lt;\\/p&gt;\\\\r\\\\n\\\\r\\\\n&lt;p  class=&quot;bold&quot;&gt;\\\\r\\\\nThe revenue we earn by the advertisements is used to manage this website, we request you to whitelist our website in your adblocking plugin.&lt;\\/p&gt;\\\\r\\\\n&lt;p&gt;&lt;button onclick=&quot;location.reload();&quot; class=&quot;btn btn-success&quot;&gt;Refresh this Page&lt;\\/button&gt;&lt;\\/p&gt;\\\\r\\\\n&lt;br&gt;\\\\r\\\\n&lt;\\/div&gt;\"},\"force\":{\"title\":\"Adblock detected!\",\"msg\":\"&lt;div class=&quot;text-center&quot;&gt;\\\\r\\\\n&lt;br&gt;\\\\r\\\\n&lt;i style=&quot;color: #e74c3c; font-size: 120px;&quot; class=&quot;fa fa-frown-o&quot; aria-hidden=&quot;true&quot;&gt;&lt;\\/i&gt;\\\\r\\\\n&lt;p class=&quot;bold&quot;&gt;We have detected that you are using adblocking plugin in your browser.&lt;\\/p&gt;\\\\r\\\\n\\\\r\\\\n&lt;p  class=&quot;bold&quot;&gt;\\\\r\\\\nThe revenue we earn by the advertisements is used to manage this website, we request you to whitelist our website in your adblocking plugin.&lt;\\/p&gt;\\\\r\\\\n&lt;p&gt;&lt;button onclick=&quot;location.reload();&quot; class=&quot;btn btn-success&quot;&gt;Refresh this Page&lt;\\/button&gt;&lt;\\/p&gt;\\\\r\\\\n&lt;br&gt;\\\\r\\\\n&lt;\\/div&gt;\"},\"enable\":\"off\"}');

-- Table `recent_history` --
CREATE TABLE `recent_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visitor_ip` text,
  `tool_name` text,
  `user` text,
  `date` text,
  `intDate` text,
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;

-- Table `seo_tools` --
CREATE TABLE `seo_tools` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tool_name` text,
  `tool_url` text,
  `uid` text,
  `icon_name` text,
  `meta_title` text,
  `meta_des` text,
  `meta_tags` text,
  `about_tool` text,
  `captcha` text,
  `tool_show` text,
  `tool_no` text,
  `tool_login` text,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

INSERT INTO `seo_tools` (`id`, `tool_name`, `tool_url`, `uid`, `icon_name`, `meta_title`, `meta_des`, `meta_tags`, `about_tool`, `captcha`, `tool_show`, `tool_no`, `tool_login`) VALUES
(1, 'Article Rewriter', 'article-rewriter', 'PR01', 'icons/article_rewriter.png', '100% Free Article Rewriter', '', 'article rewriter, spinner, article rewriter online', '<p>Enter more information about the Article Rewriter tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '1', 'no'),
(2, 'Plagiarism Checker', 'plagiarism-checker', 'PR02', 'icons/plagiarism_checker.png', 'Advance Plagiarism Checker', '', 'seo plagiarism checker, detector, plagiarism, plagiarism seo tools', '<p>Enter more information about the Plagiarism Checker tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '2', 'no'),
(3, 'Backlink Maker', 'backlink-maker', 'PR03', 'icons/backlink_maker.png', 'Backlink Maker', '', 'backlink maker, backlinks, link maker, backlink maker online', '<p>Enter more information about the Backlink Maker tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '3', 'no'),
(4, 'Meta Tag Generator', 'meta-tag-generator', 'PR04', 'icons/meta_tag_generator.png', 'Easy Meta Tag Generator', '', 'meta generator, seo tags, online meta tag generator, meta tag generator free', '<p>Enter more information about the Meta Tag Generator tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '4', 'no'),
(5, 'Meta Tags Analyzer', 'meta-tags-analyzer', 'PR05', 'icons/meta_tags_analyzer.png', 'Meta Tags Analyzer', '', 'analyze meta tags, get meta tags', '<p>Enter more information about the Meta Tags Analyzer tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '5', 'no'),
(6, 'Keyword Position Checker', 'keyword-position-checker', 'PR06', 'icons/keyword_position_checker.png', 'Free Keyword Position Checker', '', 'keyword position, keywords position checker, online keywords position checker', '<p>Enter more information about the Keyword Position Checker tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '6', 'no'),
(7, 'Robots.txt Generator', 'robots-txt-generator', 'PR07', 'icons/robots_txt_generator.png', 'Robots.txt Generator', '', 'robots.txt generator, online robots.txt generator, generate robots.txt free', '<p>Enter more information about the Robots.txt Generator tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '7', 'no'),
(8, 'XML Sitemap Generator', 'xml-sitemap-generator', 'PR08', 'icons/sitemap.png', 'Free Online XML Sitemap Generator', '', 'generate xml sitemap free, seo sitemap, xml', '<p>Enter more information about the XML Sitemap Generator tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '8', 'no'),
(9, 'Backlink Checker', 'backlink-checker', 'PR09', 'icons/backlink_checker.png', '100% Free Backlink Checker', '', 'free backlink checker online, online backlink checker', '<p>Enter more information about the Backlink Checker tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '9', 'no'),
(10, 'Alexa Rank Checker', 'alexa-rank-checker', 'PR10', 'icons/alexa.png', 'Alexa Rank Checker', '', 'get world rank, alexa, alexa site rank', '<p>Enter more information about the Alexa Rank Checker tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '10', 'no'),
(11, 'Word Counter', 'word-counter', 'PR11', 'icons/word_counter.png', 'Simple Word Counter', '', 'word calculator, word counter, character counter online', '<p>Enter more information about the Word Counter tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '11', 'no'),
(12, 'Online Ping Website Tool', 'online-ping-website-tool', 'PR12', 'icons/ping_tool.png', 'Online Ping Website Tool', '', 'website ping tool, free website ping tool, online ping tool', '<p>Enter more information about the Online Ping Website Tool tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '12', 'no'),
(13, 'Link Analyzer', 'link-analyzer-tool', 'PR13', 'icons/link_analyzer.png', 'Free Link Analyzer Tool', '', 'link analysis tool, analyse links website, analyze links free, online link analyzer, ', '<p>Enter more information about the Link Analyzer tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '13', 'no'),
(15, 'My IP Address', 'my-ip-address', 'PR15', 'icons/my_IP_address.png', 'Your IP Address Information', '', 'ip address locator, my static ip, my ip', '<p>Enter more information about the My IP Address tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '15', 'no'),
(16, 'Keyword Density Checker', 'keyword-density-checker', 'PR16', 'icons/keyword_density_checker.png', 'Keyword Density Checker', '', 'keyword density formula, online keyword density checker, wordpress keyword density checker', '<p>Enter more information about the Keyword Density Checker tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '16', 'no'),
(17, 'Google Malware Checker', 'google-malware-checker', 'PR17', 'icons/google_malware.png', 'Google Malware Checker', '', 'google malicious site check, google request malware review, malware site finder', '<p>Enter more information about the Google Malware Checker tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '17', 'no'),
(18, 'Domain Age Checker', 'domain-age-checker', 'PR18', 'icons/domain_age_checker.png', 'Domain Age Checker', '', 'get domain age, aged domain finder, domain age finder', '<p>Enter more information about the Domain Age Checker tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '18', 'no'),
(19, 'Whois Checker', 'whois-checker', 'PR19', 'icons/whois_checker.png', 'Online Whois Checker', '', 'whois lookup, domain whois, whois checker', '<p>Enter more information about the Whois Checker tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '19', 'no'),
(20, 'Domain into IP', 'domain-into-ip', 'PR20', 'icons/domain_into_IP.png', 'Domain into IP', '', 'host ip, domain into ip, host ip lookup', '<p>Enter more information about the Domain into IP tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '20', 'no'),
(22, 'URL Rewriting Tool', 'url-rewriting-tool', 'PR22', 'icons/url_rewriting.png', 'URL Rewriting Tool', '', 'htaccess rewriting, url rewriting, seo urls', '<p>Enter more information about the URL Rewriting Tool tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '22', 'no'),
(23, 'www Redirect Checker', 'www-redirect-checker', 'PR23', 'icons/www_redirect_checker.png', 'www Redirect Checker', '', '302 redirect checker, seo friendly redirect, www redirect', '<p>Enter more information about the www Redirect Checker tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '23', 'no'),
(24, 'Mozrank Checker', 'mozrank-checker', 'PR24', 'icons/moz.png', 'Mozrank Checker', '', 'moz rank, seo moz, seo rank checker', '<p>Enter more information about the Mozrank Checker tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '24', 'no'),
(25, 'URL Encoder / Decoder', 'url-encoder-decoder', 'PR25', 'icons/url_encoder_decoder.png', 'Online URL Encoder / Decoder', '', 'online urlencode, urldecode online, http encoder', '<p>Enter more information about the URL Encoder / Decoder tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '25', 'no'),
(26, 'Server Status Checker', 'server-status-checker', 'PR26', 'icons/server_status_checker.png', 'Server Status Checker', '', 'check server status, my server status, status of my server', '<p>Enter more information about the Server Status Checker tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '26', 'no'),
(27, 'Webpage Screen Resolution Simulator', 'webpage-screen-resolution-simulator', 'PR27', 'icons/webpage_screen_resolution_simulator.png', 'Webpage Screen Resolution Simulator', '', 'browser size simulator, test browser resolution, screen size tester', '<p>Enter more information about the Webpage Screen Resolution Simulator tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '27', 'no'),
(28, 'Page Size Checker', 'page-size-checker', 'PR28', 'icons/page_size_checker.png', 'Page Size Checker', '', 'check website size, find web page size, webpage size calculator', '<p>Enter more information about the Page Size Checker tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '28', 'no'),
(29, 'Reverse IP Domain Checker', 'reverse-ip-domain-checker', 'PR29', 'icons/reverse_ip_domain.png', 'Reverse IP Domain Checker', '', 'reverse ip lookup, reverse dns lookup, lookup website', '<p>Enter more information about the Reverse IP Domain Checker tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '29', 'no'),
(30, 'Blacklist Lookup', 'blacklist-lookup', 'PR30', 'icons/denied.png', 'Blacklist Lookup', '', 'blacklist checker, site blacklist, spamhaus blacklist lookup', '<p>Enter more information about the Blacklist Lookup tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '30', 'no'),
(31, 'Suspicious Domain Checker', 'suspicious-domain-checker', 'PR31', 'icons/avg_antivirus.png', 'Free AVG Antivirus Checker', '', 'antivirus lookup, free virus checker, avg online', '<p>Enter more information about the AVG Antivirus Checker tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '31', 'no'),
(32, 'Link Price Calculator', 'link-price-calculator', 'PR32', 'icons/link_price_calculator.png', 'Link Price Calculator', '', 'seo price calculator, link worth calculator, check price of domain', '<p>Enter more information about the Link Price Calculator tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '32', 'no'),
(33, 'Website Screenshot Generator', 'website-screenshot-generator', 'PR33', 'icons/website_screenshot_generator.png', 'Website Screenshot Generator', '', 'browser screenshot generator, website snapshot generator, website thumbnail', '<p>Enter more information about the Website Screenshot Generator tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '33', 'no'),
(34, 'Domain Hosting Checker', 'domain-hosting-checker', 'PR34', 'icons/domain_hosting_checker.png', 'Get your Domain Hosting Checker', '', 'get hosting name, hosting isp name, domain hosting', '<p>Enter more information about the Domain Hosting Checker tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '34', 'no'),
(35, 'Get Source Code of Webpage', 'get-source-code-of-webpage', 'PR35', 'icons/source_code.png', 'Get Source Code of Webpage', '', 'web page source code, source of web page, get source code', '<p>Enter more information about the Get Source Code of Webpage tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '35', 'no'),
(36, 'Google Index Checker', 'google-index-checker', 'PR36', 'icons/google_index_checker.png', 'Google Index Checker', '', 'google site index checker, google index search, check google index online', '<p>Enter more information about the Google Index Checker tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '36', 'no'),
(37, 'Website Links Count Checker', 'website-links-count-checker', 'PR37', 'icons/links_count_checker.png', 'Website Links Count Checker', '', 'online links counter, get webpage links, link extract', '<p>Enter more information about the Website Links Count Checker tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '37', 'no'),
(38, 'Class C Ip Checker', 'class-c-ip-checker', 'PR38', 'icons/class_c_ip.png', 'Class C Ip Checker', '', 'class c ip address, class c rang, get class c ip', '<p>Enter more information about the Class C Ip Checker tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '38', 'no'),
(39, 'Online Md5 Generator', 'online-md5-generator', 'PR39', 'icons/online_md5_generator.png', 'Online Md5 Generator', '', 'create md5 hash, calculate md5 hash online, md5 key generator', '<p>Enter more information about the Online Md5 Generator tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '39', 'no'),
(40, 'Page Speed Checker', 'page-speed-checker', 'PR40', 'icons/page_speed.png', 'Page Speed Checker', '', 'page load speed, web page speed, faster page load', '<p>Enter more information about the Page Speed Checker tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '40', 'no'),
(41, 'Code to Text Ratio Checker', 'code-to-text-ratio-checker', 'PR41', 'icons/code_to_text.png', 'Code to Text Ratio Checker', '', 'code to text ratio html, webpage text ratio, online ratio checker', '<p>Enter more information about the Code to Text Ratio Checker tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '41', 'no'),
(42, 'Find DNS records', 'find-dns-records', 'PR42', 'icons/dns.png', 'Find DNS records', '', 'dns record checker, get dns of my domain, dns lookup', '<p>Enter more information about the Find DNS records tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '42', 'no'),
(43, 'What is my Browser', 'what-is-my-browser', 'PR43', 'icons/what_is_my_browser.png', 'What is my Browser', '', 'what is a browser, get browser info, detect browser', '<p>Enter more information about the What is my Browser tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '43', 'no'),
(44, 'Email Privacy', 'email-privacy', 'PR44', 'icons/email_privacy.png', 'Email Privacy', '', 'email privacy issues, email security, email privacy at web page', '<p>Enter more information about the Email Privacy tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '44', 'no'),
(45, 'Google Cache Checker', 'google-cache-checker', 'PR45', 'icons/google_cache.png', 'Google Cache Checker', '', 'cache checker, google cache, web page cache', '<p>Enter more information about the Google Cache Checker tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '45', 'no'),
(46, 'Broken Links Finder', 'broken-links-finder', 'PR46', 'icons/broken_links.png', 'Broken Links Finder', '', '404 links, broken links, broken web page links', '<p>Enter more information about the Broken Links Finder tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '46', 'no'),
(47, 'Search Engine Spider Simulator', 'spider-simulator', 'PR47', 'icons/spider_simulator.png', 'Search Engine Spider Simulator', '', 'spider simulator, web crawler simulator, search engine spider', '<p>Enter more information about the Search Engine Spider Simulator tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '47', 'no'),
(48, 'Keywords Suggestion Tool', 'keywords-suggestion-tool', 'PR48', 'icons/keywords_suggestion.png', 'Keywords Suggestion Tool', '', 'keywords suggestion, suggestion tool, keywords maker', '<p>Enter more information about the Keywords Suggestion Tool tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '48', 'no'),
(49, 'Domain Authority Checker', 'domain-authority-checker', 'PR49', 'icons/domain_authority.png', 'Bulk Domain Authority Checker', '', 'domain authority, seo moz, domain score', '<p>Enter more information about the Domain Authority Checker tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '49', 'no'),
(50, 'Page Authority Checker', 'page-authority-checker', 'PR50', 'icons/page_authority.png', 'Bulk Page Authority Checker', '', 'page authority, moz rank check, page score', '<p>Enter more information about the Page Authority Checker tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '50', 'no'),
(51, 'Pagespeed Insights Checker', 'pagespeed-insights-checker', 'SD51', 'icons/google_pagespeed.png', 'Google Pagespeed Insights Checker', '', 'pagespeed, pagespeed google, insights score', '<p>Enter more information about the Pagespeed Insights Checker tool! </p> <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </p>', 'no', 'yes', '51', 'no');

-- Table `site_info` --
CREATE TABLE `site_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` mediumtext,
  `des` text,
  `keyword` mediumtext,
  `site_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `social_links` text,
  `doForce` text,
  `copyright` text,
  `other_settings` text,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `site_info` (`id`, `title`, `des`, `keyword`, `site_name`, `email`, `social_links`, `doForce`, `copyright`, `other_settings`) VALUES
(1, 'A to Z SEO Tools - 100% Free SEO Tools', 'AtoZ SEO Tools is a bundled collection of best seo tools website. We offer all for free of charge, Such as XML Sitemap Generator, Plagiarism Checker, Article Rewriter &amp; more.', 'seo tools, atoz, seo, free seo', 'A to Z SEO Tools', 'demo@prothemes.biz', '{\"face\":\"https:\\/\\/facebook.com\\/\",\"twit\":\"https:\\/\\/twitter.com\",\"gplus\":\"https:\\/\\/plus.google.com\",\"linkedin\":\"https:\\/\\/linkedin.com\"}', '[\"\",\"\"]', 'Copyright © 2018 ProThemes.Biz. All rights reserved.', '{\"other\":{\"ga\":\"\",\"footer_tags\":\"seo, turbo, balaji\",\"ddos_check\":\"\",\"ddos\":\"1\",\"maintenance\":\"\",\"maintenance_mes\":\"We expect to be back within the hour.&lt;br\\/&gt;Sorry for the inconvenience.\",\"sitemap\":{\"cronopt\":\"daily\",\"auto\":\"on\",\"gzip\":[\"\",false],\"cron\":[\"\",false],\"multilingual\":\"\",\"priority\":\"0.9\",\"freqrange\":\"daily\"},\"dbbackup\":{\"cronopt\":\"daily\"}}}');

-- Table `themes_data` --
CREATE TABLE `themes_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `default_theme` text,
  `simpleX_theme` text,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `themes_data` (`id`, `default_theme`, `simpleX_theme`) VALUES
(1, '{"general":{"imgLogo":"on","htmlLogo":"&lt;i class=&quot;fa fa-cubes iconBig&quot;&gt;&lt;\\/i&gt; {{site_name}}","logo":"theme\\/default\\/img\\/logo.png","favicon":"theme\\/default\\/img\\/favicon.ico","langSwitch":true,"sidebar":"right","sSearch":false,"iSearch":true,"browseBtn":true,"topTools":["PR02","PR08","PR19","PR22","PR24"]},"contact":{"about":"Our aim to make search engine optimization (SEO) easy. We provide simple, professional-quality SEO analysis and critical SEO monitoring for websites. By making our tools intuitive and easy to understand, we\\\\''ve helped thousands of small-business owners, webmasters and SEO professionals improve their online presence."},"custom":{"css":""}}', '{"general":{"imgLogo":"on","htmlLogo":"&lt;i class=&quot;fa fa-cubes iconBig&quot;&gt;&lt;\\/i&gt; {{site_name}}","logo":"theme\\/default\\/img\\/logo.png","favicon":"theme\\/default\\/img\\/favicon.ico","langSwitch":true,"sidebar":"right","sSearch":true,"iSearch":true,"browseBtn":false,"topTools":["PR02","PR08","PR19","PR22","PR24"]},"contact":{"about":"Our aim to make search engine optimization (SEO) easy. We provide simple, professional-quality SEO analysis and critical SEO monitoring for websites. By making our tools intuitive and easy to understand, we\\\\''ve helped thousands of small-business owners, webmasters and SEO professionals improve their online presence."},"custom":{"css":""}}');

-- Table `user_input_history` --
CREATE TABLE `user_input_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visitor_ip` text,
  `tool_name` text,
  `user` text,
  `date` text,
  `user_input` text,
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;

-- Table `user_settings` --
CREATE TABLE `user_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enable_reg` text,
  `enable_oauth` text,
  `enable_quick` text,
  `oauth_keys` text,
  `other_settings` text,
  `visitors_limit` text,
  PRIMARY KEY (`id`)
) AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `user_settings` (`id`, `enable_reg`, `enable_oauth`, `enable_quick`, `oauth_keys`, `other_settings`, `visitors_limit`) VALUES
(1, 'on', 'on', 'on', '{\"oauth\":{\"g_client_id\":\"\",\"g_client_secret\":\"\",\"g_redirect_uri\":\"http:\\/\\/tweb.dev\\/?route=google\",\"fb_app_id\":\"\",\"fb_app_secret\":\"\",\"fb_redirect_uri\":\"http:\\/\\/tweb.dev\\/?route=facebook\",\"twitter_key\":\"\",\"twitter_secret\":\"\",\"twitter_redirect_uri\":\"http:\\/\\/tweb.dev\\/?route=twitter\"}}', '', '10');

-- Table `users` --
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oauth_uid` text,
  `username` text,
  `email_id` text,
  `full_name` text,
  `platform` text,
  `password` text,
  `verified` text,
  `picture` text,
  `date` text,
  `added_date` text,
  `ip` text,
  `firstname` text,
  `lastname` text,
  `company` text,
  `telephone` text,
  `address1` text,
  `address2` text,
  `city` text,
  `state` text,
  `statestr` text,
  `postcode` text,
  `country` text,
  `userdata` text,
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;

