-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 20, 2018 at 12:04 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Bit2naira`
--

-- --------------------------------------------------------

--
-- Table structure for table `BitcoinPurchaseOrder`
--

CREATE TABLE `BitcoinPurchaseOrder` (
  `id` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `NairaAmount` varchar(255) NOT NULL,
  `BitcoinAmount` varchar(255) NOT NULL,
  `ProofofPayment` longblob NOT NULL,
  `Extension` varchar(10) DEFAULT NULL,
  `Remarks` varchar(255) NOT NULL,
  `Addressed` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `BitcoinSalesOrder`
--

CREATE TABLE `BitcoinSalesOrder` (
  `id` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `BitcoinAmount` varchar(255) NOT NULL,
  `TransactionID` varchar(255) NOT NULL,
  `WalletAddress` varchar(255) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `Addressed` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `GiftCardSaleOrder`
--

CREATE TABLE `GiftCardSaleOrder` (
  `id` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Amount` varchar(255) NOT NULL,
  `CardType` varchar(255) NOT NULL,
  `Denomination` varchar(255) NOT NULL,
  `GiftCard` longblob NOT NULL,
  `Extension` varchar(255) NOT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `Addressed` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `isEmailConfirmed` tinyint(4) NOT NULL DEFAULT '0',
  `token` varchar(255) NOT NULL,
  `Bitcoin_Wallet_Address` varchar(255) DEFAULT NULL,
  `Bank_Name` varchar(255) DEFAULT NULL,
  `Bank_Account_Name` varchar(255) DEFAULT NULL,
  `Bank_Account_Number` varchar(255) DEFAULT NULL,
  `Bit2naira_Account_Balance` varchar(255) NOT NULL,
  `Bit2naira_Account_Number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `WithdrawalRequest`
--

CREATE TABLE `WithdrawalRequest` (
  `id` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Amount` varchar(255) NOT NULL,
  `Bank_Name` varchar(255) NOT NULL,
  `Account_Number` varchar(255) NOT NULL,
  `Account_Name` varchar(255) NOT NULL,
  `Addressed` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BitcoinPurchaseOrder`
--
ALTER TABLE `BitcoinPurchaseOrder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `BitcoinSalesOrder`
--
ALTER TABLE `BitcoinSalesOrder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `GiftCardSaleOrder`
--
ALTER TABLE `GiftCardSaleOrder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `WithdrawalRequest`
--
ALTER TABLE `WithdrawalRequest`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BitcoinPurchaseOrder`
--
ALTER TABLE `BitcoinPurchaseOrder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `BitcoinSalesOrder`
--
ALTER TABLE `BitcoinSalesOrder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `GiftCardSaleOrder`
--
ALTER TABLE `GiftCardSaleOrder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `WithdrawalRequest`
--
ALTER TABLE `WithdrawalRequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
