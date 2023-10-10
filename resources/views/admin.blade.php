<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Super Admin Dashboard') }}
        </h2>
    </x-slot>


    @role('superAdmin')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- Create Admin form --}}
                <div class="p-6 text-gray-900">
                    <p class="text-2xl font-black text-center">Admin</p>
                    <form method="POST" action="{{ route('admin.store') }}">
                        @csrf
                        @method('post')
                        <!-- domain Address -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input placeholder="Enter name..." id="name" class="block mt-1 w-full" type="text"
                                name="name" :value="old('name')" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('Gmail')" />
                            <x-text-input placeholder="Enter gmail..." id="email" class="block mt-1 w-full" type="text"
                                name="email" :value="old('email')" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input placeholder="Enter Password" id="password" class="block mt-1 w-full"
                                type="password" name="password" :value="old('password')" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="tenant" :value="__('Select Domain')" />
                            <select class="w-full rounded-md" name="tenant" id="tenant">
                                @foreach($tenant as $tnt)
                                <option value={{$tnt->tenant_id}}>{{$tnt->domain}}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-3">
                                {{ __('Create Admin') }}
                            </x-primary-button>
                        </div>
                    </form>

                    @if (session()->has('msg'))
                    <div class="alert alert-success">
                        <b> {{ session()->get('msg') }}</b>
                    </div>
                    @endif

                </div>

                {{-- Show Domain Table --}}
                <div class="p-6 text-gray-900">
                    <table class="border-collapse table-fixed w-full text-sm">
                        <thead>
                            <tr>
                                <th class="border-b font-bold border-slate-600 p-4 pl-8 pt-0 pb-3  text-left">
                                    Name
                                </th>
                                <th class="border-b font-bold border-slate-600 p-4 pt-0 pb-3  text-left">
                                    Email
                                </th>
                                <th class="border-b font-bold border-slate-600 p-4 pt-0 pb-3  text-left">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white text-black ">
                            <tr>
                                <td class="border-b border-slate-500  p-4 pl-8 text-black">demo</td>
                                <td class="border-b border-slate-500  p-4 pl-8 text-black">demo@gmail.com</td>
                                <td class="border-b border-slate-500  p-4 text-black">
                                    <form action="{{route('admin.store')}}}" method="POST">
                                        @csrf
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endrole
</x-app-layout>
