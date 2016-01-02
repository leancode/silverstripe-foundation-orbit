<?php

class OrbitSlide extends DataObject
{

    private static $db = array(
        'Title'     => 'Varchar(99)',
        'Sort'      => 'Int'
    );

    private static $has_one = array(
        'Parent'    => 'Page',
        'Image'     => 'Image'
    );

    private static $casting = array(
        'Thumbnail' => 'Varchar'
    );

    private static $summary_fields = array(
        'Thumbnail' => 'Image',
        'Title'     => 'Title'
    );

    private static $default_sort = "Sort DESC";

    public function getSizedImage()
    {
        $width = $this->Parent()->OrbitWidth;
        $height = $this->Parent()->OrbitHeight;

        if ($width && $height) {
            return $this->Image()->croppedImage($width, $height);
        } else {
            return false;
        }
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName('ParentID');

        return $fields;
    }

    public function getThumbnail()
    {
        if ($this->Image()) {
            return $this->Image()->CMSThumbnail();
        } else {
            return '(No Image)';
        }
    }
}
