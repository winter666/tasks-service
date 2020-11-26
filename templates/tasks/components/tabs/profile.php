<div class="tab-profile">
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-12 d-flex justify-content-center">
            <div class="profile-img profile-img_borderer">
                <div>
                    <img src="/asset/img/1106631.svg" alt="profile-icon">
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-7 col-sm-12">
            <div class="profile-editable">
                <h3 id="profileHeading">Profile</h3>
                <form method="POST" id="profileSetting">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" value="<?= $data['user']['name'] ?>" disabled>
                    </div>
                    <div class="form-group">
                        <input type="mail" class="form-control" name="login" value="<?= $data['user']['login'] ?>" disabled>
                    </div>
                </form>
                <button class="btn btn-primary">Edit</button>
            </div>
        </div>
    </div>
</div>