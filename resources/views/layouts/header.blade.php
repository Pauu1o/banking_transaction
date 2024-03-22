<div class="min-h-full">
  <nav class="bg-colorNav border-b border-colarNavRed">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="flex-shrink-0">
            <img class="h-8 w-8" src="image/logo.png" alt="Your Company">
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
       
            </div>

          </div>

        </div>
          <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a href="route('logout')" class="text-sm font-semibold leading-6 text-danger-600 hover:text-danger-700"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    Logout <span aria-hiddsss="true">&rarr;</span>
                </a>
            </form>
          </div>
    </div>


  </nav>
