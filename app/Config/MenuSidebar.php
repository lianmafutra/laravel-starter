<?php

namespace App\Config;

class MenuSidebar
{
   public static function menu(){
      return  collect([

         [
            'type'   => 'header',
            'title'  => 'App Settings',
         ],
   
         [
            'type'   => 'menu',
            'title'  => 'Dashboard',
            'url'    => route('dashboard'),
            'icon'   => 'fas fa-tachometer-alt',
            'active' => ['dashboard']
         ],
   
         [
            'type'   => 'tree',
            'title'  => 'Role Permissions',
            'url'    => '#',
            'icon'   => 'fas fa-tachometer-alt',
            'active' => ['master-user*', 'role.*', 'permission-group.*', 'permission.*'],
            'items' => [
               [
                  'type'   => 'menu',
                  'title'  => 'Master User',
                  'url'    => route('master-user.index'),
                  'icon'   => 'fas fa-user',
                  'active' => ['master-user.*']
               ],
               [
                  'type'   => 'menu',
                  'title'  => 'Role',
                  'url'    => route('role.index'),
                  'icon'   => 'fas fa-user-cog',
                  'active' => ['role.*']
               ],
               [
                  'type'   => 'menu',
                  'title'  => 'Permissions Group',
                  'url'    => route('permission-group.index'),
                  'icon'   => 'fas fa-layer-group',
                  'active' => ['permission-group.*']
               ],
               [
                  'type'   => 'menu',
                  'title'  => 'Permissions',
                  'url'    => route('permission.index'),
                  'icon'   => 'fas fa-unlock',
                  'active' => ['permission.*']
               ],
            ]
         ],
         [
            'type'   => 'header',
            'title'  => 'Menu',
         ],
         [
            'type'   => 'tree',
            'title'  => 'Sample Data',
            'url'    => '#',
            'icon'   => 'fas fa-search',
            'active' => [''],
            'items' => [
               [
                  'type'   => 'menu',
                  'title'  => 'CRUD',
                  'url'    => '',
                  'icon'   => 'fas fa-unlock',
                  'active' => ''
               ],
            ]
         ],
         [
            'type'   => 'menu',
            'title'  => 'Profile',
            'url'    => route('user.show', auth()->user()->id),
            'icon'   => 'fas fa-user-alt',
            'active' => ['user.*']
         ],
      ]);
   }
}
