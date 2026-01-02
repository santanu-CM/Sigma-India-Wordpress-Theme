<?php
$e_waste_management_content = get_field('e_waste_management_content');
?>

<div class="section__global__wrapp inner__page__content__wrapp cms__content__wrapp">
    <div class="container">
        <?php if(!empty($e_waste_management_content['responsibility_content'])):?>
        <?php echo apply_filters('the_content', $e_waste_management_content['responsibility_content']);?>
        <?php endif;?>
        <div class="table-responsive table__responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Do’s</th>
                        <th>Dont’s</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($e_waste_management_content['dos_and_dont_details'])):?>
                    <?php foreach($e_waste_management_content['dos_and_dont_details'] as $listing):?>
                    <tr>
                        <td><?php echo $listing['dos_content'];?></td>
                        <td><?php echo $listing['dont_content'];?></td>
                    </tr>
                    <?php endforeach;?>
                    <?php endif;?>
                </tbody>
            </table>
        </div>

        <div class="inner__content__holder">
            <?php if(!empty($e_waste_management_content['collections_point_title'])):?>
            <h3><?php echo $e_waste_management_content['collections_point_title'];?></h3>
            <?php endif;?>
            <?php echo apply_filters('the_content',$e_waste_management_content['collections_point_content']);?>
            <div class="inner__content__holder__small">
                <?php if(!empty($e_waste_management_content['procedure_title'])):?>
                <h3><?php echo $e_waste_management_content['procedure_title'];?></h3>
                <?php endif;?>
                <?php if(!empty($e_waste_management_content['steps_image'])):?>
                <img src="<?php echo $e_waste_management_content['steps_image'];?>" alt="" />
                <?php endif;?>
                <?php echo apply_filters('the_content', $e_waste_management_content['procedure_content']);?>
            </div>
        </div>
    </div>
</div>