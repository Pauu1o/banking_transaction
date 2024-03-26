<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\User;
use App\Models\Phonebook;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class PhonebookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            // Fetch transactions where the sender or receiver first name and last name match the authenticated user's first name and last name
            $sentTransactions = Phonebook::where('sender_firstname', Auth::user()->first_name)
                ->orWhere('receiver_firstname', Auth::user()->first_name)
                ->where('sender_lastname', Auth::user()->last_name)
                ->orWhere('receiver_lastname', Auth::user()->last_name);
                //->get();
        };

        $sentTransactions = $sentTransactions->get();
        return view('phonebook.index', compact('sentTransactions'));
    }

    public function adminPage()
{
    $phonebooks = Phonebook::all(); // Fetch all phonebook records
    return view('admin.index', compact('phonebooks'));
}

    public function filter(Request $request){
        if ($request->filled('reference_code')) {
            // Filter transactions by reference code
            $sentTransactions = Phonebook::where('reference_code', $request->input('reference_code'));   
        }

        $sentTransactions = $sentTransactions->get();
        return view('phonebook.index', compact('sentTransactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'sender_firstname' => 'required',
        'sender_lastname' => 'required',
        'receiver_firstname' => 'required',
        'receiver_lastname' => 'required',
        'amount' => 'required',
        'transaction_status' => 'required',
        'transaction_type' => 'required',
        'branch' => 'required',
        'transaction_time' => 'required',
    ]);

    try {

        $receiver = User::where('first_name', $request->receiver_firstname)
                ->where('last_name', $request->receiver_lastname)
                ->first();

        if ($receiver){
            $referenceCode = $this->generateReferenceCode();

            // Store the form data along with the generated reference code
            $phonebook = new Phonebook;
            $phonebook->sender_firstname = $request->sender_firstname;
            $phonebook->sender_lastname = $request->sender_lastname;
            $phonebook->receiver_firstname = $request->receiver_firstname;
            $phonebook->receiver_lastname = $request->receiver_lastname;
            $phonebook->amount = $request->amount;
            $phonebook->transaction_status = $request->transaction_status;
            $phonebook->transaction_type = $request->transaction_type;
            $phonebook->transaction_time = $request->transaction_time;
            $phonebook->branch = $request->branch;
            $phonebook->reference_code = $referenceCode;

            $phonebook->saveOrFail();
            return redirect()->back()->with('success', 'Transaction created successfully');
        }
        
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        // Handle the exception, for example, return a response or log it
        Log::error('Failed to create transaction: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Failed to create transaction');
    } catch (\Exception $e) {
        // Handle other types of exceptions
        // Log the exception or return a generic error response
        Log::error('Something went wrong: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Something went wrong');
    }
}


    private function generateReferenceCode()
    {
    // Logic to generate reference code
    // You can use the logic from your previous JavaScript function here
    // Make sure to adjust the logic to match the PHP environment
    // For example:
        $systemCode = "PJJV"; // Replace with your system code
        $formattedDate = date('Ymd'); // Format: YYYYMMDD
        $formattedTime = date('His'); // Format: HHMMSS
        $transactionId = mt_rand(100000, 999999); // Generate random transaction ID between 100000 and 999999
        $randomValue = mt_rand(0, 999); // Generate random value between 0 and 999

        // Construct the reference code
        $referenceCode = $systemCode . '-' . $formattedDate . '-' . $formattedTime . '-' . $transactionId . '-' . $randomValue;

        return $referenceCode;
    }
    /**
     * Display the specified resource.
     */
    public function show(phonebook $phonebook) : RedirectResponse
    {
        //
        return view('phonebook.show', compact('phonebook'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request) : RedirectResponse
    {
        try {
            // Your code that may throw an exception
            $phonebook = Phonebook::findOrFail($request->id);
            return view('phonebook.edit', compact('phonebook'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the exception, for example, return a response or log it
            return response()->json(['error' => 'No Found Record'], 404);
        } catch (\Exception $e) {
            // Handle other types of exceptions
            // Log the exception or return a generic error response
            Log::error($e->getMessage());
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    /**
 * Update the specified resource in storage.
 */
public function update(Request $request, $id) : RedirectResponse
{
    Log::info('Update method called.');

    try {
        // Find the phonebook record
        $phonebook = Phonebook::findOrFail($id);
        
        // Validate the request data
        $validatedData = $request->validate([
            'sender_firstname' => 'sometimes|required|string|max:255',
            'sender_lastname' => 'sometimes|required|string|max:255',
            'receiver_firstname' => 'sometimes|required|string|max:255',
            'receiver_lastname' => 'sometimes|required|string|max:255',
            'transaction_status' => 'sometimes|required|string|max:255',
            'transaction_type' => 'sometimes|required|string|max:255',
            'branch' => 'sometimes|required|string|max:255',
        ]);

        // Update the fields with the new values if they are provided in the request
        if (isset($validatedData['sender_firstname'])) {
            $phonebook->sender_firstname = $validatedData['sender_firstname'];
        }

        if (isset($validatedData['sender_lastname'])) {
            $phonebook->sender_lastname = $validatedData['sender_lastname'];
        }

        if (isset($validatedData['receiver_firstname'])) {
            $phonebook->receiver_firstname = $validatedData['receiver_firstname'];
        }

        if (isset($validatedData['receiver_lastname'])) {
            $phonebook->receiver_lastname = $validatedData['receiver_lastname'];
        }

        if(isset($validatedData['transaction_status'])) {
            $phonebook->transaction_status = $validatedData['transaction_status'];
        }

        if(isset($validatedData['transaction_type'])) {
            $phonebook->transaction_type = $validatedData['transaction_type'];
        }

        if(isset($validatedData['branch'])) {
            $phonebook->branch = $validatedData['branch'];
        }

        // Save the changes to the database
        $phonebook->save();

        // Redirect back to the admin page with success message
        return redirect()->route('admin.page')->with('success', 'Transaction updated successfully');
    } catch (\Illuminate\Validation\ValidationException $e) {
        // Log validation errors
        Log::error('Validation failed: ' . $e->getMessage());

        // Redirect back with validation errors
        return redirect()->back()->withErrors($e->errors())->withInput();
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        // Handle the exception if the record is not found
        return response()->json(['error' => 'No Found Record'], 404);
    } catch (\Exception $e) {
        // Handle other types of exceptions
        // Log the exception or return a generic error response
        Log::error($e->getMessage());
        return response()->json(['error' => 'Something went wrong'], 500);
    }
}



    public function delete(Request $request) : RedirectResponse
    {
        try {
            // Find the phonebook record
            $phonebook = Phonebook::findOrFail($id);
            
            // Delete the record
            $phonebook->delete();
    
            // Optionally, you can return a response indicating success
            return response()->json(['message' => 'Transaction deleted successfully']);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the exception if the record is not found
            return response()->json(['error' => 'No Found Record'], 404);
        } catch (\Exception $e) {
            // Handle other types of exceptions
            // Log the exception or return a generic error response
            Log::error($e->getMessage());
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    try {
        // Find the phonebook record
        $phonebook = Phonebook::findOrFail($id);
        
        // Delete the record
        $phonebook->delete();

        // Optionally, you can return a response indicating success
        return response()->json(['message' => 'Transaction deleted successfully']);
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        // Handle the exception if the record is not found
        return response()->json(['error' => 'No Found Record'], 404);
    } catch (\Exception $e) {
        // Handle other types of exceptions
        // Log the exception or return a generic error response
        Log::error($e->getMessage());
        return response()->json(['error' => 'Something went wrong'], 500);
    }
}

}
