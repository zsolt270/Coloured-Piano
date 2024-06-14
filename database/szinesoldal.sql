
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `resetpassword` (
  `ResetPwdID` int(11) NOT NULL,
  `ResetPwdEmail` text NOT NULL,
  `ResetPwdToken` longtext NOT NULL,
  `ResetPwdExpDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `songs` (
  `song_id` int(11) NOT NULL,
  `song_title` varchar(50) NOT NULL,
  `song_sheet_path` text NOT NULL,
  `song_file_path` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `songs` (`song_id`, `song_title`, `song_sheet_path`, `song_file_path`) VALUES
(1, 'Zsipp-Zsupp', 'imgs/sheets/zsipzsup.webp', 'audio_files/songs/zsippzsupp.mp3'),
(2, 'Én kis kertet kerteltem', 'imgs/sheets/enkiskertet.webp', 'audio_files/songs/enkiskertet.mp3'),
(3, 'Éliás, Tóbiás', 'imgs/sheets/elias.webp\n', 'audio_files/songs/eliasTobias.mp3'),
(4, 'Fecskét látok', 'imgs/sheets/fecsket.webp', 'audio_files/songs/fecsketlatok.mp3'),
(5, 'Aki nem lép egyszerre', 'imgs/sheets/akinemlep.webp\n', 'audio_files/songs/akinemlepegyszerre.mp3'),
(6, 'Megy a kocsi, fut a kocsi', 'imgs/sheets/jonakocsi.webp\n', 'audio_files/songs/jonakocsi.mp3'),
(7, 'Ég a gyertya, ég', 'imgs/sheets/egagyertya.webp\n', 'audio_files/songs/egagyertya.mp3'),
(8, 'Kis kece lányom', 'imgs/sheets/kiskece.webp\n', 'audio_files/songs/kiskecelanyom.mp3');


CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `vkey` text NOT NULL,
  `verified` tinyint(1) NOT NULL,
  `creation_date` date NOT NULL DEFAULT curtime(),
  `expiry_date` date NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `song_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `resetpassword`
  ADD PRIMARY KEY (`ResetPwdID`);


ALTER TABLE `songs`
  ADD PRIMARY KEY (`song_id`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `song_id` (`song_id`);


ALTER TABLE `resetpassword`
  MODIFY `ResetPwdID` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `songs`
  MODIFY `song_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;


ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`song_id`) REFERENCES `songs` (`song_id`);
COMMIT;