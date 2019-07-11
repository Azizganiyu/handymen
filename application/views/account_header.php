<style>
    .account-header{
        padding: 30px 0px;
        background-image: linear-gradient( rgba(3, 44, 17, 0.6), rgba(47, 184, 19, 0.6)), url('<?php echo $details['image_url'] ?>');
        background-size:cover;
        background-repeat:no-repeat;
        background-position: center, center;
    }
</style>

<div class="col-12 account-header">
    <div class="profile-image">
        <h5><?php echo $details['display_name'];?></h5>
        <h6><?php echo $details['profession'];?></h6>
        <img src="<?php echo $details['image_url'] ?>" id="account_dp" />
        <?php echo form_open_multipart('users/update_dp', 'id="upload_form"');?>
            <div id="targetLayer"></div><br/>
            <div class="file-input-wrapper">
                <input name="user_dp" id="user_dp" type="file" class="file_input" />
                <input type="button" class="btn" value="Change">
            </div>
        </form>
    </div>
</div>
<div class="col-12 account-nav">
    <a href="<?php echo base_url; ?>/index.php/account/update">Update Your Account</a></li>
</div>