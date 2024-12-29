<?php

require_once '../models/Movie.php';
require_once '../models/Category.php';
require_once '../models/MovieCategory.php';
require_once '../models/Rating.php';
require_once '../models/User.php';

session_start();

require_once '../Flash.php';
require_once '../common.php';
require_once '../database.php';
require_once '../Validation.php';
require_once '../routes.php';