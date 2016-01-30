-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 31 Jan 2016 pada 05.56
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `evote`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `calon`
--

CREATE TABLE IF NOT EXISTS `calon` (
  `id_calon` int(11) NOT NULL AUTO_INCREMENT,
  `nim` varchar(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `visi` text NOT NULL,
  `img` varchar(50) NOT NULL,
  PRIMARY KEY (`id_calon`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `calon`
--

INSERT INTO `calon` (`id_calon`, `nim`, `nama`, `prodi`, `visi`, `img`) VALUES
(1, '12383023', 'pandu aldi pratama', 'manajemen informatika', '<p>asowkoskwoksok</p>\r\n', 'Pandhu.jpg'),
(2, '12383022', 'Nurdiyansah nova k', 'manajemen informatika', '<p>iqjijqiwjiq qiwji qwij q</p>\r\n', 'amik.jpg'),
(3, '1212', 'budiman', 'manajemen informatika', '<p>Ksaiiaskjk</p>\r\n', '533927_437870252971584_1088888724_a.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `id_calon` int(11) NOT NULL,
  PRIMARY KEY (`id_log`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `statistik`
--

CREATE TABLE IF NOT EXISTS `statistik` (
  `id_statistik` int(11) NOT NULL AUTO_INCREMENT,
  `id_calon` int(11) NOT NULL,
  `jum_suara` int(3) NOT NULL,
  `prosentase` float NOT NULL,
  PRIMARY KEY (`id_statistik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `level` enum('admin','panitia') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'panitia', 'panitia', 'd32b1673837a6a45f795c13ea67ec79e', 'panitia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `voter`
--

CREATE TABLE IF NOT EXISTS `voter` (
  `id_pemilih` int(11) NOT NULL AUTO_INCREMENT,
  `nim` int(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_aktivasi` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`id_pemilih`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `voter`
--

INSERT INTO `voter` (`id_pemilih`, `nim`, `nama`, `no_aktivasi`, `status`) VALUES
(1, 1232, 'qasa', '1811176759', 'belum di aktivasi'),
(2, 12383025, 'asaso iuwieu a', '278595305', 'belum di aktivasi'),
(3, 12383025, 'adasasasdas', '1553326654', 'belum di aktivasi'),
(4, 12383025, 'Fasilitas', '511449720', 'belum di aktivasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktu_pemilihan`
--

CREATE TABLE IF NOT EXISTS `waktu_pemilihan` (
  `id_waktu` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(30) NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  PRIMARY KEY (`id_waktu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `waktu_pemilihan`
--

INSERT INTO `waktu_pemilihan` (`id_waktu`, `status`, `waktu_mulai`, `waktu_selesai`) VALUES
(1, 'belum dimulai', '00:00:00', '00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
