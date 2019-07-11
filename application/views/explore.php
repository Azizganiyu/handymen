<h4 class="explore-head">Explore Job Posts</h4>
<div class="explore-cat">
    <select>
        <option  value="All">All</option>
        <option value="accounting-auditing">Accounting, Auditing &amp; Finance</option><option value="administrative">Administrative &amp; Office</option><option value="farming-agriculture">Agriculture &amp; Farming</option><option value="building-architecture">Building &amp; Architecture</option><option value="social-services">Community &amp; Social Services</option><option value="consulting">Consulting &amp; Strategy</option><option value="creative">Creative &amp; Design</option><option value="customer-service">Customer Service &amp; Support</option><option value="engineering">Engineering</option><option value="food-services-catering">Food Services &amp; Catering</option><option value="human-resources">Human Resources</option><option value="it-software">IT &amp; Software</option><option value="legal">Legal Services</option><option value="management-business-development">Management &amp; Business Development</option><option value="marketing-communications">Marketing &amp; Communications</option><option value="medical-pharmaceutical">Medical &amp; Pharmaceutical</option><option value="project-management">Project &amp; Product Management</option><option value="quality-control">Quality Control &amp; Assurance </option><option value="property-management">Real Estate &amp; Property Management</option><option value="teaching-training">Research, Teaching &amp; Training</option><option value="sales">Sales</option><option value="supply-chain-procurement">Supply Chain &amp; Procurement</option><option value="trades-services">Trades &amp; Services</option><option value="transport-logistics">Transport &amp; Logistics</option>
    </select>
    <input type="hidden" id="current_filter" value="<?php if(isset($cat)){ echo $cat; } ?>" />
</div>

<?php 
if($posts != false){
foreach($posts as $post) { ?>
    
<div class="row post">
    <div class=" col-6 col-sm-4 col-md-2 offset-1">
        <div class="profile-image">
            <img src="<?php echo $this->users_model->get_user_specific_data($post['user_id'], 'image_url'); ?>"  />
        </div>
        <div class="user-name">
            <h6><?php echo $this->users_model->get_user_specific_data($post['user_id'], 'user_name'); ?></h6>
        </div>
        <div class="posted">
            <span><?php echo date('M d, Y',strtotime($post['date_posted'])); ?></span>
        </div>
    </div>
    <div style="margin:20px 0px" class="col-12 col-md-6">
        <div class="title">
            <h5><?php echo $post['job_title']; ?></h5>
        </div>
        <div class="description">
            <p><?php echo substr($post['job_description'], 0, 100).'.......'; ?>.</p>
        </div>
        <div class="pay">
            <span class="label"> PAY </span> <span> ₦<?php echo $post['budget']; ?> </span>
        </div>
        <span>|</span>
        <div class="bid">
            <span class="label"> BIDs </span> <span> <?php echo $this->bid_model->count_bid($post['id']); ?> </span>
        </div>
    </div>
    <div class="offset-1 col-2">
        <a href="<?php echo base_url.'/index.php/bid/place_bid/'.str_replace(" ", "_", $post['job_title']); ?>"><button type="button">Bid</button></a>
    </div>
</div>
<hr />

<?php }} else echo "No Job Found"; ?>
