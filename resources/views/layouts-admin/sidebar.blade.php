<aside class="bg-colorNav  text-white w-64 h-screen fixed top-0 border-r left-0 flex flex-col border-colarNavRed ">
    <!-- Sidebar header -->
    <div class="flex items-center justify-right h-16 border-b border-colarNavRed">
    <img class="h-8 w-8" src="image/logo.png" alt="Your Company">
    </div>
    
    <!-- Sidebar content -->
    <div class="flex-1 overflow-y-auto">
        <!-- Sidebar items -->
        <ul class="py-4">
            <li class="px-6 py-2 hover:bg-gray-700">
                <a href="#" class="block">Dashboard</a>
            </li>
            <li class="px-6 py-2 hover:bg-gray-700">
                <a href="#" class="block">Messages</a>
            </li>
            <li class="px-6 py-2 hover:bg-gray-700">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a href="route('logout')" class="text-sm font-semibold leading-6 text-danger-600 hover:text-danger-700"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    Logout <span aria-hiddsss="true">&rarr;</span>
                </a>
            </form>
            </li>
        </ul>
    </div>
    
    <!-- Sidebar footer -->
    <div class="py-4">
        <div class=" text-center text-xs text-gray-500 text-opacity-30 font-semibold py-1">
            Project Created by Espinosa & Jimenea
        </div>
    </div>
</aside>
