<nav id="bootom-nav" class="fixed w-full z-50 bottom-8">
    <div class="container flex">
        <div class="lg:w-2/3 md:w-1/2 py-2 px-4 border bg-primary rounded-lg shadow-md mx-auto flex flex-warp">
            <!-- Home -->
            <a href="<?php echo BASE_URI ?>" id="home-nav" class="w-1/5 text-center p-2 rounded-lg border duration-300 ease-in-out hover:shadow-md hover:border-none hover:bg-gradient-to-tr hover:from-orange-200 hover:to-primary mr-1">
                <svg width="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="mx-auto">
                    <g clip-path="url(#clip0_15_3)">
                        <rect width="24" height="24" />
                        <path d="M9 21H4C3.44772 21 3 20.5523 3 20V12.4142C3 12.149 3.10536 11.8946 3.29289 11.7071L11.2929 3.70711C11.6834 3.31658 12.3166 3.31658 12.7071 3.70711L20.7071 11.7071C20.8946 11.8946 21 12.149 21 12.4142V20C21 20.5523 20.5523 21 20 21H15M9 21H15M9 21V15C9 14.4477 9.44772 14 10 14H14C14.5523 14 15 14.4477 15 15V21" stroke="#000000" stroke-linejoin="round" />
                    </g>
                    <defs>
                        <clipPath id="clip0_15_3">
                            <rect width="24" height="24" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
                <span class="hidden md:contents md:text-[10px] lg:text-sm text-center">Beranda</span>
            </a>
            <!-- Dashboard -->
            <a href="<?php echo BASE_URI . "dashboard" ?>" id="dashboard-nav" class="w-1/5 text-center p-2 rounded-lg border duration-300 ease-in-out hover:shadow-md hover:border-none hover:bg-gradient-to-tr hover:from-orange-200 hover:to-primary mr-1">
                <svg width="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="mx-auto">
                    <path d="M9.5 5.75C9.91421 5.75 10.25 5.41421 10.25 5C10.25 4.58579 9.91421 4.25 9.5 4.25V5.75ZM4.75 11C4.75 11.4142 5.08579 11.75 5.5 11.75C5.91421 11.75 6.25 11.4142 6.25 11H4.75ZM9.5 4.25C9.08579 4.25 8.75 4.58579 8.75 5C8.75 5.41421 9.08579 5.75 9.5 5.75V4.25ZM18.75 11C18.75 11.4142 19.0858 11.75 19.5 11.75C19.9142 11.75 20.25 11.4142 20.25 11H18.75ZM10.25 5C10.25 4.58579 9.91421 4.25 9.5 4.25C9.08579 4.25 8.75 4.58579 8.75 5H10.25ZM8.75 11C8.75 11.4142 9.08579 11.75 9.5 11.75C9.91421 11.75 10.25 11.4142 10.25 11H8.75ZM9.5 11.75C9.91421 11.75 10.25 11.4142 10.25 11C10.25 10.5858 9.91421 10.25 9.5 10.25V11.75ZM5.5 10.25C5.08579 10.25 4.75 10.5858 4.75 11C4.75 11.4142 5.08579 11.75 5.5 11.75V10.25ZM9.5 10.25C9.08579 10.25 8.75 10.5858 8.75 11C8.75 11.4142 9.08579 11.75 9.5 11.75V10.25ZM19.5 11.75C19.9142 11.75 20.25 11.4142 20.25 11C20.25 10.5858 19.9142 10.25 19.5 10.25V11.75ZM6.25 11C6.25 10.5858 5.91421 10.25 5.5 10.25C5.08579 10.25 4.75 10.5858 4.75 11H6.25ZM20.25 11C20.25 10.5858 19.9142 10.25 19.5 10.25C19.0858 10.25 18.75 10.5858 18.75 11H20.25ZM9.5 4.25C6.87665 4.25 4.75 6.37665 4.75 9H6.25C6.25 7.20507 7.70507 5.75 9.5 5.75V4.25ZM4.75 9V11H6.25V9H4.75ZM9.5 5.75H15.5V4.25H9.5V5.75ZM15.5 5.75C17.2949 5.75 18.75 7.20507 18.75 9H20.25C20.25 6.37665 18.1234 4.25 15.5 4.25V5.75ZM18.75 9V11H20.25V9H18.75ZM8.75 5V11H10.25V5H8.75ZM9.5 10.25H5.5V11.75H9.5V10.25ZM9.5 11.75H19.5V10.25H9.5V11.75ZM4.75 11V15H6.25V11H4.75ZM4.75 15C4.75 17.6234 6.87665 19.75 9.5 19.75V18.25C7.70507 18.25 6.25 16.7949 6.25 15H4.75ZM9.5 19.75H15.5V18.25H9.5V19.75ZM15.5 19.75C18.1234 19.75 20.25 17.6234 20.25 15H18.75C18.75 16.7949 17.2949 18.25 15.5 18.25V19.75ZM20.25 15V11H18.75V15H20.25Z" fill="#000000" />
                </svg>
                <span class="hidden md:contents md:text-[10px] lg:text-sm text-center">Dashboard</span>
            </a>
            <!-- Work -->
            <a href="<?php echo BASE_URI . "work" ?>" id="work-nav" class="w-1/5 text-center p-2 rounded-lg border duration-300 ease-in-out hover:shadow-md hover:border-none hover:bg-gradient-to-tr hover:from-orange-200 hover:to-primary mr-1">
                <svg width="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="mx-auto">
                    <path opacity="0.4" d="M12.3691 8.87988H17.6191" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path opacity="0.4" d="M6.38086 8.87988L7.13086 9.62988L9.38086 7.37988" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path opacity="0.4" d="M12.3691 15.8799H17.6191" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path opacity="0.4" d="M6.38086 15.8799L7.13086 16.6299L9.38086 14.3799" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M9 22H15C20 22 22 20 22 15V9C22 4 20 2 15 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <span class="hidden md:contents md:text-[10px] lg:text-sm text-center">Pekerjaan</span>
            </a>
            <!-- Partner -->
            <a href="<?php echo BASE_URI . "partner" ?>" id="partner-nav" class="w-1/5 text-center p-2 rounded-lg border duration-300 ease-in-out hover:shadow-md hover:border-none hover:bg-gradient-to-tr hover:from-orange-200 hover:to-primary mr-1">
            <svg width="25px" viewBox="0 0 60 60" class="mx-auto" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"><defs><style>.cls-1{fill:#030104;}</style></defs><title>handshake</title><path class="cls-1" d="M64,12.78v17s-3.63.71-4.38.81-3.08.85-4.78-.78C52.22,27.25,42.93,18,42.93,18a3.54,3.54,0,0,0-4.18-.21c-2.36,1.24-5.87,3.07-7.33,3.78a3.37,3.37,0,0,1-5.06-2.64,3.44,3.44,0,0,1,2.1-3c3.33-2,10.36-6,13.29-7.52,1.78-1,3.06-1,5.51,1C50.27,12,53,14.27,53,14.27a2.75,2.75,0,0,0,2.26.43C58.63,14,64,12.78,64,12.78ZM27,41.5a3,3,0,0,0-3.55-4.09,3.07,3.07,0,0,0-.64-3,3.13,3.13,0,0,0-3-.75,3.07,3.07,0,0,0-.65-3,3.38,3.38,0,0,0-4.72.13c-1.38,1.32-2.27,3.72-1,5.14s2.64.55,3.72.3c-.3,1.07-1.2,2.07-.09,3.47s2.64.55,3.72.3c-.3,1.07-1.16,2.16-.1,3.46s2.84.61,4,.25c-.45,1.15-1.41,2.39-.18,3.79s4.08.75,5.47-.58a3.32,3.32,0,0,0,.3-4.68A3.18,3.18,0,0,0,27,41.5Zm25.35-8.82L41.62,22a3.53,3.53,0,0,0-3.77-.68c-1.5.66-3.43,1.56-4.89,2.24a8.15,8.15,0,0,1-3.29,1.1,5.59,5.59,0,0,1-3-10.34C29,12.73,34.09,10,34.09,10a6.46,6.46,0,0,0-5-2C25.67,8,18.51,12.7,18.51,12.7a5.61,5.61,0,0,1-4.93.13L8,10.89v19.4s1.59.46,3,1a6.33,6.33,0,0,1,1.56-2.47,6.17,6.17,0,0,1,8.48-.06,5.4,5.4,0,0,1,1.34,2.37,5.49,5.49,0,0,1,2.29,1.4A5.4,5.4,0,0,1,26,34.94a5.47,5.47,0,0,1,3.71,4,5.38,5.38,0,0,1,2.39,1.43,5.65,5.65,0,0,1,1.48,4.89,0,0,0,0,1,0,0s.8.9,1.29,1.39a2.46,2.46,0,0,0,3.48-3.48s2,2.48,4.28,1c2-1.4,1.69-3.06.74-4a3.19,3.19,0,0,0,4.77.13,2.45,2.45,0,0,0,.13-3.3s1.33,1.81,4,.12c1.89-1.6,1-3.43,0-4.39Z"/></svg>
                <span class="hidden md:contents md:text-[10px] lg:text-sm text-center">Mitra</span>
            </a>
            <!-- Account -->
            <a href="<?php echo BASE_URI . "account" ?>" id="acc-nav" class="w-1/5 text-center p-2 rounded-lg border duration-300 ease-in-out hover:shadow-md hover:border-none hover:bg-gradient-to-tr hover:from-orange-200 hover:to-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto" fill="#000000" width="25px" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/></svg>
                <span class="hidden md:contents md:text-[10px] lg:text-sm text-center">Akun</span>
            </a>
        </div>
    </div>
</nav>