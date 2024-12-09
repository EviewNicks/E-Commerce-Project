<?php
// Dummy data untuk produk yang telah dicentang di keranjang
$productPayments = [
    [
        'product_name' => 'Product 1',
        'image_url' => '/public/Outfit/outfit-1.jpg',
        'price' => 800000,
        'delivery_type' => 'Reguler',
        'estimated_arrival' => '14 - 19 Nov',
        'insurance_cost' => 800,
    ],
    [
        'product_name' => 'Product 2',
        'image_url' => '/public/Outfit/outfit-2.jpg',
        'price' => 500000,
        'delivery_type' => 'Reguler',
        'estimated_arrival' => '15 - 20 Nov',
        'insurance_cost' => 800,
    ],
    [
        'product_name' => 'Product 3',
        'image_url' => '/public/Outfit/outfit-3.jpg',
        'price' => 250000,
        'delivery_type' => 'Reguler',
        'estimated_arrival' => '16 - 21 Nov',
        'insurance_cost' => 800,
    ],
];

$rowStart = 6;
foreach ($productPayments as $payment):

?>

    <!-- PRroduct payment Section -->
    <article
        class="flex flex-col justify-between items-center col-span-7 row-start-<?= $rowStart ?> row-span-2 p-[8px_24px_4px_24px] flex-shrink-0 rounded-2xl bg-Primary-Layer-2">

        <h2 class="self-stretch text-black font-quicksand text-label-medium">
            <?= $payment['product_name'] ?>
        </h2>
        <section class="flex items-center gap-6 self-stretch">
            <!-- Gambar produk -->
            <img src="<?= asset_url($payment['image_url']) ?>"
                alt="product-container"
                class="w-[97px] h-[124px] rounded-[24px] bg-cover bg-center border border-gray-400">
            <section class="flex flex-col justify-between flex-1 self-stretch rounded-md bg-primary-layer-1">
                <!-- Informasi delivery -->
                <header
                    class="flex items-center justify-between p-[4px_24px] rounded-t-md border border-primary-layer-3">
                    <p class="text-black font-quicksand text-label-medium"><?= $payment['delivery_type'] ?></p>
                </header>
                <!-- Informasi estimasi dan harga -->
                <section class="flex justify-between items-center flex-1 px-6">
                    <div class="flex flex-col gap-1">
                        <p class="self-stretch text-black  font-quicksand text-label-small">Kurir
                            Rekomendasi</p>
                        <p class="self-stretch text-black  font-quicksand text-body-medium">Estimasi tiba <?= $payment['estimated_arrival'] ?>
                        </p>
                    </div>
                    <p class="text-black font-quicksand text-label-small">Rp.<?= number_format($payment['price'], 0, ',', '.') ?></p>
                </section>
                <!-- Opsi asuransi -->
                <footer class="flex items-start gap-4 p-[4px_24px]  rounded-b-md border border-primary-layer-3">
                    <!-- Checkbox -->
                    <div class="flex ">
                        <input id="link-checkbox" type="checkbox" value=""
                            class="w-6 h-6 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="link-checkbox" class="sr-only">checkbox</label>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path opacity="0.5"
                                d="M3.378 5.082C3 5.62 3 7.22 3 10.417V11.991C3 17.629 7.239 20.366 9.899 21.527C10.62 21.842 10.981 22 12 22C13.02 22 13.38 21.842 14.101 21.527C16.761 20.365 21 17.63 21 11.991V10.417C21 7.219 21 5.62 20.622 5.082C20.245 4.545 18.742 4.03 15.735 3.001L15.162 2.805C13.595 2.268 12.812 2 12 2C11.188 2 10.405 2.268 8.838 2.805L8.265 3C5.258 4.03 3.755 4.545 3.378 5.082Z"
                                fill="#E74C3C" />
                            <path
                                d="M10.861 8.363L10.731 8.598C10.586 8.857 10.514 8.986 10.402 9.071C10.29 9.156 10.15 9.188 9.86997 9.251L9.61597 9.309C8.63197 9.531 8.13997 9.643 8.02297 10.019C7.90597 10.396 8.24097 10.788 8.91197 11.572L9.08597 11.775C9.27597 11.998 9.37097 12.109 9.41397 12.247C9.45697 12.385 9.44297 12.534 9.41397 12.831L9.38797 13.101C9.28597 14.148 9.23597 14.671 9.54197 14.904C9.84797 15.137 10.309 14.924 11.23 14.501L11.469 14.391C11.73 14.271 11.861 14.21 12 14.21C12.139 14.21 12.27 14.27 12.531 14.39L12.77 14.5C13.69 14.925 14.152 15.137 14.458 14.904C14.764 14.671 14.714 14.148 14.612 13.102L14.586 12.831C14.557 12.534 14.543 12.385 14.586 12.247C14.629 12.109 14.724 11.997 14.914 11.775L15.088 11.572C15.758 10.788 16.094 10.396 15.977 10.019C15.86 9.643 15.368 9.531 14.384 9.309L14.13 9.251C13.85 9.188 13.71 9.156 13.598 9.071C13.486 8.986 13.414 8.857 13.27 8.599L13.139 8.363C12.632 7.454 12.379 7 12 7C11.621 7 11.368 7.454 10.861 8.363Z"
                                fill="#E74C3C" />
                        </svg>
                        <p class="text-black font-quicksand text-body-medium">
                            Pakai asuransi pengiriman (Rp.800)
                        </p>
                    </div>
                </footer>
            </section>
        </section>
    </article>

<?php
    $rowStart += 2; // Menambah row-start untuk kontainer berikutnya
endforeach;
