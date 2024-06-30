<?php
namespace App\Enums\Admin;
enum AdminType: string {
    case ADMIN = 'admin';
    case SUB_ADMIN = 'sub-admin';

    public static function type($value): string {
        if ($value == self::ADMIN) {
            return '<span class="badge badge-success">' .trans('general.admin') .'</span>';
        } elseif ($value == self::SUB_ADMIN){
            return '<span class="badge badge-warning">' .trans('general.sub_admin') .'</span>';
        } else {
            return '<span class="badge badge-default">' .trans('general.not_status_assigned') .'</span>';
        }
    }
}