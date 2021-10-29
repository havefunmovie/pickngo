<div>
    <x-slot name="styles">
        {{--        <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}" />--}}
        <link href="{{ asset('dist/css/style.css') }}" rel="stylesheet">
    </x-slot>
    <div class="services-page mt-2">

        <div class="bg-title">
            <img class="mx-auto  w-100" src="{{ asset('images/home/bg-header-pages.png') }}" alt="">
        </div>

        <div class="container">
            <div class="head pt-3">
                <h2 class="fs-3">{{ __('History & Tracking') }}</h2>
            </div>

            <div class="kinds mb-3">
                <div class="swiper-container mySwiper py-4">
                    <div class="swiper-wrapper">
                        <div wire:click="redirectTohome('parcel')" class="swiper-slide shadow rounded py-3 text-center">
                            <svg class="mx-auto" width="40" enable-background="new 0 0 512 512" height="50" viewBox="0 0 52 50">
                                <path d="M0 18.75H20.625V33.3333H30.9375V18.75H51.5625V50H0V18.75ZM20.625 16.6667H0L10.3125 0H22.6875L20.625 16.6667ZM30.9375 16.6667H51.5625L41.25 0H28.875L30.9375 16.6667ZM22.6875 16.6667H28.875L26.8125 0H24.75L22.6875 16.6667ZM22.6875 18.75V31.25H28.875V18.75H22.6875ZM4.125 35.4167V37.5H18.5625V35.4167H4.125ZM4.125 43.75V45.8333H18.5625V43.75H4.125ZM4.125 39.5833V41.6667H14.4375V39.5833H4.125Z"/>
                            </svg>
                            <h3 class="fs-7 mt-2 mb-0 fw-light">{{ __('Parcel') }}</h3>
                        </div>
                        <div wire:click="redirectTohome('envelop')" class="swiper-slide shadow rounded py-3 text-center">
                            <svg class="mx-auto pe-3" width="80" height="50" viewBox="0 0 92 43">
                                <path d="M90.9046 2.36473L88.6875 4.28643L84.6431 7.78031C84.6293 7.79348 84.6024 7.80719 84.5894 7.82036L72.1597 18.5572L88.6875 38.0147L91.375 41.1726V1.96187L90.9046 2.36473Z"/>
                                <path d="M37.3159 5.10598L51.4922 17.3611C51.5061 17.3611 51.5329 17.375 51.546 17.388C51.5598 17.4018 51.5598 17.4018 51.5728 17.4149L60.4687 25.1015L69.3645 17.415C69.3777 17.4018 69.3777 17.4018 69.3914 17.3881C69.4045 17.375 69.4045 17.375 69.4182 17.375L82.8689 5.75098L82.8828 5.73781L86.4167 2.6875L89.5339 0H31.4036L34.5208 2.6875L37.3159 5.10598Z"/>
                                <path d="M70.1172 20.3176L61.3421 27.8958C61.0999 28.1111 60.7779 28.2187 60.4688 28.2187C60.1597 28.2187 59.8376 28.1111 59.5955 27.896L50.8204 20.3178L33.8091 40.3125L31.5244 43H89.4132L87.1285 40.3125L70.1172 20.3176Z"/>
                                <path d="M24.1875 18.8125H6.71875C5.97673 18.8125 5.375 19.4136 5.375 20.1562C5.375 20.8989 5.97673 21.5 6.71875 21.5H24.1875C24.9295 21.5 25.5312 20.8989 25.5312 20.1562C25.5312 19.4136 24.9295 18.8125 24.1875 18.8125Z"/>
                                <path d="M24.1875 29.5625H12.0938C11.3517 29.5625 10.75 30.1636 10.75 30.9062C10.75 31.6489 11.3517 32.25 12.0938 32.25H24.1875C24.9295 32.25 25.5312 31.6489 25.5312 30.9062C25.5312 30.1636 24.9295 29.5625 24.1875 29.5625Z"/>
                                <path d="M24.1875 9.40625H1.34375C0.601731 9.40625 0 10.0073 0 10.75C0 11.4927 0.601731 12.0938 1.34375 12.0938H24.1875C24.9295 12.0938 25.5312 11.4927 25.5312 10.75C25.5312 10.0073 24.9295 9.40625 24.1875 9.40625Z"/>
                                <path d="M48.7779 18.5573L35.5556 7.13545L32.25 4.28643L30.0329 2.36473L29.5625 1.96187V41.1726L32.25 38.001L48.7779 18.5573Z"/>
                            </svg>
                            <h3 class="fs-7 mt-2 mb-0 fw-light">{{ __('Envelop') }}</h3>
                        </div>
                        <div wire:click="redirectTohome('scanning')" class="swiper-slide shadow rounded py-3 text-center">
                            <svg class="mx-auto" width="40" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M45.3125 3.125C45.3125 2.2962 44.9833 1.50134 44.3972 0.915292C43.8112 0.329241 43.0163 0 42.1875 0H7.8125C6.9837 0 6.18884 0.329241 5.60279 0.915292C5.01674 1.50134 4.6875 2.2962 4.6875 3.125V14.0625H0V20.3125H50V14.0625H45.3125V3.125ZM39.0625 14.0625H10.9375V6.25H39.0625V14.0625ZM10.9375 25V32.0312H19.5312C20.3601 32.0312 21.1549 32.3605 21.741 32.9465C22.327 33.5326 22.6562 34.3274 22.6562 35.1562V43.75H39.0625V25H45.3125V46.875C45.3125 47.7038 44.9833 48.4987 44.3972 49.0847C43.8112 49.6708 43.0163 50 42.1875 50H18.9922C18.5817 50.0003 18.1751 49.9198 17.7958 49.7629C17.4164 49.6061 17.0717 49.376 16.7812 49.0859L5.60156 37.8984C5.01757 37.3138 4.68892 36.5217 4.6875 35.6953V25H10.9375Z"/>
                            </svg>
                            <h3 class="fs-7 mt-2 mb-0 fw-light">{{ __('Scanning') }}</h3>
                        </div>
                        <div wire:click="redirectTohome('printing')" class="swiper-slide shadow rounded py-3 text-center">
                            <svg class="mx-auto" width="45" height="50" viewBox="0 0 55 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.26537 11.165H52.1036C53.3981 11.165 54.5307 12.1359 54.5307 13.4304V32.3625C54.5307 33.657 53.3981 34.6278 52.1036 34.6278H45.4693V50H9.06149V34.6278H2.26537C0.970874 34.6278 0 33.657 0 32.3625V13.4304C0 12.1359 0.970874 11.165 2.26537 11.165ZM46.4401 15.8576C47.411 15.8576 48.0583 16.5049 48.0583 17.4757C48.0583 18.2848 47.411 19.0938 46.4401 19.0938C45.6311 19.0938 44.822 18.2848 44.822 17.4757C44.822 16.5049 45.6311 15.8576 46.4401 15.8576ZM42.7184 24.4337H11.8123V47.2492H42.7184V24.4337Z"/>
                                <path d="M9.06152 10.356V0H45.4693V10.356H42.7185V2.75081H11.8123V10.356H9.06152Z"/>
                                <path d="M14.8867 28.1553H39.4822V30.9062H14.8867V28.1553Z"/>
                                <path d="M14.8867 36.5696H39.4822V39.3204H14.8867V36.5696Z"/>
                            </svg>
                            <h3 class="fs-7 mt-2 mb-0 fw-light">{{ __('Printing') }}</h3>
                        </div>
                        <div wire:click="redirectTohome('faxing')" class="swiper-slide shadow rounded py-3 text-center">
                            <svg class="mx-auto" width="40" height="50" viewBox="0 0 49 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.2893 17.3101V2.68265C17.2921 1.97111 17.5763 1.28958 18.0799 0.786925C18.5835 0.284275 19.2656 0.00136571 19.9772 0H36.5816L45.1432 8.58759V17.3101C45.1432 17.3925 45.127 17.4742 45.0954 17.5504C45.0639 17.6265 45.0176 17.6957 44.9593 17.754C44.901 17.8123 44.8318 17.8586 44.7556 17.8901C44.6795 17.9217 44.5978 17.9379 44.5154 17.9379H41.62C41.4534 17.9379 41.2938 17.8718 41.176 17.754C41.0583 17.6363 40.9921 17.4766 40.9921 17.3101V11.4155H35.6476C35.1384 11.4155 34.6501 11.2133 34.29 10.8532C33.93 10.4932 33.7277 10.0048 33.7277 9.49564V4.1511H21.4404V17.3101C21.4404 17.3925 21.4242 17.4742 21.3926 17.5504C21.3611 17.6265 21.3148 17.6957 21.2565 17.754C21.1982 17.8123 21.129 17.8586 21.0528 17.8901C20.9767 17.9217 20.895 17.9379 20.8126 17.9379H17.9016C17.7378 17.9339 17.5821 17.8659 17.4677 17.7486C17.3533 17.6313 17.2893 17.4739 17.2893 17.3101ZM17.2893 48.9622V23.0178C17.2893 22.7426 17.3987 22.4787 17.5933 22.284C17.7879 22.0894 18.0519 21.9801 18.3271 21.9801H47.2188C47.494 21.9801 47.758 22.0894 47.9526 22.284C48.1472 22.4787 48.2565 22.7426 48.2565 23.0178V44.8111C48.2565 46.1873 47.7099 47.5071 46.7368 48.4802C45.7636 49.4533 44.4438 50 43.0677 50H18.3271C18.1899 50 18.0541 49.9728 17.9276 49.92C17.801 49.8672 17.6861 49.7899 17.5896 49.6924C17.4931 49.5949 17.4169 49.4793 17.3653 49.3522C17.3138 49.2251 17.288 49.089 17.2893 48.9518V48.9622ZM37.6193 28.7879C37.6193 29.3604 37.8468 29.9094 38.2516 30.3142C38.6564 30.719 39.2054 30.9465 39.7779 30.9465C40.3496 30.9437 40.897 30.7154 41.3012 30.3112C41.7055 29.907 41.9338 29.3595 41.9365 28.7879C41.9365 28.2154 41.7091 27.6663 41.3043 27.2615C40.8994 26.8567 40.3504 26.6293 39.7779 26.6293C39.2054 26.6293 38.6564 26.8567 38.2516 27.2615C37.8468 27.6663 37.6193 28.2154 37.6193 28.7879ZM37.6193 35.99C37.6193 36.5625 37.8468 37.1116 38.2516 37.5164C38.6564 37.9212 39.2054 38.1486 39.7779 38.1486C40.3504 38.1486 40.8994 37.9212 41.3043 37.5164C41.7091 37.1116 41.9365 36.5625 41.9365 35.99C41.9406 35.4184 41.7179 34.8685 41.3171 34.4609C40.9163 34.0534 40.3703 33.8214 39.7987 33.8159C39.5121 33.8131 39.2279 33.8674 38.9626 33.9757C38.6973 34.0839 38.4562 34.2438 38.2533 34.4462C38.0505 34.6486 37.8899 34.8893 37.7811 35.1544C37.6723 35.4194 37.6173 35.7035 37.6193 35.99ZM30.4328 28.7879C30.4355 29.3595 30.6638 29.907 31.068 30.3112C31.4722 30.7154 32.0197 30.9437 32.5913 30.9465C33.163 30.9437 33.7104 30.7154 34.1147 30.3112C34.5189 29.907 34.7472 29.3595 34.7499 28.7879C34.7472 28.2162 34.5189 27.6688 34.1147 27.2646C33.7104 26.8603 33.163 26.632 32.5913 26.6293C32.0197 26.632 31.4722 26.8603 31.068 27.2646C30.6638 27.6688 30.4355 28.2162 30.4328 28.7879ZM30.4328 35.99C30.4355 36.5617 30.6638 37.1091 31.068 37.5134C31.4722 37.9176 32.0197 38.1459 32.5913 38.1486C33.1638 38.1486 33.7129 37.9212 34.1177 37.5164C34.5225 37.1116 34.7499 36.5625 34.7499 35.99C34.7513 35.4166 34.5255 34.8659 34.122 34.4585C33.7184 34.0511 33.17 33.82 32.5965 33.8159C32.024 33.8159 31.475 34.0433 31.0702 34.4481C30.6654 34.8529 30.4379 35.402 30.4379 35.9745L30.4328 35.99ZM30.4328 43.1922C30.4355 43.7638 30.6638 44.3113 31.068 44.7155C31.4722 45.1197 32.0197 45.348 32.5913 45.3508C33.1638 45.3508 33.7129 45.1233 34.1177 44.7185C34.5225 44.3137 34.7499 43.7647 34.7499 43.1922C34.7472 42.6205 34.5189 42.0731 34.1147 41.6689C33.7104 41.2646 33.163 41.0364 32.5913 41.0336C32.0188 41.0336 31.4698 41.261 31.065 41.6659C30.6602 42.0707 30.4328 42.6197 30.4328 43.1922ZM23.2306 28.7879C23.2306 29.3604 23.458 29.9094 23.8628 30.3142C24.2676 30.719 24.8167 30.9465 25.3892 30.9465C25.9608 30.9437 26.5083 30.7154 26.9125 30.3112C27.3167 29.907 27.545 29.3595 27.5477 28.7879C27.5477 28.2154 27.3203 27.6663 26.9155 27.2615C26.5107 26.8567 25.9617 26.6293 25.3892 26.6293C24.8167 26.6293 24.2676 26.8567 23.8628 27.2615C23.458 27.6663 23.2306 28.2154 23.2306 28.7879ZM23.2306 35.99C23.2306 36.5625 23.458 37.1116 23.8628 37.5164C24.2676 37.9212 24.8167 38.1486 25.3892 38.1486C25.9617 38.1486 26.5107 37.9212 26.9155 37.5164C27.3203 37.1116 27.5477 36.5625 27.5477 35.99C27.5498 35.7057 27.4956 35.4238 27.3884 35.1604C27.2812 34.8971 27.123 34.6575 26.9229 34.4555C26.7228 34.2534 26.4847 34.0929 26.2224 33.9832C25.9601 33.8734 25.6787 33.8166 25.3944 33.8159C24.8219 33.8159 24.2728 34.0433 23.868 34.4481C23.4632 34.8529 23.2358 35.402 23.2358 35.9745L23.2306 35.99ZM23.2306 43.1922C23.2333 43.7638 23.4616 44.3113 23.8658 44.7155C24.2701 45.1197 24.8175 45.348 25.3892 45.3508C25.9617 45.3508 26.5107 45.1233 26.9155 44.7185C27.3203 44.3137 27.5477 43.7647 27.5477 43.1922C27.545 42.6205 27.3167 42.0731 26.9125 41.6689C26.5083 41.2646 25.9608 41.0364 25.3892 41.0336C24.8167 41.0336 24.2676 41.261 23.8628 41.6659C23.458 42.0707 23.2306 42.6197 23.2306 43.1922ZM5.18888 49.9896H12.1005C12.3757 49.9896 12.6397 49.8803 12.8343 49.6857C13.0289 49.491 13.1382 49.2271 13.1382 48.9518V16.3501C13.1382 16.0749 13.0289 15.8109 12.8343 15.6163C12.6397 15.4217 12.3757 15.3124 12.1005 15.3124H6.56912C4.82688 15.3124 3.156 16.0045 1.92405 17.2364C0.692101 18.4684 0 20.1392 0 21.8815V44.8007C0 46.1769 0.546683 47.4967 1.51979 48.4698C2.49289 49.4429 3.8127 49.9896 5.18888 49.9896Z"/>
                            </svg>
                            <h3 class="fs-7 mt-2 mb-0 fw-light">{{ __('Faxing') }}</h3>
                        </div>
                        <div wire:click="redirectTohome('pickup-delivery')" class="swiper-slide shadow rounded py-3 text-center">
                            <svg class="mx-auto" width="70" height="50" viewBox="0 0 84 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M66.6667 8.33333C54.1667 8.33333 54.1667 8.33333 54.1667 8.33333V29.1667H50V16.6667H37.5V0H16.6667V16.6667H4.16667V29.1667H0V41.6667H8.33333C8.33333 46.2683 12.065 50 16.6667 50C21.2683 50 25 46.2683 25 41.6667H62.5C62.5 46.2683 66.2317 50 70.8333 50C75.435 50 79.1667 46.2683 79.1667 41.6667H83.3333V25C83.3333 25 83.3333 8.33333 66.6667 8.33333ZM16.6667 45.8333C14.3675 45.8333 12.5 43.9658 12.5 41.6667C12.5 39.3675 14.3675 37.5 16.6667 37.5C18.9658 37.5 20.8333 39.3675 20.8333 41.6667C20.8333 43.9658 18.9658 45.8333 16.6667 45.8333ZM20.8333 29.1667H8.33333V20.8333H12.5V25H16.6667V20.8333H20.8333V29.1667ZM20.8333 12.5V4.16667H25V8.33333H29.1667V4.16667H33.3333V12.5H20.8333ZM29.1667 29.1667H25V16.6667H29.1667V29.1667ZM45.8333 29.1667H33.3333V20.8333H37.5V25H41.6667V20.8333H45.8333V29.1667ZM70.8333 45.8333C68.5342 45.8333 66.6667 43.9658 66.6667 41.6667C66.6667 39.3675 68.5342 37.5 70.8333 37.5C73.1325 37.5 75 39.3675 75 41.6667C75 43.9658 73.1325 45.8333 70.8333 45.8333ZM66.6667 25V12.5C78.4258 12.5 79.1425 22.9333 79.1667 25H66.6667Z"/>
                            </svg>
                            <h3 class="fs-7 mt-2 mb-0 fw-light">{{ __('Pickup & Delivery') }}</h3>
                        </div>
                        <div wire:click="redirectTohome('mailbox')" class="swiper-slide shadow rounded py-3 text-center">
                            <svg class="mx-auto" width="41" height="50" viewBox="0 0 51 50" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M26.5346 14.0021L30.2457 12.1465V9.36314L26.5346 11.2187V14.0021ZM8.90671 16.5998C6.06151 15.6721 3.46372 16.1669 1.79371 18.0843C0.618521 19.3832 0 21.3006 0 23.5891V43.6292L18.6175 50V30.8258C18.6175 24.8262 14.226 18.4554 8.90671 16.5998ZM14.0404 37.0111C13.8549 37.5677 13.3601 37.877 12.8652 37.877C12.6797 37.877 12.556 37.877 12.4323 37.8151L4.08224 34.9081C3.46372 34.7225 3.09261 33.9803 3.34002 33.3618C3.52557 32.7433 4.2678 32.3721 4.88632 32.6196L13.2982 35.4647C13.9167 35.7122 14.2878 36.3925 14.0404 37.0111ZM14.0404 32.6814C13.8549 33.2381 13.3601 33.5473 12.8652 33.5473C12.6797 33.5473 12.556 33.5473 12.4323 33.4855L4.08224 30.5784C3.46372 30.3929 3.09261 29.6506 3.34002 29.0321C3.52557 28.4136 4.2678 28.0425 4.88632 28.2899L13.2982 31.1351C13.9167 31.3825 14.2878 32.0629 14.0404 32.6814Z"/>
                                <path d="M40.9462 0.456436C39.0287 -0.162086 37.235 -0.162086 35.7506 0.518288L8.90674 14.0021C9.216 14.0639 9.46341 14.1876 9.71082 14.2495C16.0197 16.4143 21.0916 23.8365 21.0916 30.8258V49.7526L50.6569 34.9081V14.7443C50.6569 8.74462 46.3273 2.312 40.9462 0.456436ZM32.7817 12.8887C32.7817 13.3835 32.5343 13.8165 32.1013 14.0021L26.5965 16.7854V32.2484C26.5965 32.9288 26.0398 33.4855 25.3594 33.4855C24.679 33.4855 24.1224 32.9288 24.1224 32.2484V10.3528C24.1224 9.79611 24.5553 9.30129 25.0501 9.17759L30.988 6.20869C31.3591 6.02313 31.792 6.02313 32.1631 6.27054C32.5343 6.51795 32.7198 6.88906 32.7817 7.32202V12.8887Z"/>
                            </svg>
                            <h3 class="fs-7 mt-2 mb-0 fw-light">{{ __('Mailbox') }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                <div class="col-md-3">
                    @include('livewire.home.panel.sections.sidebar')
                </div>
                <div class="col-md-9">
                    <div class="wrapper">
                        <div>
                            <form wire:submit.prevent="edit" class="needs-validation">
                                <div class="accordion-body px-0 row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label required fw-light fs-7 mb-1">{{__('Company / Person')}}</label>
                                        <input type="text" wire:model.lazy="address.name" class="form-control {{ $errors->has('address.name') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('address.name',$validated) ? 'is-valid' : '' }}   fw-lighter fs-8" id="name" placeholder="{{__('Company / Person')}}">
                                        @error('address.name') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="line_1" class="form-label required fw-light fs-7 mb-1">{{__('Address Line 1')}}</label>
                                        <input type="text" wire:model.lazy="address.line_1" class="form-control {{ $errors->has('address.line_1') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('address.line_1',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="line_1" placeholder="{{__('Address Line 1')}}">
                                        @error('address.line_1') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="line_2" class="form-label fw-light fs-7 mb-1">{{__('Address Line 2')}}</label>
                                        <input type="text" wire:model.lazy="address.line_2" class="form-control {{ $errors->has('address.line_2') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('address.line_2',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="line_2" placeholder="{{__('Address Line 2')}}">
                                        @error('address.line_2') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label  class="form-label fw-light mb-0 mt-1 fs-7">{{ __('Country') }}</label>
                                        <select wire:model.lazy="address.country" class="form-control fw-lighter fs-8 {{ $errors->has('address.country') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('address.country',$validated) ? 'is-valid' : '' }}" id="country" aria-label="Default select example"  >
                                            <option value="">{{ __('Select Country') }}</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->code }}" >{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('address.country') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <label for="postal_code" class="form-label required fw-light fs-7 mb-1">{{__('Zip / Postal Code')}}</label>
                                                <input type="text" wire:model.lazy="address.postal_code" class="form-control {{ $errors->has('address.postal_code') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('address.postal_code',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="postal_code" placeholder="{{__('Postal Code')}}">
                                                @error('address.postal_code') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="col-md-7">
                                                <label for="city" class="form-label required fw-light fs-7 mb-1">{{__('City')}}</label>
                                                <input type="text" wire:model.lazy="address.city" class="form-control {{ $errors->has('address.city') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('address.city',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="city" placeholder="{{__('City')}}">
                                                @error('address.city') <span class="error">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="province" class="form-label required fw-light fs-7 mb-1">{{__('Province / State')}}</label>
                                        <input type="text" wire:model.lazy="address.province" class="form-control {{ $errors->has('address.province') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('address.province',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="province" placeholder="{{__('Province / State')}}">
                                        @error('address.province') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="attention" class="form-label required fw-light fs-7 mb-1">{{__('Attention')}}</label>
                                        <input type="text" wire:model.lazy="address.attention" class="form-control {{ $errors->has('address.attention') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('address.attention',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="attention" placeholder="{{__('Attention')}}">
                                        @error('address.attention') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label required fw-light fs-7 mb-1">{{__('Phone')}}</label>
                                        <input type="text" wire:model.lazy="address.phone" class="form-control {{ $errors->has('address.phone') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('address.phone',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="phone" placeholder="{{__('Phone')}}">
                                        @error('address.phone') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label required fw-light fs-7 mb-1">{{__('Email')}}</label>
                                        <input type="email" wire:model.lazy="address.email" class="form-control {{ $errors->has('address.email') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('address.email',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="email" placeholder="{{__('Email')}}">
                                        @error('address.email') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="instruction" class="form-label required fw-light fs-7 mb-1">{{__('Instruction')}}</label>
                                        <input type="text" wire:model.lazy="address.instruction" class="form-control {{ $errors->has('address.instruction') ? 'is-invalid' : '' }} {{ $validated && array_key_exists('address.instruction',$validated) ? 'is-valid' : '' }}  fw-lighter fs-8" id="instruction" placeholder="{{__('Instruction')}}">
                                        @error('address.instruction') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label  class="form-label fw-light mb-0 mt-1 fs-7">{{ __('Shipping Type') }}</label>
                                        <select wire:model.lazy="address.type" class="form-control fw-lighter fs-8 {{ $errors->has('address.type') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('address.type',$validated) ? 'is-valid' : '' }}" id="type" aria-label="Default select example"  >
                                            <option value="">{{ __('Select Shipping Type') }}</option>
                                            <option value="from">{{ __('From Shipping') }}</option>
                                            <option value="to">{{ __('To Shipping') }}</option>
                                        </select>
                                        @error('address.type') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label  class="form-label fw-light mb-0 mt-1 fs-7">{{ __('Service Type') }}</label>
                                        <select wire:model.lazy="address.service_type" class="form-control fw-lighter fs-8 {{ $errors->has('address.service_type') ? 'is-invalid' : '' }} {{ isset($validated) && array_key_exists('address.service_type',$validated) ? 'is-valid' : '' }}" id="service_type" aria-label="Default select example"  >
                                            <option value="">{{ __('Select Shipping Service') }}</option>
                                            <option value="parcel">{{ __('Parcel') }}</option>
                                            <option value="envelop">{{ __('Envelop') }}</option>
                                        </select>
                                        @error('address.service_type') <span class="error">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <button class="btn btn-pink w-100" id="Test">{{ __('Edit') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @section('footer-content')
        <script>
            window.onload = function() {
                var swiper = new Swiper(".mySwiper", {
                    spaceBetween: 30,
                    // slidesPerView: 7,
                    breakpoints: {
                        // when window width is <= 499px
                        200: {
                            slidesPerView: 2,
                            spaceBetweenSlides: 0
                        },
                        // when window width is <= 499px
                        499: {
                            slidesPerView: 2,
                            spaceBetweenSlides: 0
                        },
                        // when window width is <= 999px
                        999: {
                            slidesPerView: 7,
                            spaceBetweenSlides: 40
                        }
                    }
                });
            }

            $(document).ready(function() {
                $(document).on('keyup','.is-invalid',function (){
                    $(this).removeClass('is-invalid')
                    $(this).addClass('is-valid')
                    $(this).closest('div').find('span').remove()
                });
            });
        </script>
    @endsection
</div>
