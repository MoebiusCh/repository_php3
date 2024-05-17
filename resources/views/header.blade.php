<header class="bg-black">
    <nav class="mx-52 flex justify-between py-4 text-slate-400">
        <div class="left flex place-items-center content-center space-x-10">
            <div class="hover:text-slate-50">
                <a href="/">Logo</a>
            </div>
            <div class="hover:text-slate-50">
                <a href="/">Trang chủ</a>
            </div>
            <div class="hover:text-slate-50">
                <a href="">Khám phá</a>
            </div>
            <div class="hover:text-slate-50">
                <a href="{{ route('tintuc') }}">Tin tức</a>
            </div>
            <div class="hover:text-slate-50">
                <a href="">Phản hồi</a>
            </div>
        </div>
        <div class="content-centerright flex place-items-center space-x-2">
            <form class="mx-auto w-96 max-w-md">
                <label for="default-search" class="sr-only mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Search
                </label>
                <div class="relative">
                    <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                        <svg
                            class="h-4 w-4 text-gray-500 dark:text-gray-400"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 20 20"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"
                            />
                        </svg>
                    </div>
                    <input
                        type="search"
                        id="default-search"
                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-4 ps-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                        placeholder="Tìm kiếm..."
                        required
                    />
                    <button
                        type="submit"
                        class="absolute bottom-2.5 end-2.5 rounded-lg bg-blue-700 px-4 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    >
                        Tìm
                    </button>
                </div>
            </form>
            <div class="flex space-x-2 rounded-lg bg-[#2a2a2a] p-2">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="h-6 w-6 cursor-pointer fill-white"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"
                    />
                </svg>
                <div class="hover:text-slate-50">
                    <a href="{{ route('user.login') }}">Đăng Nhập</a>
                </div>
            </div>
        </div>
    </nav>
</header>
