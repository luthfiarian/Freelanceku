<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tidak Berizin</title>

    <?php CallFileApp::RequireOnce('Views/Templates/Part/Style.php') ?>
</head>
<body>
<body class="bg-neutral-200">
    <!-- Main -->
    <main class="w-full">
        <section id="verify">
            <div class="container">
                <div class="w-full px-4 pt-20 text-center">
                    <h1 class="text-4xl font-bold mb-10"><span class="text-green-700">{{</span> Freelanceku <span class="text-green-700">}}</span></h1>
                    <h1 class="font-bold text-2xl">Mohon Maaf Anda Tidak Memiliki Izin</h1>
                    <p class="text-lg">Mohon kembali ke halaman utama</p>
                    <img src="<?php echo CallAny::File('Public/dist/image/warning.png'); ?>" alt="Verify Image" class="mx-auto my-20 smooth-bounce-hero drop-shadow-xl">
                    <a href="<?php echo BASE_URI ?>" class="py-2 px-4 rounded-lg text-white font-semibold bg-neutral-500 duration-300 ease-in-out transition hover:bg-neutral-700 hover:shadow-lg">Beranda</a>
                </div>
            </div>
        </section>
    </main>
    <!-- End of Main -->
</body>
</body>
</html>