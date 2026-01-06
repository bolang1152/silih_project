<x-app-layout>
    <x-slot name="header">
        <h2 style="color: #b91c1c;" class="font-semibold text-xl leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div style="background-color: #fee2e2;" class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div style="background-color: #fecaca; border: 1px solid #f87171;" class="overflow-hidden shadow-sm sm:rounded-lg">
                <div style="color: #7f1d1d;" class="p-6 font-semibold">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
