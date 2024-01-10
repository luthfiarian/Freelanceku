<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelanceku | Login</title>

    <?php CallFileApp::RequireOnce('Views/Templates/Part/Style.php'); ?>
</head>

<body>
    <!-- Main -->
    <main>
        <section id="login" class="w-full">
            <div class="container">
                <div class="w-full px-4 flex mt-48 md:mt-64 lg:mt-36">
                    <form action="" method="post" class="w-2/3 backdrop-blur-sm rounded-3xl flex mx-auto bg-white/60">
                        <div class="!hidden lg:!contents md:!w-1/3 lg:!w-1/2 bg-white">
                            <img src="<?php echo CallAny::File('Public/dist/image/login_admin.png') ?>" alt="Image Login" class="rounded-full smooth-bounce-hero">
                        </div>
                        <div class="!w-full md:!w-full lg:!w-1/2 px-4 py-2 self-center">
                            <h1 class="text-xl font-semibold mb-10">Selamat Datang!</h1>
                            <!-- Email -->
                            <label for="email" class="block">Email :</label>
                            <input type="email" name="email" id="email" class="w-full rounded-full py-1 px-4 mb-4" placeholder="admin@email.com">
                            <!-- Password -->
                            <label for="password" class="block">Password :</label>
                            <input type="password" name="password" id="password" class="w-full rounded-full py-1 px-4 mb-4" placeholder="******">
                            
                            <input type="submit" value="Masuk" class="w-full bg-green-500 py-2 rounded-full text-white font-medium duration-300 ease-in-out transition hover:bg-green-700 hover:shadow-xl">
                    </form>
                </div>
            </div>
        </section>
    </main>
    <!-- End of Main -->
</body>

</html>