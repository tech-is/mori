<?php
isset($_SESSION['mail']) ? header('Location: main.php'): header('Location: Login.php');