<style>
  #debug{
    border: 5px solid white;
    position: fixed;
    right: -350px;
    top: 5px;
    bottom: 5px;
    width: 510px;
    font-size: 11px;
    background: white;
    overflow: auto;
    opacity: 0.5;
    -webkit-transition-duration: 800ms;
    -webkit-transition-property: right,opacity;
    -webkit-transition-function: ease;
    -o-transition-duration: 800ms;
    -o-transition-property: right,opacity;
    -o-transition-function: ease;
    -moz-transition-duration: 800ms;
    -moz-transition-property: right,opacity;
    -moz-transition-function: ease;
    transition-duration: 800ms;
    transition-property: right,opacity;
    transition-function: ease;
  }

  #debug:hover{
    right: 0px;
    opacity: 1;

  }
  #debug h2{
    background: grey;
    color:white;
    font-size: 14px;
    font-weight: normal;
    margin: 0px;
    padding: 1px 5px;
  }
  #debug>div{
    overflow: auto;
  }
  #debug pre{
    margin: 0px;
    overflow: auto;
  }
</style>
<div id="debug">
  <div>
    <h2>_GET</h2>
    <pre>
      <?php var_dump($_GET); ?>
    </pre>
  </div>
  <div>
    <h2>_REQUEST</h2>
    <pre>
      <?php var_dump($_REQUEST); ?>
    </pre>
  </div>
  <div>
    <h2>_POST</h2>
    <pre>
      <?php var_dump($_POST); ?>
    </pre>
  </div>
  <div>
    <h2>_COOKIE</h2>
    <pre>
      <?php var_dump($_COOKIE); ?>
    </pre>
  </div>
  <div>
    <h2>_SESSION</h2>
    <pre>
      <?php var_dump($_SESSION); ?>
    </pre>
  </div>
  <div>
    <h2>_SERVER</h2>
    <pre>
      <?php var_dump($_SERVER); ?>
    </pre>
  </div>

</div>
