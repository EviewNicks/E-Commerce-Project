<?php
include BASE_PATH . 'backend/connection.php'; // Menghubungkan database
include BASE_PATH . '/Frontend/assets/navbar.php';

$promotion = null;
if ($_GET['action'] == 'edit' && isset($_GET['id'])) {
    // Ambil data promosi berdasarkan ID
    $promotion_id = $_GET['id'];
    $sql = "SELECT * FROM promotions WHERE promotion_id = $promotion_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $promotion = $result->fetch_assoc();
    } else {
        echo "<p class='text-red-500'>Promosi tidak ditemukan.</p>";
    }
}
?>

<div class="bg-white p-6 rounded-md shadow-md max-w-lg mx-auto">
    <h2 class="text-xl font-bold mb-4">Tambah Promosi Baru</h2>
    <form action="?page=<?php echo $promotion ? 'editPromotionAction' : 'addPromotionAction'; ?>" method="POST" class="bg-white p-6 rounded shadow-md">
        <input type="hidden" name="promotion_id" value="<?php echo $promotion['promotion_id'] ?? ''; ?>">

        <div>
            <label for="name" class="block text-gray-700 font-medium">Nama Promosi</label>
            <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-md" value="<?php echo $promotion['name'] ?? ''; ?>" required>
        </div>
        <div>
            <label for="discount" class="block text-gray-700 font-medium">Diskon (%)</label>
            <input type="number" id="discount" name="discount" class="w-full px-4 py-2 border rounded-md" min="1" max="100" value="<?php echo $promotion['discount'] ?? ''; ?>" required>
        </div>
        <div>
            <label for="start_date" class="block text-gray-700 font-medium">Tanggal Mulai</label>
            <input type="date" id="start_date" name="start_date" class="w-full px-4 py-2 border rounded-md" value="<?php echo $promotion['start_date'] ?? ''; ?>" required>
        </div>
        <div>
            <label for="end_date" class="block text-gray-700 font-medium">Tanggal Berakhir</label>
            <input type="date" id="end_date" name="end_date" class="w-full px-4 py-2 border rounded-md" value="<?php echo $promotion['end_date'] ?? ''; ?>" required>
        </div>
        <div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                Simpan
            </button>
        </div>
    </form>
</div>

<!-- Modal -->
<div id="modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div id="modal-content" class="bg-white p-8 rounded-lg max-w-2xl w-full shadow-lg transform scale-95 opacity-0 transition-all duration-300">
        <h2 id="modal-title" class="text-3xl font-semibold mb-6 text-blue-600 text-center">Informasi Promosi</h2>
        <p id="modal-message" class="text-lg text-gray-700 text-center"></p>
        <div class="mt-6 flex justify-center">
            <button id="close-modal" class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-all">
                Tutup
            </button>
        </div>
    </div>
</div>


<script>
    const form = document.querySelector("#form-promotion");
    const modal = document.querySelector("#modal");
    const modalContent = document.querySelector("#modal-content");
    const modalMessage = document.querySelector("#modal-message");
    const closeModal = document.querySelector("#close-modal");

    // Fungsi untuk membuka modal
    function openModal(message) {
        modalMessage.textContent = message;
        modal.classList.remove("hidden");
        setTimeout(() => {
            modalContent.classList.add("scale-100", "opacity-100");
        }, 50);
    }

    // Fungsi untuk menutup modal
    function closeModalWithAnimation() {
        modalContent.classList.remove("scale-100", "opacity-100");
        setTimeout(() => {
            modal.classList.add("hidden");
        }, 300);
    }

    // Event listener pada tombol tutup modal
    closeModal.addEventListener("click", closeModalWithAnimation);

    // Event listener pada submit form
    form.addEventListener("submit", async function(event) {
        event.preventDefault();
        const formData = new FormData(form);
        const response = await fetch("?page=addPromotionAction", {
            method: "POST",
            body: formData,
        });

        const result = await response.json();

        if (result.success) {
            openModal(result.message);
            setTimeout(() => {
                window.location.href = "?page=promotions"; // Redirect ke promotions.php
            }, 3000); // Tunggu 3 detik sebelum redirect
        } else {
            openModal(result.message);
        }
    });
</script>