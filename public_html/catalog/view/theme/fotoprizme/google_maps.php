<?php
    $URL = "https://www.google.com/maps/embed/v1/place?q=Architektų+g.+18,+Vilnius+04112+&key=AIzaSyCOVSz216QtWDooaEv-bPCu24giF13RT7I";
    $domain = file_get_contents($URL);
    echo $domain;
