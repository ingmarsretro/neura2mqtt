<?php

// page and data item configs
$dataPages = [
    [
        'url' => 'http://neuraIpadress/neura/mobile/jsp/schema.jsp',
        'dataItems'=> [
            [
                'tagId'  => 'screed',
                'type' => 'float',
                'mqttTopic' => 'Neura/status/Estrichtemperatur'
            ],
            [
                'tagId'  => 'room',
                'type' => 'float',
                'mqttTopic' => 'Neura/status/Raumtemperatur'
            ],
            [
                'tagId'  => 'heater_rod',
                'type' => 'bool',
                'mqttTopic' => 'Neura/status/Boiler_E_patrone'
            ],
            [
                'tagId'  => 'cylinder',
                'type' => 'float',
                'mqttTopic' => 'Neura/status/Boilertemperatur'
            ],
            [
                'tagId'  => 'flow',
                'type' => 'float',
                'mqttTopic' => 'Neura/status/Vorlauf'
            ],
            [
                'tagId'  => 'return',
                'type' => 'float',
                'mqttTopic' => 'Neura/status/Ruecklauf'
            ],
            [
                'tagId'  => 'comp_in',
                'type' => 'float',
                'mqttTopic' => 'Neura/status/Kompressor_ein'
            ],
            [
                'tagId'  => 'comp_out',
                'type' => 'float',
                'mqttTopic' => 'Neura/status/Kompressor_aus'
            ],
            [
                'tagId'  => 'cylinder_pump',
                'type' => 'bool',
                'mqttTopic' => 'Neura/status/Umschaltventil_Boilerladung'
            ],
            [
                'tagId'  => 'heatpump_2',
                'type' => 'bool',
                'mqttTopic' => 'Neura/status/Waermepumpe'
            ],
            [
                'tagId'  => 'circulator_pump',
                'type' => 'bool',
                'mqttTopic' => 'Neura/status/Umwaelzpumpe'
            ]
        ]
    ]
];