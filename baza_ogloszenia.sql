-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 15 Sty 2021, 11:59
-- Wersja serwera: 10.4.14-MariaDB
-- Wersja PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `baza_ogloszenia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ogloszenia`
--

CREATE TABLE `ogloszenia` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL DEFAULT current_timestamp(),
  `nazwa` varchar(150) NOT NULL,
  `cena` int(11) NOT NULL,
  `lokalizacja` varchar(150) NOT NULL,
  `kategoria` varchar(150) NOT NULL,
  `zdjecie` text NOT NULL,
  `opis` text NOT NULL,
  `uzytkownik` varchar(150) NOT NULL,
  `nr_telefonu` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `ogloszenia`
--

INSERT INTO `ogloszenia` (`id`, `data`, `nazwa`, `cena`, `lokalizacja`, `kategoria`, `zdjecie`, `opis`, `uzytkownik`, `nr_telefonu`) VALUES
(1, '2020-11-03', 'Nissan Juke', 30000, 'Kraków', 'Samochody', 'https://motofilm.pl/wp-content/uploads/2020/04/2020-nissan-juke.jpg', 'Super furka polecam', 'MaciekZklanu', 0),
(2, '2020-11-20', 'Seat ibiza', 20000, 'Buk', 'Samochody', 'https://www.autocentrum.pl/ac-file/car-version/59019ea1582c7dc68c8b457d/seat-ibiza-v.jpg', 'Naprawdę elegancki samochodzik', 'Mateo696969', 0),
(3, '2020-11-28', 'Volkswagen lt 35', 150000, 'Buk', 'Samochody', 'https://thumbs.img-sprzedajemy.pl/1000x901c/22/15/cc/lt-tdi-ideal-2198921.jpg', 'Fajne autko', 'BoskiRoman', 0),
(5, '2020-11-03', 'Skoda Octavia', 30000, 'Wieliczka', 'Samochody', 'https://i.wpimg.pl/730x0/m.autokult.pl/z20925969ih-skoda-octavi-a08e5aa.jpg', 'fajne', 'Kuba', 0),
(6, '2021-01-07', 'Komputer', 1000, 'Mostek', 'Komputery', '', 'Super kompek', '', 0),
(7, '2021-01-08', 'Kaktus', 65, 'Chobędza', 'Rolnictwo', '', 'Super kakatus bardzo polecam', '', 0),
(8, '2021-01-11', 'Playstation 5', 2000, 'Gdynia, ul. Słoneczna 10', 'Komputery stacjonarne', 'https://estnn.com/wp-content/uploads/2020/04/playstation-5-ps5-800x450.png', 'Konsola całkowicie nowa, zakupion w media expert. Gwarancja do 11.01.2022. Preferuję odbiór osobisty', '', 0),
(9, '2021-01-11', 'Super mikser Zelmer', 139, 'Buk 32, 32-075 Gołcza', 'AGD', 'https://cdn.al.to/i/setup/images/prod/big/product-large,,2017/10/pr_2017_10_9_13_24_54_592_00.jpg', 'ładny mikser, prkatyczny, 8 różnych mocy obrotu. Dodatkowa moc TURBO!!! Zasilany prądem 220V. Dodatkowo Etui ', '', 0),
(10, '2021-01-11', 'Xbox one X', 3000, 'Gdynia, ul. Słoneczna 10', 'Komputery stacjonarne', 'https://cdn.benchmark.pl/uploads/backend_img/c/recenzje/2017/8640_Xbox_One_X_test/1.jpg', 'Konsola całkowicie nowa, zakupion w media expert. Gwarancja do 11.01.2022. Preferuję odbiór osobisty', 'ala', 0),
(11, '2021-01-11', 'Roundup', 30, 'Wysocice 93, 32-075 Gołcza', 'Rolnictwo', 'https://i1.wp.com/imaginecare.co.ke/wp-content/uploads/2019/05/Roundup-turbo-3.jpg?fit=4160%2C3120&ssl=1', 'Najlepsza cena. Lepsza niż w Agro Gołcza tfu', 'ala', 0),
(12, '2021-01-12', 'Lenovo thinkpad t460s', 1600, 'Kraków, ul. Wesele 6', 'Laptopy', 'https://www.refurbishedlaptops.co.uk/wp-content/uploads/2019/08/Lenovo-Thinkpad-T460s.jpg', 'Laptop zakupiony kilka tygodni temu na amso. Bateria wytrzymuje 6 godzin. jest ok', 'ala', 0),
(13, '2021-01-12', 'Dell latitude 5400', 2500, 'Katowice, ul. Mickiewicza 10', 'Laptopy', 'https://cdn.neow.in/news/images/uploaded/2019/09/1569632210_latitude_1.jpg', 'Laptop zakupiony kilka tygodni temu na amso. Bateria wytrzymuje 6 godzin. jest ok i ogólnie fajny', 'ala', 123123123),
(15, '2021-01-15', 'Piec kocioł z podajnikiem', 7500, 'Miechów ul. Wesoła 4', 'Rolnictwo', 'https://ireland.apollo.olxcdn.com/v1/files/tedw1k76i4ks2-PL/image;s=1000x700', 'Kocioł dostępny o mocy grzewczej: 10kW, 15kW,19kW,25kW,35kw  Jeden z nielicznych tego typu kotłów na polskim rynku. Wyróżnia się swoistym rozwiązaniem w budowie kotłów klas piątych. Do licznych zalet naszego kotła możemy zaliczyć: - niezawodny i jedyny w swoim rodzaju palnik z obrotowym rusztem dzięki jego zastosowaniu został rozwiązany problem z niedopalaniem szkodliwych związków.', 'ala', 123123123),
(16, '2021-01-15', 'Pokój 12m2, wolny od zaraz', 450, 'Wrocław ul. Krakowska 12', 'Nieruchmosci', 'https://ireland.apollo.olxcdn.com/v1/files/qlm2gptwg56c3-PL/image;s=1000x700', 'Do wynajęcia pokój w mieszkaniu w kamienicy na drugim piętrze na ul. Niegolewskich 9.  Pokój ma około 12m2, wyposażony w kanape rozkładaną, dużą szafę pax, duże biurko, W mieszkaniu są dwie łazienki- jedna z wanną, druga z prysznicem, duża kuchnia, dwie lodówki,', 'ala', 123123123),
(17, '2021-01-15', 'VW Jetta 2013 2.0 TDI', 29500, 'Będzin ul. Zabawna 123', 'Samochody', 'https://ireland.apollo.olxcdn.com/v1/files/htu42h2alutv-PL/image;s=1000x700', 'Jetta 2013 rok. Wszystko sprawne. Dobrze utrzymane i serwisowane. Obecnie olej z technologią ceramiczna. Przebieg oryginalny. Nie jestem handlarzem. Opony i koła na zimę i lato w bardzo dobrym stanie. Olej zmieniany co 8 tys a nawet mniej w ostatnim czasie. wymieniony olej w skrzyni kilka miesięcy temu.', 'ala', 123123123);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `user_id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `login` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`user_id`, `email`, `login`, `password`, `phone`) VALUES
(15, 'adison@interia.pl', 'adison', 'twojastara', '123456789'),
(18, 'adr.bugaj@gmail.com', 'adrian', '123123123', '123123123'),
(19, 'bugaja2@op.pl', 'adryjan', 'adryjan', '123123123'),
(20, 'szymonzwysocic2@interia.pl', 'szymon', 'szymon', '111111111'),
(21, 'mateusz', 'mateusz', 'mateusz', '123123123'),
(22, 'roman@gmail.com', 'roman', '', '123123123'),
(23, 'roman@gmail.com', 'romanek', '$2y$10$NAVy6xSz4mMxqDNlp8e7P.5xLCOMq0Q2lAnGTg0Y8MFQMT8qy5wAi', '123123123'),
(24, 'pawel@gmail.com', 'pawel', '$2y$10$U84/AG6Fxp/X2vH6qKrd0OwM31BVLAtHGu8GQNbec8Sds6nF7ASvO', '123123123'),
(25, 'ala@gmail.com', 'ala', '$2y$10$gF3CvQ8zIPnTmC5pQKMdreunD5CJbqHXTj5RegF2PkBHd8mOopfNm', '123123123'),
(26, 'ola@gmail.com', 'aleksandra', '$2y$10$6ga79SnQNXs/KSXdIfLu5ub0LwsO/qX/wMeLO3h8GompKOgL5s6Su', '123123123'),
(27, 'mateo95@gmail.com', 'mateo95', '$2y$10$pxK9yeqkJbVMdgZAfbWRcuk7EJ3RV5qkniP2naLpD1kWarwRkGxqK', '123123123'),
(28, 'macius@gmail.com', 'maciek', '$2y$10$6cRtwCOCFgzNk7LVXkQsceootyLlkHHPZGD2FoWHRKJLB9G44raL2', '123123123'),
(29, 'adison@interia.pl', 'maciek', '$2y$10$lfLSkimpPT3dRg/K9hLEWu0z/dxYpsOEp8Ksjx8q6Rpb.gVZAt..e', '123123123'),
(30, 'damian@interia.pl', 'Damianek123', '$2y$10$YOG9hrpjLo.AmOLmgruB5.rOnwJnbVgxLNLLnIh4ms0m7uuUkt2iS', '562315698'),
(31, 'marcinek@gmail.com', 'marcinek123', '$2y$10$M/kSfOmHcSIYo8Wr0wsz8ugLrTuBrwx6F6qBB2KqNa2irRgu0jnNq', '143654876'),
(32, 'aleksandra123@gmail.com', 'aleksandra123', '$2y$10$JkhPbgTnUn6G3mAbO6ti7.vsoSYWxzVNFnoX7leQ.Hcq671wzRXOO', '123342343'),
(33, 'maciek@gmail.com', 'maciek1234', '$2y$10$vSvlLDmH6oerPHDFlxEYX.gennwdyzwj4TD4xKRbVYsVYieO6GPza', '123123123');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `ogloszenia`
--
ALTER TABLE `ogloszenia`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `ogloszenia`
--
ALTER TABLE `ogloszenia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
