<?php

    include_once 'header.php';

?>



<div >
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos distinctio voluptatem necessitatibus ullam ea obcaecati, cumque alias voluptas ad aut nulla similique perspiciatis nemo doloremque, fuga velit quasi, incidunt expedita!</p>
    <?php
        if (isset($_SESSION["useruid"])) {
            echo "<p>Hello there " . $_SESSION["useruid"] . "!</p>";
        }
    ?>
</div>


<?php

    include_once 'footer.php';

?>