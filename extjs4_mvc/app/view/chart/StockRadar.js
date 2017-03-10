Ext.define('ExtMVC.view.chart.StockRadar', {
	extend: 'Ext.chart.Chart',
    alias : 'widget.stockradar',

	margin: '0 0 0 0',
    insetPadding: 20,
    flex: 1.2,
    animate: true,
    store: 'RadarDataSets',
    theme: 'Red',
    axes: [{
        steps: 5,
        type: 'Radial',
        position: 'radial',
        maximum: 100
    }],
    series: [{
        type: 'radar',
        xField: 'Name',
        yField: 'Data',
        showInLegend: false,
        showMarkers: true,
        markerConfig: {
            radius: 4,
            size: 4,
            fill: 'rgb(9,9,59)'
        },
        style: {
            fill: 'rgb(19,21,24)',
            opacity: 0.5,
            'stroke-width': 0.5
        }
    }]
});    