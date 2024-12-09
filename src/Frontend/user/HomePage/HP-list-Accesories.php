<?php
// Data Produk Aksesori
$accessories = [
    [
        "product_id" => 100,
        "category_id" => 2, // Asumsikan kategori 2 adalah "Aksesori Kampus"
        "name" => "Tas Ransel Kuliah",
        "description" => "Tas ransel serbaguna dengan ruang laptop, cocok untuk kebutuhan mahasiswa.",
        "price" => 450.000,
        "created_at" => "2024-12-01 10:00:00",
        "image_url" => asset_url("public/Accesories/cap-2.jpg"),
        "is_featured" => 1,
        "tags" => "tas, ransel, mahasiswa",
        "rating" => 4.4,
        "terjual" => 15,
        "jumlah_stok" => 24,
    ],
    [
        "product_id" => 101,
        "category_id" => 2,
        "name" => "Botol Minum Tahan Panas",
        "description" => "Botol minum praktis dengan fitur isolasi panas dan dingin.",
        "price" => 120.000,
        "created_at" => "2024-12-02 15:30:00",
        "image_url" => asset_url("public/Accesories/cap.jpg"),
        "is_featured" => 1,
        "tags" => "botol, minum, isolasi",
        "rating" => 4.4,
        "terjual" => 15,
        "jumlah_stok" => 24,
    ],
    [
        "product_id" => 102,
        "category_id" => 2,
        "name" => "Payung Lipat Portable",
        "description" => "Payung lipat yang mudah dibawa, ideal untuk cuaca tak menentu.",
        "price" => 75.000,
        "created_at" => "2024-12-03 09:20:00",
        "image_url" => asset_url("public/Accesories/glassbe-2.jpg"),
        "is_featured" => 0,
        "tags" => "payung, portable, mahasiswa",
        "rating" => 4.4,
        "terjual" => 15,
        "jumlah_stok" => 24,
    ],
    [
        "product_id" => 103,
        "category_id" => 2,
        "name" => "Jam Tangan Digital",
        "description" => "Jam tangan digital modern dengan fitur alarm dan stopwatch.",
        "price" => 250.000,
        "created_at" => "2024-12-04 13:10:00",
        "image_url" => asset_url("public/Accesories/necklace.jpg"),
        "is_featured" => 0,
        "tags" => "jam tangan, digital, stylish",
        "rating" => 4.4,
        "terjual" => 15,
        "jumlah_stok" => 24,
    ],
    [
        "product_id" => 104,
        "category_id" => 2,
        "name" => "Notebook Planner",
        "description" => "Notebook planner elegan untuk mencatat jadwal dan tugas kuliah.",
        "price" => 95.000,
        "created_at" => "2024-12-05 08:45:00",
        "image_url" => asset_url("public/Accesories/ring.jpg"),
        "is_featured" => 1,
        "tags" => "notebook, planner, mahasiswa",
        "rating" => 4.4,
        "terjual" => 15,
        "jumlah_stok" => 24,
    ],
    [
        "product_id" => 105,
        "category_id" => 2,
        "name" => "Headphone Bluetooth",
        "description" => "Headphone wireless dengan kualitas suara premium, cocok untuk belajar.",
        "price" => 650.000,
        "created_at" => "2024-12-05 18:15:00",
        "image_url" => asset_url("public/Accesories/watch.jpg"),
        "is_featured" => 1,
        "tags" => "headphone, bluetooth, audio",
        "rating" => 4.4,
        "terjual" => 15,
        "jumlah_stok" => 24,
    ],
];
?>


<div class="col-span-12 flex flex-col items-center justify-end flex-shrink-0 pt-[88px]">
    <!-- Main Image -->
    <div
        class="main-image bg-White-Colors-2 flex  px-[80px] py-[14px] flex-col justify-center items-start gap-3 self-stretch">
        <!-- Content Container -->
        <div class="flex flex-col items-start gap-4 flex-1 self-stretch">
            <!-- Title Recommend -->
            <div class="title-recommend flex pb-8 justify-between items-center self-stretch">
                <div class="flex p-[8px_0px] max-w-[400px] justify-center items-center flex-1 rounded-xl bg-white">
                    <span class="text-Primary font-poppins text-headline-medium">Accesories in Campus</span>
                </div>
                <button type="button"
                    class="all flex py-1 pr-[4px] max-h-12 pl-6 gap-8 items-center justify-center rounded-full bg-Primary-Colors-4 cursor-pointer transition-all duration-300 ease-linear hover:bg-gradient-to-br hover:from-[#35526f] hover:to-[#2e4860] hover:border-[#e74c3c] hover:text-[#e74c3c] hover:-translate-y-0.5 hover:shadow-lg active:bg-[#2e4860] active:translate-y-0 active:shadow-md">
                    <p class="text-Third font-quicksand text-label-large">
                        Lihat Selengkapnya
                    </p>
                    <div class="flex p-2 items-center rounded-3xl bg-Secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 29 28"
                            fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M23.7603 0.195804C24.3402 -0.0153727 24.9684 -0.0567323 25.571 0.0765863C26.1736 0.209905 26.7256 0.512362 27.1622 0.948409C27.5987 1.38446 27.9016 1.93597 28.0353 2.53814C28.169 3.14031 28.1279 3.7681 27.9169 4.34774L20.7644 25.7714C20.5903 26.2979 20.2841 26.7709 19.8748 27.1452C19.4655 27.5196 18.967 27.7827 18.4269 27.9094C17.888 28.0403 17.3244 28.0292 16.7912 27.877C16.2579 27.7249 15.7734 27.4369 15.3849 27.0414L11.5465 23.2235L7.51595 25.3074C7.36145 25.3875 7.18872 25.4259 7.01482 25.4189C6.84092 25.4118 6.67187 25.3596 6.52435 25.2673C6.37683 25.175 6.25595 25.0459 6.17365 24.8926C6.09134 24.7394 6.05045 24.5673 6.05502 24.3934L6.22113 18.0255L20.3201 7.79169C20.4531 7.69517 20.5657 7.57342 20.6516 7.43339C20.7375 7.29336 20.795 7.13779 20.8207 6.97557C20.8465 6.81335 20.84 6.64765 20.8016 6.48793C20.7633 6.32822 20.6938 6.17761 20.5973 6.04472C20.5007 5.91182 20.3788 5.79924 20.2387 5.71339C20.0986 5.62755 19.9429 5.57013 19.7806 5.54441C19.6183 5.51869 19.4525 5.52517 19.2927 5.56349C19.1328 5.6018 18.9821 5.6712 18.8491 5.76772L4.51204 16.1756L1.04984 12.7156C0.676714 12.3426 0.401622 11.8832 0.249043 11.3784C0.0964631 10.8735 0.0711274 10.3387 0.175289 9.82166C0.28002 9.25639 0.533363 8.72915 0.909321 8.29404C1.28528 7.85893 1.77031 7.53162 2.31465 7.3457H2.32065L23.7583 0.193804L23.7603 0.195804Z"
                                fill="#ECF0F1" />
                        </svg>
                    </div>
                </button>
            </div>

            <!-- Box Content -->
            <div class="box-content flex justify-center items-center content-center gap-2 self-stretch flex-wrap">


                <?php
                foreach ($accessories as $accessori) {
                ?>
                    <!-- Card Kedua -->
                    <div
                        class="relative card-product group flex w-[200px] h-[256px] pt-4 px-3 pb-3 flex-col justify-between items-center rounded-3xl hover:cursor-pointer active:scale-95 active:shadow-inner transition-all">

                        <!-- object Container -->
                        <!-- object Container -->
                        <div class="icon-container absolute flex left-0 top-0 ">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="200" height="256" viewBox="0 0 200 256" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M80.8415 5.5C76.4137 1.94045 70.903 0 65.2219 0H32C14.3269 0 0 14.3269 0 32V224C0 241.673 14.3269 256 32 256H168C185.673 256 200 241.673 200 224V32C200 14.3269 185.673 0 168 0H133.778C128.097 0 122.586 1.94045 118.159 5.5V5.5C113.731 9.05955 108.22 11 102.539 11H96.4611C90.7799 11 85.2692 9.05955 80.8415 5.5V5.5Z"
                                    fill="url(#pattern<?= $accessori['product_id'] ?>)" stroke="#95A5A6" stroke-width="2" />
                                <defs>
                                    <!-- Pattern Definition -->
                                    <pattern id="pattern<?= $accessori['product_id'] ?>" patternContentUnits="objectBoundingBox" width="1" height="1">
                                        <use xlink:href="#image<?= $accessori['product_id'] ?>" transform="matrix(0.00147929 0 0 0.0011557 0 -0.193995)" />
                                    </pattern>
                                    <!-- Image Definition -->
                                    <image id="image<?= $accessori['product_id'] ?>" width="676" height="1201" xlink:href="<?= $accessori['image_url'] ?>" />
                                </defs>
                            </svg>
                        </div>

                        <!-- rating and Sale -->
                        <div
                            class="rating-and-sales hidden group-hover:flex justify-between items-start self-stretch z-10 transition-all duration-300 opacity-0 group-hover:opacity-100">
                            <!-- Rating Container -->
                            <div class="flex p-[0_4px] flex-col items-start gap-[6px]">
                                <div class="flex p-[2px_4px] items-center gap-1 self-stretch rounded-[8px] bg-white">
                                    <div class="rating flex pr-1 items-center border-r-[2px] border-[#95A5A6]">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-[12px] h-[12px] fill-[#FFE31A]"
                                            viewBox="0 0 12 12">
                                            <path
                                                d="M4.29184 2.04481C5.05202 0.681604 5.43181 0 6 0C6.56819 0 6.94798 0.681604 7.70816 2.04481L7.90495 2.39762C8.12095 2.78522 8.22895 2.97902 8.39694 3.10682C8.56494 3.23462 8.77493 3.28202 9.19492 3.37682L9.57652 3.46322C11.0525 3.79742 11.7899 3.96423 11.9657 4.52883C12.1409 5.09283 11.6381 5.68144 10.6319 6.85804L10.3715 7.16225C10.0859 7.49645 9.94251 7.66385 9.87831 7.87025C9.81411 8.07725 9.83571 8.30045 9.87891 8.74626L9.91851 9.15246C10.0703 10.7227 10.1465 11.5075 9.68691 11.8561C9.22732 12.2047 8.53614 11.8867 7.15497 11.2507L6.79678 11.0863C6.40439 10.9051 6.20819 10.8151 6 10.8151C5.7918 10.8151 5.59561 10.9051 5.20322 11.0863L4.84563 11.2507C3.46386 11.8867 2.77268 12.2047 2.31369 11.8567C1.8535 11.5075 1.9297 10.7227 2.08149 9.15246L2.12109 8.74686C2.16429 8.30045 2.18589 8.07725 2.12109 7.87085C2.05749 7.66385 1.9141 7.49645 1.6285 7.16285L1.36811 6.85804C0.361933 5.68204 -0.140856 5.09343 0.0343402 4.52883C0.209536 3.96423 0.948119 3.79682 2.42408 3.46322L2.80567 3.37682C3.22506 3.28202 3.43446 3.23462 3.60306 3.10682C3.77165 2.97902 3.87905 2.78522 4.09504 2.39762L4.29184 2.04481Z"
                                                fill="#FFE31A" />
                                        </svg>
                                        <p class="text-[#1E1E1E] font-poppins text-[12px] font-medium leading-[20px]">
                                            <?= $accessori['rating'] ?>/5</p>
                                    </div>
                                    <p
                                        class="sales-count text-[#1E1E1E] font-poppins text-[12px] font-medium leading-[20px]">
                                        <?= $accessori['terjual'] ?>+</p>
                                </div>
                            </div>

                            <!-- Icons Container -->
                            <div class="icons-container flex flex-col items-start gap-[12px]">
                                <!-- Icon 1 -->
                                <div
                                    class="solar-bag-2 flex p-[6px] flex-col items-center rounded-[24px] bg-Secondary transition-all duration-300 ease-in-out hover:bg-[#D63B32] hover:scale-[1.05]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-[16px] h-[16px] fill-[#ECF0F1]"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M15.9573 7.15287C15.8838 6.83543 15.7418 6.53787 15.5414 6.28095C15.338 6.02598 15.0813 5.8185 14.7894 5.67301C14.5592 5.55976 14.3093 5.49187 14.0534 5.47303C13.923 4.07326 13.3026 2.76447 12.3015 1.77741C11.1616 0.639261 9.61655 0 8.00568 0C6.3948 0 4.84977 0.639261 3.70986 1.77741C2.70878 2.76447 2.08834 4.07326 1.95794 5.47303C1.70206 5.49187 1.45219 5.55976 1.22197 5.67301C0.928589 5.81623 0.67149 6.02408 0.470004 6.28095C0.268067 6.53731 0.125928 6.83553 0.05396 7.15383C-0.0180076 7.47213 -0.0179864 7.80248 0.0540221 8.12077L1.30997 13.2643C1.52614 14.0523 1.99584 14.7473 2.6465 15.2418C3.29717 15.7363 4.09257 16.0027 4.90981 16H11.0775C11.8976 16.0008 12.6951 15.7319 13.3471 15.2346C13.9991 14.7373 14.4694 14.0393 14.6854 13.2483L15.9333 8.12077C16.0133 7.804 16.0213 7.47283 15.9573 7.15287ZM5.47779 12.2884C5.47779 12.4475 5.41458 12.6001 5.30206 12.7126C5.18954 12.8251 5.03694 12.8883 4.87781 12.8883C4.71869 12.8883 4.56608 12.8251 4.45357 12.7126C4.34105 12.6001 4.27784 12.4475 4.27784 12.2884V9.13667C4.27784 8.97755 4.34105 8.82496 4.45357 8.71245C4.56608 8.59993 4.71869 8.53673 4.87781 8.53673C5.03694 8.53673 5.18954 8.59993 5.30206 8.71245C5.41458 8.82496 5.47779 8.97755 5.47779 9.13667V12.2884ZM8.60565 12.2884C8.60565 12.3671 8.59013 12.4451 8.55998 12.5179C8.52983 12.5907 8.48564 12.6569 8.42992 12.7126C8.37421 12.7683 8.30807 12.8125 8.23528 12.8426C8.16249 12.8728 8.08447 12.8883 8.00568 12.8883C7.92689 12.8883 7.84887 12.8728 7.77608 12.8426C7.70329 12.8125 7.63715 12.7683 7.58143 12.7126C7.52572 12.6569 7.48153 12.5907 7.45138 12.5179C7.42122 12.4451 7.4057 12.3671 7.4057 12.2884V9.13667C7.4057 8.97755 7.46892 8.82496 7.58143 8.71245C7.69395 8.59993 7.84656 8.53673 8.00568 8.53673C8.1648 8.53673 8.31741 8.59993 8.42992 8.71245C8.54244 8.82496 8.60565 8.97755 8.60565 9.13667V12.2884ZM11.7335 12.2884C11.7335 12.4475 11.6703 12.6001 11.5578 12.7126C11.4453 12.8251 11.2927 12.8883 11.1335 12.8883C10.9744 12.8883 10.8218 12.8251 10.7093 12.7126C10.5968 12.6001 10.5336 12.4475 10.5336 12.2884V9.13667C10.5336 8.97755 10.5968 8.82496 10.7093 8.71245C10.8218 8.59993 10.9744 8.53673 11.1335 8.53673C11.2927 8.53673 11.4453 8.59993 11.5578 8.71245C11.6703 8.82496 11.7335 8.97755 11.7335 9.13667V12.2884ZM3.16589 5.45704C3.29745 4.38324 3.78795 3.38539 4.55783 2.62532C5.47378 1.71382 6.71344 1.20212 8.00568 1.20212C9.29792 1.20212 10.5376 1.71382 11.4535 2.62532C12.2234 3.38539 12.7139 4.38324 12.8455 5.45704H3.16589Z"
                                            fill="#ECF0F1" />
                                    </svg>
                                </div>
                                <!-- Icon 2 -->
                                <div
                                    class="solar-bag-3 flex p-[8px_6px_6px_6px] flex-col items-center rounded-[24px] border-[0.5px] border-[#E74C3C] bg-[#FCD0CC] transition-all duration-300 ease-in-out hover:bg-[#F8B8B3] hover:border-[#D63B32] hover:scale-[1.05]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-[16px] h-[14px]"
                                        viewBox="0 0 16 14">
                                        <path
                                            d="M8.00016 11.8563C7.84461 11.8563 7.68638 11.832 7.5255 11.7833C7.36461 11.7347 7.22283 11.6569 7.10016 11.55L5.95016 10.6313C4.77238 9.6882 3.70838 8.75253 2.75816 7.82425C1.80794 6.89598 1.33305 5.87262 1.3335 4.75417C1.3335 3.84028 1.6835 3.07709 2.3835 2.46459C3.0835 1.85209 3.95572 1.54584 5.00016 1.54584C5.58905 1.54584 6.14461 1.65512 6.66683 1.87367C7.18905 2.09223 7.6335 2.39128 8.00016 2.77084C8.36683 2.39167 8.81127 2.09281 9.3335 1.87425C9.85572 1.6557 10.4113 1.54623 11.0002 1.54584C12.0446 1.54584 12.9168 1.85209 13.6168 2.46459C14.3168 3.07709 14.6668 3.84028 14.6668 4.75417C14.6668 5.87223 14.1946 6.89792 13.2502 7.83125C12.3057 8.76459 11.2335 9.70278 10.0335 10.6458L8.90016 11.55C8.77794 11.6569 8.63638 11.7347 8.4755 11.7833C8.31461 11.832 8.15616 11.8563 8.00016 11.8563Z"
                                            fill="#ECF0F1" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Promo and Title Container -->
                        <div
                            class="relative hidden group-hover:flex h-[96px] p-[32px_20px_8px_20px] flex-col justify-between items-center flex-shrink-0 self-stretch rounded-[24px] drop-shadow-shadow-product transition-all ease-in-out duration-500 opacity-0 group-hover:opacity-100">
                            <!-- Promo Text Container -->
                            <?php if ($accessori['is_featured']) { ?>
                                <div class="flex p-[6px_0_0_8px] items-start flex-col absolute left-0 top-0 z-10">
                                    <div class="flex p-[0_8px] flex-col items-start rounded-[4px] bg-Secondary">
                                        <p class="self-stretch text-white font-quicksand text-body-medium">Promo Hari ini!</p>
                                    </div>
                                </div>
                            <?php } ?>

                            <!-- object Container -->
                            <div class="icon-container absolute flex right-0 top-0">
                                <object data="<?= asset_url("/src/assets/svg/product-container.svg") ?>" type="image/svg+xml"></object>
                            </div>

                            <!-- Send Email Button -->
                            <div
                                class="absolute top-1 right-1 flex items-center p-1 rounded-full bg-Secondary shadow-custom cursor-pointer transition-all duration-300 hover:bg-[#c0392b] hover:shadow-[0_8px_16px_rgba(0,0,0,0.3)] hover:scale-105 active:scale-95 active:shadow-[0_4px_8px_rgba(0,0,0,0.2)]">
                                <object data="<?= asset_url("/src/assets/icon/chevron-right.svg") ?> " width="26" height="26"
                                    type="image/svg+xml"></object>
                            </div>



                            <h4 class="self-stretch text-black font-quicksand text-body-small z-10">
                                <?= $accessori['name'] ?> </h4>
                            <div class="flex items-center justify-between self-stretch z-10">
                                <p class="text-black font-poppins text-body-small"><?= $accessori['price'] ?></p>

                                <?php if ($accessori['jumlah_stok'] < 25) { ?>
                                    <div class="flex p-[0_2px] justify-center items-center rounded-[4px] bg-Secondary">
                                        <p class="text-white font-poppins text-body-small">Stok Terbatas</p>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
</div>