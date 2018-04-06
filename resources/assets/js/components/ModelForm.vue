<template>
    <form v-bind:action="action">
        <input type="hidden" name="id" v-model="data['id']" v-if="data['id']"/>
        <input type="hidden" name="_method" v-model="data['_method']" value="PUT" v-if="data['id']"/>
        <div class="form-row" v-for="field in fields">
            <radio-field :model="data[field['name']]" :name="field['name']" :label="field['lang']" v-if="field['type'] === 'radio'" :options="field['options']"></radio-field>

            <select-field :model="data[field['name']]" :name="field['name']" :label="field['lang']" v-if="field['type'] === 'select'" :options="field['options']"></select-field>

            <switch-field :model="data[field['name']]" :name="field['name']" :label="field['lang']" v-if="field['type'] === 'boolean'"></switch-field>

            <text-field :text="data[field['name']]" :name="field['name']" :label="field['lang']" v-if="field['type'] === 'text'"></text-field>

            <textarea-field :model="data[field['name']]" :name="field['name']" :label="field['lang']" v-if="field['type'] === 'textarea'"></textarea-field>

            <time-field :model="data[field['name']]" :name="field['name']" :label="field['lang']" v-if="field['type'] === 'time'"></time-field>

            <date-field :model="data[field['name']]" :name="field['name']" :label="field['lang']" v-if="field['type'] === 'date'"></date-field>
        </div>
        <div class="callout success margin-bottom-2" v-if="isSuccess()">
            <h5>Saved!</h5>
        </div>
        <input type="button" class="button" value="Save" v-on:click.prevent="save"/>
    </form>
</template>

<script>
    import TextField from './Form/TextField';
    import SwitchField from './Form/SwitchField';
    import SelectField from './Form/SelectField';
    import RadioField from './Form/RadioField';
    import TextareaField from './Form/TextareaField';
    import TimeField from './Form/TimeField';
    import DateField from './Form/DateField';

    var CreateMarker = require('../create-marker');

    var vue;

    export default {
        name      : "model-form",
        components: {
            TextField,
            RadioField,
            SwitchField,
            SelectField,
            TimeField,
            DateField,
            TextareaField
        },
        props     : [
            'data-action',
            'data-fields',
            'data-model'
        ],
        watch     : {
            'data.first_name': function () {
            }
        },
        data() {
            var fields       = JSON.parse(this.dataFields),
                model        = this.dataModel ? JSON.parse(this.dataModel) : {};
            model['_method'] = 'PUT';

            vue = this;

            model.testing = '';
            console.log(model);

            return {
                fields : fields,
                action : this.dataAction,
                success: false,
                data   : model
            };
        },
        mounted() {
            if ($('.timepicker').length) {
                $('.timepicker').timepicker();
            }
        },
        methods   : {
            isSuccess: function () {
                return vue.success;
            },
            save     : function () {
                var action   = this.$el.getAttribute('action'),
                    $el      = $(this.$el),
                    id       = this.data.id,
                    formData = $el.serializeArray();

                // Handle checkboxes
                $('input:checkbox:not(:checked)').map(function () {
                    formData.push({name: this.name, value: ""});
                });

                _.each(formData, function (val, index) {
                    vue.data[val.name] = val.value;
                });

                if (id) {
                    action += id;
                }
                vue.success = false;

                $.ajax(action, {
                    data  : formData,
                    method: 'post'
                }).done(function (response) {
                    vue.success = true;
                    if (!response || !response.id) {
                        return false;
                    }
                    var marker = {
                        'reference_id': response.id,
                        'title'       : response['organization_name'],
                        'address'     : response['location_address'],
                        'city'        : response['location_city'],
                        'zip'         : response['location_zip'],
                        'info'        : response['event_details'],
                        'day'         : response['event_day'],
                        'start'       : response['event_start'],
                        'end'         : response['event_end']
                    };
                    if (response.status_name === 'published') {
                        CreateMarker.publish(marker);
                    }
                    else {
                        if (response.marker) {
                            CreateMarker.unpublish(response.marker);
                        }
                    }

                });

            }
        }
    };
</script>

<style scoped>

</style>