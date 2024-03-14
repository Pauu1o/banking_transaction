<?php

namespace App\Http\Controllers;

use App\Models\Phonebook;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;


class PhonebookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check())
        {
            $contacts = Phonebook::all();
            return view('phonebook.index',compact('contacts'));
        }
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
    public function store(Request $request) : RedirectResponse
    {
        $validated = $request->validate([
            'sender_firstname' => 'required',
            'sender_lastname' => 'required',
            'receiver_firstname' => 'required',
            'receiver_lastname' => 'required',
            'amount' => 'required',
            'transaction_status' => 'required',
            'transaction_type' => 'required',


        ]);
        
        try {
            // Your code that may throw an exception
            $phonebook = new Phonebook;
            $phonebook->sender_firstname = $request->sender_firstname;
            $phonebook->sender_lastname = $request->sender_lastname;
            $phonebook->receiver_firstname = $request->receiver_firstname;
            $phonebook->receiver_lastname = $request->receiver_lastname;
            $phonebook->amount = $request->amount;
            $phonebook->transaction_status = $request->transaction_status;
            $phonebook->transaction_type = $request->transaction_type;
    
            $phonebook->saveOrFail();
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
