
    <div class="container margin-bottom">

      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Hotels</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav selector flex">
              <li><a href="/hotels/all">All hotels</a></li>
              <li><a href="/hotels/random">Random Hotel</a></li>
              <li><a href="/about">About</a></li>

              @if(isset($user))
                @if($user->profile_type == 'sell')
                  <li><a href="/hotels/create">Add Hotel</a></li>              
                @endif
              @endif

            </ul>
            <ul class="nav navbar-nav navbar-right">
              @if(!Auth::check())
                <li class="navbar-right"><a href="{{ route('register') }}">Register</a></li>
                <li class="navbar-right"><a href="{{ route('login') }}">Login</a></li>
              @else
                <li class="dropdown navbar-right">
                <a href="#" class="dropdown-toggle profile-menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" name="stars">
                  
                  <div class="profile-button">
                    <span class="welcome-message">Welcome, {{ Auth::user()->name }}</span>
                  </div>
                  
                  <div class="image-wrapper-thumb">
                    <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}">
                  </div>

                  <div class="profile-button">
                    <span class="caret"></span>
                  </div>
                </a>

                  <ul class="dropdown-menu">
                    <li><a href="/profile/main">Profile</a></li>
                    @if(isset($user))
                      @if($user->profile_type == 'sell')
                        <li><a href="/hotels/create">Add Hotel</a></li>              
                      @endif
                    @endif
                    <li><a href="/logout">Log out</a></li>
                  </ul>
                </li>
              @endif
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

    </div> <!-- /container -->