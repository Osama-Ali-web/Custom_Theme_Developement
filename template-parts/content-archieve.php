<?php

get_header();

?>


<div class="container">

    <?php
    the_content();
    ?>

    <?php
    comments_template();
    ?>


</div>

<?php
get_footer();


?>