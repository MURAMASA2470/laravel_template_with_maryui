<?php

use Livewire\Volt\Component;

new class extends Component {

    public array $pieChart = [
        'type' => 'pie',
        'data' => [
            'labels' => ['Mary', 'Joe', 'Ana'],
            'datasets' => [
                [
                    'label' => '# of Votes',
                    'data' => [12, 19, 3],
                ]
            ]
        ],
            'options' => [
                    'responsive' => true,
                    'aspectRatio' => 2,

                    'plugins' => [
                            'legend' => [
                                    'position' => 'left',
                            ],
                            'title' => [
                                    'display' => false,
                            ]
                    ]
            ]
    ];

    public array $lineChart = [
        'type' => 'line',
        'data' => [
            'labels' => ['1月', '2月', '3月', '4月', '5月', '6月', '7月'],
            'datasets' => [
                [
                    'label' => '# of Sales',
                    'data' => [22, 32, 45, 24, 31, 28, 23],
                ]
            ]
        ]
    ];

    public function mount()
    {

    }

}; ?>

<div>
    <x-mary-header title="ダッシュボード" separator progress-indicator size="text-xl md:text-2xl lg:text-3xl">
        <x-slot:actions></x-slot:actions>
    </x-mary-header>

    <div>
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-6 xl:col-span-3">
                <x-mary-stat title="Messages" value="44" icon="o-envelope" />
            </div>

            <div class="col-span-6 xl:col-span-3">
                <x-mary-stat title="Sales" value="22.124" icon="o-arrow-trending-up" />
            </div>

            <div class="col-span-6 xl:col-span-3">
                <x-mary-stat title="Lost" value="34" icon="o-arrow-trending-down" />
            </div>

            <div class="col-span-6 xl:col-span-3">
                <x-mary-stat title="Sales" value="22.124" icon="o-arrow-trending-down"
                        class="text-orange-500"
                        color="text-pink-500" />
            </div>
        </div>

        <div class="grid grid-cols-12 gap-6 mt-6">
            <div class="col-span-12 xl:col-span-7">
                <x-mary-card title='パネル' separator shadow class="h-full">
                    <x-mary-chart wire:model="lineChart" class="w-full" />
                </x-mary-card>
            </div>

            <div class="col-span-12 xl:col-span-5">
                <x-mary-card title='チャート' separator shadow class="h-full">
                    <x-mary-chart wire:model="pieChart" class="w-full" />
                </x-mary-card>
            </div>
        </div>

    </div>

    @php
        $headers = [
            ['key' => 'id', 'label' => '#', 'class' => 'w-16'],
            ['key' => 'name', 'label' => 'Name', 'class' => 'w-72'],
            ['key' => 'sales', 'label' => 'Sales'],
            ['key' => 'city', 'label' => 'City'],
        ];

        $users = collect([
            (object) ['id' => 1, 'name' => 'Bob', 'sales' => Number::currency(9486346), 'city' => 'Tokyo'],
            (object) ['id' => 2, 'name' => 'Alice', 'sales' => Number::currency(7532743), 'city' => 'Tokyo'],
            (object) ['id' => 3, 'name' => 'Mike', 'sales' => Number::currency(4324324), 'city' => 'Nagoya'],
            (object) ['id' => 4, 'name' => 'Mary', 'sales' => Number::currency(2434234), 'city' => 'Yokohama'],
            (object) ['id' => 5, 'name' => 'Ana', 'sales' => Number::currency(12462), 'city' => 'Kyoto'],
        ]);
    @endphp

    <x-mary-table :headers="$headers" :rows="$users" class="bg-base-100 mt-6">
        @scope('cell_city', $user)
            <x-mary-badge :value="$user->city" class="badge-primary" />
        @endscope
    </x-mary-table>


</div>
