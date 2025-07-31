<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        if(isset($_POST['search']))
        {
            $search = htmlspecialchars(trim($_POST['search'])); 
            echo "<script>location.href = '../menu/index.php?search=$search'</script>" ;
        }
    }
?>