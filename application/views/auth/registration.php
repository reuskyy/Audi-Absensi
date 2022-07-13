

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
            <div class="card-body p-0">
<style>
        html {
    background-image: none !important;
    background-size: cover;
}
</style>
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                    <div class="text-center">
                                    <img src="<?= base_url('assets/img/idfoodfav2.png'); ?>" width="45" height="45">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>

                    <?= form_open('', ['class' => 'user']); ?>
                    <div class="form-group">
                        <input autofocus="autofocus" autocomplete="off" value="<?= set_value('name'); ?>" type="text" name="name" class="form-control form-control-user" placeholder="Name">
                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="id_employee" name="id_employee"
                                                placeholder="NIP" value="<?= set_value('id_employee'); ?>">
                                                <?= form_error('id_employee', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="email" name="email"
                                                placeholder="Email Address" value="<?= set_value('email'); ?>">
                                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="password" name="password1" class="form-control form-control-user" placeholder="Password">
                                <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <input type="password" autocomplete = "new-password" name="password2" class="form-control form-control-user" placeholder="Repeat Password">
                                <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Register
                    </button>
                    <div class="text-center mt-4">
                        <a class="small" href="<?= base_url('auth') ?>">Already have an account? Login</a>
                    </div>
                    <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    </div>
