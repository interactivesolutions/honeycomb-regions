<?php

//TODO check if not exists
function getRinvexCountryIDs()
{
    $countries = [];

    $files = File::allFiles((base_path() .'/vendor/rinvex/country/resources/data'));

    foreach($files as $file)
    {
        $id = substr($file->getFilename(), 0, -5);

        if (strlen($id) == 2)
            $countries[] = $id;
    }

    return $countries;
}