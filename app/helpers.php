<?php

use App\Models\Notification;

if (!function_exists('VisionLevelArray')) {
    function VisionLevelArray($key = null)
    {
        $vision_level = [
            '1A' => '1A',
            '1B' => '1B',
            '2A' => '2A',
            '2B' => '2B',
            '3A' => '3A',
            '3B' => '3B',
            '4A' => '4A',
            '4B' => '4B',
            '5A' => '5A',
            '5B' => '5B',
        ];
        if (!empty($key)) {
            return $vision_level[$key];
        } else {
            return $vision_level;
        }
    }
}


if (!function_exists('PlaySidesArray')) {
    function PlaySidesArray($key = null){
        $play_side = [
            'left' => 'Only left (B)',
            'right' => 'Only right (A)',
            'backhand' => 'Most backhand',
            'forehand' => 'Most forehand',
            'matter' => 'Not matter',
        ];
        if(!empty($key)){
            return $play_side[$key];
        }else{
            return $play_side;
        }
    }
}


if (!function_exists('PlaySidesArray')) {
    function Notifications(){

        $notifications = Notification::where('status',0)
                        ->orderBy("id","DESC")
                        ->take(5)
                        ->get();

        return $notifications;
    }
}
