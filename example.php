<?php
// Data Produk
$products = [
    [
        "id" => 1,
        "title" => "Kemeja Formal Slim Fit",
        "description" => "Cocok untuk gaya formal mahasiswa.",
        "rating" => 4.5,
        "terjual" => 25,
        "promo" => true,
        "harga" => 250.000,
        "jumlah_stok" => 50,
        "image" => asset_url("public/Outfit/outfit-1.jpg")
    ],
    [
        "id" => 2,
        "title" => "Kaos Santai Anak Muda",
        "description" => "Gaya kasual yang cocok untuk aktivitas santai.",
        "rating" => 4.8,
        "terjual" => 40,
        "promo" => false,
        "harga" => 150.000,
        "jumlah_stok" => 200,
        "image" => asset_url("public/Outfit/outfit-2.jpg")
    ],
    [
        "id" => 3,
        "title" => "Blazer Keren untuk Kampus",
        "description" => "Tampil profesional dan keren.",
        "rating" => 4.9,
        "terjual" => 50,
        "promo" => true,
        "harga" => 350.000,
        "jumlah_stok" => 15,
        "image" => asset_url("public/Outfit/outfit-3.jpg")
    ],
    [
        "id" => 4,
        "title" => "Jaket Denim Trendy",
        "description" => "Pilihan terbaik untuk gaya santai.",
        "rating" => 4.6,
        "terjual" => 35,
        "promo" => false,
        "harga" => 300.000,
        "jumlah_stok" => 98,
        "image" => asset_url("public/Outfit/outfit-4.jpg")
    ],
    [
        "id" => 5,
        "title" => "Celana Chino Casual",
        "description" => "Nyaman dan cocok untuk kegiatan sehari-hari.",
        "rating" => 4.7,
        "terjual" => 20,
        "promo" => true,
        "harga" => 200.000,
        "jumlah_stok" => 100,
        "image" => asset_url("public/Outfit/outfit-5.jpg")
    ],
    [
        "id" => 6,
        "title" => "Sweater Hangat",
        "description" => "Tetap stylish meski cuaca dingin.",
        "rating" => 4.4,
        "terjual" => 15,
        "promo" => false,
        "harga" => 275.000,
        "jumlah_stok" => 24,
        "image" => asset_url("public/Outfit/outfit-6.jpg")
    ],
    [
        "id" => 7,
        "title" => "Sweater Hangat",
        "description" => "Tetap stylish meski cuaca dingin.",
        "rating" => 4.4,
        "terjual" => 15,
        "promo" => false,
        "harga" => 275.000,
        "jumlah_stok" => 24,
        "image" => asset_url("public/Outfit/outfit-6.jpg")
    ],
    [
        "id" => 8,
        "title" => "Sweater Hangat",
        "description" => "Tetap stylish meski cuaca dingin.",
        "rating" => 4.4,
        "terjual" => 15,
        "promo" => false,
        "harga" => 275.000,
        "jumlah_stok" => 24,
        "image" => asset_url("public/Outfit/outfit-6.jpg")
    ],
];

// Sebelum rendering elemen HTML
?>


<!-- List product -->
<div class="col-span-12 flex flex-col items-center justify-end flex-shrink-0 pt-[88px]">
    <!-- Main Image -->
    <div class="relative overflow-hidden main-image bg-white-2 flex px-[80px] py-[14px] flex-col justify-center items-start gap-3 self-stretch">

        <!-- Content Container -->
        <div class="flex flex-col items-start self-stretch">
            <?php foreach ($all_products as $category_name => $category_products): ?>
                <div class="title-recommend flex pb-8 justify-between items-center self-stretch">
                    <!-- Title Categories  berdasarkan nama id di tabel categories -->
                    <div class="flex p-[8px_0px] max-w-[300px] justify-center items-center flex-1 rounded-xl bg-white">
                        <span class="text-primary font-poppins text-headline-medium"><?= $category_name ?></span>
                    </div>
                </div>

                <?php if (!empty($category_products)): ?>
                    <!-- Box Product -->
                    <div class="box-content flex flex-nowrap items-center gap-2 self-stretch overflow-x-auto scroll-snap-x snap-mandatory px-4 py-2">
                        <?php foreach ($category_products as $product): ?>
                            <!-- Card product -->
                            <div class="relative card-product snap-start flex-shrink-0 shadow-lg group flex w-[200px] h-[256px] pt-4 px-3 pb-3 flex-col justify-between items-center rounded-3xl hover:cursor-pointer active:scale-95 active:shadow-inner transition-all">

                                <!-- object Container -->
                                <div class="icon-container absolute flex left-0 top-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="200" height="256" viewBox="0 0 200 256" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="" fill="url(#pattern<?= $product['id'] ?>)" stroke="#95A5A6" stroke-width="2" />
                                        <defs>
                                            <pattern id="pattern<?= $product['id'] ?>" patternContentUnits="objectBoundingBox" width="1" height="1">
                                                <use xlink:href="#image<?= $product['id'] ?>" transform="matrix(0.00147929 0 0 0.0011557 0 -0.193995)" />
                                            </pattern>
                                            <image id="image<?= $product['id'] ?>" width="676" height="1201" xlink:href="<?= $product['image'] ?>" />
                                        </defs>
                                    </svg>
                                </div>

                                <!-- rating and Sale -->
                                <div class="rating-and-sales hidden group-hover:flex justify-between items-start self-stretch z-10 transition-all duration-300 opacity-0 group-hover:opacity-100">
                                    <?php if (!empty($product['rating'])): ?>
                                        <p class="text-[#1E1E1E] font-poppins text-[12px] font-medium leading-[20px]"><?= $product['rating'] ?>/5</p>
                                   
                                    <?php if (!empty($product['terjual'])): ?>
                                        <p class="sales-count text-[#1E1E1E] font-poppins text-[12px] font-medium leading-[20px]"><?= $product['terjual'] ?>+</p>
                                    <?php endif; ?>
                                </div>

                            </div>

                            <!-- Promo and Title Container -->
                            <div class="relative hidden group-hover:flex h-[96px] p-[32px_20px_8px_20px] flex-col justify-between items-center flex-shrink-0 self-stretch rounded-[24px] drop-shadow-shadow-product transition-all ease-in-out duration-500 opacity-0 group-hover:opacity-100">
                                <?php if ($product['promo']): ?>
                                    <p class="self-stretch text-white font-quicksand text-body-medium">Promo Hari ini!</p>
                                <?php endif; ?>

                                <h4 class="self-stretch text-black font-quicksand text-body-small z-10"><?= $product['title'] ?></h4>
                                <div class="flex items-center justify-between self-stretch z-10">
                                    <p class="text-black font-poppins text-body-small"><?= $product['harga'] ?></p>

                                    <?php if ($product['jumlah_stok'] < 25): ?>
                                        <div class="flex p-[0_2px] justify-center items-center rounded-[4px] bg-secondary">
                                            <p class="text-white font-poppins text-body-small">Stok Terbatas</p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                    </div>
                <?php else: ?>
                    <p class="text-gray-500 text-center">Tidak ada produk tersedia.</p>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>