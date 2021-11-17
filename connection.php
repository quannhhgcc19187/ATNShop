<?php
    $conn = pg_connect('postgres://tpcsgbphsxakqe:db41d3e0cf4b84ca7cc51caef4063a5c09488f82ee41a35a8aa9a1693d03aab0@ec2-34-224-239-147.compute-1.amazonaws.com:5432/dekvsl5h03v2s5')
            or die ("Can not connect database".pg_connect_error());
?>