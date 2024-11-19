-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2024 at 06:11 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brandu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `parent_category_id` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `parent_category_id`, `name`, `description`, `image_url`, `is_active`) VALUES
(1, NULL, 'Pakaian', 'Kategori pakaian fashion', NULL, 1),
(3, NULL, 'Aksesoris', 'Kategori aksesoris fashion', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `status` enum('pending','processing','completed','canceled') DEFAULT 'pending',
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `shipping_cost` decimal(10,2) DEFAULT 0.00,
  `promo_applied` varchar(50) DEFAULT NULL
) ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `address_id`, `status`, `total_price`, `created_at`, `updated_at`, `shipping_cost`, `promo_applied`) VALUES
(1, 1, 1, 'pending', 100000.00, '2024-11-17 00:10:00', '2024-11-17 00:10:00', 15000.00, NULL),
(6, 5, 1, 'pending', 12000.00, '2024-11-17 00:11:49', '2024-11-17 00:11:49', 10000.00, NULL),
(7, 1, 1, 'pending', 225000.00, '2024-11-17 00:24:02', '2024-11-17 00:24:02', 20000.00, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) GENERATED ALWAYS AS (`quantity` * `price`) STORED
) ;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(5, 1, 1, 2, 75000.00),
(6, 1, 3, 1, 150000.00);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `method` enum('bank_transfer','e_wallet','credit_card') DEFAULT 'e_wallet',
  `status` enum('pending','paid','failed') DEFAULT 'pending',
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image_url` varchar(255) DEFAULT NULL,
  `is_featured` tinyint(1) DEFAULT 0,
  `tags` varchar(255) DEFAULT NULL
) ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `name`, `description`, `price`, `created_at`, `image_url`, `is_featured`, `tags`) VALUES
(1, 1, 'Kaos Polos', 'Kaos polos untuk anak muda', 75000.00, '2024-11-16 14:49:18', NULL, 1, NULL),
(3, 1, 'Kemeja Casual', 'Kemeja casual untuk anak muda', 150000.00, '2024-11-17 00:19:28', NULL, 0, NULL),
(4, 1, 'Jaket Hoodie', 'Jaket hoodie nyaman dan stylish', 200000.00, '2024-11-17 00:19:28', NULL, 0, NULL),
(5, 1, 'kemeja wanita atasan blouse', 'Hallo kak kami menjual bluse cewek koresn style Bju Wanita Blose Blouse Jumbo Terbaru 2024 Baju Bkouse Putih Bsju Atasan Ootd Bliuse Premium Korea Bloyse Ukuran S M L Xl XXL   \r\n\r\ncari produk terbaru dengan kualitas terbaik ? disini tempatnya !! \r\n\r\nwarna yang tersedia\r\n- coklat \r\n- moca \r\n\r\n\r\ngambar hanya sebagai referensi kemiripan gambar dengan aslinya hanya 85-90% (perbedaan bisa di sebabkan karena pemakaian bahan ,warna ,ukuran,model,dan lainnya,harap maklum kalo ada ketidaksesuaian)\r\n\r\nsebelum chekout pembayaran harap priksa kembali pesanan, alamat ,no hp dengan benar ( agar tidak ada kesalahan & mempercepat pengiriman pesanan)', 151898.00, '2024-11-17 23:47:13', NULL, 1, NULL),
(7, 1, 'Kemeja Blus Cewek Outfit Anak Kuliahan', 'Hallo kak kami menjual kemeja wsnita bluss oversize pakaean kmja kerja baju atasan shirt kameja kekinian bj terbaru 2024 blousee korean wnita silahkan bisa langsung diorder saja kakak😉❤️\r\n   \r\n\r\nvallina outfit saat ini merupakan salah satu lini outfit muslim terbaik dan berkualitas tinggi di antara local brand indonesia. \r\n\r\nbahan: salur premium cotton\r\nbahan: polos beauty crepe\r\nkarakter bahan : lembut, ketebalnya pas, sangat nyaman dipakai dan tidak gerah\r\nsudah termasuk belt (bisa lepas pasang)\r\nukuran: one size fit l\r\nld 100 - 102 cm\r\ntoleransi ukuran 1-2 cm \r\n\r\n**warna yang terlihat pada gambar mungkin tidak 100% sama dengan produk yang sebenarnya, disebabkan faktor lhting pada proses photoshoot, atau kondisi gadget yang dunakan untuk melihat gambar\r\n\r\n**pastikan alamat yang di tulis ketika checkout diisi dengan sangan lengkap guna menghindari kendala pengiriman oleh kurir (sertakan patokan bila perlu)\r\n**pastikan nomor hp yang diisi dalam alamat ketika checkout mudah dihubungi (tlp. & ) / (sertakan 2 nomor hp bila perlu)', 88611.00, '2024-11-18 00:14:20', NULL, 0, NULL),
(8, 1, 'Fashion Baju Cewek Import Premium Kemja Wanita Premium Kemeja Cewekk', 'Hallo kak kami menjual Blouse Jumbo Terbaru 2024 Baju Bkouse Putih Bsju Atasan Ootd Bliuse Premium Korea Bloyse Blouse Ukuran S M L Xl Xxl Jumbo Wanita Blus Korean Style Import Bloise Cewe Murah Blpuse   \r\n\r\nâcari produk terbaru dengan kualitas terbaik ? disini tempatnya !! \r\n\r\nhijabbandungoutfit selalu up to date dengan koleksi-koleksi terbaru \r\ndapatkan pengalaman belanja yang menyenangkan \r\ndijamin enggak akan bosen belanja di hijab bandung outfit\r\n\r\nrincian produk\r\nbahan    : moscrepe \r\nukuran  : all size \r\nld           : 102 cm\r\ntoleransi ukuran 1-2 cm \r\n\r\nwarna yang tersedia\r\n- dusty \r\n- putih \r\n- hitam ', 94486.00, '2024-11-18 01:35:20', NULL, 0, NULL),
(10, 1, 'Kemeja Casual Trendy Kemeja Polos Lengan Panjang Kekinian', 'Bahan Nyaman dan Lembut.\r\n\r\nDetail Produk \r\n\r\nSize 	        : M-L-XL.\r\n\r\nBahan     : Cotton Cigarett\r\n\r\nKualitas  : Terbaik.\r\n\r\nJahitan   : Kwalitas Terbaik.\r\n\r\nGambar  :100% Realpicth\r\n\r\nWarna 	 : Sesuai Gambar.\r\n\r\nSize Chart :\r\nM:\r\nLebar dada (±)50 cm \r\nPanjang Baju dr kerah sampai Bawah 70-71 cm\r\nPanjang Lengan 62 cm\r\nLingkar dada(±)100 cm\r\n\r\nL :\r\nLebar dada (±)53 cm \r\nPanjang Baju dr kerah sampai Bawah 72-73 cm\r\nPanjang Lengan 64 cm\r\nLingkar dada(±)106 cm\r\n\r\nXL :\r\nLebar dada (±)56 cm \r\nPanjang Baju dr kerah sampai Bawah 74-75 cm\r\nPanjang Lengan 65 cm\r\nLingkar dada(±)112 cm', 85500.00, '2024-11-18 01:39:54', NULL, 0, NULL),
(11, 1, 'baju setelan kaos pria Korea Selatan 2024', 'Nama Produk: Set Celana Pendek T-shirt Desain Huruf Korea Terbaru Pria\r\n🎈Fitur produk: desain huruf, longgar, serasi, kasual, trendi\r\n🎈Detail produk:\r\n🎈Set kaos dan celana pendek pria menampilkan desain lettering terkini yang sedang tren.\r\n🎈Terbuat dari bahan berkualitas tinggi, nyaman digunakan.\r\n🎈Desain longgar dan kasual, cocok untuk berbagai kesempatan.\r\n🎈Penampilan stylish dan modis, membuat Anda terlihat modis dan modern.\r\n🎈Perpaduan kaos dan celana pendek yang tepat akan membuat kamu tampil percaya diri dan unik.\r\n🎈Jangan lewatkan kesempatan untuk memiliki set kaos dan celana pendek pria dengan desain tulisan Korea terkini. Tampil gaya dan modis dengan produk kami! beli sekarang!\r\n🎈Produk ini tersedia dalam warna dan ukuran hitam, putih, dan abu-abu, Anda dapat memilih sesuai keinginan Anda.\r\n🎈Ukuran yang disarankan:\r\nM: (155-165cm/45-54kg)\r\nL: (165-170cm/54-63kg)\r\nXL: (170-175cm/63-72kg)\r\n2XL: (175-180cm/72-81kg)\r\n3XL: (180-190cm/81-90kg)\r\n🎈Pengingat hangat:\r\nIkuti toko untuk menikmati lebih banyak diskon.\r\nPesanan yang dilakukan sebelum pukul 18.00 akan dikirim pada hari yang sama.\r\nToko kami memiliki sistem layanan yang lengkap, jangan ragu untuk membeli.\r\nJika Anda menyukai produk kami, harap ingat untuk memberi toko kami ⭐⭐⭐⭐⭐\r\nJika Anda memiliki pertanyaan tentang barang yang Anda terima, silakan hubungi kami sesegera mungkin.', 50000.00, '2024-11-18 01:40:54', NULL, 0, NULL),
(12, 1, 'Kemeja Kayser Pria MUSE Lengan Panjang Motif', 'Detail Size dan Bahan:\r\nBahan: Matt Toyobo, model Slim Fit\r\nMotif gambar sablon\r\nada variasi kantong depan\r\n\r\nDetail Size:\r\n- M/L : Lingkar Dada 104CM x Panjang Badan 70CM, Lebar Dada 52CM\r\n- XL : Lingkat Dada 110CM x Panjang Badan 72 CM, Lebar Dada 55CM\r\n- XXL: Lingkar dada 120CM X panjang 73 CM, Lebar Dada 60CM\r\n\r\n- BAHAN HALUS\r\n- LENGAN PANJANG\r\n- BAHAN ADEM DAN NYAMAN UNTUK DIPAKAI SEHARI HARI\r\n- SLIM FIT\r\n\r\nMengutamakan Quality Control sebelum pengiriman.\r\n- Pengiriman 100% AMAN.', 69000.00, '2024-11-18 01:42:14', NULL, 0, NULL),
(13, 1, '2 IN 1 Rompi dan Celana Formal Slimfit Berbahan Premium Elegan Pakaian Kantor Outfit Wisuda Pakaian ', 'Paket 2 IN 1 yang berisi Rompi dan Celana Formal. Rompi dan celana ini dibuat dari bahan kualitas tinggi yang membuatnya nyaman untuk dipakai. Cocok untuk berbagai acara seperti pesta, wisuda, maupun meeting bisnis. Rompi dan celana ini juga mudah dikombinasikan dengan berbagai gaya pakaian lainnya sehingga memudahkan Anda untuk menyesuaikan penampilan Anda.\r\n\r\n#SPESIFIKASI \r\n>> Bahan high twist tebal\r\n>> Lapisan Dalam Full FURING \r\n>> Tersedia: S M L XL XXL \r\n\r\n#DETAIL UKURAN ROMPI FORMAL\r\nSize S\r\nLingkar dada 96 cm, tinggi 65 cm\r\n\r\nSize M\r\nLingkar dada 100 cm, tinggi 68 cm\r\n\r\nSize L\r\nLingkar dada 108 cm, tinggi 71 cm\r\n\r\nSize XL\r\nLingkar dada 112 cm, tinggi 74 cm\r\n\r\nSize XXL\r\nLingkar dada 117 cm. tinggi 74 cm\r\n\r\n# PANDUAN UKURAN / SIZE CHART CELANA FORMAL :\r\n\r\nNo.27. --> lingkar pinggang 74 panjang 90\r\nNo.28. --> lingkar pinggang 76 panjang 91\r\nNo.29. --> lingkar pinggang 78 panjang 92\r\nNo.30. --> lingkar pinggang 80 panjang 93\r\nNo.31.-->  lingkar pinggang 82 panjang 94\r\nNo.32. --> lingkar pinggang 84 panjang 95\r\nNo.33. --> lingkar pinggang 86 panjang 96\r\nNo.34. --> lingkar pinggang 88 panjang 97\r\nNo.35. --> lingkar pinggang 90 panjang 98\r\nNo.36. --> lingkar pinggang 92 panjang 99\r\n\r\nPENULISAN NOMOR CELANA DI CANTUMKAN DI CATATAN ATAU CHAT KEPADA ADMIN. JIKA TIDAK MENCANTUMKAN MAKA NOMOR CELANA AKAN DISESUAIKAN DENGAN SIZE ROMPI YANG DI PESAN ^^.\r\n\r\nSELAMAT MENIKMATI PRODUK KAMI !\r\nJANGAN LUPA BINTANG 5 NYA YA KAK !  🌟🌟🌟🌟🌟\r\nYOUR SATISFACTION IS OUR PRIORITY ! ( KEPUASAAN ANDA ADALAH PRIORITAS KAMI ! )\r\n\r\n--> GARANSI TUKAR BARANG DAN FREE RETUR dengan ketentuan sbb:\r\n- Pengajuan barang yang hendak di retur tidak lebih dari 3 hari\r\n- Proses akan lebih cepat jika anda mencantumkan video unboxing paket pada saat datang\r\n- Gratis ongkir bolak balik Apabila terjadi kesalahan pengiriman oleh kami  (warna/ukuran), ada cacat pada barang\r\n- Untuk tukar warna dan ukuran atas keinginan pembeli (berubah pikiran / ukuran tidak pas / warna tidak cocok) maka ongkir dari pembeli ke lokasi kami ditanggung pembeli dan ongkir dari lokasi kami ke lokasi pembeli kami yang tanggung.\r\n- Barang yang di retur harus dalam keadaan baik dan belum pernah dipakai selain untuk mencoba/test', 264999.00, '2024-11-18 12:30:05', NULL, 0, NULL),
(15, 1, 'Goldy Outfit Setelan Jas Celana & Rompi Krem Tua - Vente Series', 'BAHAN : SEMI WOOL \r\nS , M , L , XL  & XXL\r\n\r\nISI DALAM PAKET : \r\nJAS CELANA & ROMPI\r\n\r\nBisa di baca terlebih dahulu kak Rekomendasi pemilihan size nya 😊\r\n\r\nRekomendasi Size :\r\nTinggi : 150-165cm dan berat badan 40-55kg pakai size S\r\nTinggi : 150-175cm dan berat badan 50-60kg pakai size M\r\nTinggi : 165-185cm dan berat badan 55-75kg pakai size L\r\nTinggi : 165-190cm dan berat badan 65-90kg pakai size XL\r\n\r\n\r\nSize Chart JAS :\r\nPJ : Panjang Jas\r\nLB : Lebar Bahu\r\nLD : Lebar Dada\r\nLP : Lebar Pinggang\r\nPT : Panjang Tangan\r\n\r\n\r\nS : PJ = 68, LB = 40, LD = 48, LP = 42, PT = 57\r\nM : PJ = 70, LB = 42, LD = 52, LP = 46, PT = 58\r\nL : PJ = 71, LB = 45, LD = 54, LP = 48, PT = 60\r\nXL : PJ = 72, LB = 47, LD = 56, LP = 50, PT = 61\r\nXXL : PJ = 72, LB = 49, LD = 60, LP = 56, PT = 63\r\n\r\n\r\nSize Chart CELANA :\r\nA : Lebar Pinggang\r\nB : Panjang Celana\r\nC : Tinggi Pasak\r\nD : Lebar Paha\r\nE : Lebar Lutut\r\nF : Lebar Bukaan Celana\r\n\r\nS : A = 40, B = 100, C = 29, D = 29, E = 20, F = 16\r\nM : A = 42, B = 101, C = 30, D = 30, E = 21, F = 17\r\nL : A = 45, B = 102, C = 32, D = 32, E = 22, F = 17\r\nXL : A = 48, B = 103, C = 32, D = 33, E = 23, F = 18\r\nXXL : A = 50, B = 104, C = 36, D = 36, E = 23, F = 19\r\n\r\nSize Chart ROMPI :\r\nPR : Panjang Rompi\r\nLB : Lebar Bahu\r\nLD : Lebar Dada\r\n\r\nS : PR = 60, LB = 34, LD = 46\r\nM : PR = 61, LB = 37, LD = 50\r\nL : PR = 61, LB = 38, LD = 52\r\nXL : PR = 62, LB = 39, LD = 54\r\nXXL : PR = 62, LB = 39, LD = 56\r\n\r\n\r\nRekomendasi Size : \r\nBiasa pakai celana size berapa kak? kalau :\r\n28/29/30 bisa pakai S\r\n31/32 bisa pakai M\r\n33/34/35 bisa pakai L\r\n36/37 bisa pakai XL\r\n38/39/40 bisa pakai XXL', 395000.00, '2024-11-18 12:31:22', NULL, 0, NULL),
(16, 3, 'Outfit Kampus kekinian', 'aaasas', 430000.00, '2024-11-18 14:08:31', '0', 1, 'fashion, anak muda, cool kid'),
(17, 1, 'Outfit kemeja Kampus kekinian', 'memilih outfit adalah pekerjaanku', 90000.00, '2024-11-18 14:10:11', '0', 0, 'fashion, kualitas terbaik,'),
(18, 1, 'Outfit Kampus', 'memilih pilihan outfit yang keren', 100000.00, '2024-11-18 14:12:52', '0', 1, 'fashion, pakaian, summer outfit, ');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_variations`
--

CREATE TABLE `product_variations` (
  `variation_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variation_name` varchar(50) NOT NULL,
  `variation_value` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promosi_product`
--

CREATE TABLE `promosi_product` (
  `id` int(11) NOT NULL,
  `promotion_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promosi_product`
--

INSERT INTO `promosi_product` (`id`, `promotion_id`, `product_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `promotion_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `discount` decimal(5,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`promotion_id`, `name`, `discount`, `start_date`, `end_date`) VALUES
(1, 'Diskon Tahun Baru', 10.00, '2024-01-01', '2024-01-31');

-- --------------------------------------------------------

--
-- Table structure for table `promotion_orders`
--

CREATE TABLE `promotion_orders` (
  `id` int(11) NOT NULL,
  `promotion_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` between 1 and 5),
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `product_id`, `user_id`, `rating`, `comment`, `created_at`) VALUES
(1, 1, 1, 5, 'Produk sangat bagus!', '2024-11-16 23:53:10'),
(2, 3, 1, 4, 'Kemeja casual yang nyaman.', '2024-11-17 00:24:02');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_address`
--

CREATE TABLE `shipping_address` (
  `address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) DEFAULT NULL,
  `postal_code` varchar(10) DEFAULT NULL,
  `is_primary` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping_address`
--

INSERT INTO `shipping_address` (`address_id`, `user_id`, `address`, `city`, `postal_code`, `is_primary`) VALUES
(1, 1, 'Jl. Merdeka No. 1', 'Jakarta', '12345', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_verified` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `created_at`, `update_at`, `is_verified`) VALUES
(1, 'user1', 'user1@example.com', 'hashedpassword1', '2024-11-16 14:49:18', '2024-11-16 14:49:18', 0),
(5, 'user2', 'user2@example.com', 'hashedpassword2', '2024-11-16 23:57:05', '2024-11-16 23:57:05', 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variation_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `unique_category_name` (`name`),
  ADD KEY `parent_category_id` (`parent_category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `address_id` (`address_id`),
  ADD KEY `idx_user_id_orders` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `idx_order_id_order_items` (`order_id`),
  ADD KEY `idx_product_id_order_items` (`product_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `unique_product_name` (`name`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_product_id_product_categories` (`product_id`),
  ADD KEY `idx_category_id_product_categories` (`category_id`);

--
-- Indexes for table `product_variations`
--
ALTER TABLE `product_variations`
  ADD PRIMARY KEY (`variation_id`),
  ADD KEY `idx_product_id_variations` (`product_id`);

--
-- Indexes for table `promosi_product`
--
ALTER TABLE `promosi_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_promotion_id_promosi_product` (`promotion_id`),
  ADD KEY `idx_product_id_promosi_product` (`product_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`promotion_id`);

--
-- Indexes for table `promotion_orders`
--
ALTER TABLE `promotion_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_promotion_id_promotion_orders` (`promotion_id`),
  ADD KEY `idx_order_id_promotion_orders` (`order_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `idx_user_id_reviews` (`user_id`),
  ADD KEY `idx_product_id_reviews` (`product_id`);

--
-- Indexes for table `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `idx_user_id_shipping_address` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `variation_id` (`variation_id`),
  ADD KEY `idx_user_id_wishlist` (`user_id`),
  ADD KEY `idx_product_id_wishlist` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_variations`
--
ALTER TABLE `product_variations`
  MODIFY `variation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promosi_product`
--
ALTER TABLE `promosi_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `promotion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `promotion_orders`
--
ALTER TABLE `promotion_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_address`
--
ALTER TABLE `shipping_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`parent_category_id`) REFERENCES `categories` (`category_id`) ON DELETE SET NULL;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`address_id`) REFERENCES `shipping_address` (`address_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE;

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `product_categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Constraints for table `product_variations`
--
ALTER TABLE `product_variations`
  ADD CONSTRAINT `product_variations_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `promosi_product`
--
ALTER TABLE `promosi_product`
  ADD CONSTRAINT `promosi_product_ibfk_1` FOREIGN KEY (`promotion_id`) REFERENCES `promotions` (`promotion_id`),
  ADD CONSTRAINT `promosi_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `promotion_orders`
--
ALTER TABLE `promotion_orders`
  ADD CONSTRAINT `promotion_orders_ibfk_1` FOREIGN KEY (`promotion_id`) REFERENCES `promotions` (`promotion_id`),
  ADD CONSTRAINT `promotion_orders_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD CONSTRAINT `shipping_address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`),
  ADD CONSTRAINT `wishlist_ibfk_3` FOREIGN KEY (`variation_id`) REFERENCES `product_variations` (`variation_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
