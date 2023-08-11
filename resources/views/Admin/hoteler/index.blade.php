
    <div class="container">
        <h2>Hoteler List</h2>
        <a href="{{ route('admin.hoteler.create') }}" class="btn btn-primary">Create Hoteler</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name Hoteler</th>
                    <th>Name Hotel</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hotelers as $hoteler)
                    <tr>
                        <td>{{ $hoteler->name_hoteler }}</td>
                        <td>{{ $hoteler->name_hotel }}</td>
                        <td>{{ $hoteler->address }}</td>
                        <td>{{ $hoteler->email }}</td>
                        <td>{{ $hoteler->phone_number }}</td>
                        <td>
                            <a href="{{ route('admin.hoteler.edit', $hoteler->id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('admin.hoteler.destroy', $hoteler->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this hoteler?')">Delete</button>
                                
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('admin.main') }}" class="btn btn-default">Back</a> <!-- Nút Back -->
    </div>
