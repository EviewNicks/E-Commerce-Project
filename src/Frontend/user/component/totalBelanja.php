<!-- Container 2 -->
<div
    class="sticky top-24 flex flex-col items-center col-span-5 col-start-8 row-span-5 py-9 bg-Primary-Colors-3 rounded-2xl">
    <!-- Ringkasan Belanja -->
    <div class="flex flex-col w-full border-b-2 border-[#A6A5A5] px-6">
        <!-- Header -->
        <div class="flex flex-col gap-3 w-full">
            <p class="self-stretch text-Third font-quicksand text-label-large">Ringkasan Belanja</p>

            <!-- Detail -->
            <div class="flex flex-col items-center gap-3 w-full py-4 border-b-2 border-[#A6A5A5]">
                <div class="flex justify-between items-center w-full">
                    <span class="flex-1 text-Third font-quicksand text-body-large">Total harga (<?= array_sum(array_column($data['productPayments'], 'quantity')) ?> Barang)
                    </span>
                    <span class=" text-Third font-quicksand text-label-medium">Rp.<?= number_format($data['total_price'], 0, ',', '.') ?></span>
                </div>
                <div class="flex justify-between items-center w-full">
                    <span class="flex-1  text-Third font-quicksand text-body-large">Total Ongkos kirim</span>
                    <span class="text-Third font-quicksand text-label-medium">Rp.<?= number_format($data['shipping_cost'], 0, ',', '.') ?></span>
                </div>
                <div class="flex justify-between items-center w-full">
                    <span class="flex-1 text-Third font-quicksand text-body-large">Total Biaya Proteksi</span>
                    <span class="flex text-Third font-quicksand text-label-medium">Rp.<?= number_format($data['insurance_total'], 0, ',', '.') ?> </span>
                </div>
                <div class="flex justify-between items-center w-full">
                    <span class="flex-1 text-Third font-quicksand text-body-large">Biaya Jasa
                        Aplikasi</span>
                    <span class=" text-Third font-quicksand text-label-medium">Rp.<?= number_format(1000, 0, ',', '.') ?></span>
                </div>
                <div class="flex justify-between items-center w-full">
                    <span class="flex-1 text-Third font-quicksand text-body-large">Potongan Diskon</span>
                    <span class=" text-Third font-quicksand text-label-medium">Rp.<?= number_format($data['discount_value'], 0, ',', '.') ?></span>
                </div>
            </div>
        </div>
        <!-- Total -->
        <div class="flex justify-between items-start w-full py-4 ">
            <p class="text-Third font-quicksand text-body-large">Total Keseluruhan </p>
            <p class="flex text-Third font-quicksand text-label-large">Rp.<?= number_format($data['grand_total'], 0, ',', '.') ?></p>
        </div>

    </div>
    <!-- Pembayaran -->
    <div class="flex flex-col items-center gap-2 w-full px-6 pt-4">
        <form action="?page=saveOrders" method="POST" class="self-stretch" id="payment-form">
            <!-- Hidden Input untuk Menyimpan Pilihan -->
            <input type="hidden" name="payment-method" id="selected-payment-method" />

            <button type="submit"
                class="flex justify-center items-center w-full p-3 bg-Secondary rounded-xl transition-all duration-300 ease-in-out cursor-pointer hover:bg-red-600 hover:scale-105 hover:shadow-lg active:bg-red-700 active:scale-95">
                <p class="text-Third font-quicksand text-label-large">Bayar Sekarang</p>
            </button>
        </form>
        <div class="flex justify-center items-center w-full py-1">
            <p class="flex-1 text-Third text-center font-quicksand text-body-medium">Dengan melanjutkan,
                kamu
                menyetujui S&K Asuransi & Proteksi</p>
        </div>
    </div>
</div>