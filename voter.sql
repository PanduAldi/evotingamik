-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 04 Nov 2015 pada 20.55
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
