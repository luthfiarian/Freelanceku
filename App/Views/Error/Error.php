<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelanceku | Eror (<?php echo http_response_code() ?>)</title>

    <?php CallFileApp::RequireOnce('Views/Templates/Part/Style.php'); ?>
</head>

<body>
    <!-- Main -->
    <main class="w-full">
        <section id="error">
            <div class="container">
                <div class="w-full px-4 pt-20 text-center">
                    <h1 class="text-4xl font-bold mb-10"><span class="text-third">{{</span> Freelanceku <span class="text-third">}}</span></h1>
                    <h1 class="font-bold text-2xl">Eror (<?php echo http_response_code() ?>)</h1>
                    <p class="text-lg">Mohon kembali ke halaman sebelumnya</p>
                    <img src="<?php echo BASE_ROOT . 'Public/dist/image/warning.png' ?>" alt="Verify Image" class="mx-auto my-20 smooth-bounce-hero drop-shadow-xl">
                    <button onclick="history.back()" class="py-2 px-4 rounded-lg text-white font-semibold bg-neutral-500 duration-300 ease-in-out transition hover:bg-neutral-700 hover:shadow-lg">Kembali</button>
                </div>
            </div>
        </section>
    </main>
    <!-- End of Main -->
</body>

</html>