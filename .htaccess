RewriteEngine On

# This will allow to make requests to files that aren't .php
# -----------------------------------------------------------
# Not a directory
RewriteCond %{REQUEST_FILENAME} !-d
# Not a file
RewriteCond %{REQUEST_FILENAME} !-f
# Not a another thing
RewriteCond %{REQUEST_FILENAME} !-l
# -----------------------------------------------------------

# When you enter an URL, first will load index.php
RewriteRule ^(.*)$ index.php?url=$1 [L,QSA]