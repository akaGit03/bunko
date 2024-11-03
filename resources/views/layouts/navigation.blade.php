<!-- ナビゲーションリンクのCSS等の管理: resources/views/components/nav-link.blade.php -->

<nav x-data="{ open: false }" class="bg-white border-pink-300 border-b-2">
    <!-- ナビゲーションメニュー -->
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between py-4">
            <div class="flex px-6">
                <!-- ロゴ -->
                <!--
                <div class="flex shrink-0 items-center">
                    <a href="{{ route("dashboard") }}">
                        <x-application-logo
                            class="text-gray-800 block h-9 w-auto fill-current" />
                    </a>
                </div>
                -->

                <div class="hidden space-x-8 sm:-my-px sm:flex whitespace-nowrap">
                    <x-nav-link
                        :href="route('books.index')"
                        :active="request()->routeIs('dashboard')">
                        {{ __("本棚検索") }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex whitespace-nowrap">
                    <x-nav-link
                        :href="route('home.borrows')"
                        :active="request()->routeIs('dashboard')">
                        {{ __("借出表") }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex whitespace-nowrap">
                    <x-nav-link
                        :href="route('home.lends')"
                        :active="request()->routeIs('dashboard')">
                        {{ __("貸出表") }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex whitespace-nowrap">
                    <x-nav-link
                        :href="route('home.index')"
                        :active="request()->routeIs('dashboard')">
                        {{ __("蔵書表") }}
                    </x-nav-link>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex whitespace-nowrap">
                    <x-nav-link
                        :href="route('books.create')"
                        :active="request()->routeIs('dashboard')">
                        {{ __("本の登録") }}
                    </x-nav-link>
                </div>
            </div>

            <!-- アカウント管理 -->
            <div class="hidden sm:ms-6 sm:flex sm:items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="text-gray-500 hover:text-gray-600 hover:bg-custom-yellow focus:bg-custom-yellow focus:text-gray-600 inline-flex items-center justify-center rounded-full p-3 transition duration-150 ease-in-out focus:outline-none">
                            <div class="flex items-center">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="30"
                                height="30"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round">
                                <path
                                    d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg> 
                            <!-- 
                                {{ Auth::user()->name }}</div>
                            -->
                            <!--
                            <div class="ms-1">
                                <svg
                                    class="h-4 w-4 fill-current"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            -->
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- デモンストレーションにつき処理を解除：本来 → :href="route('profile.edit')"-->
                        <x-dropdown-link
                            onclick="alert('デモストレーションのため、現在この機能は利用できません。')">
                            {{ __("Profile") }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __("Log Out") }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- ハンバーガーメニュー -->
            <div class="flex items-center sm:hidden">
                <button
                    @click="open = ! open"
                    class="text-gray-500 hover:text-gray-600 hover:bg-custom-yellow focus:bg-custom-yellow focus:text-gray-600 inline-flex items-center justify-center rounded-full p-3 transition duration-150 ease-in-out focus:outline-none">
                    <svg
                        class="h-6 w-6"
                        stroke="currentColor"
                        fill="none"
                        viewBox="0 0 24 24">
                        <path
                            :class="{'hidden': open, 'inline-flex': ! open }"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path
                            :class="{'hidden': ! open, 'inline-flex': open }"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <!--  デフォルト使用：不要だが念のためコメントアウト
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" >
                {{ __("Dashboard") }}
            </x-responsive-nav-link>
        </div>
        -->

        <!-- Responsive Settings Options -->
        <div class="border-pink-300 border-t-2">
            <div class="flex justify-end">
                <div class="py-4 pr-4">
                    <!-- ユーザー情報 -->
                    <div class="pl-4">
                        <div class="text-teal-500 text-base font-medium">
                            {{ Auth::user()->name }} さん
                        </div>
                        <!--
                        <div class="text-teal-500 text-sm font-medium">
                            {{ Auth::user()->email }}
                        </div>
                        -->
                    </div>

                    <!-- ナビゲーション -->
                    <div class="mt-3 space-y-1">
                        <x-responsive-nav-link :href="route('books.index')">
                            {{ __("本棚検索") }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('home.borrows')">
                            {{ __("借出表") }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('home.lends')">
                            {{ __("貸出表") }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('home.index')">
                            {{ __("蔵書表") }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('books.create')">
                            {{ __("本の登録") }}
                        </x-responsive-nav-link>

                        <!-- アカウント管理 -->
                        <!-- デモンストレーションにつき処理を解除：本来 → :href="route('profile.edit')"-->
                        <x-responsive-nav-link
                            onclick="alert('デモストレーションのため、現在この機能は利用できません。')"
                            class="text-sm">
                            {{ __("Profile") }}
                        </x-responsive-nav-link>

                        <!-- ログアウト -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-responsive-nav-link
                                :href="route('logout')"
                                class="text-sm"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __("Log Out") }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
