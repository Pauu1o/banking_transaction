@extends('auth.layouts.app')
@section('webtitle')
Login
@endsection
@section('content')
<!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com --> 

  <section class="h-screen">
  <div class="h-full">

@include('navbar')
      
      <!-- centers entire field -->
     <div class="flex flex-col justify-center items-center h-screen">
        <div class="w-3/12">

    <!-- Catch Errors -->
      @if ($errors->any())
        @foreach ($errors->all() as $error)
        <div class="w-full">
          <div
              class="mb-3 inline-flex w-full items-center rounded-[1rem] bg-danger-100 px-6 py-1 text-base text-danger-700 transition-opacity ease-in duration-700 opacity-100"
              role="alert">
              <span class="mr-2">
                  <svg
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 24 24"
                  fill="currentColor"
                  class="h-5 w-5">
                  <path
                      fill-rule="evenodd"
                      d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z"
                      clip-rule="evenodd" />
                  </svg>
              </span>
              {{ $error }}
          </div>
      </div>
          @endforeach
        @endif
        <form  method="POST" action="{{ route('login') }}">
          @csrf <!-- {{ csrf_field() }} -->


          <!-- LOGO SECTION -->
          <div id="logo" class="flex flex-row justify-center text-center text-xl font-bold items-center py-4 text-danger">BANKING TRANSACTION</div>
          <!--Sign in section-->
          <div class="flex flex-row px-5 py-2 justify-start ">
            <p class="text-center mb-auto  text-sm text-white">Sign in with</p>

            </button>
          </div>


          <!-- Email input -->
          <div class="relative mb-5">
          <input
              type="text"
              class="peer block min-h-[auto] w-full rounded-[1rem] border-0 bg-white px-3 py-[0.32rem] leading-[2.15] outline-1 transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
              id="email"
              name="email"
              placeholder="Email address" />
            <label
              for="email"
              class= "pointer-events-none rounded-[1rem] absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:hidden"
              >Email address
            </label>
            <!-- Hides placeholder when text has input -->
            <style>
              #email:not(:placeholder-shown) + label {
                display: none;
                }
            </style>
          </div>

          <!-- Password input -->
          <div class="relative mb-5" >
            <input
              type="password"
              class="peer block min-h-[auto] w-full rounded-[1rem] border-0 bg-white px-3 py-[0.32rem]  leading-[2.15] outline-1 transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
              id="password"
              name="password"
              placeholder="Password" />
            <label
              for="password"
              class="pointer-events-none rounded-[1rem] absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:hidden"
              >Password
            </label>
            <!-- Hides placeholder when text has input -->
            <style>
              #password:not(:placeholder-shown) + label {
                display: none;
                }
            </style>
          </div>

          <div class="mb-6 flex items-center justify-between">
            <!-- Remember me checkbox -->
            <div class=" block min-h-[1.5rem] pl-[1.5rem]">
              <input
                class="relative float-left -ml-[1.5rem] mr-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-white checked:bg-white checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent dark:border-neutral-600 dark:checked:border-danger dark:checked:bg-danger dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                type="checkbox"
                value=""
                id="checkbox" />
              <label
                class="inline-block pl-[0.15rem] hover:cursor-pointer text-white "
                for="checkbox">
                Remember me
              </label>
            </div>

            <!--Forgot password link-->
            <a href="#!" class="text-white hover:text-danger px-2">Forgot password?</a>
          </div>

          <!-- Login button -->
          <div class="text-center lg:text-left">
            <button
              type="submit"
              class="inline-block rounded-[1rem] bg-danger-600 px-10 pb-2 pt-2 text-md font-bold uppercase leading-normal text-white transition duration-150 ease-in-out focus:bg-danger-700 hover:text-white hover:bg-danger-700 focus:outline-none focus:ring-0 active:bg-gray-200">
              Login
            </button>

            <!-- Register link -->
            <p class="mb-0 mt-2 pt-1 text-sm font-semibold">
              Don't have an account?
              <a
                href="{{route('register.account')}}"
                class="text-danger transition duration-150 ease-in-out hover:text-danger-600 focus:text-danger-600 active:text-danger-700"
                >Register</a
              >
            </p>
          </div>
        </form>
      </div>
    </div>
  </div>

</section>
@endsection
