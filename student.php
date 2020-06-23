<?php
/**
 * A class to create User objects, implementing the JsonSerializable 
 * interface so that private members can get json encoded with the
 * json_encode function
 * 
 * palak depani, 000787449
 */
class User implements JsonSerializable
{
    private $fullname;
    private $grade;

    function __construct($fullname, $grade )
    {
        $this->fullname = $fullname;
        $this->grade = (int)$grade;
    }

    /**
     * Returns a string representation of the user object as a list item
     */
    function toListItem()
    {
        return "<li>$this->fullname</li>";
    }

    /**
     * Called by json_encode  
     */
    public function jsonSerialize()
    {
        return  get_object_vars($this);
    }
}
