<div id="dragBox" class="z-[150] top-0 fixed w-2/3 md:w-1/3 h-fit rounded-lg bg-orange-50/90 cursor-move overflow-hidden shadow-lg transition">
    <button type="button" id="minimizeButton" onclick="toggleMinimize()" class="absolute top-[1px] right-[5px] cursor-pointer">
        <svg class="fill-current text-primary" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="25px" height="25px" viewBox="-51.2 -51.2 614.40 614.40" enable-background="new 0 0 512 512" xml:space="preserve" transform="matrix(1, 0, 0, 1, 0, 0)rotate(0)" stroke="#966464" stroke-width="0.00512"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="1.024"></g><g id="SVGRepo_iconCarrier"> <path d="M256,0C114.609,0,0,114.609,0,256s114.609,256,256,256s256-114.609,256-256S397.391,0,256,0z M256,472 c-119.297,0-216-96.703-216-216S136.703,40,256,40s216,96.703,216,216S375.297,472,256,472z"></path> <path d="M256,128c-70.688,0-128,57.312-128,128s57.312,128,128,128s128-57.312,128-128S326.688,128,256,128z M251.375,322 c-10.172,0-17.078-7.484-17.078-17.469c0-10.344,7.094-17.453,17.078-17.453c10.344,0,17.062,7.109,17.281,17.453 C268.656,314.516,261.938,322,251.375,322z M278.188,250.422c-6.906,7.859-6.188,15.359-6.188,23.984V272h-32.719l-0.188-2.062 c-0.578-9.781,2.688-18.297,11.312-28.469c6.156-7.484,11.125-13.078,11.125-19.422c0-6.703-4.406-10.953-14-11.141 c-6.328,0-14,2.484-19,5.938l-6.516-20.812c7.094-4.031,18.422-7.828,32.047-7.828c25.312,0,38.828,14.016,38.828,29.953 C292.891,232.75,285.469,242.375,278.188,250.422z"></path> </g></svg>
    </button>
    <div id="titleDebug" class="w-full rounded-t-lg py-1 px-4 bg-third">
        <small class="text-primary">Debug Mode</small>
    </div>
    <div id="dragText" class="w-full py-1 !px-4 whitespace-pre-line overflow-y-hidden md:overflow-y-auto rounded-b-lg h-fit md:h-36">
        <?php if((($_SERVER["REQUEST_URI"] === BASE_URI) || ($_SERVER["REQUEST_URI"] === BASE_URI)) && (!isset($_SESSION["fk-session"]) && !isset($_COOKIE["API-COOKIE"]))): ?>
            <div class="w-full flex">
                <button data-modal-target="signup-admin" data-modal-toggle="signup-admin" type="button" class="py-2 px-4 rounded-lg bg-secondary text-primary mx-auto ease-in-out duration-300 transition hover:bg-third">Signup Admin</button>
            </div>
        <?php endif ?>
        <p class="w-full max-w-full whitespace-normal text-xs md:text-base">GET : <?php var_dump($_GET) ?></p>
        <p class="w-full max-w-full whitespace-normal text-xs md:text-base">POST : <?php var_dump($_POST) ?></p>
        <p class="w-full max-w-full whitespace-normal text-xs md:text-base">SESSION : <?php var_dump($_SESSION) ?></p>
        <p class="w-full max-w-full whitespace-normal text-xs md:text-base">COOKIE : <?php var_dump($_COOKIE) ?></p>
        <?php if(isset($_POST["clear"])) : unset($_GET, $_POST, $_SESSION); session_unset(); session_destroy();  endif ?>
        <form action="" method="post"><button type="submit" name="clear" class="py-2 px-4 rounded-lg bg-secondary text-primary mx-auto ease-in-out duration-300 transition hover:bg-third">Clear GET, POST, SESSION</button></form>
    </div>
    <div id="minimizedContent" class="hidden border p-2 text-xs text-center"></div>
</div>
<script src="<?php echo BASE_ROOT . "Public/dist/js/debug.js" ?>"></script>