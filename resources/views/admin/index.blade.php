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
                            class="text-center text-sm font-light dark:border-neutral-500 ">
                                <thead class=" text-xs text-white dark:border-neutral-500 dark:bg-neutral-600">
                                    <tr class>
                                        <th
                                            scope="col"
                                            class="border-r px-1 py-1 dark:border-neutral-500 rounded-tl-[1.5rem]">
                                            Sender First Name
                                        </th>

                                        <th
                                            scope="col"
                                            class="border-r px-1 py-1 dark:border-neutral-500">
                                            Sender Last Name
                                        </th>
                                        
                                        <th
                                            scope="col"
                                            class="border-r px-1 py-1 dark:border-neutral-500">
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
                                @foreach($phonebooks as $phonebook)
                                <tr class = "border-b bg-white dark:border-neutral-500 ease-in-out text-small hover:bg-neutral-100">
                                    <td class="whitespace-nowrap text-left font-bold border-r px-3 py-1 dark:border-neutral-500 relative">
                                        <span>{{ $phonebook->sender_firstname }} </span>
                                        <button class="text-xs flex right-0 top-0 px-4 bg-danger-600 text-white px-2 py-1 rounded hover:bg-danger-700 focus:outline-none focus:bg-blue-600" onclick="editSenderName(this)" data-phonebook-id="{{ $phonebook->id }}">Edit</button>
                                        <input type="text" class="hidden flex top-0 left-0 w-full px-3 py-2 border rounded-md bg-white" value="{{ $phonebook->sender_firstname }}" style="z-index: -1;">
                                    </td>
                                    <td class="whitespace-nowrap text-left font-bold border-r px-3 py-1 dark:border-neutral-500 relative">
                                        <span>{{ $phonebook->sender_lastname }}</span>
                                        <button class="text-xs flex right-0 top-0 px-4 bg-danger-600 text-white px-2 py-1 rounded hover:bg-danger-700 focus:outline-none focus:bg-blue-600" onclick="editSenderName(this)" data-phonebook-id="{{ $phonebook->id }}">Edit</button>
                                        <input type="text" class="hidden flex top-0 left-0 w-full px-3 py-2 border rounded-md bg-white" value="{{ $phonebook->sender_firstname }}" style="z-index: -1;">
                                    </td>
                                    <td class="border-r px-6 py-4 dark:border-neutral-500">{{ $phonebook->amount }}</td>                                  
                                    <td class="border-r px-3 py-2 dark:border-neutral-500">{{ $phonebook->receiver_firstname }} {{ $phonebook->receiver_lastname }}</td>
                                    <td class="border-r px-6 py-4 dark:border-neutral-500">{{ $phonebook->amount }}</td>
                                    <td class="border-r px-6 py-4 dark:border-neutral-500">{{ $phonebook->amount*50 }}</td>
                                    <td class="border-r px-6 py-4 dark:border-neutral-500">{{ $phonebook->transaction_status }}</td>
                                    <td class="border-r px-6 py-4 dark:border-neutral-500">{{ $phonebook->transaction_type }}</td>
                                    <td class="border-r px-6 py-4 dark:border-neutral-500">{{ $phonebook->reference_code }}</td>
                                    <td class="px-6 py-4">{{ $phonebook->transaction_time }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>

                            <script>
                            function editSenderName(button) {
                                console.log("this is being clicked");
                                // Get the parent table row
                                const row = button.parentNode;
                                // Get the input field and make it visible
                                const inputField = row.querySelector('input');
                                inputField.classList.remove('hidden');
                                // Hide the edit button
                                button.style.display = 'none';

                                // Focus on the input field
                                inputField.focus();

                                // Add an event listener to save changes when Enter key is pressed
                                inputField.addEventListener('keydown', function(event) {
                                if (event.key === 'Enter') {
                                    // Get the new sender name
                                    const newSenderName = inputField.value;
                                    // Update the displayed sender name
                                    row.querySelector('span').innerText = newSenderName;
                                    // Hide the input field
                                    inputField.classList.add('hidden');
                                    // Show the edit button again
                                    button.style.display = 'block';
                                    // Optionally, you can send an AJAX request here to update the sender name in the database
                                    // Example AJAX request using Fetch API:
                                    const phonebookId = button.dataset.phonebookId;
                                    fetch('/phonebook/' + phonebookId, {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                        },
                                        body: JSON.stringify({ sender_name: newSenderName })
                                    })
                                    .then(response => {
                                        if (!response.ok) {
                                            throw new Error('Failed to update sender name');
                                        }
                                        return response.json();
                                    })
                                    .then(data => {
                                        console.log('Sender name updated successfully');
                                    })
                                    .catch(error => {
                                        console.error('Error updating sender name:', error);
                                    });
                                }
                            });

        // Add an event listener to cancel editing when Escape key is pressed
                            inputField.addEventListener('keydown', function(event) {
                                if (event.key === 'Escape') {
                                    // Hide the input field
                                    inputField.classList.add('hidden');
                                    // Show the edit button again
                                    button.style.display = 'block';
                                }
                            });
                        }
                        </script>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
</body>

@endsection
