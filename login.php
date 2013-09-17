<?

if(isset($authUrl)) //user is not logged in, show login button
{
    echo '<a class="login" href="'.$authUrl.'"><img src="images/google-login-button.png" /></a>';
}
else // user logged in
{
   /* connect to mysql */
    

    //compare user id in our database
    $result = mysql_query("SELECT COUNT(id) FROM users WHERE id=$user_id");
    if($result === false) {
        die(mysql_error()); //result is false show db error and exit.
    }

    $UserCount = mysql_fetch_array($result);

    if($UserCount[0]) //user id exist in database
    {
        echo 'Welcome back '.$user_name.'!';
    }else{ //user is new
        echo 'Hi '.$user_name.', Thanks for Registering!';
        @mysql_query("INSERT INTO users (id, name, email, google_link, google_picture_link) VALUES ($user_id, '$user_name','$email','$profile_url','$profile_image_url')");
    }


    echo '<br /><a href="'.$profile_url.'" target="_blank"><img src="'.$profile_image_url.'?sz=50" /></a>';
    echo '<br /><a class="logout" href="?reset=1">Logout</a>';

    //list all user details
    echo '<pre>';
    print_r($user);
    echo '</pre>';
}

echo '</body></html>';
?>