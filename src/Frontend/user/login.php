<?php
$base_url = "http://" . $_SERVER['HTTP_HOST'] . "/E-Commerce-Project/public/";

session_start();
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === true) {
    header("Location: ?page=homePageUser");
    exit;
}

?>

<section class="flex flex-1 items-center justify-center gap-8 px-8 py-4 h-screen">
    <div class="flex flex-col items-center justify-center flex-1 h-full max-w-[450px]">
        <!-- Left Side -->
        <div class="flex flex-col items-center justify-between w-full max-w-md gap-4">
            <!-- Login Intro -->
            <div class="flex flex-col items-start w-full gap-4">
                <h2 class="text-logo-small font-medium text-primary">Log In</h2>
                <p class="text-title-small text-secondary">
                    Today is a new day. It's your day. You shape it. Sign in to start
                    managing your projects.
                </p>
            </div>

            <!-- Login Form -->
            <form action="?page=loginAction" method="POST" class="flex flex-col items-end w-full gap-4">
                <!-- Email Field -->
                <div class="flex flex-col w-full gap-2">
                    <label for="email" class="text-label-small font-semibold text-primary">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required
                        class="h-10 w-full rounded-lg border border-grey-1 bg-whiteLayer-1 px-4 transition hover:border-info hover:bg-[#EEF6FD] focus:border-info focus:bg-white focus:outline-none placeholder:text-grey-2 placeholder:text-body-large" />
                </div>

                <!-- Password Field -->
                <div class="flex flex-col w-full gap-2">
                    <label for="password" class="text-label-small font-semibold text-primary">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password"
                        pattern=".{8,}" title="Password must be at least 8 characters long" required
                        class="h-10 w-full rounded-lg border border-grey-1 bg-whiteLayer-1 px-4 transition hover:border-info hover:bg-[#EEF6FD] focus:border-info focus:bg-white focus:outline-none placeholder:text-grey-2 placeholder:text-body-large" />
                </div>

                <span class="text-label-medium font-bold text-Info cursor-pointer hover:text-Info hover:underline">
                    Forgot Password?
                </span>

                <button type="submit"
                    class="flex items-center justify-center w-full h-12 rounded-lg bg-Primary transition hover:bg-Primary-Colors-3 hover:scale-105 active:scale-95">
                    <span class="text-label-medium font-bold text-white">Sign in</span>
                </button>
            </form>

            <!-- Social Sign-In -->
            <div class="flex flex-col items-center w-full gap-6">
                <!-- Or Divider -->
                <div class="flex items-center w-full justify-between">
                    <div><svg width="170" height="1" viewBox="0 0 170 1" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect width="170" height="1" fill="#759CBB" />
                        </svg></div>
                    <p class="text-label-medium text-grey-2">Or</p>
                    <div><svg width="170" height="1" viewBox="0 0 170 1" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect width="170" height="1" fill="#759CBB" />
                        </svg></div>
                </div>

                <!-- Social Buttons -->
                <div class="flex flex-col items-center w-full gap-4">
                    <button type="button"
                        class="flex items-center justify-center w-full h-12 gap-4 rounded-lg bg-Primary-Layer-1` hover:bg-Primary-Layer-2">
                        <!-- SVG Placeholder -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 29 29"
                            fill="none">
                            <g clip-path="url(#clip0_286_20)">
                                <path
                                    d="M28.2268 14.8225C28.2268 13.8708 28.1496 12.914 27.985 11.9777H14.7798V17.3689H22.3418C22.028 19.1076 21.0197 20.6457 19.5433 21.6231V25.1212H24.0548C26.7041 22.6828 28.2268 19.0819 28.2268 14.8225Z"
                                    fill="#4285F4" />
                                <path
                                    d="M14.7798 28.5009C18.5557 28.5009 21.7399 27.2612 24.06 25.1212L19.5485 21.6231C18.2933 22.4771 16.6729 22.9606 14.7849 22.9606C11.1325 22.9606 8.03572 20.4965 6.92456 17.1837H2.26904V20.7898C4.64567 25.5173 9.48639 28.5009 14.7798 28.5009Z"
                                    fill="#34A853" />
                                <path
                                    d="M6.91941 17.1837C6.33297 15.4449 6.33297 13.5621 6.91941 11.8234V8.21729H2.26904C0.283368 12.1732 0.283368 16.8339 2.26904 20.7898L6.91941 17.1837Z"
                                    fill="#FBBC04" />
                                <path
                                    d="M14.7798 6.04127C16.7757 6.01041 18.7048 6.76146 20.1504 8.14012L24.1474 4.14305C21.6165 1.76642 18.2573 0.45979 14.7798 0.500943C9.48638 0.500943 4.64567 3.48459 2.26904 8.21728L6.91942 11.8234C8.02542 8.50536 11.1274 6.04127 14.7798 6.04127Z"
                                    fill="#EA4335" />
                            </g>
                            <defs>
                                <clipPath id="clip0_286_20">
                                    <rect width="28" height="28" fill="white" transform="translate(0.5 0.5)" />
                                </clipPath>
                            </defs>
                        </svg>
                        <p class="text-label-small font-semibold text-secondary">Log in with Google</p>
                    </button>
                </div>
            </div>

            <!-- Sign-Up Link -->
            <span class="text-label-medium font-bold text-secondary text-center">
                Don't you have an account?
                <a href="?page=register" class="text-Info hover:text-[#1b5bcc] hover:underline">Sign up</a>
            </span>
        </div>
    </div>
    <!-- Right Side (Image) -->
    <img src="<?= $base_url ?>Outfit/login-image.jpg" alt="img-register" class="flex-1 h-full rounded-2xl bg-cover bg-center bg-no-repeat max-w-[450px]">

</section>
<?php
session_start();
if (isset($_GET['success']) && !isset($_SESSION['role'])) {
    header("Location: ?page=login&error=session_not_found");
    exit;
}
?>

<?php if (isset($_GET['error']) || isset($_GET['success'])): ?>
    <div id="popup-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 right-0 left-0 z-50 hidden justify-center items-center w-full h-screen">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 rounded-lg text-sm p-1.5 dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                <div class="p-6 text-center">
                    <?php if (isset($_GET['error'])): ?>
                        <h3 class="mb-5 text-lg font-normal text-red-500">
                            <?= htmlspecialchars($_GET['error']); ?>
                        </h3>
                    <?php elseif (isset($_GET['success'])): ?>
                        <h3 class="mb-5 text-lg font-normal text-green-500">
                            Login berhasil! Mengarahkan ke dashboard...
                        </h3>
                        <script>
                            document.addEventListener('DOMContentLoaded', () => {
                                setTimeout(() => {
                                    window.location.href =
                                        <?= $_SESSION['role'] === 'admin' ? "'?page=products'" : "'?page=homePageUser'" ?>;
                                }, 3000);
                            });
                        </script>
                    <?php endif; ?>
                    <a href="?page=login" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5">Tutup</a>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('popup-modal');
        if (window.location.search.includes('error') || window.location.search.includes('success')) {
            modal.classList.remove('hidden');
        }

        const closeModalButtons = document.querySelectorAll('[data-modal-hide="popup-modal"]');
        closeModalButtons.forEach(button => {
            button.addEventListener('click', () => {
                modal.classList.add('hidden');
            });
        });
    });
</script>