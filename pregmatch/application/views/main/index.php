
<section id="main" class='center'>
    <li id="clients">
        <section class="fix-bottom-left">CLIENTS</section>        
    </li>
    <li id="about">
         <section class="fix-bottom-left">ABOUT US</section>  
    </li>
    <li id="services">
         <section class="fix-bottom-left">SERVICES</section>  
    </li>
    <li id="contact_us">
         <section class="fix-bottom-left">CONTACT US</section>  
    </li>
</section>
 
<div ng-controller="todoCTRL">
      <!--   {{totalme}}-->
            <br>
           
          <section ng-repeat="person in people">
         <!-- <li>{{person.name}}</li> -->
          </section>
        </div>
        
        <div ng-controller="listpost">
          <section ng-repeat="post in bpost">
          <li>{{post.title}}</li>
          <li>{{post.date}}</li>
          <li>{{post.postID}}</li>
          <br>
          </section>
        </div>

<div ng-controller="postbyid">
    <button ng-click="singlepost()">Click me</button><input type='text' ng-model='meid' />
    <br>
    {{spost.title}}
    <br>
    {{spost.postID}}
    <br>
     {{spost.date_added}}
     
     
     <!--{{singlepostauto()}} -->
    </div>


   
  
 


