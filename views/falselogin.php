<?php require_once('layouts/header.php');?>
        <style>
            html,body{
                margin:0;
                padding:0;
                display:flex;
                justify-content:center;
                align-items:center;
                background-color:salmon;
                font-family:"Quicksand", sans-serif;

            }

            #container_anim{
                position:relative;
                width:100%;
                height:70%;
            }

            #key{
                position:absolute;
                top:77%;
                left:-33%;
            }

            #text{
            font-size:4rem;
            position:absolute;
            top:30%;
            width:100%;
            text-align:center;
            }

            #credit{
                position:absolute;
                bottom:0;
                width:100%;
                text-align:center;
                bottom:
            }

            a{
                color: rgb(115,102,102);
            }
        </style>
    </head>
    <body>
        
    
<div id="container_anim">
       
    </div>
    <p></p>
    <p id="text">Je hebt te vaak fout ingelogd!<br><br>Wacht nog <?=$min?>:<?=$sec?></p>
    <?php header("Refresh:0");  ?>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>