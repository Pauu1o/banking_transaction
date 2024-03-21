@extends('auth.layouts.app')

@section('webtitle')
Register
@endsection

@section('content')
<!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com --> 
  <section class="h-screen">
  <div class="h-full">
 

      <!-- Center column container -->
    <div class="flex justify-center items-center h-screen">
    <div class="w-3/12">
      @if ($errors->any())
        @foreach ($errors->all() as $error)
          <div
              class="mb-3 inline-flex w-full items-center rounded-lg bg-danger-100 px-6 py-1 text-base text-danger-700 transition-opacity ease-in duration-700 opacity-100"
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
          @endforeach
        @endif
        @if (session('message'))
          <div
            class="mb-3 inline-flex w-full items-center rounded-lg bg-success-100 px-6 py-5 text-base text-success-700"
            role="alert">
            <span class="mr-2">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="currentColor"
                class="h-5 w-5">
                <path
                  fill-rule="evenodd"
                  d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z"
                  clip-rule="evenodd" />
              </svg>
            </span>
            {{ session('message') }}
          </div>
        @endif
        <form  method="POST" action="{{ route('register.account') }}">
          @csrf <!-- {{ csrf_field() }} -->
          <!--Sign in section-->
          <div
          class="flex flex-row py-4 justify-center text-xl font-bold items-center text-danger">
            <p class="mb-0 mr-4 text-lg">REGISTRATION</p>
          </div>

          <!-- Separator between social media sign in and email/password sign in -->
          


          <!-- First Name -->
          <div class="relative mb-6">
              <input
              type="text"
              class="peer block min-h-[auto] w-full rounded-[1rem] border-0 bg-white px-3 py-[0.32rem] leading-[2.15] outline-1 transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
              id="first_name"
              name="first_name"
              placeholder="first_name" />
            <label
              for="first_name"
              class="pointer-events-none rounded-[1rem] absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:hidden"
              >First Name
            </label>
            <style>
              #first_name:not(:placeholder-shown) + label {
                display: none;
                }
            </style>
          </div>
        
          <!-- Last Name -->
          <div class="relative mb-6">
              <input
              type="text"
              class="peer block min-h-[auto] w-full rounded-[1rem] border-0 bg-white px-3 py-[0.32rem] leading-[2.15] outline-1 transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
              id="last_name"
              name="last_name"
              placeholder="last_name" />
            <label
              for="last_name"
              class="pointer-events-none rounded-[1rem] absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:hidden"
              >Last Name
            </label>
            <style>
              #last_name:not(:placeholder-shown) + label {
                display: none;
                }
            </style>
          </div>

          <!-- Email input -->
          <div class="relative mb-6">
            <input
              type="text"
              class="peer block min-h-[auto] w-full rounded-[1rem] border-0 bg-white px-3 py-[0.32rem] leading-[2.15] outline-1 transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
              id="email"
              name="email"
              placeholder="Email address" />
            <label
              for="email"
              class="pointer-events-none rounded-[1rem] absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:hidden"
              >Email address
            </label>
            <style>
              #email:not(:placeholder-shown) + label {
                display: none;
                }
            </style>
          </div>

          <!-- Password input -->
          <div class="relative mb-6">
               <input
              type="password"
              class="peer block min-h-[auto] w-full rounded-[1rem] border-0 bg-white px-3 py-[0.32rem] leading-[2.15] outline-1 transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
              id="password"
              name="password"
              placeholder="password" />
            <label
              for="password"
              class="pointer-events-none rounded-[1rem] absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:hidden"
              >Password
            </label>
            <style>
              #password:not(:placeholder-shown) + label {
                display: none;
                }
            </style>
          </div>

          <!-- Confirmation Password input -->
          <div class="relative mb-6">
               <input
              type="password"
              class="peer block min-h-[auto] w-full rounded-[1rem] border-0 bg-white px-3 py-[0.32rem] leading-[2.15] outline-1 transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
              id="password_confirmation"
              name="password_confirmation"
              placeholder="password" />
            <label
              for="password"
              class="pointer-events-none rounded-[1rem] absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:hidden"
              >Confirm Password
            </label>
            <style>
              #password_confirmation:not(:placeholder-shown) + label {
                display: none;
                }
            </style>
          </div>
          
          <!-- Login button -->
          <div class="text-center lg:text-left">
            <button
              type="submit"
              class="inline-block rounded-full bg-danger-600 px-10 pb-2 pt-2 text-md font-bold uppercase leading-normal text-white transition duration-150 ease-in-out focus:bg-danger-700 hover:text-white hover:bg-danger-700 focus:outline-1 focus:ring-0 active:bg-gray-200">
              Register
            </button>

            <!-- Register link -->
            <p class="mb-0 mt-2 pt-1 text-sm font-semibold">
              Already have an account?
              <a
                href="{{route('login')}}"
                class="text-danger transition duration-150 ease-in-out hover:text-danger-600 focus:text-danger-600 active:text-danger-700"
                >login now</a
              >
            </p>
          </div>
        </form>
      </div>
      </div>
    </div>
  </div>
</section>
@endsection
