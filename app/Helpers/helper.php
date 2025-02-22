<?php

namespace App\Helpers;

use App\Models\User;
use Spatie\Permission\Models\Role;

class helper
{
    public static function getUserCount()
    {
        return User::count();
    }

    public static function getRoleCount()
    {
        return Role::count();
    }
   
    public static function getTextDirection()
    {
        // التحقق من اللغة الحالية
        return app()->getLocale() == 'ar' ? 'rtl' : 'ltr';
    }

    public static function getTextAlign()
    {
        // إذا كانت اللغة العربية يتم محاذاة النص لليمين، وإلا لليسار
        return app()->getLocale() == 'ar' ? 'right' : 'left';
    }
    public static function getCurrentLanguage()
    {
        return app()->getLocale();
    }
}
