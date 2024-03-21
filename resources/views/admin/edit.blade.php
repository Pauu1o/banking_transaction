@extends('layouts-admin.app')

@section('content')
    <div class="container">
        <h2>Edit Transaction Sender Name</h2>
        <form method="POST" action="{{ route('phonebook.update', $phonebook->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="sender_firstname">Sender First Name:</label>
                <input type="text" class="form-control" id="sender_firstname" name="sender_firstname" value="{{ $phonebook->sender_firstname }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection