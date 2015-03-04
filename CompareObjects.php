<?php

namespace CompareObjects;

/*
* Comparison of two objects on the same methods
*/
class CompareTwoObjects
{


    /*
     * Compere two objects
     * @param object $objectOne
     * @param object $objectTwo
     *
     * @return array
     */
    public function CompereObjects($objectOne, $objectTwo)
    {
        $objectOneMethods = $this->getPublicAndProtectedMethods($objectOne);
        $objectTwoMethods = $this->objectToArray($this->getPublicAndProtectedMethods($objectTwo));
        $sameMethods = [];

        foreach($objectOneMethods as $objectOneMethod){
            if(in_array(strtolower($objectOneMethod->name), $objectTwoMethods)){
                $sameMethods[] = $objectOneMethod->name;
            }
        }

        return $sameMethods;
    }

    /*
     * Get public and protected methods
     * @param object $object
     *
     * @return array
     */
    private function getPublicAndProtectedMethods($object)
    {
        $object = new \ReflectionClass($object);
        $objectMethods = $object->getMethods(\ReflectionMethod::IS_PUBLIC | \ReflectionMethod::IS_PROTECTED);

        return $objectMethods;
    }

    /*
     * Convert object to array
     *
     * @param ReflectionMethod $objectTwoMethods
     *
     * @return array
     */
    private function objectToArray($objectTwoMethods)
    {
        $methods = [];

        foreach($objectTwoMethods as $method)
        {
            $methods[] = strtolower($method->name);

        }

        return $methods;
    }
}
