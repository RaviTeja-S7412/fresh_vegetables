-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2023 at 10:48 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fresh_vegetables`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_session`
--

CREATE TABLE `ci_session` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fdm_va_admin_role_access`
--

CREATE TABLE `fdm_va_admin_role_access` (
  `id` int(55) NOT NULL,
  `role_id` bigint(10) NOT NULL,
  `modules` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fdm_va_admin_role_access`
--

INSERT INTO `fdm_va_admin_role_access` (`id`, `role_id`, `modules`, `date`) VALUES
(2, 2, '[{\"module_id\":\"14\",\"sub_module_id\":[\"16\",\"18\",\"39\"]},{\"module_id\":\"13\",\"sub_module_id\":[\"25\"]},{\"module_id\":\"3\",\"sub_module_id\":null},{\"module_id\":\"4\",\"sub_module_id\":[\"6\",\"7\"]},{\"module_id\":\"19\",\"sub_module_id\":null},{\"module_id\":\"16\",\"sub_module_id\":[\"37\"]},{\"module_id\":\"12\",\"sub_module_id\":[\"4\",\"5\",\"9\"]},{\"module_id\":\"20\",\"sub_module_id\":[\"40\",\"41\"]}]', '2020-04-18 15:33:43'),
(3, 1, '[{\"module_id\":\"14\",\"sub_module_id\":[\"16\",\"18\",\"31\",\"39\"]},{\"module_id\":\"13\",\"sub_module_id\":[\"25\"]},{\"module_id\":\"3\",\"sub_module_id\":null},{\"module_id\":\"12\",\"sub_module_id\":[\"4\",\"5\",\"9\"]}]', '2023-05-28 08:33:07'),
(4, 3, '[{\"module_id\":\"17\",\"sub_module_id\":[\"20\",\"21\",\"29\"]}]', '2019-05-01 13:21:02'),
(5, 4, '[{\"module_id\":\"17\",\"sub_module_id\":[\"20\",\"21\",\"29\"]}]', '2019-05-01 13:21:25'),
(6, 5, '[{\"module_id\":\"17\",\"sub_module_id\":[\"20\",\"21\",\"29\"]}]', '2019-05-01 13:24:28'),
(7, 6, '[{\"module_id\":\"14\",\"sub_module_id\":[\"16\",\"18\",\"30\",\"31\",\"32\",\"35\"]}]', '2019-08-02 06:29:38'),
(8, 7, '[{\"module_id\":\"18\",\"sub_module_id\":[\"22\",\"24\",\"27\"]},{\"module_id\":\"19\",\"sub_module_id\":[\"23\",\"28\"]}]', '2019-05-01 13:28:16'),
(11, 9, '[{\"module_id\":\"14\",\"sub_module_id\":[\"19\",\"31\"]}]', '2019-08-03 05:17:42'),
(12, 8, '[{\"module_id\":\"14\",\"sub_module_id\":[\"18\",\"30\",\"31\",\"35\",\"36\"]}]', '2019-08-03 05:26:34');

-- --------------------------------------------------------

--
-- Table structure for table `fdm_va_auths`
--

CREATE TABLE `fdm_va_auths` (
  `id` int(5) NOT NULL,
  `agent_id` varchar(25) NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `mobile_number` varchar(25) NOT NULL,
  `city` int(11) NOT NULL,
  `area` int(11) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_pic` text NOT NULL,
  `role` int(2) NOT NULL,
  `client_database` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  `deleted` int(2) NOT NULL DEFAULT 0,
  `registered_date` datetime NOT NULL,
  `last_logged_in` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fdm_va_auths`
--

INSERT INTO `fdm_va_auths` (`id`, `agent_id`, `name`, `email`, `mobile_number`, `city`, `area`, `address`, `password`, `profile_pic`, `role`, `client_database`, `status`, `deleted`, `registered_date`, `last_logged_in`) VALUES
(1, '1', 'Super Admin', 'superadmin@store.com', 'superadmin@vratha.com', 0, 0, '', '9ac5d4eba281d2240917e2015cdba395a7dd7d080eb0c32f3a6cad317749d6f6c4eff4f2933c3789806d631388692bf4d91e70d6fe91a347f8a2ccf5dc16c537Iqj3cgw7enhNX9Drsh5YCe6ySzrX9fqD', '', 1, '', 'Active', 0, '2018-08-14 00:00:00', '2023-05-28 14:02:14');

-- --------------------------------------------------------

--
-- Table structure for table `fdm_va_contact_queries`
--

CREATE TABLE `fdm_va_contact_queries` (
  `id` int(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active',
  `deleted` int(2) NOT NULL DEFAULT 0,
  `query_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fdm_va_gallery`
--

CREATE TABLE `fdm_va_gallery` (
  `id` int(10) NOT NULL,
  `img_name` text NOT NULL,
  `gallery_type` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active',
  `created_date` date NOT NULL,
  `updated_date` date NOT NULL,
  `created_by` int(10) NOT NULL,
  `updated_by` int(10) NOT NULL,
  `deleted` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fdm_va_gallery_types`
--

CREATE TABLE `fdm_va_gallery_types` (
  `id` int(5) NOT NULL,
  `gallery_type` varchar(150) NOT NULL,
  `height` bigint(10) NOT NULL,
  `width` bigint(10) NOT NULL,
  `minheight` bigint(10) NOT NULL,
  `minwidth` bigint(10) NOT NULL,
  `coldiv` varchar(30) DEFAULT NULL,
  `created_by` int(10) NOT NULL,
  `updated_by` int(10) NOT NULL,
  `created_date` date NOT NULL,
  `updated_date` date NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active',
  `deleted` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fdm_va_general_contact`
--

CREATE TABLE `fdm_va_general_contact` (
  `id` int(12) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `mobile` bigint(15) NOT NULL,
  `deleted` int(2) NOT NULL DEFAULT 0,
  `status` varchar(15) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fdm_va_general_contact`
--

INSERT INTO `fdm_va_general_contact` (`id`, `company_name`, `email`, `address`, `mobile`, `deleted`, `status`) VALUES
(1, 'Vratha', 'vratha@gmail.com', 'Test Address', 7013138259, 0, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `fdm_va_general_logo`
--

CREATE TABLE `fdm_va_general_logo` (
  `id` int(5) NOT NULL,
  `logo_type` varchar(20) NOT NULL,
  `logo` text NOT NULL,
  `deleted` int(2) NOT NULL DEFAULT 0,
  `status` varchar(25) NOT NULL DEFAULT 'Active',
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fdm_va_general_logo`
--

INSERT INTO `fdm_va_general_logo` (`id`, `logo_type`, `logo`, `deleted`, `status`, `date`) VALUES
(1, 'Header', 'uploads/general/logo/header/app_logo.png', 0, 'Active', '2020-04-25 00:22:53'),
(2, 'Footer', 'uploads/general/logo/footer/3d68a6e29b156210c8bbc73645e9e1fc.png', 0, 'Active', '2018-10-09 17:01:05');

-- --------------------------------------------------------

--
-- Table structure for table `fdm_va_home_slider_images`
--

CREATE TABLE `fdm_va_home_slider_images` (
  `id` int(5) NOT NULL,
  `sort_by` int(11) NOT NULL,
  `images` text NOT NULL,
  `description` text NOT NULL,
  `link` varchar(500) NOT NULL,
  `target` varchar(150) NOT NULL,
  `updated_date` date NOT NULL,
  `created_by` int(5) NOT NULL,
  `updated_by` int(5) NOT NULL,
  `created_date` date NOT NULL,
  `deleted` int(2) NOT NULL DEFAULT 0,
  `status` varchar(25) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fdm_va_ip_addresses`
--

CREATE TABLE `fdm_va_ip_addresses` (
  `id` int(10) NOT NULL,
  `ip_address` varchar(35) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active',
  `created_date` date NOT NULL,
  `updated_date` date NOT NULL,
  `created_by` int(10) NOT NULL,
  `updated_by` int(10) NOT NULL,
  `deleted` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fdm_va_login_attempts`
--

CREATE TABLE `fdm_va_login_attempts` (
  `id` int(10) NOT NULL,
  `ip_address` varchar(30) NOT NULL,
  `attempts` bigint(5) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fdm_va_login_history`
--

CREATE TABLE `fdm_va_login_history` (
  `id` int(11) NOT NULL,
  `agent` text NOT NULL,
  `platform` text NOT NULL,
  `ip_address` text NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fdm_va_modules`
--

CREATE TABLE `fdm_va_modules` (
  `module_id` int(5) NOT NULL,
  `module_name` varchar(25) NOT NULL,
  `module_long_name` varchar(250) NOT NULL,
  `module_icon` varchar(55) NOT NULL,
  `module_link` varchar(75) NOT NULL,
  `sort` int(5) NOT NULL,
  `status` int(2) NOT NULL,
  `role` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fdm_va_modules`
--

INSERT INTO `fdm_va_modules` (`module_id`, `module_name`, `module_long_name`, `module_icon`, `module_link`, `sort`, `status`, `role`, `date`) VALUES
(1, 'Clients', 'Client Creation', 'fa fa-user', 'agents', 1, 1, '[\"1\"]', '2018-08-20 00:00:00'),
(2, 'Menus', 'Menu Creation', 'fas fa-bars', 'menus', 2, 1, '[\"1\"]', '2018-08-21 00:00:00'),
(3, 'Settings', 'General Settings', 'fas fa-cog', 'general', 6, 1, '[\"1\"]', '2018-08-22 03:18:07'),
(4, 'Inventory', 'Inventory', 'fa fa-truck', 'purchaseorders', 5, 1, '[\"1\"]', '2018-08-23 00:00:00'),
(8, 'File Manager', 'File Manager', 'ti-gallery', 'file-manager', 7, 0, '[\"1\"]', '2018-11-14 00:00:00'),
(9, 'FAQ\'S', 'FAQ\'S', 'fas fa-newspaper', 'faqs', 8, 1, '[\"1\"]', '2018-11-29 00:00:00'),
(11, 'Meta Data', 'Meta Data', 'fas fa-bookmark', 'meta-data', 10, 0, '[\"1\"]', '2018-12-03 00:00:00'),
(12, 'Products', 'Products Creation', 'fab fa-product-hunt', 'products', 3, 1, '[\"1\"]', '2019-01-04 00:00:00'),
(13, 'Users', 'Consumers Data', 'fa fa-users', 'users', 0, 1, '[\"1\"]', '2019-01-09 00:00:00'),
(14, 'Orders', 'Consumer Orders', 'fab fa-first-order', 'orders', 4, 1, '[\"1\"]', '2019-01-04 00:00:00'),
(15, 'Orders', 'Agent Orders', 'fab fa-first-order', 'agent-orders', 1, 1, '[\"1\"]', '2019-01-04 00:00:00'),
(16, 'Offers', 'Offers', 'fas fa-snowflake', 'offers', 11, 1, '[\"1\"]', '2019-01-04 00:00:00'),
(17, 'Products', 'Products', 'fab fa-first-order', 'agent-products', 2, 1, '[\"1\"]', '0000-00-00 00:00:00'),
(18, 'Roles', 'Roles', 'fa fa-users', 'roles', 19, 1, '[\"1\"]', '2019-07-31 00:00:00'),
(19, 'Notifications', 'Notifications', 'fa fa-bell', 'notifications', 30, 1, '', '2019-08-20 00:00:00'),
(20, 'Vendors', 'Vendor Creation', 'fa fa-users', 'vendors', 2, 1, '', '2020-02-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fdm_va_options`
--

CREATE TABLE `fdm_va_options` (
  `id` int(5) NOT NULL,
  `option_name` varchar(150) NOT NULL,
  `option_value` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fdm_va_options`
--

INSERT INTO `fdm_va_options` (`id`, `option_name`, `option_value`) VALUES
(1, 'discount_bonus', '50'),
(2, 'min_purchase_amount', '500'),
(3, 'reward_points', '0'),
(4, 'delivery_charges', '10'),
(5, 'carry_bag', '2'),
(6, 'min_referal_reward_amount', '1500'),
(7, 'delivery_slots', '[2,5]');

-- --------------------------------------------------------

--
-- Table structure for table `fdm_va_otp`
--

CREATE TABLE `fdm_va_otp` (
  `id` int(5) NOT NULL,
  `mobile_number` bigint(15) NOT NULL,
  `otp` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fdm_va_roles`
--

CREATE TABLE `fdm_va_roles` (
  `id` int(5) NOT NULL,
  `role_name` varchar(55) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fdm_va_roles`
--

INSERT INTO `fdm_va_roles` (`id`, `role_name`, `date`) VALUES
(1, 'Admin', '2018-08-16 00:00:00'),
(2, 'Client', '2018-08-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fdm_va_social_networking`
--

CREATE TABLE `fdm_va_social_networking` (
  `id` int(5) NOT NULL,
  `title` varchar(150) NOT NULL,
  `link` text NOT NULL,
  `icon` text NOT NULL,
  `deleted` int(2) NOT NULL DEFAULT 0,
  `status` varchar(25) NOT NULL DEFAULT 'Active',
  `created_date` date NOT NULL,
  `updated_date` date NOT NULL,
  `created_by` int(10) NOT NULL,
  `updated_by` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fdm_va_sub_modules`
--

CREATE TABLE `fdm_va_sub_modules` (
  `sub_module_id` int(15) NOT NULL,
  `module_id` bigint(10) NOT NULL,
  `sub_module_name` varchar(55) NOT NULL,
  `sub_module_link` varchar(55) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `fdm_va_sub_modules`
--

INSERT INTO `fdm_va_sub_modules` (`sub_module_id`, `module_id`, `sub_module_name`, `sub_module_link`, `date`) VALUES
(1, 1, 'Create', 'agents/create-agent', '2020-02-02 07:44:04'),
(2, 1, 'View', 'agents/all-agents', '2018-08-19 18:30:00'),
(3, 2, 'Main Menu', 'menus/main-menu', '2018-09-24 18:30:00'),
(4, 12, 'create', 'products/create-product', '2019-01-03 18:30:00'),
(5, 12, 'view', 'products', '2019-01-03 18:30:00'),
(6, 4, 'Purchase Orders', 'purchaseorders', '2020-02-07 03:52:14'),
(7, 4, 'Invoice Orders', 'purchaseorders/invoiceOrders', '2020-02-07 03:52:20'),
(8, 12, 'Free Sample Products', 'products/free-sample-products', '2019-01-03 18:30:00'),
(9, 12, 'Categories', 'products/categories', '2019-01-03 18:30:00'),
(13, 15, 'Delivery Once', 'agent-orders/delivery-once-orders', '2019-02-14 18:30:00'),
(14, 15, 'Subscribed', 'agent-orders/subscribed-orders', '2019-02-14 18:30:00'),
(15, 15, 'Free Sample', 'agent-orders/free-sample-orders', '2019-01-03 18:30:00'),
(16, 14, 'Active Orders', 'orders/active-orders', '2019-01-03 18:30:00'),
(17, 15, 'Active Orders', 'agent-orders/active-orders', '2019-01-03 18:30:00'),
(18, 14, 'Cancelled Orders', 'orders/cancelled-orders', '2019-01-03 18:30:00'),
(19, 14, 'Deliverable Quantity', 'orders/deliverable-quantity', '2019-01-03 18:30:00'),
(20, 17, 'Order Products', 'agent-products', '2019-03-16 07:21:05'),
(21, 17, 'Indent Orders', 'agent-products/myorders', '2019-04-05 03:20:37'),
(22, 1, 'Place Orders', 'orders/place-orders', '2019-03-20 05:09:11'),
(23, 1, 'Indent orders', 'orders/agent-orders', '2019-04-05 03:40:47'),
(24, 1, 'Cancelled Orders', 'orders/agent-orders/cancelled-orders', '2019-03-20 06:34:21'),
(25, 13, 'Users', 'users', '2019-03-30 06:47:56'),
(26, 13, 'Users (ANL)', 'users/anl', '2019-03-30 06:47:56'),
(27, 1, 'Update History', 'orders/agent-orders/update-history', '2019-03-20 06:34:21'),
(28, 1, 'Deposit Orders', 'orders/depositOrders', '2019-04-05 03:46:18'),
(29, 17, 'Deposit Orders', 'agent-products/depositOrders', '2019-04-05 04:04:05'),
(30, 14, 'All Orders', 'orders/all-orders', '2019-02-14 18:30:00'),
(31, 14, 'Consumer Orders', 'orders/consumer-orders', '2019-02-14 18:30:00'),
(32, 14, 'Assigned Orders', 'orders/assigned-orders', '2019-01-03 18:30:00'),
(33, 15, 'Delivered Orders', 'agent-orders/delivered-orders', '2019-02-14 18:30:00'),
(34, 15, 'Deliverable Quantity', 'agent-orders/deliverableQuantity', '2019-02-14 18:30:00'),
(35, 14, 'Invoice Orders', 'orders/invoice-orders', '2019-02-14 18:30:00'),
(36, 14, 'Refund Amount', 'orders/Invoiceorders/refundAmount', '2019-02-14 18:30:00'),
(37, 16, 'Product Offers', 'offers/productOffers', '2019-06-28 05:56:23'),
(38, 16, 'Promo Offers', 'offers', '2019-06-28 05:56:23'),
(39, 14, 'Export Orders', 'orders/export-orders', '2019-01-03 18:30:00'),
(40, 20, 'Create', 'vendors/createVendor', '2020-02-02 07:44:23'),
(41, 20, 'View', 'vendors', '2020-02-02 07:44:20');

-- --------------------------------------------------------

--
-- Table structure for table `fdm_va_website_views`
--

CREATE TABLE `fdm_va_website_views` (
  `id` int(15) NOT NULL,
  `ip_address` varchar(35) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL DEFAULT '0',
  `invoice_number` varchar(150) DEFAULT NULL,
  `payment_type` varchar(255) NOT NULL,
  `total_amount` varchar(10) NOT NULL,
  `total_order_amount` varchar(10) NOT NULL COMMENT 'total order amount without gst charges',
  `gst_charges` varchar(10) DEFAULT NULL,
  `deliveryCharges` int(11) NOT NULL,
  `carry_bag_charges` int(11) NOT NULL,
  `savedonthisorder` varchar(100) NOT NULL,
  `discount_amount` varchar(11) NOT NULL,
  `promocode_status` varchar(25) NOT NULL DEFAULT 'Inactive',
  `txn_id` varchar(255) NOT NULL,
  `shipping_address` text NOT NULL,
  `location` int(5) NOT NULL,
  `user_id` varchar(255) NOT NULL COMMENT 'user id',
  `bank_ref_no` varchar(150) NOT NULL,
  `discount_type` varchar(55) DEFAULT NULL,
  `sub_start_date` varchar(55) DEFAULT NULL,
  `sub_end_date` varchar(55) DEFAULT NULL,
  `deliveryonce_date` varchar(55) DEFAULT NULL,
  `date_of_order` datetime NOT NULL,
  `date_of_payment` datetime NOT NULL,
  `cancelledDate` varchar(25) DEFAULT NULL,
  `order_status` varchar(55) NOT NULL DEFAULT 'Pending',
  `delivery_status` varchar(15) NOT NULL DEFAULT 'Pending',
  `assigned_to` varchar(10) DEFAULT NULL,
  `payment_status` varchar(55) NOT NULL DEFAULT 'Pending',
  `deliveryShift` varchar(100) NOT NULL,
  `hasOffer` varchar(50) NOT NULL DEFAULT 'Inactive',
  `remark` varchar(555) NOT NULL,
  `renewal_status` varchar(50) NOT NULL DEFAULT 'Inactive',
  `is_renew` varchar(50) NOT NULL DEFAULT 'Inactive',
  `promo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `order_product_id` int(11) NOT NULL,
  `order_id` varchar(15) NOT NULL,
  `product_id` int(10) DEFAULT NULL,
  `category` varchar(10) DEFAULT NULL,
  `price` varchar(10) NOT NULL,
  `mrp` int(11) NOT NULL,
  `qty` tinyint(3) NOT NULL,
  `gst` int(11) NOT NULL,
  `orderRef` varchar(50) DEFAULT NULL,
  `delivery_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shreeja_users`
--

CREATE TABLE `shreeja_users` (
  `userid` int(11) NOT NULL,
  `user_mobile` varchar(15) NOT NULL,
  `user_otp` varchar(100) NOT NULL,
  `user_location` text NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `alt_number` varchar(15) DEFAULT NULL,
  `user_email` varchar(200) NOT NULL,
  `password` varchar(500) NOT NULL,
  `areanotlisted` varchar(500) NOT NULL,
  `user_city` varchar(100) NOT NULL,
  `user_area` varchar(100) NOT NULL,
  `house_no` varchar(500) NOT NULL,
  `landmark` varchar(500) NOT NULL,
  `area_delivery_status` varchar(25) NOT NULL DEFAULT 'Active',
  `user_locality` varchar(100) NOT NULL,
  `user_current_address` text NOT NULL,
  `user_gps` text NOT NULL,
  `latlong` text NOT NULL,
  `user_status` int(11) NOT NULL,
  `user_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `firebase_token` text NOT NULL,
  `steps_completed` int(11) NOT NULL,
  `referal_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `shreeja_users`
--

INSERT INTO `shreeja_users` (`userid`, `user_mobile`, `user_otp`, `user_location`, `user_name`, `alt_number`, `user_email`, `password`, `areanotlisted`, `user_city`, `user_area`, `house_no`, `landmark`, `area_delivery_status`, `user_locality`, `user_current_address`, `user_gps`, `latlong`, `user_status`, `user_created`, `firebase_token`, `steps_completed`, `referal_code`) VALUES
(1, '8886502502', '9580', '1', 'Veda', '', 'veda2wratha@gmail.com', '871525d3b38bcccc29bb60e9287ecb9eedbaf477e256c10a10d5bf9daaf6d38ad3cf498b73f8c0dd11971f4656aae9ecdc5725ae8d1a90b661408cd4b1452891emSp63CyK/MAmGE4J86S4g==', '', '1', '', '1_64/1', 'near gram panchayat', 'Active', 'Thimmasanipally', '1_64/1, Thimmasanipally, near gram panchayat, MBNR, 500089, Langar House Rd, Narsingi, Hyderabad, Telangana 500075, India', '500089, Langar House Rd, Narsingi, Hyderabad, Telangana 500075, India', '', 0, '2020-05-02 07:30:00', 'fIWTHQf0ptc:APA91bEYIEmqsSchD6G2oHQyx0Hlvv6uNkMXGFvbS5ge_1sKU9rHMXf4Ro4RRXb7HDua7nVBTduuvdbfFt9BBXafIDcxS6uATzEyq26WP_BXCSNZAeKSWqY4KYXXCkUPvez4PIv49MZA', 4, 'WNXUWJFPRO'),
(2, '9553427533', '3461', '1', 'Devavratha', '', 'kammaridevavartha01@gmail.com', 'df1f4a1ba40686d493c66dff33e534616c714a060d941565e7f5fe4c6ce991beae1accccad4c11837e51723995d7626381774ec3647c1c6b192cee017c138e7d3neSDMNNc4fO7MEaVjBiORj2D+/vjK9S', '', '1', '', '1-64/1', 'watertank', 'Active', 'monappagutta', '1-64/1, monappagutta, watertank, MBNR, 1-6-40/5/1 paulsabgutta, Station Rd, New Gunj, Rajendra Nagar, Mahbubnagar, Telangana 509001, India', '1-6-40/5/1 paulsabgutta, Station Rd, New Gunj, Rajendra Nagar, Mahbubnagar, Telangana 509001, India', '', 0, '2020-04-27 05:54:31', 'cjN43jjaEPU:APA91bHaWfw4CIAhA1P40qhJSjnnNS7J0_HrlDIU_X1ZsqK08GwrbBXbpD-DtTRk319RtA6daQY98b2ZUMEpavbn1S9xuB2frdzEnZeDG3_XwXvbFT9tTm7X4vtATrV-VITqOlKq1FgS', 4, '3HWJUGF4OY'),
(6, '6303408852', '0163', '1', 'ravi', '', '', 'dd7a2d6b828f33c4e12d9ae3c2ca42b040cfcbd55146f3683102a12c1fa8f8703480530217e9a9f50c8531a22bbf853a770e8d7502b92e1d852b63b38659a701P/t/dhmTWgZQj6+Ja8BNQ2WYreb/ucZR', '', '1', '', '4-78', '', 'Active', 'ramnagar', '4-78, ramnagar, , MBNR, Unnamed Road, Telangana 508238, India', 'Unnamed Road, Telangana 508238, India', '', 0, '2020-05-05 09:38:02', 'fWB_UCihY8c:APA91bG7ntArOkcZx5T9zvNdTwzlKbShR-MHwltaPivC9ZAKy464BPTVYuitO99UQYQ51h8Qqtp93mtDJXHZZC7aWMskv4iX6Cv-uTXZzqjHHNWBbX7f5j0E2_RcLb4Z9kv3RoTZYaHj', 4, 'UTZLSVVBH1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_areas`
--

CREATE TABLE `tbl_areas` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `area_name` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Active',
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_areas`
--

INSERT INTO `tbl_areas` (`id`, `city_id`, `area_name`, `status`, `created`, `deleted`) VALUES
(1, 1, 'Prashanth Nagar', 'Active', '2020-04-13 14:45:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_cat` varchar(150) NOT NULL,
  `qty` varchar(11) NOT NULL,
  `price` varchar(150) NOT NULL,
  `mrp` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(5) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `brand_name` varchar(500) NOT NULL,
  `image` text NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active',
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `category_name`, `brand_name`, `image`, `status`, `created_date`, `updated_date`, `deleted`) VALUES
(1, 'Vegetables', 'vratha', 'uploads/categories/v1.png', 'Active', '2020-04-25 00:15:35', '2020-05-03 06:36:55', 0),
(2, 'Leafy Vegetables', 'vratha', 'uploads/categories/v3.png', 'Active', '2020-04-25 00:15:57', '2020-05-03 06:24:11', 0),
(3, 'Fruits', 'vratha', 'uploads/categories/Fruits-PNG-HD-Transparent-Fruits-715x715.png', 'Active', '2020-04-25 11:50:52', '2020-05-03 06:17:46', 0),
(4, 'Combos', 'vratha', 'uploads/categories/output-onlinepngtools.png', 'Active', '2020-04-25 11:55:02', '2020-05-03 06:35:46', 0),
(6, 'Dairy products', 'Vratha', 'uploads/categories/hiclipart_com_(11).png', 'Active', '2020-04-27 16:55:23', '2020-04-27 12:46:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_charges`
--

CREATE TABLE `tbl_charges` (
  `id` int(10) NOT NULL,
  `city_id` int(11) NOT NULL,
  `chargeType` varchar(25) NOT NULL,
  `deliveryType` varchar(55) NOT NULL,
  `deliveryCharges` int(11) NOT NULL,
  `cutoffCharges` int(11) NOT NULL,
  `minimumCharges` int(11) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_locations`
--

CREATE TABLE `tbl_locations` (
  `id` int(5) NOT NULL,
  `location` varchar(75) NOT NULL,
  `deliveryCharges` int(11) NOT NULL,
  `cutoffCharges` int(11) NOT NULL,
  `image` text NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `deleted` int(2) NOT NULL DEFAULT 0,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_locations`
--

INSERT INTO `tbl_locations` (`id`, `location`, `deliveryCharges`, `cutoffCharges`, `image`, `status`, `deleted`, `created_date`, `updated_date`) VALUES
(1, 'MBNR', 0, 0, 'uploads/general/locations/f77c4c635298468efb3d7ddc18bc4cca.png', 1, 0, '2020-04-13 00:00:00', '2020-04-13 14:45:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notifications`
--

CREATE TABLE `tbl_notifications` (
  `id` int(50) NOT NULL,
  `notification_type` varchar(50) NOT NULL,
  `user_tokens` longtext NOT NULL,
  `message` text NOT NULL COMMENT 'firebase notification body',
  `title` varchar(150) NOT NULL COMMENT 'firebase notification title',
  `image` text NOT NULL COMMENT 'firebase notification icon',
  `start_date` varchar(50) NOT NULL,
  `end_date` varchar(50) NOT NULL,
  `sendType` varchar(200) NOT NULL COMMENT 'alternate days or weekly once',
  `route` varchar(200) NOT NULL,
  `city` int(11) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_offer_management`
--

CREATE TABLE `tbl_offer_management` (
  `id` int(15) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` varchar(25) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `startDate` varchar(25) NOT NULL,
  `endDate` varchar(25) NOT NULL,
  `city` int(11) NOT NULL,
  `promocode` varchar(25) NOT NULL,
  `order_type` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_price_management`
--

CREATE TABLE `tbl_price_management` (
  `id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `price_management` text NOT NULL,
  `startdate` varchar(30) NOT NULL,
  `enddate` varchar(30) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active',
  `deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(30) NOT NULL,
  `product_id` varchar(25) NOT NULL,
  `hsn_code` varchar(25) NOT NULL,
  `product_name` varchar(550) NOT NULL,
  `product_category` int(11) NOT NULL,
  `product_quantity` text NOT NULL COMMENT 'quantity in ml',
  `description` text NOT NULL,
  `link` varchar(150) NOT NULL,
  `mImages` text NOT NULL,
  `brandname` varchar(500) NOT NULL,
  `target` varchar(20) NOT NULL,
  `location` text NOT NULL,
  `product_image` text NOT NULL,
  `product_banner_image` text NOT NULL,
  `status` varchar(75) NOT NULL DEFAULT 'Active',
  `vendor` varchar(50) NOT NULL,
  `msl` int(11) NOT NULL,
  `tax_class` int(11) NOT NULL,
  `assigned_to` varchar(15) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `product_id`, `hsn_code`, `product_name`, `product_category`, `product_quantity`, `description`, `link`, `mImages`, `brandname`, `target`, `location`, `product_image`, `product_banner_image`, `status`, `vendor`, `msl`, `tax_class`, `assigned_to`, `created_date`, `updated_date`, `deleted`) VALUES
(3, '001', '00', 'Tomato', 1, '{\"quantity\":[\"1kg\"],\"price\":[\"12\"],\"sp\":[\"11\"],\"lcp\":[\"7\"],\"pis\":[\"5\"]}', 'fresh local tomato', '', '[\"uploads\\/products\\/multi\\/IMGBIN_cherry-tomato-lecsxf3-cultivar-auglis-fruit-png_UMr9kJPr.png\"]', 'Vratha', '', '[\"1\"]', 'uploads/products/3151.png', 'uploads/products/banners/IMGBIN_cherry-tomato-lecsxf3-cultivar-auglis-fruit-png_UMr9kJPr.png', 'Active', '1', 5, 5, '', '2020-05-02 20:44:30', '2020-05-02 15:14:30', 0),
(4, '002', '00', 'brinjal', 1, '{\"quantity\":[\"1kg\"],\"price\":[\"18\"],\"sp\":[\"17\"],\"lcp\":[\"22\"],\"pis\":[\"5\"]}', 'fresh local brinjal', '', '[\"uploads\\/products\\/multi\\/IMGBIN_baingan-bharta-eggplant-indian-cuisine-bhaji-chutney-png_5p6R7dEG.png\"]', 'Vratha', '', '[\"1\"]', 'uploads/products/IMGBIN_baingan-bharta-eggplant-indian-cuisine-bhaji-chutney-png_5p6R7dEG.png', 'uploads/products/banners/IMGBIN_baingan-bharta-eggplant-indian-cuisine-bhaji-chutney-png_5p6R7dEG.png', 'Active', '1', 5, 0, '', '2020-04-27 12:54:42', '2020-04-27 07:24:42', 0),
(5, '003', '00', 'Bhendi', 1, '{\"quantity\":[\"1kg\"],\"price\":[\"32\"],\"sp\":[\"31\"],\"lcp\":[\"20\"],\"pis\":[\"5\"]}', 'Local fresh bhendi(bendakaya)', '', '[\"uploads\\/products\\/multi\\/hiclipart.com.png\"]', 'Vratha', '', '[\"1\"]', 'uploads/products/hiclipart.com.png', 'uploads/products/banners/hiclipart.com.png', 'Active', '1', 5, 5, '', '2020-04-27 13:05:38', '2020-04-27 07:35:38', 0),
(6, '004', '00', 'Green chillies', 1, '{\"quantity\":[\"1kg\"],\"price\":[\"32\"],\"sp\":[\"30\"],\"lcp\":[\"20\"],\"pis\":[1]}', 'fresh local chllies(mirchi)', '', '[\"uploads\\/products\\/multi\\/hiclipart.com_(1).png\"]', 'Vratha', '', '[\"1\"]', 'uploads/products/hiclipart.com_(1).png', 'uploads/products/banners/hiclipart.com_(2).png', 'Active', '1', 5, 0, '', '2020-04-27 13:10:36', '2020-05-03 14:40:09', 0),
(7, '005', '00', 'Bitter  Gourd', 1, '{\"quantity\":[\"1kg\"],\"price\":[\"32\"],\"sp\":[\"31\"],\"lcp\":[\"0\"],\"pis\":[\"5\"]}', 'fresh local Bitter Gourd(kakarakaya)', '', '[\"uploads\\/products\\/multi\\/hiclipart.com_(3).png\"]', 'Vratha', '', '[\"1\"]', 'uploads/products/hiclipart.com_(3).png', 'uploads/products/banners/hiclipart.com_(4).png', 'Active', '1', 5, 5, '', '2020-04-28 14:19:44', '2020-04-28 08:49:44', 0),
(8, '006', '00', 'Ribbed Gourd', 1, '{\"quantity\":[\"1kg\"],\"price\":[\"32\"],\"sp\":[\"31\"],\"lcp\":[\"0\"],\"pis\":[\"5\"]}', 'Fresh local ribbed gourd(beerakaya)', '', '[\"uploads\\/products\\/multi\\/hiclipart.com_(5).png\"]', 'Vratha', '', '[\"1\"]', 'uploads/products/hiclipart.com_(5).png', 'uploads/products/banners/hiclipart.com_(6).png', 'Active', '1', 5, 5, '', '2020-04-28 14:19:31', '2020-04-28 08:49:31', 0),
(9, '007', '00', 'Cauliflower', 1, '{\"quantity\":[\"1kg\"],\"price\":[\"32\"],\"sp\":[\"31\"],\"lcp\":[\"0\"],\"pis\":[\"5\"]}', 'Fresh local cauliflower', '', '[\"uploads\\/products\\/multi\\/hiclipart.com_(8).png\"]', 'Vratha', '', '[\"1\"]', 'uploads/products/hiclipart.com_(8).png', 'uploads/products/banners/hiclipart.com_(7).png', 'Active', '1', 5, 5, '', '2020-04-28 14:19:18', '2020-04-28 08:49:18', 0),
(10, '008', '00', 'Cabbage', 1, '{\"quantity\":[\"1kg\"],\"price\":[\"18\"],\"sp\":[\"17\"],\"lcp\":[\"13\"],\"pis\":[\"5\"]}', 'Fresh local cabbage', '', '[\"uploads\\/products\\/multi\\/hiclipart.com_(10).png\"]', 'Vratha', '', '[\"1\"]', 'uploads/products/hiclipart.com_(10).png', 'uploads/products/banners/hiclipart.com_(9).png', 'Active', '1', 5, 0, '', '2020-04-27 16:44:24', '2020-04-27 11:14:24', 0),
(11, '009', '00', 'Amarnath Leaves', 2, '{\"quantity\":[\"5pc\"],\"price\":[\"17\"],\"sp\":[\"16\"],\"lcp\":[\"20\"],\"pis\":[\"5\"]}', 'Fresh local amarnath leaves(thotakura)', '', '[\"uploads\\/products\\/multi\\/hiclipart.com_(13).png\"]', 'Vratha', '', '[\"1\"]', 'uploads/products/hiclipart.com_(13).png', 'uploads/products/banners/hiclipart.com_(12).png', 'Active', '1', 5, 0, '', '2020-04-27 17:08:14', '2020-04-27 11:38:14', 0),
(12, '010', '00', 'Curry leaves', 2, '{\"quantity\":[\"20pc\"],\"price\":[\"12\"],\"sp\":[\"10\"],\"lcp\":[\"6\"],\"pis\":[\"5\"]}', 'Fresh local curry leaves(karivepaku)', '', '[\"uploads\\/products\\/multi\\/hiclipart.com_(14).png\"]', 'Vratha', '', '[\"1\"]', 'uploads/products/hiclipart.com_(14).png', 'uploads/products/banners/hiclipart.com_(15).png', 'Active', '1', 5, 0, '', '2020-04-27 17:13:14', '2020-04-27 11:43:14', 0),
(13, '111', '00', 'Green Apple', 3, '{\"quantity\":[\"1pc\"],\"price\":[\"32\"],\"sp\":[\"30\"],\"lcp\":[\"28\"],\"pis\":[\"5\"]}', 'Fresh green apple', '', '[\"uploads\\/products\\/multi\\/hiclipart.com_(17).png\"]', 'Vratha', '', '[\"1\"]', 'uploads/products/hiclipart.com_(17).png', 'uploads/products/banners/hiclipart.com_(16).png', 'Active', '1', 5, 0, '', '2020-04-27 17:17:01', '2020-04-27 11:47:01', 0),
(14, '112', '00', 'Orange', 3, '{\"quantity\":[\"1pc\"],\"price\":[\"20\"],\"sp\":[\"18\"],\"lcp\":[\"18\"],\"pis\":[\"5\"]}', 'Fresh  Nagpur oranges ', '', '[\"uploads\\/products\\/multi\\/hiclipart.com_(18).png\"]', 'Vratha', '', '[\"\"]', 'uploads/products/hiclipart.com_(18).png', 'uploads/products/banners/hiclipart.com_(19).png', 'Active', '1', 5, 0, '', '2020-04-27 17:21:03', '2020-04-27 11:51:03', 0),
(15, '113', '00', 'Salad', 4, '{\"quantity\":[\"3 pc each\"],\"price\":[\"45\"],\"sp\":[\"43\"],\"lcp\":[\"38\"],\"pis\":[\"5\"]}', 'Fresh local cucmber,carrot and beetot', '', '[\"uploads\\/products\\/multi\\/veggies.jpg\"]', 'Vratha', '', '[\"1\"]', 'uploads/products/veggies.jpg', 'uploads/products/banners/veggies.jpg', 'Active', '1', 5, 5, '', '2020-04-27 17:35:38', '2020-04-27 12:05:38', 0),
(16, '114', '00', 'milk', 6, '{\"quantity\":[\"1ltr\"],\"price\":[\"50\"],\"sp\":[\"48\"],\"lcp\":[\"46\"],\"pis\":[\"5\"]}', 'Fresh milk', '', '[\"uploads\\/products\\/multi\\/hiclipart.com_(20).png\"]', 'Vratha', '', '[\"1\"]', 'uploads/products/hiclipart.com_(20).png', 'uploads/products/banners/hiclipart.com_(20).png', 'Active', '1', 5, 0, '', '2020-04-27 18:14:50', '2020-04-27 12:44:50', 0),
(17, '115', '00', 'Carrrot', 1, '{\"quantity\":[\"1kg\"],\"price\":[\"32\"],\"sp\":[\"30\"],\"lcp\":[\"-\"],\"pis\":[\"5\"]}', 'fresh local carrot', '', '[\"uploads\\/products\\/multi\\/hiclipart.com_(22).png\"]', 'Vratha', '', '[\"1\"]', 'uploads/products/hiclipart.com_(22).png', 'uploads/products/banners/hiclipart.com_(21).png', 'Active', '1', 5, 5, '', '2020-04-28 14:38:43', '2020-04-28 09:08:43', 0),
(18, '116', '00', 'Tindoora/Gherkins', 1, '{\"quantity\":[\"1kg\"],\"price\":[\"32\"],\"sp\":[\"30\"],\"lcp\":[\"-\"],\"pis\":[\"5\"]}', 'Fresh local tindoora(dondakaya)', '', '[\"uploads\\/products\\/multi\\/hiclipart.com_(23).png\"]', 'Vratha', '', '[\"1\"]', 'uploads/products/hiclipart.com_(23).png', 'uploads/products/banners/hiclipart.com_(23).png', 'Active', '1', 5, 0, '', '2020-04-27 18:30:34', '2020-04-27 13:00:34', 0),
(19, '117', '00', 'Potato', 1, '{\"quantity\":[\"1kg\"],\"price\":[\"32\"],\"sp\":[\"30\"],\"lcp\":[\"-\"],\"pis\":[\"5\"]}', 'Fresh local potato(aalugadda)', '', '[\"uploads\\/products\\/multi\\/hiclipart.com_(24).png\"]', 'Vratha', '', '[\"1\"]', 'uploads/products/hiclipart.com_(24).png', 'uploads/products/banners/hiclipart.com_(25).png', 'Active', '1', 5, 0, '', '2020-04-27 18:40:17', '2020-04-27 13:10:17', 0),
(20, '118', '00', 'Onions', 1, '{\"quantity\":[\"1kg\"],\"price\":[\"22\"],\"sp\":[\"20\"],\"lcp\":[\"0\"],\"pis\":[\"5\"]}', 'Fresh local onions(ulligadda)', '', '[\"uploads\\/products\\/multi\\/hiclipart.com_(27).png\"]', 'Vratha', '', '[\"1\"]', 'uploads/products/hiclipart.com_(27).png', 'uploads/products/banners/hiclipart.com_(26).png', 'Active', '1', 5, 5, '', '2020-04-28 14:20:21', '2020-04-28 08:50:21', 0),
(21, '119', '00', 'Beans', 1, '{\"quantity\":[\"1kg\"],\"price\":[\"32\"],\"sp\":[\"30\"],\"lcp\":[\"0\"],\"pis\":[\"5\"]}', 'Fresh local beans', '', '[\"uploads\\/products\\/multi\\/hiclipart.com_(30).png\"]', 'Vratha', '', '[\"1\"]', 'uploads/products/hiclipart.com_(29).png', 'uploads/products/banners/hiclipart.com_(30).png', 'Active', '1', 5, 5, '', '2020-04-28 14:20:03', '2020-04-28 08:50:03', 0),
(22, '120', '00', ' Local Cucumber', 1, '{\"quantity\":[\"1kg\"],\"price\":[\"18\"],\"sp\":[\"15\"],\"lcp\":[\"10\"],\"pis\":[\"5\"]}', 'Fresh local cucumber', '', '[\"uploads\\/products\\/multi\\/hiclipart.com_(31).png\"]', 'Vratha', '', '[\"1\"]', 'uploads/products/hiclipart.com_(31).png', 'uploads/products/banners/hiclipart.com_(31).png', 'Active', '1', 5, 0, '', '2020-04-28 10:17:43', '2020-04-28 04:47:43', 0),
(23, '121', '00', 'Bottle Gourd', 1, '{\"quantity\":[\"1pc\"],\"price\":[\"12\"],\"sp\":[\"10\"],\"lcp\":[\"13\"],\"pis\":[3]}', ' Fresh local bottle gourd', '', '[\"uploads\\/products\\/multi\\/hiclipart.com_(33).png\"]', 'Vratha', '', '[\"1\"]', 'uploads/products/hiclipart.com_(32).png', 'uploads/products/banners/hiclipart.com_(33).png', 'Active', '1', 5, 0, '', '2020-04-28 10:24:02', '2020-05-03 14:40:09', 0),
(24, '122', '00', 'Tamarind', 1, '{\"quantity\":[\"1kg\"],\"price\":[\"140\"],\"sp\":[\"180\"],\"lcp\":[\"-\"],\"pis\":[\"5\"]}', 'Fresh local tamarind', '', '[\"uploads\\/products\\/multi\\/hiclipart.com_(34).png\"]', 'Vratha', '', '[\"1\"]', 'uploads/products/hiclipart.com_(34).png', 'uploads/products/banners/hiclipart.com_(34).png', 'Active', '1', 5, 5, '', '2020-04-28 14:38:18', '2020-04-28 09:08:18', 0),
(25, '123', '00', 'Raw Banana', 1, '{\"quantity\":[\"1pc\"],\"price\":[\"10\"],\"sp\":[\"9\"],\"lcp\":[\"8\"],\"pis\":[\"5\"]}', 'Fresh local raw banana(Aratikaya)', '', '[\"uploads\\/products\\/multi\\/hiclipart.com_(36).png\"]', 'Vratha', '', '[\"1\"]', 'uploads/products/hiclipart.com_(36).png', 'uploads/products/banners/hiclipart.com_(35).png', 'Active', '1', 5, 0, '', '2020-04-28 13:37:53', '2020-04-28 08:07:53', 0),
(26, '124', '00', 'Colacasia', 1, '{\"quantity\":[\"1kg\"],\"price\":[\"42\"],\"sp\":[\"40\"],\"lcp\":[\"40\"],\"pis\":[\"5\"]}', 'Fresh local colocasia(chamagadda)', '', '[\"uploads\\/products\\/multi\\/hiclipart.com_(37).png\"]', 'Vratha', '', '[\"1\"]', 'uploads/products/hiclipart.com_(37).png', 'uploads/products/banners/hiclipart.com_(37).png', 'Active', '1', 5, 5, '', '2020-04-28 13:47:09', '2020-04-28 08:17:09', 0),
(27, '125', '00', 'Drumstick', 1, '{\"quantity\":[\"3 pc \"],\"price\":[\"25\"],\"sp\":[\"23\"],\"lcp\":[\"20\"],\"pis\":[\"5\"]}', 'Fresh local drumstick(munagakada)', '', '[\"uploads\\/products\\/multi\\/hiclipart.com_(39).png\"]', 'Vratha', '', '[\"1\"]', 'uploads/products/hiclipart.com_(39).png', 'uploads/products/banners/hiclipart.com_(38).png', 'Active', '1', 5, 5, '', '2020-04-28 14:17:22', '2020-04-28 08:47:22', 0),
(28, '126', '00', 'Broad Beans', 1, '{\"quantity\":[\"1kg\"],\"price\":[\"50\"],\"sp\":[\"45\"],\"lcp\":[\"40\"],\"pis\":[\"5\"]}', 'Fresh local broad beans(chikkudukaya)', '', '[\"uploads\\/products\\/multi\\/hiclipart.com_(41).png\"]', 'Vratha', '', '[\"1\"]', 'uploads/products/hiclipart.com_(41).png', 'uploads/products/banners/hiclipart.com_(40).png', 'Active', '1', 5, 5, '', '2020-04-29 12:47:19', '2020-04-29 07:17:19', 0),
(29, '127', '00', 'Beetroot', 1, '{\"quantity\":[\"1kg\"],\"price\":[\"32\"],\"sp\":[\"30\"],\"lcp\":[\"-\"],\"pis\":[\"5\"]}', 'Fresh local beetroot(betrot)', '', '[\"uploads\\/products\\/multi\\/hiclipart.com_(42).png\"]', 'Vratha', '', '[\"1\"]', 'uploads/products/hiclipart.com_(42).png', 'uploads/products/banners/hiclipart.com_(43).png', 'Active', '1', 5, 0, '', '2020-04-28 14:14:07', '2020-04-28 08:44:07', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_offers`
--

CREATE TABLE `tbl_product_offers` (
  `id` int(10) NOT NULL,
  `city` int(11) NOT NULL,
  `from_date` varchar(55) NOT NULL,
  `to_date` varchar(20) NOT NULL,
  `promocode` varchar(200) NOT NULL,
  `offerPrice` int(11) NOT NULL,
  `outputProduct` int(11) NOT NULL,
  `outputQty` varchar(20) NOT NULL,
  `cartValue` int(20) NOT NULL,
  `description` text NOT NULL,
  `banner` text NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_orders`
--

CREATE TABLE `tbl_purchase_orders` (
  `id` int(11) NOT NULL,
  `po_id` varchar(100) NOT NULL,
  `invoice_number` varchar(500) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `due_date` varchar(50) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Draft',
  `placedDate` date DEFAULT NULL,
  `completedDate` date DEFAULT NULL,
  `discount` varchar(50) NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase_order_products`
--

CREATE TABLE `tbl_purchase_order_products` (
  `id` int(50) NOT NULL,
  `po_id` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `ask_price` varchar(50) NOT NULL,
  `previous_price` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_referals`
--

CREATE TABLE `tbl_referals` (
  `id` int(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `referal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_referal_rewards`
--

CREATE TABLE `tbl_referal_rewards` (
  `id` int(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reward_points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_notifications`
--

CREATE TABLE `tbl_user_notifications` (
  `id` int(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL COMMENT 'firebase notification body',
  `title` varchar(150) NOT NULL COMMENT 'firebase notification title',
  `image` text NOT NULL COMMENT 'firebase notification icon',
  `status` varchar(25) NOT NULL DEFAULT 'unread',
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_rewards`
--

CREATE TABLE `tbl_user_rewards` (
  `id` int(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reward_points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vendors`
--

CREATE TABLE `tbl_vendors` (
  `id` int(50) NOT NULL,
  `vendor_name` varchar(500) NOT NULL,
  `gstin_number` varchar(150) DEFAULT NULL,
  `mobile_number` varchar(15) DEFAULT NULL,
  `alternate_number` varchar(15) DEFAULT NULL,
  `address` text NOT NULL,
  `bank_account_number` varchar(50) DEFAULT NULL,
  `bank_branch` varchar(150) DEFAULT NULL,
  `bank_ifsc` varchar(50) DEFAULT NULL,
  `email` text NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'Active',
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fdm_va_admin_role_access`
--
ALTER TABLE `fdm_va_admin_role_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fdm_va_auths`
--
ALTER TABLE `fdm_va_auths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fdm_va_contact_queries`
--
ALTER TABLE `fdm_va_contact_queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fdm_va_gallery`
--
ALTER TABLE `fdm_va_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fdm_va_gallery_types`
--
ALTER TABLE `fdm_va_gallery_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fdm_va_general_contact`
--
ALTER TABLE `fdm_va_general_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fdm_va_general_logo`
--
ALTER TABLE `fdm_va_general_logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fdm_va_home_slider_images`
--
ALTER TABLE `fdm_va_home_slider_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fdm_va_ip_addresses`
--
ALTER TABLE `fdm_va_ip_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fdm_va_login_attempts`
--
ALTER TABLE `fdm_va_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fdm_va_login_history`
--
ALTER TABLE `fdm_va_login_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fdm_va_modules`
--
ALTER TABLE `fdm_va_modules`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `fdm_va_options`
--
ALTER TABLE `fdm_va_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fdm_va_otp`
--
ALTER TABLE `fdm_va_otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fdm_va_roles`
--
ALTER TABLE `fdm_va_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fdm_va_social_networking`
--
ALTER TABLE `fdm_va_social_networking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fdm_va_sub_modules`
--
ALTER TABLE `fdm_va_sub_modules`
  ADD PRIMARY KEY (`sub_module_id`);

--
-- Indexes for table `fdm_va_website_views`
--
ALTER TABLE `fdm_va_website_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`),
  ADD KEY `payment_type` (`payment_type`,`total_amount`,`total_order_amount`,`gst_charges`,`deliveryCharges`,`carry_bag_charges`,`savedonthisorder`,`discount_amount`,`promocode_status`,`location`,`user_id`),
  ADD KEY `discount_type` (`discount_type`,`deliveryonce_date`,`date_of_order`,`date_of_payment`,`cancelledDate`,`order_status`,`delivery_status`,`assigned_to`,`payment_status`,`deliveryShift`,`hasOffer`,`renewal_status`,`promo`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`order_product_id`),
  ADD UNIQUE KEY `order_product_id` (`order_product_id`),
  ADD KEY `order_id` (`order_id`,`product_id`,`category`,`price`,`mrp`,`qty`,`gst`,`orderRef`,`delivery_date`);

--
-- Indexes for table `shreeja_users`
--
ALTER TABLE `shreeja_users`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `tbl_areas`
--
ALTER TABLE `tbl_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_charges`
--
ALTER TABLE `tbl_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_locations`
--
ALTER TABLE `tbl_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_offer_management`
--
ALTER TABLE `tbl_offer_management`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `promocode` (`promocode`);

--
-- Indexes for table `tbl_price_management`
--
ALTER TABLE `tbl_price_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`,`vendor`,`msl`);

--
-- Indexes for table `tbl_product_offers`
--
ALTER TABLE `tbl_product_offers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `promocode` (`promocode`);

--
-- Indexes for table `tbl_purchase_orders`
--
ALTER TABLE `tbl_purchase_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vendor_id` (`vendor_id`,`due_date`,`status`,`placedDate`,`completedDate`,`discount`);

--
-- Indexes for table `tbl_purchase_order_products`
--
ALTER TABLE `tbl_purchase_order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `po_id` (`po_id`,`product_id`,`product_name`,`product_category`,`qty`,`ask_price`,`previous_price`);

--
-- Indexes for table `tbl_referals`
--
ALTER TABLE `tbl_referals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_referal_rewards`
--
ALTER TABLE `tbl_referal_rewards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_notifications`
--
ALTER TABLE `tbl_user_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_rewards`
--
ALTER TABLE `tbl_user_rewards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vendors`
--
ALTER TABLE `tbl_vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fdm_va_admin_role_access`
--
ALTER TABLE `fdm_va_admin_role_access`
  MODIFY `id` int(55) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `fdm_va_auths`
--
ALTER TABLE `fdm_va_auths`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `fdm_va_contact_queries`
--
ALTER TABLE `fdm_va_contact_queries`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fdm_va_gallery`
--
ALTER TABLE `fdm_va_gallery`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fdm_va_gallery_types`
--
ALTER TABLE `fdm_va_gallery_types`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fdm_va_general_contact`
--
ALTER TABLE `fdm_va_general_contact`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fdm_va_general_logo`
--
ALTER TABLE `fdm_va_general_logo`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fdm_va_home_slider_images`
--
ALTER TABLE `fdm_va_home_slider_images`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fdm_va_ip_addresses`
--
ALTER TABLE `fdm_va_ip_addresses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fdm_va_login_attempts`
--
ALTER TABLE `fdm_va_login_attempts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fdm_va_login_history`
--
ALTER TABLE `fdm_va_login_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fdm_va_modules`
--
ALTER TABLE `fdm_va_modules`
  MODIFY `module_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `fdm_va_options`
--
ALTER TABLE `fdm_va_options`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fdm_va_otp`
--
ALTER TABLE `fdm_va_otp`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fdm_va_roles`
--
ALTER TABLE `fdm_va_roles`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fdm_va_social_networking`
--
ALTER TABLE `fdm_va_social_networking`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fdm_va_sub_modules`
--
ALTER TABLE `fdm_va_sub_modules`
  MODIFY `sub_module_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `fdm_va_website_views`
--
ALTER TABLE `fdm_va_website_views`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `order_product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shreeja_users`
--
ALTER TABLE `shreeja_users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_areas`
--
ALTER TABLE `tbl_areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_charges`
--
ALTER TABLE `tbl_charges`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_locations`
--
ALTER TABLE `tbl_locations`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_offer_management`
--
ALTER TABLE `tbl_offer_management`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_price_management`
--
ALTER TABLE `tbl_price_management`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_product_offers`
--
ALTER TABLE `tbl_product_offers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_purchase_orders`
--
ALTER TABLE `tbl_purchase_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_purchase_order_products`
--
ALTER TABLE `tbl_purchase_order_products`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_referals`
--
ALTER TABLE `tbl_referals`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_referal_rewards`
--
ALTER TABLE `tbl_referal_rewards`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user_notifications`
--
ALTER TABLE `tbl_user_notifications`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user_rewards`
--
ALTER TABLE `tbl_user_rewards`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_vendors`
--
ALTER TABLE `tbl_vendors`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
