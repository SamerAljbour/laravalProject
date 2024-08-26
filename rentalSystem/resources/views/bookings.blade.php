<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    @if(isset($action))
        @if($action == 'create' || $action == 'edit')
            <h1>{{ $action == 'create' ? 'Create' : 'Edit' }} Booking</h1>
            <form action="{{ $action == 'create' ? route('bookings.store') : route('bookings.update', $booking->id) }}" method="POST">
                @csrf
                @if($action == 'edit')
                    @method('PUT')
                @endif

                <!-- Property Selection -->
                <div class="form-group mb-3">
                    <label for="property_id">Property:</label>
                    <select name="property_id" id="property_id" class="form-control" required>
                        @foreach($properties as $property)
                            <option value="{{ $property->id }}" {{ isset($booking) && $booking->property_id == $property->id ? 'selected' : '' }} data-price="{{ $property->price_per_day }}">
                                {{ $property->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Start Date -->
                <div class="form-group mb-3">
                    <label for="start_date">Start Date:</label>
                    <input type="date" name="start_date" id="start_date" class="form-control" value="{{ isset($booking) ? $booking->start_date : '' }}" required>
                </div>
                <input type="hidden" name="renter_id" value="{{ auth()->id() }}">

                <!-- End Date -->
                <div class="form-group mb-3">
                    <label for="end_date">End Date:</label>
                    <input type="date" name="end_date" id="end_date" class="form-control" value="{{ isset($booking) ? $booking->end_date : '' }}" required>
                </div>

                <!-- Automated Total Price -->
                <div class="form-group mb-3">
                    <label for="total_price">Total Price:</label>
                    <input type="text" name="total_price" id="total_price" class="form-control" value="{{ isset($booking) ? $booking->total_price : '' }}" readonly>
                </div>

                <button type="submit" class="btn btn-primary">{{ $action == 'create' ? 'Save' : 'Update' }}</button>
            </form>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const propertySelect = document.getElementById('property_id');
                    const startDateInput = document.getElementById('start_date');
                    const endDateInput = document.getElementById('end_date');
                    const totalPriceInput = document.getElementById('total_price');

                    function calculateTotalPrice() {
                        const propertyPrice = propertySelect.selectedOptions[0].dataset.price;
                        const startDate = new Date(startDateInput.value);
                        const endDate = new Date(endDateInput.value);

                        if (propertyPrice && startDate && endDate) {
                            const days = (endDate - startDate) / (1000 * 60 * 60 * 24);
                            totalPriceInput.value = (days * propertyPrice).toFixed(2);
                        } else {
                            totalPriceInput.value = '';
                        }
                    }

                    propertySelect.addEventListener('change', calculateTotalPrice);
                    startDateInput.addEventListener('input', calculateTotalPrice);
                    endDateInput.addEventListener('input', calculateTotalPrice);
                });
            </script>

        @elseif($action == 'show')
            <h1>Booking Details</h1>
            <ul class="list-group">
                <li class="list-group-item"><strong>ID:</strong> {{ $booking->id }}</li>
                <li class="list-group-item"><strong>Property ID:</strong> {{ $booking->property_id }}</li>
                <li class="list-group-item"><strong>Renter ID:</strong> {{ $booking->renter_id }}</li>
                <li class="list-group-item"><strong>Start Date:</strong> {{ $booking->start_date }}</li>
                <li class="list-group-item"><strong>End Date:</strong> {{ $booking->end_date }}</li>
                <li class="list-group-item"><strong>Total Price:</strong> {{ $booking->total_price }}</li>
                <li class="list-group-item"><strong>Status:</strong> {{ $booking->status }}</li>
            </ul>
            <a href="{{ route('bookings.index') }}" class="btn btn-primary mt-3">Back to List</a>

        @endif
    @else
        <h1>Bookings</h1>
        <a href="{{ route('bookings.create') }}" class="btn btn-primary mb-3">Create Booking</a>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Property ID</th>
                    <th>Renter ID</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->property_id }}</td>
                    <td>{{ $booking->renter_id }}</td>
                    <td>{{ $booking->start_date }}</td>
                    <td>{{ $booking->end_date }}</td>
                    <td>{{ $booking->total_price }}</td>
                    <td>{{ $booking->status }}</td>
                    <td>
                        <a href="{{ route('bookings.show', $booking->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

<!-- Bootstrap JS (Optional for dropdowns, modals, etc.) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
