<div class=" col-10 register-form">
    <h5>CREATE ACCOUNT</h5>
    <form action="<?php echo base_url; ?>/index.php/users/reg_user" method="post">
        <div class="form-group">
            <div class="text-danger"></div>
            <input type="text" name="name" class="form-control" value="" placeholder="Your Name"/>
        </div>
        <div class="form-group">
            <div class="text-danger"></div>
            <input type="text" name="email" class="form-control" value="" placeholder="Your Email"/>
        </div>
        <div class="form-group">
            <div class="text-danger"></div>
            <input type="password" name="password" class="form-control" value="" placeholder="Your Password"/>
        </div>
        <div class="form-group">
            <div class="text-danger"></div>
            <input type="password" name="password-conf" class="form-control" value="" placeholder="Repeat Your Password"/>
        </div>
        
        <div class="text-danger"></div>
        <input type="checkbox" name="terms" />
        I agree all statements in <a href="#">Terms of service</a>

        <div class="submit-btn">
            <button type="submit" name="submit">SIGN UP</button>
        </div>
    </form>
    <p id="register-info" style="color:rgb(160, 18, 18); text-align:center;"></p>
    <p>Have already an account? <a href="<?php echo base_url; ?>/index.php/users/login">Login here</a></p>
    
</div>