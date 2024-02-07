<div class="w-full flex flex-warp text-center">
    <p class="w-1/5 font-semibold text-sm self-center"><?php echo $Data->partner_name ?></p>
    <?php if(!empty($Data->partner_file)): ?>
    <button class="w-1/5 py-2 px-4 text-xs rounded-lg font-semibold mr-1 border ease-in-out duration-300 transition hover:bg-black">Unduh File</button>
    <?php else: ?>
    <p class="w-1/5 text-center self-center">-</p>
    <?php endif ?>
    <button class="w-1/5 py-2 px-4 text-sm rounded-lg font-semibold mr-1 bg-third text-primary ease-in-out duration-300 transition hover:bg-opacity-80">Hubungi</button>
    <button class="w-1/5 py-2 px-4 text-sm rounded-lg font-semibold mr-1 bg-secondary text-primary ease-in-out duration-300 transition hover:bg-opacity-80">Pesan</button>
    <button class="w-1/5 py-2 px-4 text-sm rounded-lg font-semibold bg-red-600 text-primary ease-in-out duration-300 transition hover:bg-opacity-80">Transfer</button>
</div>