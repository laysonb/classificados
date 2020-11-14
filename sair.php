<?php

session_start();
unset($_SESSION['clogin']);
header("Location: ./");