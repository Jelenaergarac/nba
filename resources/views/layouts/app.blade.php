<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nba</title>
</head>
<body>
    <style>/* Add a black background color to the top navigation */
        .topnav {
          background-color: blue;
          overflow: hidden;
        }
        
        /* Style the links inside the navigation bar */
        .topnav a {
          float: left;
          color: yellow;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
          font-size: 17px;
        }
        .topnav button {
          float: left;
          color: yellow;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
          font-size: 17px;
        }
        
        /* Change the color of links on hover */
        .topnav a:hover {
          background-color: #ddd;
          color: black;
        }
        
        /* Add a color to the active/current link */
        .topnav a.active {
          background-color: red;
          color: white;
        }</style>
    <div class="topnav">
      @auth
        
     
        <a class="active" href="/">Home</a>
        <a href="/">Teams</a>
        <a href="/players">Players</a>
        <form method="POST" action="/logout">
          @csrf
          <button class="topnav" type="submit">Logout</button>
      </form>
      @endauth
      @guest
      <a href="/register">Register</a>
      <a href="/login">Login</a>
      @endguest
     
     
      </div>
    @yield('content')
</body>
</html>