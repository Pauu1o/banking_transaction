<?php

namespace App\Http\Controllers;

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
        'transaction_time' => 'required',
    ]);

    try {

        $receiver = User::where('first_name', $request->receiver_firstname)
                ->where('last_name', $request->receiver_lastname)
                ->first();

        if ($receiver){
            // Generate reference code
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
            $phonebook->reference_code = $referenceCode;

            $phonebook->saveOrFail();
            return redirect()->back()->with('success', 'Transaction created successfully');// Generate reference code
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
    public function update(Request $request, Phonebook $phonebook) : RedirectResponse
    {

        try {
            // Your code that may throw an exception
            $phonebook = Phonebook::findOrFail($request->id);
            $phonebook->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
            ]);
            return redirect()->back();
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

    public function delete(Request $request) : RedirectResponse
    {
        try {
            // Your code that may throw an exception
            $phonebook = Phonebook::findOrFail($request->id);
            $phonebook->delete();
            return redirect()->back();
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
     * Remove the specified resource from storage.
     */
    public function destroy(phonebook $phonebook)
    {
        //
    }
}
