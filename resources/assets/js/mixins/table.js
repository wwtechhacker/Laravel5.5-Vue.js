var vue,
    URLSearchParams = require('url-search-params'),
    params          = new URLSearchParams(location.search);

export const table = {
    props  : [
        'table-data',
        'table-rows',
        'options'
    ],
    data() {
        var keys,
            rows,
            data,
            defaults = {
                enableNumbers: false,
                enableBatch  : true
            },
            settings = $.extend({}, defaults, this.options || {});


        this.tableRows = JSON.parse(this.tableRows);
        keys           = this.tableRows[0];
        vue            = this;
        vue.tableData  = JSON.parse(this.tableData);

        return {
            rows       : this.tableRows,
            keys       : keys,
            selected   : [],
            hasSelected: false,
            settings   : settings
        };
    },
    watch  : {
        selected: function () {
            this.hasSelected = !!this.selected.length;
        }
    },
    methods: {
        selectAll        : function () {
            _.each(vue.rows, function (row, index) {
                vue.selected.push(index);
            });
        },
        selectNone       : function () {
            vue.selected = [];
        },
        getRow           : function (index) {
            return vue.rows[index] ? vue.rows[index] : false;
        },
        getSelected      : function () {
            if (!vue.selected || !vue.selected.length) {
                return [];
            }

            var match = _.map(vue.selected, function (value, index) {
                return vue.rows[value];
            });

            return match;
        },
        getSelectedValues: function () {
            var selected = this.getSelected();
            return _.map(selected, function (value) {
                return _.find(vue.tableData, {id: value.id.value});
            });
        },
        sortClass        : function (key) {
            if (!params.has('orderby') || params.get('orderby') !== key) {
                return '';
            }

            return !params.has('order') || params.get('order') !== 'asc' ? 'selected asc' : 'selected desc';
        },
        setParam         : function (key, value) {
            params.set(key, value);
            return params.toString();
        },
        sortLink         : function (key) {
            var order = 'asc';
            if (params.has('orderby')) {
                order = params.get('orderby') === key && (!params.has('order') || params.get('order') === 'asc') ? 'desc' : 'asc';
            }

            var keyList = [];
            for (var paramKey of params.keys()) {
                if (paramKey !== 'orderby' && paramKey !== 'order') {
                    keyList.push(paramKey)
                }
            }

            var paramData = {
                orderby: key,
                order  : order
            };

            _.forEach(keyList, function (paramKey) {
                paramData[paramKey] = params.get(paramKey);
            });

            return location.pathname + '?' + $.param(paramData);
        }
    }
};