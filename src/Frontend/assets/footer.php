<div class="col-span-12 flex flex-col items-center justify-end flex-shrink-0 pt-[88px] px-10">
    <section class="flex flex-col rounded-[48px_48px_0px_0px] bg-Primary w-full ">
        <div
            class="flex p-[48px_88px] flex-col justify-center items-center gap-6 self-stretch border-b-4 border-Primary-Colors-3 max-w-[1120]">
            <!-- LOGO and Social Media -->
            <div class="flex justify-between items-center self-stretch">
                <div class="flex items-center gap-[31px] flex-1">
                    <div class="flex">
                        <img src="<?= asset_url("/src/assets/tshirt-Logo.png") ?> " alt="brandU-logo" class="w-[48px] h-[48px] mt-2" />
                        <h1 class="px-2 text-Third text-center font-playfair text-logo-medium">
                            Brand<span class="text-Secondary">U</span>
                        </h1>
                    </div>
                </div>
                <div class="flex items-center gap-[47px] self-stretch">
                    <div
                        class="flex p-2 items-center rounded-full bg-Secondary shadow-[0_4px_8px_rgba(0,0,0,0.2)] cursor-pointer transition-all duration-300 hover:bg-[#c0392b] hover:shadow-custom hover:scale-105 active:scale-95 active:shadow-[0_4px_8px_rgba(0,0,0,0.2)]">
                        <object class="w-[30px] h-[30px] cursor-pointer" data="<?= asset_url("/src/assets/icon/wahtsapp.svg") ?> "
                            type="image/svg+xml"></object>
                    </div>
                    <div
                        class="flex p-2 items-center  rounded-full bg-Secondary shadow-[0_4px_8px_rgba(0,0,0,0.2)] cursor-pointer transition-all duration-300 hover:bg-[#c0392b] hover:shadow-custom hover:scale-105 active:scale-95 active:shadow-[0_4px_8px_rgba(0,0,0,0.2)]">
                        <object class="w-[30px] h-[30px] cursor-pointer" data="<?= asset_url("/src/assets/icon/facebook.svg") ?> "
                            type="image/svg+xml"></object>
                    </div>
                    <div
                        class="flex p-2 items-center  rounded-full bg-Secondary shadow-[0_4px_8px_rgba(0,0,0,0.2)] cursor-pointer transition-all duration-300 hover:bg-[#c0392b] hover:shadow-custom hover:scale-105 active:scale-95 active:shadow-[0_4px_8px_rgba(0,0,0,0.2)]">
                        <object class="w-[30px] h-[30px] cursor-pointer" data="<?= asset_url("/src/assets/icon/instagram.svg") ?> "
                            type="image/svg+xml"></object>
                    </div>
                </div>
            </div>

            <!-- Contact Us -->
            <div class="flex justify-between items-center self-stretch">
                <div class="flex flex-col justify-between items-start flex-1 self-stretch">
                    <div
                        class="flex w-[180px] h-[25px] px-[10px] py-2 justify-center items-center gap-[10px] 
                            rounded-[16px] bg-[#e74c3c] cursor-pointer 
                            transition duration-300 ease-in-out hover:bg-[#d62c1a] hover:scale-105 active:scale-95 active:shadow-[0_4px_8px_rgba(0,0,0,0.2)]">
                        <p class="color-third text-center font-quicksand text-label-medium">Contact Us</p>
                    </div>
                    <span class="self-stretch font-quicksand text-body-medium text-white">Email Text Email Text
                        Email Text
                        Email Text</span>
                    <span class="self-stretch font-quicksand text-body-medium text-white">Phone Text Phone Text
                        Phone
                        Text</span>
                    <span class="self-stretch font-quicksand text-body-medium text-white">
                        Addres Text Addres Text Addres Text Addres TextAddres Text</span>
                </div>
                <div class="relative email-box flex py-4 pl-10 pr-2 flex-col items-start gap-[10px]">
                    <div
                        class="flex h-[136px] flex-col justify-center p-[0px_16px] items-center rounded-[32px] bg-Primary-Colors-2">
                        <form class="flex items-center gap-2">
                            <input
                                class="flex w-[253px] h-[44px] p-[12px_14px] rounded-lg border-2 border-Primary-Colors-1 bg-Primary-Colors-2 text-Lofi-Layer-2 placeholder:text-Lofi-Layer-4 text-start font-quicksand text-label-medium"
                                aria-label="email" type="email" name="email" placeholder="example@gmail.com">
                            <button type="submit" class="flex p-[10px_40px] justify-center items-center self-stretch rounded-lg bg-Secondary cursor-pointer 
                                    transition duration-300 ease-in-out hover:bg-[#d62c1a] hover:scale-105">
                                <label class="text-Third text-center font-quicksand text-label-small "
                                    for="subscryption"> Submit </label></button>
                        </form>
                    </div>s
                    <div class="icon-container absolute flex left-0 bottom-0">
                        <object data="<?= asset_url("/src/assets/svg/light-x.svg") ?>" type="image/svg+xml"></object>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom -->
        <div class="footer-bottom flex p-[24px_48px] justify-between items-center self-stretch]">
            <span class="text-Third text-center font-quicksand text-label-small">Footer Text Footer Text Footer Text
                Footer Text</span>
            <span class="text-Third text-center font-quicksand text-label-small">Privacy Policy</span>
        </div>


    </section>
</div>