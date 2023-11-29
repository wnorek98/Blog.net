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
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE `comments` (
  `id_comments` int(11) NOT NULL,
  `id_blogs` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `published` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `comments`
--

INSERT INTO `comments` (`id_comments`, `id_blogs`, `id_users`, `comment`, `published`) VALUES
(1, 3, 4, 'In ultricies mi vel fringilla imperdiet. Praesent dapibus consectetur erat ac convallis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla ac ipsum et ligula consequat cursus. Vivamus suscipit erat tempor metus ultricies, ac dignissim est vehicula. Vestibulum et quam justo. Praesent sollicitudin nisl vitae auctor tempus. Sed porttitor ornare dolor vitae accumsan. Nunc congue fermentum efficitur.', '2023-04-15 05:01:53'),
(2, 1, 5, 'Donec suscipit velit eu justo elementum, eu lobortis neque feugiat. Nunc dignissim odio nibh, in dignissim nunc tempor eu. Morbi ac posuere magna. Pellentesque venenatis risus id lectus fringilla tristique. Curabitur eget mi congue lectus mattis ornare ut non massa. Nulla vitae nibh egestas, placerat magna vel, bibendum libero. Phasellus luctus nisi id lorem vehicula lobortis. Fusce suscipit odio enim. Aenean elementum, tellus auctor posuere luctus, magna nisl sollicitudin ex, at fringilla diam neque id nisi. Cras sagittis justo lectus, nec ornare neque efficitur vel. Vivamus vehicula luctus nibh, et molestie orci semper ut. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi quis odio ultrices, blandit nulla at, iaculis dui.', '2023-04-29 05:06:35'),
(3, 3, 15, 'Proin non velit urna. Vestibulum consectetur tempor urna ac dapibus. Cras efficitur libero ultrices turpis pellentesque sodales in nec dolor. Mauris consequat auctor fringilla. Nam ipsum neque, varius ut gravida in, semper quis velit. Donec mattis dolor sed dolor viverra finibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nunc molestie arcu at ante dictum, tincidunt scelerisque felis aliquam. Mauris efficitur mauris ut lacus ultrices, non imperdiet turpis consequat. Sed fringilla mi ac arcu laoreet, pellentesque porta augue rutrum. Etiam egestas leo porta nibh vehicula, a aliquet metus sagittis. Sed mollis, nibh nec volutpat iaculis, lectus odio vulputate turpis, non eleifend est orci faucibus mi. In id leo pharetra, dignissim orci sit amet, eleifend lacus.\r\n\r\nCurabitur sodales tempus dictum. Sed elementum leo magna, quis venenatis libero vulputate ut. Morbi eget quam erat. Maecenas egestas posuere odio, quis laoreet mi porta ut. Phasellus ut facilisis ante. Nulla facilisi. Morbi pretium, diam a ullamcorper ullamcorper, dui nunc accumsan lacus, nec euismod sapien diam mattis lorem. Maecenas vitae magna fermentum justo porttitor suscipit eget et neque. Maecenas commodo in nibh finibus luctus.\r\n\r\nQuisque sodales orci eget mi dictum mollis. Pellentesque a fringilla nunc, in ornare nisl. Nunc congue ex viverra felis aliquam fringilla. Etiam luctus mattis scelerisque. Donec convallis, tellus quis sollicitudin porta, risus dolor placerat erat, a vestibulum ligula metus eget elit. Phasellus et orci sit amet massa consequat ultricies egestas eget dolor. Sed sit amet lectus consequat, tincidunt nisi in, volutpat neque.', '2023-05-11 13:02:43'),
(4, 4, 9, 'Vestibulum sed porta lorem. Nunc enim orci, accumsan convallis egestas sed, porttitor ut velit. Nunc vitae augue sit amet est facilisis sollicitudin vel non neque. Curabitur congue ex ac orci sollicitudin, mollis posuere lacus viverra. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec pharetra erat massa, non lacinia risus euismod vel. Proin vestibulum purus et erat interdum, in sodales sem efficitur. Etiam venenatis erat quis orci molestie molestie. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eu velit ullamcorper nisl condimentum gravida. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Mauris bibendum tortor sed orci gravida, a suscipit velit aliquet. Etiam placerat ipsum id leo commodo pharetra. Morbi vehicula fermentum neque et vulputate. Proin consequat sodales justo.', '2023-11-11 15:05:14');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comments`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comments` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
