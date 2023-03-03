<?php
namespace App\Traits;
use App\Events\InstallCreated;
use Illuminate\Support\Str;
use Auth;


trait InstallProperties
{

    public static function bootInstallProperties()
    {

        static::creating(function ($install) {
            $fill = [
                'type' => '',
                'properties' => [
                    'id' => Str::random(15),
                    'mautic' => [
                        'admin' => [
                            'email' => Auth::user()->email,
                            'password' => Str::random(15),
                            'first_name' => Auth::user()->first_name,
                            'last_name' => Auth::user()->last_name,
                        ]
                    ]
                ]
            ];


            if (is_a($install, 'App\Models\Lab')) {
                $fill['type'] = 'lab';
                $fill['properties']['mautic'] = array_merge(
                    $fill['properties']['mautic'],
                    [
                        'server' => [
                            'cpu' => 1,
                            'memory' => 1, //GB
                            'disk' => 30, //GB
                            'limits' => [
                                //TODO: Add limits to the pod, define capaiblites
                            ]
                        ],
                    ]
                );
            }

            $install->forceFill($fill);
        });

        static::created(function ($install) {
            InstallCreated::dispatch($install);
        });


    }
}
