<?php $title = 'Mentions légales'; ?>

<?php ob_start(); ?>

<div class="main_content">
    <div class="container text-center">
        
        <div class="mentions row">    
            <h1>Mentions légales </h1>
            <p>Le présent site web est mis en ligne et opéré par les personnnes suivantes :</p>
        </div>

        <div class="mentions row">
            <h2>Editeur </h2>
            <address>
                <p><strong>Jean FORTEROCHE SAS</strong> (Société par actions simplifiée)<br /> 
                au capital social de 4 234 120 euros <br />
                Inscrite au RCS de Paris sous le numéro 622 012 987<br />
                Dont le siège social est situé 12, Avenue des écrivains 75013 Paris<br />
                Tél. +33 [0]1 44 16 07 18<br />
                Président : Jean FORTEROCHE</p>
            </address>
        </div>

        <div class="mentions row">
            <h2>Design & développement </h2>
            <address>
                <p><strong>DIGITALIZER</strong><br />   
                21, rue Léonard de Vinci<br />    
                75004 PARIS<br />    
                Tél. : 07 23 45 91 34</p>
            </address>
        </div>

        <div class="mentions row">
            <h2>Hébergement </h2>
            <address>
                <p><strong>1&1 Internet SARL FRANCE</strong><br />   
                Siège social :<br />
                7, place de la Gare <br />
                57200 SARREGUEMINES</p>
            </address>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
