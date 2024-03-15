@extends('layouts.app')

@section('content')


<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">         
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">

                    <!-- Input transaction -->
                    <div class="flex justify-between">
                       
                        <div  
                        class="block max-w-md rounded-[1rem] p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] bg-white/30 backdrop-blur">
                         
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
                        
                        <form method="POST" action="{{ route('phonebook.store') }}">
                        @csrf <!-- {{ csrf_field() }} -->

                        <div class="grid grid-cols-2 gap-6">
                                
                            <!--Sender First name input-->
                            <div class="relative mb-6">
                                <input
                                type="text"
                                class="peer block min-h-[auto] w-full rounded-[1rem] border-0 bg-white px-3 py-[0.32rem]  leading-[2.15] outline-1 transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                id="sender_firstname"
                                name="sender_firstname"
                                aria-describedby="sender_firstname"
                                placeholder="Sender First Name"  />
                                <label
                                for="sender_firstname"
                                class="pointer-events-none rounded-[1rem] absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:hidden"
                                >Sender First Name
                                </label>
                                <style>
                                    #firstname:not(:placeholder-shown) + label {
                                        display: none;
                                        }
                                </style>
                                
                            </div>

                            
                            <div class="relative mb-6">
                                <input
                                type="text"
                                class="peer block min-h-[auto] w-full rounded-[1rem] border-0 bg-white px-3 py-[0.32rem]  leading-[2.15] outline-1 transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                id="sender_lastname"
                                name="sender_lastname"
                                aria-describedby="sender_lastname"
                                placeholder="Sender Last Name" />
                                <label
                                for="sender_lastname"
                                class="pointer-events-none rounded-[1rem] absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:hidden"
                                >Sender Last Name
                                </label>
                                <style>
                                    #lastname:not(:placeholder-shown) + label {
                                        display: none;
                                        }
                                </style>
                            </div>
                        </div>
                        
                        <!-- Receiver Name Portion -->
                        <div class="grid grid-cols-2 gap-6">
                                
                            <!--Receiver First name input-->
                            <div class="relative mb-6">
                                <input
                                type="text"
                                class="peer block min-h-[auto] w-full rounded-[1rem] border-0 bg-white px-3 py-[0.32rem]  leading-[2.15] outline-1 transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                id="receiver_firstname"
                                name="receiver_firstname"
                                aria-describedby="receiver_firstname"
                                placeholder="Receiver First Name"  />
                                <label
                                for="receiver_firstname"
                                class="pointer-events-none rounded-[1rem] absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:hidden"
                                >Receiver First Name
                                </label>
                                <style>
                                    #firstname:not(:placeholder-shown) + label {
                                        display: none;
                                        }
                                </style>
                                
                            </div>

                            
                            <div class="relative mb-6">
                                <input
                                type="text"
                                class="peer block min-h-[auto] w-full rounded-[1rem] border-0 bg-white px-3 py-[0.32rem]  leading-[2.15] outline-1 transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                id="receiver_lastname"
                                name="receiver_lastname"
                                aria-describedby="receiver_lastname"
                                placeholder="Receiver Last Name" />
                                <label
                                for="receiver_lastname"
                                class="pointer-events-none rounded-[1rem] absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:hidden"
                                >Receiver Last Name
                                </label>
                                <style>
                                    #lastname:not(:placeholder-shown) + label {
                                        display: none;
                                        }
                                </style>
                            </div>
                        </div>
                            
                                    
                            <!-- Amount Number in PhP -->
                            <div class="relative mb-6" >
                            <input
                                type="text"
                                class="peer block min-h-[auto] w-full rounded-[1rem] border-0 bg-white px-3 py-[0.32rem]  leading-[2.15] outline-1 transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                id="amount"
                                name="amount"
                                placeholder="amount" />
                            <label
                                for="amount"
                                class="pointer-events-none rounded-[1rem] absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[2.15] text-neutral-500 transition-all duration-200 ease-out peer-focus:hidden"
                                >Amount
                            </label>
                            <style>
                                    #phonenumber:not(:placeholder-shown) + label {
                                        display: none;
                                        }
                                </style>
                            </div>
                            
                            <!-- Drop Down for Transaction Status -->
                            <div class="relative mb-6">
                                <select
                                    id="transaction_status"
                                    name="transaction_status"
                                    class="peer block min-h-[auto] w-full rounded-[1rem] border-0 bg-white px-3 py-[0.32rem] leading-[2.15] outline-1 transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                >
                                    <option value="Pending">Pending</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Failed">Failed</option>
                                    
                                </select>

                            <style>
                                    #phonenumber:not(:placeholder-shown) + label {
                                        display: none;
                                        }
                                </style>

                                
                            </div>
                            
                            <!-- Drop Down for Transaction Type -->
                            <div class="relative mb-6">
                                <select
                                    id="transaction_type"
                                    name="transaction_type"
                                    class="peer block min-h-[auto] w-full rounded-[1rem] border-0 bg-white px-3 py-[0.32rem] leading-[2.15] outline-1 transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                >
                                    <option value="Local">Local</option>
                                    <option value="International">International</option>
                                    
                                </select>

                            <style>
                                    #phonenumber:not(:placeholder-shown) + label {
                                        display: none;
                                        }
                                </style>

                                
                            </div>
                            
                            <input type="hidden" name="transaction_time" id="transaction_time">

                            <!--Submit button-->
                            <button
                                type="submit"
                                class="inline-block w-full rounded-[1rem] bg-danger-600 px-10 pb-2 pt-2 text-md font-bold uppercase leading-normal text-white transition duration-150 ease-in-out focus:bg-danger-700 hover:text-white hover:bg-danger-700 focus:outline-none focus:ring-0 active:bg-gray-200"
                                data-te-ripple-init
                                data-te-ripple-color="light">
                                Create Transaction
                            </button>
                        </form>  

                        
                        </div>

                        <!-- Welcome Back -->
                        <div class="text-right">
                            <div class="ml-auto text-white text-lg font-semibold">
                                Welcome Back! 
                            </div>
                                <div class="text-4xl font-bold text-danger-600 py-4">
                                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                                </div>
                                <div class="text-white text-lg">Europe Standard Time</div>
                                    <div id="clock" class="text-6xl py-4 font-bold text-danger-600"></div>
                                    <div class="text-danger-600 py-4 font-bold text-2xl">1 EUR = <span id="converted-price"></span> PHP</div>
                                             
                        </div>

                            
                        
                            <!-- CLOCK IN PH -->
                            <script>

                                const createTransactionButton = document.querySelector('button[type="submit"]');
                                
                                createTransactionButton.addEventListener('click', setTransactionTime);
                                
                                function setTransactionTime() {
                                    console.log("Setting transaction time...");
                                    const now = new Date();
                                    const timeInput = document.getElementById('transaction_time');
                                    // Format the current time as needed (e.g., to ISO format)
                                    const formattedTime = now.toISOString();
                                    timeInput.value = formattedTime;
                                    document.querySelector('form').submit();

                                }

                                function startTime() {
                                    const today = new Date();
                                    const options = { timeZone: 'Europe/Paris' };
                                    today.setUTCHours(today.getUTCHours() + 7);
                                    let h = today.getHours();
                                    let m = today.getMinutes();
                                    let s = today.getSeconds();
                                    m = checkTime(m);
                                    s = checkTime(s);
                                    document.getElementById('clock').innerHTML = h + ":" + m + ":" + s;
                                    setTimeout(startTime, 1000);
                                }
                            
                                function checkTime(i) {
                                    if (i < 10) {
                                        i = "0" + i;
                                    } // add zero in front of numbers < 10
                                    return i;
                                }
                            
                                startTime(); // Start the clock immediately

                                // Add event listener to the form submission event
                            </script>
                            
                            <!-- Conversion API -->
                            <script>
                                // const API_KEY = '52b74f0f831e0aa311149335';
                                const req_url = `https://v6.exchangerate-api.com/v6/${API_KEY}/latest/EUR`;

                                // Fetch data from the API
                                fetch(req_url)
                                    .then(response => response.json())
                                    .then(data => {
                                        // Check if API request was successful
                                        if (data.result === 'success') {
                                            const base_price = 1; // Your price in EUR
                                            const PHP_price = (base_price * data.conversion_rates.PHP).toFixed(2);

                                            // Update the UI with the converted price
                                            document.getElementById('converted-price').innerText = PHP_price;
                                        } else {
                                            console.error('Failed to fetch exchange rates:', data.error);
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Error fetching exchange rates:', error);
                                    });
                            </script>
                        </div>
                    </div>
                   

                   <!-- Seperator -->
                        <hr class="my-12 h-px border-t-0 bg-transparent bg-gradient-to-r from-transparent via-neutral-500 to-transparent opacity-25 dark:opacity-100" />
                        
                        <!-- SEARCH BAR -->
                        <div class="flex justify-between mb-4">
                            <form action="{{ route('phonebook.filter') }}" method="GET" class="w-1/3">
                            <input type="text" name="reference_code" id="searchInput" class="w-full p-2 border rounded" placeholder="Search by Reference Code...">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Search</button>
                            </form>
                        </div>

                        <!-- TABLE -->
                        <table
                            class="min-w-full text-center text-sm font-light dark:border-neutral-500 ">
                                <thead class=" font-medium text-white dark:border-neutral-500 dark:bg-neutral-600">
                                    <tr>
                                        <th
                                            scope="col"
                                            class="border-r px-6 py-4 dark:border-neutral-500 rounded-tl-[1.5rem]">
                                            Sender Name
                                        </th>
                                        <th
                                            scope="col"
                                            class="border-r px-6 py-4 dark:border-neutral-500">
                                            Receiver Name
                                        </th>
                                        <th
                                            scope="col"
                                            class="border-r px-6 py-4 dark:border-neutral-500 ">
                                            Amount (Pesos) 
                                        </th>
                                        <th
                                            scope="col"
                                            class="border-r px-6 py-4 dark:border-neutral-500">
                                            Amount (Euro)
                                        </th>
                                        <th
                                            scope="col"
                                            class="border-r px-6 py-4 dark:border-neutral-500">
                                            Transaction Status
                                        </th>
                                        <th
                                            scope="col"
                                            class="border-r px-6 py-4 dark:border-neutral-500">
                                            Transaction Type
                                        </th>
                                        <th
                                            scope="col"
                                            class="border-r px-6 py-4 dark:border-neutral-500">
                                            Reference Code
                                        </th>
                                        <th scope="col" class="px-6 py-4 rounded-tr-[1.5rem]">Time</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sentTransactions as $cont)
                                        <tr class="border-b bg-white dark:border-neutral-500 ease-in-out text-lg  hover:bg-neutral-100">
                                            <td class="whitespace-nowrap text-left font-bold border-r px-6 py-2 dark:border-neutral-500">
                                            {{ $cont->sender_firstname }} {{ $cont->sender_lastname }}
                                            <br>
                                            <td class="whitespace-nowrap text-left font-bold border-r px-6 py-2 dark:border-neutral-500">
                                            {{ $cont->receiver_firstname }} {{ $cont->receiver_lastname }}
                                            <br>
                                            <td class="whitespace-nowrap text-left font-bold border-r px-6 py-2 dark:border-neutral-500">
                                            {{ $cont->amount }} 
                                            <br>
                                            <td class="whitespace-nowrap text-left font-bold border-r px-6 py-2 dark:border-neutral-500">
                                            {{ $cont->amount }} 
                                            <br>
                                            <td class="whitespace-nowrap text-left font-bold border-r px-6 py-2 dark:border-neutral-500">
                                            {{ $cont->transaction_status }} 
                                            <br>
                                            <td class="whitespace-nowrap text-left font-bold border-r px-6 py-2 dark:border-neutral-500">
                                            {{ $cont->transaction_type }} 
                                            <br>
                                            <td class="whitespace-nowrap text-left font-bold border-r px-6 py-2 dark:border-neutral-500">
                                            {{ $cont->reference_code }} 
                                            <br>
                                            <td class="whitespace-nowrap text-left font-bold border-r px-6 py-2 dark:border-neutral-500">
                                            {{ $cont->transaction_time }} 
                                            <br>
                                            
                                            
                                            <!-- Delete -->
                                            <td
                                                class="whitespace-nowrap  border-r px-6 py-4 dark:border-neutral-500 ">
                                                <a href="{{ route('phonebook.edit', ['id' => $cont->id] ) }}"
                                                    class="text-indigo-600 hover:text-indigo-900">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                    </svg>
                                                </a>
                                            </td>
                                            <td
                                                class="whitespace-nowrap border-r px-6 py-4 dark:border-neutral-500  ">
                                                <form action="{{ route('phonebook.delete',$cont->id) }}" method="GET" onsubmit="return confirm('{{ trans('Are you sure you want to delete this ? ') }}');">
                                                    @csrf
                                                    <button type="submit" class="flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="w-6 h-6 text-red-600 hover:text-red-800 cursor-pointer" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
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
    </div>
</main>


@endsection
