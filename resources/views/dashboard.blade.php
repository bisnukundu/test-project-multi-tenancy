<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
{{--Domains --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{--                Create Domain form --}}
                <div class="p-6 text-gray-900">
                <p class="text-2xl font-black text-center">Domain</p>
                    <form method="POST" action="{{ route('domain.store') }}">
                        @csrf

                        <!-- domain Address -->
                        <div>
                            <x-input-label for="domain" :value="__('Domain')"/>
                            <div class="flex items-center">
                                <x-text-input placeholder="abc" id="domain" class="block mt-1 w-full"
                                              type="text"
                                              name="domain"
                                              :value="old('domain')"
                                />
                                <div><p>.{{config("tenancy.central_domains")[1]}}</p></div>
                            </div>
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

                {{--                Show Domain Table --}}
                <div class="p-6 text-gray-900">
                    <table class="border-collapse table-fixed w-full text-sm">
                        <thead>
                        <tr>
                            <th class="border-b font-bold border-slate-600 p-4 pl-8 pt-0 pb-3  text-left">
                                Domain
                            </th>
                            <th class="border-b font-bold border-slate-600 p-4 pt-0 pb-3  text-left">
                                Action
                            </th>

                        </tr>
                        </thead>
                        <tbody class="bg-white text-black ">
                        @foreach($domains as $domain)
                            <tr>
                                <td class="border-b border-slate-500  p-4 pl-8 text-black">{{$domain->domain}}</td>
                                <td class="border-b border-slate-500  p-4 text-black">
                                    <form action="{{route('domain.destroy',$domain->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

{{--    Admins --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{--                Create Domain form --}}
                <div class="p-6 text-gray-900">
                <p class="text-2xl font-black text-center">Admin</p>
                    <form method="POST" action="{{ route('domain.store') }}">
                        @csrf

                        <!-- domain Address -->
                        <div>
                            <x-input-label for="domain" :value="__('Name')"/>
                            <div class="flex items-center">
                                <x-text-input placeholder="abc" id="domain" class="block mt-1 w-full"
                                              type="text"
                                              name="domain"
                                              :value="old('domain')"
                                />
                                <div><p>.{{config("tenancy.central_domains")[1]}}</p></div>
                            </div>
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

                {{--                Show Domain Table --}}
                <div class="p-6 text-gray-900">
                    <table class="border-collapse table-fixed w-full text-sm">
                        <thead>
                        <tr>
                            <th class="border-b font-bold border-slate-600 p-4 pl-8 pt-0 pb-3  text-left">
                                Domain
                            </th>
                            <th class="border-b font-bold border-slate-600 p-4 pt-0 pb-3  text-left">
                                Action
                            </th>

                        </tr>
                        </thead>
                        <tbody class="bg-white text-black ">
                        @foreach($domains as $domain)
                            <tr>
                                <td class="border-b border-slate-500  p-4 pl-8 text-black">{{$domain->domain}}</td>
                                <td class="border-b border-slate-500  p-4 text-black">
                                    <form action="{{route('domain.destroy',$domain->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
