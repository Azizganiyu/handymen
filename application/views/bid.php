<?php 
if($post_data != false){
?>

<div class="row">
    <div class="col-12 col-md-4 offset-md-1">
        <div class="profile-image">
            <img src="<?php echo $author_data['image_url'] ?>"  />
        </div>
        <div class="title">
            <p><?php echo $post_data['job_title'] ?></p>
        </div>
        <div class="user-name">
            <h6><?php echo $author_data['display_name']; ?></h6>
        </div>
        <div class="posted">
            <span><?php echo date('M d, Y',strtotime($post_data['date_posted'])); ?></span>
        </div>
    </div>
    <div class="col-12 col-md-4 offset-md-1">
        <div class="description">
            <p>
                <?php echo $post_data['job_description'] ?>
            </p>
            <i class="far fa-money-bill-alt"></i> ₦<?php echo $post_data['budget'] ?> <i class="fas fa-user-plus"></i> <?php echo $count_bids; ?>
        </div>
    </div>
</div>

<?php
if(!$user_has_bidded)
{?>

<form action="<?php echo base_url.'/index.php/bid/place_bid/'.str_replace(" ", "_", $post_data['job_title']); ?>" method="post">
<div class="row">
    <div class=" col-10 col-md-6 offset-md-1 textarea">
        </h5> Why should you be hired?</h5>
        <input type="hidden" name="post_id" value="<?php echo $post_data['id'] ?>">
        <textarea class="form-control" name="bid"></textarea>
        <div class="text-warning"><?php echo form_error('bid');?></div>
    </div>
</div>
<div class="col-12 bid-button">
        <button name="submit" type="submit" class="btn btn-primary">Place Bid</button>
</div>
</form>

<?php 
} 
else
{?> 

<div class="row">
    <div class="col-6 offset-1 textarea">
        <h6> You have bidded for this job! </h6>
    </div>
</div>

<?php } } else echo "Not found"; ?>