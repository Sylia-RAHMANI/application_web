-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 11 juin 2020 à 15:29
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `jeu`
--

-- --------------------------------------------------------

--
-- Structure de la table `countries`
--

CREATE TABLE `countries` (
  `id_pays` int(11) NOT NULL,
  `nom_pays` varchar(25) NOT NULL,
  `nom_continent` varchar(25) NOT NULL,
  `flag` mediumtext NOT NULL,
  `url_pays` mediumtext NOT NULL,
  `capitale` mediumtext NOT NULL,
  `image` mediumtext NOT NULL,
  `surface` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `countries`
--

INSERT INTO `countries` (`id_pays`, `nom_pays`, `nom_continent`, `flag`, `url_pays`, `capitale`, `image`, `surface`) VALUES
(1, 'Algérie', 'Afrique', '../modéle/countries/data/dza.svg', '../modéle/countries/data/dza.geo.json', 'Alger ', '..\\modéle\\css\\images\\Alger.jpg', 2381740),
(2, 'Tanzanie', 'Afrique', '../modéle/countries/data/tza.svg', '../modéle/countries/data/tza.geo.json', 'Dodoma', '..\\modéle\\css\\images\\Tanzanie.jpg', 945087),
(3, 'Namibie', 'Afrique', '../modéle/countries/data/nam.svg', '../modéle/countries/data/nam.geo.json', 'Windhoek', '..\\modéle\\css\\images\\Namibie.jpg', 824268),
(4, 'Tchad', 'Afrique', '../modéle/countries/data/tcd.svg', '../modéle/countries/data/tcd.geo.json', 'N\'Djamena', '..\\modéle\\css\\images\\Tchad.jpg', 1284000),
(5, 'Sénégal', 'Afrique', '../modéle/countries/data/sen.svg', '../modéle/countries/data/sen.geo.json', 'Dakar', '..\\modéle\\css\\images\\sénégal.jpg', 196722),
(6, 'Guinee', 'Afrique', '../modéle/countries/data/gin.svg', '../modéle/countries/data/gin.geo.json', 'Francais', 'https://i.pinimg.com/originals/72/f9/9f/72f99ff2093a471ae076ca173ee3aa35.jpg', 245857),
(7, 'Guinee-Bissau', 'Afrique', '../modéle/countries/data/gnb.svg', '../modéle/countries/data/gnb.geo.json', 'Portugais', 'https://static01.nyt.com/images/2009/11/08/travel/08Bijagosspan-1/articleLarge.jpg', 36125),
(8, 'Guinee equatoriale', 'Afrique', '../modéle/countries/data/gnq.svg', '../modéle/countries/data/gnq.geo.json', 'espagnol', 'https://www.archiliste.fr/sites/default/files/styles/juicebox_medium/public/projets/enia-architectes/tour-guinee-guinee-equatoriale/2010997-4132-1.jpg', 28050),
(9, 'Ethiopie', 'Afrique', '../modéle/countries/data/eth.svg', '../modéle/countries/data/eth.geo.json', 'Amharique', 'https://cdn.thecrazytourist.com/wp-content/uploads/2016/06/The-Blue-Nile-Falls.jpg', 1104000),
(10, 'Ghana', 'Afrique', '../modéle/countries/data/gha.svg', '../modéle/countries/data/gha.geo.json', 'Anglais', 'https://dynaimage.cdn.cnn.com/cnn/q_auto,w_412,c_fill,g_auto,h_232,ar_16:9/http%3A%2F%2Fcdn.cnn.com%2Fcnnnext%2Fdam%2Fassets%2F190206165057-senya-beraku.jpg', 238535),
(11, 'Argentine', 'Amerique', '../modéle/countries/data/arg.svg', '../modéle/countries/data/arg.geo.json', 'Buenos Aires', '..\\modéle\\css\\images\\argentine.jpg', 2780400),
(12, 'Brésil', 'Amerique', '../modéle/countries/data/bra.svg', '../modéle/countries/data/bra.geo.json', 'Brasilia', '..\\modéle\\css\\images\\bresil.jpg', 8514880),
(13, 'Chili', 'Amerique', '../modéle/countries/data/chl.svg', '../modéle/countries/data/chl.geo.json', 'Santiago', '..\\modéle\\css\\images\\chili.jpg', 756102),
(14, 'Colombie', 'Amerique', '../modéle/countries/data/col.svg', '../modéle/countries/data/col.geo.json', 'Bogota', '..\\modéle\\css\\images\\colombie.jpg', 1141750),
(15, 'Paraguay', 'Amerique', '../modéle/countries/data/pry.svg', '../modéle/countries/data/pry.geo.json', 'Asunción', '..\\modéle\\css\\images\\parag.jpg', 406752),
(16, 'Canada', 'Amerique', '../modéle/countries/data/can.svg', '../modéle/countries/data/can.geo.json', 'Ottawa', '..\\modéle\\css\\images\\canada.jpg', 9984670),
(17, 'Etats-Unis', 'Amerique', '../modéle/countries/data/usa.svg', '../modéle/countries/data/usa.geo.json', 'Washington', '..\\modéle\\css\\images\\amerique.jpg', 9371180),
(18, 'Mexique', 'Amerique', '../modéle/countries/data/mex.svg', '../modéle/countries/data/mex.geo.json', 'Mexico', '..\\modéle\\css\\images\\mexique.jpg', 1964380),
(19, 'Costa Rica', 'Amerique', '../modéle/countries/data/cri.svg', '../modéle/countries/data/cri.geo.json', 'Espagnol', 'https://www.kcsanjose.com/blog/core/_media/2017/05/cr12.jpg', 51100),
(20, 'Curacao', 'Amerique', '../modéle/countries/data/cuw.svg', '../modéle/countries/data/cuw.geo.json', 'neerlandais', 'https://fr.wikipedia.org/wiki/Cura%C3%A7ao', 444),
(21, 'Espagne', 'Europe', '../modéle/countries/data/esp.svg', '../modéle/countries/data/esp.geo.json', 'Madrid', '..\\modéle\\css\\images\\espagne.jpg', 505992),
(22, 'Belgique', 'Europe', '../modéle/countries/data/bel.svg', '../modéle/countries/data/bel.geo.json', 'Bruxelles', '..\\modéle\\css\\images\\belgique.jpg', 30528),
(23, 'Portugal', 'Europe', '../modéle/countries/data/prt.svg', '../modéle/countries/data/prt.geo.json', 'Lisbonne', '..\\modéle\\css\\images\\portugal.jpg', 92212),
(24, 'France', 'Europe', '../modéle/countries/data/fra.svg', '../modéle/countries/data/fra.geo.json', 'paris', '..\\modéle\\css\\images\\pariss.jpg', 640597),
(25, 'Autriche', 'Europe', '../modéle/countries/data/aut.svg', '../modéle/countries/data/aut.geo.json', 'Vienne', '..\\modéle\\css\\images\\autriche.jpg', 83871),
(26, 'Albanie', 'Europe', '../modéle/countries/data/alb.svg', '../modéle/countries/data/alb.geo.json', 'Albanais', 'https://legourmandvoyageur.com/wp-content/uploads/2016/10/IMG_2568-Albanie-le-gourmand-voyageur.jpg', 28748),
(27, 'Iles Aland', 'Europe', '../modéle/countries/data/ala.svg', '../modéle/countries/data/ala.geo.json', 'Suedois', 'https://d34ip4tojxno3w.cloudfront.net/app/uploads/%C3%85land-small-harbour.jpg', 1580),
(28, 'Malte', 'Europe', '../modéle/countries/data/mlt.svg', '../modéle/countries/data/mlt.geo.json', 'maltais', 'https://www.photoway.com/images/malte/MLT02_N2_08-tourisme-malte.jpg', 316),
(29, 'Macedoine', 'Europe', '../modéle/countries/data/mkd.svg', '../modéle/countries/data/mkd.geo.json', 'macedonien', 'https://www.atalante.fr/upload_1000/albanie_skojpe_albania_tradition_ld.jpg', 25713),
(30, 'Grece', 'Europe', '../modéle/countries/data/grc.svg', '../modéle/countries/data/grc.geo.json', 'Grec', 'https://www.tourmag.com/photo/art/default/7714819-11938539.jpg', 131957),
(31, 'Arménie', 'Asie', '../modéle/countries/data/arm.svg', '../modéle/countries/data/arm.geo.json', 'Erevan', '..\\modéle\\css\\images\\armenie.jpg', 29743),
(32, 'Irak', 'Asie', '../modéle/countries/data/irq.svg', '../modéle/countries/data/irq.geo.json', 'Bagdad', '..\\modéle\\css\\images\\irak.jpg', 435244),
(33, 'Liban', 'Asie', '../modéle/countries/data/lbn.svg', '../modéle/countries/data/lbn.geo.json', 'Beyrouth', '..\\modéle\\css\\images\\liban.jpg', 10452),
(34, 'Japon', 'Asie', '../modéle/countries/data/jpn.svg', '../modéle/countries/data/jpn.geo.json', 'Tokyo', '..\\modéle\\css\\images\\japon.jpg', 377930),
(35, 'Chine', 'Asie', '../modéle/countries/data/chn.svg', '../modéle/countries/data/chn.geo.json', 'Pékin', '..\\modéle\\css\\images\\chine.jpg', 9598000),
(36, 'Jordanie', 'Asie', '../modéle/countries/data/jor.svg', '../modéle/countries/data/jor.geo.json', 'Arabe', 'https://weekend.levif.be/medias/11631/5955127.jpg', 89342),
(37, 'Afghanistan', 'Asie', '../modéle/countries/data/afg.svg', '../modéle/countries/data/afg.geo.json', 'Pachto', 'https://i2.wp.com/www.hisour.com/wp-content/uploads/2018/07/Tourism-in-Afghanistan.jpg', 652237),
(38, 'Kazakhstan', 'Asie', '../modéle/countries/data/kaz.svg', '../modéle/countries/data/kaz.geo.json', 'kazakh', 'https://img.traveltriangle.com/blog/wp-content/tr:w-700,h-400/uploads/2018/01/acj-2301-kazakhstan-tourist-attractions-6.jpg', 2725000),
(39, 'Kirghizistan', 'Asie', '../modéle/countries/data/kgz.svg', '../modéle/countries/data/kgz.geo.json', 'kirghize', 'https://www.vizeo.net/wp-content/uploads/2017/03/VOYAGER-KIRGHIZISTAN-FILLE.jpeg', 199900),
(40, 'Cambodge', 'Asie', '../modéle/countries/data/khm.svg', '../modéle/countries/data/khm.geo.json', 'Khmer', 'https://i.pinimg.com/474x/a8/15/97/a8159760f3f49b22d75768bf541f9d5f.jpg', 181035),
(41, 'Australie', 'Océanie', '../modéle/countries/data/aus.svg', '../modéle/countries/data/aus.geo.json', 'Canberra', '..\\modéle\\css\\images\\austra.jpg', 7692060),
(42, 'Palaos', 'Océanie', '../modéle/countries/data/plw.svg', '../modéle/countries/data/plw.geo.json', 'Melekeok', '..\\modéle\\css\\images\\pala.jpg', 459),
(43, 'Tonga', 'océanie', '../modéle/countries/data/ton.svg', '../modéle/countries/data/ton.geo.json', 'Nukualofa', '..\\modéle\\css\\images\\tonga.jpg', 747),
(44, 'Fidji', 'Océanie', '../modéle/countries/data/fji.svg', '../modéle/countries/data/fji.geo.json', 'Suva', '..\\modéle\\css\\images\\fidji.jpg', 18272),
(45, 'Tuvalu', 'Océanie', '../modéle/countries/data/tuv.svg', '../modéle/countries/data/tuv.geo.json', 'Fanafuti', '..\\modéle\\css\\images\\tuv.jpg', 26),
(46, 'Vanuatu', 'Océanie', '../modéle/countries/data/vut.svg', '../modéle/countries/data/vut.geo.json', 'francais', 'https://devpolicy.org/wp-content/uploads/2015/06/aerial-28626.jpg', 12199),
(47, 'Wallis et Futuna', 'Océanie', '../modéle/countries/data/wlf.svg', '../modéle/countries/data/wlf.geo.json', 'Francais', 'https://www.wallis-et-futuna.wf/images/sampledata/voyager/voyager19.jpg', 142),
(48, 'Samoa', 'Océanie', '../modéle/countries/data/wsm.svg', '../modéle/countries/data/wsm.geo.json', 'samoan', 'https://i.pinimg.com/originals/11/fc/e4/11fce45cd8f9e55b908c9188a3d45c72.jpg', 2842),
(49, 'Polynesie francaise', 'Océanie', '../modéle/countries/data/pyf.svg', '../modéle/countries/data/pyf.geo.json', 'Francais', 'https://www.bestjobersblog.com/wp-content/uploads/2018/02/25-Polynesie-Rangiroa.jpg', 4167),
(50, 'Micronesie', 'Océanie', '../modéle/countries/data/fsm.svg', '../modéle/countries/data/fsm.geo.json', 'Anglais', 'https://www.gayvoyageur.com/wp-content/uploads/2019/01/destination-gay-micronesie.jpg', 702),
(51, 'Tokelau', 'Océanie', '../modéle/countries/data/tkl.svg', '../modéle/countries/data/tkl.geo.json', 'tokelau', 'https://i.ytimg.com/vi/4YsCkpmKhPk/hqdefault.jpg', 10);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `dateInscrip` datetime NOT NULL,
  `email` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `Nom`, `Prenom`, `dateInscrip`, `email`, `mdp`) VALUES
(25, 'sylia-93', 'rahmani', 'sylia', '1999-09-14 00:00:00', 'souadhajali99@gmail.com', '0f800a36e4dbfd067024fcd0cb907cf43e34e959'),
(27, 'Lizli_95', 'hadj-ali', 'souad', '2020-04-05 00:00:00', 'souaadhajali99@gmail.com', '0f800a36e4dbfd067024fcd0cb907cf43e34e959');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id_pays`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `countries`
--
ALTER TABLE `countries`
  MODIFY `id_pays` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
