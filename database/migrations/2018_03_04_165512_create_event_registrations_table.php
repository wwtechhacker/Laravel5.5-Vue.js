<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventRegistrationsTable extends Migration
{
    private $stringFields = [
        'primary_first_name',
        'primary_last_name',
        'primary_title',
        'primary_address',
        'primary_city',
        'primary_zip',
        'primary_phone',
        'primary_email',
        'facebook',
        'twitter',
        'kit_type',
        'kit_shipping',
        'site_contact_name',
        'site_contact_phone',
        'site_contact_email',
        'organization_name',
        'best_contact_method',
        'location_name',
        'location_address',
        'location_city',
        'location_zip',
    ];
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_registrations', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            foreach ($this->stringFields as $field) {
                $table->string($field)->nullable();
            }
            $table->boolean('open_to_public')->nullable()->default(false);
            $table->boolean('first_time_host')->nullable()->default(false);
            $table->boolean('someone_else_on_site')->nullable()->default(false);
            $table->boolean('location_same_as_contact')->nullable()->default(false);
            $table->text('event_details')->nullable();
            $table->datetime('event_start')->nullable();
            $table->datetime('event_end')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_registrations');
    }
}
