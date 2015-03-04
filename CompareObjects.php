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
        $objectTwoMethods = $this->getPublicAndProtectedMethods($objectTwo);
        $sameMethods = [];

        foreach($objectOneMethods as $objectOneMethod){
            foreach($objectTwoMethods as $objectTwoMethod){
                if(strtolower($objectOneMethod->name) == strtolower($objectTwoMethod->name)){
                    $sameMethods[] = $objectOneMethod->name;
                }
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
}
