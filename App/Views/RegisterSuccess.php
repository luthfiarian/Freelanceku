<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelanceku | Selamat</title>

    <?php CallFileApp::RequireOnce('Views/Templates/Part/Style.php') ?>
</head>
<body>
    <!-- Main -->
    <main class="w-full">
        <section id="verify">
            <div class="container">
                <div class="w-full px-4 pt-20 text-center">
                    <h1 class="text-4xl font-bold mb-10"><span class="text-third">{{</span> Freelanceku <span class="text-third">}}</span></h1>
                    <h1 class="font-bold text-2xl">Selamat Akun Anda Telah Dibuat ✨</h1>
                    <p class="text-lg">Silahkan masuk menggunakan akun yang anda telah daftarkan!</p>
                    <p class="text-lg"><?php echo $_SESSION["register-email"] ?></p>
                    <img src="<?php echo BASE_ROOT . 'Public/dist/image/verify.png' ?>" alt="Verify Image" class="mx-auto my-20 smooth-bounce-hero drop-shadow-xl">
                    <a href="<?php echo BASE_ROOT ?>" class="py-2 px-4 rounded-lg text-white font-semibold bg-neutral-500 duration-300 ease-in-out transition hover:bg-neutral-700 hover:shadow-lg">Beranda</a>
                </div>
            </div>
        </section>
    </main>
    <!-- End of Main -->
</body>
</html>