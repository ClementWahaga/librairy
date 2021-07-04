<?php
require 'functions.php';
require 'db.php'
?>

<?php echo template_header('Read'); ?>
       
        <body>
        <div class="cont">
           
            <form action="inscription_token.php" method="post">
                <h2 class="text-center">Inscription</h2>       
                
                    <input type="text" name="Nom"  placeholder="Nom" required="required" autocomplete="off"><br><br>
                    <input type="text" name="Prenom"  placeholder="Prenom" required="required" autocomplete="off"><br><br>
                    <input type="Number" name="NbLivreEmprunte"  placeholder="" required="required" autocomplete="off"><br><br>
                    <button type="submit" class="btn btn-primary btn-block">Inscription</button>
                   
            </form>
        </div>
        
        </body>
 <?php echo template_footer(); ?>