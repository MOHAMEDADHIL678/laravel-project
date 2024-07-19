<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Contacts</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

@include('layout/sidebar')

<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-2 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Contacts / Update</h1>
    </div>
</header>

<div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
                    @csrf
                    @session('success')
                        <div class="alert alert-success" role="alert"> 
                            {{ $value }}
                        </div>
                    @endsession
                    @method('PUT')
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="firstname" class="form-label">First Name:</label>
                            <input type="text" id="firstname" name="firstname" class="form-control" value="{{ $contact->firstname }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="lastname" class="form-label">Last Name:</label>
                            <input type="text" id="lastname" name="lastname" class="form-control" value="{{ $contact->lastname }}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone:</label>
                            <input type="text" id="phone" name="phone" class="form-control" value="{{ $contact->phone }}">
                        </div>
                        <div class="col-md-6">
                            <label for="address" class="form-label">Address:</label>
                            <input type="text" id="address" name="address" class="form-control" value="{{ $contact->address }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="city" class="form-label">City:</label>
                            <input type="text" id="city" name="city" class="form-control" value="{{ $contact->city }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="state" class="form-label">State:</label>
                            <input type="text" id="state" name="state" class="form-control" value="{{ $contact->state }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="organization_id">Organization</label>
                        <select name="organization_id" class="form-control" required>
                            @foreach($organizations as $organization)
                                <option value="{{ $organization->id }}" {{ $contact->organization_id == $organization->id ? 'selected' : '' }}>{{ $organization->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>