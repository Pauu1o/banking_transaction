@extends('layouts-admin.app')

@section('content')
    <div class="container">
        <h2>Edit Transaction Sender First Name</h2>
        <form method="POST" action="{{ route('phonebook.update', $phonebook->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="sender_firstname">Sender First Name:</label>
                <input type="text" class="form-control" id="sender_firstname" name="sender_firstname" value="{{ $phonebook->sender_firstname }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

        <h2>Edit Transaction Sender Last Name</h2>
        <form method="POST" action="{{ route('phonebook.update', $phonebook->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="sender_lastname">Sender Last Name:</label>
                <input type="text" class="form-control" id="sender_lastname" name="sender_lastname" value="{{ $phonebook->sender_lastname }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

        <h2>Edit Transaction Receiver First Name</h2>
        <form method="POST" action="{{ route('phonebook.update', $phonebook->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="receiver_firstname">Receiver First Name:</label>
                <input type="text" class="form-control" id="receiver_firstname" name="receiver_firstname" value="{{ $phonebook->receiver_firstname }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

        <h2>Edit Transaction Receiver Last Name</h2>
        <form method="POST" action="{{ route('phonebook.update', $phonebook->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="receiver_firstname">Receiver Last Name:</label>
                <input type="text" class="form-control" id="receiver_lastname" name="receiver_lastname" value="{{ $phonebook->receiver_lastname }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

        <h2>Edit Transaction Status</h2>
        <form method="POST" action="{{ route('phonebook.update', $phonebook->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="transaction_status">Transaction Status:</label>
                <input type="text" class="form-control" id="transaction_status" name="transaction_status" value="{{ $phonebook->transaction_status }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>

        <h2>Edit Transaction Type</h2>
        <form method="POST" action="{{ route('phonebook.update', $phonebook->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="transaction_status">Transaction Type:</label>
                <input type="text" class="form-control" id="transaction_type" name="transaction_type" value="{{ $phonebook->transaction_type }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection