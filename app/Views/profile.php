<!DOCTYPE html>
<html lang="en">

<body>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">User Profile</h4>
            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</button>
        </div>
        <div class="card-body text-center">
            <div class="profile-photo mb-3">
                <img src="<?= base_url('img/'.$user->foto)?>" alt="Profile Photo" class="rounded-circle shadow" style="width: 150px; height: 150px; object-fit: cover;">
            </div>
            <div class="profile-info">
                <h5 class="text-muted">Username</h5>
                <p id="username" class="fs-4 fw-bold"><?= $user->username?></p>
                <h5 class="text-muted">Gender</h5>
                <p id="gender" class="fs-4 fw-bold"><?= $user->jk?></p>
            </div>
        </div>
    </div>
</div>

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form action="<?= base_url('home/aksi_e_profile') ?>" method="post" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="usernameInput" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" value="<?= $user->username?>">
                    </div>
                    <div class="mb-3">
                        <label for="genderInput" class="form-label">Gender</label>
                        <select class="form-select" name="jk">
                            <option value="<?= $user->jk?>">Select one</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="profilePhotoInput" class="form-label">Profile Photo</label>
                        <input type="file" class="form-control" name="foto" required>
                    </div>
                    <div class="d-flex justify-content-end">
                        <input type="hidden" name="id" value="<?= $user->id_user?>">
                        <button type="submit" class="btn btn-success">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
