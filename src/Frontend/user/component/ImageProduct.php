<div class="col-span-6 row-span-6 rounded-lg gap-2 grid grid-cols-6 grid-rows-6">
    <div
        class="card-product relative group flex col-span-4 row-span-6 py-6 px-[22px] pb-3 flex-col justify-between items-center rounded-3xl hover:cursor-pointer active:scale-95 active:shadow-inner transition-all duration-300 ease-in-out">

        <!-- object Container -->
        <div class="icon-container absolute flex right-0 top-0">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="364"
                height="518" viewBox="0 0 364 518" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M150.413 9.61859C144.393 3.46713 136.149 0 127.542 0H32C14.3269 0 0 14.3269 0 32V486C0 503.673 14.3269 518 32 518H332C349.673 518 364 503.673 364 486V32C364 14.3269 349.673 0 332 0H236.458C227.851 0 219.607 3.46713 213.587 9.61858L210.413 12.8624C204.393 19.0139 196.149 22.481 187.542 22.481H176.458C167.851 22.481 159.607 19.0139 153.587 12.8624L150.413 9.61859Z"
                    fill="url(#pattern0_<?= $product['product_id'] ?>)" stroke="#95A5A6" stroke-width="2" />
                <defs>
                    <pattern id="pattern0_<?= $product['product_id'] ?>" patternContentUnits="objectBoundingBox" width="1"
                        height="1">
                        <use xlink:href="#image0_<?= $product['product_id'] ?>" transform="matrix(0.00147929 0 0 0.0010395 0 -0.12422)" />
                    </pattern>
                    <image id="image0_<?= $product['product_id'] ?>" width="676" height="1201"
                        xlink:href="<?= htmlspecialchars($product['image_url']) ?>" />
                </defs>
            </svg>

        </div>

        <!-- rating, data Terjual bag and like product -->
        <div
            class="rating-and-sales hidden group-hover:flex justify-between items-start self-stretch z-10 transition-all duration-500 ease-in-out opacity-0 group-hover:opacity-100">
            <!-- Rating Container -->
            <div class="flex p-2 flex-col items-start">
                <div class="flex p-2 items-center self-stretch rounded-[12px] bg-white shadow-custom gap-2">
                    <!-- Rating -->
                    <div class="rating flex pr-[12px] items-center border-r-[2px] border-[#95A5A6] gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-[16px] h-[16px] fill-[#FFE31A]"
                            viewBox="0 0 12 12">
                            <path
                                d="M4.29184 2.04481C5.05202 0.681604 5.43181 0 6 0C6.56819 0 6.94798 0.681604 7.70816 2.04481L7.90495 2.39762C8.12095 2.78522 8.22895 2.97902 8.39694 3.10682C8.56494 3.23462 8.77493 3.28202 9.19492 3.37682L9.57652 3.46322C11.0525 3.79742 11.7899 3.96423 11.9657 4.52883C12.1409 5.09283 11.6381 5.68144 10.6319 6.85804L10.3715 7.16225C10.0859 7.49645 9.94251 7.66385 9.87831 7.87025C9.81411 8.07725 9.83571 8.30045 9.87891 8.74626L9.91851 9.15246C10.0703 10.7227 10.1465 11.5075 9.68691 11.8561C9.22732 12.2047 8.53614 11.8867 7.15497 11.2507L6.79678 11.0863C6.40439 10.9051 6.20819 10.8151 6 10.8151C5.7918 10.8151 5.59561 10.9051 5.20322 11.0863L4.84563 11.2507C3.46386 11.8867 2.77268 12.2047 2.31369 11.8567C1.8535 11.5075 1.9297 10.7227 2.08149 9.15246L2.12109 8.74686C2.16429 8.30045 2.18589 8.07725 2.12109 7.87085C2.05749 7.66385 1.9141 7.49645 1.6285 7.16285L1.36811 6.85804C0.361933 5.68204 -0.140856 5.09343 0.0343402 4.52883C0.209536 3.96423 0.948119 3.79682 2.42408 3.46322L2.80567 3.37682C3.22506 3.28202 3.43446 3.23462 3.60306 3.10682C3.77165 2.97902 3.87905 2.78522 4.09504 2.39762L4.29184 2.04481Z"
                                fill="#FFE31A" />
                        </svg>
                        <p class="text-[#1E1E1E] font-poppins text-label-medium">
                            4.9/5</p>
                    </div>
                    <p class="sales-count text-[#1E1E1E] font-poppins text-label-medium">
                        Terjual 32+</p>
                </div>
            </div>
            <!-- Icons Container -->
            <div class="icons-container flex flex-col items-start gap-[12px]">
                <!-- Icon 1 -->
                <div
                    class="solar-bag-2 flex p-[6px] flex-col items-center rounded-[24px] bg-Secondary transition-all duration-300 ease-in-out hover:bg-[#D63B32] hover:scale-[1.05]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-[24px] h-[24px] fill-[#ECF0F1]"
                        viewBox="0 0 16 16">
                        <path
                            d="M15.9573 7.15287C15.8838 6.83543 15.7418 6.53787 15.5414 6.28095C15.338 6.02598 15.0813 5.8185 14.7894 5.67301C14.5592 5.55976 14.3093 5.49187 14.0534 5.47303C13.923 4.07326 13.3026 2.76447 12.3015 1.77741C11.1616 0.639261 9.61655 0 8.00568 0C6.3948 0 4.84977 0.639261 3.70986 1.77741C2.70878 2.76447 2.08834 4.07326 1.95794 5.47303C1.70206 5.49187 1.45219 5.55976 1.22197 5.67301C0.928589 5.81623 0.67149 6.02408 0.470004 6.28095C0.268067 6.53731 0.125928 6.83553 0.05396 7.15383C-0.0180076 7.47213 -0.0179864 7.80248 0.0540221 8.12077L1.30997 13.2643C1.52614 14.0523 1.99584 14.7473 2.6465 15.2418C3.29717 15.7363 4.09257 16.0027 4.90981 16H11.0775C11.8976 16.0008 12.6951 15.7319 13.3471 15.2346C13.9991 14.7373 14.4694 14.0393 14.6854 13.2483L15.9333 8.12077C16.0133 7.804 16.0213 7.47283 15.9573 7.15287ZM5.47779 12.2884C5.47779 12.4475 5.41458 12.6001 5.30206 12.7126C5.18954 12.8251 5.03694 12.8883 4.87781 12.8883C4.71869 12.8883 4.56608 12.8251 4.45357 12.7126C4.34105 12.6001 4.27784 12.4475 4.27784 12.2884V9.13667C4.27784 8.97755 4.34105 8.82496 4.45357 8.71245C4.56608 8.59993 4.71869 8.53673 4.87781 8.53673C5.03694 8.53673 5.18954 8.59993 5.30206 8.71245C5.41458 8.82496 5.47779 8.97755 5.47779 9.13667V12.2884ZM8.60565 12.2884C8.60565 12.3671 8.59013 12.4451 8.55998 12.5179C8.52983 12.5907 8.48564 12.6569 8.42992 12.7126C8.37421 12.7683 8.30807 12.8125 8.23528 12.8426C8.16249 12.8728 8.08447 12.8883 8.00568 12.8883C7.92689 12.8883 7.84887 12.8728 7.77608 12.8426C7.70329 12.8125 7.63715 12.7683 7.58143 12.7126C7.52572 12.6569 7.48153 12.5907 7.45138 12.5179C7.42122 12.4451 7.4057 12.3671 7.4057 12.2884V9.13667C7.4057 8.97755 7.46892 8.82496 7.58143 8.71245C7.69395 8.59993 7.84656 8.53673 8.00568 8.53673C8.1648 8.53673 8.31741 8.59993 8.42992 8.71245C8.54244 8.82496 8.60565 8.97755 8.60565 9.13667V12.2884ZM11.7335 12.2884C11.7335 12.4475 11.6703 12.6001 11.5578 12.7126C11.4453 12.8251 11.2927 12.8883 11.1335 12.8883C10.9744 12.8883 10.8218 12.8251 10.7093 12.7126C10.5968 12.6001 10.5336 12.4475 10.5336 12.2884V9.13667C10.5336 8.97755 10.5968 8.82496 10.7093 8.71245C10.8218 8.59993 10.9744 8.53673 11.1335 8.53673C11.2927 8.53673 11.4453 8.59993 11.5578 8.71245C11.6703 8.82496 11.7335 8.97755 11.7335 9.13667V12.2884ZM3.16589 5.45704C3.29745 4.38324 3.78795 3.38539 4.55783 2.62532C5.47378 1.71382 6.71344 1.20212 8.00568 1.20212C9.29792 1.20212 10.5376 1.71382 11.4535 2.62532C12.2234 3.38539 12.7139 4.38324 12.8455 5.45704H3.16589Z"
                            fill="#ECF0F1" />
                    </svg>
                </div>
                <!-- Icon 2 -->
                <div
                    class="solar-bag-3 flex p-[8px_6px_6px_6px] flex-col items-center rounded-[24px] border-[0.5px] border-[#E74C3C] bg-[#FCD0CC] transition-all duration-300 ease-in-out hover:bg-[#F8B8B3] hover:border-[#D63B32] hover:scale-[1.05]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-[24px] h-[22px]" viewBox="0 0 16 14">
                        <path
                            d="M8.00016 11.8563C7.84461 11.8563 7.68638 11.832 7.5255 11.7833C7.36461 11.7347 7.22283 11.6569 7.10016 11.55L5.95016 10.6313C4.77238 9.6882 3.70838 8.75253 2.75816 7.82425C1.80794 6.89598 1.33305 5.87262 1.3335 4.75417C1.3335 3.84028 1.6835 3.07709 2.3835 2.46459C3.0835 1.85209 3.95572 1.54584 5.00016 1.54584C5.58905 1.54584 6.14461 1.65512 6.66683 1.87367C7.18905 2.09223 7.6335 2.39128 8.00016 2.77084C8.36683 2.39167 8.81127 2.09281 9.3335 1.87425C9.85572 1.6557 10.4113 1.54623 11.0002 1.54584C12.0446 1.54584 12.9168 1.85209 13.6168 2.46459C14.3168 3.07709 14.6668 3.84028 14.6668 4.75417C14.6668 5.87223 14.1946 6.89792 13.2502 7.83125C12.3057 8.76459 11.2335 9.70278 10.0335 10.6458L8.90016 11.55C8.77794 11.6569 8.63638 11.7347 8.4755 11.7833C8.31461 11.832 8.15616 11.8563 8.00016 11.8563Z"
                            fill="#ECF0F1" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Promo and Title Container -->
        <div
            class="relative hidden group-hover:flex h-[114px] p-[32px_52px_8px_20px] flex-col justify-between items-center flex-shrink-0 self-stretch rounded-[24px] drop-shadow-shadow-product transition-all duration-500 ease-in-out opacity-0 group-hover:opacity-100">

            <!-- object Container -->
            <div class="icon-container absolute flex right-0 top-0">
                <object data="<?= asset_url("/src/assets/svg/large-product-conatiner.svg") ?>"
                    type="image/svg+xml"></object>
            </div>

            <h4 class="self-stretch text-black font-quicksand text-body-medium z-10">
                <?= htmlspecialchars($product['name']) ?></h4>
            <div class="flex items-center gap-3 self-stretch z-10">
                <p class="text-black font-poppins text-label-small">Rp <?= number_format($product['price'], 0, ',', '.') ?></p>

            </div>
        </div>
    </div>

    <!-- Child Container 2 -->
    <figure
        class="col-span-2 col-start-5 row-span-2 inline-flex items-center justify-center rounded-[24px] bg-white">
        <img class="w-full h-full object-cover rounded-[16px] border border-Third"
            src=" <?= asset_url("/public/uploads/products/673e6da718f82_81c4ca9f587d60c2f13c8a7f05d7d892.jpg") ?>"
            alt="img-product">
    </figure>

    <!-- Child Container 3 -->
    <figure
        class="col-span-2 col-start-5 row-span-2 row-start-3 inline-flex items-center justify-center rounded-[24px] bg-white ">
        <img class="w-full h-full object-cover rounded-[16px] border border-Third"
            src="<?= asset_url("/public/Outfit/img-new-brand.png") ?> " alt=" img-product">
    </figure>

    <!-- Child Container 4 -->
    <figure
        class="col-span-2 col-start-5 row-span-2 row-start-5 inline-flex items-center justify-center rounded-[24px] bg-white ">
        <img class="w-full h-full object-cover rounded-[16px] border border-Third"
            src=" <?= asset_url("/public/Outfit/outfit-3.jpg") ?>" alt=" img-product">
    </figure>
</div>
<!-- END CONTAINER 1 -->