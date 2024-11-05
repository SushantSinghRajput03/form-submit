<!DOCTYPE html>
<html>
<head>
    <title>User Management</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h3>Add New User</h3>
                <form id="userForm" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name">
                        <span class="text-danger" id="nameError"></span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
                        <span class="text-danger" id="emailError"></span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <div class="input-group">
                            <span class="input-group-text">+91</span>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter your phone number (without country code)">
                        </div>
                        <span class="text-danger" id="phoneError"></span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="description" placeholder="Enter your description"></textarea>
                        <span class="text-danger" id="descriptionError"></span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <select class="form-control" name="role_id" id="role_id">
                            <option value="">Select Role</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger" id="roleError"></span>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Profile Image</label>
                        <input type="file" class="form-control" name="profile_image" id="profile_image">
                        <span class="text-danger" id="profileImageError"></span>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <div class="col-md-6">
                <h3>Users List</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody id="usersTable">
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->role->name }}</td>
                                <td><img src="{{ Storage::url($user->profile_image) }}" width="50"></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#userForm').on('submit', function(e) {
                e.preventDefault();
                
                // Clear previous errors
                $('.text-danger').text('');
                
                let formData = new FormData(this);

                $.ajax({
                    type: 'POST',
                    url: '/users',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if(response.status === 'success') {
                            // Add new row to table
                            let newRow = `
                                <tr>
                                    <td>${response.user.name}</td>
                                    <td>${response.user.email}</td>
                                    <td>${response.user.phone}</td>
                                    <td>${response.user.role.name}</td>
                                    <td><img src="/storage/${response.user.profile_image}" width="50"></td>
                                </tr>
                            `;
                            $('#usersTable').append(newRow);
                            
                            // Reset form
                            $('#userForm')[0].reset();
                            alert('User added successfully!');
                        }
                    },
                    error: function(response) {
                        if(response.status === 422) {
                            let errors = response.responseJSON.errors;
                            if(errors.name) {
                                $('#nameError').text(errors.name[0]);
                            }
                            if(errors.email) {
                                $('#emailError').text(errors.email[0]);
                            }
                            if(errors.phone) {
                                $('#phoneError').text(errors.phone[0]);
                            }
                            if(errors.description) {
                                $('#descriptionError').text(errors.description[0]);
                            }
                            if(errors.role_id) {
                                $('#roleError').text(errors.role_id[0]);
                            }
                            if(errors.profile_image) {
                                $('#profileImageError').text(errors.profile_image[0]);
                            }
                        }
                    }
                });
            });
        });
    </script>
</body>
</html> 