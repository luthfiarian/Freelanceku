<!-- Alert Signup -->
<?php if (isset($_SESSION["STATUS_SIGNUP_ERR"])) : if ($_SESSION["STATUS_SIGNUP_ERR"]->status === "ERROR") : ?>
    <div id="alert-border-2" class="sticky translate-y-20 lg:translate-y-28 shadow-md right-0 top-0 flex items-center z-20 py-2 px-4 bg-red-700 rounded-lg w-1/2 lg:w-1/3 !translate-x-[98%]" role="alert">
        <svg class="flex-shrink-0 w-4 h-4 fill-current text-primary" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <div class="ms-3 text-[10px] md:text-sm font-medium text-primary pr-2">
        <?php echo $_SESSION["STATUS_SIGNUP_ERR"]->message; session_unset(); ?>
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-2" aria-label="Close">
            <span class="sr-only">Dismiss</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
<?php elseif($_SESSION["STATUS_SIGNUP_ERR"]->status === "INVALID") : ?>
    <div id="alert-border-2" class="sticky translate-y-20 lg:translate-y-28 shadow-md right-0 top-0 flex items-center z-20 py-2 px-4 bg-secondary rounded-lg w-1/2 lg:w-1/3 !translate-x-[98%]" role="alert">
        <svg class="flex-shrink-0 w-4 h-4 fill-current text-primary" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <div class="ms-3 text-[8px] md:text-sm font-medium text-primary pr-2">
            <?php
            if(isset($_SESSION["STATUS_SIGNUP_ERR"]->message->email)){echo $_SESSION["STATUS_SIGNUP_ERR"]->message->email . " ";}
            if(isset($_SESSION["STATUS_SIGNUP_ERR"]->message->password)){echo $_SESSION["STATUS_SIGNUP_ERR"]->message->password . " ";}
            if(isset($_SESSION["STATUS_SIGNUP_ERR"]->message->phone)){echo $_SESSION["STATUS_SIGNUP_ERR"]->message->phone . " ";}
            if(isset($_SESSION["STATUS_SIGNUP_ERR"]->message->interest)){echo $_SESSION["STATUS_SIGNUP_ERR"]->message->interest;}
            session_unset();
            ?>
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-2" aria-label="Close">
            <span class="sr-only">Dismiss</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
<?php endif;endif; ?>

<!-- Alert Signup -->
<?php if(isset($_SESSION["STATUS_SIGNUP_ERR"])) : ?>
    <div id="alert-border-2" class="sticky translate-y-20 lg:translate-y-28 shadow-md right-0 top-0 flex items-center z-20 py-2 px-4 bg-secondary rounded-lg w-1/2 lg:w-1/3 !translate-x-[98%]" role="alert">
        <svg class="flex-shrink-0 w-4 h-4 fill-current text-primary" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <div class="ms-3 text-[8px] md:text-sm font-medium text-primary pr-2">
            <?php
            echo $_SESSION["STATUS_SIGNUP_ERR"];
            session_unset();
            ?>
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-2" aria-label="Close">
            <span class="sr-only">Dismiss</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
<?php endif; ?>
<!-- Alert Signin -->
<?php if(isset($_SESSION["STATUS_SIGNIN_ERR"])) : ?>
    <div id="alert-border-2" class="sticky translate-y-20 lg:translate-y-28 shadow-md right-0 top-0 flex items-center z-20 py-2 px-4 bg-secondary rounded-lg w-1/2 lg:w-1/3 !translate-x-[98%]" role="alert">
        <svg class="flex-shrink-0 w-4 h-4 fill-current text-primary" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <div class="ms-3 text-[8px] md:text-sm font-medium text-primary pr-2">
            <?php
            echo $_SESSION["STATUS_SIGNIN_ERR"];
            session_unset();
            ?>
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-2" aria-label="Close">
            <span class="sr-only">Dismiss</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
<?php endif; ?>
