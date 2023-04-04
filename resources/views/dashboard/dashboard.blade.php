<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
  <link rel="stylesheet" href="{{ asset('css/font-awesome/css/all.css') }}">
</head>
<body>  
  <div class="main-div">

    <!-- Left Div -->
    <div id="left-div" class="left-div">
      <div class="logo"><img src="{{ asset('img/logo.png') }}" alt="" style="width: 80px; height 80px"></div>
      
      <a href="#">
        <div class="task">
          <div><i class="fa-solid fa-clipboard-list" style="font-size: 20px; color: #236712"></i></div>
          <div style="font-size: 12px; color: #236712">Task</div>
        </div>
      </a>
      
      <div class="employee-management">
          <a href="#">
            <div><i class="fa-solid fa-user-group" style="font-size: 20px; color: #236712; margin-bottom: 5px"></i></div>
            <div style="font-size: 12px; color: #236712">Employee Management</div>
          </a>
      </div>

      <div class="employee-management">
          <a href="#">
            <div><i class="fa-solid fa-sliders" style="font-size: 20px; color: #236712; margin-bottom: 5px"></i></div>
            <div style="font-size: 12px; color: #236712">Controls</div>
          </a>
      </div>
    </div>
     <!-- Left Div -->

    <!-- Hamburger Button -->
     <div class="hamburger-button"><a id="hamburger-button"><i class="fa-solid fa-bars" style="font-size: 25px;"></i></a></div>
    <!-- Hamburger Button -->


    <!-- Right Div -->
    <div class="right-div">

      <!-- Header Div -->
      <header>
        <nav>
            <div class="seperator"></div>
            <div class="right-side-items">
              <div>
                <a id="user" style="margin-right: 5px; font-size: 13px">Admin <i class="fa-solid fa-caret-down" style="margin-top: 2px; margin-left: 5px; color: #236712; font-size: 13px"></i></a>
                <div id="logout" style="padding-top: 10px; display: none; position: absolute">
                  <a style="font-size: 13px">Logout <i class="fa-solid fa-power-off" style="margin-top: 4px; margin-left: 5px; color: #236712; font-size: 10px"></i></a>
                </div>
              </div>
              <a style="margin-left: 20px"><i class="fa-solid fa-bell" style="margin-top: 2px; font-size: 13px; color: #236712"></i></a>
            </div>
        </nav>
      </header>
      <!-- Header Div -->

      
      <!-- Contents -->
      <div class="contents">
        <iframe>

        </iframe>
      </div>
      <!-- Contents -->
      
    </div>
    <!-- Right Div -->

  </div>
</body>

<script>
  var greaterThanMinWidth = false;
  var userClicked = false;
  var hamburgerClicked = false;
  const userBtn = document.querySelector('#user');
  const hamburgerBtn = document.querySelector('#hamburger-button');
  const hamburgerBtnDiv = document.querySelector('.hamburger-button');
  const leftDiv = document.querySelector('#left-div');
  
  // User Click Event
  userBtn.addEventListener('click', function() {
    if(userClicked == false){
      userClicked = true
      $("#logout").css({
        "display": "block"
      });
    }

    else{
      userClicked = false
      $("#logout").css({
        "display": "none"
      });
    }
    
  });

  function handleResize() {
    const width = window.innerWidth;
    const height = window.innerHeight;

    hamburgerClicked = false;

    if(width >= 750 && greaterThanMinWidth == false){
        greaterThanMinWidth = true;
        hamburgerBtnDiv.classList.remove('moveLeft');
        leftDiv.classList.remove('hide');
        hamburgerBtnDiv.classList.add('hide');
    }

    else if(width < 750 && greaterThanMinWidth == true){
        hamburgerBtnDiv.classList.remove('hide');
        greaterThanMinWidth = false;
        hamburgerBtnDiv.classList.remove('moveRight');
        leftDiv.classList.remove('show');
    }
  }

  // Hamburger Click Event
  hamburgerBtn.addEventListener('click', function() {
      if(hamburgerClicked == false){
        hamburgerClicked = true;

        hamburgerBtnDiv.classList.remove('hide');

        hamburgerBtnDiv.classList.remove('moveLeft');
        leftDiv.classList.remove('hide');

        hamburgerBtnDiv.classList.add('moveRight');
        
        setTimeout(function() {
          leftDiv.classList.add('show');
        }, 0);
      }

      else{
        hamburgerClicked = false;

        hamburgerBtnDiv.classList.remove('hide');

        hamburgerBtnDiv.classList.remove('moveRight');
        
        hamburgerBtnDiv.classList.add('moveLeft');

        setTimeout(function() {
          leftDiv.classList.add('hide');
        }, 0);
      }
    });

  window.addEventListener('resize', handleResize);

</script>

</html>
                