<?php
session_start(); // Clear session.
session_destroy(); // Clear session
header("Location:http://localhost/meetingroom/index.html");
