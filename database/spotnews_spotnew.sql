-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 23, 2021 at 11:34 AM
-- Server version: 10.1.41-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spotnews_spotnew`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `source` varchar(255) CHARACTER SET latin1 NOT NULL,
  `source_id` varchar(255) CHARACTER SET latin1 NOT NULL,
  `created_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `updated_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Authenticated', '1', 1585506282),
('Authenticated', '14', 1588503356),
('Master', '1', 1581686094),
('store', '14', 1588503356),
('User', '15', 1589187559),
('User', '16', 1589187615),
('User', '17', 1589187649),
('User', '18', 1589187743),
('User', '19', 1589187850),
('User', '20', 1589187924),
('User', '21', 1589187969),
('User', '22', 1590423211),
('User', '23', 1590423571),
('User', '24', 1590481231),
('User', '25', 1590481291),
('User', '26', 1590481356),
('User', '27', 1590484119),
('User', '28', 1590484356),
('User', '29', 1590490561),
('User', '30', 1590554251),
('User', '31', 1590554426),
('User', '32', 1590751926),
('User', '33', 1590751976),
('User', '34', 1591006765),
('User', '35', 1591092299),
('User', '36', 1591428310);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('*', 2, 'Allow Everything', NULL, NULL, 1581686089, 1581686089),
('admin/auth-session/*', 2, 'Route admin/auth-session/*', NULL, NULL, 1589180453, 1589180453),
('admin/auth-session/create', 2, 'Route admin/auth-session/create', NULL, NULL, 1589180453, 1589180453),
('admin/auth-session/delete', 2, 'Route admin/auth-session/delete', NULL, NULL, 1589180453, 1589180453),
('admin/auth-session/index', 2, 'Route admin/auth-session/index', NULL, NULL, 1589180453, 1589180453),
('admin/auth-session/pdf', 2, 'Route admin/auth-session/pdf', NULL, NULL, 1589180453, 1589180453),
('admin/auth-session/update', 2, 'Route admin/auth-session/update', NULL, NULL, 1589180453, 1589180453),
('admin/auth-session/view', 2, 'Route admin/auth-session/view', NULL, NULL, 1589180453, 1589180453),
('admin/banner/*', 2, 'Route admin/banner/*', NULL, NULL, 1587473431, 1587473431),
('admin/banner/create', 2, 'Route admin/banner/create', NULL, NULL, 1587473737, 1587473737),
('admin/banner/delete', 2, 'Route admin/banner/delete', NULL, NULL, 1587482880, 1587482880),
('admin/banner/index', 2, 'Route admin/banner/index', NULL, NULL, 1587473431, 1587473431),
('admin/banner/pdf', 2, 'Route admin/banner/pdf', NULL, NULL, 1587482880, 1587482880),
('admin/banner/update', 2, 'Route admin/banner/update', NULL, NULL, 1587482880, 1587482880),
('admin/banner/view', 2, 'Route admin/banner/view', NULL, NULL, 1587482880, 1587482880),
('admin/brands/*', 2, 'Route admin/brands/*', NULL, NULL, 1589440802, 1589440802),
('admin/brands/create', 2, 'Route admin/brands/create', NULL, NULL, 1589440900, 1589440900),
('admin/brands/delete', 2, 'Route admin/brands/delete', NULL, NULL, 1590424238, 1590424238),
('admin/brands/index', 2, 'Route admin/brands/index', NULL, NULL, 1589440802, 1589440802),
('admin/brands/pdf', 2, 'Route admin/brands/pdf', NULL, NULL, 1590424238, 1590424238),
('admin/brands/save-as-new', 2, 'Route admin/brands/save-as-new', NULL, NULL, 1589441263, 1589441263),
('admin/brands/update', 2, 'Route admin/brands/update', NULL, NULL, 1589531578, 1589531578),
('admin/brands/view', 2, 'Route admin/brands/view', NULL, NULL, 1589441252, 1589441252),
('admin/business-type/*', 2, 'Route admin/business-type/*', NULL, NULL, 1589447738, 1589447738),
('admin/business-type/create', 2, 'Route admin/business-type/create', NULL, NULL, 1589447747, 1589447747),
('admin/business-type/delete', 2, 'Route admin/business-type/delete', NULL, NULL, 1590424238, 1590424238),
('admin/business-type/index', 2, 'Route admin/business-type/index', NULL, NULL, 1589447738, 1589447738),
('admin/business-type/pdf', 2, 'Route admin/business-type/pdf', NULL, NULL, 1590424238, 1590424238),
('admin/business-type/update', 2, 'Route admin/business-type/update', NULL, NULL, 1590424238, 1590424238),
('admin/business-type/view', 2, 'Route admin/business-type/view', NULL, NULL, 1589448076, 1589448076),
('admin/cashback-transaction/*', 2, 'Route admin/cashback-transaction/*', NULL, NULL, 1589459855, 1589459855),
('admin/cashback-transaction/create', 2, 'Route admin/cashback-transaction/create', NULL, NULL, 1589460321, 1589460321),
('admin/cashback-transaction/delete', 2, 'Route admin/cashback-transaction/delete', NULL, NULL, 1589711867, 1589711867),
('admin/cashback-transaction/index', 2, 'Route admin/cashback-transaction/index', NULL, NULL, 1589459855, 1589459855),
('admin/cashback-transaction/update', 2, 'Route admin/cashback-transaction/update', NULL, NULL, 1590424238, 1590424238),
('admin/cashback-transaction/view', 2, 'Route admin/cashback-transaction/view', NULL, NULL, 1590424238, 1590424238),
('admin/category/*', 2, 'Route admin/category/*', NULL, NULL, 1587304347, 1587304347),
('admin/category/create', 2, 'Route admin/category/create', NULL, NULL, 1587309317, 1587309317),
('admin/category/delete', 2, 'Route admin/category/delete', NULL, NULL, 1587373402, 1587373402),
('admin/category/index', 2, 'Route admin/category/index', NULL, NULL, 1587304347, 1587304347),
('admin/category/pdf', 2, 'Route admin/category/pdf', NULL, NULL, 1587482880, 1587482880),
('admin/category/restore', 2, 'Route admin/category/restore', NULL, NULL, 1590986737, 1590986737),
('admin/category/update', 2, 'Route admin/category/update', NULL, NULL, 1587482880, 1587482880),
('admin/category/update-status', 2, 'Route admin/category/update-status', NULL, NULL, 1589132596, 1589132596),
('admin/category/view', 2, 'Route admin/category/view', NULL, NULL, 1587373312, 1587373312),
('admin/city/*', 2, 'Route admin/city/*', NULL, NULL, 1587304528, 1587304528),
('admin/city/add-delivery-pincode', 2, 'Route admin/city/add-delivery-pincode', NULL, NULL, 1587356401, 1587356401),
('admin/city/add-grocery', 2, 'Route admin/city/add-grocery', NULL, NULL, 1587356414, 1587356414),
('admin/city/create', 2, 'Route admin/city/create', NULL, NULL, 1587309311, 1587309311),
('admin/city/delete', 2, 'Route admin/city/delete', NULL, NULL, 1587482880, 1587482880),
('admin/city/index', 2, 'Route admin/city/index', NULL, NULL, 1587304528, 1587304528),
('admin/city/pdf', 2, 'Route admin/city/pdf', NULL, NULL, 1587357280, 1587357280),
('admin/city/save-as-new', 2, 'Route admin/city/save-as-new', NULL, NULL, 1587482880, 1587482880),
('admin/city/update', 2, 'Route admin/city/update', NULL, NULL, 1587357132, 1587357132),
('admin/city/view', 2, 'Route admin/city/view', NULL, NULL, 1587332580, 1587332580),
('admin/clients-list/*', 2, 'Route admin/clients-list/*', NULL, NULL, 1590424238, 1590424238),
('admin/clients-list/create', 2, 'Route admin/clients-list/create', NULL, NULL, 1590424238, 1590424238),
('admin/clients-list/delete', 2, 'Route admin/clients-list/delete', NULL, NULL, 1590424238, 1590424238),
('admin/clients-list/index', 2, 'Route admin/clients-list/index', NULL, NULL, 1590424238, 1590424238),
('admin/clients-list/update', 2, 'Route admin/clients-list/update', NULL, NULL, 1590424238, 1590424238),
('admin/clients-list/view', 2, 'Route admin/clients-list/view', NULL, NULL, 1590424238, 1590424238),
('admin/coupon/*', 2, 'Route admin/coupon/*', NULL, NULL, 1587482840, 1587482840),
('admin/coupon/add-coupons-applied', 2, 'Route admin/coupon/add-coupons-applied', NULL, NULL, 1587482880, 1587482880),
('admin/coupon/create', 2, 'Route admin/coupon/create', NULL, NULL, 1587482880, 1587482880),
('admin/coupon/delete', 2, 'Route admin/coupon/delete', NULL, NULL, 1587482880, 1587482880),
('admin/coupon/index', 2, 'Route admin/coupon/index', NULL, NULL, 1587482840, 1587482840),
('admin/coupon/pdf', 2, 'Route admin/coupon/pdf', NULL, NULL, 1587482880, 1587482880),
('admin/coupon/save-as-new', 2, 'Route admin/coupon/save-as-new', NULL, NULL, 1590424238, 1590424238),
('admin/coupon/update', 2, 'Route admin/coupon/update', NULL, NULL, 1587482880, 1587482880),
('admin/coupon/view', 2, 'Route admin/coupon/view', NULL, NULL, 1587482880, 1587482880),
('admin/coupons-applied/*', 2, 'Route admin/coupons-applied/*', NULL, NULL, 1587482880, 1587482880),
('admin/coupons-applied/create', 2, 'Route admin/coupons-applied/create', NULL, NULL, 1587482880, 1587482880),
('admin/coupons-applied/delete', 2, 'Route admin/coupons-applied/delete', NULL, NULL, 1587482880, 1587482880),
('admin/coupons-applied/index', 2, 'Route admin/coupons-applied/index', NULL, NULL, 1587482880, 1587482880),
('admin/coupons-applied/pdf', 2, 'Route admin/coupons-applied/pdf', NULL, NULL, 1587482880, 1587482880),
('admin/coupons-applied/update', 2, 'Route admin/coupons-applied/update', NULL, NULL, 1587482880, 1587482880),
('admin/coupons-applied/view', 2, 'Route admin/coupons-applied/view', NULL, NULL, 1587482880, 1587482880),
('admin/customer/*', 2, 'Route admin/customer/*', NULL, NULL, 1585509051, 1585509051),
('admin/customer/create', 2, 'Route admin/customer/create', NULL, NULL, 1585509051, 1585509051),
('admin/customer/delete', 2, 'Route admin/customer/delete', NULL, NULL, 1585509051, 1585509051),
('admin/customer/index', 2, 'Route admin/customer/index', NULL, NULL, 1585509051, 1585509051),
('admin/customer/update', 2, 'Route admin/customer/update', NULL, NULL, 1585509051, 1585509051),
('admin/customer/view', 2, 'Route admin/customer/view', NULL, NULL, 1585509051, 1585509051),
('admin/dashboard/*', 2, 'Route admin/dashboard/*', NULL, NULL, 1581686100, 1581686100),
('admin/dashboard/error', 2, 'Route admin/dashboard/error', NULL, NULL, 1581686100, 1581686100),
('admin/dashboard/index', 2, 'Route admin/dashboard/index', NULL, NULL, 1581686100, 1581686100),
('admin/delivery-address/*', 2, 'Route admin/delivery-address/*', NULL, NULL, 1588185887, 1588185887),
('admin/delivery-address/add-orders', 2, 'Route admin/delivery-address/add-orders', NULL, NULL, 1588185887, 1588185887),
('admin/delivery-address/create', 2, 'Route admin/delivery-address/create', NULL, NULL, 1588185887, 1588185887),
('admin/delivery-address/delete', 2, 'Route admin/delivery-address/delete', NULL, NULL, 1588185887, 1588185887),
('admin/delivery-address/index', 2, 'Route admin/delivery-address/index', NULL, NULL, 1588185887, 1588185887),
('admin/delivery-address/pdf', 2, 'Route admin/delivery-address/pdf', NULL, NULL, 1588185887, 1588185887),
('admin/delivery-address/update', 2, 'Route admin/delivery-address/update', NULL, NULL, 1588185887, 1588185887),
('admin/delivery-address/view', 2, 'Route admin/delivery-address/view', NULL, NULL, 1588185887, 1588185887),
('admin/delivery-charge/*', 2, 'Route admin/delivery-charge/*', NULL, NULL, 1590424238, 1590424238),
('admin/delivery-charge/create', 2, 'Route admin/delivery-charge/create', NULL, NULL, 1590424238, 1590424238),
('admin/delivery-charge/delete', 2, 'Route admin/delivery-charge/delete', NULL, NULL, 1590424238, 1590424238),
('admin/delivery-charge/index', 2, 'Route admin/delivery-charge/index', NULL, NULL, 1590424238, 1590424238),
('admin/delivery-charge/pdf', 2, 'Route admin/delivery-charge/pdf', NULL, NULL, 1590424238, 1590424238),
('admin/delivery-charge/save-as-new', 2, 'Route admin/delivery-charge/save-as-new', NULL, NULL, 1590424238, 1590424238),
('admin/delivery-charge/update', 2, 'Route admin/delivery-charge/update', NULL, NULL, 1590424238, 1590424238),
('admin/delivery-charge/view', 2, 'Route admin/delivery-charge/view', NULL, NULL, 1590424238, 1590424238),
('admin/delivery-pincode/*', 2, 'Route admin/delivery-pincode/*', NULL, NULL, 1587333054, 1587333054),
('admin/delivery-pincode/create', 2, 'Route admin/delivery-pincode/create', NULL, NULL, 1587333064, 1587333064),
('admin/delivery-pincode/delete', 2, 'Route admin/delivery-pincode/delete', NULL, NULL, 1587482880, 1587482880),
('admin/delivery-pincode/index', 2, 'Route admin/delivery-pincode/index', NULL, NULL, 1587333054, 1587333054),
('admin/delivery-pincode/pdf', 2, 'Route admin/delivery-pincode/pdf', NULL, NULL, 1587482880, 1587482880),
('admin/delivery-pincode/save-as-new', 2, 'Route admin/delivery-pincode/save-as-new', NULL, NULL, 1587482880, 1587482880),
('admin/delivery-pincode/update', 2, 'Route admin/delivery-pincode/update', NULL, NULL, 1587482880, 1587482880),
('admin/delivery-pincode/view', 2, 'Route admin/delivery-pincode/view', NULL, NULL, 1587333111, 1587333111),
('admin/email-template/*', 2, 'Route admin/email-template/*', NULL, NULL, 1589185422, 1589185422),
('admin/email-template/create', 2, 'Route admin/email-template/create', NULL, NULL, 1589186893, 1589186893),
('admin/email-template/delete', 2, 'Route admin/email-template/delete', NULL, NULL, 1589186893, 1589186893),
('admin/email-template/index', 2, 'Route admin/email-template/index', NULL, NULL, 1589185422, 1589185422),
('admin/email-template/update', 2, 'Route admin/email-template/update', NULL, NULL, 1589186893, 1589186893),
('admin/email-template/view', 2, 'Route admin/email-template/view', NULL, NULL, 1589186893, 1589186893),
('admin/gc-cart/*', 2, 'Route admin/gc-cart/*', NULL, NULL, 1587482880, 1587482880),
('admin/gc-cart/add-gc-cart-items', 2, 'Route admin/gc-cart/add-gc-cart-items', NULL, NULL, 1587482880, 1587482880),
('admin/gc-cart/create', 2, 'Route admin/gc-cart/create', NULL, NULL, 1587482880, 1587482880),
('admin/gc-cart/delete', 2, 'Route admin/gc-cart/delete', NULL, NULL, 1587482880, 1587482880),
('admin/gc-cart/index', 2, 'Route admin/gc-cart/index', NULL, NULL, 1587482880, 1587482880),
('admin/gc-cart/pdf', 2, 'Route admin/gc-cart/pdf', NULL, NULL, 1587482880, 1587482880),
('admin/gc-cart/save-as-new', 2, 'Route admin/gc-cart/save-as-new', NULL, NULL, 1587482880, 1587482880),
('admin/gc-cart/update', 2, 'Route admin/gc-cart/update', NULL, NULL, 1587482880, 1587482880),
('admin/gc-cart/view', 2, 'Route admin/gc-cart/view', NULL, NULL, 1587482880, 1587482880),
('admin/gc-order-details/*', 2, 'Route admin/gc-order-details/*', NULL, NULL, 1587482881, 1587482881),
('admin/gc-order-details/create', 2, 'Route admin/gc-order-details/create', NULL, NULL, 1587482881, 1587482881),
('admin/gc-order-details/delete', 2, 'Route admin/gc-order-details/delete', NULL, NULL, 1587482881, 1587482881),
('admin/gc-order-details/index', 2, 'Route admin/gc-order-details/index', NULL, NULL, 1587482881, 1587482881),
('admin/gc-order-details/pdf', 2, 'Route admin/gc-order-details/pdf', NULL, NULL, 1587482881, 1587482881),
('admin/gc-order-details/save-as-new', 2, 'Route admin/gc-order-details/save-as-new', NULL, NULL, 1587482881, 1587482881),
('admin/gc-order-details/update', 2, 'Route admin/gc-order-details/update', NULL, NULL, 1587482881, 1587482881),
('admin/gc-order-details/view', 2, 'Route admin/gc-order-details/view', NULL, NULL, 1587482881, 1587482881),
('admin/gc-order-review/*', 2, 'Route admin/gc-order-review/*', NULL, NULL, 1587482881, 1587482881),
('admin/gc-order-review/create', 2, 'Route admin/gc-order-review/create', NULL, NULL, 1587482881, 1587482881),
('admin/gc-order-review/delete', 2, 'Route admin/gc-order-review/delete', NULL, NULL, 1587482881, 1587482881),
('admin/gc-order-review/index', 2, 'Route admin/gc-order-review/index', NULL, NULL, 1587482881, 1587482881),
('admin/gc-order-review/pdf', 2, 'Route admin/gc-order-review/pdf', NULL, NULL, 1587482881, 1587482881),
('admin/gc-order-review/save-as-new', 2, 'Route admin/gc-order-review/save-as-new', NULL, NULL, 1587482881, 1587482881),
('admin/gc-order-review/update', 2, 'Route admin/gc-order-review/update', NULL, NULL, 1587482881, 1587482881),
('admin/gc-order-review/view', 2, 'Route admin/gc-order-review/view', NULL, NULL, 1587482881, 1587482881),
('admin/gc-orders/*', 2, 'Route admin/gc-orders/*', NULL, NULL, 1587482881, 1587482881),
('admin/gc-orders/add-gc-order-details', 2, 'Route admin/gc-orders/add-gc-order-details', NULL, NULL, 1587482881, 1587482881),
('admin/gc-orders/add-gc-order-review', 2, 'Route admin/gc-orders/add-gc-order-review', NULL, NULL, 1587482881, 1587482881),
('admin/gc-orders/assign', 2, 'Route admin/gc-orders/assign', NULL, NULL, 1588761214, 1588761214),
('admin/gc-orders/assign-delivery-boy', 2, 'Route admin/gc-orders/assign-delivery-boy', NULL, NULL, 1588187550, 1588187550),
('admin/gc-orders/cancelled-orders', 2, 'Route admin/gc-orders/cancelled-orders', NULL, NULL, 1588291056, 1588291056),
('admin/gc-orders/create', 2, 'Route admin/gc-orders/create', NULL, NULL, 1587482881, 1587482881),
('admin/gc-orders/delete', 2, 'Route admin/gc-orders/delete', NULL, NULL, 1587482881, 1587482881),
('admin/gc-orders/delivered-orders', 2, 'Route admin/gc-orders/delivered-orders', NULL, NULL, 1588411868, 1588411868),
('admin/gc-orders/dispatch-panel', 2, 'Route admin/gc-orders/dispatch-panel', NULL, NULL, 1588604960, 1588604960),
('admin/gc-orders/get-delivery-boy', 2, 'Route admin/gc-orders/get-delivery-boy', NULL, NULL, 1588185887, 1588185887),
('admin/gc-orders/index', 2, 'Route admin/gc-orders/index', NULL, NULL, 1587482881, 1587482881),
('admin/gc-orders/new-orders', 2, 'Route admin/gc-orders/new-orders', NULL, NULL, 1588290345, 1588290345),
('admin/gc-orders/pdf', 2, 'Route admin/gc-orders/pdf', NULL, NULL, 1587482881, 1587482881),
('admin/gc-orders/pre-orders', 2, 'Route admin/gc-orders/pre-orders', NULL, NULL, 1588290974, 1588290974),
('admin/gc-orders/save-as-new', 2, 'Route admin/gc-orders/save-as-new', NULL, NULL, 1587482881, 1587482881),
('admin/gc-orders/update', 2, 'Route admin/gc-orders/update', NULL, NULL, 1587482881, 1587482881),
('admin/gc-orders/update-invoice', 2, 'Route admin/gc-orders/update-invoice', NULL, NULL, 1588365883, 1588365883),
('admin/gc-orders/update-order-status', 2, 'Route admin/gc-orders/update-order-status', NULL, NULL, 1587943905, 1587943905),
('admin/gc-orders/update-stock', 2, 'Route admin/gc-orders/update-stock', NULL, NULL, 1588361900, 1588361900),
('admin/gc-orders/user-address', 2, 'Route admin/gc-orders/user-address', NULL, NULL, 1587985936, 1587985936),
('admin/gc-orders/view', 2, 'Route admin/gc-orders/view', NULL, NULL, 1587482881, 1587482881),
('admin/gc-product-item-sizes/*', 2, 'Route admin/gc-product-item-sizes/*', NULL, NULL, 1587482881, 1587482881),
('admin/gc-product-item-sizes/add-gc-cart-items', 2, 'Route admin/gc-product-item-sizes/add-gc-cart-items', NULL, NULL, 1587482881, 1587482881),
('admin/gc-product-item-sizes/add-gc-order-details', 2, 'Route admin/gc-product-item-sizes/add-gc-order-details', NULL, NULL, 1587482881, 1587482881),
('admin/gc-product-item-sizes/create', 2, 'Route admin/gc-product-item-sizes/create', NULL, NULL, 1587482881, 1587482881),
('admin/gc-product-item-sizes/delete', 2, 'Route admin/gc-product-item-sizes/delete', NULL, NULL, 1587482881, 1587482881),
('admin/gc-product-item-sizes/editable', 2, 'Route admin/gc-product-item-sizes/editable', NULL, NULL, 1589096640, 1589096640),
('admin/gc-product-item-sizes/import-prices', 2, 'Route admin/gc-product-item-sizes/import-prices', NULL, NULL, 1589267827, 1589267827),
('admin/gc-product-item-sizes/index', 2, 'Route admin/gc-product-item-sizes/index', NULL, NULL, 1587482881, 1587482881),
('admin/gc-product-item-sizes/pdf', 2, 'Route admin/gc-product-item-sizes/pdf', NULL, NULL, 1587482881, 1587482881),
('admin/gc-product-item-sizes/save-as-new', 2, 'Route admin/gc-product-item-sizes/save-as-new', NULL, NULL, 1587482881, 1587482881),
('admin/gc-product-item-sizes/update', 2, 'Route admin/gc-product-item-sizes/update', NULL, NULL, 1587482881, 1587482881),
('admin/gc-product-item-sizes/view', 2, 'Route admin/gc-product-item-sizes/view', NULL, NULL, 1587482881, 1587482881),
('admin/gc-product-items/*', 2, 'Route admin/gc-product-items/*', NULL, NULL, 1587383409, 1587383409),
('admin/gc-product-items/add-gc-cart-items', 2, 'Route admin/gc-product-items/add-gc-cart-items', NULL, NULL, 1587482881, 1587482881),
('admin/gc-product-items/add-gc-order-details', 2, 'Route admin/gc-product-items/add-gc-order-details', NULL, NULL, 1587384053, 1587384053),
('admin/gc-product-items/add-gc-product-item-sizes', 2, 'Route admin/gc-product-items/add-gc-product-item-sizes', NULL, NULL, 1587384059, 1587384059),
('admin/gc-product-items/create', 2, 'Route admin/gc-product-items/create', NULL, NULL, 1587383714, 1587383714),
('admin/gc-product-items/delete', 2, 'Route admin/gc-product-items/delete', NULL, NULL, 1587482881, 1587482881),
('admin/gc-product-items/editable', 2, 'Route admin/gc-product-items/editable', NULL, NULL, 1589074304, 1589074304),
('admin/gc-product-items/editbook', 2, 'Route admin/gc-product-items/editbook', NULL, NULL, 1587596599, 1587596599),
('admin/gc-product-items/index', 2, 'Route admin/gc-product-items/index', NULL, NULL, 1587383409, 1587383409),
('admin/gc-product-items/pdf', 2, 'Route admin/gc-product-items/pdf', NULL, NULL, 1587482881, 1587482881),
('admin/gc-product-items/save-as-new', 2, 'Route admin/gc-product-items/save-as-new', NULL, NULL, 1587482881, 1587482881),
('admin/gc-product-items/update', 2, 'Route admin/gc-product-items/update', NULL, NULL, 1587465290, 1587465290),
('admin/gc-product-items/view', 2, 'Route admin/gc-product-items/view', NULL, NULL, 1587482881, 1587482881),
('admin/gc-product/*', 2, 'Route admin/gc-product/*', NULL, NULL, 1587374361, 1587374361),
('admin/gc-product/add-gc-product-items', 2, 'Route admin/gc-product/add-gc-product-items', NULL, NULL, 1587374703, 1587374703),
('admin/gc-product/create', 2, 'Route admin/gc-product/create', NULL, NULL, 1587374370, 1587374370),
('admin/gc-product/csv-import', 2, 'Route admin/gc-product/csv-import', NULL, NULL, 1589250781, 1589250781),
('admin/gc-product/delete', 2, 'Route admin/gc-product/delete', NULL, NULL, 1587482881, 1587482881),
('admin/gc-product/download', 2, 'Route admin/gc-product/download', NULL, NULL, 1589259930, 1589259930),
('admin/gc-product/editable-demo', 2, 'Route admin/gc-product/editable-demo', NULL, NULL, 1589071293, 1589071293),
('admin/gc-product/editbook', 2, 'Route admin/gc-product/editbook', NULL, NULL, 1587595547, 1587595547),
('admin/gc-product/index', 2, 'Route admin/gc-product/index', NULL, NULL, 1587374361, 1587374361),
('admin/gc-product/pdf', 2, 'Route admin/gc-product/pdf', NULL, NULL, 1587482881, 1587482881),
('admin/gc-product/save-as-new', 2, 'Route admin/gc-product/save-as-new', NULL, NULL, 1587482881, 1587482881),
('admin/gc-product/update', 2, 'Route admin/gc-product/update', NULL, NULL, 1587395632, 1587395632),
('admin/gc-product/view', 2, 'Route admin/gc-product/view', NULL, NULL, 1587394155, 1587394155),
('admin/grocery/*', 2, 'Route admin/grocery/*', NULL, NULL, 1587305033, 1587305033),
('admin/grocery/add-delivery-charge', 2, 'Route admin/grocery/add-delivery-charge', NULL, NULL, 1589437192, 1589437192),
('admin/grocery/add-gc-cart', 2, 'Route admin/grocery/add-gc-cart', NULL, NULL, 1587482881, 1587482881),
('admin/grocery/add-gc-order-review', 2, 'Route admin/grocery/add-gc-order-review', NULL, NULL, 1587482881, 1587482881),
('admin/grocery/add-gc-orders', 2, 'Route admin/grocery/add-gc-orders', NULL, NULL, 1587482881, 1587482881),
('admin/grocery/add-gc-product', 2, 'Route admin/grocery/add-gc-product', NULL, NULL, 1587482881, 1587482881),
('admin/grocery/add-gc-product-items', 2, 'Route admin/grocery/add-gc-product-items', NULL, NULL, 1587482881, 1587482881),
('admin/grocery/add-store-categories', 2, 'Route admin/grocery/add-store-categories', NULL, NULL, 1589141317, 1589141317),
('admin/grocery/add-time-slots', 2, 'Route admin/grocery/add-time-slots', NULL, NULL, 1589180453, 1589180453),
('admin/grocery/create', 2, 'Route admin/grocery/create', NULL, NULL, 1587305054, 1587305054),
('admin/grocery/delete', 2, 'Route admin/grocery/delete', NULL, NULL, 1587482881, 1587482881),
('admin/grocery/index', 2, 'Route admin/grocery/index', NULL, NULL, 1587305033, 1587305033),
('admin/grocery/my-store', 2, 'Route admin/grocery/my-store', NULL, NULL, 1587825301, 1587825301),
('admin/grocery/pdf', 2, 'Route admin/grocery/pdf', NULL, NULL, 1587482881, 1587482881),
('admin/grocery/save-as-new', 2, 'Route admin/grocery/save-as-new', NULL, NULL, 1587482881, 1587482881),
('admin/grocery/update', 2, 'Route admin/grocery/update', NULL, NULL, 1587332770, 1587332770),
('admin/grocery/update-status', 2, 'Route admin/grocery/update-status', NULL, NULL, 1587470976, 1587470976),
('admin/grocery/view', 2, 'Route admin/grocery/view', NULL, NULL, 1587330345, 1587330345),
('admin/membership-user/*', 2, 'Route admin/membership-user/*', NULL, NULL, 1589455245, 1589455245),
('admin/membership-user/create', 2, 'Route admin/membership-user/create', NULL, NULL, 1589455383, 1589455383),
('admin/membership-user/delete', 2, 'Route admin/membership-user/delete', NULL, NULL, 1590424238, 1590424238),
('admin/membership-user/index', 2, 'Route admin/membership-user/index', NULL, NULL, 1589455244, 1589455244),
('admin/membership-user/update', 2, 'Route admin/membership-user/update', NULL, NULL, 1590424238, 1590424238),
('admin/membership-user/view', 2, 'Route admin/membership-user/view', NULL, NULL, 1589455447, 1589455447),
('admin/membership/*', 2, 'Route admin/membership/*', NULL, NULL, 1589453112, 1589453112),
('admin/membership/add-membership-user', 2, 'Route admin/membership/add-membership-user', NULL, NULL, 1590424238, 1590424238),
('admin/membership/create', 2, 'Route admin/membership/create', NULL, NULL, 1589453122, 1589453122),
('admin/membership/delete', 2, 'Route admin/membership/delete', NULL, NULL, 1590424238, 1590424238),
('admin/membership/index', 2, 'Route admin/membership/index', NULL, NULL, 1589453112, 1589453112),
('admin/membership/update', 2, 'Route admin/membership/update', NULL, NULL, 1590424238, 1590424238),
('admin/membership/update-status', 2, 'Route admin/membership/update-status', NULL, NULL, 1589551586, 1589551586),
('admin/membership/view', 2, 'Route admin/membership/view', NULL, NULL, 1589453657, 1589453657),
('admin/notification/*', 2, 'Route admin/notification/*', NULL, NULL, 1589186893, 1589186893),
('admin/notification/create', 2, 'Route admin/notification/create', NULL, NULL, 1589186893, 1589186893),
('admin/notification/delete', 2, 'Route admin/notification/delete', NULL, NULL, 1589186893, 1589186893),
('admin/notification/get-notification', 2, 'Route admin/notification/get-notification', NULL, NULL, 1589707908, 1589707908),
('admin/notification/growl', 2, 'Route admin/notification/growl', NULL, NULL, 1590424238, 1590424238),
('admin/notification/index', 2, 'Route admin/notification/index', NULL, NULL, 1589186893, 1589186893),
('admin/notification/pdf', 2, 'Route admin/notification/pdf', NULL, NULL, 1589186893, 1589186893),
('admin/notification/update', 2, 'Route admin/notification/update', NULL, NULL, 1589186893, 1589186893),
('admin/notification/update-status', 2, 'Route admin/notification/update-status', NULL, NULL, 1590424238, 1590424238),
('admin/notification/view', 2, 'Route admin/notification/view', NULL, NULL, 1589186893, 1589186893),
('admin/order-status/*', 2, 'Route admin/order-status/*', NULL, NULL, 1588140956, 1588140956),
('admin/order-status/create', 2, 'Route admin/order-status/create', NULL, NULL, 1588141043, 1588141043),
('admin/order-status/delete', 2, 'Route admin/order-status/delete', NULL, NULL, 1588141243, 1588141243),
('admin/order-status/index', 2, 'Route admin/order-status/index', NULL, NULL, 1588140956, 1588140956),
('admin/order-status/pdf', 2, 'Route admin/order-status/pdf', NULL, NULL, 1588185887, 1588185887),
('admin/order-status/save-as-new', 2, 'Route admin/order-status/save-as-new', NULL, NULL, 1588143728, 1588143728),
('admin/order-status/update', 2, 'Route admin/order-status/update', NULL, NULL, 1588185887, 1588185887),
('admin/order-status/view', 2, 'Route admin/order-status/view', NULL, NULL, 1588141231, 1588141231),
('admin/rbac/permissions/*', 2, 'Route admin/rbac/permissions/*', NULL, NULL, 1581686122, 1581686122),
('admin/rbac/permissions/add-relation', 2, 'Route admin/rbac/permissions/add-relation', NULL, NULL, 1581686122, 1581686122),
('admin/rbac/permissions/create', 2, 'Route admin/rbac/permissions/create', NULL, NULL, 1581686122, 1581686122),
('admin/rbac/permissions/delete', 2, 'Route admin/rbac/permissions/delete', NULL, NULL, 1581686122, 1581686122),
('admin/rbac/permissions/index', 2, 'Route admin/rbac/permissions/index', NULL, NULL, 1581686122, 1581686122),
('admin/rbac/permissions/remove-relation', 2, 'Route admin/rbac/permissions/remove-relation', NULL, NULL, 1581686122, 1581686122),
('admin/rbac/permissions/scan', 2, 'Route admin/rbac/permissions/scan', NULL, NULL, 1581686122, 1581686122),
('admin/rbac/permissions/update', 2, 'Route admin/rbac/permissions/update', NULL, NULL, 1581686122, 1581686122),
('admin/rbac/roles/*', 2, 'Route admin/rbac/roles/*', NULL, NULL, 1581686122, 1581686122),
('admin/rbac/roles/create', 2, 'Route admin/rbac/roles/create', NULL, NULL, 1581686122, 1581686122),
('admin/rbac/roles/delete', 2, 'Route admin/rbac/roles/delete', NULL, NULL, 1581686122, 1581686122),
('admin/rbac/roles/update', 2, 'Route admin/rbac/roles/update', NULL, NULL, 1581686122, 1581686122),
('admin/settings/*', 2, 'Route admin/settings/*', NULL, NULL, 1581686100, 1581686100),
('admin/settings/app', 2, 'Route admin/settings/app', NULL, NULL, 1581686100, 1581686100),
('admin/time-slots/*', 2, 'Route admin/time-slots/*', NULL, NULL, 1588185887, 1588185887),
('admin/time-slots/add-gc-orders', 2, 'Route admin/time-slots/add-gc-orders', NULL, NULL, 1590424238, 1590424238),
('admin/time-slots/create', 2, 'Route admin/time-slots/create', NULL, NULL, 1588185887, 1588185887),
('admin/time-slots/delete', 2, 'Route admin/time-slots/delete', NULL, NULL, 1588185887, 1588185887),
('admin/time-slots/index', 2, 'Route admin/time-slots/index', NULL, NULL, 1588185887, 1588185887),
('admin/time-slots/pdf', 2, 'Route admin/time-slots/pdf', NULL, NULL, 1588185887, 1588185887),
('admin/time-slots/save-as-new', 2, 'Route admin/time-slots/save-as-new', NULL, NULL, 1588185887, 1588185887),
('admin/time-slots/update', 2, 'Route admin/time-slots/update', NULL, NULL, 1588185887, 1588185887),
('admin/time-slots/view', 2, 'Route admin/time-slots/view', NULL, NULL, 1588185887, 1588185887),
('admin/users/*', 2, 'Route admin/users/*', NULL, NULL, 1581686100, 1581686100),
('admin/users/create', 2, 'Route admin/users/create', NULL, NULL, 1581686100, 1581686100),
('admin/users/delete', 2, 'Route admin/users/delete', NULL, NULL, 1581686100, 1581686100),
('admin/users/delivery-boy', 2, 'Route admin/users/delivery-boy', NULL, NULL, 1589784170, 1589784170),
('admin/users/index', 2, 'Route admin/users/index', NULL, NULL, 1581686100, 1581686100),
('admin/users/rest-users', 2, 'Route admin/users/rest-users', NULL, NULL, 1587482881, 1587482881),
('admin/users/update', 2, 'Route admin/users/update', NULL, NULL, 1581686100, 1581686100),
('admin/users/view', 2, 'Route admin/users/view', NULL, NULL, 1587482881, 1587482881),
('admin/web-setting/*', 2, 'Route admin/web-setting/*', NULL, NULL, 1588670197, 1588670197),
('admin/web-setting/cms', 2, 'Route admin/web-setting/cms', NULL, NULL, 1588674626, 1588674626),
('admin/web-setting/create', 2, 'Route admin/web-setting/create', NULL, NULL, 1588670364, 1588670364),
('admin/web-setting/delete', 2, 'Route admin/web-setting/delete', NULL, NULL, 1588754214, 1588754214),
('admin/web-setting/dispatch', 2, 'Route admin/web-setting/dispatch', NULL, NULL, 1588754214, 1588754214),
('admin/web-setting/index', 2, 'Route admin/web-setting/index', NULL, NULL, 1588670197, 1588670197),
('admin/web-setting/pdf', 2, 'Route admin/web-setting/pdf', NULL, NULL, 1588754214, 1588754214),
('admin/web-setting/save-cms', 2, 'Route admin/web-setting/save-cms', NULL, NULL, 1588674695, 1588674695),
('admin/web-setting/save-cms-image', 2, 'Route admin/web-setting/save-cms-image', NULL, NULL, 1588754214, 1588754214),
('admin/web-setting/update', 2, 'Route admin/web-setting/update', NULL, NULL, 1588673524, 1588673524),
('admin/web-setting/view', 2, 'Route admin/web-setting/view', NULL, NULL, 1588673383, 1588673383),
('administer', 2, 'Access administration panel.', NULL, NULL, 1581686089, 1581686089),
('Administrator', 1, 'Administrator.', NULL, NULL, 1581686089, 1581686089),
('api/default/*', 2, 'Route api/default/*', NULL, NULL, 1587482881, 1587482881),
('api/default/clients', 2, 'Route api/default/clients', NULL, NULL, 1590424238, 1590424238),
('api/default/index', 2, 'Route api/default/index', NULL, NULL, 1587482881, 1587482881),
('api/driver/*', 2, 'Route api/driver/*', NULL, NULL, 1590986737, 1590986737),
('api/driver/delivery-boy-online', 2, 'Route api/driver/delivery-boy-online', NULL, NULL, 1590986737, 1590986737),
('api/driver/driver-login', 2, 'Route api/driver/driver-login', NULL, NULL, 1590986737, 1590986737),
('api/driver/index', 2, 'Route api/driver/index', NULL, NULL, 1590986737, 1590986737),
('api/driver/my-orders', 2, 'Route api/driver/my-orders', NULL, NULL, 1590986737, 1590986737),
('api/driver/my-profile', 2, 'Route api/driver/my-profile', NULL, NULL, 1590986737, 1590986737),
('api/driver/new-orders', 2, 'Route api/driver/new-orders', NULL, NULL, 1590986737, 1590986737),
('api/driver/order-update', 2, 'Route api/driver/order-update', NULL, NULL, 1590986737, 1590986737),
('api/driver/single-order', 2, 'Route api/driver/single-order', NULL, NULL, 1591086108, 1591086108),
('api/driver/stats', 2, 'Route api/driver/stats', NULL, NULL, 1590986737, 1590986737),
('api/order/*', 2, 'Route api/order/*', NULL, NULL, 1590424238, 1590424238),
('api/order/add-address', 2, 'Route api/order/add-address', NULL, NULL, 1590424238, 1590424238),
('api/order/apply-coupon', 2, 'Route api/order/apply-coupon', NULL, NULL, 1590424238, 1590424238),
('api/order/cod', 2, 'Route api/order/cod', NULL, NULL, 1590644633, 1590644633),
('api/order/delivery-fee', 2, 'Route api/order/delivery-fee', NULL, NULL, 1590424238, 1590424238),
('api/order/edit-address', 2, 'Route api/order/edit-address', NULL, NULL, 1590424238, 1590424238),
('api/order/get-address', 2, 'Route api/order/get-address', NULL, NULL, 1590424238, 1590424238),
('api/order/list-coupons', 2, 'Route api/order/list-coupons', NULL, NULL, 1590424238, 1590424238),
('api/order/my-orders', 2, 'Route api/order/my-orders', NULL, NULL, 1590424238, 1590424238),
('api/order/order-details', 2, 'Route api/order/order-details', NULL, NULL, 1590424238, 1590424238),
('api/order/payment', 2, 'Route api/order/payment', NULL, NULL, 1590424238, 1590424238),
('api/order/remove-coupon', 2, 'Route api/order/remove-coupon', NULL, NULL, 1590424238, 1590424238),
('api/order/time-slot', 2, 'Route api/order/time-slot', NULL, NULL, 1590485548, 1590485548),
('api/order/update-cart', 2, 'Route api/order/update-cart', NULL, NULL, 1590424238, 1590424238),
('api/store/*', 2, 'Route api/store/*', NULL, NULL, 1587482881, 1587482881),
('api/store/add-to-cart', 2, 'Route api/store/add-to-cart', NULL, NULL, 1589216731, 1589216731),
('api/store/all-brands', 2, 'Route api/store/all-brands', NULL, NULL, 1590423164, 1590423164),
('api/store/all-categories', 2, 'Route api/store/all-categories', NULL, NULL, 1589798484, 1589798484),
('api/store/decrement-quantity', 2, 'Route api/store/decrement-quantity', NULL, NULL, 1589221361, 1589221361),
('api/store/delete-cart', 2, 'Route api/store/delete-cart', NULL, NULL, 1589219910, 1589219910),
('api/store/featured-stores', 2, 'Route api/store/featured-stores', NULL, NULL, 1589180453, 1589180453),
('api/store/increment-quantity', 2, 'Route api/store/increment-quantity', NULL, NULL, 1589220760, 1589220760),
('api/store/my-cart', 2, 'Route api/store/my-cart', NULL, NULL, 1589218755, 1589218755),
('api/store/near-by-stores', 2, 'Route api/store/near-by-stores', NULL, NULL, 1587482881, 1587482881),
('api/store/popular-stores', 2, 'Route api/store/popular-stores', NULL, NULL, 1589180453, 1589180453),
('api/store/product-items', 2, 'Route api/store/product-items', NULL, NULL, 1589200450, 1589200450),
('api/store/product-items-by-brand', 2, 'Route api/store/product-items-by-brand', NULL, NULL, 1590582111, 1590582111),
('api/store/recently-added', 2, 'Route api/store/recently-added', NULL, NULL, 1590423163, 1590423163),
('api/store/search', 2, 'Route api/store/search', NULL, NULL, 1590424238, 1590424238),
('api/store/store-categories', 2, 'Route api/store/store-categories', NULL, NULL, 1589180453, 1589180453),
('api/store/store-details', 2, 'Route api/store/store-details', NULL, NULL, 1589180453, 1589180453),
('api/store/store-products', 2, 'Route api/store/store-products', NULL, NULL, 1590424238, 1590424238),
('api/store/store-products-by-cat', 2, 'Route api/store/store-products-by-cat', NULL, NULL, 1589199012, 1589199012),
('api/store/time-slots', 2, 'Route api/store/time-slots', NULL, NULL, 1590424238, 1590424238),
('api/user/*', 2, 'Route api/user/*', NULL, NULL, 1587482881, 1587482881),
('api/user/add-delivery-address', 2, 'Route api/user/add-delivery-address', NULL, NULL, 1589180453, 1589180453),
('api/user/banners', 2, 'Route api/user/banners', NULL, NULL, 1589180453, 1589180453),
('api/user/check', 2, 'Route api/user/check', NULL, NULL, 1589193430, 1589193430),
('api/user/check-contact', 2, 'Route api/user/check-contact', NULL, NULL, 1589180844, 1589180844),
('api/user/check-delivery', 2, 'Route api/user/check-delivery', NULL, NULL, 1589180453, 1589180453),
('api/user/check-email', 2, 'Route api/user/check-email', NULL, NULL, 1587482881, 1587482881),
('api/user/forget-password', 2, 'Route api/user/forget-password', NULL, NULL, 1589194378, 1589194378),
('api/user/login', 2, 'Route api/user/login', NULL, NULL, 1589188342, 1589188342),
('api/user/logout', 2, 'Route api/user/logout', NULL, NULL, 1589193430, 1589193430),
('api/user/my-profile', 2, 'Route api/user/my-profile', NULL, NULL, 1589197029, 1589197029),
('api/user/settings', 2, 'Route api/user/settings', NULL, NULL, 1589180424, 1589180424),
('api/user/signup', 2, 'Route api/user/signup', NULL, NULL, 1589186846, 1589186846),
('api/user/update-profile', 2, 'Route api/user/update-profile', NULL, NULL, 1589197029, 1589197029),
('api/user/wallet-credit', 2, 'Route api/user/wallet-credit', NULL, NULL, 1590491820, 1590491820),
('api/user/wallet-sum', 2, 'Route api/user/wallet-sum', NULL, NULL, 1590489768, 1590489768),
('api/user/wallet-transaction', 2, 'Route api/user/wallet-transaction', NULL, NULL, 1590489768, 1590489768),
('auth/*', 2, 'Route auth/*', NULL, NULL, 1581686100, 1581686100),
('auth/login', 2, 'Route auth/login', NULL, NULL, 1581686100, 1581686100),
('auth/logout', 2, 'Route auth/logout', NULL, NULL, 1581686100, 1581686100),
('auth/password-request', 2, 'Route auth/password-request', NULL, NULL, 1581686100, 1581686100),
('auth/password-update', 2, 'Route auth/password-update', NULL, NULL, 1581686100, 1581686100),
('auth/register', 2, 'Route auth/register', NULL, NULL, 1581686100, 1581686100),
('Authenticated', 1, 'Authenticated user.', NULL, NULL, 1581686089, 1581686089),
('backup/default/*', 2, 'Route backup/default/*', NULL, NULL, 1588834208, 1588834208),
('backup/default/index', 2, 'Route backup/default/index', NULL, NULL, 1588834208, 1588834208),
('backuprestore/default/*', 2, 'Route backuprestore/default/*', NULL, NULL, 1589465109, 1589465109),
('backuprestore/default/create', 2, 'Route backuprestore/default/create', NULL, NULL, 1589465127, 1589465127),
('backuprestore/default/index', 2, 'Route backuprestore/default/index', NULL, NULL, 1589465108, 1589465108),
('datecontrol/parse/*', 2, 'Route datecontrol/parse/*', NULL, NULL, 1587332369, 1587332369),
('datecontrol/parse/convert', 2, 'Route datecontrol/parse/convert', NULL, NULL, 1587332369, 1587332369),
('documentation/default/*', 2, 'Route documentation/default/*', NULL, NULL, 1587481618, 1587481618),
('documentation/default/index', 2, 'Route documentation/default/index', NULL, NULL, 1587481618, 1587481618),
('gii1/default/*', 2, 'Route gii1/default/*', NULL, NULL, 1584672145, 1584672145),
('gii1/default/index', 2, 'Route gii1/default/index', NULL, NULL, 1584672145, 1584672145),
('gii1/default/preview', 2, 'Route gii1/default/preview', NULL, NULL, 1585508821, 1585508821),
('gii1/default/view', 2, 'Route gii1/default/view', NULL, NULL, 1585506409, 1585506409),
('gridview/export/*', 2, 'Route gridview/export/*', NULL, NULL, 1587412223, 1587412223),
('gridview/export/download', 2, 'Route gridview/export/download', NULL, NULL, 1587412223, 1587412223),
('grocery/cart-items/*', 2, 'Route grocery/cart-items/*', NULL, NULL, 1587482881, 1587482881),
('grocery/cart-items/create', 2, 'Route grocery/cart-items/create', NULL, NULL, 1587482881, 1587482881),
('grocery/cart-items/delete', 2, 'Route grocery/cart-items/delete', NULL, NULL, 1587482881, 1587482881),
('grocery/cart-items/index', 2, 'Route grocery/cart-items/index', NULL, NULL, 1587482881, 1587482881),
('grocery/cart-items/pdf', 2, 'Route grocery/cart-items/pdf', NULL, NULL, 1587482881, 1587482881),
('grocery/cart-items/update', 2, 'Route grocery/cart-items/update', NULL, NULL, 1587482881, 1587482881),
('grocery/cart-items/view', 2, 'Route grocery/cart-items/view', NULL, NULL, 1587482881, 1587482881),
('grocery/cart/*', 2, 'Route grocery/cart/*', NULL, NULL, 1587482881, 1587482881),
('grocery/cart/create', 2, 'Route grocery/cart/create', NULL, NULL, 1587482881, 1587482881),
('grocery/cart/delete', 2, 'Route grocery/cart/delete', NULL, NULL, 1587482881, 1587482881),
('grocery/cart/index', 2, 'Route grocery/cart/index', NULL, NULL, 1587482881, 1587482881),
('grocery/cart/pdf', 2, 'Route grocery/cart/pdf', NULL, NULL, 1587482881, 1587482881),
('grocery/cart/update', 2, 'Route grocery/cart/update', NULL, NULL, 1587482881, 1587482881),
('grocery/cart/view', 2, 'Route grocery/cart/view', NULL, NULL, 1587482881, 1587482881),
('grocery/category/*', 2, 'Route grocery/category/*', NULL, NULL, 1587482881, 1587482881),
('grocery/category/create', 2, 'Route grocery/category/create', NULL, NULL, 1587482881, 1587482881),
('grocery/category/delete', 2, 'Route grocery/category/delete', NULL, NULL, 1587482881, 1587482881),
('grocery/category/index', 2, 'Route grocery/category/index', NULL, NULL, 1587482881, 1587482881),
('grocery/category/pdf', 2, 'Route grocery/category/pdf', NULL, NULL, 1587482881, 1587482881),
('grocery/category/update', 2, 'Route grocery/category/update', NULL, NULL, 1587482881, 1587482881),
('grocery/category/view', 2, 'Route grocery/category/view', NULL, NULL, 1587482881, 1587482881),
('grocery/default/*', 2, 'Route grocery/default/*', NULL, NULL, 1587357791, 1587357791),
('grocery/default/index', 2, 'Route grocery/default/index', NULL, NULL, 1587357791, 1587357791),
('grocery/delivery-address/*', 2, 'Route grocery/delivery-address/*', NULL, NULL, 1587482881, 1587482881),
('grocery/delivery-address/add-gc-orders', 2, 'Route grocery/delivery-address/add-gc-orders', NULL, NULL, 1587482881, 1587482881),
('grocery/delivery-address/create', 2, 'Route grocery/delivery-address/create', NULL, NULL, 1587482881, 1587482881),
('grocery/delivery-address/delete', 2, 'Route grocery/delivery-address/delete', NULL, NULL, 1587482881, 1587482881),
('grocery/delivery-address/index', 2, 'Route grocery/delivery-address/index', NULL, NULL, 1587482881, 1587482881),
('grocery/delivery-address/pdf', 2, 'Route grocery/delivery-address/pdf', NULL, NULL, 1587482881, 1587482881),
('grocery/delivery-address/update', 2, 'Route grocery/delivery-address/update', NULL, NULL, 1587482881, 1587482881),
('grocery/delivery-address/view', 2, 'Route grocery/delivery-address/view', NULL, NULL, 1587482881, 1587482881),
('grocery/delivery-slots/*', 2, 'Route grocery/delivery-slots/*', NULL, NULL, 1587482881, 1587482881),
('grocery/delivery-slots/create', 2, 'Route grocery/delivery-slots/create', NULL, NULL, 1587482881, 1587482881),
('grocery/delivery-slots/delete', 2, 'Route grocery/delivery-slots/delete', NULL, NULL, 1587482881, 1587482881),
('grocery/delivery-slots/index', 2, 'Route grocery/delivery-slots/index', NULL, NULL, 1587482881, 1587482881),
('grocery/delivery-slots/pdf', 2, 'Route grocery/delivery-slots/pdf', NULL, NULL, 1587482881, 1587482881),
('grocery/delivery-slots/update', 2, 'Route grocery/delivery-slots/update', NULL, NULL, 1587482881, 1587482881),
('grocery/delivery-slots/view', 2, 'Route grocery/delivery-slots/view', NULL, NULL, 1587482881, 1587482881),
('grocery/menu-items/*', 2, 'Route grocery/menu-items/*', NULL, NULL, 1587482881, 1587482881),
('grocery/menu-items/add-gc-menu-item-sizes', 2, 'Route grocery/menu-items/add-gc-menu-item-sizes', NULL, NULL, 1587482881, 1587482881),
('grocery/menu-items/create', 2, 'Route grocery/menu-items/create', NULL, NULL, 1587482881, 1587482881),
('grocery/menu-items/delete', 2, 'Route grocery/menu-items/delete', NULL, NULL, 1587482881, 1587482881),
('grocery/menu-items/index', 2, 'Route grocery/menu-items/index', NULL, NULL, 1587482881, 1587482881),
('grocery/menu-items/pdf', 2, 'Route grocery/menu-items/pdf', NULL, NULL, 1587482881, 1587482881),
('grocery/menu-items/update', 2, 'Route grocery/menu-items/update', NULL, NULL, 1587482881, 1587482881),
('grocery/menu-items/update-menuitem-status', 2, 'Route grocery/menu-items/update-menuitem-status', NULL, NULL, 1587482881, 1587482881),
('grocery/menu-items/view', 2, 'Route grocery/menu-items/view', NULL, NULL, 1587482881, 1587482881),
('grocery/menu/*', 2, 'Route grocery/menu/*', NULL, NULL, 1587482881, 1587482881),
('grocery/menu/add-gc-menu-items', 2, 'Route grocery/menu/add-gc-menu-items', NULL, NULL, 1587482881, 1587482881),
('grocery/menu/category', 2, 'Route grocery/menu/category', NULL, NULL, 1587482881, 1587482881),
('grocery/menu/create', 2, 'Route grocery/menu/create', NULL, NULL, 1587482881, 1587482881),
('grocery/menu/delete', 2, 'Route grocery/menu/delete', NULL, NULL, 1587482881, 1587482881),
('grocery/menu/index', 2, 'Route grocery/menu/index', NULL, NULL, 1587482881, 1587482881),
('grocery/menu/pdf', 2, 'Route grocery/menu/pdf', NULL, NULL, 1587482881, 1587482881),
('grocery/menu/update', 2, 'Route grocery/menu/update', NULL, NULL, 1587482881, 1587482881),
('grocery/menu/update-menu-status', 2, 'Route grocery/menu/update-menu-status', NULL, NULL, 1587482881, 1587482881),
('grocery/menu/view', 2, 'Route grocery/menu/view', NULL, NULL, 1587482881, 1587482881),
('grocery/menuitem-sizes/*', 2, 'Route grocery/menuitem-sizes/*', NULL, NULL, 1587482881, 1587482881),
('grocery/menuitem-sizes/create', 2, 'Route grocery/menuitem-sizes/create', NULL, NULL, 1587482881, 1587482881),
('grocery/menuitem-sizes/delete', 2, 'Route grocery/menuitem-sizes/delete', NULL, NULL, 1587482881, 1587482881),
('grocery/menuitem-sizes/index', 2, 'Route grocery/menuitem-sizes/index', NULL, NULL, 1587482881, 1587482881),
('grocery/menuitem-sizes/pdf', 2, 'Route grocery/menuitem-sizes/pdf', NULL, NULL, 1587482881, 1587482881),
('grocery/menuitem-sizes/update', 2, 'Route grocery/menuitem-sizes/update', NULL, NULL, 1587482881, 1587482881),
('grocery/menuitem-sizes/view', 2, 'Route grocery/menuitem-sizes/view', NULL, NULL, 1587482881, 1587482881),
('grocery/order-details/*', 2, 'Route grocery/order-details/*', NULL, NULL, 1587482881, 1587482881),
('grocery/order-details/create', 2, 'Route grocery/order-details/create', NULL, NULL, 1587482881, 1587482881),
('grocery/order-details/delete', 2, 'Route grocery/order-details/delete', NULL, NULL, 1587482881, 1587482881),
('grocery/order-details/index', 2, 'Route grocery/order-details/index', NULL, NULL, 1587482881, 1587482881),
('grocery/order-details/pdf', 2, 'Route grocery/order-details/pdf', NULL, NULL, 1587482881, 1587482881),
('grocery/order-details/update', 2, 'Route grocery/order-details/update', NULL, NULL, 1587482881, 1587482881),
('grocery/order-details/view', 2, 'Route grocery/order-details/view', NULL, NULL, 1587482881, 1587482881),
('grocery/order-review/*', 2, 'Route grocery/order-review/*', NULL, NULL, 1587482881, 1587482881),
('grocery/order-review/create', 2, 'Route grocery/order-review/create', NULL, NULL, 1587482881, 1587482881),
('grocery/order-review/delete', 2, 'Route grocery/order-review/delete', NULL, NULL, 1587482881, 1587482881),
('grocery/order-review/index', 2, 'Route grocery/order-review/index', NULL, NULL, 1587482881, 1587482881),
('grocery/order-review/pdf', 2, 'Route grocery/order-review/pdf', NULL, NULL, 1587482881, 1587482881),
('grocery/order-review/update', 2, 'Route grocery/order-review/update', NULL, NULL, 1587482881, 1587482881),
('grocery/order-review/view', 2, 'Route grocery/order-review/view', NULL, NULL, 1587482881, 1587482881),
('grocery/orders/*', 2, 'Route grocery/orders/*', NULL, NULL, 1587482881, 1587482881),
('grocery/orders/add-gc-order-details', 2, 'Route grocery/orders/add-gc-order-details', NULL, NULL, 1587482881, 1587482881),
('grocery/orders/add-gc-order-review', 2, 'Route grocery/orders/add-gc-order-review', NULL, NULL, 1587482881, 1587482881),
('grocery/orders/assign-delivery-boy', 2, 'Route grocery/orders/assign-delivery-boy', NULL, NULL, 1587482881, 1587482881),
('grocery/orders/create', 2, 'Route grocery/orders/create', NULL, NULL, 1587482881, 1587482881),
('grocery/orders/delete', 2, 'Route grocery/orders/delete', NULL, NULL, 1587482881, 1587482881),
('grocery/orders/get-delivery-boy', 2, 'Route grocery/orders/get-delivery-boy', NULL, NULL, 1587482881, 1587482881),
('grocery/orders/index', 2, 'Route grocery/orders/index', NULL, NULL, 1587482881, 1587482881),
('grocery/orders/pdf', 2, 'Route grocery/orders/pdf', NULL, NULL, 1587482881, 1587482881),
('grocery/orders/update', 2, 'Route grocery/orders/update', NULL, NULL, 1587482881, 1587482881),
('grocery/orders/update-order-status', 2, 'Route grocery/orders/update-order-status', NULL, NULL, 1587482881, 1587482881),
('grocery/orders/view', 2, 'Route grocery/orders/view', NULL, NULL, 1587482881, 1587482881),
('grocery/storecategory/*', 2, 'Route grocery/storecategory/*', NULL, NULL, 1587482881, 1587482881),
('grocery/storecategory/create', 2, 'Route grocery/storecategory/create', NULL, NULL, 1587482881, 1587482881),
('grocery/storecategory/delete', 2, 'Route grocery/storecategory/delete', NULL, NULL, 1587482881, 1587482881),
('grocery/storecategory/index', 2, 'Route grocery/storecategory/index', NULL, NULL, 1587482881, 1587482881),
('grocery/storecategory/pdf', 2, 'Route grocery/storecategory/pdf', NULL, NULL, 1587482881, 1587482881),
('grocery/storecategory/update', 2, 'Route grocery/storecategory/update', NULL, NULL, 1587482881, 1587482881),
('grocery/storecategory/view', 2, 'Route grocery/storecategory/view', NULL, NULL, 1587482881, 1587482881),
('grocery/sub-category/*', 2, 'Route grocery/sub-category/*', NULL, NULL, 1587482881, 1587482881),
('grocery/sub-category/create', 2, 'Route grocery/sub-category/create', NULL, NULL, 1587482881, 1587482881),
('grocery/sub-category/delete', 2, 'Route grocery/sub-category/delete', NULL, NULL, 1587482881, 1587482881),
('grocery/sub-category/index', 2, 'Route grocery/sub-category/index', NULL, NULL, 1587482881, 1587482881),
('grocery/sub-category/pdf', 2, 'Route grocery/sub-category/pdf', NULL, NULL, 1587482881, 1587482881),
('grocery/sub-category/update', 2, 'Route grocery/sub-category/update', NULL, NULL, 1587482881, 1587482881),
('grocery/sub-category/view', 2, 'Route grocery/sub-category/view', NULL, NULL, 1587482881, 1587482881),
('Guest', 1, 'Usual site visitor.', NULL, NULL, 1581686089, 1581686089),
('Master', 1, 'Has full system access.', NULL, NULL, 1581686089, 1581686089),
('menu/creator/*', 2, 'Route menu/creator/*', NULL, NULL, 1587541477, 1587541477),
('menu/creator/create', 2, 'Route menu/creator/create', NULL, NULL, 1587541480, 1587541480),
('menu/creator/index', 2, 'Route menu/creator/index', NULL, NULL, 1587541476, 1587541476),
('menu/creator/update', 2, 'Route menu/creator/update', NULL, NULL, 1587541488, 1587541488),
('site/*', 2, 'Route site/*', NULL, NULL, 1581686100, 1581686100),
('site/about', 2, 'Route site/about', NULL, NULL, 1581686100, 1581686100),
('site/captcha', 2, 'Route site/captcha', NULL, NULL, 1581686100, 1581686100),
('site/checkout', 2, 'Route site/checkout', NULL, NULL, 1590424238, 1590424238),
('site/contact', 2, 'Route site/contact', NULL, NULL, 1581686100, 1581686100);
INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('site/docs', 2, 'Route site/docs', NULL, NULL, 1588497117, 1588497117),
('site/error', 2, 'Route site/error', NULL, NULL, 1581686100, 1581686100),
('site/index', 2, 'Route site/index', NULL, NULL, 1581686100, 1581686100),
('site/json-schema', 2, 'Route site/json-schema', NULL, NULL, 1588497117, 1588497117),
('site/list-view', 2, 'Route site/list-view', NULL, NULL, 1590424238, 1590424238),
('site/order-details', 2, 'Route site/order-details', NULL, NULL, 1590424238, 1590424238),
('site/restaurant', 2, 'Route site/restaurant', NULL, NULL, 1590424237, 1590424237),
('store', 1, '', NULL, NULL, 1587458583, 1587824406),
('User', 1, 'user', NULL, NULL, 1589187544, 1589187544);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('*', 'admin/auth-session/*'),
('*', 'admin/auth-session/create'),
('*', 'admin/auth-session/delete'),
('*', 'admin/auth-session/index'),
('*', 'admin/auth-session/pdf'),
('*', 'admin/auth-session/update'),
('*', 'admin/auth-session/view'),
('*', 'admin/banner/*'),
('*', 'admin/banner/create'),
('*', 'admin/banner/delete'),
('*', 'admin/banner/index'),
('*', 'admin/banner/pdf'),
('*', 'admin/banner/update'),
('*', 'admin/banner/view'),
('*', 'admin/brands/*'),
('*', 'admin/brands/create'),
('*', 'admin/brands/delete'),
('*', 'admin/brands/index'),
('*', 'admin/brands/pdf'),
('*', 'admin/brands/save-as-new'),
('*', 'admin/brands/update'),
('*', 'admin/brands/view'),
('*', 'admin/business-type/*'),
('*', 'admin/business-type/create'),
('*', 'admin/business-type/delete'),
('*', 'admin/business-type/index'),
('*', 'admin/business-type/pdf'),
('*', 'admin/business-type/update'),
('*', 'admin/business-type/view'),
('*', 'admin/cashback-transaction/*'),
('*', 'admin/cashback-transaction/create'),
('*', 'admin/cashback-transaction/delete'),
('*', 'admin/cashback-transaction/index'),
('*', 'admin/cashback-transaction/update'),
('*', 'admin/cashback-transaction/view'),
('*', 'admin/category/*'),
('*', 'admin/category/create'),
('*', 'admin/category/delete'),
('*', 'admin/category/index'),
('*', 'admin/category/pdf'),
('*', 'admin/category/restore'),
('*', 'admin/category/update'),
('*', 'admin/category/update-status'),
('*', 'admin/category/view'),
('*', 'admin/city/*'),
('*', 'admin/city/add-delivery-pincode'),
('*', 'admin/city/add-grocery'),
('*', 'admin/city/create'),
('*', 'admin/city/delete'),
('*', 'admin/city/index'),
('*', 'admin/city/pdf'),
('*', 'admin/city/save-as-new'),
('*', 'admin/city/update'),
('*', 'admin/city/view'),
('*', 'admin/clients-list/*'),
('*', 'admin/clients-list/create'),
('*', 'admin/clients-list/delete'),
('*', 'admin/clients-list/index'),
('*', 'admin/clients-list/update'),
('*', 'admin/clients-list/view'),
('*', 'admin/coupon/*'),
('*', 'admin/coupon/add-coupons-applied'),
('*', 'admin/coupon/create'),
('*', 'admin/coupon/delete'),
('*', 'admin/coupon/index'),
('*', 'admin/coupon/pdf'),
('*', 'admin/coupon/save-as-new'),
('*', 'admin/coupon/update'),
('*', 'admin/coupon/view'),
('*', 'admin/coupons-applied/*'),
('*', 'admin/coupons-applied/create'),
('*', 'admin/coupons-applied/delete'),
('*', 'admin/coupons-applied/index'),
('*', 'admin/coupons-applied/pdf'),
('*', 'admin/coupons-applied/update'),
('*', 'admin/coupons-applied/view'),
('*', 'admin/customer/*'),
('*', 'admin/customer/create'),
('*', 'admin/customer/delete'),
('*', 'admin/customer/index'),
('*', 'admin/customer/update'),
('*', 'admin/customer/view'),
('*', 'admin/dashboard/*'),
('*', 'admin/dashboard/error'),
('*', 'admin/dashboard/index'),
('*', 'admin/delivery-address/*'),
('*', 'admin/delivery-address/add-orders'),
('*', 'admin/delivery-address/create'),
('*', 'admin/delivery-address/delete'),
('*', 'admin/delivery-address/index'),
('*', 'admin/delivery-address/pdf'),
('*', 'admin/delivery-address/update'),
('*', 'admin/delivery-address/view'),
('*', 'admin/delivery-charge/*'),
('*', 'admin/delivery-charge/create'),
('*', 'admin/delivery-charge/delete'),
('*', 'admin/delivery-charge/index'),
('*', 'admin/delivery-charge/pdf'),
('*', 'admin/delivery-charge/save-as-new'),
('*', 'admin/delivery-charge/update'),
('*', 'admin/delivery-charge/view'),
('*', 'admin/delivery-pincode/*'),
('*', 'admin/delivery-pincode/create'),
('*', 'admin/delivery-pincode/delete'),
('*', 'admin/delivery-pincode/index'),
('*', 'admin/delivery-pincode/pdf'),
('*', 'admin/delivery-pincode/save-as-new'),
('*', 'admin/delivery-pincode/update'),
('*', 'admin/delivery-pincode/view'),
('*', 'admin/email-template/*'),
('*', 'admin/email-template/create'),
('*', 'admin/email-template/delete'),
('*', 'admin/email-template/index'),
('*', 'admin/email-template/update'),
('*', 'admin/email-template/view'),
('*', 'admin/gc-cart/*'),
('*', 'admin/gc-cart/add-gc-cart-items'),
('*', 'admin/gc-cart/create'),
('*', 'admin/gc-cart/delete'),
('*', 'admin/gc-cart/index'),
('*', 'admin/gc-cart/pdf'),
('*', 'admin/gc-cart/save-as-new'),
('*', 'admin/gc-cart/update'),
('*', 'admin/gc-cart/view'),
('*', 'admin/gc-order-details/*'),
('*', 'admin/gc-order-details/create'),
('*', 'admin/gc-order-details/delete'),
('*', 'admin/gc-order-details/index'),
('*', 'admin/gc-order-details/pdf'),
('*', 'admin/gc-order-details/save-as-new'),
('*', 'admin/gc-order-details/update'),
('*', 'admin/gc-order-details/view'),
('*', 'admin/gc-order-review/*'),
('*', 'admin/gc-order-review/create'),
('*', 'admin/gc-order-review/delete'),
('*', 'admin/gc-order-review/index'),
('*', 'admin/gc-order-review/pdf'),
('*', 'admin/gc-order-review/save-as-new'),
('*', 'admin/gc-order-review/update'),
('*', 'admin/gc-order-review/view'),
('*', 'admin/gc-orders/*'),
('*', 'admin/gc-orders/add-gc-order-details'),
('*', 'admin/gc-orders/add-gc-order-review'),
('*', 'admin/gc-orders/assign'),
('*', 'admin/gc-orders/assign-delivery-boy'),
('*', 'admin/gc-orders/cancelled-orders'),
('*', 'admin/gc-orders/create'),
('*', 'admin/gc-orders/delete'),
('*', 'admin/gc-orders/delivered-orders'),
('*', 'admin/gc-orders/dispatch-panel'),
('*', 'admin/gc-orders/get-delivery-boy'),
('*', 'admin/gc-orders/index'),
('*', 'admin/gc-orders/new-orders'),
('*', 'admin/gc-orders/pdf'),
('*', 'admin/gc-orders/pre-orders'),
('*', 'admin/gc-orders/save-as-new'),
('*', 'admin/gc-orders/update'),
('*', 'admin/gc-orders/update-invoice'),
('*', 'admin/gc-orders/update-order-status'),
('*', 'admin/gc-orders/update-stock'),
('*', 'admin/gc-orders/user-address'),
('*', 'admin/gc-orders/view'),
('*', 'admin/gc-product-item-sizes/*'),
('*', 'admin/gc-product-item-sizes/add-gc-cart-items'),
('*', 'admin/gc-product-item-sizes/add-gc-order-details'),
('*', 'admin/gc-product-item-sizes/create'),
('*', 'admin/gc-product-item-sizes/delete'),
('*', 'admin/gc-product-item-sizes/editable'),
('*', 'admin/gc-product-item-sizes/import-prices'),
('*', 'admin/gc-product-item-sizes/index'),
('*', 'admin/gc-product-item-sizes/pdf'),
('*', 'admin/gc-product-item-sizes/save-as-new'),
('*', 'admin/gc-product-item-sizes/update'),
('*', 'admin/gc-product-item-sizes/view'),
('*', 'admin/gc-product-items/*'),
('*', 'admin/gc-product-items/add-gc-cart-items'),
('*', 'admin/gc-product-items/add-gc-order-details'),
('*', 'admin/gc-product-items/add-gc-product-item-sizes'),
('*', 'admin/gc-product-items/create'),
('*', 'admin/gc-product-items/delete'),
('*', 'admin/gc-product-items/editable'),
('*', 'admin/gc-product-items/editbook'),
('*', 'admin/gc-product-items/index'),
('*', 'admin/gc-product-items/pdf'),
('*', 'admin/gc-product-items/save-as-new'),
('*', 'admin/gc-product-items/update'),
('*', 'admin/gc-product-items/view'),
('*', 'admin/gc-product/*'),
('*', 'admin/gc-product/add-gc-product-items'),
('*', 'admin/gc-product/create'),
('*', 'admin/gc-product/csv-import'),
('*', 'admin/gc-product/delete'),
('*', 'admin/gc-product/download'),
('*', 'admin/gc-product/editable-demo'),
('*', 'admin/gc-product/editbook'),
('*', 'admin/gc-product/index'),
('*', 'admin/gc-product/pdf'),
('*', 'admin/gc-product/save-as-new'),
('*', 'admin/gc-product/update'),
('*', 'admin/gc-product/view'),
('*', 'admin/grocery/*'),
('*', 'admin/grocery/add-delivery-charge'),
('*', 'admin/grocery/add-gc-cart'),
('*', 'admin/grocery/add-gc-order-review'),
('*', 'admin/grocery/add-gc-orders'),
('*', 'admin/grocery/add-gc-product'),
('*', 'admin/grocery/add-gc-product-items'),
('*', 'admin/grocery/add-store-categories'),
('*', 'admin/grocery/add-time-slots'),
('*', 'admin/grocery/create'),
('*', 'admin/grocery/delete'),
('*', 'admin/grocery/index'),
('*', 'admin/grocery/my-store'),
('*', 'admin/grocery/pdf'),
('*', 'admin/grocery/save-as-new'),
('*', 'admin/grocery/update'),
('*', 'admin/grocery/update-status'),
('*', 'admin/grocery/view'),
('*', 'admin/membership-user/*'),
('*', 'admin/membership-user/create'),
('*', 'admin/membership-user/delete'),
('*', 'admin/membership-user/index'),
('*', 'admin/membership-user/update'),
('*', 'admin/membership-user/view'),
('*', 'admin/membership/*'),
('*', 'admin/membership/add-membership-user'),
('*', 'admin/membership/create'),
('*', 'admin/membership/delete'),
('*', 'admin/membership/index'),
('*', 'admin/membership/update'),
('*', 'admin/membership/update-status'),
('*', 'admin/membership/view'),
('*', 'admin/notification/*'),
('*', 'admin/notification/create'),
('*', 'admin/notification/delete'),
('*', 'admin/notification/get-notification'),
('*', 'admin/notification/growl'),
('*', 'admin/notification/index'),
('*', 'admin/notification/pdf'),
('*', 'admin/notification/update'),
('*', 'admin/notification/update-status'),
('*', 'admin/notification/view'),
('*', 'admin/order-status/*'),
('*', 'admin/order-status/create'),
('*', 'admin/order-status/delete'),
('*', 'admin/order-status/index'),
('*', 'admin/order-status/pdf'),
('*', 'admin/order-status/save-as-new'),
('*', 'admin/order-status/update'),
('*', 'admin/order-status/view'),
('*', 'admin/rbac/permissions/*'),
('*', 'admin/rbac/permissions/add-relation'),
('*', 'admin/rbac/permissions/create'),
('*', 'admin/rbac/permissions/delete'),
('*', 'admin/rbac/permissions/index'),
('*', 'admin/rbac/permissions/remove-relation'),
('*', 'admin/rbac/permissions/scan'),
('*', 'admin/rbac/permissions/update'),
('*', 'admin/rbac/roles/*'),
('*', 'admin/rbac/roles/create'),
('*', 'admin/rbac/roles/delete'),
('*', 'admin/rbac/roles/update'),
('*', 'admin/settings/*'),
('*', 'admin/settings/app'),
('*', 'admin/time-slots/*'),
('*', 'admin/time-slots/add-gc-orders'),
('*', 'admin/time-slots/create'),
('*', 'admin/time-slots/delete'),
('*', 'admin/time-slots/index'),
('*', 'admin/time-slots/pdf'),
('*', 'admin/time-slots/save-as-new'),
('*', 'admin/time-slots/update'),
('*', 'admin/time-slots/view'),
('*', 'admin/users/*'),
('*', 'admin/users/create'),
('*', 'admin/users/delete'),
('*', 'admin/users/delivery-boy'),
('*', 'admin/users/index'),
('*', 'admin/users/rest-users'),
('*', 'admin/users/update'),
('*', 'admin/users/view'),
('*', 'admin/web-setting/*'),
('*', 'admin/web-setting/cms'),
('*', 'admin/web-setting/create'),
('*', 'admin/web-setting/delete'),
('*', 'admin/web-setting/dispatch'),
('*', 'admin/web-setting/index'),
('*', 'admin/web-setting/pdf'),
('*', 'admin/web-setting/save-cms'),
('*', 'admin/web-setting/save-cms-image'),
('*', 'admin/web-setting/update'),
('*', 'admin/web-setting/view'),
('*', 'administer'),
('*', 'api/default/*'),
('*', 'api/default/clients'),
('*', 'api/default/index'),
('*', 'api/driver/*'),
('*', 'api/driver/delivery-boy-online'),
('*', 'api/driver/driver-login'),
('*', 'api/driver/index'),
('*', 'api/driver/my-orders'),
('*', 'api/driver/my-profile'),
('*', 'api/driver/new-orders'),
('*', 'api/driver/order-update'),
('*', 'api/driver/single-order'),
('*', 'api/driver/stats'),
('*', 'api/order/*'),
('*', 'api/order/add-address'),
('*', 'api/order/apply-coupon'),
('*', 'api/order/cod'),
('*', 'api/order/delivery-fee'),
('*', 'api/order/edit-address'),
('*', 'api/order/get-address'),
('*', 'api/order/list-coupons'),
('*', 'api/order/my-orders'),
('*', 'api/order/order-details'),
('*', 'api/order/payment'),
('*', 'api/order/remove-coupon'),
('*', 'api/order/time-slot'),
('*', 'api/order/update-cart'),
('*', 'api/store/*'),
('*', 'api/store/add-to-cart'),
('*', 'api/store/all-brands'),
('*', 'api/store/all-categories'),
('*', 'api/store/decrement-quantity'),
('*', 'api/store/delete-cart'),
('*', 'api/store/featured-stores'),
('*', 'api/store/increment-quantity'),
('*', 'api/store/my-cart'),
('*', 'api/store/near-by-stores'),
('*', 'api/store/popular-stores'),
('*', 'api/store/product-items'),
('*', 'api/store/product-items-by-brand'),
('*', 'api/store/recently-added'),
('*', 'api/store/search'),
('*', 'api/store/store-categories'),
('*', 'api/store/store-details'),
('*', 'api/store/store-products'),
('*', 'api/store/store-products-by-cat'),
('*', 'api/store/time-slots'),
('*', 'api/user/*'),
('*', 'api/user/add-delivery-address'),
('*', 'api/user/banners'),
('*', 'api/user/check'),
('*', 'api/user/check-contact'),
('*', 'api/user/check-delivery'),
('*', 'api/user/check-email'),
('*', 'api/user/forget-password'),
('*', 'api/user/login'),
('*', 'api/user/logout'),
('*', 'api/user/my-profile'),
('*', 'api/user/settings'),
('*', 'api/user/signup'),
('*', 'api/user/update-profile'),
('*', 'api/user/wallet-credit'),
('*', 'api/user/wallet-sum'),
('*', 'api/user/wallet-transaction'),
('*', 'auth/*'),
('*', 'auth/login'),
('*', 'auth/logout'),
('*', 'auth/password-request'),
('*', 'auth/password-update'),
('*', 'auth/register'),
('*', 'backup/default/*'),
('*', 'backup/default/index'),
('*', 'backuprestore/default/*'),
('*', 'backuprestore/default/create'),
('*', 'backuprestore/default/index'),
('*', 'datecontrol/parse/*'),
('*', 'datecontrol/parse/convert'),
('*', 'documentation/default/*'),
('*', 'documentation/default/index'),
('*', 'gii1/default/*'),
('*', 'gii1/default/index'),
('*', 'gii1/default/preview'),
('*', 'gii1/default/view'),
('*', 'gridview/export/*'),
('*', 'gridview/export/download'),
('*', 'grocery/cart-items/*'),
('*', 'grocery/cart-items/create'),
('*', 'grocery/cart-items/delete'),
('*', 'grocery/cart-items/index'),
('*', 'grocery/cart-items/pdf'),
('*', 'grocery/cart-items/update'),
('*', 'grocery/cart-items/view'),
('*', 'grocery/cart/*'),
('*', 'grocery/cart/create'),
('*', 'grocery/cart/delete'),
('*', 'grocery/cart/index'),
('*', 'grocery/cart/pdf'),
('*', 'grocery/cart/update'),
('*', 'grocery/cart/view'),
('*', 'grocery/category/*'),
('*', 'grocery/category/create'),
('*', 'grocery/category/delete'),
('*', 'grocery/category/index'),
('*', 'grocery/category/pdf'),
('*', 'grocery/category/update'),
('*', 'grocery/category/view'),
('*', 'grocery/default/*'),
('*', 'grocery/default/index'),
('*', 'grocery/delivery-address/*'),
('*', 'grocery/delivery-address/add-gc-orders'),
('*', 'grocery/delivery-address/create'),
('*', 'grocery/delivery-address/delete'),
('*', 'grocery/delivery-address/index'),
('*', 'grocery/delivery-address/pdf'),
('*', 'grocery/delivery-address/update'),
('*', 'grocery/delivery-address/view'),
('*', 'grocery/delivery-slots/*'),
('*', 'grocery/delivery-slots/create'),
('*', 'grocery/delivery-slots/delete'),
('*', 'grocery/delivery-slots/index'),
('*', 'grocery/delivery-slots/pdf'),
('*', 'grocery/delivery-slots/update'),
('*', 'grocery/delivery-slots/view'),
('*', 'grocery/menu-items/*'),
('*', 'grocery/menu-items/add-gc-menu-item-sizes'),
('*', 'grocery/menu-items/create'),
('*', 'grocery/menu-items/delete'),
('*', 'grocery/menu-items/index'),
('*', 'grocery/menu-items/pdf'),
('*', 'grocery/menu-items/update'),
('*', 'grocery/menu-items/update-menuitem-status'),
('*', 'grocery/menu-items/view'),
('*', 'grocery/menu/*'),
('*', 'grocery/menu/add-gc-menu-items'),
('*', 'grocery/menu/category'),
('*', 'grocery/menu/create'),
('*', 'grocery/menu/delete'),
('*', 'grocery/menu/index'),
('*', 'grocery/menu/pdf'),
('*', 'grocery/menu/update'),
('*', 'grocery/menu/update-menu-status'),
('*', 'grocery/menu/view'),
('*', 'grocery/menuitem-sizes/*'),
('*', 'grocery/menuitem-sizes/create'),
('*', 'grocery/menuitem-sizes/delete'),
('*', 'grocery/menuitem-sizes/index'),
('*', 'grocery/menuitem-sizes/pdf'),
('*', 'grocery/menuitem-sizes/update'),
('*', 'grocery/menuitem-sizes/view'),
('*', 'grocery/order-details/*'),
('*', 'grocery/order-details/create'),
('*', 'grocery/order-details/delete'),
('*', 'grocery/order-details/index'),
('*', 'grocery/order-details/pdf'),
('*', 'grocery/order-details/update'),
('*', 'grocery/order-details/view'),
('*', 'grocery/order-review/*'),
('*', 'grocery/order-review/create'),
('*', 'grocery/order-review/delete'),
('*', 'grocery/order-review/index'),
('*', 'grocery/order-review/pdf'),
('*', 'grocery/order-review/update'),
('*', 'grocery/order-review/view'),
('*', 'grocery/orders/*'),
('*', 'grocery/orders/add-gc-order-details'),
('*', 'grocery/orders/add-gc-order-review'),
('*', 'grocery/orders/assign-delivery-boy'),
('*', 'grocery/orders/create'),
('*', 'grocery/orders/delete'),
('*', 'grocery/orders/get-delivery-boy'),
('*', 'grocery/orders/index'),
('*', 'grocery/orders/pdf'),
('*', 'grocery/orders/update'),
('*', 'grocery/orders/update-order-status'),
('*', 'grocery/orders/view'),
('*', 'grocery/storecategory/*'),
('*', 'grocery/storecategory/create'),
('*', 'grocery/storecategory/delete'),
('*', 'grocery/storecategory/index'),
('*', 'grocery/storecategory/pdf'),
('*', 'grocery/storecategory/update'),
('*', 'grocery/storecategory/view'),
('*', 'grocery/sub-category/*'),
('*', 'grocery/sub-category/create'),
('*', 'grocery/sub-category/delete'),
('*', 'grocery/sub-category/index'),
('*', 'grocery/sub-category/pdf'),
('*', 'grocery/sub-category/update'),
('*', 'grocery/sub-category/view'),
('*', 'menu/creator/*'),
('*', 'menu/creator/create'),
('*', 'menu/creator/index'),
('*', 'menu/creator/update'),
('*', 'site/*'),
('*', 'site/about'),
('*', 'site/captcha'),
('*', 'site/checkout'),
('*', 'site/contact'),
('*', 'site/docs'),
('*', 'site/error'),
('*', 'site/index'),
('*', 'site/json-schema'),
('*', 'site/list-view'),
('*', 'site/order-details'),
('*', 'site/restaurant'),
('admin/auth-session/*', 'admin/auth-session/create'),
('admin/auth-session/*', 'admin/auth-session/delete'),
('admin/auth-session/*', 'admin/auth-session/index'),
('admin/auth-session/*', 'admin/auth-session/pdf'),
('admin/auth-session/*', 'admin/auth-session/update'),
('admin/auth-session/*', 'admin/auth-session/view'),
('admin/banner/*', 'admin/banner/delete'),
('admin/banner/*', 'admin/banner/pdf'),
('admin/banner/*', 'admin/banner/update'),
('admin/banner/*', 'admin/banner/view'),
('admin/brands/*', 'admin/brands/delete'),
('admin/brands/*', 'admin/brands/pdf'),
('admin/business-type/*', 'admin/business-type/delete'),
('admin/business-type/*', 'admin/business-type/pdf'),
('admin/business-type/*', 'admin/business-type/update'),
('admin/cashback-transaction/*', 'admin/cashback-transaction/update'),
('admin/cashback-transaction/*', 'admin/cashback-transaction/view'),
('admin/category/*', 'admin/category/pdf'),
('admin/category/*', 'admin/category/restore'),
('admin/category/*', 'admin/category/update'),
('admin/city/*', 'admin/city/delete'),
('admin/city/*', 'admin/city/save-as-new'),
('admin/clients-list/*', 'admin/clients-list/create'),
('admin/clients-list/*', 'admin/clients-list/delete'),
('admin/clients-list/*', 'admin/clients-list/index'),
('admin/clients-list/*', 'admin/clients-list/update'),
('admin/clients-list/*', 'admin/clients-list/view'),
('admin/coupon/*', 'admin/coupon/add-coupons-applied'),
('admin/coupon/*', 'admin/coupon/create'),
('admin/coupon/*', 'admin/coupon/delete'),
('admin/coupon/*', 'admin/coupon/pdf'),
('admin/coupon/*', 'admin/coupon/save-as-new'),
('admin/coupon/*', 'admin/coupon/update'),
('admin/coupon/*', 'admin/coupon/view'),
('admin/coupons-applied/*', 'admin/coupons-applied/create'),
('admin/coupons-applied/*', 'admin/coupons-applied/delete'),
('admin/coupons-applied/*', 'admin/coupons-applied/index'),
('admin/coupons-applied/*', 'admin/coupons-applied/pdf'),
('admin/coupons-applied/*', 'admin/coupons-applied/update'),
('admin/coupons-applied/*', 'admin/coupons-applied/view'),
('admin/customer/*', 'admin/customer/create'),
('admin/customer/*', 'admin/customer/delete'),
('admin/customer/*', 'admin/customer/index'),
('admin/customer/*', 'admin/customer/update'),
('admin/customer/*', 'admin/customer/view'),
('admin/dashboard/*', 'admin/dashboard/error'),
('admin/dashboard/*', 'admin/dashboard/index'),
('admin/delivery-address/*', 'admin/delivery-address/add-orders'),
('admin/delivery-address/*', 'admin/delivery-address/create'),
('admin/delivery-address/*', 'admin/delivery-address/delete'),
('admin/delivery-address/*', 'admin/delivery-address/index'),
('admin/delivery-address/*', 'admin/delivery-address/pdf'),
('admin/delivery-address/*', 'admin/delivery-address/update'),
('admin/delivery-address/*', 'admin/delivery-address/view'),
('admin/delivery-charge/*', 'admin/delivery-charge/create'),
('admin/delivery-charge/*', 'admin/delivery-charge/delete'),
('admin/delivery-charge/*', 'admin/delivery-charge/index'),
('admin/delivery-charge/*', 'admin/delivery-charge/pdf'),
('admin/delivery-charge/*', 'admin/delivery-charge/save-as-new'),
('admin/delivery-charge/*', 'admin/delivery-charge/update'),
('admin/delivery-charge/*', 'admin/delivery-charge/view'),
('admin/delivery-pincode/*', 'admin/delivery-pincode/delete'),
('admin/delivery-pincode/*', 'admin/delivery-pincode/pdf'),
('admin/delivery-pincode/*', 'admin/delivery-pincode/save-as-new'),
('admin/delivery-pincode/*', 'admin/delivery-pincode/update'),
('admin/email-template/*', 'admin/email-template/create'),
('admin/email-template/*', 'admin/email-template/delete'),
('admin/email-template/*', 'admin/email-template/update'),
('admin/email-template/*', 'admin/email-template/view'),
('admin/gc-cart/*', 'admin/gc-cart/add-gc-cart-items'),
('admin/gc-cart/*', 'admin/gc-cart/create'),
('admin/gc-cart/*', 'admin/gc-cart/delete'),
('admin/gc-cart/*', 'admin/gc-cart/index'),
('admin/gc-cart/*', 'admin/gc-cart/pdf'),
('admin/gc-cart/*', 'admin/gc-cart/save-as-new'),
('admin/gc-cart/*', 'admin/gc-cart/update'),
('admin/gc-cart/*', 'admin/gc-cart/view'),
('admin/gc-order-details/*', 'admin/gc-order-details/create'),
('admin/gc-order-details/*', 'admin/gc-order-details/delete'),
('admin/gc-order-details/*', 'admin/gc-order-details/index'),
('admin/gc-order-details/*', 'admin/gc-order-details/pdf'),
('admin/gc-order-details/*', 'admin/gc-order-details/save-as-new'),
('admin/gc-order-details/*', 'admin/gc-order-details/update'),
('admin/gc-order-details/*', 'admin/gc-order-details/view'),
('admin/gc-order-review/*', 'admin/gc-order-review/create'),
('admin/gc-order-review/*', 'admin/gc-order-review/delete'),
('admin/gc-order-review/*', 'admin/gc-order-review/index'),
('admin/gc-order-review/*', 'admin/gc-order-review/pdf'),
('admin/gc-order-review/*', 'admin/gc-order-review/save-as-new'),
('admin/gc-order-review/*', 'admin/gc-order-review/update'),
('admin/gc-order-review/*', 'admin/gc-order-review/view'),
('admin/gc-orders/*', 'admin/gc-orders/add-gc-order-details'),
('admin/gc-orders/*', 'admin/gc-orders/add-gc-order-review'),
('admin/gc-orders/*', 'admin/gc-orders/create'),
('admin/gc-orders/*', 'admin/gc-orders/delete'),
('admin/gc-orders/*', 'admin/gc-orders/get-delivery-boy'),
('admin/gc-orders/*', 'admin/gc-orders/index'),
('admin/gc-orders/*', 'admin/gc-orders/pdf'),
('admin/gc-orders/*', 'admin/gc-orders/save-as-new'),
('admin/gc-orders/*', 'admin/gc-orders/update'),
('admin/gc-orders/*', 'admin/gc-orders/view'),
('admin/gc-product-item-sizes/*', 'admin/gc-product-item-sizes/add-gc-cart-items'),
('admin/gc-product-item-sizes/*', 'admin/gc-product-item-sizes/add-gc-order-details'),
('admin/gc-product-item-sizes/*', 'admin/gc-product-item-sizes/create'),
('admin/gc-product-item-sizes/*', 'admin/gc-product-item-sizes/delete'),
('admin/gc-product-item-sizes/*', 'admin/gc-product-item-sizes/index'),
('admin/gc-product-item-sizes/*', 'admin/gc-product-item-sizes/pdf'),
('admin/gc-product-item-sizes/*', 'admin/gc-product-item-sizes/save-as-new'),
('admin/gc-product-item-sizes/*', 'admin/gc-product-item-sizes/update'),
('admin/gc-product-item-sizes/*', 'admin/gc-product-item-sizes/view'),
('admin/gc-product-items/*', 'admin/gc-product-items/add-gc-cart-items'),
('admin/gc-product-items/*', 'admin/gc-product-items/delete'),
('admin/gc-product-items/*', 'admin/gc-product-items/pdf'),
('admin/gc-product-items/*', 'admin/gc-product-items/save-as-new'),
('admin/gc-product-items/*', 'admin/gc-product-items/view'),
('admin/gc-product/*', 'admin/gc-product/csv-import'),
('admin/gc-product/*', 'admin/gc-product/delete'),
('admin/gc-product/*', 'admin/gc-product/editbook'),
('admin/gc-product/*', 'admin/gc-product/pdf'),
('admin/gc-product/*', 'admin/gc-product/save-as-new'),
('admin/grocery/*', 'admin/grocery/add-gc-cart'),
('admin/grocery/*', 'admin/grocery/add-gc-order-review'),
('admin/grocery/*', 'admin/grocery/add-gc-orders'),
('admin/grocery/*', 'admin/grocery/add-gc-product'),
('admin/grocery/*', 'admin/grocery/add-gc-product-items'),
('admin/grocery/*', 'admin/grocery/add-time-slots'),
('admin/grocery/*', 'admin/grocery/delete'),
('admin/grocery/*', 'admin/grocery/my-store'),
('admin/grocery/*', 'admin/grocery/pdf'),
('admin/grocery/*', 'admin/grocery/save-as-new'),
('admin/membership-user/*', 'admin/membership-user/delete'),
('admin/membership-user/*', 'admin/membership-user/update'),
('admin/membership/*', 'admin/membership/add-membership-user'),
('admin/membership/*', 'admin/membership/delete'),
('admin/membership/*', 'admin/membership/update'),
('admin/notification/*', 'admin/notification/create'),
('admin/notification/*', 'admin/notification/delete'),
('admin/notification/*', 'admin/notification/growl'),
('admin/notification/*', 'admin/notification/index'),
('admin/notification/*', 'admin/notification/pdf'),
('admin/notification/*', 'admin/notification/update'),
('admin/notification/*', 'admin/notification/update-status'),
('admin/notification/*', 'admin/notification/view'),
('admin/order-status/*', 'admin/order-status/pdf'),
('admin/order-status/*', 'admin/order-status/update'),
('admin/rbac/permissions/*', 'admin/rbac/permissions/add-relation'),
('admin/rbac/permissions/*', 'admin/rbac/permissions/create'),
('admin/rbac/permissions/*', 'admin/rbac/permissions/delete'),
('admin/rbac/permissions/*', 'admin/rbac/permissions/index'),
('admin/rbac/permissions/*', 'admin/rbac/permissions/remove-relation'),
('admin/rbac/permissions/*', 'admin/rbac/permissions/scan'),
('admin/rbac/permissions/*', 'admin/rbac/permissions/update'),
('admin/rbac/roles/*', 'admin/rbac/roles/create'),
('admin/rbac/roles/*', 'admin/rbac/roles/delete'),
('admin/rbac/roles/*', 'admin/rbac/roles/update'),
('admin/settings/*', 'admin/settings/app'),
('admin/time-slots/*', 'admin/time-slots/add-gc-orders'),
('admin/time-slots/*', 'admin/time-slots/create'),
('admin/time-slots/*', 'admin/time-slots/delete'),
('admin/time-slots/*', 'admin/time-slots/index'),
('admin/time-slots/*', 'admin/time-slots/pdf'),
('admin/time-slots/*', 'admin/time-slots/save-as-new'),
('admin/time-slots/*', 'admin/time-slots/update'),
('admin/time-slots/*', 'admin/time-slots/view'),
('admin/users/*', 'admin/users/create'),
('admin/users/*', 'admin/users/delete'),
('admin/users/*', 'admin/users/index'),
('admin/users/*', 'admin/users/rest-users'),
('admin/users/*', 'admin/users/update'),
('admin/users/*', 'admin/users/view'),
('admin/web-setting/*', 'admin/web-setting/delete'),
('admin/web-setting/*', 'admin/web-setting/dispatch'),
('admin/web-setting/*', 'admin/web-setting/pdf'),
('admin/web-setting/*', 'admin/web-setting/save-cms-image'),
('Administrator', 'administer'),
('Administrator', 'api/driver/*'),
('Administrator', 'api/order/*'),
('Administrator', 'api/order/cod'),
('Administrator', 'api/store/*'),
('Administrator', 'api/store/all-brands'),
('Administrator', 'api/store/all-categories'),
('Administrator', 'api/store/product-items-by-brand'),
('Administrator', 'api/store/recently-added'),
('api/default/*', 'api/default/clients'),
('api/default/*', 'api/default/index'),
('api/driver/*', 'api/driver/delivery-boy-online'),
('api/driver/*', 'api/driver/driver-login'),
('api/driver/*', 'api/driver/index'),
('api/driver/*', 'api/driver/my-orders'),
('api/driver/*', 'api/driver/my-profile'),
('api/driver/*', 'api/driver/new-orders'),
('api/driver/*', 'api/driver/order-update'),
('api/driver/*', 'api/driver/single-order'),
('api/driver/*', 'api/driver/stats'),
('api/order/*', 'api/order/add-address'),
('api/order/*', 'api/order/apply-coupon'),
('api/order/*', 'api/order/delivery-fee'),
('api/order/*', 'api/order/edit-address'),
('api/order/*', 'api/order/get-address'),
('api/order/*', 'api/order/list-coupons'),
('api/order/*', 'api/order/my-orders'),
('api/order/*', 'api/order/order-details'),
('api/order/*', 'api/order/payment'),
('api/order/*', 'api/order/remove-coupon'),
('api/order/*', 'api/order/time-slot'),
('api/order/*', 'api/order/update-cart'),
('api/store/*', 'api/store/add-to-cart'),
('api/store/*', 'api/store/featured-stores'),
('api/store/*', 'api/store/increment-quantity'),
('api/store/*', 'api/store/my-cart'),
('api/store/*', 'api/store/near-by-stores'),
('api/store/*', 'api/store/popular-stores'),
('api/store/*', 'api/store/search'),
('api/store/*', 'api/store/store-categories'),
('api/store/*', 'api/store/store-details'),
('api/store/*', 'api/store/store-products'),
('api/store/*', 'api/store/store-products-by-cat'),
('api/store/*', 'api/store/time-slots'),
('api/user/*', 'api/user/add-delivery-address'),
('api/user/*', 'api/user/banners'),
('api/user/*', 'api/user/check'),
('api/user/*', 'api/user/check-contact'),
('api/user/*', 'api/user/check-delivery'),
('api/user/*', 'api/user/check-email'),
('api/user/*', 'api/user/forget-password'),
('api/user/*', 'api/user/logout'),
('api/user/*', 'api/user/my-profile'),
('api/user/*', 'api/user/update-profile'),
('api/user/*', 'api/user/wallet-credit'),
('api/user/*', 'api/user/wallet-sum'),
('api/user/*', 'api/user/wallet-transaction'),
('auth/*', 'auth/login'),
('auth/*', 'auth/logout'),
('auth/*', 'auth/password-request'),
('auth/*', 'auth/password-update'),
('auth/*', 'auth/register'),
('Authenticated', 'api/driver/*'),
('Authenticated', 'api/order/*'),
('Authenticated', 'api/order/cod'),
('Authenticated', 'api/store/*'),
('Authenticated', 'api/store/all-brands'),
('Authenticated', 'api/store/all-categories'),
('Authenticated', 'api/store/product-items-by-brand'),
('Authenticated', 'api/store/recently-added'),
('grocery/cart-items/*', 'grocery/cart-items/create'),
('grocery/cart-items/*', 'grocery/cart-items/delete'),
('grocery/cart-items/*', 'grocery/cart-items/index'),
('grocery/cart-items/*', 'grocery/cart-items/pdf'),
('grocery/cart-items/*', 'grocery/cart-items/update'),
('grocery/cart-items/*', 'grocery/cart-items/view'),
('grocery/cart/*', 'grocery/cart/create'),
('grocery/cart/*', 'grocery/cart/delete'),
('grocery/cart/*', 'grocery/cart/index'),
('grocery/cart/*', 'grocery/cart/pdf'),
('grocery/cart/*', 'grocery/cart/update'),
('grocery/cart/*', 'grocery/cart/view'),
('grocery/category/*', 'grocery/category/create'),
('grocery/category/*', 'grocery/category/delete'),
('grocery/category/*', 'grocery/category/index'),
('grocery/category/*', 'grocery/category/pdf'),
('grocery/category/*', 'grocery/category/update'),
('grocery/category/*', 'grocery/category/view'),
('grocery/delivery-address/*', 'grocery/delivery-address/add-gc-orders'),
('grocery/delivery-address/*', 'grocery/delivery-address/create'),
('grocery/delivery-address/*', 'grocery/delivery-address/delete'),
('grocery/delivery-address/*', 'grocery/delivery-address/index'),
('grocery/delivery-address/*', 'grocery/delivery-address/pdf'),
('grocery/delivery-address/*', 'grocery/delivery-address/update'),
('grocery/delivery-address/*', 'grocery/delivery-address/view'),
('grocery/delivery-slots/*', 'grocery/delivery-slots/create'),
('grocery/delivery-slots/*', 'grocery/delivery-slots/delete'),
('grocery/delivery-slots/*', 'grocery/delivery-slots/index'),
('grocery/delivery-slots/*', 'grocery/delivery-slots/pdf'),
('grocery/delivery-slots/*', 'grocery/delivery-slots/update'),
('grocery/delivery-slots/*', 'grocery/delivery-slots/view'),
('grocery/menu-items/*', 'grocery/menu-items/add-gc-menu-item-sizes'),
('grocery/menu-items/*', 'grocery/menu-items/create'),
('grocery/menu-items/*', 'grocery/menu-items/delete'),
('grocery/menu-items/*', 'grocery/menu-items/index'),
('grocery/menu-items/*', 'grocery/menu-items/pdf'),
('grocery/menu-items/*', 'grocery/menu-items/update'),
('grocery/menu-items/*', 'grocery/menu-items/update-menuitem-status'),
('grocery/menu-items/*', 'grocery/menu-items/view'),
('grocery/menu/*', 'grocery/menu/add-gc-menu-items'),
('grocery/menu/*', 'grocery/menu/category'),
('grocery/menu/*', 'grocery/menu/create'),
('grocery/menu/*', 'grocery/menu/delete'),
('grocery/menu/*', 'grocery/menu/index'),
('grocery/menu/*', 'grocery/menu/pdf'),
('grocery/menu/*', 'grocery/menu/update'),
('grocery/menu/*', 'grocery/menu/update-menu-status'),
('grocery/menu/*', 'grocery/menu/view'),
('grocery/menuitem-sizes/*', 'grocery/menuitem-sizes/create'),
('grocery/menuitem-sizes/*', 'grocery/menuitem-sizes/delete'),
('grocery/menuitem-sizes/*', 'grocery/menuitem-sizes/index'),
('grocery/menuitem-sizes/*', 'grocery/menuitem-sizes/pdf'),
('grocery/menuitem-sizes/*', 'grocery/menuitem-sizes/update'),
('grocery/menuitem-sizes/*', 'grocery/menuitem-sizes/view'),
('grocery/order-details/*', 'grocery/order-details/create'),
('grocery/order-details/*', 'grocery/order-details/delete'),
('grocery/order-details/*', 'grocery/order-details/index'),
('grocery/order-details/*', 'grocery/order-details/pdf'),
('grocery/order-details/*', 'grocery/order-details/update'),
('grocery/order-details/*', 'grocery/order-details/view'),
('grocery/order-review/*', 'grocery/order-review/create'),
('grocery/order-review/*', 'grocery/order-review/delete'),
('grocery/order-review/*', 'grocery/order-review/index'),
('grocery/order-review/*', 'grocery/order-review/pdf'),
('grocery/order-review/*', 'grocery/order-review/update'),
('grocery/order-review/*', 'grocery/order-review/view'),
('grocery/orders/*', 'grocery/orders/add-gc-order-details'),
('grocery/orders/*', 'grocery/orders/add-gc-order-review'),
('grocery/orders/*', 'grocery/orders/assign-delivery-boy'),
('grocery/orders/*', 'grocery/orders/create'),
('grocery/orders/*', 'grocery/orders/delete'),
('grocery/orders/*', 'grocery/orders/get-delivery-boy'),
('grocery/orders/*', 'grocery/orders/index'),
('grocery/orders/*', 'grocery/orders/pdf'),
('grocery/orders/*', 'grocery/orders/update'),
('grocery/orders/*', 'grocery/orders/update-order-status'),
('grocery/orders/*', 'grocery/orders/view'),
('grocery/storecategory/*', 'grocery/storecategory/create'),
('grocery/storecategory/*', 'grocery/storecategory/delete'),
('grocery/storecategory/*', 'grocery/storecategory/index'),
('grocery/storecategory/*', 'grocery/storecategory/pdf'),
('grocery/storecategory/*', 'grocery/storecategory/update'),
('grocery/storecategory/*', 'grocery/storecategory/view'),
('grocery/sub-category/*', 'grocery/sub-category/create'),
('grocery/sub-category/*', 'grocery/sub-category/delete'),
('grocery/sub-category/*', 'grocery/sub-category/index'),
('grocery/sub-category/*', 'grocery/sub-category/pdf'),
('grocery/sub-category/*', 'grocery/sub-category/update'),
('grocery/sub-category/*', 'grocery/sub-category/view'),
('Guest', 'api/driver/*'),
('Guest', 'api/order/*'),
('Guest', 'api/order/cod'),
('Guest', 'api/store/*'),
('Guest', 'api/store/all-brands'),
('Guest', 'api/store/all-categories'),
('Guest', 'api/store/decrement-quantity'),
('Guest', 'api/store/delete-cart'),
('Guest', 'api/store/product-items'),
('Guest', 'api/store/product-items-by-brand'),
('Guest', 'api/store/recently-added'),
('Guest', 'api/user/*'),
('Guest', 'api/user/login'),
('Guest', 'api/user/settings'),
('Guest', 'api/user/signup'),
('Master', '*'),
('site/*', 'site/about'),
('site/*', 'site/captcha'),
('site/*', 'site/checkout'),
('site/*', 'site/contact'),
('site/*', 'site/docs'),
('site/*', 'site/error'),
('site/*', 'site/index'),
('site/*', 'site/json-schema'),
('site/*', 'site/list-view'),
('site/*', 'site/order-details'),
('site/*', 'site/restaurant'),
('store', 'admin/banner/create'),
('store', 'admin/banner/index'),
('store', 'admin/dashboard/*'),
('store', 'admin/gc-order-review/index'),
('store', 'admin/gc-order-review/view'),
('store', 'admin/gc-orders/*'),
('store', 'admin/gc-orders/index'),
('store', 'admin/gc-orders/new-orders'),
('store', 'admin/gc-orders/pre-orders'),
('store', 'admin/gc-orders/update-order-status'),
('store', 'admin/gc-orders/update-stock'),
('store', 'admin/gc-product/create'),
('store', 'admin/gc-product/index'),
('store', 'admin/gc-product/update'),
('store', 'admin/gc-product/view'),
('store', 'admin/grocery/my-store'),
('store', 'administer'),
('store', 'api/driver/*'),
('store', 'api/order/*'),
('store', 'api/order/cod'),
('store', 'api/store/*'),
('store', 'api/store/all-brands'),
('store', 'api/store/all-categories'),
('store', 'api/store/product-items-by-brand'),
('store', 'api/store/recently-added'),
('store', 'api/user/*'),
('store', 'api/user/settings'),
('User', 'api/driver/*'),
('User', 'api/order/*'),
('User', 'api/order/cod'),
('User', 'api/store/*'),
('User', 'api/store/all-brands'),
('User', 'api/store/all-categories'),
('User', 'api/store/decrement-quantity'),
('User', 'api/store/delete-cart'),
('User', 'api/store/product-items'),
('User', 'api/store/product-items-by-brand'),
('User', 'api/store/recently-added');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_session`
--

CREATE TABLE `auth_session` (
  `id` int(11) NOT NULL,
  `auth_code` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `device_token` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type_id` int(11) DEFAULT '0',
  `create_user_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `auth_session`
--

INSERT INTO `auth_session` (`id`, `auth_code`, `device_token`, `type_id`, `create_user_id`, `created_on`, `updated_on`) VALUES
(1, 'agbhhjusywuiwkkkjskdjskjd', '123456', 0, 2, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `sortOrder` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `updated_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `title`, `category_id`, `image_url`, `sortOrder`, `status`, `created_date`, `updated_date`, `create_user_id`, `updated_user_id`) VALUES
(4, 'Testing banner', 1, 'https://res.cloudinary.com/duevaviby/image/upload/v1621329600/Group_19963_lixkcr.png', 1, 1, '2021-05-18 12:28:07', '2021-05-18 12:28:07', 1, 1),
(5, 'Testing banner1', 3, 'https://res.cloudinary.com/duevaviby/image/upload/v1621329674/Group_19962_diuds9.png', 2, 1, '2021-05-18 12:28:41', '2021-05-18 12:28:41', 1, 1),
(6, 'testing banner3', 5, 'https://res.cloudinary.com/duevaviby/image/upload/v1621329603/Group_19932_x0miyl.png', 3, 1, '2021-05-18 12:29:42', '2021-05-18 12:29:42', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `description` text,
  `image_url` varchar(255) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `sortOrder` int(11) DEFAULT NULL,
  `language_type` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `updated_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `slug`, `description`, `image_url`, `type`, `sortOrder`, `language_type`, `status`, `created_date`, `updated_date`, `create_user_id`, `updated_user_id`) VALUES
(1, 'Crime', 'crime', 'Hello', 'https://res.cloudinary.com/duevaviby/image/upload/v1621329560/Group_19930_cljzjw.png', 1, 1, 1, 1, '2021-04-26 19:29:35', '2021-05-18 11:53:11', 1, 1),
(2, 'National', 'national', 'Hello', 'https://res.cloudinary.com/duevaviby/image/upload/v1621329511/Group_19912_lguxhu.png', 1, 2, 1, 1, '2021-05-18 11:30:16', '2021-05-18 12:03:04', 1, 1),
(3, 'Politics', 'politics', 'test', 'https://res.cloudinary.com/duevaviby/image/upload/v1621329548/Group_19920_vjwuek.png', 1, 1, 1, 1, '2021-05-18 11:31:41', '2021-05-18 12:02:12', 1, 1),
(4, 'Sports ', 'sports-', 'sports ', 'https://res.cloudinary.com/duevaviby/image/upload/v1621329563/Group_19929_rn0dqk.png', 1, 3, 1, 1, '2021-05-18 11:32:38', '2021-05-18 11:58:03', 1, 1),
(5, 'Corona', 'corona', 'Corona', 'https://res.cloudinary.com/duevaviby/image/upload/v1621329520/Group_19916_luovkp.png', 1, 4, 1, 1, '2021-05-18 11:33:25', '2021-05-18 11:56:54', 1, 1),
(6, 'Education', 'education', 'Education', 'https://res.cloudinary.com/duevaviby/image/upload/v1621329551/Group_19919_paujiz.png', 1, 5, 1, 1, '2021-05-18 11:33:59', '2021-05-18 11:56:04', 1, 1),
(7, 'Technology ', 'technology-', 'Technology ', 'https://res.cloudinary.com/duevaviby/image/upload/v1621329554/Group_19917_pqyzx2.png', 1, 6, 1, 1, '2021-05-18 11:34:32', '2021-05-18 11:55:11', 1, 1),
(8, 'Health and Fitness', 'health-and-fitness', 'Health and Fitness', 'https://res.cloudinary.com/duevaviby/image/upload/v1621329558/Group_19928_fzwhiu.png', 1, 7, 1, 1, '2021-05-18 11:35:23', '2021-05-18 11:53:54', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_news`
--

CREATE TABLE `category_news` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `updated_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `category_news`
--

INSERT INTO `category_news` (`id`, `category_id`, `news_id`, `status`, `created_date`, `updated_date`, `create_user_id`, `updated_user_id`) VALUES
(5, 5, 1, NULL, '2021-05-18 12:25:25', '2021-05-18 12:25:25', 1, 1),
(6, 2, 1, NULL, '2021-05-18 12:25:25', '2021-05-18 12:25:25', 1, 1),
(7, 1, 3, NULL, '2021-05-18 12:29:30', '2021-05-18 12:29:30', 1, 1),
(8, 2, 2, NULL, '2021-05-18 12:33:51', '2021-05-18 12:33:51', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `comments` text,
  `language_type` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `updated_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `constitutes`
--

CREATE TABLE `constitutes` (
  `id` int(11) NOT NULL,
  `dist_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `language_type` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `updated_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `constitutes`
--

INSERT INTO `constitutes` (`id`, `dist_id`, `title`, `image_url`, `type_id`, `language_type`, `status`, `created_date`, `updated_date`, `create_user_id`, `updated_user_id`) VALUES
(1, 1, 'Serlingampally', '', 1, 2, 1, '2021-05-01 11:58:24', '2021-05-01 11:58:24', 1, 1),
(2, 1, 'Rajendranagar', '', 1, 2, 1, '2021-05-01 11:59:01', '2021-05-01 11:59:01', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `language_type` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `updated_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `state_id`, `title`, `image_url`, `type_id`, `language_type`, `status`, `created_date`, `updated_date`, `create_user_id`, `updated_user_id`) VALUES
(1, 1, 'Rangareddy', '', 1, 2, 1, '2021-05-01 11:57:16', '2021-05-01 11:57:16', 1, 1),
(2, 1, 'Medchal', '', 1, 2, 1, '2021-05-01 11:57:16', '2021-05-01 11:57:16', 1, 1),
(3, 1, 'Sangareddy', '', 1, 2, 1, '2021-05-01 11:57:16', '2021-05-01 11:57:16', 1, 1),
(4, 1, 'Medak', '', 1, 2, 1, '2021-05-01 11:57:16', '2021-05-01 11:57:16', 1, 1),
(5, 1, 'Siddipet', '', 1, 2, 1, '2021-05-01 11:57:16', '2021-05-01 11:57:16', 1, 1),
(6, 1, 'Nizamabad', '', 1, 2, 1, '2021-05-01 11:57:16', '2021-05-01 11:57:16', 1, 1),
(7, 1, 'Nalgonda', '', 1, 2, 1, '2021-05-01 11:57:16', '2021-05-01 11:57:16', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `language_code` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `updated_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `title`, `language_code`, `image`, `status`, `created_date`, `updated_date`, `create_user_id`, `updated_user_id`) VALUES
(1, 'English	', 'en', '', 1, '2021-05-01 10:53:37', '2021-05-01 10:53:37', 1, 1),
(2, 'Telugu	', 'te', '', 1, '2021-05-01 10:56:17', '2021-05-01 10:56:17', 1, 1),
(3, 'Hindi	', 'hi', '', 1, '2021-05-01 10:57:53', '2021-05-01 10:57:53', 1, 1),
(4, 'Urdu', 'Ur', '', 1, '2021-05-04 11:02:09', '2021-05-04 11:02:09', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) CHARACTER SET utf8mb4 NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  `is_deleted` int(11) NOT NULL,
  `info_delete` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`, `is_deleted`, `info_delete`) VALUES
('m000000_000000_base', 1581686063, 0, ''),
('m130524_201442_create_user_table', 1581686065, 0, ''),
('m140506_102106_rbac_init', 1581686065, 0, ''),
('m170101_000000_create_menu_table', 1587541309, 0, ''),
('m170101_000001_humanized_menu_name', 1587541310, 0, ''),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1581686065, 0, ''),
('m170913_142352_create_settings_table', 1581686065, 0, ''),
('m180523_151638_rbac_updates_indexes_without_prefix', 1581686065, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `language_type` int(11) DEFAULT NULL,
  `count_views` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `updated_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `image_url`, `location_id`, `type_id`, `language_type`, `count_views`, `status`, `created_date`, `updated_date`, `create_user_id`, `updated_user_id`) VALUES
(1, 'Corona News', 'Hello', '', 1, NULL, 1, NULL, 1, '2021-05-15 23:35:51', '2021-05-15 23:35:51', 1, 1),
(2, 'Test Post', 'Test Post', 'https://res.cloudinary.com/duevaviby/image/upload/v1621329600/Group_19963_lixkcr.png', 1, NULL, 1, NULL, 2, '2021-05-17 10:18:49', NULL, 2, 1),
(3, 'Breaking News ', 'Bitcoin price: The supply of this cryptocurrency is artificially scarce. Demand drives prices just like in other commodities. But there are twists. Bitcoin output is capped at 21mn coins and supply growth halves every 4 years. It is designed to become increasingly constrained. So demand swings are key to price moves. Indeed, BofA Securities show major institutional announcements and miner reward cuts have been followed by upward Bitcoin moves.', 'https://res.cloudinary.com/duevaviby/image/upload/v1621329600/Group_19963_lixkcr.png', 1, NULL, 1, NULL, 1, '2021-05-18 05:25:39', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `module` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `icon` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `mark_read` tinyint(1) NOT NULL DEFAULT '0',
  `model_type` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `check_on_ajax` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` date DEFAULT NULL,
  `updated_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `slug` varchar(225) CHARACTER SET utf8mb4 NOT NULL,
  `description` text CHARACTER SET utf8mb4,
  `state_id` int(11) DEFAULT '0',
  `type_id` int(11) DEFAULT '0',
  `created_date` date DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `updated_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `title`, `slug`, `description`, `state_id`, `type_id`, `created_date`, `updated_date`, `create_user_id`, `updated_user_id`) VALUES
(1, 'Privacy Policy', 'privacy-policy', '<p><strong>Personal Information You Provide</strong></p>\r\n\r\n<p>You can visit Getcashback.co.in Website/ App and browse for which you need not provide any information about yourself. You remain an anonymous visitor. Getcashback.co.in&nbsp;only ask you for different information when you register for certain Services, access various content or features.</p>\r\n\r\n<p>When you log in to Getcashback&nbsp;using Facebook or Google+ account, only with your consent, we will collect your email id and basic profile information to complete the Registration process. Apart from that no other information, whether personal or non-personal, if any, associated with the account are captured. Except your email ID (which is kept confidential), the information collected by the website is solely at users&rsquo; choice and can be updated by the user anytime after logging in from their Dashboard. No private information like Services used, Purchases made or Credits earned, etc. will be shown to public. The users have the ability to access and edit their personal/ public profile information that they want to display on our website.</p>\r\n\r\n<p>When you engage in certain activities on the Website/ App, such as entering a promotional activity, requesting information about our services, email us with questions or applying for a job, we may ask you to provide certain information about yourself. It is always optional for you to get engaged in such Identification Activity. And if you choose to take part in such Identification Activity, you may need to provide us with certain personal information about yourself, such as your first and last name, email address, date of birth, occupation, mailing address, mobile number and/ or telephone number.</p>\r\n\r\n<p>When you order certain products or services, you may be asked to provide us with certain financial information, including your credit card or debit card number, expiry date and authentication codes or other related information. Depending on the activity, the information we ask you to provide may be mandatory or voluntary. In case you are not willing to provide the mandatory information required for any particular activity, you may not be permitted to take part in that activity.</p>\r\n\r\n<p>We also collect some information like user favorite stores, categories, feedback, etc. to make our service and user experience better. We may use your feedback to improve our website/ app, offerings, for marketing and promotions and use them to tell others about your services.</p>\r\n\r\n<p>In addition, if you send any information or a product to another person, we may store yours and the recipient&rsquo;s personal information. We may allow the other person to access the information which we have sent him/ her on your request. We may also use your personal information to accomplish administrative tasks, troubleshoot and resolve dispute and contact you.</p>\r\n\r\n<p>We assure you that the information collected from you is exclusively related to our dealings with you. And will only keep your information for as long as we are either required to by the law of the land or as is relevant for the purposes for which it was collected.</p>\r\n\r\n<h3>Information Automatically Collected</h3>\r\n\r\n<p>We store the user IP Address and collect Users location point (longitude, latitude), Locality and City to analyze the trends to make better service and that can be sometimes used to derive your general geographic location.</p>\r\n\r\n<p>We use cookies to store your browsing information each time you visit any page on our website. These are used to keep track of keyword searches you do while using Getcashback.co.in&nbsp;, as well as your surfing behaviour on this website and other websites you may visit. This information is used to show you the Deals, Cashback offers, Advertisements tailored to your interests on this website, and/or to maintain track of your response to each Ad. No personal information about you is gathered or stored in the cookies placed by our website and, as a result; none can be passed to any third party.</p>\r\n\r\n<p>Whether you want your web browser to accept cookies or not is up to you. You may refuse to accept cookies by changing the setting on your browser which allows you to refuse the cookies and in case if you haven&#39;t changed your computer&#39;s settings, your browser automatically allows them. However, if you prefer to refuse cookies or delete your browser cookies or disable them entirely, you may not be able to fully experience all features of the website. This may also significantly impact your experience with our website and may make parts of our website non-functional or inaccessible. Therefore, we recommend that you leave them turned on.</p>\r\n\r\n<h2>Disclosure of Information</h2>\r\n\r\n<p>We will not share any of your information with other parties except as provided below:</p>\r\n\r\n<ol>\r\n	<li>We may share only your full name with our Merchant with whom we have an association and whose deal you have purchased. We share this information with them in order to help them identify you to provide the services you have opted for.</li>\r\n	<li>We may share your information with third parties only if required to do so by law, with the court&rsquo;s order, if requested by any government or law enforcement authority.</li>\r\n</ol>\r\n\r\n<p>At Getcashback.co.in, we respect your Privacy and under no circumstances do we rent, trade or share any of your information that we have collected from you to third parties for any purposes without your consent.</p>\r\n\r\n<h2>Protection of Information</h2>\r\n\r\n<p>We&#39;re committed to protecting your personal and non-personal information. The access to your personal information is limited to only to selected personnel and is stored on secure servers. Therefore, we ensure that your information is safe after it is transmitted to us. However, no such transmission over the Internet can be guaranteed to be completely secure and Getcashback.co.in&nbsp; assumes no liability whatsoever for any such data loss. It is advisable to adhere to the following measures:</p>\r\n\r\n<ol>\r\n	<li>Keep your password or other access to your information secret.</li>\r\n	<li>Ensure no-one else uses your Computer or other Devices when you &quot;signed in&quot; to the Getcashback.co.in&nbsp;account.</li>\r\n	<li>Always sign out from your Account when not using Getcashback.co.in&nbsp;in case if you are using other computer or mobile device or browser.</li>\r\n</ol>\r\n\r\n<h2>Disclaimer</h2>\r\n\r\n<p>Please note that Getcashback.co.in&nbsp;Website/ App may contain links to other websites and/ or services. If you click on any of those links, you will be leaving Getcashback.co.in&nbsp; Website/ App and visit the third party websites. We are not liable for any of the privacy practices followed by those websites. So it is recommended that you read the privacy policy &amp; Terms of Use of each website before you use them.</p>\r\n\r\n<p>We will review our Privacy Policy when necessary and may make periodic changes to the policy in connection with that review. The revisions made will be effective immediately upon being posted on the Website and provide a notification alert. It is advisable that you visit this page on receiving the notification to make yourself aware of the latest version of the Privacy Policy. Your continued use of the Website once the effectiveness of such revisions will be considered your acknowledgment and acceptance of the terms of the revised Privacy Policy.</p>\r\n', 1, 1, '2021-01-06', '2021-01-07', 1, NULL),
(2, 'Terms Conditions', 'terms-conditions', '<p><strong>Terms of Use</strong></p>\r\n\r\n<p>Welcome to GetCashback.co.in.&nbsp; Following terms and conditions has to be read and understood very carefully as your use of the services are subject to your acceptance of and compliance with the following terms and conditions (&quot;Terms of Use&quot;). You must read and understand it before using GetCashback.co.in&nbsp;the Website as well as the Mobile application in Google Play Store &amp; Appstore. By Signing Up, you accept that you are entering into a contract with us and are bound by the terms of this Agreement.</p>\r\n\r\n<p>In this Agreement, references to &quot;You&quot;, &quot;User&quot; shall mean the end user accessing and using the Services offered through the Website and the Mobile App. &quot;GetCashback.co.in&quot;, &ldquo;we&rdquo;, &ldquo;our&rdquo; used in the document refer to the Website and the GetCashback&nbsp;&nbsp;Mobile App, and the company, which owns and operates the Website.&amp; Applications.</p>\r\n\r\n<h2>1. Introduction</h2>\r\n\r\n<p>a. GetCashback.co.in&nbsp;(Website and Mobile App) is an Internet based content and an online shopping gateway designed to list the deals available on different shopping websites.</p>\r\n\r\n<p>b. We do not have our own products. Neither do we purchase, manufacture or sell any goods.</p>\r\n\r\n<p>c. GetCashback.co.in (Website and Mobile App) serves as a platform for Users to gather and share information, ideas, views and experiences on online shopping to accomplish best shopping experience.</p>\r\n\r\n<p>d. We make shopping even more exciting with low spending by letting the User know about the best deals available on a wide range of brands, merchants and dealers on a single platform and also provide additional Cashback.</p>\r\n\r\n<p>e. We do not promote any particular Retailer/Brand or work with one. So, the deals displayed on the website are not indicative to any shopping advice or inspiring to shop a particular brand or use a particular shopping platform. Your purchase or order made is at your sole discretion and choice, shall be subject to T&amp;C of such brands and/or retailers. Therefore, we would not be accountable, in any manner, for any products or services ordered from any of its merchants, affiliated or non-affiliated.</p>\r\n\r\n<p>f. We advise you to exercise absolute care and caution while reading the specifications associated with each offer and the T&amp;C mentioned on the retailers&rsquo; website.</p>\r\n\r\n<p>g. All deals, coupons and promotions on our website are subject to change without prior notice.</p>\r\n\r\n<p>h. We are not liable to guarantee or endorse the accuracy of links, coupon codes or any deals displayed on the website or any products and services or their usability, availability and suitability for your need and requirements.</p>\r\n\r\n<h2>2. Account Creation</h2>\r\n\r\n<p>To obtain an account with GetCashback.co.in&nbsp;(Website and Mobile App), it is strictly mandated for a user to be at least 18 years of age. You can register on our website and mobile app using your existing Facebook or Google+ account. Every user can choose a user name and profile picture that is inoffensive. And in case, any user name or profile picture is found to be offensive it will be removed without warning. A valid e-mail address should be available in your profile at all times to provide us with a means of contact as need arises. We will never sell or share your email address to third parties.</p>\r\n\r\n<p>Our Privacy Policy&nbsp;contains important information on how we deal with the personal information you provide through your GetCashback.co.in&nbsp;&nbsp;Account.</p>\r\n\r\n<h2>b. Credits</h2>\r\n\r\n<p><strong>Membership &amp; Referral Fee:</strong></p>\r\n\r\n<p>The GetCashback.co.in&nbsp;&nbsp;(Website and Mobile App) offers a unique and ingenious membership &amp; referral fees to its Account Holders where the Members get ten Credits when they Sign Up/ Join and earn 10% on the Cashback Earnings of the new Member introduced,&nbsp;</p>\r\n\r\n<p><strong>Note:</strong>&nbsp;This Referral Fee will be available exclusively for genuine invitees. Any misuse (e.g.- inviting yourself &amp; signing up with GetCashback.co.in&nbsp;&nbsp;with multiple accounts) of our service will not be tolerated. In case, if you are found guilty your accounts will be blacklisted from GetCashback.co.in&nbsp; (Website and Mobile App) and henceforth you will not be allowed to use any of our services.</p>\r\n\r\n<p><strong>Reward</strong></p>\r\n\r\n<p>Every Member can also earn Credit as Reward for sharing Discount Offers, Freebies, Experiences, Ask questions etc. about shopping on GetCashback.co.in (Website). Our administrative team will review the contents shared, based on the uniqueness and the quality of the share, the Account Holder will be rewarded with Credits. However, no credit will be rewarded in case content shared is invalid and cannot be displayed on our website or repeated and is already displayed. Our Admins will be fair in giving you Credits and may send you the feedback. Admins have the rights to change or update credits given to you, if required.</p>\r\n\r\n<p><strong>Feedback</strong></p>\r\n\r\n<p>You can also earn upto 50 Credits on sharing your valuable feedback on shopping from GetCashback.co.in&nbsp;&nbsp;(Website). The Credit amount varies based on our Admin&rsquo;s review. We will use these feedbacks to improve our services.</p>\r\n\r\n<p><strong>The Credits</strong>&nbsp;earned by the Account Holder can be redeemed anytime to Recharge &amp; Pay Postpaid Bills of Mobile/ DTH/ Data Card or to Buy Gift Cards from Online Stores.</p>\r\n\r\n<p>All Cashbacks and Reward Credits earned will be reflected in the Account Holder&rsquo;s Dashboard as per our policy. The amount offered as Cashback or Credit is subject to change from time to time.</p>\r\n\r\n<p><strong>Note:</strong>&nbsp;All the Deals displayed on GetCashback.co.in (Website and Mobile App) and their price quoted is as per the retailer offering, and no hidden cost is involved.</p>\r\n\r\n<h2>Termination of Account</h2>\r\n\r\n<p>We do not entertain any kind of spam on our website. We reserve the right to remove anything containing such indications with immediate effect and suspend or terminate the Account Holder&rsquo;s access to our service, if found guilty. Postings containing any offensive/ abusive message or picture in general or towards any caste, creed, region, religion, gender, etc. are considered as spam.</p>\r\n\r\n<p>Account Holders should use their Account only for the purchase or share only on his/her own behalf, and not on the behalf of, or for the advantage of, any other person(s). Also, must not indulge in, or make an attempt to enter into, any deal with a retailer or to gain Cashback:</p>\r\n\r\n<p>a. By providing personal information of someone else, or using a payment method which are not entitled to use,</p>\r\n\r\n<p>b. By deceptively or unlawfully utilizing a retailer offering, or</p>\r\n\r\n<p>c. In breach of any terms and conditions applied by GetCashback.co.inor the retailer to that transaction.</p>\r\n\r\n<p>Again, it is an obligation for every Account Holders to ensure that any material posted by him/her or associated with his/her Account:</p>\r\n\r\n<p>a. Is not offensive, or obnoxious or of an obscene, or menacing in nature;</p>\r\n\r\n<p>b. Is not intended or likely to cause unnecessary annoyance, nuisance or difficulty to any person;</p>\r\n\r\n<p>c. Does not contain any harmful content, malware or anything else designed to hinder, suspend, or disturb the normal operating procedures of a computer, or to access without authority, or remove any system, data or any personal or non-personal information</p>\r\n\r\n<p>a.If Customer cancel 5 orders in month , this is subject to termination of account / account will be Banned&nbsp;</p>\r\n\r\n<h2>Payment Policy:</h2>\r\n\r\n<p>In order to facilitate payments for Local Deals offered by GetCashback.co.in&nbsp; through GetCashback App, we are using third party payment gateway which will facilitate you to make payments using net banking, credit/debit card. Your use of this facility is subject to your complete acceptance and adherence to the terms and conditions hereof as well as the terms and conditions of the website of the payment gateway service provider (third party payment).</p>\r\n\r\n<p>Our payment mechanism is completely secured. All payments on GetCashback.co.in&nbsp;platform are done through third party payment gateway following PCI-DSS compliance standards, which is the highest levels of transaction security, currently available on the Internet. It uses the best encryption technology to protect your card information while securely completing the payment process.</p>\r\n\r\n<p>You agree to provide correct and accurate credit/ debit card details to the approved payment gateway for buying Local Deals on our App. You shall not use the credit/ debit card which is not lawfully owned by You, i.e. in all transactions, you must use your own credit/ debit card to pay. The information provided by you will not be utilized or shared with any third party unless required by law, regulation or court order. Sitaphal will disclaim all liabilities that may arise due to or as a consequence of using any unauthorized credit/ debit card.</p>\r\n\r\n<p>The Payment Facility may or may not be available in full or in part for certain category of deals and/ or offers on different products and/or services.</p>\r\n\r\n<p>You are not entitled to cancel any Local Deals purchased from&nbsp;GetCashback.co.in</p>\r\n\r\n<p>GetCashback.co.in reserves the right to impose limits on the number of Transactions or Transaction Price which GetCashback.co.in&nbsp;may receive from an individual Buyer or Valid Credit/Debit/ Cash Card / Valid Bank Account/ and such other financial instrument directly or indirectly and reserves the right to refuse to process Transactions exceeding such limit.</p>\r\n', 1, 3, '2021-01-06', '2021-01-07', 1, NULL),
(3, 'About', 'about', '<p>highest &amp; fastest paying cashback websites.</p>\r\n\r\n<p>Getcashback&nbsp; also offers 100% cashback offers in many stores, where the user saves all his shopping money on transacting via Getcashback. 100% Cashback stores get live time to time and users are notified accordingly.</p>\r\n\r\n<p>We help you save money through our comprehensive listing of coupons, offers, deals and discounts from top online brands and websites. You can also earn reliable Cashback on top of the merchant discounts every time you shop through us. You can make better shopping decisions through our&nbsp;&nbsp;&nbsp;Price Comparison Browser Extension.&nbsp;&nbsp;</p>\r\n', 1, 2, '2021-01-06', '2021-02-18', 1, NULL),
(4, 'Faq Page', 'faq-page', '<p>Faqs page</p>\r\n', 1, 10, '2021-02-10', '2021-02-10', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `section_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `key` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `value` blob,
  `is_deleted` int(11) NOT NULL,
  `info_delete` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `language_type` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `updated_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `title`, `image_url`, `type_id`, `language_type`, `status`, `created_date`, `updated_date`, `create_user_id`, `updated_user_id`) VALUES
(1, 'Telangana', '', 1, 2, 1, '2021-05-01 11:57:16', '2021-05-01 11:57:16', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `testimonial_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `description` text CHARACTER SET utf8mb4 NOT NULL,
  `rating` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_date` date DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `updated_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_no` bigint(20) DEFAULT NULL,
  `alternative_contact` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_of_birth` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `profile_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_role` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `oauth_client_user_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `oauth_client` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `access_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `device_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `device_type` int(11) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `referal_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `referal_id` int(11) DEFAULT NULL,
  `signup_type` int(11) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT NULL,
  `info_delete` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `first_name`, `last_name`, `contact_no`, `alternative_contact`, `date_of_birth`, `gender`, `description`, `address`, `profile_image`, `user_role`, `oauth_client_user_id`, `oauth_client`, `access_token`, `device_token`, `device_type`, `status`, `referal_code`, `referal_id`, `signup_type`, `is_deleted`, `info_delete`, `created_at`, `updated_at`, `create_user_id`) VALUES
(1, 'admin@domain.com', '1ZodOHS3SZAZkUHmBsVYJLnUThUlYk26', '$2y$13$bWU3rmNi/l7UGWnTEWlHH.3kZN5/WGYkyy4D2aCfpZaeZ7ieGZRuS', NULL, 'admin@domain.com', 'Hattie', 'Jacobi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin', NULL, NULL, NULL, '', NULL, 10, '', 0, NULL, 0, '', 1501889814, 1503957470, NULL),
(2, 'aparna@gmail.com', '4u89ruXaSM0a-tJiN0dM28DfnFyUBtx3', '$2y$13$TcLMA6tfu0decTJrhHCg2exknoljMafwrduX3KTk3XKz0MfnR6mIe', NULL, 'aparna@gmail.com', 'Aparna', 'B', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'User', NULL, NULL, NULL, NULL, NULL, 10, '', NULL, NULL, NULL, NULL, 1621070033, 1621070033, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `web_setting`
--

CREATE TABLE `web_setting` (
  `setting_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `setting_key` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `value` text CHARACTER SET utf8mb4 NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_date` date DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `updated_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `web_setting`
--

INSERT INTO `web_setting` (`setting_id`, `name`, `setting_key`, `value`, `type_id`, `status`, `created_date`, `updated_date`, `create_user_id`, `updated_user_id`) VALUES
(1, 'Website Title', 'website_title', 'Spot News', 1, 1, '2021-05-05', '2021-05-05', 1, 1),
(2, 'SMS API key ( https://2factor.in/)', 'sms_api_key', '0', 3, 1, '2021-05-05', '2021-05-05', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_au_user_id` (`user_id`),
  ADD KEY `fk_au_create_user_id` (`create_user_id`),
  ADD KEY `fk_au_update_user_id` (`updated_user_id`);

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `auth_session`
--
ALTER TABLE `auth_session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_auth_session_user_id` (`create_user_id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bn_category_id` (`category_id`),
  ADD KEY `fk_bn_create_user_id` (`create_user_id`),
  ADD KEY `fk_bn_update_user_id` (`updated_user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cat_language_type` (`language_type`),
  ADD KEY `fk_cat_create_user_id` (`create_user_id`),
  ADD KEY `fk_cat_update_user_id` (`updated_user_id`);

--
-- Indexes for table `category_news`
--
ALTER TABLE `category_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_catnw_category_id` (`category_id`),
  ADD KEY `fk_catnw_news_id` (`news_id`),
  ADD KEY `fk_catnw_create_user_id` (`create_user_id`),
  ADD KEY `fk_catnw_update_user_id` (`updated_user_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comm_language_type` (`language_type`),
  ADD KEY `fk_comm_user_id` (`user_id`),
  ADD KEY `fk_comm_news_id` (`news_id`),
  ADD KEY `fk_comm_create_user_id` (`create_user_id`),
  ADD KEY `fk_comm_update_user_id` (`updated_user_id`);

--
-- Indexes for table `constitutes`
--
ALTER TABLE `constitutes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cont_language_type` (`language_type`),
  ADD KEY `fk_cont_dist_id` (`dist_id`),
  ADD KEY `fk_cont_create_user_id` (`create_user_id`),
  ADD KEY `fk_cont_update_user_id` (`updated_user_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dist_language_type` (`language_type`),
  ADD KEY `fk_dist_state_id` (`state_id`),
  ADD KEY `fk_dist_create_user_id` (`create_user_id`),
  ADD KEY `fk_dist_update_user_id` (`updated_user_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_lng_create_user_id` (`create_user_id`),
  ADD KEY `fk_lng_update_user_id` (`updated_user_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_like_user_id` (`user_id`),
  ADD KEY `fk_like_news_id` (`news_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_news_language_type` (`language_type`),
  ADD KEY `fk_news_create_user_id` (`create_user_id`),
  ADD KEY `fk_news_update_user_id` (`updated_user_id`),
  ADD KEY `fk_news_location_id` (`location_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_page_create_user_id` (`create_user_id`),
  ADD KEY `fk_page_update_user_id` (`updated_user_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`section_name`,`key`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_state_language_type` (`language_type`),
  ADD KEY `fk_state_create_user_id` (`create_user_id`),
  ADD KEY `fk_state_update_user_id` (`updated_user_id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`testimonial_id`),
  ADD KEY `fk_test_user_id` (`user_id`),
  ADD KEY `fk_test_create_user_id` (`create_user_id`),
  ADD KEY `fk_test_update_user_id` (`updated_user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `web_setting`
--
ALTER TABLE `web_setting`
  ADD PRIMARY KEY (`setting_id`),
  ADD KEY `fk_setting_create_user_id` (`create_user_id`),
  ADD KEY `fk_setting_update_user_id` (`updated_user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_session`
--
ALTER TABLE `auth_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category_news`
--
ALTER TABLE `category_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `constitutes`
--
ALTER TABLE `constitutes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `web_setting`
--
ALTER TABLE `web_setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `banner`
--
ALTER TABLE `banner`
  ADD CONSTRAINT `fk_bn_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `fk_bn_create_user_id` FOREIGN KEY (`create_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk_bn_update_user_id` FOREIGN KEY (`updated_user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `fk_cat_create_user_id` FOREIGN KEY (`create_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk_cat_language_type` FOREIGN KEY (`language_type`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `fk_cat_update_user_id` FOREIGN KEY (`updated_user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `category_news`
--
ALTER TABLE `category_news`
  ADD CONSTRAINT `fk_catnw_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `fk_catnw_create_user_id` FOREIGN KEY (`create_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk_catnw_news_id` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`),
  ADD CONSTRAINT `fk_catnw_update_user_id` FOREIGN KEY (`updated_user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comm_create_user_id` FOREIGN KEY (`create_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk_comm_language_type` FOREIGN KEY (`language_type`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `fk_comm_news_id` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`),
  ADD CONSTRAINT `fk_comm_update_user_id` FOREIGN KEY (`updated_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk_comm_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `constitutes`
--
ALTER TABLE `constitutes`
  ADD CONSTRAINT `fk_cont_create_user_id` FOREIGN KEY (`create_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk_cont_dist_id` FOREIGN KEY (`dist_id`) REFERENCES `district` (`id`),
  ADD CONSTRAINT `fk_cont_language_type` FOREIGN KEY (`language_type`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `fk_cont_update_user_id` FOREIGN KEY (`updated_user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `fk_dist_create_user_id` FOREIGN KEY (`create_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk_dist_language_type` FOREIGN KEY (`language_type`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `fk_dist_state_id` FOREIGN KEY (`state_id`) REFERENCES `state` (`id`),
  ADD CONSTRAINT `fk_dist_update_user_id` FOREIGN KEY (`updated_user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `languages`
--
ALTER TABLE `languages`
  ADD CONSTRAINT `fk_lng_create_user_id` FOREIGN KEY (`create_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk_lng_update_user_id` FOREIGN KEY (`updated_user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `fk_like_news_id` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`),
  ADD CONSTRAINT `fk_like_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_news_create_user_id` FOREIGN KEY (`create_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk_news_language_type` FOREIGN KEY (`language_type`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `fk_news_location_id` FOREIGN KEY (`location_id`) REFERENCES `constitutes` (`id`),
  ADD CONSTRAINT `fk_news_update_user_id` FOREIGN KEY (`updated_user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `state`
--
ALTER TABLE `state`
  ADD CONSTRAINT `fk_state_create_user_id` FOREIGN KEY (`create_user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk_state_language_type` FOREIGN KEY (`language_type`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `fk_state_update_user_id` FOREIGN KEY (`updated_user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
