<x-app-layout>
    <div class="relative flex items-top justify-center min-h-screen sm:items-center sm:pt-0">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col items-center pt-8 sm:justify-start sm:pt-0">
                <div class="h1" style="font-size: 10rem;">
                    @yield('code')
                </div>
                <div class="h4" style="font-size: 5rem;">
                    @yield('message')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
