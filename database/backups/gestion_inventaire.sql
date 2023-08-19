-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2020 at 11:10 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_inventaire`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `activity` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dossiers`
--

CREATE TABLE `dossiers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`phone`)),
  `user_licenses` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dossier_licenses` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_license` tinyint(1) NOT NULL,
  `license_start_date` timestamp NULL DEFAULT NULL,
  `license_end_date` timestamp NULL DEFAULT NULL,
  `subdomain` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dossier_db_name` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dossiers`
--

INSERT INTO `dossiers` (`id`, `name`, `description`, `phone`, `user_licenses`, `dossier_licenses`, `date_license`, `license_start_date`, `license_end_date`, `subdomain`, `dossier_db_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test2', NULL, NULL, 'unlimited', 'unlimited', 1, NULL, NULL, 'test2', 'test2', 1, '2020-10-28 00:14:17', '2020-10-28 00:14:17');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fcm_r_per_service`
--

CREATE TABLE `fcm_r_per_service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Code_service` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Code_service',
  `nom_serivce` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Nom_serivce',
  `Code_service_vers` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Code_service_vers',
  `bo_ouinon` tinyint(1) DEFAULT NULL COMMENT 'Bo_ouinon',
  `finance_ouinon` tinyint(1) DEFAULT NULL COMMENT 'Finance_ouinon',
  `Compta_ouinon` tinyint(1) DEFAULT NULL COMMENT 'Compta_ouinon',
  `nombrejours` smallint(6) DEFAULT NULL COMMENT 'Nombrejours',
  `couleur_fond` bigint(20) DEFAULT NULL COMMENT 'couleur_fond',
  `couleur_police` bigint(20) DEFAULT NULL COMMENT 'couleur_police',
  `rang` bigint(20) DEFAULT NULL COMMENT 'rang',
  `coddep_vers` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'coddep_destinataire',
  `numbsor` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'N° bon de sortie',
  `numbret` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'N° bon de retour',
  `numdemappro` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'N° bon de sortie',
  `code_service_parent` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'code_service_parent',
  `numordre_arbrre` bigint(20) DEFAULT NULL COMMENT 'numero ordre dans l''arbre',
  `numordre_parent` bigint(20) DEFAULT NULL COMMENT 'numordre_parent',
  `NOM_service_parent` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'NOM_service_parent',
  `Chemin_circuit` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Chemin_circuit',
  `codpers_chefservice` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'codpers_chefservice',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fc_per_article`
--

CREATE TABLE `fc_per_article` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Code_article` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'code article',
  `libe_article` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'libelle article',
  `emplacement` varchar(31) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'emplacement',
  `CODE_tva` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'CODE_tva',
  `stock_Actuel` decimal(12,3) DEFAULT NULL COMMENT 'stock_Actuel',
  `stock_mintolere` decimal(12,3) DEFAULT NULL COMMENT 'stock minimum tolere',
  `Prix_usine` decimal(12,3) DEFAULT NULL COMMENT 'PRIx d''usine',
  `remise_usine` decimal(5,2) DEFAULT NULL COMMENT 'remise usine',
  `prixachat_ht` decimal(12,3) DEFAULT NULL COMMENT 'prix d''achat ht',
  `Prixachat_ttc` decimal(12,3) DEFAULT NULL COMMENT 'prix d''achat ttc',
  `prixachat_moyenpondere` decimal(12,3) DEFAULT NULL COMMENT 'prix d''achat moyen pondre',
  `prixvente_ht` decimal(12,3) DEFAULT NULL COMMENT 'prix de vente ht',
  `prixvente_ttc` decimal(12,3) DEFAULT NULL COMMENT 'prix de vente ttc',
  `Dernier_numinventaire` bigint(20) DEFAULT NULL COMMENT 'DErnier_numinventaire',
  `dernier_date_inventaire` date DEFAULT NULL COMMENT 'dernier date inventaire',
  `dernier_qte_inventaire` decimal(12,3) DEFAULT NULL COMMENT 'dernier stock inventaire',
  `article_nonstocke` tinyint(1) DEFAULT NULL COMMENT 'article non stocke',
  `description` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'detail article',
  `marge_beneficiaire` decimal(7,4) DEFAULT NULL COMMENT 'marge_beneficiaire',
  `remisemax_article` decimal(5,2) DEFAULT NULL COMMENT 'remise max article',
  `remisefixe_article` decimal(5,2) DEFAULT NULL COMMENT 'remise fixe article',
  `article_parlot` tinyint(1) DEFAULT NULL COMMENT 'article_parlot',
  `nb_piecepaquet` decimal(12,3) DEFAULT NULL COMMENT 'Nbre de piece par paquet',
  `image_article` blob DEFAULT NULL COMMENT 'image_article',
  `longueur_article` decimal(12,3) DEFAULT NULL COMMENT 'longueur article',
  `largeur_article` decimal(12,3) DEFAULT NULL COMMENT 'largeur_article',
  `hauteur_article` decimal(12,3) DEFAULT NULL COMMENT 'hauteur_article',
  `poids` decimal(12,3) DEFAULT NULL COMMENT 'poids',
  `DATE_blocage` date DEFAULT NULL COMMENT 'DATE blocage article',
  `artile_origine` tinyint(1) DEFAULT NULL COMMENT 'artile_origine',
  `CODE_blocage` smallint(6) DEFAULT NULL COMMENT 'CODE_blocage',
  `Code_unitemesure` smallint(6) DEFAULT NULL COMMENT 'Code_unitemesure',
  `Stock_depart` decimal(12,3) DEFAULT NULL COMMENT 'Stock_depart',
  `DATE_stock_depart` date DEFAULT NULL COMMENT 'DATE_stock_depart',
  `article_suittarif` tinyint(1) DEFAULT NULL COMMENT 'article_suittarif',
  `article_suitpromotion` tinyint(1) DEFAULT NULL COMMENT 'article_suitpromotion',
  `Compt_article` varchar(21) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'COMPt_article',
  `Prefixe_article` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Prefixe_article',
  `Utilisateur_creation` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Utilisateur_creation',
  `dateheure_creation` datetime DEFAULT sysdate() COMMENT 'dateheure_creation',
  `Utilisateur_modif` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Utilisateur_modif',
  `dateheure_modif` datetime DEFAULT NULL COMMENT 'dateheure_modif',
  `nbjoursrappel_avantperime` tinyint(4) DEFAULT NULL COMMENT 'nbjoursrappel_avantperime',
  `BLocage_articleperime` tinyint(1) DEFAULT NULL COMMENT 'BLocage_articleperime',
  `stockglobal` bigint(20) DEFAULT NULL COMMENT 'stockglobal',
  `stockaffecte` bigint(20) DEFAULT NULL COMMENT 'stockaffecte',
  `stocksortexcep` bigint(20) DEFAULT NULL COMMENT 'stocksortexcep',
  `stocksortdiv` bigint(20) DEFAULT NULL COMMENT 'stocksortdiv',
  `cod_groupearticle` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'cod_groupearticle',
  `code_tpf` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'code tpf',
  `engin` tinyint(1) DEFAULT NULL COMMENT 'engin',
  `Dernier_numinv` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Dernier_numinv',
  `Code_famille` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Code_famille',
  `code_sousfamille` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'code_sousfamille',
  `prixachat_ht_depart` decimal(12,3) DEFAULT NULL COMMENT 'prixachat_ht_depart',
  `remise_achat` decimal(5,2) DEFAULT NULL COMMENT 'remise_achat',
  `color_gamra` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'color_gamra',
  `remise_achat_plus` decimal(5,2) DEFAULT NULL COMMENT 'remise_achatplus',
  `Cle_sousfamille` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Cle_sousfamille',
  `libart_short1` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'libart_short1',
  `libart_short2` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'libart_short2',
  `AFFiche_margebeneficiaire` int(10) UNSIGNED DEFAULT NULL COMMENT 'AFFiche_margebeneficiaire',
  `Code_article_matiere` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'code article',
  `Cod_operation` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Cod_operation',
  `cle_atlas` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'cle_atlas',
  `cODE_article_matiere_AR` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'code article',
  `Temp_preparation_article` time DEFAULT NULL COMMENT 'Temp_preparation_article',
  `nonAfficher_descriptionarticlevente` tinyint(1) DEFAULT NULL COMMENT 'Afficher_descriptionarticlevente',
  `observation` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'OBSER',
  `Index_FullText` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Code_article + libe_article + description + Prefixe_article + libart_short1 + libart_short2 + emplacement + observation + Code_famille + code_sousfamille',
  `transferable` tinyint(1) DEFAULT NULL COMMENT 'transferable',
  `prixachange` tinyint(1) DEFAULT NULL COMMENT 'prixachange',
  `prix_homologue` decimal(12,3) DEFAULT NULL COMMENT 'prix_homologue',
  `Index_FullText_libarticle` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'libe_article',
  `option_scolaire` tinyint(1) DEFAULT NULL COMMENT 'option_scolaire',
  `service_scolaire` tinyint(1) DEFAULT NULL COMMENT 'service_scolaire',
  `est_menu` tinyint(1) DEFAULT NULL COMMENT 'Cette article est un article composé ( menu )',
  `IDfc_per_collaborateur` bigint(20) DEFAULT NULL COMMENT 'Identifiant de fc_per_collaborateur',
  `inter_impressionticket` tinyint(1) DEFAULT NULL COMMENT 'inter_impressionticket',
  `article_matierepremierre` tinyint(1) DEFAULT NULL COMMENT 'article_matierepremierre',
  `article_semifini` tinyint(1) DEFAULT NULL COMMENT 'article_semifini',
  `Compte_comptable_article` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'COMPte_comptable_article',
  `Compte_analytique_article` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Compte_analytique_article',
  `compte_budgetaire_article` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'compte_budgetaire_article',
  `inter_declinaison` tinyint(1) DEFAULT NULL COMMENT 'inter_declinaison',
  `article_durable` tinyint(1) DEFAULT NULL COMMENT 'article_durable',
  `Article_consommation_interne` tinyint(1) DEFAULT NULL COMMENT 'Article_consommation_interne',
  `Article_parcautomobile` tinyint(1) DEFAULT NULL COMMENT 'Article_parcautomobile',
  `Cree_objetdepart` tinyint(1) DEFAULT NULL COMMENT 'Cree_objetdepart (integrant_thabet)',
  `mouvemente` tinyint(1) DEFAULT NULL COMMENT 'mouvemente (integrant_thabet)',
  `Article_avecnumserie` tinyint(1) DEFAULT NULL COMMENT 'Article_avecnumserie',
  `nbPtFideliteUnitaire` decimal(9,3) DEFAULT NULL COMMENT 'nbPtFideliteUnitaire',
  `nbrjour_valide` bigint(20) DEFAULT NULL COMMENT 'nbrjour_valide',
  `Code_collection` bigint(20) DEFAULT NULL COMMENT 'Code_collection',
  `Article_avecconsigne` tinyint(1) DEFAULT NULL COMMENT 'Article_avecconsigne',
  `cODE_consignearticle` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'cODE_consignearticle',
  `cODE_serviceboncoupe` smallint(6) DEFAULT NULL COMMENT 'cODE_serviceboncoupe',
  `affichageConsigneAuto` tinyint(1) DEFAULT NULL COMMENT 'affichageConsigneAuto',
  `Libe_famille` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Libe_famille',
  `LIbe_soufamille` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'LIbe_soufamille',
  `ref_articleorigine` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ref_articleorigine',
  `Index_FullText_libfamille` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Libe_famille',
  `Index_FullText_libsousfamille` text COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'LIbe_soufamille',
  `codeabarre` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'codeabarre ajoute pour utiliser requete(l''ordre)',
  `prix_pose_ht` decimal(12,3) DEFAULT NULL COMMENT 'prix_pose : prix montage de l''article',
  `code_balance_art` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'code_balance',
  `codeInterne` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'codeInterne',
  `raccourci_balance` bigint(20) DEFAULT NULL COMMENT 'raccourci_balance',
  `Marge_prix_pose_ht_pachatht` decimal(6,3) DEFAULT NULL COMMENT 'Marge_prix_pose_ht_pachatht',
  `balance_article_connecte` tinyint(1) DEFAULT NULL COMMENT 'balance_article_connecte',
  `article_pese_unitaire` tinyint(4) DEFAULT NULL COMMENT 'article_pese_unitaire',
  `article_sansremise` tinyint(1) DEFAULT NULL COMMENT 'article_sansremise',
  `couleur_article` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'couleur_article',
  `prix_vente_public` decimal(12,3) DEFAULT NULL COMMENT 'prix_vente_public',
  `width` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'width (client gamra',
  `weight_oz` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'weight_oz (client gamra',
  `quality` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'quality (client gamra',
  `Weave` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Weave (client gamra',
  `weight_gsm` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'weight_gsm (client gamra',
  `typeAbonnement` tinyint(4) DEFAULT NULL COMMENT 'typeAbonnement',
  `type_a_v` smallint(6) DEFAULT NULL COMMENT 'typearticle_vente_achat',
  `codArtVrac` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'codArtVrac',
  `qteArtVrac` decimal(12,3) DEFAULT NULL COMMENT 'qteArtVrac',
  `kind` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'kind fa (client gamra)',
  `Composition` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Composition (client gamra',
  `density` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'density (client gamra',
  `stretch` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'stretch (client gamra',
  `Growth` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Growth (client gamra)',
  `recovery` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'recovery (client gamra)',
  `shrinkage` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'shrinkage (client gamra)',
  `finishing` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'finishing (client gamra)',
  `Construction` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Construction (client gamra)',
  `article_rendezVous` tinyint(1) DEFAULT NULL COMMENT 'article_rendezVous',
  `stock_maxtolere` decimal(12,3) DEFAULT NULL COMMENT 'stock_maxtolere',
  `stock_min` decimal(12,3) DEFAULT NULL COMMENT 'stock_min',
  `stock_securite` decimal(12,3) DEFAULT NULL COMMENT 'stock_securite',
  `aliment` tinyint(1) DEFAULT NULL COMMENT 'aliment',
  `indice_etatestimatif` int(10) UNSIGNED DEFAULT NULL COMMENT 'indice_etatestimatif',
  `indice_cuisse` int(10) UNSIGNED DEFAULT NULL COMMENT 'indice_cuisse',
  `type_poulet_dinde` int(10) UNSIGNED DEFAULT NULL COMMENT 'type_poulet_dinde',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fc_per_famille`
--

CREATE TABLE `fc_per_famille` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code_famille` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'code famille',
  `Libe_famille` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'libelle famille',
  `prefixe_famille` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'prefix_famille',
  `Compt_famille` bigint(20) DEFAULT NULL COMMENT 'Compt_famille',
  `Utilisateur_creation` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Utilisateur_creation',
  `dateheure_creation` datetime DEFAULT sysdate() COMMENT 'dateheure_creation',
  `Utilisateur_modif` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Utilisateur_modif',
  `dateheure_modif` datetime DEFAULT NULL COMMENT 'dateheure_modif',
  `logo_famille` blob DEFAULT NULL COMMENT 'logo_famille',
  `ordre_affichage_famille` smallint(6) DEFAULT NULL COMMENT 'Ordre_affichage',
  `Couleur_fond_famille` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Couleur_famille',
  `Image_fond_famille` blob DEFAULT NULL COMMENT 'Image_fond_famille',
  `code_specialite` bigint(20) DEFAULT NULL COMMENT 'code_specialite',
  `taux_remise` decimal(5,2) DEFAULT NULL COMMENT 'REMISE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fc_per_sousfamille`
--

CREATE TABLE `fc_per_sousfamille` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code_famille` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'code famille',
  `code_sousfamille` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'code sous famille',
  `Libe_soufamille` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'libelle sous famille',
  `cle_sousfamille` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Cle_sousfamille',
  `Compt_sousfamille` bigint(20) DEFAULT NULL COMMENT 'Compt_sousfamille',
  `Prefixe_sousfamille` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Prefixe_sousfamille',
  `Utilisateur_creation` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Utilisateur_creation',
  `dateheure_creation` datetime DEFAULT sysdate() COMMENT 'dateheure_creation',
  `Utilisateur_modif` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Utilisateur_modif',
  `dateheure_modif` datetime DEFAULT NULL COMMENT 'dateheure_modif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fi_ent_sortieaffectation`
--

CREATE TABLE `fi_ent_sortieaffectation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `numbsor` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'N° bon de sortie',
  `datbsor` date DEFAULT NULL COMMENT 'Date bon sortie',
  `observation` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Code_service_vers',
  `cleservdatbsor` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Cleservdatbsor',
  `codpers` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'code personnel',
  `logement` tinyint(1) DEFAULT NULL COMMENT 'Posede un logement',
  `cle_local` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'cle_local',
  `Code_service` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Code_service',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fi_mvt_sortieaffectation`
--

CREATE TABLE `fi_mvt_sortieaffectation` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `numbsor` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'N° bon de sortie',
  `clembsor` varchar(29) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Clembsor',
  `Numinv` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Numinv',
  `cledepart` varchar(17) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Cledepart',
  `Id_numinv` bigint(20) DEFAULT NULL COMMENT 'Id_numinv',
  `Clemuminv` varchar(17) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Clemuminv',
  `codpers` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'code personnel',
  `Code_service` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Code_service',
  `Code_article` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Code_article',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fi_per_inventaire`
--

CREATE TABLE `fi_per_inventaire` (
  `id_numinv` bigint(20) UNSIGNED NOT NULL,
  `numinv` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Numinventaire',
  `description` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Description',
  `numserie` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'N° de serie',
  `datfabrication` date DEFAULT NULL COMMENT 'date de fabrication',
  `numfact` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Numero facture',
  `datfact` date DEFAULT NULL COMMENT 'date facture',
  `numbrec` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Numero bon de reception',
  `datbrec` date DEFAULT NULL COMMENT 'date bon de reception',
  `Codtypsortexcep` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Codtypsortexcep',
  `dattypsortexcep` date DEFAULT NULL COMMENT 'Date type de sortie excep',
  `Codfour` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Codfour',
  `datacquisition` date DEFAULT NULL COMMENT 'Date d''acquisition',
  `datsortexcep` date DEFAULT NULL COMMENT 'date sortie exceptionnel',
  `Codorigine` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Codorigine',
  `Codetat` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Codetat',
  `Codvaleur` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Codvaleur',
  `Coddive` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Coddive',
  `datsortdiv` date DEFAULT NULL COMMENT 'date sortie divers',
  `datentdecision` date DEFAULT NULL COMMENT 'date entree par decision',
  `numbsor` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'N° bon de sortie',
  `datbsor` date DEFAULT NULL COMMENT 'Date bon sortie',
  `codpers` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'code personnel',
  `nligne` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'N° de ligne',
  `clembrec` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Clembrec',
  `numbsortdiv` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Numero bon de sortie divers',
  `numbsortexcep` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Numero bon de sortie exceptionnel',
  `numdecision` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Numero decision domaine',
  `image` blob DEFAULT NULL COMMENT 'image',
  `clenumbsor` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'clenumbsor',
  `datannulreforme` date DEFAULT NULL COMMENT 'Date annulation reforme',
  `clenuminv` varchar(17) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'clenuminv',
  `Chemin_image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Chemin_image',
  `puht` bigint(20) DEFAULT NULL COMMENT 'Prix unitaire HT',
  `Codtpf` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Codtpf',
  `Codtva` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Codtva',
  `prixttc` decimal(12,3) DEFAULT NULL COMMENT 'Prix d''achat ttc',
  `clecodartnumbrec` varchar(21) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'clecodartnumbrec',
  `cle_numbrecnuminv` varchar(21) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'cle_numbrecnuminv',
  `type_transfert_collecteur` tinyint(1) DEFAULT NULL COMMENT 'type_transfert_collecteur',
  `type_transfert_excel` tinyint(1) DEFAULT NULL COMMENT 'type_transfert_excel',
  `num_operationinventaire` bigint(20) DEFAULT NULL COMMENT 'num_operationinventaire collecteur',
  `datinv` date DEFAULT NULL COMMENT 'Datinv inventaire collecteur',
  `codeabarre_visible` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'codeabarre_visible',
  `num_ordre_frid` bigint(20) DEFAULT NULL COMMENT 'num_ordre_frid',
  `num_frid` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'num_frid',
  `Code_article` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'code article',
  `Code_service` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Code_service',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2020_09_09_140836_create_fc_per_famille_table', 1),
(11, '2020_09_09_140845_create_fc_per_sousfamille_table', 1),
(12, '2020_09_09_140849_create_fc_per_article_table', 1),
(13, '2020_09_09_141720_create_activity_logs_table', 2),
(14, '2020_09_09_141735_create_modules_table', 2),
(15, '2020_09_10_002922_create_group_permissions_table', 2),
(16, '2020_09_10_003101_create_module_groups_table', 2),
(17, '2020_09_10_003742_create_user_permissions_table', 2),
(18, '2020_09_12_001820_create_fcm_r_per_service_table', 2),
(19, '2020_09_12_002011_create_fi_ent_sortieaffectation_table', 2),
(20, '2020_09_12_002108_create_fi_mvt_sortieaffectation_table', 2),
(21, '2020_09_12_002204_create_fi_per_inventaire_table', 3),
(22, '2020_09_13_033858_create_fi_per_inventaire_table', 4),
(23, '2020_10_24_133011_create_dossiers_table', 5),
(24, '2020_10_24_201455_create_user_roles_table', 5),
(25, '2020_10_24_201606_create_user_dossiers_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `controller` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actions` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `module`, `controller`, `actions`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dossiers', 'dossiers', '[\"A\",\"M\",\"D\",\"P\"]', 1, NULL, NULL),
(2, 'Utilisateurs', 'users', '[\"A\",\"M\",\"D\"]', 1, NULL, NULL),
(3, 'Groupes d\'autorisation', 'module-groups', '[\"A\",\"M\",\"D\"]', 1, NULL, NULL),
(4, 'Autorisations', 'user-permissions', '[\"A\",\"M\",\"D\"]', 1, NULL, NULL),
(5, 'Roles', 'roles', '[\"A\",\"M\",\"D\"]', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `module_groups`
--

CREATE TABLE `module_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modules` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT 'json format of module and module permissions',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `module_groups`
--

INSERT INTO `module_groups` (`id`, `group_name`, `modules`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test', '{\"1\":[\"A\",\"M\",\"D\",\"P\"],\"2\":[\"A\"],\"5\":[\"A\",\"M\",\"D\"]}', 1, '2020-11-05 16:01:41', '2020-11-05 16:01:41'),
(2, 'g2', '{\"1\":[\"A\",\"M\",\"D\",\"P\"]}', 1, '2020-11-05 21:32:30', '2020-11-05 21:32:30'),
(3, 'g3', '{\"3\":[\"A\",\"M\",\"D\"],\"4\":[\"A\",\"M\",\"D\"]}', 1, '2020-11-05 21:34:12', '2020-11-05 21:34:12');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deuxieme_prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` bigint(20) DEFAULT NULL,
  `telephone_mobile` bigint(20) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'profile photo',
  `active` tinyint(1) DEFAULT 1,
  `log_activity` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `deuxieme_prenom`, `email`, `telephone`, `telephone_mobile`, `username`, `role_id`, `password`, `email_verified_at`, `profile_picture`, `active`, `log_activity`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Hamzaoui', 'Med Nour', '', 'hamzaouimohamednour@gmail.com', 21202020, NULL, 'hamzaoui', 1, '$2y$10$X9HRr26anOj2K6dvJABHte87XnnIDLbp8LX9sJwBM64PCZLOxqTKG', NULL, '1604389543-403533799551c6d7.jpg', 1, NULL, 'ZV76l5x9cfX5D2OWgMARgObnVru6AmWFuZjB8XMVCQEuzeg4kwd47LZno3Fo', NULL, '2020-11-04 21:22:25'),
(3, 'Test', 'Foulen', '', 'test@sdfsd.dd', NULL, 2320615554, 'test_test', 2, '$2y$10$sM5N00LOPDeVU0GmKqdja.0aTLxvy5sN5K/zxmxjkBqsqqahLabr6', NULL, NULL, 0, NULL, NULL, '2020-10-29 02:55:46', '2020-11-03 12:26:28'),
(4, 'Test', 'Sdfsdf', '', NULL, NULL, NULL, 'test1', 2, '$2y$10$eL2hUJzLGMknYl8jVAvVeOsUQHD3rn/4yuNaQLhl0CBtxwmBdUZ6S', NULL, NULL, 1, NULL, NULL, '2020-11-04 12:39:08', '2020-11-04 12:39:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_dossiers`
--

CREATE TABLE `user_dossiers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `dossier_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_dossiers`
--

INSERT INTO `user_dossiers` (`id`, `user_id`, `dossier_id`, `created_at`, `updated_at`) VALUES
(2, 3, 1, NULL, NULL),
(3, 3, 1, NULL, NULL),
(4, 3, 1, NULL, NULL),
(5, 4, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `groups` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`groups`)),
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_permissions`
--

INSERT INTO `user_permissions` (`id`, `user_id`, `groups`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, '[\"1\",\"2\"]', 1, '2020-11-05 21:53:15', '2020-11-05 21:53:15');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `role`, `description`, `alias`, `created_at`, `updated_at`) VALUES
(1, 'Webmaster', 'Propriétaire de l\'application', 'webmaster', NULL, NULL),
(2, 'Propriétaire Dossier', 'Propriétaire de dossier ou d\'entreprise', 'admin', NULL, NULL),
(3, 'Utilisateur Dossier', 'Utilisateur de dossier ou employeur dans l\'entreprise', 'user', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `dossiers`
--
ALTER TABLE `dossiers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fcm_r_per_service`
--
ALTER TABLE `fcm_r_per_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fc_per_article`
--
ALTER TABLE `fc_per_article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fc_per_famille`
--
ALTER TABLE `fc_per_famille`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fc_per_sousfamille`
--
ALTER TABLE `fc_per_sousfamille`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fi_ent_sortieaffectation`
--
ALTER TABLE `fi_ent_sortieaffectation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fi_mvt_sortieaffectation`
--
ALTER TABLE `fi_mvt_sortieaffectation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fi_per_inventaire`
--
ALTER TABLE `fi_per_inventaire`
  ADD PRIMARY KEY (`id_numinv`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_groups`
--
ALTER TABLE `module_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_dossiers`
--
ALTER TABLE `user_dossiers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_dossiers_user_id_foreign` (`user_id`),
  ADD KEY `user_dossiers_dossier_id_foreign` (`dossier_id`);

--
-- Indexes for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dossiers`
--
ALTER TABLE `dossiers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fcm_r_per_service`
--
ALTER TABLE `fcm_r_per_service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fc_per_article`
--
ALTER TABLE `fc_per_article`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fc_per_famille`
--
ALTER TABLE `fc_per_famille`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fc_per_sousfamille`
--
ALTER TABLE `fc_per_sousfamille`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fi_ent_sortieaffectation`
--
ALTER TABLE `fi_ent_sortieaffectation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fi_mvt_sortieaffectation`
--
ALTER TABLE `fi_mvt_sortieaffectation`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fi_per_inventaire`
--
ALTER TABLE `fi_per_inventaire`
  MODIFY `id_numinv` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `module_groups`
--
ALTER TABLE `module_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_dossiers`
--
ALTER TABLE `user_dossiers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `user_roles` (`id`);

--
-- Constraints for table `user_dossiers`
--
ALTER TABLE `user_dossiers`
  ADD CONSTRAINT `user_dossiers_dossier_id_foreign` FOREIGN KEY (`dossier_id`) REFERENCES `dossiers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_dossiers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD CONSTRAINT `user_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
