@extends('layouts.app')

@section('content')


<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">         
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">

                   
                        <!-- Welcome Back -->
                        <div class="text-left">
                            <div class="ml-auto text-white text-lg font-semibold">
                                Welcome Back! 
                            </div>
                                <div class="text-4xl font-bold text-danger-600 py-4">
                                    {{ Auth::user()->name }}
                                </div>
                                <div class="text-white text-lg">Europe Standard Time</div>
                                    <div id="clock" class="text-6xl font-bold text-danger-600"></div>
                                        <div class="text-danger-600 py-4 font-bold text-2xl"> 1 € (Euro) = 60.70 ₱ (Philippine Peso)</div>                                  
                                            <div class="text-white"> as of 05/03/2024</div>
                                             
                        </div>

                        
                        
                            <!-- CLOCK IN PH -->
                            <script>
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
                            </script>
                        </div>

                        

                    </div>
                   

                   <!-- Seperator -->
                        <hr class="my-12 h-px border-t-0 bg-transparent bg-gradient-to-r from-transparent via-neutral-500 to-transparent opacity-25 dark:opacity-100" />
                            
                        <!-- TABLE -->

                    
                        <table
                            class="min-w-full text-center text-sm font-light dark:border-neutral-500 ">
                                <thead class=" font-medium text-white dark:border-neutral-500 dark:bg-neutral-600">
                                    <tr>
                                        <th
                                            scope="col"
                                            class="border-r px-6 py-4 dark:border-neutral-500 rounded-tl-[1.5rem]">
                                            Client Name
                                        </th>
                                        <th
                                            scope="col"
                                            class="border-r px-6 py-4 dark:border-neutral-500 ">
                                            Ammount (Pesos) 
                                        </th>
                                        <th
                                            scope="col"
                                            class="border-r px-6 py-4 dark:border-neutral-500">
                                            Ammount (Euro)
                                        </th>
                                        <th
                                            scope="col"
                                            class="border-r px-6 py-4 dark:border-neutral-500">
                                            Transaction Type
                                        </th>
                                        <th scope="col" class="px-6 py-4 rounded-tr-[1.5rem]">Time</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $cont)
                                        <tr class="border-b bg-white dark:border-neutral-500 ease-in-out text-lg  hover:bg-neutral-100">
                                            <td class="whitespace-nowrap text-left font-bold border-r px-6 py-2 dark:border-neutral-500">
                                            {{ $cont->first_name }} {{ $cont->last_name }}
                                            <br>
                                            <div class="font-light">{{ $cont->phone_number }} </div>
                                            </td>
                                            <td class="whitespace-nowrap border-r px-6 py-4 dark:border-neutral-500">
                                            {{ $cont->last_name }}
                                            </td>
                                            <td class="whitespace-nowrap border-r px-6 py-4 dark:border-neutral-500">{{ $cont->phone_number }}</td>\
                                            
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
</main>


@endsection
