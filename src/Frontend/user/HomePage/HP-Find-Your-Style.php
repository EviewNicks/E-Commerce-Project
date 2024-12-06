<?php
// Data untuk kategori
$categories = [
    [
        "title" => "Tren Terbaru",
        "description" => "Update Gayamu dengan Koleksi Terkini!"
    ],
    [
        "title" => "Formal Stylish",
        "description" => "Tampil keren di acara formal!"
    ],
    [
        "title" => "Stylish di Kampus",
        "description" => "Ciptakan gaya yang keren di kampus!"
    ],
    [
        "title" => "Aksesories",
        "description" => "Lengkapi penampilanmu dengan aksesoris!"
    ],
    [
        "title" => "Testimony",
        "description" => "Apa kata pelanggan tentang kami!"
    ]
];
?>

<div class="col-span-12 flex flex-col items-center justify-end gap-[10px] flex-shrink-0 pt-[88px]">
    <!-- Background Gradient Container -->
    <div class="max-w-screen-xl bg-grad-primarygrid bg-cover bg-center flex items-start justify-between p-[44px_80px]">

        <!-- Content Container -->
        <div class="flex p-6 flex-col justify-center items-center flex-1 self-stretch min-h-[520px]">
            <h2 class="self-stretch text-Primary font-playfair text-logo-large">Find Your Style From Here</h2>
            <span class="self-stretch text-black font-quicksand text-title-small">
                Temukan koleksi yang sesuai dengan gayamu setiap hari
            </span>
        </div>

        <!-- Category Container -->
        <div class="grid grid-cols-6 grid-rows-6 min-w-[560px] gap-2 flex-[1_0_0] self-stretch">
            <?php foreach ($categories as $category): ?>
                <!-- Container -->
                <div class="relative flex col-span-3 row-span-2 py-6 pl-6 pr-10 flex-col items-start gap-2.5 rounded-[24px]">
                    <!-- object Container -->
                    <div class="icon-container absolute flex left-0 bottom-0">
                        <object data="<?= asset_url("/src/assets/svg/category-container.svg") ?> " type="image/svg+xml"></object>
                    </div>

                    <!-- object Container -->
                    <div class="icon-container absolute flex right-0 top-0">
                        <object data="<?= asset_url("/src/assets/svg/Ligth.svg") ?> " type="image/svg+xml"></object>
                    </div>

                    <!-- Button Container -->
                    <div class="flex pt-[2px] pb-2 px-2 flex-col items-start absolute left-0 bottom-0">
                        <button type="button"
                            class="all-unset flex w-[179px] py-[2px] pr-[2px] pl-3 justify-between items-center rounded-[24px] bg-Primary-Colors-2 cursor-pointer transition-all duration-300 ease-linear hover:bg-gradient-to-br hover:from-[#35526f] hover:to-[#2e4860] hover:border-[#e74c3c] hover:text-[#e74c3c] hover:-translate-y-0.5 hover:shadow-lg active:bg-[#2e4860] active:translate-y-0 active:shadow-md">
                            <p class="flex-1 text-center text-Third font-quicksand text-[12px] font-medium leading-[20px]">
                                Lihat Koleksi
                            </p>
                            <div class="flex p-[8px_6px_8px_10px] rotate-90 items-center rounded-3xl bg-Secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                    <path d="M12.9646 14.6319C12.9922 14.6872 13.0083 14.7476 13.012 14.8094C13.0156 14.8712 13.0068 14.9331 12.9859 14.9913C12.965 15.0495 12.9325 15.103 12.8904 15.1483C12.8483 15.1937 12.7974 15.23 12.7409 15.2552L4.12241 19.0988C2.75199 19.7102 1.32932 18.3526 2.00857 17.0803L4.89791 11.6683C5.12249 11.2475 5.12249 10.7516 4.89791 10.3318L2.00857 4.91978C1.33024 3.64745 2.75107 2.28895 4.12241 2.90128L7.35366 4.34228C7.74117 4.51516 8.05671 4.8171 8.24649 5.19662L12.9646 14.6319Z" fill="#ECF0F1" />
                                    <path opacity="0.5" d="M14.2388 14.1075C14.2916 14.2132 14.3831 14.2943 14.4943 14.3341C14.6054 14.3739 14.7277 14.3693 14.8355 14.3211L19.2566 12.3503C20.4694 11.8095 20.4694 10.1915 19.2566 9.65071L11.1001 6.01338C11.0138 5.97491 10.9178 5.96402 10.8251 5.98222C10.7324 6.00041 10.6477 6.04679 10.5823 6.11501C10.517 6.18324 10.4744 6.26997 10.4602 6.36336C10.4461 6.45674 10.4612 6.55221 10.5034 6.63671L14.2388 14.1075Z" fill="#ECF0F1" />
                                </svg>
                            </div>
                        </button>
                    </div>

                    <!-- Header Container -->
                    <div class="flex flex-col items-start gap-2.5 w-full z-10">
                        <h2 class="w-full text-Third font-quicksand text-[20px] font-bold leading-[24px] tracking-[0.3px]">
                            <?= htmlspecialchars($category["title"], ENT_QUOTES, 'UTF-8') ?>
                        </h2>
                        <span class="w-full text-Third font-quicksand text-[12px] font-medium leading-[20px]">
                            <?= htmlspecialchars($category["description"], ENT_QUOTES, 'UTF-8') ?>
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>