@extends('layouts.app')

@section('content')


<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="flex flex-col">
            <div class=" sm:-mx-6 lg:-mx-8">         
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">

                    <!-- Input transaction -->
                    <div class="flex justify-between">
                       
                        <div  
                        class="block max-w-md rounded-[1rem] p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] bg-white/30 backdrop-blur">
                         
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                            <div
                                class="mb-2 inline-flex w-full items-center rounded-lg bg-danger-100 px-6 py-1 text-base text-danger-700 transition-opacity ease-in duration-700 opacity-100"
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
                        
                        <form method="POST"action="{{ route('phonebook.store') }}">
                        @csrf <!-- {{ csrf_field() }} -->

                        <div class="grid grid-cols-2 gap-2 justify-center">
                                
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
                                    #sender_firstname:not(:placeholder-shown) + label {
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
                                    #sender_lastname:not(:placeholder-shown) + label {
                                        display: none;
                                        }
                                </style>
                            </div>
                        </div>
                        
                        <!-- Receiver Name Portion -->
                        <div class="grid grid-cols-2 gap-2">
                                
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
                                    #receiver_firstname:not(:placeholder-shown) + label {
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
                                    #receiver_lastname:not(:placeholder-shown) + label {
                                        display: none;
                                        }
                                </style>
                            </div>
                        </div>
                            
                           
                        <div class="grid grid-cols-2 gap-2">   
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
                                
                            </div>

                            
                            
                            <input type="hidden" name="transaction_time" id="transaction_time">
                        </div>
                                 
                        <div class="relative mb-6">
                                <select
                                    id="branch"
                                    name="branch"
                                    class="peer block min-h-[auto] w-full rounded-[1rem] border-0 bg-white px-3 py-[0.32rem] leading-[2.15] outline-1 transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-dark dark:placeholder:text-dark-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                                >
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    
                                </select>
                                
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
                                    #amount:not(:placeholder-shown) + label {
                                        display: none;
                                        }
                                </style>
                            </div>
                            
                            <!--Submit button-->
                            <button
                                type="submit"
                                class=" inline-block w-full rounded-[1rem] bg-danger-600 py-10 pb-2 pt-2 text-md font-bold uppercase leading-normal text-white transition duration-150 ease-in-out focus:bg-danger-700 hover:text-white hover:bg-danger-700 focus:outline-none focus:ring-0 active:bg-gray-200"
                                data-te-ripple-init
                                data-te-ripple-color="light">
                                Create Transaction
                            </button>
                        </form>  
                        <div class=" text-white opacity-60 text-center py-3">Sender and Reciever should be in the System</div>            
                        
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
                                        <div class="text-white text-lg">Phillippne Standard Time</div>
                                            <div id="clock1" class="text-6xl py-4 font-bold text-danger-600"></div>
                                                <div class="text-white text-lg">Live Conversion rate </div>
                                                    <div class="text-danger-600 py-4 font-bold text-3xl">1 EUR = <span id="converted-price"></span> PHP</div>
                                                        <div id="clockPH" class="text-6xl py-4 font-bold text-danger-600"></div>    
                            </div>
                                
                        <!-- CLOCK IN Europe/Paris -->
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
                                    today.setUTCHours(today.getUTCHours() +7 );
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

                            

                                <script>
                                    function setTransactionTime1() {
                                        console.log("Setting transaction time...");
                                        const now = new Date();
                                        const timeInput = document.getElementById('transaction_time1');
                                        const formattedTime = now.toISOString();
                                        timeInput.value = formattedTime;
                                    }
                                
                                    function startTime1() {
                                        const today = new Date();
                                        const options = { timeZone: 'Asia/Manila' };
                                        today.setUTCHours(today.getUTCHours() + 12); // Adjust to the appropriate timezone offset
                                        let h = today.getHours();
                                        let m = today.getMinutes();
                                        let s = today.getSeconds();
                                        m = checkTime(m);
                                        s = checkTime(s);
                                        document.getElementById('clock1').innerHTML = h + ":" + m + ":" + s;
                                        setTimeout(startTime1, 1000);
                                    }
                                
                                    function checkTime(i) {
                                        if (i < 10) {
                                            i = "0" + i;
                                        }
                                        return i;
                                    }
                                
                                    startTime1();
                                </script>
                            
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
                        <div class="py-2">
                            
                            <form action="{{ route('phonebook.filter') }}" method="GET" class="flex">
                                <div class="relative">
                                    <input type="text" name="reference_code" id="searchInput" class="px-10 py-2 mb-2 mr-2 border rounded-full" placeholder="Search Reference Code...">
                                        <button type="submit" class="inline-block bg-danger-600 text-white text-small px-5 py-2 mb-2 rounded-full hover:bg-danger-700">Search</button>
                                            <svg class="absolute w-5 h-5 text-gray-500 dark:text-gray-400 top-1/3 left-3 transform -translate-y-1/3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                            </svg>
                                </div>
                            </form>
                                
                                                

                        </div>                         
                    </div>
                </div>
            </div>

            <div class="flex justify-center mb-4 font-bold text-white">LOCAL TRANSACTION</div>
            <!-- TABLE FOR LOCAL -->
                        <div class="overflow-x-auto max-w-7xl mx-auto">
                            <table
                            class="min-w-full text-center text-sm font-light dark:border-neutral-500 mx-auto ">
                                <thead class=" font-small text-white dark:border-neutral-500 dark:bg-neutral-600">
                                    <tr>
                                        <th
                                            scope="col"
                                            class="border-r px-2 py-2 dark:border-neutral-500 rounded-tl-[1.5rem]">
                                            Sender Name
                                        </th>
                                        <th
                                            scope="col"
                                            class="border-r px-2 py-1 dark:border-neutral-500">
                                            Receiver Name
                                        </th>
                                        <th
                                            scope="col"
                                            class="border-r px-2 py-1 dark:border-neutral-500 ">
                                            Amount (Pesos) 
                                        </th>
                                      
                                        <th
                                            scope="col"
                                            class="border-r px-2 py-1 dark:border-neutral-500">
                                            Transaction Status
                                        </th>
                                        <th
                                            scope="col"
                                            class="border-r px-2 py-1 dark:border-neutral-500">
                                            Transaction Type
                                        </th>
                                        <th
                                            scope="col"
                                            class="border-r px-2 py-1 dark:border-neutral-500">
                                            Branch
                                        </th>
                                        <th
                                            scope="col"
                                            class="border-r px-2 py-1 dark:border-neutral-500">
                                            Reference Code
                                        </th>
                                        <th scope="col" class="px-2 py-2 rounded-tr-[1.5rem]">Time</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sentTransactions as $cont)
                                        @if ($cont->transaction_type == 'Local')
                                            <tr class="border-b bg-white dark:border-neutral-500 ease-in-out text-small hover:bg-neutral-100">
                                                <td class="whitespace-nowrap text-left font-bold border-r px-3 py-2 dark:border-neutral-500">
                                                {{ $cont->sender_firstname }} {{ $cont->sender_lastname }}
                                                <br>
                                                <td class="whitespace-nowrap text-left font-bold border-r px-3 py-2 dark:border-neutral-500">
                                                {{ $cont->receiver_firstname }} {{ $cont->receiver_lastname }}
                                                <br>
                                                <td class="whitespace-nowrap text-left font-bold border-r px-3 py-2 dark:border-neutral-500">
                                                {{ $cont->amount }} 
                                                <br>
                                         
                                                <td class="whitespace-nowrap text-left font-bold border-r px-3 py-2 dark:border-neutral-500">
                                                {{ $cont->transaction_status }} 
                                                <br>
                                                <td class="whitespace-nowrap text-left font-bold border-r px-3 py-2 dark:border-neutral-500">
                                                {{ $cont->transaction_type }} 
                                                <br>
                                                <td class="whitespace-nowrap text-center font-bold border-r px-3 py-2 dark:border-neutral-500">
                                                {{ $cont->branch }} 
                                                <br>
                                
                                                <td class="whitespace-nowrap text-left font-bold border-r px-3 py-2 dark:border-neutral-500">
                                                {{ $cont->reference_code }} 
                                                <br>
                                                <td class="whitespace-nowrap text-left font-bold border-r px-3 py-2 dark:border-neutral-500">
                                                {{ $cont->transaction_time }} 
                                                <br>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                                                <!-- Seperator -->
                            <hr class="my-12 h-px border-t-0 bg-transparent bg-gradient-to-r from-transparent via-neutral-500 to-transparent opacity-25 dark:opacity-100" />
                        
                            <div class="flex justify-center mb-4 font-bold text-white">INTERNATIONAL TRANSACTION</div>
                         <!-- TABLE FOR INTERNATIONAL -->
                         <div class="overflow-x-auto max-w-7xl mx-auto ">
                            <table
                            class="min-w-full text-center text-sm font-light dark:border-neutral-500 mx-auto ">
                                <thead class=" font-small text-white dark:border-neutral-500 dark:bg-neutral-600">
                                    <tr>
                                        <th
                                            scope="col"
                                            class="border-r px-2 py-2 dark:border-neutral-500 rounded-tl-[1.5rem]">
                                            Sender Name
                                        </th>
                                        <th
                                            scope="col"
                                            class="border-r px-2 py-1 dark:border-neutral-500">
                                            Receiver Name
                                        </th>
                                        <th
                                            scope="col"
                                            class="border-r px-2 py-1 dark:border-neutral-500 ">
                                            Amount (Pesos) 
                                        </th>
                                        <th
                                            scope="col"
                                            class="border-r px-2 py-1 dark:border-neutral-500">
                                            Amount (Euro)
                                        </th>
                                        <th
                                            scope="col"
                                            class="border-r px-2 py-1 dark:border-neutral-500">
                                            Transaction Status
                                        </th>
                                        <th
                                            scope="col"
                                            class="border-r px-2 py-1 dark:border-neutral-500">
                                            Transaction Type
                                        </th>
                                        <th
                                            scope="col"
                                            class="border-r px-2 py-1 dark:border-neutral-500">
                                            Branch
                                        </th>
                                        <th
                                            scope="col"
                                            class="border-r px-2 py-1 dark:border-neutral-500">
                                            Reference Code
                                        </th>
                                        <th scope="col" class="px-2 py-2 rounded-tr-[1.5rem]">Time</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sentTransactions as $cont)
                                        @if ($cont->transaction_type == 'International')
                                            <tr class="border-b bg-white dark:border-neutral-500 ease-in-out text-small hover:bg-neutral-100">
                                                <td class="whitespace-nowrap text-left font-bold border-r px-3 py-2 dark:border-neutral-500">
                                                {{ $cont->sender_firstname }} {{ $cont->sender_lastname }}
                                                <br>
                                                <td class="whitespace-nowrap text-left font-bold border-r px-3 py-2 dark:border-neutral-500">
                                                {{ $cont->receiver_firstname }} {{ $cont->receiver_lastname }}
                                                <br>
                                                <td class="whitespace-nowrap text-left font-bold border-r px-3 py-2 dark:border-neutral-500">
                                                {{ $cont->amount }} 
                                                <br>
                                                <td class="whitespace-nowrap text-left font-bold border-r px-3 py-2 dark:border-neutral-500">
                                                {{ $cont->amount*60}} 
                                                <br>
                                         
                                                <td class="whitespace-nowrap text-left font-bold border-r px-3 py-2 dark:border-neutral-500">
                                                {{ $cont->transaction_status }} 
                                                <br>
                                                <td class="whitespace-nowrap text-left font-bold border-r px-3 py-2 dark:border-neutral-500">
                                                {{ $cont->transaction_type }} 
                                                <br>
                                                <td class="whitespace-nowrap text-center font-bold border-r px-3 py-2 dark:border-neutral-500">
                                                {{ $cont->branch}} 
                                                <br>
                                                <td class="whitespace-nowrap text-left font-bold border-r px-3 py-2 dark:border-neutral-500">
                                                {{ $cont->reference_code }} 
                                                <br>
                                                <td class="whitespace-nowrap text-left font-bold border-r px-3 py-2 dark:border-neutral-500">
                                                {{ $cont->transaction_time }} 
                                                <br>
                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
        </div>   
    </div>
</main>


@endsection
