<div class="row">
    <div class=" col-sm-12 col-md-8 bidders">
        <div class="bidders-head">
            <span>BIDS (<?php echo $this->bid_model->count_bid($post_id); ?>)</span>
        </div>
            <?php 
                if($bids != false)
                {

                    foreach($bids as $bids)
                    { 
                        $user = $this->users_model->get_user_data($bids['user_id']);
                        $post = $this->post_model->get_single_post_by_id($bids['post_id']);
                        ?>
                        <div class="row bids">
                            <div class="col-md-3">
                                <div class="box">
                                    <img src="<?php echo $user['image_url']; ?>" width="100"  alt="No Image" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="box">
                                    <p class="title"><?php echo $post['job_title']; ?></p>
                                    <div class="detail">
                                        <label>Name:</label><span class="name"><?php echo $user['display_name']; ?></span>
                                    </div>
                                    <div class="detail">
                                        <label>Phone:</label><span class="phone"><?php echo $user['phone']; ?></span>
                                    </div>
                                    <div class="detail">
                                        <label>Email:</label><span class="email"><?php echo $user['email']; ?></span>
                                    </div>
                                    <div class="detail">
                                        <label>Address: </label><span class="address"><?php echo $user['address']; ?></span>
                                    </div>
                                    <div class="detail">
                                        <label>Profession: </label><span class="profession"><?php echo $user['profession']; ?></span>
                                    </div>
                                    <div class="detail">
                                        <label>Verified?: </label><span class="verified"><?php echo $user['verified']; ?></span>
                                    </div>
                                    <div class="bid">
                                        <p><?php echo $bids['bid']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr/>
                    <?php
                    }
                } 
                else
                {
                    echo 'Sorry, no bids yet!';
                }
                ?> 
    </div>
</div>
