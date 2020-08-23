<p>
  Hello <a href="tutorial">Tutorial</a>
  <p>

    Code to hide .php extension
    
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^([^\.]+)$ $1.php [NC,L] 