<?php
$dealer_network_field_content = get_field('dealer_network_field_content');
?>
<div class="dealer__network__wrapp">
    <div class="container">
        <div class="global__heading__wrapp">
            <?php if(!empty($dealer_network_field_content['dealer_network_title'])):?>
            <h2><?php echo $dealer_network_field_content['dealer_network_title'];?></h2>
            <?php endif;?>
           <?php echo apply_filters('the_content', $dealer_network_field_content['dealer_network_content']);?>
        </div>
        <div class="accordion" id="accordionExample">
           <?php if(!empty($dealer_network_field_content['locations_details'])): ?>
           <?php foreach($dealer_network_field_content['locations_details'] as $index => $listing): ?>
            <?php
            $collapse_id = 'collapse' . $index;
            $heading_id = 'heading' . $index;
            ?>
            <div class="accordion-item accordion__item">
                <h2 class="accordion-header accordion__header" id="<?php echo $heading_id; ?>">
                    <button class="accordion-button accordion__button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#<?php echo $collapse_id; ?>" aria-expanded="true" aria-controls="<?php echo $collapse_id; ?>">
                        <span><?php echo $listing['state_name']; ?></span>
                    </button>
                </h2>

                <div id="<?php echo $collapse_id; ?>" class="accordion-collapse collapse <?php echo $index == 0 ? 'show' : ''; ?>" aria-labelledby="<?php echo $heading_id; ?>"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body accordion__body">
                        <div class="table-responsive table__responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Store</th>
                                        <th>Location</th>
                                        <th>Contact No.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($listing['stores'])): ?>
                                        <?php foreach($listing['stores'] as $listing): ?>
                                            <tr>
                                                <td><?php echo $listing['store_name']; ?></td>
                                                <td><?php echo $listing['store_location']; ?></td>
                                                <td><?php echo $listing['contact_number']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>


