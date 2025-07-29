@extends('admin.layouts.master')

@section('main-content')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3">Rooms</h1>
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createRoomModal">
                Create Room
            </button>
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Hotel</th>
                                <th>Room Number</th>
                                <th>Room Type</th>
                                <th>Price/Night</th>
                                <th>Max People</th>
                                <th>Description</th>
                                <th>Available</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rooms as $room)
                                <tr>
                                    <td>{{ $room->hotel->name ?? 'N/A' }}</td>
                                    <td>{{ $room->room_number }}</td>
                                    <td>{{ $room->roomType->name ?? 'N/A' }}</td>
                                    <td>{{ $room->price_per_night }}</td>
                                    <td>{{ $room->max_people }}</td>
                                    <td>{{ $room->description }}</td>
                                    <td>
                                        @if($room->available)
                                            <span class="badge bg-success">Yes</span>
                                        @else
                                            <span class="badge bg-danger">No</span>
                                        @endif
                                    </td>
                                    <td>{{ $room->created_at }}</td>
                                    <td>{{ $room->updated_at }}</td>
                                    <td>
                                        @if($room->trashed())
                                            <span class="badge bg-secondary">Deleted</span>
                                            <form action="{{ route('admin.pages.rooms.restore', $room->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success">Restore</button>
                                            </form>
                                        @else
                                            <a href="#"
                                               class="btn btn-sm btn-warning edit-room-btn"
                                               data-id="{{ $room->id }}"
                                               data-hotel_id="{{ $room->hotel_id }}"
                                               data-room_number="{{ $room->room_number }}"
                                               data-room_type_id="{{ $room->room_type_id }}"
                                               data-price_per_night="{{ $room->price_per_night }}"
                                               data-max_people="{{ $room->max_people }}"
                                               data-description="{{ $room->description }}"
                                               data-available="{{ $room->available }}"
                                               data-bs-toggle="modal"
                                               data-bs-target="#editRoomModal"
                                            >
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.pages.rooms.destroy', $room->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this room?')">Delete</button>
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

    <!-- Create Room Modal -->
    <div class="modal fade" id="createRoomModal" tabindex="-1" aria-labelledby="createRoomModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form action="{{ route('admin.pages.rooms.store') }}" method="POST">
            @csrf
            <div class="modal-header">
              <h5 class="modal-title" id="createRoomModalLabel">Create Room</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="hotel_id" class="form-label">Hotel</label>
                    <select class="form-control" id="hotel_id" name="hotel_id" required>
                        <option value="">Select Hotel</option>
                        @foreach($hotels as $hotel)
                            <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="room_number" class="form-label">Room Number</label>
                    <input type="text" class="form-control" id="room_number" name="room_number" required>
                  </div>
                  <div class="mb-3">
                    <label for="room_type_id" class="form-label">Room Type</label>
                    <select class="form-control" id="room_type_id" name="room_type_id" required>
                        <option value="">Select Room Type</option>
                        @foreach($roomTypes as $roomType)
                            <option value="{{ $roomType->id }}">{{ $roomType->name }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="price_per_night" class="form-label">Price per Night</label>
                    <input type="number" class="form-control" id="price_per_night" name="price_per_night" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="max_people" class="form-label">Max People</label>
                    <input type="number" class="form-control" id="max_people" name="max_people" required>
                  </div>
                  <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="available" class="form-label">Available</label>
                    <select class="form-control" id="available" name="available">
                      <option value="1">Yes</option>
                      <option value="0">No</option>
                    </select>
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

    <!-- Edit Room Modal -->
    <div class="modal fade" id="editRoomModal" tabindex="-1" aria-labelledby="editRoomModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form id="editRoomForm" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-header">
              <h5 class="modal-title" id="editRoomModalLabel">Edit Room</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="edit_hotel_id" class="form-label">Hotel</label>
                    <select class="form-control" id="edit_hotel_id" name="hotel_id" required>
                        <option value="">Select Hotel</option>
                        @foreach($hotels as $hotel)
                            <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="edit_room_number" class="form-label">Room Number</label>
                    <input type="text" class="form-control" id="edit_room_number" name="room_number" required>
                  </div>
                  <div class="mb-3">
                    <label for="edit_room_type_id" class="form-label">Room Type</label>
                    <select class="form-control" id="edit_room_type_id" name="room_type_id" required>
                        <option value="">Select Room Type</option>
                        @foreach($roomTypes as $roomType)
                            <option value="{{ $roomType->id }}">{{ $roomType->name }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="edit_price_per_night" class="form-label">Price per Night</label>
                    <input type="number" class="form-control" id="edit_price_per_night" name="price_per_night" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="edit_max_people" class="form-label">Max People</label>
                    <input type="number" class="form-control" id="edit_max_people" name="max_people" required>
                  </div>
                  <div class="mb-3">
                    <label for="edit_description" class="form-label">Description</label>
                    <textarea class="form-control" id="edit_description" name="description"></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="edit_available" class="form-label">Available</label>
                    <select class="form-control" id="edit_available" name="available">
                      <option value="1">Yes</option>
                      <option value="0">No</option>
                    </select>
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
        const editButtons = document.querySelectorAll('.edit-room-btn');
        const editForm = document.getElementById('editRoomForm');

        editButtons.forEach(function (btn) {
            btn.addEventListener('click', function () {
                // Set form action
                const id = this.getAttribute('data-id');
                editForm.action = '/dashboard/rooms/' + id;

                // Fill fields
                document.getElementById('edit_hotel_id').value = this.getAttribute('data-hotel_id') || '';
                document.getElementById('edit_room_number').value = this.getAttribute('data-room_number') || '';
                document.getElementById('edit_room_type_id').value = this.getAttribute('data-room_type_id') || '';
                document.getElementById('edit_price_per_night').value = this.getAttribute('data-price_per_night') || '';
                document.getElementById('edit_max_people').value = this.getAttribute('data-max_people') || '';
                document.getElementById('edit_description').value = this.getAttribute('data-description') || '';
                document.getElementById('edit_available').value = this.getAttribute('data-available') || '';
            });
        });
    });
</script>

@endsection
