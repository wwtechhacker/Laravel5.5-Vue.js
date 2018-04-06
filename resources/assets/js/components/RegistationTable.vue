<template>
    <div class="registration-table">
        <div class="row">
            <div class="column small-12">

                <div class="margin-bottom-1">
                    <div class="filter-block">
                        <label>
                            Search:
                            <input type="text" v-model="search"/>
                        </label>
                    </div>
                    <div class="filter-block">
                        <label>
                            Status:
                            <select v-model="filter">
                                <option>all</option>
                                <option>pending</option>
                                <option>published</option>
                                <option>archived</option>
                            </select>
                        </label>
                    </div>
                </div>
                <div>
                    <div class="filter-block">
                        <label>
                            Select:
                            <button class="button small" @click="selectAll">All</button>
                        </label>
                    </div>
                </div>
                <div class="batch-menu" v-if="hasSelected">

                    <select v-model="status" id="status">
                        <option value="">-- Change Status --</option>
                        <option>pending</option>
                        <option>published</option>
                        <option>archived</option>
                    </select>
                    <button class="button small" @click="saveBatch">Save</button>
                    <button class="button small" @click="cancelBatch">Cancel</button>
                </div>
            </div>
        </div>
        <div class="row small-collapse medium-uncollapse">
            <div class="small-12 column">
                <div class="table-scroll clearfix" v-if="rows.length">
                    <div class="table-render">
                        <table class="hover unstriped">
                            <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th v-for="(val, key) in keys" v-if="val['key'] !== 'id'">
                                    <a v-bind:href="sortLink(val['key'])" v-bind:class="sortClass(val['key'])">{{val['eng_key']}}</a>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(row, index) in rows">
                                <td>
                                    <span v-if="settings.enableNumbers">{{index + 1}}</span>
                                    <div v-if="settings.enableBatch">
                                        <input type="checkbox" :id="'selected-' + index" v-model="selected" :value="index"/>
                                    </div>
                                </td>
                                <td>
                                    <a :href="'/admin/event-edit/' + getId(index)" target="_blank">Edit</a>
                                </td>
                                <td v-for="col in row" v-if="col['key'] !== 'id'">
                                    {{ col['valueMap'] || col['value']}}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div v-else>
                    <div class="callout">No Results</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {table} from '../mixins/table';

    var CreateMarker = require('../create-marker');

    function saveStatus(ids, status) {
        return $.post('/api/events/' + ids.join(','), {
            '_method'    : 'put',
            'status_name': status
        });
    }

    function searchFields(value, rows) {
        var regexp = new RegExp(value, 'i');
        return _.filter(rows, function (row) {
            return _.find(row, function (field) {
                if (field.valueMap) {
                    return regexp.test(field.valueMap);
                }
                return regexp.test(field.value);
            });
        });
    }

    export default {
        name   : "registation-table",
        props  : ['filter'],
        mixins : [table],
        data() {
            return {
                status: '',
                search: ''
            };
        },
        mounted() {

        },
        watch  : {
            'filter': function (newValue) {
                location.href = location.pathname + '?' + this.setParam('filter', newValue);
            },
            search: function (newValue, oldValue) {
                this.rows = searchFields(newValue, this.tableRows);
            },
        },
        methods: {
            getId      : function (index) {
                var row = this.getRow(index),
                    id  = row.id.value;

                return id;

            },
            cancelBatch: function () {
                this.selected = [];
            },
            saveBatch  : function () {
                if (!this.status.trim().length) {
                    return;
                }

                var vue      = this,
                    selected = this.getSelected(),

                    ids      = _.map(selected, function (n) {
                        n.status.valueMap = vue.status;
                        return n.id.value;
                    }),

                    values   = this.getSelectedValues(),
                    markers;

                saveStatus(ids, this.status);
                this.cancelBatch();

                if (this.status === 'published') {
                    markers = _.map(values, function (n) {
                        return {
                            'reference_id': n.id,
                            'title'       : n['organization_name'],
                            'address'     : n['location_address'],
                            'city'        : n['location_city'],
                            'zip'         : n['location_zip'],
                            'info'        : n['event_details'],
                            'day'         : n['event_day'],
                            'start'       : n['event_start'],
                            'end'         : n['event_end']
                        };
                    });
                    CreateMarker.publish(markers);
                }
                else {
                    markers = _.filter(_.map(values, function (n) {
                        if (!n.marker || !n.marker.id) {
                            return false;
                        }
                        return {
                            id: n.marker && n.marker.id
                        };
                    }));

                    CreateMarker.unpublish(markers);

                }

            }
        }

    };
</script>

<style scoped>

</style>