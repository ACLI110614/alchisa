<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script src="/assets/js/ngset.js"></script>
ANGULAR TESTING<br>
<div ng-controller='firstcontroller'>
    <input type='text' ng-model='search'>
<section ng-repeat='post in posting | filter:search'>
    <li>{{post.title}}</li>
    
</section>    
    
    
</div>

<div ng-controller='secondcontroller'>
    
    <h1>{{alfie}}</h1>
</div>

<div ng-controller='thirdcontroller'>
    
    <h1>{{alfie}}</h1>
</div>

