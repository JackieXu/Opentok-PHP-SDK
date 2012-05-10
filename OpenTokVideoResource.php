<?php

namespace OpenTok;

class OpenTokArchiveVideoResource {
    private $id;
    private $type = 'video';
    private $length;

    public function __construct($id, $length) {
        $this->id = $id;
        $this->length = $length;
    }

    public function getId() {
        return $this->id;
    }

    public function getLength() {
        return $this->length;
    }

    public static function parseXML($videoResourceItem) {
        return new OpenTokArchiveVideoResource($videoResourceItem['id'], $videoResourceItem['length']);
    }
}