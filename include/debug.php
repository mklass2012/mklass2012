<style>
  #debug{
    position: fixed;
    right: -250px;
    top: 5px;
    bottom: 5px;
    width: 410px;
    font-size: 11px;
    background: white;
    overflow: auto;
  }
  #debug:hover{
    right: 0px;
  }
  #debug h2{
    background: grey;
    color:white;
    font-weight: bold;
    margin: 0px;
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
