<div class="listcat">
                <?php
                $categories = get_categories();
                    foreach($categories as $category) {
                       echo '<ul><li><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li></ul>';
                    }
                ?>
            </div>
<?php
$args = array(
            'number'     => $number,
            'orderby'    => $orderby,
            //'name' => 'select_name',
            //'id' => 'select_name',
            'order'      => $order,
            'hide_empty' => false,
            'include'    => $ids,
            'hierarchical' => true
            );

$product_categories = get_terms( 'product_cat', $args );
My markup:
?>
<select name='categorylist'>    
   <?php foreach($product_categories as $cat) {
      echo "<option value='{$cat->name}'>{$cat->name}</option>"; 
   } ?>

<?php   
    $arr = get_categories();
    echo "<select name='categorylist'>";
    foreach($arr as $option){
        echo "<option value='{$option}'>{$option->name}</option>";   
    }
    echo "</select>";
?>

<select name="event-dropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'> 
    <option value=""><?php echo esc_attr(__('Select Category')); ?></option> 

    <?php 
        $option = '<option value="' . get_option('home') . '/category/">All Categories</option>'; // change category to your custom page slug
        $categories = get_categories(); 
        foreach ($categories as $category) {
            $option .= '<option value="'.get_option('home').'/category/'.$category->slug.'">';
            $option .= $category->cat_name;
            $option .= ' ('.$category->category_count.')';
            $option .= '</option>';
        }
        echo $option;
    ?>
</select>