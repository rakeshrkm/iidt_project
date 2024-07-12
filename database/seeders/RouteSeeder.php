<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Route;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
              // Course
            ['route_name' =>'dashboard', 'name' => 'Dashboard'],
            ['route_name' =>'courses.index', 'name' =>  'Courses Lists'],
            ['route_name' =>'courses.create', 'name' =>  'Add Course'],
            ['route_name' =>'courses.edit', 'name' =>  'Edit Course'],
            ['route_name' =>'courses.destroy', 'name' =>  'Delete Course'],
            // College
            ['route_name' =>'college.index', 'name' =>  'College Lists'],
            ['route_name' =>'college.create', 'name' =>  'Add College'],
            ['route_name' =>'college.edit', 'name' =>  'Edit College'],
            ['route_name' =>'college.show', 'name' =>  'Show College Details'],
            ['route_name' =>'college.destroy', 'name' =>  'Delete College'],
            // registrations
            ['route_name' =>'registers.index', 'name' =>  'Student Lists'],
            ['route_name' =>'registers.create', 'name' =>  'Add Student'],
            ['route_name' =>'registers.edit', 'name' =>  'Edit Student'],
            ['route_name' =>'registers.show', 'name' =>  'Show Student Details'],
            ['route_name' =>'registers.credentials', 'name' =>  'Create Credentials Student'],
            ['route_name' =>'college.destroy', 'name' =>  'Delete Student'],
            // Permisson
            ['route_name' =>'permissions.create', 'name' =>  'Add Permission'],
            //profile payments.store
            ['route_name' => 'profile', 'name' => 'Student Profile'],
            // payments
            
            ['route_name' => 'payments.index', 'name' => 'Payments Lists'],
            ['route_name' => 'payments.create', 'name' => 'Add Payments'],
            ['route_name' => 'payments.verify', 'name' => 'Verify Payments'],

            //offers

            ['route_name' => 'offers.index', 'name' => 'Offers Lists'],
            ['route_name' => 'offers.create', 'name' => 'Add Offer'],
            ['route_name' => 'offers.edit', 'name' => 'Update Offer'],
            ['route_name' => 'offers.destroy', 'name' => 'Delete Offer'],
            //notification
            ['route_name' => 'mark-as-read', 'name' => 'Notification'],
            //notification

            

        ];

        foreach ($data as $routeData) {
            $route = new Route;
            $exist = $route->where('route_name', '=', $routeData['route_name'])->exists();
            if($exist){
                continue;
            }else{
                $route = new Route;
                $route->route_name = $routeData['route_name'];
                $route->name = $routeData['name'];
                $route->save();
            }
        }
    }
}
