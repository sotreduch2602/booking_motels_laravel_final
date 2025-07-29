@extends('admin.layouts.master')

@section('main-content')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3">Hotels</h1>
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createHotelModal">
                Create Hotel
            </button>
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Stars</th>
                                <th>Street Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Postal Code</th>
                                <th>Country</th>
                                <th>Description</th>
                                <th>Amenities</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hotels as $hotel)
                                <tr>
                                    <td>{{ $hotel->id }}</td>
                                    <td>{{ $hotel->name }}</td>
                                    <td>{{ $hotel->stars }}</td>
                                    <td>{{ $hotel->street_address }}</td>
                                    <td>{{ $hotel->city }}</td>
                                    <td>{{ $hotel->state }}</td>
                                    <td>{{ $hotel->postal_code }}</td>
                                    <td>{{ $hotel->country }}</td>
                                    <td>{{ $hotel->description }}</td>
                                    <td>{{ $hotel->amenities }}</td>
                                    <td>
                                        @if($hotel->trashed())
                                            <span class="badge bg-secondary">Deleted</span>
                                            <form action="{{ route('admin.pages.hotels.restore', $hotel->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success">Restore</button>
                                            </form>
                                        @else
                                            <a href="#"
                                               class="btn btn-sm btn-warning edit-hotel-btn"
                                               data-id="{{ $hotel->id }}"
                                               data-name="{{ $hotel->name }}"
                                               data-stars="{{ $hotel->stars }}"
                                               data-street_address="{{ $hotel->street_address }}"
                                               data-city="{{ $hotel->city }}"
                                               data-state="{{ $hotel->state }}"
                                               data-postal_code="{{ $hotel->postal_code }}"
                                               data-country="{{ $hotel->country }}"
                                               data-description="{{ $hotel->description }}"
                                               data-amenities="{{ $hotel->amenities }}"
                                               data-owner_id="{{ $hotel->owner_id }}"
                                               data-bs-toggle="modal"
                                               data-bs-target="#editHotelModal"
                                            >
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.pages.hotels.destroy', $hotel->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- Create Hotel Modal -->
    <div class="modal fade" id="createHotelModal" tabindex="-1" aria-labelledby="createHotelModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form action="{{ route('admin.pages.hotels.store') }}" method="POST">
            @csrf
            <div class="modal-header">
              <h5 class="modal-title" id="createHotelModalLabel">Create Hotel</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <!-- Left Column: Address/Location -->
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="name" class="form-label">Hotel Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                  </div>
                  <div class="mb-3">
                    <label for="stars" class="form-label">Stars</label>
                    <input type="number" class="form-control" id="stars" name="stars" min="1" max="5" required>
                  </div>
                  <div class="mb-3">
                    <label for="amenities" class="form-label">Amenities</label>
                    <input type="text" class="form-control" id="amenities" name="amenities">
                    <small class="form-text text-muted">Separate amenities with commas.</small>
                  </div>
                  <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                  </div>
                </div>

                <!-- Right Column: General Info -->
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="street_address" class="form-label">Street Address</label>
                    <input type="text" class="form-control" id="street_address" name="street_address" required>
                  </div>
                  <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" name="city" required>
                  </div>
                  <div class="mb-3">
                    <label for="state" class="form-label">State</label>
                    <input type="text" class="form-control" id="state" name="state">
                  </div>
                  <div class="mb-3">
                    <label for="postal_code" class="form-label">Postal Code</label>
                    <input type="text" class="form-control" id="postal_code" name="postal_code">
                  </div>
                  <div class="mb-3">
                    <label for="country" class="form-label">Country</label>
                    <input type="text" class="form-control" id="country" name="country" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Create</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Edit Hotel Modal -->
    <div class="modal fade" id="editHotelModal" tabindex="-1" aria-labelledby="editHotelModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form id="editHotelForm" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-header">
              <h5 class="modal-title" id="editHotelModalLabel">Edit Hotel</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <!-- Left Column: Address/Location -->
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="edit_name" class="form-label">Hotel Name</label>
                    <input type="text" class="form-control" id="edit_name" name="name" required>
                  </div>
                  <div class="mb-3">
                    <label for="edit_stars" class="form-label">Stars</label>
                    <input type="number" class="form-control" id="edit_stars" name="stars" min="1" max="5" required>
                  </div>
                  <div class="mb-3">
                    <label for="edit_amenities" class="form-label">Amenities</label>
                    <input type="text" class="form-control" id="edit_amenities" name="amenities">
                    <small class="form-text text-muted">Separate amenities with commas.</small>
                  </div>
                  <div class="mb-3">
                    <label for="edit_description" class="form-label">Description</label>
                    <textarea class="form-control" id="edit_description" name="description"></textarea>
                  </div>
                </div>
                <!-- Right Column: General Info -->
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="edit_street_address" class="form-label">Street Address</label>
                    <input type="text" class="form-control" id="edit_street_address" name="street_address" required>
                  </div>
                  <div class="mb-3">
                    <label for="edit_city" class="form-label">City</label>
                    <input type="text" class="form-control" id="edit_city" name="city" required>
                  </div>
                  <div class="mb-3">
                    <label for="edit_state" class="form-label">State</label>
                    <input type="text" class="form-control" id="edit_state" name="state">
                  </div>
                  <div class="mb-3">
                    <label for="edit_postal_code" class="form-label">Postal Code</label>
                    <input type="text" class="form-control" id="edit_postal_code" name="postal_code">
                  </div>
                  <div class="mb-3">
                    <label for="edit_country" class="form-label">Country</label>
                    <input type="text" class="form-control" id="edit_country" name="country" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editButtons = document.querySelectorAll('.edit-hotel-btn');
        const editForm = document.getElementById('editHotelForm');

        editButtons.forEach(function (btn) {
            btn.addEventListener('click', function () {
                // Set form action
                const id = this.getAttribute('data-id');
                editForm.action = '/dashboard/hotels/' + id;

                // Fill fields
                document.getElementById('edit_name').value = this.getAttribute('data-name') || '';
                document.getElementById('edit_stars').value = this.getAttribute('data-stars') || '';
                document.getElementById('edit_street_address').value = this.getAttribute('data-street_address') || '';
                document.getElementById('edit_city').value = this.getAttribute('data-city') || '';
                document.getElementById('edit_state').value = this.getAttribute('data-state') || '';
                document.getElementById('edit_postal_code').value = this.getAttribute('data-postal_code') || '';
                document.getElementById('edit_country').value = this.getAttribute('data-country') || '';
                document.getElementById('edit_description').value = this.getAttribute('data-description') || '';
                document.getElementById('edit_amenities').value = this.getAttribute('data-amenities') || '';
                document.getElementById('edit_owner_id').value = this.getAttribute('data-owner_id') || '';
            });
        });
    });
</script>
@endsection
