<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button type="button" class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex flex-shrink-0 items-center">
                    <img class="block h-8 w-auto lg:hidden" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
                    <img class="hidden h-8 w-auto lg:block" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
                </div>
                <div class="flex flex-shrink-0 items-center text-white ">
                    <p>Ganga Severa</p>
                </div>
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <a href="{{  route('gangas.index') }}" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Inici</a>
                        <a href="{{  route('gangas.new') }}" class="bg-gray-300 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Nous</a>
                        <a href="{{  route('gangas.best') }}" class="bg-gray-300 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Destacats</a>


                        @auth
                        <a href="{{  route('gangas.create') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Crear ganga</a>
                        <a href="{{  route('gangas.me') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Les meues ganges</a>
                        @endauth
                    </div>
                </div>
            </div>
            <div style="float: right;color: white">
                @if(auth()->check())
                <a class="text-white pl-8 pt-2" href="{{ route('gangas.logout') }}">Logout</a>
                @else
                <a class="text-white pl-8 pt-2 login" href="{{ route('login') }}">Login</a>
                <a class="text-white pl-8 pt-2 register " href="{{ route('register') }}">Register</a>
                @endif
            </div>
        </div>
    </div>
</nav>
<style>
    .login {
        margin-right: 20px;
    }
</style>