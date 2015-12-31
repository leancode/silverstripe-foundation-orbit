<?php

class OrbitPage extends DataExtension
{
    private static $db = array(
        'ShowOrbit'  => 'Boolean',
        'OrbitWidth' => 'Int',
        'OrbitHeight'=> 'Int'
    );

    private static $has_many = array(
        'Slides' => 'OrbitSlide'
    );

    private static $defaults = array(
        'OrbitWidth' => 750,
        'OrbitHeight' => 350
    );

    public function updateCMSFields(FieldList $fields)
    {
        if ($this->owner->ShowOrbit) {
            // Create add button
            $add_button = new GridFieldAddNewButton('toolbar-header-left');
            $add_button->setButtonName('Add Slide');

            // Add Orbit editor
            $grid_config = GridFieldConfig_RecordEditor::create()
                ->removeComponentsByType('GridFieldAddNewButton')
                ->removeComponentsByType('GridFieldFilterHeader')
                ->addComponent($add_button);

            $orbit_table = GridField::create('Slides', false, $this->owner->Slides()->sort('Sort DESC'), $grid_config);

            $fields->addFieldToTab('Root.Orbit', $orbit_table);
        } else {
            $fields->removeByName('Slides');
        }

        $fields->removeByName('ShowOrbit');
        $fields->removeByName('OrbitWidth');
        $fields->removeByName('OrbitHeight');

        parent::updateCMSFields($fields);
    }

    public function updateSettingsFields(FieldList $fields)
    {
        $message = '<p>Configure this page to use an image slider</p>';
        $fields->addFieldToTab('Root.Settings', LiteralField::create("OrbitMessage", $message));

        $orbit = FieldGroup::create(
            CheckboxField::create('ShowOrbit', 'Show an image slider on this page?')
        )->setTitle('Orbit');

        $fields->addFieldToTab('Root.Settings', $orbit);

        if ($this->owner->ShowOrbit) {
            $fields->addFieldToTab('Root.Settings', NumericField::create('OrbitWidth', 'Width'));
            $fields->addFieldToTab('Root.Settings', NumericField::create('OrbitHeight', 'Height'));
        }
    }

    public function OrbitSlides()
    {
        return $this->owner->renderWith('OrbitSlides', array('Slides' => $this->owner->Slides()));
    }
}
