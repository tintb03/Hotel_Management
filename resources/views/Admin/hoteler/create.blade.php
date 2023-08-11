
    <div class="container">
        <h2>Create Hoteler</h2>
        <form action="{{ route('admin.hoteler.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name_hoteler">Name Hoteler:</label>
                <input type="text" class="form-control" id="name_hoteler" name="name_hoteler" required>
            </div>
            <div class="form-group">
                <label for="name_hotel">Name Hotel:</label>
                <input type="text" class="form-control" id="name_hotel" name="name_hotel" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number:</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
            <a href="{{ route('admin.main') }}" class="btn btn-default">Back</a> <!-- Nút Back -->
        </form>
    </div>

