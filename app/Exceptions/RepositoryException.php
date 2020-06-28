<?php

namespace App\Exceptions;

use Exception;

/**
 * Class RepositoryException.
 */
class RepositoryException extends Exception
{
    public static function createFailed()
    {
        return new static(__('exceptions.actions.create_failed'));
    }

    public static function updateFailed()
    {
        return new static(__('exceptions.actions.update_failed'));
    }

    public static function deleteFailed()
    {
        return new static(__('exceptions.actions.delete_failed'));
    }
}
