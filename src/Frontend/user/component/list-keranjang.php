<?php
// Dummy data yang menggambarkan hubungan antara tabel-tabel
$orderItems = [
    [
        'product_name' => 'Product 1',
        'image_url' => '/public/Outfit/outfit-1.jpg',
        'price' => 800000,
        'quantity' => 2,
        'stock' => 10, // Dummy stock
        'total_price' => 1600000,
    ],
    [
        'product_name' => 'Product 2',
        'image_url' => '/public/Outfit/outfit-2.jpg',
        'price' => 500000,
        'quantity' => 1,
        'stock' => 15, // Dummy stock
        'total_price' => 500000,
    ],
    [
        'product_name' => 'Product 3',
        'image_url' => '/public/Outfit/outfit-3.jpg',
        'price' => 250000,
        'quantity' => 3,
        'stock' => 8, // Dummy stock
        'total_price' => 750000,
    ],
    [
        'product_name' => 'Product 4',
        'image_url' => '/public/Outfit/outfit-4.jpg',
        'price' => 1000000,
        'quantity' => 1,
        'stock' => 5, // Dummy stock
        'total_price' => 1000000,
    ],
];
?>


<div class="flex flex-col items-start gap-2 flex-1">
    <!-- Bar Pilhan -->
    <section
        class="flex px-8 py-6 justify-between items-center self-stretch rounded-[32px_32px_8px_8px] bg-Primary-Layer-2">
        <div class="flex items-center gap-8">
            <!-- Checkbox Section -->
            <div class="flex ">
                <input id="link-checkbox" type="checkbox" value=""
                    class="w-6 h-6 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="link-checkbox" class="sr-only">checkbox</label>
            </div>
            <div class="flex items-center gap-4">
                <p class="text-xl font-bold text-gray-800 tracking-wide">Pilih Semua</p>
                <p class="text-xl font-bold text-gray-800 tracking-wide">( 5 )</p>
            </div>
        </div>
        <!-- Hapus -->
        <button type="button" class="text-xl font-bold text-secondary-main tracking-wide">
            Hapus
        </button>
    </section>

    <section class="flex flex-col items-start gap-2 self-stretch">

        <?php foreach ($orderItems as $item): ?>
            <article class="flex py-1 px-4 gap-4 self-stretch rounded-lg bg-white border border-Third">
                <!-- Checkbox Section -->
                <div class="flex pt-4">
                    <input id="link-checkbox" type="checkbox" value=""
                        class="w-6 h-6 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="link-checkbox" class="sr-only">checkbox</label>
                </div>

                <!-- Produk Information -->
                <section class="flex py-1 justify-center items-center gap-6 flex-1 self-stretch">
                    <!-- Produk Image -->
                    <figure
                        class="bg-cover bg-center w-[124px] h-[159px] rounded-2xl overflow-hidden border border-gray-400">
                        <img class="w-full h-full object-cover" src="<?= asset_url($item['image_url']) ?>"
                            alt="Placeholder image" />
                    </figure>

                    <!-- Produk Details -->
                    <div class="flex flex-col justify-between items-end flex-1 self-stretch">
                        <!-- Header Section -->
                        <header class="flex justify-between items-start flex-1 self-stretch">
                            <div class="flex flex-col gap-2 items-start flex-1">
                                <span class="self-stretch text-black font-quicksand text-label-small">Sisa <?= $item['stock'] ?></span>
                                <p class="w-[404px] text-black font-quicksand text-body-large">
                                    <?= $item['product_name'] ?>
                                </p>
                            </div>
                            <span
                                class="text-black text-center font-quicksand text-label-large">Rp<?= number_format($item['price'], 0, ',', '.') ?></span>
                        </header>

                        <!-- Action Buttons -->
                        <div class="flex items-center gap-2">
                            <!-- Add to Cart Button -->
                            <button type="button"
                                class="flex p-[5px_4px_4px_4px] rounded-full bg-Secondary-Colors-3 cursor-pointer transition-all duration-300 hover:bg-[#c0392b] hover:shadow-custom hover:scale-105 active:scale-95 active:shadow-[0_4px_8px_rgba(0,0,0,0.2)]">
                                <!-- SVG Placeholder -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M6 19C6 20.1 6.9 21 8 21H16C17.1 21 18 20.1 18 19V9C18 7.9 17.1 7 16 7H8C6.9 7 6 7.9 6 9V19ZM18 4H15.5L14.79 3.29C14.61 3.11 14.35 3 14.09 3H9.91C9.65 3 9.39 3.11 9.21 3.29L8.5 4H6C5.45 4 5 4.45 5 5C5 5.55 5.45 6 6 6H18C18.55 6 19 5.55 19 5C19 4.45 18.55 4 18 4Z"
                                        fill="white" />
                                </svg>
                                <span class="sr-only">sampah</span>
                            </button>
                            <!-- Quantity Container -->
                            <div
                                class="flex w-[137px] px-2 py-1 justify-between items-center rounded-md bg-Primary-Colors-1">
                                <!-- Decrease Button -->
                                <button type="button"
                                    class="flex p-[10px_4px_10px_4px] rounded-full bg-Primary-Colors-2 cursor-pointer transition-all duration-300 hover:bg-Primary-Colors-3 hover:shadow-custom hover:scale-105 active:scale-95 active:shadow-[0_4px_8px_rgba(0,0,0,0.2)]">
                                    <!-- SVG Placeholder -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="4"
                                        viewBox="0 0 16 4" fill="none">
                                        <path
                                            d="M14 0H2C1.46957 0 0.960859 0.210714 0.585786 0.585787C0.210714 0.96086 0 1.46957 0 2C0 2.53043 0.210714 3.03914 0.585786 3.41421C0.960859 3.78929 1.46957 4 2 4H14C14.5304 4 15.0391 3.78929 15.4142 3.41421C15.7893 3.03914 16 2.53043 16 2C16 1.46957 15.7893 0.96086 15.4142 0.585787C15.0391 0.210714 14.5304 0 14 0Z"
                                            fill="white" />
                                    </svg>
                                    <span class="sr-only">minus</span>
                                </button>
                                <!-- Quantity Display -->
                                <p class="text-base font-bold text-white text-center"><?= $item['quantity'] ?></p>
                                <!-- Increase Button -->
                                <button type="button"
                                    class="flex p-[5px_4px_4px_4px] rounded-full bg-Primary-Colors-2 cursor-pointer transition-all duration-300 hover:bg-Primary-Colors-3 hover:shadow-custom hover:scale-105 active:scale-95 active:shadow-[0_4px_8px_rgba(0,0,0,0.2)]">
                                    <!-- SVG Placeholder -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        viewBox="0 0 16 16" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M5.33333 1.77778C5.33333 1.30628 5.52063 0.854097 5.85403 0.520699C6.18743 0.187301 6.63962 0 7.11111 0H8.88889C9.36038 0 9.81257 0.187301 10.146 0.520699C10.4794 0.854097 10.6667 1.30628 10.6667 1.77778V5.33333H14.2222C14.6937 5.33333 15.1459 5.52063 15.4793 5.85403C15.8127 6.18743 16 6.63962 16 7.11111V8.88889C16 9.36038 15.8127 9.81257 15.4793 10.146C15.1459 10.4794 14.6937 10.6667 14.2222 10.6667H10.6667V14.2222C10.6667 14.6937 10.4794 15.1459 10.146 15.4793C9.81257 15.8127 9.36038 16 8.88889 16H7.11111C6.63962 16 6.18743 15.8127 5.85403 15.4793C5.52063 15.1459 5.33333 14.6937 5.33333 14.2222V10.6667H1.77778C1.30628 10.6667 0.854097 10.4794 0.520699 10.146C0.187301 9.81257 0 9.36038 0 8.88889V7.11111C0 6.63962 0.187301 6.18743 0.520699 5.85403C0.854097 5.52063 1.30628 5.33333 1.77778 5.33333H5.33333V1.77778Z"
                                            fill="white" />
                                    </svg>
                                    <span class="sr-only">Plus</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </section>
            </article>


        <?php endforeach; ?>
    </section>


</div>