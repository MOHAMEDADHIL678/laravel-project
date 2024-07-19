


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizations</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
@include('layout/sidebar')

<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-2 py-6 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Organizations</h1>
    </div>
  </header>

<div class="container mt-5">
    <div class="card py-3 px-4">
    <div class="d-flex justify-content-end">
    <a href="{{ route('organizations.create') }}" class="btn btn-primary float-right">Create Organization</a>
    </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>City</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($organizations as $organization)
                        <tr>
                            <td>{{ $organization->name }}</td>
                            <td>{{ $organization->city }}</td>
                            <td>{{ $organization->phone }}</td>
                            <td>
                                <a href="{{ route('organizations.edit', $organization->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('organizations.destroy', $organization->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $organizations->links() }}
        </div>
    </div>
</div>
</body>
</html>
