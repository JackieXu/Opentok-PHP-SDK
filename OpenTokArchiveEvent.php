<?php

namespace OpenTok;

class OpenTokArchiveTimelineEvent {
    private $eventType;
    private $resourceId;
    private $offset;

    public function __construct($eventType, $resourceId, $offset) {
        $this->eventType = $eventType;
        $this->resourceId = $resourceId;
        $this->offset = $offset;
    }

    public function getEventType() {
        return $this->eventType;
    }

    public function getResourceId() {
        return $this->resourceId;
    }

    public function getOffset() {
        return $this->offset;
    }

    public static function parseXML($timelineItem) {
        return new OpenTokArchiveTimelineEvent($timelineItem['type'], $timelineItem['id'], $timelineItem['offset']);
    }
}