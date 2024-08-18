

    <div style="max-width: 600px; width: 100%; padding: 0 1rem;">
        <div style="border-radius: 10px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); background: #fff; padding: 1.5rem 2rem;">
            <div style="text-align: center; margin-bottom: 1rem;">
                <h1 style="color: #3a3b45; font-size: 1.5rem; font-weight: bold;">Create an Account!</h1>
            </div>
            <form action="<?= base_url('home/aksi_t_user') ?>" method="post">
                <div style="margin-bottom: 1rem;">
                    <label for="exampleFirstName" style="font-weight: bold;">Username</label>
                    <input type="text" style="border-radius: 5px; padding: 10px; width: 100%; border: 1px solid #ced4da; box-sizing: border-box;" id="exampleFirstName" placeholder="Your name" name="nama">
                </div>
                <div style="margin-bottom: 1rem;">
                    <label for="exampleGender" style="font-weight: bold;">Jenis kelamin</label>
                    <select style="border-radius: 5px; padding: 10px; width: 100%; border: 1px solid #ced4da; box-sizing: border-box;" name="jk" id="exampleGender">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
                <div style="margin-bottom: 1rem;">
                    <label for="exampleInputPassword" style="font-weight: bold;">Password</label>
                    <input type="password" style="border-radius: 5px; padding: 10px; width: 100%; border: 1px solid #ced4da; box-sizing: border-box;" id="exampleInputPassword" placeholder="Password" name="pass">
                </div>
                <div style="margin-bottom: 1rem;">
                    <label for="exampleLevel" style="font-weight: bold;">Level</label>
                    <select style="border-radius: 5px; padding: 10px; width: 100%; border: 1px solid #ced4da; box-sizing: border-box;" name="level" id="exampleLevel">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
                <button type="submit" style="background-color: #4e73df; border-color: #4e73df; border-radius: 25px; padding: 10px 20px; font-size: 14px; color: #fff; transition: background-color 0.3s, border-color 0.3s;">Add now!</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
