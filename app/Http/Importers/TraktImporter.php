<?php namespace Showhub\Http\Importers;

use Showhub\Show;

class TraktImporter implements Importer
{

    public function importShow()
    {

    }


    public function search($query)
    {
        return file_get_contents($this->getSearchUri($query));
    }

    private function convertShow($showObject)
    {
        $show = new Show;
        $show->slug = $showObject[''];
        $show->title = $showObject[''];
        $show->year = $showObject[''];
        $show->first_aired = $showObject[''];
        $show->first_aired_utc = $showObject[''];
        $show->genre = $showObject[''];
        $show->overview = $showObject[''];
        $show->country = $showObject[''];
        $show->runtime = $showObject[''];
        $show->status = $showObject[''];
        $show->network = $showObject[''];
        $show->air_day = $showObject[''];
        $show->air_day_utc = $showObject[''];
        $show->air_time = $showObject[''];
        $show->air_time_utc = $showObject[''];
        $show->certification = $showObject[''];
        $show->imdb_id = $showObject[''];
        $show->tvdb_id = $showObject[''];
        $show->tvrage_id = $showObject[''];
        $show->poster = $showObject[''];
        $show->images = $showObject[''];
        $show->people = $showObject[''];
        $show->last_update = $showObject[''];
        $show->trakt_last_update = $showObject[''];
        $show->trakt_url = $showObject[''];
    }

    private function getSearchUri($query)
    {
        return getenv("TRAKT_BASEURL").getenv("TRAKT_APIKEY")."?seasons=seasons&query=".urlencode($query);
    }
} 