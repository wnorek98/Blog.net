-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 11 Lis 2023, 18:00
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `blog`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id_users`, `username`, `email`, `password`, `image`, `date`) VALUES
(1, 'Ellie', 'ellie.brown@gmail.com', '9d91bf9b97637062c8e41574c084b210', 'person1.jpg', '2023-04-02 06:44:19'),
(2, 'Sarah', 'sarah.jonson@outlook.com', '9e9d7a08e048e9d604b79460b54969c3', 'person2.jpg', '2023-04-03 08:16:03'),
(3, 'Steve', 'steve.williams@yahoo.com', 'd69403e2673e611d4cbd3fad6fd1788e', 'person3.jpg', '2023-04-04 10:45:41'),
(4, 'Oliver', 'oliver.smith@outlook.com', 'acae273a5a5c88b46b36d65a25f5f435', 'person4.jpg', '2023-04-04 14:01:04'),
(5, 'Emily', 'emily.clark@gmail.com', 'b02ae5aaefe3f7090668df034b0f2324', 'person5.jpg', '2023-04-06 07:07:05'),
(6, 'Sophia', 'sophia.smith@gmail.com', '2ee0272b8e1a9705dc3ebe91c10b32f4', 'person6.jpg', '2023-04-09 14:04:14'),
(7, 'Noah', 'noah.jones@yahoo.com', '40564e4dd4cd0fc21e980d8eb05d15ee', 'user.jpg', '2023-04-12 09:20:22'),
(8, 'Ava', 'ava.wilson@gmail.com', '30bb014e5b15dd9fc656d307c2ac78af', 'person10.jpg', '2023-04-14 07:05:08'),
(9, 'Liam', 'liam.roberts@outlook.com', '6d8c4d103f90154cc06dd75a71d061be', 'person9.jpg', '2023-04-14 12:19:39'),
(10, 'Olivia', 'olivia.martin@gmail.com', '47bc17dc1a2f164967f55325d866c75c', 'person12.jpg', '2023-04-16 06:50:44'),
(11, 'Lucas', 'lucas.rodriguez@yahoo.com', 'dc53fc4f621c80bdc2fa0329a6123708', 'person8.jpg', '2023-04-16 07:22:11'),
(12, 'Emma', 'emma.ross@gmail.com', '00a809937eddc44521da9521269e75c6', 'person15.jpg', '2023-04-18 06:52:59'),
(13, 'Mason', 'mason.lee@outlook.com', '5c29c2e513aadfe372fd0af7553b5a6c', 'person11.jpg', '2023-11-08 18:58:27'),
(14, 'Isabella', 'isabella.walker@gmail.com', '4181cb6c6456c16239f2ae8496d7ce0a', 'user.jpg', '2023-04-19 06:44:19'),
(15, 'Jackson', 'jackson.brown@yahoo.com', 'b41779690b83f182acc67d6388c7bac9', 'person7.jpg', '2023-04-20 07:14:57'),
(16, 'Sophie', 'sophie.smith@gmail.com', '6988ec3aba1eaddf2435141bf10487ca', 'user.jpg', '2023-04-21 05:30:15'),
(17, 'William', 'william.jones@yahoo.com', 'fd820a2b4461bddd116c1518bc4b0f77', 'user.jpg', '2023-04-22 09:20:22'),
(18, 'Amelia', 'amelia.wilson@gmail.com', '176226b2d51002d2590f048881560569', 'user.jpg', '2023-04-23 11:55:18'),
(19, 'Henry', 'henry.roberts@outlook.com', '027e4180beedb29744413a7ea6b84a42', 'person16.jpg', '2023-04-23 16:26:00'),
(20, 'Ella', 'ella.martin@gmail.com', 'ec5e1e94c042dda33822701a45eb5e30', 'user.jpg', '2023-04-25 07:22:34'),
(21, 'Owen', 'owen.rodriguez@yahoo.com', '43996fb100428b0d99e233c3261f7187', 'user.jpg', '2023-04-26 05:18:47'),
(22, 'Avery', 'avery.ross@gmail.com', '3e10e87da0f93b981c31e6dab6f5fdb7', 'user.jpg', '2023-04-28 08:34:56'),
(23, 'Ethan', 'ethan.lee@outlook.com', '7a56cb86e74d2afaacd7524253072fe3', 'user.jpg', '2023-04-28 10:15:09'),
(24, 'Lily', 'lily.walker@gmail.com', '89f288757f4d0693c99b007855fc075e', 'person14.jpg', '2023-04-29 12:18:04'),
(25, 'Logan', 'logan.brown@yahoo.com', '3447adfd742cdfb9048a3b29baf1ae7d', 'user.jpg', '2023-04-30 08:16:03'),
(26, 'Chloe', 'chloe.smith@gmail.com', '559a7f208866f0063b1ea8d5ca2ee816', 'person22.jpg', '2023-11-08 18:57:28'),
(27, 'Carter', 'carter.jones@yahoo.com', 'a886f2ee22888badbce90eac740c49be', 'user.jpg', '2023-05-01 09:20:22'),
(28, 'Grace', 'grace.wilson@gmail.com', '15e5c87b18c1289d45bb4a72961b58e8', 'user.jpg', '2023-05-03 11:55:18'),
(29, 'Benjamin', 'benjamin.roberts@outlook.com', '5d9f71b71b207b9e665820c0dce67bdb', 'person18.jpg', '2023-11-08 18:41:23'),
(30, 'Aubrey', 'aubrey.martin@gmail.com', '08d1fbc1f1a6ff627d3a6c21a637c63f', 'user.jpg', '2023-05-04 07:22:34'),
(31, 'James', 'james.rodriguez@yahoo.com', 'b4cc344d25a2efe540adbf2678e2304c', 'user.jpg', '2023-05-06 05:18:47'),
(32, 'Aria', 'aria.ross@gmail.com', 'aafa7ed7cc46d6b04fc6e2b20baab657', 'person20.jpg', '2023-11-08 18:49:52'),
(33, 'Caleb', 'caleb.lee@outlook.com', '2f0154d7db348840676529dd72f1c034', 'user.jpg', '2023-05-06 10:15:09'),
(34, 'Hannah', 'hannah.walker@gmail.com', 'eb09d5e396183f4b71c3c798158f7c07', 'user.jpg', '2023-05-09 06:44:19'),
(35, 'Michael', 'michael.brown@yahoo.com', '0acf4539a14b3aa27deeb4cbdf6e989f', 'user.jpg', '2023-11-08 18:37:27'),
(36, 'Madison', 'madison.smith@gmail.com', 'b3b7eca0709c3c25e677677937e8f609', 'user.jpg', '2023-05-11 09:30:15'),
(37, 'Daniel', 'daniel.jones@yahoo.com', 'aa47f8215c6f30a0dcdb2a36a9f4168e', 'person17.jpg', '2023-05-12 02:47:43'),
(38, 'Harper', 'harper.wilson@gmail.com', 'f08f9065d1dcb714a5ea9f6dda273d6a', 'user.jpg', '2023-05-13 11:55:18'),
(39, 'David', 'david.roberts@outlook.com', '172522ec1028ab781d9dfd17eaca4427', 'user.jpg', '2023-05-14 06:40:11'),
(40, 'Mia', 'mia.martin@gmail.com', '5102ecd3d47f6561de70979017b87a80', 'user.jpg', '2023-05-15 07:22:34'),
(41, 'Elijah', 'elijah.rodriguez@yahoo.com', 'a6ebe407fa6e2337cb2deb573d17791e', 'person13.jpg', '2023-05-15 08:10:31'),
(42, 'Scarlett', 'scarlett.ross@gmail.com', 'f5dba72177a903feec9af0ee9ff5108e', 'user.jpg', '2023-05-17 08:34:56'),
(43, 'Alexander', 'alexander.lee@outlook.com', 'dd22141acb5ea065acd5ed773729c98f', 'user.jpg', '2023-05-18 10:15:09'),
(44, 'Matthew', 'matthew.brown@yahoo.com', 'e6a5ba0842a531163425d66839569a68', 'person19.jpg', '2023-11-08 18:47:19'),
(45, 'Addison', 'addison.smith@gmail.com', 'b0b29ca62e200e3a0ee19610e3f447fd', 'person21.jpg', '2023-11-08 18:52:59'),
(46, 'Joseph', 'joseph.jones@yahoo.com', 'cb07901c53218323c4ceacdea4b23c98', 'user.jpg', '2023-05-21 09:20:22'),
(47, 'Sofia', 'sofia.wilson@gmail.com', '17da1ae431f965d839ec8eb93087fb2b', 'user.jpg', '2023-05-23 11:55:18'),
(48, 'Sebastian', 'sebastian.roberts@outlook.com', 'c2d628ba98ed491776c9335e988e2e3b', 'user.jpg', '2023-05-24 06:40:11'),
(49, 'Aiden', 'aiden.davis@gmail.com', 'baaf2d2a11c58b3c85014894efd9b2b0', 'user.jpg', '2023-05-25 07:22:34'),
(50, 'Zoe', 'zoe.jenkins@yahoo.com', 'c88a65120330cfc69d5dbe1916fc8cd2', 'user.jpg', '2023-05-28 05:18:47');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
