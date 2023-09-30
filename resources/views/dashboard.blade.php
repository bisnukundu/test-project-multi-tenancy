<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('domain.store') }}">
                        @csrf

                        <!-- domain Address -->
                        <div>
                            <x-input-label for="domain" :value="__('Domain')"/>
                            <x-text-input placeholder="abc.domain.com" id="domain" class="block mt-1 w-full" type="text"
                                          name="domain"
                                          :value="old('domain')"
                            />
                            <x-input-error :messages="$errors->get('domain')" class="mt-2"/>
                        </div>


                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-3">
                                {{ __('Create Domain') }}
                            </x-primary-button>
                        </div>
                    </form>

                    @if (session()->has('msg'))
                        <div class="alert alert-success">
                           <b> {{ session()->get('msg') }}</b>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
