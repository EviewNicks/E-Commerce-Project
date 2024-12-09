<?php
// Contoh data hasil query untuk ulasan (gunakan data dari database)
$reviews = [
    [
        "username" => "Ardiansyah",
        "profile_image" => "/public/profile/profile-1.jpg",
        "comment" => "Sangat membantu saya dalam memilih produk.",
        "rating" => 5,
        "created_at" => "2 hari yang lalu",
    ],
    [
        "username" => "Dewi Anggraeni",
        "profile_image" => "/public/profile/profile-2.jpg",
        "comment" => "Rekomendasi produknya sangat tepat!",
        "rating" => 4,
        "created_at" => "3 hari yang lalu",
    ],
    [
        "username" => "Rizky Setiawan",
        "profile_image" => "/public/profile/profile-3.jpg",
        "comment" => "Tampilan antarmuka mudah digunakan.",
        "rating" => 3,
        "created_at" => "1 minggu yang lalu",
    ],
    [
        "username" => "Anisa Rahma",
        "profile_image" => "/public/profile/profile-4.jpg",
        "comment" => "Pengalaman belanja yang menyenangkan!",
        "rating" => 5,
        "created_at" => "5 hari yang lalu",
    ],
    [
        "username" => "Bayu Pratama",
        "profile_image" => "/public/profile/profile-5.jpg",
        "comment" => "Sangat memuaskan, akan kembali lagi.",
        "rating" => 4,
        "created_at" => "2 minggu yang lalu",
    ],
    [
        "username" => "Bayu Pratama",
        "profile_image" => "/public/profile/profile-5.jpg",
        "comment" => "Sangat memuaskan, akan kembali lagi.",
        "rating" => 4,
        "created_at" => "2 minggu yang lalu",
    ],
];

function renderStars($rating)
{
    $stars = '';
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $rating) {
            $stars .= '<object data="/src/assets/icon/star-gold.svg" type="image/svg+xml" class="w-6 h-6"></object>';
        } else {
            $stars .= '<object data="/src/assets/icon/star.svg" type="image/svg+xml" class="w-6 h-6"></object>';
        }
    }
    return $stars;
}
?>

<!-- Container 3 -->
<section
    class="flex flex-col justify-center items-start col-span-6 row-start-7 row-span-2 px-6 gap-2 rounded-2xl bg-White-Colors-2 shadow-custom">
    <!-- Judul -->
    <header class="w-full">
        <h2 class="text-base font-normal leading-6 text-gray-900">Bagaimana Menurutmu??</h2>
    </header>

    <!-- Rating Container -->
    <div class="flex items-center gap-2 w-full">
        <!-- Star Container -->
        <div class="flex items-center gap-2">
            <!-- Placeholder SVG untuk Bintang -->
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                <path
                    d="M12.2042 7.21067C13.8935 4.18134 14.7375 2.66667 16.0002 2.66667C17.2628 2.66667 18.1068 4.18134 19.7962 7.21067L20.2335 7.99467C20.7135 8.85601 20.9535 9.28667 21.3268 9.57067C21.7001 9.85467 22.1668 9.96 23.1002 10.1707L23.9482 10.3627C27.2282 11.1053 28.8668 11.476 29.2575 12.7307C29.6468 13.984 28.5295 15.292 26.2935 17.9067L25.7148 18.5827C25.0802 19.3253 24.7615 19.6973 24.6188 20.156C24.4762 20.616 24.5242 21.112 24.6202 22.1027L24.7082 23.0053C25.0455 26.4947 25.2148 28.2387 24.1935 29.0133C23.1722 29.788 21.6362 29.0813 18.5668 27.668L17.7708 27.3027C16.8988 26.9 16.4628 26.7 16.0002 26.7C15.5375 26.7 15.1015 26.9 14.2295 27.3027L13.4348 27.668C10.3642 29.0813 8.82815 29.788 7.80815 29.0147C6.78548 28.2387 6.95482 26.4947 7.29215 23.0053L7.38015 22.104C7.47615 21.112 7.52415 20.616 7.38015 20.1573C7.23882 19.6973 6.92015 19.3253 6.28548 18.584L5.70682 17.9067C3.47082 15.2933 2.35348 13.9853 2.74282 12.7307C3.13215 11.476 4.77348 11.104 8.05348 10.3627L8.90148 10.1707C9.83348 9.96 10.2988 9.85467 10.6735 9.57067C11.0482 9.28667 11.2868 8.85601 11.7668 7.99467L12.2042 7.21067Z"
                    fill="#1E1E1E" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                <path
                    d="M12.2042 7.21067C13.8935 4.18134 14.7375 2.66667 16.0002 2.66667C17.2628 2.66667 18.1068 4.18134 19.7962 7.21067L20.2335 7.99467C20.7135 8.85601 20.9535 9.28667 21.3268 9.57067C21.7001 9.85467 22.1668 9.96 23.1002 10.1707L23.9482 10.3627C27.2282 11.1053 28.8668 11.476 29.2575 12.7307C29.6468 13.984 28.5295 15.292 26.2935 17.9067L25.7148 18.5827C25.0802 19.3253 24.7615 19.6973 24.6188 20.156C24.4762 20.616 24.5242 21.112 24.6202 22.1027L24.7082 23.0053C25.0455 26.4947 25.2148 28.2387 24.1935 29.0133C23.1722 29.788 21.6362 29.0813 18.5668 27.668L17.7708 27.3027C16.8988 26.9 16.4628 26.7 16.0002 26.7C15.5375 26.7 15.1015 26.9 14.2295 27.3027L13.4348 27.668C10.3642 29.0813 8.82815 29.788 7.80815 29.0147C6.78548 28.2387 6.95482 26.4947 7.29215 23.0053L7.38015 22.104C7.47615 21.112 7.52415 20.616 7.38015 20.1573C7.23882 19.6973 6.92015 19.3253 6.28548 18.584L5.70682 17.9067C3.47082 15.2933 2.35348 13.9853 2.74282 12.7307C3.13215 11.476 4.77348 11.104 8.05348 10.3627L8.90148 10.1707C9.83348 9.96 10.2988 9.85467 10.6735 9.57067C11.0482 9.28667 11.2868 8.85601 11.7668 7.99467L12.2042 7.21067Z"
                    fill="#1E1E1E" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                <path
                    d="M12.2042 7.21067C13.8935 4.18134 14.7375 2.66667 16.0002 2.66667C17.2628 2.66667 18.1068 4.18134 19.7962 7.21067L20.2335 7.99467C20.7135 8.85601 20.9535 9.28667 21.3268 9.57067C21.7001 9.85467 22.1668 9.96 23.1002 10.1707L23.9482 10.3627C27.2282 11.1053 28.8668 11.476 29.2575 12.7307C29.6468 13.984 28.5295 15.292 26.2935 17.9067L25.7148 18.5827C25.0802 19.3253 24.7615 19.6973 24.6188 20.156C24.4762 20.616 24.5242 21.112 24.6202 22.1027L24.7082 23.0053C25.0455 26.4947 25.2148 28.2387 24.1935 29.0133C23.1722 29.788 21.6362 29.0813 18.5668 27.668L17.7708 27.3027C16.8988 26.9 16.4628 26.7 16.0002 26.7C15.5375 26.7 15.1015 26.9 14.2295 27.3027L13.4348 27.668C10.3642 29.0813 8.82815 29.788 7.80815 29.0147C6.78548 28.2387 6.95482 26.4947 7.29215 23.0053L7.38015 22.104C7.47615 21.112 7.52415 20.616 7.38015 20.1573C7.23882 19.6973 6.92015 19.3253 6.28548 18.584L5.70682 17.9067C3.47082 15.2933 2.35348 13.9853 2.74282 12.7307C3.13215 11.476 4.77348 11.104 8.05348 10.3627L8.90148 10.1707C9.83348 9.96 10.2988 9.85467 10.6735 9.57067C11.0482 9.28667 11.2868 8.85601 11.7668 7.99467L12.2042 7.21067Z"
                    fill="#1E1E1E" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                <path
                    d="M12.2042 7.21067C13.8935 4.18134 14.7375 2.66667 16.0002 2.66667C17.2628 2.66667 18.1068 4.18134 19.7962 7.21067L20.2335 7.99467C20.7135 8.85601 20.9535 9.28667 21.3268 9.57067C21.7001 9.85467 22.1668 9.96 23.1002 10.1707L23.9482 10.3627C27.2282 11.1053 28.8668 11.476 29.2575 12.7307C29.6468 13.984 28.5295 15.292 26.2935 17.9067L25.7148 18.5827C25.0802 19.3253 24.7615 19.6973 24.6188 20.156C24.4762 20.616 24.5242 21.112 24.6202 22.1027L24.7082 23.0053C25.0455 26.4947 25.2148 28.2387 24.1935 29.0133C23.1722 29.788 21.6362 29.0813 18.5668 27.668L17.7708 27.3027C16.8988 26.9 16.4628 26.7 16.0002 26.7C15.5375 26.7 15.1015 26.9 14.2295 27.3027L13.4348 27.668C10.3642 29.0813 8.82815 29.788 7.80815 29.0147C6.78548 28.2387 6.95482 26.4947 7.29215 23.0053L7.38015 22.104C7.47615 21.112 7.52415 20.616 7.38015 20.1573C7.23882 19.6973 6.92015 19.3253 6.28548 18.584L5.70682 17.9067C3.47082 15.2933 2.35348 13.9853 2.74282 12.7307C3.13215 11.476 4.77348 11.104 8.05348 10.3627L8.90148 10.1707C9.83348 9.96 10.2988 9.85467 10.6735 9.57067C11.0482 9.28667 11.2868 8.85601 11.7668 7.99467L12.2042 7.21067Z"
                    fill="#1E1E1E" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                <path
                    d="M12.2042 7.21067C13.8935 4.18134 14.7375 2.66667 16.0002 2.66667C17.2628 2.66667 18.1068 4.18134 19.7962 7.21067L20.2335 7.99467C20.7135 8.85601 20.9535 9.28667 21.3268 9.57067C21.7001 9.85467 22.1668 9.96 23.1002 10.1707L23.9482 10.3627C27.2282 11.1053 28.8668 11.476 29.2575 12.7307C29.6468 13.984 28.5295 15.292 26.2935 17.9067L25.7148 18.5827C25.0802 19.3253 24.7615 19.6973 24.6188 20.156C24.4762 20.616 24.5242 21.112 24.6202 22.1027L24.7082 23.0053C25.0455 26.4947 25.2148 28.2387 24.1935 29.0133C23.1722 29.788 21.6362 29.0813 18.5668 27.668L17.7708 27.3027C16.8988 26.9 16.4628 26.7 16.0002 26.7C15.5375 26.7 15.1015 26.9 14.2295 27.3027L13.4348 27.668C10.3642 29.0813 8.82815 29.788 7.80815 29.0147C6.78548 28.2387 6.95482 26.4947 7.29215 23.0053L7.38015 22.104C7.47615 21.112 7.52415 20.616 7.38015 20.1573C7.23882 19.6973 6.92015 19.3253 6.28548 18.584L5.70682 17.9067C3.47082 15.2933 2.35348 13.9853 2.74282 12.7307C3.13215 11.476 4.77348 11.104 8.05348 10.3627L8.90148 10.1707C9.83348 9.96 10.2988 9.85467 10.6735 9.57067C11.0482 9.28667 11.2868 8.85601 11.7668 7.99467L12.2042 7.21067Z"
                    fill="#1E1E1E" />
            </svg>
            <!-- Salin ikon di atas sesuai kebutuhan -->
        </div>
        <span class="text-sm font-semibold text-gray-900">Beri Rating!!</span>
    </div>

    <!-- Ulasan Container -->
    <div class="flex flex-col gap-2">
        <div class="w-full">
            <label class="block text-sm font-semibold text-gray-900">
                Ulasan Anda Membantu Banyak Orang
            </label>
        </div>

        <!-- Input Container -->
        <form class="flex items-center gap-2 w-full">
            <!-- Input Field -->
            <div class="flex flex-col w-[453px] gap-2">
                <div class="flex h-10 items-center rounded-md border border-gray-400 bg-white">
                    <input type="text" placeholder="Placeholder"
                        class="w-full h-full px-4 py-1 text-xs font-medium text-gray-800 bg-white border-none focus:outline-none rounded-md" />
                </div>
            </div>
            <!-- Submit Button -->
            <button type="submit" class="p-2 rounded-full bg-red-500">
                <!-- Placeholder SVG -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                    fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M3.40221 6.67301C3.14221 4.33901 5.54521 2.62501 7.66821 3.63101L19.6122 9.28901C21.9002 10.372 21.9002 13.628 19.6122 14.711L7.66821 20.37C5.54521 21.376 3.14321 19.662 3.40221 17.328L3.88221 13H12.0002C12.2654 13 12.5198 12.8946 12.7073 12.7071C12.8949 12.5196 13.0002 12.2652 13.0002 12C13.0002 11.7348 12.8949 11.4804 12.7073 11.2929C12.5198 11.1054 12.2654 11 12.0002 11H3.88321L3.40221 6.67301Z"
                        fill="#1E1E1E" />
                </svg>
                <label for="comment" class="sr-only">submit comment</label>
            </button>
        </form>
    </div>
</section>

<!-- Container 4 -->
<div
    class="col-span-6 row-start-9 row-span-1 flex p-[12px_24px] flex-col items-start gap-2 bg rounded-[32px]">

    <div class="flex py-2 justify-between items-center self-stretch">
        <section class="flex flex-col items-center gap-3 flex-1 self-stretch ">
            <span class="self-stretch text-black font-quicksand text-title-small">Ulasan Pilihan</span>
            <span class="self-stretch text-black font-quicksand text-body-medium">Menampilkan 10 dari
                237 ulasan</span>
        </section>

        <div class="flex items-center gap-[22px]">
            <span class="text-black font-quicksand text-label-medium">Urutkan</span>
            <div
                class="flex w-[198px] px-[16px] py-[8px] justify-between items-center rounded-[8px] bg-White-Colors-3">
                <span
                    class="text-black font-quick font-bold text-[16px] leading-[20px] tracking-[0.1px]">Terbaru</span>
                <div class="w-[20px] h-[20px]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                        fill="none">
                        <path
                            d="M4.51581 7.548C4.95181 7.102 5.55881 7.067 6.09181 7.548L9.99981 11.295L13.9078 7.548C14.4408 7.067 15.0488 7.102 15.4818 7.548C15.9178 7.993 15.8898 8.745 15.4818 9.163C15.0758 9.581 10.7868 13.665 10.7868 13.665C10.6847 13.7709 10.5623 13.855 10.4269 13.9125C10.2915 13.97 10.1459 13.9997 9.99881 13.9997C9.85171 13.9997 9.70613 13.97 9.57074 13.9125C9.43535 13.855 9.31294 13.7709 9.21081 13.665C9.21081 13.665 4.92381 9.581 4.51581 9.163C4.10781 8.745 4.07981 7.993 4.51581 7.548Z"
                            fill="black" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ulasan -->
<?php
$row_start = 10; // Nilai awal row-start
foreach ($reviews as $review): ?>

    <div
        class="flex col-span-6 col-start-1 row-start-<?= $row_start; ?> row-span-2 p-[8px_24px] flex-col justify-between items-start rounded-[24px] border border-White-Colors-3 bg-grad-glass">
        <div class="flex px-3 justify-between items-center self-stretch">
            <object data=" <?= asset_url("/src/assets/icon/titik-koma.svg") ?>" type="image/svg+xml" class="w-6 h-6"></object>
            <div class="flex justify-center items-center gap-3">
                <div class="flex items-center gap-2">
                    <?= renderStars($review['rating']); ?>
                </div>
                <span class="text-black text-center font-quicksand text-body-medium"><?= htmlspecialchars($review['created_at']); ?></span>
            </div>
        </div>
        <div class="flex p-2 items-start flex-1 self-stretch">
            <p class="flex-1 text-black font-quicksand text-body-medium"> <?= htmlspecialchars($review['comment']); ?></p>
        </div>
        <div class="flex items-center gap-2 self-stretch">
            <img src=" <?= htmlspecialchars(asset_url($review['profile_image'])); ?>" alt="user-profile"
                class="flex size-9 items-center rounded-full bg-Primary-Layer-2">
            <span class="text-black text-center font-quicksand text-label-small"> <?= htmlspecialchars($review['username']); ?></span>
        </div>
    </div>
    <?php $row_start += 2;
    ?>
<?php endforeach; ?>