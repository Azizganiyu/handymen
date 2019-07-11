<?php
if($posts != false){
foreach($posts as $post) { ?>

<div class=" col-12 post account-post">
        <div class="title">
            <h5><?php echo $post['job_title']; ?></h5>
        </div>
        <div class="description">
            <p><?php echo $post['job_description']; ?></p>
        </div>
        <div class="pay">
            <span class="label"> PAY </span> <span> ₦<?php echo $post['budget']; ?> </span>
        </div>
        <span>|</span>
        <div class="bid">
            <span class="label"> BIDs </span> <span> <?php echo $this->bid_model->count_bid($post['id']); ?> </span>
        </div>
        <div class="bid-btn">
            <a href="<?php echo base_url.'/index.php/account/view/'.$post['id']; ?>"><button class="btn btn-sm btn-primary">View Bids</button></a>
        </div>
</div>

<?php }} else echo "No Post Found"; ?>