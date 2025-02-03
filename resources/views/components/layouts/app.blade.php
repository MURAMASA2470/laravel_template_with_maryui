<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title . ' - ' . config('app.name') : config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href=" {{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }} ">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('android-chrome-192x192.png') }} ">
    <link rel="icon" type="image/png" sizes="512x512" href="{{ asset('android-chrome-512x512.png') }} ">

    <link rel="manifest" href="{{ asset('site.webmanifest') }}">

    {{-- Chart.js  --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
</head>

<x-mary-theme-toggle class="hidden" darkTheme="dark" lightTheme="light" />
<body class="min-h-screen font-sans antialiased bg-base-200/50 dark:bg-base-200 xl:px-52 lg:px-24 md:px-0">

    {{-- NAVBAR mobile only --}}
    <x-mary-nav sticky class="lg:hidden">
        <x-slot:brand>
            <x-app-brand />
        </x-slot:brand>
        <x-slot:actions>
            <label for="main-drawer" class="lg:hidden me-3">
                <x-mary-icon name="o-bars-3" class="cursor-pointer" />
            </label>
        </x-slot:actions>
    </x-mary-nav>

    {{-- MAIN --}}
    <x-mary-main full-width>
        {{-- SIDEBAR --}}
        <x-slot:sidebar drawer="main-drawer" collapsible class="bg-base-100 lg:bg-inherit">

            {{-- BRAND --}}
            <x-app-brand class="p-5 pt-3" />

            {{-- MENU --}}
            <x-mary-menu activate-by-route>

                {{-- User --}}
                {{-- @if($user = auth()->user()) --}}
                <x-mary-menu-separator />
<?php
$user = [
    'user_name' => 'テストユーザー',
    'user_cd' => 'test@example.co.jp'
    ];
?>
                <x-mary-list-item :item="$user" value="user_name" sub-value="user_cd" no-separator no-hover
                              class="!-my-2 -mx-2 rounded" x-show="!collapsed">
                    <x-slot:avatar>
                        <x-mary-icon name="o-user" class="h-9 w-9 rounded-full bg-gray-500 p-2 text-white" />
                    </x-slot:avatar>
                    <x-slot:actions>

                        <x-mary-dropdown icon="o-cog-6-tooth" class="btn-circle btn-ghost btn-sm" x-cloak>

                            <x-mary-menu-item title="パスワード設定" icon="o-key"
                                            link="#" />

                            <x-mary-menu-item title="メールアドレス変更" icon="o-envelope"
                                            link="#" />

                            <x-mary-menu-item title="テーマ切り替え" icon="o-swatch"
                                            @click="$dispatch('mary-toggle-theme')" />

                            <x-mary-menu-item title="ログアウト" icon="o-power" tooltip-left="logoff" no-wire-navigate
                                            link="/logout" />

                        </x-mary-dropdown>
                    </x-slot:actions>

                </x-mary-list-item>

                <x-mary-menu-separator />
                {{-- @endif --}}

                <x-mary-menu-item title="ダッシュボード" icon="o-presentation-chart-line" link="/" />
                <x-mary-menu-item title="一覧" icon="o-clipboard-document-list" link="#" />
                <x-mary-menu-item title="設定" icon="o-cog-6-tooth" link="#" />
                <x-mary-menu-sub title="その他" icon="o-command-line">
                    <x-mary-menu-item title="その他１" icon="o-wifi" link="#" />
                    <x-mary-menu-item title="その他２" icon="o-archive-box" link="#" />
                    <x-mary-menu-item title="その他３" icon="o-rocket-launch" link="#" />
                </x-mary-menu-sub>
            </x-mary-menu>
        </x-slot:sidebar>

        {{-- The `$slot` goes here --}}
        <x-slot:content>
            {{ $slot }}
        </x-slot:content>
    </x-mary-main>

    {{--  TOAST area --}}
    <x-mary-toast />
@stack('scripts')
</body>

</html>
