<?php

namespace App;

use function array_search;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use function is_object;

class EventRegistration extends Model
{
    const STATUS_PENDING   = 0;
    const STATUS_PUBLISHED = 1;
    const STATUS_ARCHIVED  = 2;

    protected $with = ['marker'];

    protected $status = [
        self::STATUS_PENDING   => 'pending',
        self::STATUS_PUBLISHED => 'published',
        self::STATUS_ARCHIVED  => 'archived',
    ];

    protected $guarded = [

    ];
    protected $appends = [
        'event_day',
        'status_name'
    ];

    protected $attributes = [
        'first_time_host'          => false,
        'someone_else_on_site'     => false,
        'location_same_as_contact' => false,
        'open_to_public'           => false
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'event_start',
        'event_end'
    ];

    protected $fieldMap = [
        'id' => [
            'name' => 'id'
        ],

        'organization_name' => [
            'name'     => 'organization_name',
            'type'     => 'text',
            'required' => true,
            'table'    => true,
        ],

        'status'     => [
            'name'    => 'status',
            'type'    => 'select',
            'table'   => true,
            'options' => [
                'pending'   => self::STATUS_PENDING,
                'published' => self::STATUS_PUBLISHED,
                'archived'  => self::STATUS_ARCHIVED
            ]
        ],


        'kit_type' => [
            'name'     => 'kit_type',
            'type'     => 'select',
            'options'  => [
                'SIA: California Department of Aging'                             => 'California Department of Aging',
                'SIA: California Department of Public Health'                     => 'California Department of Public Health',
                'SIA: California Department of Social Services'                   => 'California Department of Social Services',
                'SIA: UC CalFresh'                                                => 'UC CalFresh',
                'SIA: Subcontractor of state agency above'                        => 'Subcontractor of state agency above',
                'LIA: Local Health Department (LHD)'                              => 'Local Health Department (LHD)',
                'LIA: Catholic Charities of California (CCC)'                     => 'Catholic Charities of California (CCC)',
                'LIA: Area Agency on Aging (AAA)'                                 => 'Area Agency on Aging (AAA)',
                'LIA: UC Cooperative Extension (UCCE)'                            => 'UC Cooperative Extension (UCCE)',
                'LIA: Non-SNAP-Ed Funded Community-Based Organization or Partner' => 'Non-SNAP-Ed Funded Community-Based Organization or Partner',
                'LIA: Other'                                                      => 'Other'
            ],
            'required' => true,
            'table'    => true
        ],

        'how_heard_about' => [
            'name'     => 'how_heard_about',
            'type'     => 'heard about from',
            'required' => true,
            'table'    => false,
        ],

        'event_day'     => [
            'name'     => 'event_day',
            'type'     => 'date',
            'required' => true,
            'table'    => false,
            'export'   => false,
        ],
        'event_details' => [
            'name' => 'event_details',
            'type' => 'textarea',
        ],
        'event_start'   => [
            'name'     => 'event_start',
            'type'     => 'time',
            'required' => true,
            'table'    => true,
        ],
        'event_end'     => [
            'name'     => 'event_end',
            'type'     => 'time',
            'required' => true,
            'table'    => true,
        ],

        'location_name'      => [
            'name'     => 'location_name',
            'type'     => 'text',
            'required' => true,
            'table'    => true,
        ],
        'location_address'   => [
            'name'     => 'location_address',
            'type'     => 'text',
            'required' => true,
            'table'    => true,
        ],
        'location_city'      => [
            'name'     => 'location_city',
            'type'     => 'text',
            'required' => true,
            'table'    => true,
        ],
        'location_zip'       => [
            'name'     => 'location_zip',
            'type'     => 'text',
            'required' => true,
            'table'    => true,
        ],
        'number_of_attendees' => [
            'name'     => 'number_of_attendees',
            'lang'     => 'est. attendees',
            'type'     => 'text',
            'required' => true,
            'table'    => true,
        ],
        'primary_first_name' => [
            'name'     => 'primary_first_name',
            'type'     => 'text',
            'lang'     => 'contact first name',
            'required' => true,
            'table'    => true,
        ],
        'primary_last_name'  => [
            'name'     => 'primary_last_name',
            'type'     => 'text',
            'lang'     => 'contact last name',
            'required' => true,
            'table'    => true,
        ],

        'primary_title'        => [
            'name'    => 'primary_title',
            'type'    => 'select',
            'lang'    => 'contact title',
            'options' => [
                '',
                'Mr.'  => 'Mr.',
                'Mrs.' => 'Mrs.',
                'Ms.'  => 'Ms.',
                'Dr.'  => 'Dr.',
            ]
        ],
        'primary_address'      => [
            'name'     => 'primary_address',
            'type'     => 'text',
            'lang'     => 'contact address',
            'required' => true,
        ],
        'primary_city'         => [
            'name'     => 'primary_city',
            'type'     => 'text',
            'lang'     => 'contact city',
            'required' => true,
        ],
        'primary_zip'          => [
            'name'     => 'primary_zip',
            'type'     => 'text',
            'lang'     => 'contact zip',
            'required' => true,
            'pattern'  => 'zip'
        ],
        'primary_phone'        => [
            'name'     => 'primary_phone',
            'type'     => 'text',
            'lang'     => 'contact phone',
            'required' => true,
            'table'    => true,

        ],
        'primary_email'        => [
            'name'     => 'primary_email',
            'type'     => 'text',
            'lang'     => 'contact email',
            'required' => true,
            'pattern'  => 'email',
            'table'    => true,
        ],
        'best_contact_method'  => [
            'name'     => 'best_contact_method',
            'type'     => 'radio',
            'lang'     => 'best contact time',
            'options'  => [
                'morning'   => 'morning',
                'afternoon' => 'afternoon',
                'night'     => 'night',
            ],
            'required' => true,
        ],
        'facebook'             => [
            'name' => 'facebook',
            'type' => 'text',
        ],
        'twitter'              => [
            'name' => 'twitter',
            'type' => 'text',
        ],
        'kit_shipping'         => [
            'name'     => 'kit_shipping',
            'type'     => 'text',
            'required' => true,
        ],
        'someone_else_on_site' => [
            'name' => 'someone_else_on_site',
            'type' => 'boolean',
        ],
        'site_contact_name'    => [
            'name'     => 'site_contact_name',
            'type'     => 'text',
            'required' => true,
        ],
        'site_contact_phone'   => [
            'name'     => 'site_contact_phone',
            'type'     => 'text',
            'required' => true,
        ],
        'site_contact_email'   => [
            'name'     => 'site_contact_email',
            'type'     => 'text',
            'required' => true,
            'pattern'  => 'email'
        ],


        'location_same_as_contact' => [
            'name' => 'location_same_as_contact',
            'type' => 'boolean',
        ],

        'open_to_public' => [
            'name'     => 'open_to_public',
            'type'     => 'boolean',
            'required' => true,
        ],
        'created_at' => [
            'name'  => 'created_at',
            'lang'  => 'date created',
            'table' => true,
        ],
        'updated_at' => [
            'name'  => 'updated_at',
            'lang'  => 'date updated',
            'table' => true
        ],
        //        'first_time_host'          => [
        //            'name'     => 'first_time_host',
        //            'type'     => 'boolean',
        //            'required' => true,
        //        ],

    ];

    public function getFields()
    {
        return array_map(function ($n) {
            if (empty($n['lang'])) {
                $n['lang'] = str_replace('_', ' ', $n['name']);
            }

            return $n;

        }, $this->fieldMap);

        return $this->fieldMap;
    }

    public function getEventDayAttribute()
    {
        if (!empty($this->attributes['event_start'])) {
            return (new Carbon($this->attributes['event_start']))->format('F j, Y');
        }

        return null;
    }

    public function getStatusNameAttribute()
    {
        if (!isset($this->attributes['status'])) {
            return '';
        }

        return $this->status[$this->attributes['status']];
    }

    public function getEventStartAttribute()
    {
        return (new Carbon($this->attributes['event_start']))->format('g:ia');
    }

    public function marker()
    {
        return $this->hasOne('App\Marker', 'reference_id');
    }

    public function getEventEndAttribute()
    {
        return (new Carbon($this->attributes['event_end']))->format('g:ia');
    }

    public function setFirstTimeHostAttribute($value)
    {
        $this->attributes['first_time_host'] = !!$value;
    }

    public function setSomeoneElseOnSiteAttribute($value)
    {
        $this->attributes['someone_else_on_site'] = !!$value;
    }

    public function setLocationSameAsContactAttribute($value)
    {
        $this->attributes['location_same_as_contact'] = !!$value;
    }

    public function setOpenToPublicAttribute($value)
    {
        $this->attributes['open_to_public'] = !!$value;
    }

    public function setStatusNameAttribute($value)
    {
        $this->attributes['status'] = array_search($value, $this->status);
    }

    public function setPrimaryPhoneAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['primary_phone'] = str_replace([
                '-',
                '_'
            ], '', $value);
        }
    }

    public function toTable()
    {
        $res = [];

        foreach ($this->getFields() as $value) {

            $attrValue = $this->attributes[$value['name']] ?? '';
            if (!isset($value['export']) || !empty($value['export'])) {
                $res[$value['name']] = [
                    'key'     => $value['name'],
                    'eng_key' => !empty($value['lang']) ? $value['lang'] : str_replace('_', ' ', $value['name']),
                    'value'   => $attrValue,
                    'show'    => !empty($value['table']),
                ];

                if (!empty($value['options'])) {
                    $foundValue = array_search($attrValue, $value['options']);
                    $res[$value['name']]['value'] = ! empty($foundValue) ? $foundValue : '';
                }
            }

        }

        return $res;
    }

    public function setSiteContactPhoneAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['site_contact_phone'] = str_replace([
                '-',
                '_'
            ], '', $value);
        }
    }

}
