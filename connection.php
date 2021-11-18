<?php
    $conn = pg_connect('postgres://fnwbbbxknyciwb:6cb848e72cea786f6a7501c4f6cc9c3fd39078d9531d228fd9232dc4f6b4730e@ec2-52-201-195-11.compute-1.amazonaws.com:5432/d2movbguiklpcm')
            or die ("Can not connect  database".pg_connect_error());
?>