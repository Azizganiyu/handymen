<div class=" col-10 login-form">
    <h5>LOGIN</h5>
    <form action="<?php echo base_url; ?>/index.php/users/log_user" method="post">
        <div class="form-group">
            <div class="text-danger"></div>
            <input type="text" name="id" class="form-control" value="" placeholder="Your Name or Email"/>
        </div>
        <div class="form-group">
            <div class="text-danger"></div>
            <input type="password" name="password" class="form-control" value="" placeholder="Your Password"/>
        </div>

        <div class="submit-btn">
            <button type="submit" name="submit">SIGN IN</button>
        </div>
    </form>
    <p id="login-info" style="color:rgb(160, 18, 18); text-align:center;"></p>
    <p>Dont have an account? <a href="<?php echo base_url; ?>/index.php/users/register">Register here</a></p>
    
</div>