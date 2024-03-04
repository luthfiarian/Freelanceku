<nav class="sticky top-0 z-40 w-full shadow bg-primary border-b border-gray-200">
  <div class="px-3 py-3 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start rtl:justify-end">
        <a href="" class="flex ms-2 md:me-24">
          <img src="<?php echo BASE_ROOT . "Public/dist/image/favicon.png" ?>" class="h-8 me-3" alt="Freelanceku Logo" />
          <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap">Freelanceku</span>
        </a>
      </div>
      <div class="flex items-center">
          <div class="flex items-center ms-3">
            <div>
              <button type="button" class="flex text-sm bg-white border rounded-full focus:ring-4 focus:ring-gray-300" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
                <img class="!w-8 !h-8 rounded-full" src="<?php echo BASE_ROOT . $Data1->data_photo ?>" alt="user photo">
              </button>
            </div>
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow" id="dropdown-user">
              <div class="px-4 py-3" role="none">
                <p class="text-sm text-gray-900" role="none">
                <?php echo $Data2->data->identity->first_name . " " . $Data2->data->identity->last_name; ?>
                </p>
                <p class="text-sm font-medium text-gray-900 truncate" role="none"><?php echo $Data1->data_email ?></p>
              </div>
              <ul class="py-1" role="none">
                <li>
                  <a href="<?php echo PROTOCOL_URL . "://" . BASE_URL . "admin/account" ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Akun</a>
                </li>
                <li>
                  <a href="<?php echo PROTOCOL_URL . "://" . BASE_URL . "signout" ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Keluar</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
    </div>
  </div>
</nav>

