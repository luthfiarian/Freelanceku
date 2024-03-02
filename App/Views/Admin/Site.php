<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelanceku | Freelancer Admin</title>

    <?php CallFileApp::RequireOnce('Views/Templates/Part/Style.php') ?>
    <?php CallFileApp::RequireOnce('Views/Templates/Part/Javascript.php') ?>
</head>

<body>
    <!-- Header -->
    <header class="w-full">
        <?php CallFileApp::RequireOnceData2("Views/Admin/Templates/Header.php", $Data1, $Data2) ?>
    </header>
    <!-- End of Header -->

    <!-- Alert -->
    <?php CallFileApp::RequireOnce("Views/Admin/Templates/Part/Alert.php") ?>
    <!-- End of Alert -->

    <!-- Main -->
    <main class="w-full">
        <!-- Account Section -->
        <?php CallFileApp::RequireOnceData2('Views/Admin/Templates/Account.php', $Data1, $Data2) ?>
        <!-- End of Account Section -->

        <!-- Routes Section -->
        <?php CallFileApp::RequireOnceData2('Views/Admin/Templates/Routes.php', "Situs", "site"); ?>
        <!-- End of Routes Section -->

        <!-- Navigation Page Section -->
        <?php CallFileApp::RequireOnce('Views/Admin/Templates/Part/NavbarPage.php') ?>
        <!-- End of Navigation Page Section -->

        <!-- SEO Section -->
        <section id="site" class="mt-5">
            <div class="container">
                <div class="w-full flex">
                    <!-- Setting SEO -->
                    <div class="w-1/2 md:w-2/3 rounded-lg backdrop-blur-md bg-slate-300/70 shadow-md text-sm md:text-base mr-2">
                        <form action="" method="post" class="w-full p-4">
                            <h2 class="text-base md:text-lg font-semibold">SEO Situs Web</h2>
                            <div class="w-full flex">
                                <div class="w-1/2 mr-1">
                                    <label for="seo_name" class="block" title="Wajib di isi">Nama Situs Web*</label>
                                    <input type="text" name="seo_name" id="seo_name" class="w-full rounded-full py-1 px-4" placeholder="Nama Situs Web" value="<?php echo $Data3->seo->seo_name ?>" required>
                                </div>
                                <div class="w-1/2">
                                    <label for="seo_type" class="block" title="Wajib di isi">Tipe Situs Web*</label>
                                    <input type="text" name="seo_type" id="seo_type" class="w-full rounded-full py-1 px-4" placeholder="Tipe Situs Web" value="<?php echo $Data3->seo->seo_type ?>" required>
                                </div>
                            </div>
                            <div class="w-full flex">
                                <div class="w-1/2 mr-1">
                                    <label for="seo_locale" class="block" title="Wajib di isi">Lokasi Situs Web*</label>
                                    <input type="text" name="seo_locale" id="seo_locale" class="w-full rounded-full py-1 px-4" placeholder="Lokasi Situs Web" value="<?php echo $Data3->seo->seo_locale ?>" required>
                                </div>
                                <div class="w-1/2">
                                    <label for="seo_amp" class="block" title="Wajib di isi">Status Amp Situs Web*</label>
                                    <input type="number" inputmode="numeric" min="0" max="1" name="seo_amp" id="seo_amp" class="w-full rounded-full py-1 px-4" placeholder="Status Amp Situs Web" value="<?php echo $Data3->seo->seo_amp ?>" required>
                                </div>
                            </div>
                            <div class="w-full flex">
                                <div class="w-1/2 mr-1">
                                    <label for="seo_lang" class="block" title="Wajib di isi">Bahasa Situs Web*</label>
                                    <input type="text" name="seo_lang" id="seo_lang" class="w-full rounded-full py-1 px-4" placeholder="Bahasa Situs Web" value="<?php echo $Data3->seo->seo_lang ?>" required>
                                </div>
                                <div class="w-1/2">
                                    <label for="seo_host" class="block" title="Wajib di isi">Domain Situs Web*</label>
                                    <input type="text" name="seo_host" id="seo_host" class="w-full rounded-full py-1 px-4" placeholder="Domain Situs Web" value="<?php echo $Data3->seo->seo_host ?>" required>
                                </div>
                            </div>
                            <div class="w-full flex">
                                <div class="w-1/2 mr-1">
                                    <label for="seo_author" class="block" title="Wajib di isi">Pembuat Situs Web*</label>
                                    <input type="text" name="seo_author" id="seo_author" class="w-full rounded-full py-1 px-4" placeholder="Pembuat Situs Web" value="<?php echo $Data3->seo->seo_author ?>" required>
                                </div>
                                <div class="w-1/2">
                                    <label for="seo_keyword" class="block" title="Wajib di isi">Kata Kunci Pencarian Situs Web*</label>
                                    <input type="text" name="seo_keyword" id="seo_keyword" class="w-full rounded-full py-1 px-4" placeholder="Kata Kunci Pencarian Situs Web" value="<?php echo $Data3->seo->seo_keyword ?>" required>
                                </div>
                            </div>
                            <div>
                                <label for="seo_des" class="block" title="Wajib di isi">Deskripsi Situs Web*</label>
                                <textarea name="seo_des" id="seo_des" class="w-full rounded-lg resize-y" placeholder="Deskripsi Situs Web" required><?php echo $Data3->seo->seo_des ?></textarea>
                            </div>
                            <button type="submit" name="update-seo" class="py-2 w-full text-primary bg-secondary ease-in-out duration-300 transition rounded-full hover:bg-third">Ubah Tentang Web</button>
                        </form>
                    </div>
                    <!-- Overeview Website -->
                    <div class="w-1/2 md:w-1/3 text-sm md:text-base">
                        <h2 class="w-full py-2 px-4 text-base md:text-lg font-semibold rounded-lg shadow-md text-primary backdrop-blur-md bg-indigo-600/80">Tentang Server</h2>
                        <div class="w-full py-2 px-4 rounded-lg shadow-md text-primary backdrop-blur-md bg-indigo-600/80 mt-1">
                            <table class="table table-auto w-full text-sm">
                                <tr><td>Server</td><td>:</td><td><?php echo $_SERVER['SERVER_SOFTWARE'] ?></td></tr>
                                <tr><td>PHP</td><td>:</td><td><?php echo phpversion(); ?></td></tr>
                                <tr><td>Protocol</td><td>:</td><td><?php echo $_SERVER["SERVER_PROTOCOL"] ?></td></tr>
                            </table>
                        </div>
                        <div class="w-full flex py-2 px-4 font-semibold rounded-lg shadow-md text-primary backdrop-blur-md bg-indigo-600/80 mt-1"><h2 class="w-1/2 self-center">Pengunjung</h2><form action="" method="post" class="w-1/2"><button type="submit" name="reset-visitor" class="w-full text-sm rounded-full bg-red-500 hover:bg-red-700 text-primary py-2">Atur Ulang</button></form></div>
                        <div class="w-full py-2 px-4 rounded-lg shadow-md text-primary backdrop-blur-md bg-indigo-600/80 mt-1" style="<?php if(5 <= $Data3->visitor->visitor){ echo "height: 10rem; overflow-y: auto;"; } ?>">
                            <p class="w-full text-center"><?php echo $Data3->visitor->visitor ?></p>
                            <table class="table w-full">
                                <?php foreach($Data3->visitor->ipaddress as $ip): if($ip["ip"] === "::1" || $ip["ip"] === "127.0.0.1" || $ip["ip"] === "localhost"){ continue; } ?>
                                <tr><td><?php echo $ip["ip"] ?></td></tr>
                                <?php endforeach ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of SEO Section -->

        <!-- Site Section -->
        <section id="setting" class="mt-5">
            <div class="container">
                <div class="w-full flex">
                    <!-- Site Setting -->
                    <div class="w-1/2 md:w-2/3 rounded-lg backdrop-blur-md bg-slate-300/70 shadow-md text-sm md:text-base mr-2">
                        <form action="" method="post" class="w-full p-4">
                            <h2 class="text-base md:text-lg font-semibold">Identitas Situs Web</h2>
                            <div class="w-full flex mt-1">
                                <div class="w-1/2 mr-1">
                                    <label for="identity_phone" class="block" title="Wajib di isi">Pusat Panggilan*</label>
                                    <input type="tel" inputmode="numeric" name="identity_phone" id="identity_phone" class="w-full rounded-full py-1 px-4" placeholder="Pusat Panggilan Kantor" value="<?php echo $Data3->identity->identity_phone ?>" required>
                                </div>
                                <div class="w-1/2">
                                    <label for="identity_email" class="block" title="Wajib di isi">Surel Kantor*</label>
                                    <input type="email" inputmode="email" name="identity_email" id="identity_email" class="w-full rounded-full py-1 px-4" placeholder="Surel (Email) Kantor" value="<?php echo $Data3->identity->identity_email ?>" required>
                                </div>
                            </div>
                            <div class="w-full flex mt-1">
                                <div class="w-1/2 mr-1">
                                    <label for="identity_maps_link" class="block" title="Wajib di isi">Tautan Google Maps*</label>
                                    <input type="text" name="identity_maps_link" id="identity_maps_link" class="w-full rounded-full py-1 px-4" placeholder="Tautan Google Maps" value="<?php echo $Data3->identity->identity_maps_link ?>" required>
                                </div>
                                <div class="w-1/2">
                                    <label for="identity_maps_embed" class="block" title="Wajib di isi">Tautan Google Maps Embed*</label>
                                    <input type="text" name="identity_maps_embed" id="identity_maps_embed" class="w-full rounded-full py-1 px-4" placeholder="Tautan Google Maps Embed" value="<?php echo $Data3->identity->identity_maps_embed ?>" required>
                                </div>
                            </div>
                            <div class="w-full mt-1">
                                <label for="identity_address" class="block" title="Wajib di isi">Alamat Kantor*</label>
                                <input type="text" name="identity_address" id="identity_address" class="w-full rounded-full py-1 px-4" placeholder="Alamat Kantor" value="<?php echo $Data3->identity->identity_address ?>" required>
                            </div>

                            <h2 class="mt-2 text-base md:text-lg font-semibold">Sosial Media Situs Web</h2>
                            <div class="w-full flex mt-1">
                                <div class="w-1/2 mr-1">
                                    <label for="identity_ig" class="block">Instagram</label>
                                    <input type="text" name="identity_ig" id="identity_ig" class="w-full rounded-full py-1 px-4" placeholder="Tautan Instagram" value="<?php echo !empty($Data3->identity->identity_ig) ? $Data3->identity->identity_ig : NULL  ?>">
                                </div>
                                <div class="w-1/2">
                                    <label for="identity_linkedin" class="block">LinkedIn</label>
                                    <input type="text" name="identity_linkedin" id="identity_linkedin" class="w-full rounded-full py-1 px-4" placeholder="Tautan LinkedIn" value="<?php echo !empty($Data3->identity->identity_linkedin) ? $Data3->identity->identity_linkedin : NULL  ?>">
                                </div>
                            </div>
                            <div class="w-full flex mt-1">
                                <div class="w-1/2 mr-1">
                                    <label for="identity_x" class="block">X</label>
                                    <input type="tel" inputmode="numeric" name="identity_x" id="identity_x" class="w-full rounded-full py-1 px-4" placeholder="Tautan X" value="<?php echo !empty($Data3->identity->identity_x) ? $Data3->identity->identity_x : NULL  ?>">
                                </div>
                                <div class="w-1/2">
                                    <label for="identity_fb" class="block">Facebook</label>
                                    <input type="text" name="identity_fb" id="identity_fb" class="w-full rounded-full py-1 px-4" placeholder="Tautan Facebook" value="<?php echo !empty($Data3->identity->identity_fb) ? $Data3->identity->identity_fb : NULL  ?>">
                                </div>
                            </div>
                            <button type="submit" name="update-site" class="mt-2 py-2 w-full text-primary bg-secondary ease-in-out duration-300 transition rounded-full hover:bg-third">Perbarui Identitas Situs</button>
                        </form>
                    </div>
                    <!-- Overiview -->
                    <div class="w-1/2 md:w-1/3 text-sm md:text-base">
                        <h2 class="w-full py-2 px-4 text-base md:text-lg font-semibold rounded-lg shadow-md backdrop-blur-md text-primary bg-stone-400/80">Google Maps</h2>
                        <div class="w-full py-2 px-4 rounded-lg shadow-md backdrop-blur-md text-primary bg-stone-400/80 mt-1">
                            <iframe class="w-full h-fit rounded-lg shadow-lg" src="<?php echo $Data3->identity->identity_maps_embed ?>" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <h2 class="w-full mt-1 py-2 px-4 text-base md:text-lg font-semibold rounded-lg shadow-md backdrop-blur-md text-primary bg-stone-400/80">Sosial Media</h2>
                        <div class="w-full flex py-2 px-4 rounded-lg shadow-md backdrop-blur-md text-primary bg-stone-400/80 mt-1">
                            <?php if(!empty($Data3->identity->identity_ig) || !empty($Data3->identity->identity_linkedin) || !empty($Data3->identity->identity_x) || !empty($Data3->identity->identity_fb)): ?>
                                <?php if(!empty($Data3->identity->identity_ig)): ?>
                                    <a href="<?php echo $Data3->identity->identity_ig ?>" target="_blank" rel="noopener noreferrer" class="mx-auto border rounded-full p-2 border-primary hover:bg-primary">
                                    <svg role="img" width="25px" height="25px" class="fill-current text-[#E4405F]" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Instagram</title><path d="M7.0301.084c-1.2768.0602-2.1487.264-2.911.5634-.7888.3075-1.4575.72-2.1228 1.3877-.6652.6677-1.075 1.3368-1.3802 2.127-.2954.7638-.4956 1.6365-.552 2.914-.0564 1.2775-.0689 1.6882-.0626 4.947.0062 3.2586.0206 3.6671.0825 4.9473.061 1.2765.264 2.1482.5635 2.9107.308.7889.72 1.4573 1.388 2.1228.6679.6655 1.3365 1.0743 2.1285 1.38.7632.295 1.6361.4961 2.9134.552 1.2773.056 1.6884.069 4.9462.0627 3.2578-.0062 3.668-.0207 4.9478-.0814 1.28-.0607 2.147-.2652 2.9098-.5633.7889-.3086 1.4578-.72 2.1228-1.3881.665-.6682 1.0745-1.3378 1.3795-2.1284.2957-.7632.4966-1.636.552-2.9124.056-1.2809.0692-1.6898.063-4.948-.0063-3.2583-.021-3.6668-.0817-4.9465-.0607-1.2797-.264-2.1487-.5633-2.9117-.3084-.7889-.72-1.4568-1.3876-2.1228C21.2982 1.33 20.628.9208 19.8378.6165 19.074.321 18.2017.1197 16.9244.0645 15.6471.0093 15.236-.005 11.977.0014 8.718.0076 8.31.0215 7.0301.0839m.1402 21.6932c-1.17-.0509-1.8053-.2453-2.2287-.408-.5606-.216-.96-.4771-1.3819-.895-.422-.4178-.6811-.8186-.9-1.378-.1644-.4234-.3624-1.058-.4171-2.228-.0595-1.2645-.072-1.6442-.079-4.848-.007-3.2037.0053-3.583.0607-4.848.05-1.169.2456-1.805.408-2.2282.216-.5613.4762-.96.895-1.3816.4188-.4217.8184-.6814 1.3783-.9003.423-.1651 1.0575-.3614 2.227-.4171 1.2655-.06 1.6447-.072 4.848-.079 3.2033-.007 3.5835.005 4.8495.0608 1.169.0508 1.8053.2445 2.228.408.5608.216.96.4754 1.3816.895.4217.4194.6816.8176.9005 1.3787.1653.4217.3617 1.056.4169 2.2263.0602 1.2655.0739 1.645.0796 4.848.0058 3.203-.0055 3.5834-.061 4.848-.051 1.17-.245 1.8055-.408 2.2294-.216.5604-.4763.96-.8954 1.3814-.419.4215-.8181.6811-1.3783.9-.4224.1649-1.0577.3617-2.2262.4174-1.2656.0595-1.6448.072-4.8493.079-3.2045.007-3.5825-.006-4.848-.0608M16.953 5.5864A1.44 1.44 0 1 0 18.39 4.144a1.44 1.44 0 0 0-1.437 1.4424M5.8385 12.012c.0067 3.4032 2.7706 6.1557 6.173 6.1493 3.4026-.0065 6.157-2.7701 6.1506-6.1733-.0065-3.4032-2.771-6.1565-6.174-6.1498-3.403.0067-6.156 2.771-6.1496 6.1738M8 12.0077a4 4 0 1 1 4.008 3.9921A3.9996 3.9996 0 0 1 8 12.0077"/></svg>
                                    </a>
                                <?php endif ?>
                                <?php if(!empty($Data3->identity->identity_linkedin)): ?>
                                    <a href="<?php echo $Data3->identity->identity_linkedin ?>" target="_blank" rel="noopener noreferrer" class="mx-auto border rounded-full p-2 border-primary hover:bg-primary">
                                    <svg role="img" width="25px" height="25px" class="fill-current text-[#0A66C2]" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>LinkedIn</title><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                                    </a>
                                <?php endif ?>
                                <?php if(!empty($Data3->identity->identity_x)): ?>
                                    <a href="<?php echo $Data3->identity->identity_x ?>" target="_blank" rel="noopener noreferrer" class="mx-auto border rounded-full p-2 border-primary hover:bg-primary">
                                    <svg role="img" width="25px" height="25px" class="fill-current text-black" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>X</title><path d="M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932ZM17.61 20.644h2.039L6.486 3.24H4.298Z"/></svg></a>
                                <?php endif ?>
                                <?php if(!empty($Data3->identity->identity_fb)): ?>
                                    <a href="<?php echo $Data3->identity->identity_fb ?>" target="_blank" rel="noopener noreferrer" class="mx-auto border rounded-full p-2 border-primary hover:bg-primary">
                                    <svg role="img" width="25px" height="25px" class="fill-current text-[#0866FF]" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Facebook</title><path d="M9.101 23.691v-7.98H6.627v-3.667h2.474v-1.58c0-4.085 1.848-5.978 5.858-5.978.401 0 .955.042 1.468.103a8.68 8.68 0 0 1 1.141.195v3.325a8.623 8.623 0 0 0-.653-.036 26.805 26.805 0 0 0-.733-.009c-.707 0-1.259.096-1.675.309a1.686 1.686 0 0 0-.679.622c-.258.42-.374.995-.374 1.752v1.297h3.919l-.386 2.103-.287 1.564h-3.246v8.245C19.396 23.238 24 18.179 24 12.044c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.628 3.874 10.35 9.101 11.647Z"/></svg>
                                    </a>
                                <?php endif ?>
                            <?php else : ?>
                            <p class="w-full py-2 text-center text-primary">Tidak Ada Sama Sekali Sosial Media 👀</p>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Site Section -->

        <!-- Interest Section -->
        <section id="interest" class="mt-5">
            <div class="container">
                <div class="w-full text-sm md:text-base p-4 backdrop-blur-lg bg-emerald-500/50 shadow-xl rounded-lg">
                <p class="text-lg">Minat Kerja (<?php $QueryInterest = mysqli_num_rows($Data3->interest); echo $QueryInterest ?>)</p>
                    <div class="w-full rounded-lg" style="<?php if(8 <= $QueryInterest){ echo "height: 10rem; overflow-y: auto;"; } ?>">
                        <table class="table table-auto w-full text-center text-ellipsis text-sm md:text-base mx-auto">
                            <thead class="bg-emerald-600/30 font-semibold sticky top-0">
                                <tr>
                                    <td class="rounded-tl-xl">No</td><td>Minat Kerja</td><td class="rounded-tr-xl">Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; while($Interest = mysqli_fetch_assoc($Data3->interest)): ?>
                                <tr class="ease-in-out duration-150 transition hover:backdrop-blur-md bg-white/30">
                                    <td <?php if($i == $QueryInterest): ?> class="rounded-bl-xl" <?php endif ?>><?php echo $i ?></td>
                                    <td><?php echo $Interest["interest_name"] ?></td>
                                    <td <?php if($i == $QueryInterest): ?> class="rounded-br-xl" <?php endif ?>><form action="" method="post"><input type="hidden" name="id" value="<?php echo $Interest["id"] ?>"><button type="submit" name="delete-interest" class="py-1 px-4 rounded-lg text-primary bg-red-500 hover:bg-red-700">Hapus</button></form></td>
                                </tr>
                                <?php $i++; endwhile ?>
                                <?php if($QueryInterest == 0): ?>
                                <tr class="ease-in-out duration-150 transition hover:bg-white/30">
                                    <td colspan="3" class="text-center">Terlihat tidak ada data disini 👀</td>
                                </tr>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="w-full mt-2">
                        <p class="font-semibold w-full text-center">Tambah Data Minat Kerja</p>
                        <form action="" method="post" class="w-1/2 mx-auto flex">
                            <input type="text" name="interest_name" id="interest_name" class="w-1/2 rounded-full py-1 px-4" placeholder="Front-end" required>
                            <button type="submit" name="add-interest" class="w-1/2 py-2 text-primary bg-secondary ease-in-out duration-300 transition rounded-full hover:bg-third">Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Interest Section -->
        
    </main>
    <!-- End of Main -->
    
    <!-- Navbar Bottom -->
    <?php CallFileApp::RequireOnce("Views/Admin/Templates/NavbarBottom.php"); ?>
    <!-- End of Navbar Bottom -->

    <!-- Footer -->
    <?php CallFileApp::RequireOnce('Views/Admin/Templates/Footer.php') ?>
    <!-- End of Footer -->
</body>

</html>