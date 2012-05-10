<?php

namespace OpenTok;

use OpenTok\API_Config as API_Config;

class OpenTokArchive {

    private $archiveId;

    private $archiveTitle;

    //Array of resources listed in this Manifest
    private $resources = array();

    //Array of the timeline from the Manifest file
    private $timeline = array();

    public function __construct($archiveId, $archiveTitle, $resources, $timeline) {
        $this->archiveId = $archiveId;
        $this->archiveTitle = $archiveTitle;
        $this->resources = $resources;
        $this->timeline = $timeline;
    }

    /*************/
    ////Getters///
    /*************/
    public function getId() {
        return $this->archiveId;
    }

    public function getTitle() {
        return $this->archiveTitle;
    }

    public function getResources() {
        return $this->resources;
    }

    public function getTimeline() {
        return $this->timeline;
    }

    /*************/
    ////Public FNs/
    /*************/
    public function downloadArchiveURL($videoId) {
        return API_Config::API_SERVER . '/archive/url/'.$this->archiveId.'/'.$videoId;
    }

    /*************/
    ////Parser/////
    /*************/
    public static function parseManifest($manifest) {
        $archiveId = $manifest['archiveid'];
        $title = $manifest['title'];
        $resources = array();
        $timeline = array();

        foreach($manifest->resources->video as $videoResourceItem) {
            $resources[] = OpenTokArchiveVideoResource::parseXML($videoResourceItem); 
        }

        foreach($manifest->timeline->event as $timelineItem) {
            $timeline[] = OpenTokArchiveTimelineEvent::parseXML($timelineItem);
        }

        return new OpenTokArchive($archiveId, $title, $resources, $timeline);
    }

}