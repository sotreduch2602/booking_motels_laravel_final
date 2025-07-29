@extends('admin.layouts.master')

@section('main-content')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3">Room Types</h1>
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createRoomTypeModal">
                Create Room Type
            </button>
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Amenities</th>
                                <th>Base Price</th>
                                <th>Image Preview</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roomTypes as $roomType)
                                <tr>
                                    <td>{{ $roomType->id }}</td>
                                    <td>{{ $roomType->name }}</td>
                                    <td>{{ $roomType->description }}</td>
                                    <td>{{ $roomType->amenities }}</td>
                                    <td>{{ $roomType->base_price }}</td>
                                    <td>
                                        @if($roomType->image_preview)
                                            <img src="{{ asset('client_assets/img/' . $roomType->image_preview) }}" alt="Preview" style="width: 60px; height: 40px; object-fit: cover;">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $roomType->created_at }}</td>
                                    <td>{{ $roomType->updated_at }}</td>
                                    <td>
                                        <a href="#"
                                           class="btn btn-sm btn-warning edit-roomtype-btn"
                                           data-id="{{ $roomType->id }}"
                                           data-name="{{ $roomType->name }}"
                                           data-description="{{ $roomType->description }}"
                                           data-amenities="{{ $roomType->amenities }}"
                                           data-base_price="{{ $roomType->base_price }}"
                                           data-image_preview="{{ $roomType->image_preview }}"
                                           data-bs-toggle="modal"
                                           data-bs-target="#editRoomTypeModal"
                                        >
                                            Edit
                                        </a>
                                        <form action="{{ route('admin.pages.roomTypes.destroy', $roomType->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- Create Room Type Modal -->
    <div class="modal fade" id="createRoomTypeModal" tabindex="-1" aria-labelledby="createRoomTypeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form action="{{ route('admin.pages.roomTypes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-header">
              <h5 class="modal-title" id="createRoomTypeModalLabel">Create Room Type</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="name" class="form-label">Room Type Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                  </div>
                  <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="amenities" class="form-label">Amenities</label>
                    <input type="text" class="form-control" id="amenities" name="amenities">
                    <small class="form-text text-muted">Separate amenities with commas.</small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="base_price" class="form-label">Base Price</label>
                    <input type="number" class="form-control" id="base_price" name="base_price" required>
                  </div>
                  <div class="mb-3">
                    <label for="image_preview" class="form-label">Image Preview</label>
                    <input type="file" class="form-control" id="image_preview" name="image_preview" accept="image/*">
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

    <!-- Edit Room Type Modal -->
    <div class="modal fade" id="editRoomTypeModal" tabindex="-1" aria-labelledby="editRoomTypeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form id="editRoomTypeForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-header">
              <h5 class="modal-title" id="editRoomTypeModalLabel">Edit Room Type</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="edit_name" class="form-label">Room Type Name</label>
                    <input type="text" class="form-control" id="edit_name" name="name" required>
                  </div>
                  <div class="mb-3">
                    <label for="edit_description" class="form-label">Description</label>
                    <textarea class="form-control" id="edit_description" name="description"></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="edit_amenities" class="form-label">Amenities</label>
                    <input type="text" class="form-control" id="edit_amenities" name="amenities">
                    <small class="form-text text-muted">Separate amenities with commas.</small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="edit_base_price" class="form-label">Base Price</label>
                    <input type="number" class="form-control" id="edit_base_price" name="base_price" required>
                  </div>
                  <div class="mb-3">
                    <label for="edit_image_preview" class="form-label">Image Preview</label>
                    <input type="file" class="form-control" id="edit_image_preview" name="image_preview" accept="image/*">
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
        const editButtons = document.querySelectorAll('.edit-roomtype-btn');
        const editForm = document.getElementById('editRoomTypeForm');

        editButtons.forEach(function (btn) {
            btn.addEventListener('click', function () {
                // Set form action
                const id = this.getAttribute('data-id');
                editForm.action = '/dashboard/roomTypes/' + id;

                // Fill fields
                document.getElementById('edit_name').value = this.getAttribute('data-name') || '';
                document.getElementById('edit_description').value = this.getAttribute('data-description') || '';
                document.getElementById('edit_amenities').value = this.getAttribute('data-amenities') || '';
                document.getElementById('edit_base_price').value = this.getAttribute('data-base_price') || '';
            });
        });
    });
</script>
@endsection
