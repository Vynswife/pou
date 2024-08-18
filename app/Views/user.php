<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .btn-sm-rounded {
            border-radius: 50%;
            padding: 0.25rem 0.5rem;
            font-size: 0.75rem;
            line-height: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">List Account Registered</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">All accounts registered on our website!</h6>
                <a href="<?= base_url('home/t_user') ?>" class="btn btn-outline-success btn-sm">
                    <i class="fa fa-plus"></i> Add New
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Username</th>
                                <!-- <th scope="col">Photo</th> -->
                                <th scope="col">Level</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Password</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; foreach ($jel as $kin) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $kin->username ?></td>
                                    <!-- <td><img src="<?= base_url('img/' . $kin->foto) ?>" width="80px"></td> -->
                                    <td><?= $kin->level ?></td>
                                    <td><?= $kin->jk ?></td>
                                    <td><?= $kin->pw ?></td>
                                    <td>
                                        <button class="btn btn-warning btn-sm rounded-circle edit-user" data-id="<?= $kin->id_user ?>" data-username="<?= $kin->username ?>" data-jk="<?= $kin->jk ?>" data-password="<?= $kin->pw ?>" data-photo="<?= $kin->foto ?>">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <a href="<?= base_url('home/aksi_reset/' . $kin->id_user) ?>" class="btn btn-warning btn-sm rounded-circle">
                                            <i class="fa fa-redo"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Editing User -->
    <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('home/aksi_e_user') ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" name="username" id="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="jk">Gender:</label>
                            <select class="form-control" name="jk" id="jk" required>
                                <option value="">Select</option>
                                <option value="pria">Male</option>
                                <option value="wanita">Female</option>
                                <option value="lainnya">Other</option>
                            </select>
                        </div>
                        <input type="hidden" name="id_user" id="id_user">
                        <!-- Add hidden fields or display current photo if needed -->
                        <!-- <div class="form-group">
                            <label>Current Photo:</label>
                            <img id="current_photo" src="" alt="Current Photo" class="img-fluid">
                        </div> -->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-success">Save</button>
                        <a href="<?= base_url('home/h_user/' . $kin->id_user) ?>" class="btn btn-outline-danger" id="deleteUserBtn">Delete</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.edit-user').on('click', function() {
                var id = $(this).data('id');
                var username = $(this).data('username');
                var jk = $(this).data('jk');
                var photo = $(this).data('photo');

                // Set the values in the modal form
                $('#id_user').val(id);
                $('#username').val(username);
                $('#jk').val(jk);

                // Update the modal title
                $('#editUserModalLabel').text('Edit User: ' + username);

                // Update the current photo preview
                $('#current_photo').attr('src', '<?= base_url('img/') ?>' + photo);

                // Set up the delete button action for this user
                $('#deleteUserBtn').attr('href', '<?= base_url('home/h_user/' . $kin->id_user) ?>');

                // Show the modal
                $('#editUserModal').modal('show');
            });

            $('#deleteUserBtn').on('click', function(e) {
                e.preventDefault();
                var deleteUrl = $(this).attr('href');
                window.location.href = deleteUrl;
            });
        });
    </script>
</body>
</html>
