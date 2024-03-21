@extends('layouts-admin.app')

@section('content')


<body class = "admin-page">

<div class="ml-64 flex-1">
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="flex left">
            <div class="overflow-x-auto sm:-mx-2 lg:-mx-4">         
                <div class="inline-block min-w-right py-2 sm:px-6 lg:px-8">
                    
                        
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

                        <!-- TABLE -->
                        <table
                            class="min-w-full text-center text-sm font-light dark:border-neutral-500 ">
                                <thead class=" font-small text-white dark:border-neutral-500 dark:bg-neutral-600">
                                    <tr>
                                        <th
                                            scope="col"
                                            class="border-r px-3 py-2 dark:border-neutral-500 rounded-tl-[1.5rem]">
                                            Sender Name
                                        </th>
                                        <th
                                            scope="col"
                                            class="border-r px-3 py-2 dark:border-neutral-500">
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
                              
                                            
                                          
                                        </tr>
                                   
                                </tbody>
                            </table>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
</body>

@endsection
