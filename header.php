<?php
require 'inc/dbconnect.inc.php';
require 'inc/functions.inc.php';

#Get Page Information
$currentFile = $_SERVER["PHP_SELF"];
$parts = Explode('/', $currentFile);
$current_page =  $parts[count($parts) - 1];

########## Google Settings.. Client ID, Client Secret #############
$google_client_id   = '724639791771.apps.googleusercontent.com';
$google_client_secret   = '4UowJP6gOcMCFDH4Eyt0xt1D';
$google_redirect_url    = 'http://localhost/aus/ve/';
$google_developer_key   = 'AIzaSyDzlFyKoeGFhOOU-PK2WxMsFSfoWoI0M9s';

//include google api files
require_once 'inc/google/Google_Client.php';
require_once 'inc/google/contrib/Google_Oauth2Service.php';

//start session
session_start();

$gClient = new Google_Client();
$gClient->setApplicationName('AUS VE Platform');
$gClient->setClientId($google_client_id);
$gClient->setClientSecret($google_client_secret);
$gClient->setRedirectUri($google_redirect_url);
$gClient->setDeveloperKey($google_developer_key);
if ($gClient->getAccessToken()) {
           $token = $gClient->getAccessToken();
           $authObj = json_decode($token);
           $refreshToken = $authObj->refresh_token;
        }

$google_oauthV2 = new Google_Oauth2Service($gClient);

//If user wish to log out, we just unset Session variable
if (isset($_REQUEST['reset']))
{
  unset($_SESSION['token']);
  $gClient->revokeToken();
  header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL));
}

if (isset($_GET['code']))
{
    $gClient->authenticate($_GET['code']);
    $_SESSION['token'] = $gClient->getAccessToken();
    header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL));
    return;
}


if (isset($_SESSION['token']))
{
        $gClient->setAccessToken($_SESSION['token']);
}


if ($gClient->getAccessToken())
{
      //Get user details if user is logged in
      $user                 = $google_oauthV2->userinfo->get();
      $user_id              = $user['id'];
      $user_name            = filter_var($user['name'], FILTER_SANITIZE_SPECIAL_CHARS);
      $email                = filter_var($user['email'], FILTER_SANITIZE_EMAIL);
      $profile_url          = filter_var($user['link'], FILTER_VALIDATE_URL);
      $profile_image_url    = filter_var($user['picture'], FILTER_VALIDATE_URL);
      $personMarkup         = "$email<div><img src='$profile_image_url?sz=50'></div>";
      $_SESSION['token']    = $gClient->getAccessToken();
}
else
{
    //get google login url
    $authUrl = $gClient->createAuthUrl();
}

if(!isset($authUrl)) {
  $result = mysql_query("SELECT COUNT(id) FROM users WHERE id=$user_id");
  if($result === false) {
    die(mysql_error()); //result is false show db error and exit.
  }

  if(mysql_num_rows($result) == 0) {
  } else {
      @mysql_query("INSERT INTO users (id, name, email, google_link, google_picture_link) VALUES ($user_id, '$user_name','$email','$profile_url','$profile_image_url')");
  }

  $result = mysql_query("SELECT * FROM users WHERE id=$user_id");
  if($result === false) {
    die(mysql_error()); //result is false show db error and exit.
  }

  $user_details = mysql_fetch_assoc($result);
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AUS VE</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/jquery.jgrowl.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">VE Platform</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
          </ul>
          <ul class="nav navbar-nav pull-right">
            <li>
              <?php
                if(isset($authUrl)) //user is not logged in, show login button
                {
                  echo '<a href="'.$authUrl.'">Login with Google</a>';
                }
                else
                {
                  echo '<a href="profile.php">'.$user_name.'</a>';
                }
              ?>
            </li>
            <li>
              <?php
                if(!isset($authUrl))
                {
                  echo '<a class="logout" href="?reset=1">Logout</a>';
                }
              ?>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <input type="hidden" value="<?php echo $user_id; ?>" id="userid">