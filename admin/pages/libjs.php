<!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- my table -->
    <script src="../dist/js/mytable.js"></script>
    
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <script src="../tinymce/tinymce.min.js" type="text/javascript" ></script>

 <!--    #deny from all
#DirectoryIndex home.php
#redirect /forum/home.php http://forumtkt.byethost12.com/
#Redirect 301  /forum/home.php http://forumtkt.byethost12.com/
#Redirect 301 /index.php /forum/home.php
#RewriteRule ^(([^/]+/)*[^.]+)$ /$1.php#/ [L]
#RewriteRule ^forum/(.+)$ http://forumtkt.byethost12.com/$1[R=301,L]
#RewriteRule ^(.*)$ http://forumtkt.byethost12.com/$1[R=301,L]
#Redirect 301 / http://forumtkt.byethost12.com/
#chuyen domain vao thu muc file home.php trong thu muc forum
#RewriteEngine On
#RewriteCond %{HTTP_HOST} ^forumtkt.byethost12\.com/forum/home.php$ [OR]
#RewriteCond %{HTTP_HOST} ^www\.forumtkt.byethost12\.com/forum/home.php$
#RewriteCond %{REQUEST_URI} !^/forum/home.php/
#RewriteRule (.*) /forum/home.php/$1

#RewriteEngine On
#RewriteRule ^([a-zA-Z0-9_-]+)$ topic.php?idtopic=$1
#RewriteRule ^([a-zA-Z0-9_-]+)/$ topic.php?idtopic=$1


htdocs
#deny from all
#DirectoryIndex /forum/home.php
#redirect /forum/home.php http://forumtkt.byethost12.com/
#Redirect 301  /forum/home.php http://forumtkt.byethost12.com/
#Redirect 301 /index.php /forum/home.php
#RewriteRule ^(([^/]+/)*[^.]+)$ /$1.php#/ [L]
#RewriteRule ^(.*)$ http://forumtkt.byethost12.com/$1[R=301,L]
#Redirect 301 / http://forumtkt.byethost12.com/

#chuyen domain vao thu muc file home.php trong thu muc forum
RewriteEngine On
RewriteCond %{HTTP_HOST} ^forumtkt.byethost12\.com$ [OR]
RewriteCond %{HTTP_HOST} ^www\.forumtkt.byethost12\.com$
RewriteCond %{REQUEST_URI} !^/forum/home.php/
RewriteRule (.*) /forum/home.php/$1

#bo chu forum tren domain
#RewriteEngine on
#RewriteRule ^forum/(.+)$ http://forumtkt.byethost12.com/$1[R=301,L]

#viet lai url cho dep
#RewriteEngine on
#RewriteRule ^topic/([a-zA-Z0-9_-]+)/([0-9]+)\.html$ topic.php?idtopic=$2\#\/
#RewriteEngine On
#RewriteRule ^([a-zA-Z0-9_-]+)$ topic.php?idtopic=$1
#RewriteRule ^([a-zA-Z0-9_-]+)/$ topic.php?idtopic=$1 -->