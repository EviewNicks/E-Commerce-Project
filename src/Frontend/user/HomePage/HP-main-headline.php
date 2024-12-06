<!-- Headline 1 Brand U -->
<div class="col-span-12 flex flex-col items-center justify-center px-20 pt-3">
    <div
        class=" flex h-[64px] min-h-[64px] px-[10px] flex-col justify-between w-full max-w-screen-xl items-center gap-[10px] self-stretch rounded-t-[80px] bg-Primary-Colors-4 mx-auto">

    </div>

    <div
        class="flex-1 self-center max-w-screen-xl rounded-b-[80px] bg-Primary grid grid-cols-12 grid-rows-[repeat(8,_80px)] gap-2">
        <!-- Container 1 -->
        <div class=" relative col-span-4 row-span-3 flex flex-col items-start pl-2 rounded-[24px]">
            <div class=" relative flex flex-col items-center gap-4 px-6 pb-6  self-stretch">
                <div class="absolute w-full h-auto max-w-[360px] max-h-[265px]">
                    <object data="<?= asset_url("/src/assets/svg/container-headline.svg") ?>" type="image/svg+xml"
                        class="w-full h-auto">
                    </object>
                </div>
                <div class="icon-container absolute flex mb-10 left-0 bottom-0">
                    <!-- style svg -->
                    <object data="<?= asset_url("/src/assets/svg/Ligth.svg") ?> " type="image/svg+xml"></object>
                </div>
                <!-- Tanggal -->
                <div class="date-container flex justify-end items-start gap-2 w-full">
                    <p class="w-[131px] text-Third font-poppins font-bold text-label-large tracking-[0.3px]">
                        14 / 11 / 2024
                    </p>
                </div>
                <!-- Konten -->
                <div class="content-container flex flex-col justify-between items-end flex-1 w-full z-10">
                    <h2 class="w-full text-Third font-playfair text-logo-large font-bold">
                        BrandU
                    </h2>
                    <div class="description-container flex w-[252px] p-2 justify-center items-center z-10">
                        <p class="text-white font-quicksand font-medium text-body-medium">
                            BrandU berfokus pada fashion yang relevan dengan anak muda,
                            khususnya mahasiswa yang mencari produk terkini dan trendi.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Container 2 -->
        <div
            class="col-span-4 row-span-3 row-start-4 flex flex-row items-start px-3 py-2 justify-center gap-2 flex-shrink-0 ">
            <div class="flex-1 self-stretch rounded-[48px] border-image-headline overflow-hidden">
                <img class="w-full h-full object-cover" src="<?= asset_url("/public/Outfit/outfit-11.jpg") ?>" alt="image-outfit">
            </div>
            <div class="flex-1 self-stretch rounded-[48px] border-image-headline overflow-hidden">
                <img class="w-full h-full object-cover" src="<?= asset_url("/public/Outfit/outfit-11.jpg") ?>" alt="image-outfit">
            </div>
        </div>


        <!-- Container 3 photo BrandU di Tengah-->
        <div
            class="col-span-5 col-start-5 row-span-6 flex flex-col px-3 py-2 justify-end items-start flex-shrink-0 rounded-[48px] bg-cover bg-center"
            style="background-image: url('<?= asset_url("/public/Outfit/Headline-Photos.png") ?>');">


            <div
                class="flex flex-col w-[296px] h-[176px] p-[30px_60px_16px_24px] items-start gap-2 flex-shrink-0 relative rounded-[48px]">
                <div class="icon-container absolute flex left-0 top-0">
                    <object data="<?= asset_url("/src/assets/svg/BrandU-Headline.svg") ?> " type="image/svg+xml"></object>
                </div>
                <div class="icon-container absolute flex right-0 bottom-0">
                    <object data="<?= asset_url("/src/assets/svg/ligth-B.svg") ?>" type="image/svg+xml"></object>
                </div>
                <!-- Header -->
                <div class="flex flex-col justify-between items-center flex-[1_0_0] w-full z-10">
                    <h2 class="w-full text-[#ecf0f1] font-playfair text-[52px] leading-[68px] font-normal">
                        BrandU
                    </h2>
                    <div class="flex items-center w-full">
                        <p class="text-[#ffe31a] font-poppins text-[20px] leading-[32px] font-semibold">
                            This For You
                        </p>
                    </div>
                </div>

                <!-- Footer -->
                <div class="flex items-center gap-2 w-full z-10">
                    <!-- Fashion Container -->
                    <div
                        class="flex justify-center items-center px-2 py-0 gap-2 flex-[1_0_0] rounded-[48px] border border-[#e74c3c] text-[#e74c3c] transition-all duration-300 bg-transparent hover:bg-[#e74c3c] hover:text-white hover:shadow-[0_6px_12px_rgba(231,76,60,0.4)] hover:-translate-y-0.5 active:translate-y-0 active:shadow-[0_3px_6px_rgba(231,76,60,0.2)] cursor-pointer">
                        <span class="text-Third text-body-medium font-poppins ">Fashion</span>
                    </div>
                    <!-- Outfit Container -->
                    <div
                        class="flex justify-center items-center px-5 py-0 gap-2 flex-[1_0_0] rounded-[48px] border border-[#e74c3c] text-[#e74c3c] transition-all duration-300 bg-transparent hover:bg-[#e74c3c] hover:text-white hover:shadow-[0_6px_12px_rgba(231,76,60,0.4)] hover:-translate-y-0.5 active:translate-y-0 active:shadow-[0_3px_6px_rgba(231,76,60,0.2)] cursor-pointer">
                        <span class="text-Third text-body-medium font-poppins">Outfit</span>
                    </div>
                </div>

                <!-- Send Email Button -->
                <div
                    class="absolute right-[15px] top-[20px] flex items-center gap-2 p-4 rounded-full bg-[#e74c3c] shadow-[0_4px_8px_rgba(0,0,0,0.2)] cursor-pointer transition-all duration-300 hover:bg-[#c0392b] hover:shadow-custom hover:scale-105 active:scale-95 active:shadow-[0_4px_8px_rgba(0,0,0,0.2)]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 30 30" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M25.3371 0.20979C25.9584 -0.0164708 26.6315 -0.0607846 27.2772 0.0820568C27.9228 0.224898 28.5143 0.548959 28.982 1.01615C29.4497 1.48335 29.7743 2.07426 29.9175 2.71944C30.0608 3.36462 30.0168 4.03725 29.7906 4.6583L22.1272 27.6122C21.9408 28.1763 21.6126 28.6831 21.1741 29.0842C20.7356 29.4852 20.2015 29.7672 19.6228 29.9029C19.0454 30.0432 18.4415 30.0313 17.8702 29.8682C17.2989 29.7052 16.7797 29.3967 16.3635 28.9729L12.2509 24.8823L7.93248 27.1151C7.76694 27.2009 7.58187 27.242 7.39555 27.2345C7.20924 27.227 7.02811 27.171 6.87005 27.0721C6.712 26.9732 6.58248 26.8349 6.4943 26.6707C6.40611 26.5065 6.3623 26.3221 6.3672 26.1358L6.54517 19.3131L21.6512 8.34824C21.7937 8.24483 21.9144 8.11438 22.0064 7.96435C22.0984 7.81431 22.16 7.64764 22.1876 7.47383C22.2152 7.30002 22.2082 7.12248 22.1671 6.95136C22.1261 6.78023 22.0516 6.61887 21.9482 6.47648C21.8447 6.33409 21.7142 6.21347 21.564 6.12149C21.4139 6.02952 21.2471 5.968 21.0732 5.94044C20.8993 5.91288 20.7216 5.91982 20.5504 5.96088C20.3791 6.00193 20.2177 6.07629 20.0752 6.1797L4.71401 17.331L1.00451 13.6239C0.604724 13.2242 0.309983 12.7321 0.146505 12.1911C-0.0169731 11.6501 -0.0441185 11.0772 0.0674837 10.5232C0.179695 9.91756 0.451134 9.35266 0.853947 8.88647C1.25676 8.42028 1.77644 8.06959 2.35965 7.87039H2.36609L25.335 0.207647L25.3371 0.20979Z"
                            fill="#ECF0F1" />
                    </svg>
                </div>
            </div>

        </div>
        <!-- Container 4 -->
        <div
            class="col-span-3 col-start-10 row-span-3 inline-flex py-2 px-4 flex-col justify-between items-center flex-shrink-0">
            <div class="flex items-center gap-5 self-stretch">
                <h2 class="text-white font-poppins text-headline-large">Best Value</h2>
                <h3
                    class="text-Secondary text-headline-large font-poppins flex flex-col justify-center flex-1 self-stretch ">
                    #1
                </h3>
            </div>
            <div class="flex flex-col items-start self-stretch">
                <span class="self-stretch text-white font-quicksand text-title-medium">Trendy, Fresh, & You </span>
                <span class="self-stretch text-white font-quicksand text-title-medium">BrandU untuk Gaya
                    Kuliahanmu!</span>
            </div>
        </div>

        <!-- Container 5 New Brand-->
        <div
            class="relative col-span-3 col-start-10 row-span-3 row-start-4 flex pr-2 pb-6 flex-col items-center flex-shrink-0 ">
            <img class="flex-1 rounded-[48px] bg-no-repeat bg-grey-2 w-full h-full"
                src="<?= asset_url('/public/Outfit/img-new-brand.png') ?>" alt="new Brand">
            <div class="flex pl-8 items-center absolute bottom-0">
                <button type="button"
                    class="flex p-3 items-center rounded-2xl bg-Secondary transition-all duration-300 hover:shadow-md hover:-translate-y-1 active:translate-y-0 active:shadow-sm">
                    <span class="text-Third text-label-small font-quicksand">New brand</span>
                </button>
            </div>

        </div>
        <!-- Container 6 -->
        <div
            class="col-span-12 row-span-2 row-start-7 pb-2 flex flex-col gap-[10px] justify-center items-center flex-shrink-0">
            <aside
                class="flex py-2 px-12 justify-between items-center flex-[1_0_0] gap-8 rounded-[48px] bg-Primary-Colors-3 ">
                <div
                    class="flex px-3.5 py-5 justify-center items-center gap-2.5 rounded-[48px] border-2 border-Primary-Layer-5 bg-grad-glass">
                    <p class="text-Third text-headline-small">Category</p>
                </div>
                <div
                    class=" relative flex w-[208px]  px-4 pb-[55px] pt-4 flex-col justify-center items-start gap-4 self-stretch rounded-3xl ">
                    <div class="icon-container absolute flex left-0 top-0">
                        <object data="<?= asset_url("/src/assets/svg/category.svg") ?>" type="image/svg+xml"></object>
                    </div>

                    <div
                        class="click-di-sini-container absolute flex pr-[2px] pl-2 py-2 flex-col items-start gap-[10px] right-0 bottom-0">
                        <button type="button"
                            class="btn flex py-[2px] pr-[2px] pl-6 justify-center gap-6 self-stretch rounded-3xl bg-Primary-Colors-1 cursor-pointer transition-all duration-300 ease-linear hover:bg-gradient-to-br hover:from-[#35526f] hover:to-[#2e4860] hover:border-[#e74c3c] hover:text-[#e74c3c] hover:-translate-y-0.5 hover:shadow-lg active:bg-[#2e4860] active:translate-y-0 active:shadow-md">
                            <p
                                class="text-Third flex flex-col justify-center self-stretch text-label-small font-quicksand">
                                Click Di sini</p>
                            <div class="flex p-2 items-center rounded-3xl bg-Secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="29" height="28" viewBox="0 0 29 28"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M23.7603 0.195804C24.3402 -0.0153727 24.9684 -0.0567323 25.571 0.0765863C26.1736 0.209905 26.7256 0.512362 27.1622 0.948409C27.5987 1.38446 27.9016 1.93597 28.0353 2.53814C28.169 3.14031 28.1279 3.7681 27.9169 4.34774L20.7644 25.7714C20.5903 26.2979 20.2841 26.7709 19.8748 27.1452C19.4655 27.5196 18.967 27.7827 18.4269 27.9094C17.888 28.0403 17.3244 28.0292 16.7912 27.877C16.2579 27.7249 15.7734 27.4369 15.3849 27.0414L11.5465 23.2235L7.51595 25.3074C7.36145 25.3875 7.18872 25.4259 7.01482 25.4189C6.84092 25.4118 6.67187 25.3596 6.52435 25.2673C6.37683 25.175 6.25595 25.0459 6.17365 24.8926C6.09134 24.7394 6.05045 24.5673 6.05502 24.3934L6.22113 18.0255L20.3201 7.79169C20.4531 7.69517 20.5657 7.57342 20.6516 7.43339C20.7375 7.29336 20.795 7.13779 20.8207 6.97557C20.8465 6.81335 20.84 6.64765 20.8016 6.48793C20.7633 6.32822 20.6938 6.17761 20.5973 6.04472C20.5007 5.91182 20.3788 5.79924 20.2387 5.71339C20.0986 5.62755 19.9429 5.57013 19.7806 5.54441C19.6183 5.51869 19.4525 5.52517 19.2927 5.56349C19.1328 5.6018 18.9821 5.6712 18.8491 5.76772L4.51204 16.1756L1.04984 12.7156C0.676714 12.3426 0.401622 11.8832 0.249043 11.3784C0.0964631 10.8735 0.0711274 10.3387 0.175289 9.82166C0.28002 9.25639 0.533363 8.72915 0.909321 8.29404C1.28528 7.85893 1.77031 7.53162 2.31465 7.3457H2.32065L23.7583 0.193804L23.7603 0.195804Z"
                                        fill="#ECF0F1" />
                                </svg>
                            </div>
                        </button>
                    </div>
                    <h4 class="self-stretch text-Third text-label-large font-quicksand z-10">Recommendation</h4>
                </div>

                <div
                    class=" relative flex w-[208px] px-4 pb-[55px] pt-4 flex-col justify-center items-start gap-4 self-stretch rounded-3xl">
                    <div class="icon-container absolute flex left-0 bottom-0">
                        <!-- style svg -->
                        <object data="<?= asset_url("/src/assets/svg/category.svg") ?>" type="image/svg+xml"></object>
                    </div>
                    <div
                        class="click-di-sini-container absolute flex pr-[2px] pl-2 py-2 flex-col items-start gap-[10px] right-0 bottom-0">
                        <button type="button"
                            class="btn flex py-[2px] pr-[2px] pl-6 justify-center gap-6 self-stretch rounded-3xl bg-Primary-Colors-1 cursor-pointer transition-all duration-300 ease-linear hover:bg-gradient-to-br hover:from-[#35526f] hover:to-[#2e4860] hover:border-[#e74c3c] hover:text-[#e74c3c] hover:-translate-y-0.5 hover:shadow-lg active:bg-[#2e4860] active:translate-y-0 active:shadow-md">
                            <p
                                class="text-Third flex flex-col justify-center self-stretch text-label-small font-quicksand">
                                Click Di sini</p>
                            <div class="flex p-2 items-center rounded-3xl bg-Secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="29" height="28" viewBox="0 0 29 28"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M23.7603 0.195804C24.3402 -0.0153727 24.9684 -0.0567323 25.571 0.0765863C26.1736 0.209905 26.7256 0.512362 27.1622 0.948409C27.5987 1.38446 27.9016 1.93597 28.0353 2.53814C28.169 3.14031 28.1279 3.7681 27.9169 4.34774L20.7644 25.7714C20.5903 26.2979 20.2841 26.7709 19.8748 27.1452C19.4655 27.5196 18.967 27.7827 18.4269 27.9094C17.888 28.0403 17.3244 28.0292 16.7912 27.877C16.2579 27.7249 15.7734 27.4369 15.3849 27.0414L11.5465 23.2235L7.51595 25.3074C7.36145 25.3875 7.18872 25.4259 7.01482 25.4189C6.84092 25.4118 6.67187 25.3596 6.52435 25.2673C6.37683 25.175 6.25595 25.0459 6.17365 24.8926C6.09134 24.7394 6.05045 24.5673 6.05502 24.3934L6.22113 18.0255L20.3201 7.79169C20.4531 7.69517 20.5657 7.57342 20.6516 7.43339C20.7375 7.29336 20.795 7.13779 20.8207 6.97557C20.8465 6.81335 20.84 6.64765 20.8016 6.48793C20.7633 6.32822 20.6938 6.17761 20.5973 6.04472C20.5007 5.91182 20.3788 5.79924 20.2387 5.71339C20.0986 5.62755 19.9429 5.57013 19.7806 5.54441C19.6183 5.51869 19.4525 5.52517 19.2927 5.56349C19.1328 5.6018 18.9821 5.6712 18.8491 5.76772L4.51204 16.1756L1.04984 12.7156C0.676714 12.3426 0.401622 11.8832 0.249043 11.3784C0.0964631 10.8735 0.0711274 10.3387 0.175289 9.82166C0.28002 9.25639 0.533363 8.72915 0.909321 8.29404C1.28528 7.85893 1.77031 7.53162 2.31465 7.3457H2.32065L23.7583 0.193804L23.7603 0.195804Z"
                                        fill="#ECF0F1" />
                                </svg>
                            </div>
                        </button>
                    </div>
                    <h4 class="self-stretch text-Third text-label-large font-quicksand z-10">Recommendation</h4>
                </div>

                <div
                    class="flex w-[126px] px-1 pt-6 pb-1 justify-center items-center self-stretch rounded-[24px] relative">
                    <div class="icon-container absolute flex left-0 bottom-0">
                        <!-- style svg -->
                        <object data="<?= asset_url("/src/assets/svg/mini-category.svg") ?>" type="image/svg+xml"></object>
                    </div>
                    <div class="absolute flex flex-col items-start pr-1 pt-2 pb-0 right-0 top-0 ">
                        <button type="button"
                            class="flex pr-[2px] py-[2px] pl-2 justify-center items-center gap-2 self-stretch border-Primary-Colors-1 bg-Primary-Colors-1 rounded-[24px] cursor-pointer transition-all duration-300 ease-linear hover:bg-gradient-to-br hover:from-[#35526f] hover:to-[#2e4860] hover:border-[#e74c3c] hover:text-[#e74c3c] hover:-translate-y-0.5 hover:shadow-lg active:bg-[#2e4860] active:translate-y-0 active:shadow-md">
                            <p class="text-Third text-center font-poppins text-[12px] font-medium leading-[20px]">
                                Click di sini
                            </p>
                            <div class="flex p-2 items-center rounded-3xl bg-Secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 29 28"
                                    fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M23.7603 0.195804C24.3402 -0.0153727 24.9684 -0.0567323 25.571 0.0765863C26.1736 0.209905 26.7256 0.512362 27.1622 0.948409C27.5987 1.38446 27.9016 1.93597 28.0353 2.53814C28.169 3.14031 28.1279 3.7681 27.9169 4.34774L20.7644 25.7714C20.5903 26.2979 20.2841 26.7709 19.8748 27.1452C19.4655 27.5196 18.967 27.7827 18.4269 27.9094C17.888 28.0403 17.3244 28.0292 16.7912 27.877C16.2579 27.7249 15.7734 27.4369 15.3849 27.0414L11.5465 23.2235L7.51595 25.3074C7.36145 25.3875 7.18872 25.4259 7.01482 25.4189C6.84092 25.4118 6.67187 25.3596 6.52435 25.2673C6.37683 25.175 6.25595 25.0459 6.17365 24.8926C6.09134 24.7394 6.05045 24.5673 6.05502 24.3934L6.22113 18.0255L20.3201 7.79169C20.4531 7.69517 20.5657 7.57342 20.6516 7.43339C20.7375 7.29336 20.795 7.13779 20.8207 6.97557C20.8465 6.81335 20.84 6.64765 20.8016 6.48793C20.7633 6.32822 20.6938 6.17761 20.5973 6.04472C20.5007 5.91182 20.3788 5.79924 20.2387 5.71339C20.0986 5.62755 19.9429 5.57013 19.7806 5.54441C19.6183 5.51869 19.4525 5.52517 19.2927 5.56349C19.1328 5.6018 18.9821 5.6712 18.8491 5.76772L4.51204 16.1756L1.04984 12.7156C0.676714 12.3426 0.401622 11.8832 0.249043 11.3784C0.0964631 10.8735 0.0711274 10.3387 0.175289 9.82166C0.28002 9.25639 0.533363 8.72915 0.909321 8.29404C1.28528 7.85893 1.77031 7.53162 2.31465 7.3457H2.32065L23.7583 0.193804L23.7603 0.195804Z"
                                        fill="#ECF0F1" />
                                </svg>
                            </div>
                        </button>
                    </div>
                    <h4 class="flex-1 text-Third text-center font-poppins text-label-medium z-10">
                        Show All
                    </h4>

                </div>

            </aside>

        </div>
    </div>

</div>

<!-- END Headline 1 -->