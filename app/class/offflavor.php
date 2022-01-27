<?php

class OffFlavor
{
    const IS_ACETALDEHYDE = 'isAcetaldehyde';
    const IS_ALCOHOLIC = 'isAlcoholic';
    const IS_ASTRINGENT = 'isAstringent';
    const IS_DIACETYL = 'isAiacetyl';
    const IS_DMS = 'isDms';
    const IS_ESTERY = 'isEstery';
    const IS_GRASSY = 'isGrassy';
    const IS_LIGHT_STRUCK = 'isLightStruck';
    const IS_METALLIC = 'isMetallic';
    const IS_MUSTY = 'isMusty';
    const IS_OXIDIZED = 'isOxidized';
    const IS_PHENOLIC = 'isPhenolic';
    const IS_SOLVENT = 'isSolvent';
    const IS_ACIDIC = 'isAcidic';
    const IS_SULFUR = 'isSulfur';
    const IS_VEGETAL = 'isVegetal';
    const IS_YEASTY = 'isYeasty';

    public $isAcetaldehyde;
    public $isAlcoholic;
    public $isAstringent;
    public $isDiacetyl;
    public $isDms;
    public $isEstery;
    public $isGrassy;
    public $isLightStruck;
    public $isMetallic;
    public $isMusty;
    public $isOxidized;
    public $isPhenolic;
    public $isSolvent;
    public $isAcidic;
    public $isSulfur;
    public $isVegetal;
    public $isYeasty;

    public function __construct()
    {
        $this->isAcetaldehyde = 0;
        $this->isAlcoholic = 0;
        $this->isAstringent = 0;
        $this->isDiacetyl = 0;
        $this->isDms = 0;
        $this->isEstery = 0;
        $this->isGrassy = 0;
        $this->isLightStruck = 0;
        $this->isMetallic = 0;
        $this->isMusty = 0;
        $this->isOxidized = 0;
        $this->isPhenolic = 0;
        $this->isSolvent = 0;
        $this->isAcidic = 0;
        $this->isSulfur = 0;
        $this->isVegetal = 0;
        $this->isYeasty = 0;
    }


    public function getOffFlavors()
    {
        $offFlavors = array();
        foreach ($this as $key => $value) {
            if ($value != 0) {
                $offFlavors[] = $key;
            }
        }
        return $offFlavors;
    }
}