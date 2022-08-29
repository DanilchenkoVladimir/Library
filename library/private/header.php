<?php
$path=$_SERVER['DOCUMENT_ROOT'];

?>
<!-- <nav>
    <div class="nav-wrapper ">
      <a href="/index" class="brand-logo">Logo</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="/public/signup.php">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">JavaScript</a></li>
      </ul>
    </div>
</nav> -->



<nav class="nav-extended ">
    <div class="nav-wrapper teal lighten-1">
      <a href="/main" class="brand-logo">Библиотека БУКИНИСТ</a>
      
    </div>

    <div class="btn__plate">
    <div class="fixed-action-btn horizontal click-to-toggle">
    <a class="btn-floating btn-large red">
      <i class="material-icons">menu</i>
    </a>
    <ul>
      <li><a class="btn-floating red"><i class="material-icons">insert_chart</i></a></li>
      <li><a class="btn-floating yellow darken-1"><i class="material-icons">format_quote</i></a></li>
      <li><a class="btn-floating green"><i class="material-icons">publish</i></a></li>
      <li><a class="btn-floating blue"><i class="material-icons">attach_file</i></a></li>
    </ul>
  </div>
    </div>

    <div class="nav-content teal lighten-1">
      
        <div class="row">
    <div class="col s12 m6">
      <div class="card blue-grey darken-1">
        <div class="card-content white-text">
          <span class="card-title">Card Title</span>
                <?
     if(isset($_SESSION['login'])){
        

        echo   $_SESSION['login'];
    }
?>
         
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
        <div class="card-action">
          <a href="#">This is a link</a>
          <a href="#">This is a link</a>
        </div>
      </div>
    
  </div>

      </div>
      <span class="nav-title"></span>
      <a class="btn-floating btn-large halfway-fab waves-effect waves-light teal" href="/signup">
        <i class="material-icons">add</i>
      </a>
      <a class="mybtn btn-floating btn-large halfway-fab waves-effect waves-light teal" href="/login">
        <i class="material-icons">add</i>
      </a>
      
    </div>

    
</nav>


