<h4> Post </h4>
<h6>Create a new job post </h6><br/>

<?php if(isset($info)){echo '<p>'.$info.'</p>';} ?>
<form action="<?php echo base_url; ?>/index.php/post" method="post">
<div class="col-12 col-md-10">
        <div class="form-group">
            <div class="text-danger"><?php echo form_error('post_title');?></div>
            <label for="post_title"> Job title </label>
            <input type="text" name="post_title" class="form-control" value="<?php echo set_value('post_title');?>" id="post_title" placeholder="Title"/>
        </div>
        <div class="form-group description">
            <div class="text-danger"><?php echo form_error('post_description');?></div>
            <label for="post_description" style="display:block;"> Job description </label>
            <textarea name="post_description" class="form-control"  id="post_content"><?php echo set_value('post_description');?></textarea>
        </div>
        <div class="form-group col-md-6">
            <div class="category">
                <label> Category  </label><hr/><br>
                <div class="post-cat">
                    <select name="post_cat">
                        <option value="accounting-auditing">Accounting, Auditing &amp; Finance</option><option value="administrative">Administrative &amp; Office</option><option value="farming-agriculture">Agriculture &amp; Farming</option><option value="building-architecture">Building &amp; Architecture</option><option value="social-services">Community &amp; Social Services</option><option value="consulting">Consulting &amp; Strategy</option><option value="creative">Creative &amp; Design</option><option value="customer-service">Customer Service &amp; Support</option><option value="engineering">Engineering</option><option value="food-services-catering">Food Services &amp; Catering</option><option value="human-resources">Human Resources</option><option value="it-software">IT &amp; Software</option><option value="legal">Legal Services</option><option value="management-business-development">Management &amp; Business Development</option><option value="marketing-communications">Marketing &amp; Communications</option><option value="medical-pharmaceutical">Medical &amp; Pharmaceutical</option><option value="project-management">Project &amp; Product Management</option><option value="quality-control">Quality Control &amp; Assurance </option><option value="property-management">Real Estate &amp; Property Management</option><option value="teaching-training">Research, Teaching &amp; Training</option><option value="sales">Sales</option><option value="supply-chain-procurement">Supply Chain &amp; Procurement</option><option value="trades-services">Trades &amp; Services</option><option value="transport-logistics">Transport &amp; Logistics</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group col-md-6">
            <div class="budget">
                <div class="text-danger"><?php echo form_error('post_budget');?></div>
                <label> Budget  </label><hr/><br>
                <input type="text" class="form-control" max="2" name="post_budget" value="<?php echo set_value('post_budget');?>"/>
                <em>Input your budget for the job, numerical values only</em>
            </div>
        </div>
        <div class="form-group submit-btn">
            <input type="submit" class="btn btn-primary btn-sm" value="Post" name="submit" />
        </div>