<div class="col-12 col-md-6 offset-md-3 update-form">
    <form action="<?php echo base_url; ?>/index.php/account/update" method="post">   
        <?php echo validation_errors(); ?>
        <div class="form-group">
            <div class="text-danger"></div>
            <label>Display name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $details['display_name']; ?>" placeholder="Your Name"/>
        </div>
        <div class="form-group">
            <div class="text-danger"></div>
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo $details['email']; ?>" placeholder="Your Email"/>
        </div>
        <div class="form-group">
            <div class="text-danger"></div>
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="<?php echo $details['phone']; ?>" placeholder="Your Phone Number"/>
        </div>
        <div class="form-group">
            <div class="text-danger"></div>
            <label>Address</label>
            <input type="text" name="address" class="form-control" value="<?php echo $details['address']; ?>" placeholder="Your Full Address"/>
        </div>
        <div class="form-group">
            <div class="text-danger"></div>
            <label>Profession</label>
            <input type="text" name="profession" class="form-control" value="<?php echo $details['profession']; ?>" placeholder="What Do You Do"/>
        </div>
        
        <div class="submit-btn">
            <button type="submit" name="submit">UPDATE</button>
        </div>
    </form>
</div>    