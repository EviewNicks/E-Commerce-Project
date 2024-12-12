<?php
$productCount = count($cart);
?>


<div class="flex flex-col items-start gap-2 flex-1">
    <!-- Bar Pilhan -->
    <section
        class="flex px-8 py-6 justify-between items-center self-stretch rounded-[32px_32px_8px_8px] bg-Primary-Layer-2">
        <div class="flex items-center gap-8">
            <div class="flex items-center gap-4">
                <p class="text-xl font-bold text-gray-800 tracking-wide">Order Item</p>
                <p class="text-xl font-bold text-gray-800 tracking-wide">( <?= $productCount ?> )</p>
            </div>
        </div>
        <!-- Hapus -->
        <button type="button" onclick="deleteAllProducts()" class="text-xl font-bold text-secondary-main tracking-wide">
            Hapus
        </button>
    </section>

    <section class="flex flex-col items-start gap-2 self-stretch">
        <!-- Bagian untuk setiap produk dalam keranjang -->
        <?php foreach ($cart as $item): ?>
            <?php
            // Ambil informasi produk berdasarkan ID
            if (!isset($products[$item['product_id']])) {
                continue; // Jika product_id tidak ditemukan, lewati
            }
            $product = $products[$item['product_id']];
            $subtotal = $item['quantity'] * $product['price'];
            $total += $subtotal;
            ?>

            <article class="flex py-1 px-4 gap-4 self-stretch rounded-lg bg-white border border-Third">


                <!-- Produk Information -->
                <section class="flex py-1 justify-center items-center gap-6 flex-1 self-stretch">
                    <!-- Produk Image -->
                    <figure
                        class="bg-cover bg-center w-[124px] h-[159px] rounded-2xl overflow-hidden border border-gray-400">
                        <img class="w-full h-full object-cover" src="<?= ($product['image_url']) ?>"
                            alt="<?= htmlspecialchars($product['name']) ?>" />
                    </figure>

                    <!-- Produk Details -->
                    <div class="flex flex-col justify-between items-end flex-1 self-stretch">
                        <!-- Header Section -->
                        <header class="flex justify-between items-start flex-1 self-stretch">
                            <div class="flex flex-col gap-2 items-start flex-1">
                                <span class="self-stretch text-black font-quicksand text-label-small"> Quantity: <?= $item['quantity'] ?> </span>
                                <p class="w-[404px] text-black font-quicksand text-body-large">
                                    <?= htmlspecialchars($product['name']) ?>
                                </p>
                                <span
                                    class="text-black text-center font-quicksand text-label-large"> Harga: Rp<?= number_format($product['price'], 0, ',', '.') ?></span>
                            </div>

                            <span
                                class="text-black text-center font-quicksand text-label-large"> Subtotal: Rp<?= number_format($subtotal, 0, ',', '.') ?></span>
                        </header>

                        <!-- Action Buttons -->
                        <div class="flex items-center gap-2">
                            <!-- Add to Cart Button -->
                            <button type="button"
                                class="flex p-[5px_4px_4px_4px] rounded-full bg-Secondary-Colors-3 cursor-pointer transition-all duration-300 hover:bg-[#c0392b] hover:shadow-custom hover:scale-105 active:scale-95 active:shadow-[0_4px_8px_rgba(0,0,0,0.2)]"
                                onclick="deleteProduct(<?= $product['product_id']; ?>)">
                                <!-- SVG Placeholder -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M6 19C6 20.1 6.9 21 8 21H16C17.1 21 18 20.1 18 19V9C18 7.9 17.1 7 16 7H8C6.9 7 6 7.9 6 9V19ZM18 4H15.5L14.79 3.29C14.61 3.11 14.35 3 14.09 3H9.91C9.65 3 9.39 3.11 9.21 3.29L8.5 4H6C5.45 4 5 4.45 5 5C5 5.55 5.45 6 6 6H18C18.55 6 19 5.55 19 5C19 4.45 18.55 4 18 4Z"
                                        fill="white" />
                                </svg>
                                <span class="sr-only">sampah</span>
                            </button>
                        </div>
                    </div>
                </section>
            </article>


        <?php endforeach; ?>
    </section>


</div>