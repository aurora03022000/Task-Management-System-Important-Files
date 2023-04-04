@if(session('loggedIn') == 'yes')
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
            <div><i class="fa-solid fa-clipboard-list" style="font-size: 20px;"></i></div>
            <div style="font-size: 12px;">Task</div>
          </div>
        </a>
        
        <a href="#">
          <div class="employee-management">
            <div><i class="fa-solid fa-user-group" style="font-size: 20px; margin-bottom: 5px"></i></div>
            <div style="font-size: 12px;">Employee Management</div>
          </div>
        </a>

        <a href="#">
          <div class="employee-management">
            <div><i class="fa-solid fa-sliders" style="font-size: 20px; margin-bottom: 5px"></i></div>
            <div style="font-size: 12px; ">Controls</div>
          </div>
        </a>
      </div>
      <!-- Left Div -->

      <!-- Hamburger Button -->
      <div class="hamburger-button"><a id="hamburger-button"><i class="fa-solid fa-bars" style="font-size: 18px;"></i></a></div>
      <!-- Hamburger Button -->


      <!-- Right Div -->
      <div class="right-div">

        <!-- Header Div -->
        <header>
          <nav>
              <div class="seperator"></div>
              <div class="right-side-items">
                <div>
                  <a id="user-btn"><div class="user" style="display: flex">Admin <i class="fa-solid fa-caret-down" style="margin-top: 1px; margin-left: 5px; color: #236712; font-size: 13px; margin-top: 2px"></i></div></a>
                  <div class="below-user-div">
                      <a href="{{ route('logout') }}"><div>Logout <i class="fa-solid fa-power-off" style="margin-top: 4px; color: #236712; font-size: 10px"></i></div></a> 
                  </div>
                </div>
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
    const userBtn = document.querySelector('#user-btn');
    const hamburgerBtn = document.querySelector('#hamburger-button');
    const hamburgerBtnDiv = document.querySelector('.hamburger-button');
    const leftDiv = document.querySelector('#left-div');
    const userDiv = document.querySelector('.user-div');
    
    // User Click Event
    userBtn.addEventListener('click', function() {
      if(userClicked == false){
        userClicked = true
        $(".below-user-div").css({
          "display": "block"
        });
      }

      else{
        userClicked = false
        $(".below-user-div").css({
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
  @else
    <script>
        setTimeout(function() {
          window.parent.location = '{{ route('login') }}';
        }, 0);
    </script>
	@endif            