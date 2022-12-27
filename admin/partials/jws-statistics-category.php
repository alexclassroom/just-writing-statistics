<?php

/**
 * Provide an admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link  https://toolstack.com/just-writing-statistics
 * @since 3.0.0
 *
 * @package    Just_Writing_Statsitics_Pro
 * @subpackage Just_Writing_Statsitics_Pro/admin/partials
 */

?>

    <div class="full">
        <h3><?php _e('Category Statistics', 'just-writing-statistics'); ?></h3>

        <div class="jws-table">
            <table class="widefat jws-post-type-stats">
                <thead>
                    <tr class="jws-table-stats-header-one">
                        <th></th>
                        <th></th>
                        <?php foreach ($arr_jws_post_types as $index => $post_type) : ?>
                        <th colspan="3" class="jws-post-type"><?php echo $post_type['plural_name']; ?></th>
                        <?php endforeach; ?>
                    </tr>

                    <tr class="jws-table-stats-header-two">
                        <th><?php _e('Category', 'just-writing-statistics'); ?></th>
                        <th><?php _e('Words', 'just-writing-statistics'); ?></th>
                        <?php foreach ($arr_jws_post_types as $index => $post_type) : ?>
                        <th><?php _e('Published', 'just-writing-statistics'); ?></th>
                        <th><?php _e('Scheduled', 'just-writing-statistics'); ?></th>
                        <th><?php _e('Unpublished', 'just-writing-statistics'); ?></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>

                <tbody>
                    <?php $jws_counter_monthly_statistics = 0; ?>
                    <?php foreach ($arr_jws_categories as $category_name => $category) : ?>

                        <?php echo '<tr'.($jws_counter_monthly_statistics % 2 == 1 ? '' : " class='alternate'").'>'; ?>
                        <td><nobr><?php echo $category_name; ?></td>
                        <td><?php echo number_format($category['total']); ?></td>
                        <?php foreach ($arr_jws_post_types as $index => $post_type) : ?>
                        <td>
                            <?php echo (isset($category[$index]['published']['posts']) ? number_format(0 + $category[$index]['published']['posts']) : '0'); ?> <?php _e('Total', 'just-writing-statistics'); ?><br />
                            <?php echo (isset($category[$index]['published']['word_count']) ? number_format(0 + $category[$index]['published']['word_count']) : '0'); ?> <?php _e('Words', 'just-writing-statistics'); ?><br />
                            <?php if (isset($category[$index]['published']['posts']) && $category[$index]['published']['posts'] != 0) : ?>
                                <?php echo number_format(round(0 + ($category[$index]['published']['word_count'] / $category[$index]['published']['posts']))); ?> <?php _e('Average', 'just-writing-statistics'); ?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php echo (isset($category[$index]['scheduled']['posts']) ? number_format(0 + $category[$index]['scheduled']['posts']) : '0'); ?> <?php _e('Total', 'just-writing-statistics'); ?><br />
                            <?php echo (isset($category[$index]['scheduled']['word_count']) ? number_format(0 + $category[$index]['scheduled']['word_count']) : '0'); ?> <?php _e('Words', 'just-writing-statistics'); ?><br />
                            <?php if (isset($category[$index]['scheduled']['posts']) && $category[$index]['scheduled']['posts'] != 0) : ?>
                                <?php echo number_format(round(0 + ($category[$index]['scheduled']['word_count'] / $category[$index]['scheduled']['posts']))); ?> <?php _e('Average', 'just-writing-statistics'); ?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php echo (isset($category[$index]['unpublished']['posts']) ? number_format(0 + $category[$index]['unpublished']['posts']) : '0'); ?> <?php _e('Total', 'just-writing-statistics'); ?><br />
                            <?php echo (isset($category[$index]['unpublished']['word_count']) ? number_format(0 + $category[$index]['unpublished']['word_count']) : '0'); ?> <?php _e('Words', 'just-writing-statistics'); ?><br />
                            <?php if (isset($category[$index]['unpublished']['posts']) && $category[$index]['unpublished']['posts'] != 0) : ?>
                                <?php echo number_format(round(0 + ($category[$index]['unpublished']['word_count'] / $category[$index]['unpublished']['posts']))); ?> <?php _e('Average', 'just-writing-statistics'); ?>
                            <?php endif; ?>
                        </td>
                        <?php endforeach; ?>
                    </tr>

                        <?php $jws_counter_monthly_statistics++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>