<!-- Container 3 -->
<div class="flex flex-col col-span-7 row-start-3 row-span-3 rounded-3xl bg-[#A6BFD3]">
    <!-- Header -->
    <div class="flex px-6 py-4 justify-between items-center border-b border-gray-300">
        <p class="text-lg font-bold text-black">Metode Pembayaran</p>
    </div>

    <!-- Daftar Metode -->
    <ul class="px-3 py-4 space-y-3 ">
        <!-- Opsi 1 -->
        <li>
            <label for="payment-dana"
                class="flex items-center h-[45px] justify-between px-3 rounded-lg cursor-pointer hover:bg-gray-100 transition">
                <!-- Icon atau Logo -->
                <img src="<?= asset_url("/src/assets/svg/dana.svg") ?>" alt="Dana" class="h mr-4" />

                <!-- Radio Button -->
                <input id="payment-dana" type="radio" name="payment-method" value="dana"
                    class="w-6 h-6 text-Primary border-gray-300 focus:ring-blue-500" checked />
            </label>
        </li>

        <!-- Opsi 2 -->
        <li>
            <label for="payment-ovo"
                class="flex items-center  h-[45px] px-3  justify-between rounded-lg cursor-pointer hover:bg-gray-100 transition">
                <img src="<?= asset_url("/src/assets/svg/ovo.svg") ?>" alt="OVO" class=" mr-4" />

                <input id="payment-ovo" type="radio" name="payment-method" value="ovo"
                    class="w-6 h-6 text-Primary border-gray-300 focus:ring-blue-500" />
            </label>
        </li>

        <!-- Opsi 3 -->
        <li>
            <label for="payment-gopay"
                class="flex items-center  h-[45px] px-3 justify-between rounded-lg cursor-pointer hover:bg-gray-100 transition">
                <img src="<?= asset_url("/src/assets/svg/gopay.svg") ?>" alt="GoPay" class="mr-4" />

                <input id="payment-gopay" type="radio" name="payment-method" value="gopay"
                    class="w-6 h-6 text-Primary border-gray-300 focus:ring-blue-500" />
            </label>
        </li>
    </ul>
</div>