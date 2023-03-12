<?php

namespace App\Traits;

use App\Events\InstallCreated;
use Illuminate\Support\Str;

trait InstallProperties
{
    public static function bootInstallProperties()
    {
        static::created(function ($install) {
            InstallCreated::dispatch($install);
        });

        static::creating(function ($install) {
            $fill = [
                'type' => '',
                'properties' => [
                    'id' => Str::lower(Str::random(15)),
                    'mautic' => [
                        'admin' => [
                            'email' => auth()->user()->email,
                            'password' => Str::random(15),
                            'first_name' => auth()->user()->first_name,
                            'last_name' => auth()->user()->last_name,
                        ],
                    ],
                ],
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
                            ],
                        ],
                    ]
                );
            } elseif (is_a($install, 'App\Models\Demo')) {
                $fill['type'] = 'demo';
                $fill['properties']['mautic'] = array_merge(
                    $fill['properties']['mautic'],
                    [
                        'server' => [
                            'cpu' => 1,
                            'memory' => 1, //GB
                            'disk' => 30, //GB
                            'limits' => [
                                //TODO: Add limits to the pod, define capaiblites
                            ],
                        ],
                    ]);
            } elseif (is_a($install, 'App\Models\Dev')) {
                $fill['type'] = 'Dev';
                $fill['properties']['mautic'] = array_merge(
                    $fill['properties']['mautic'],
                    [
                        'server' => [
                            'cpu' => 1,
                            'memory' => 1, //GB
                            'disk' => 30, //GB
                            'limits' => [],
                        ],
                    ]
                );
            } elseif (is_a($install, 'App\Models\Prod')) {

                $fill['type'] = 'Prod';
                $fill['properties']['mautic'] = array_merge(
                    $fill['properties']['mautic'],
                    [
                        'server' => [
                            'cpu' => 1,
                            'memory' => 1, //GB
                            'disk' => 30, //GB
                            'limits' => [
                            ],
                        ],
                    ]
                );
                $fill['properties']['subscription'] =  $install->properties;
            }

            $install->forceFill($fill);
        });
    }
}
